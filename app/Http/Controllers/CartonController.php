<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use Auth;
use Carbon\Carbon;
use App\Message;
use App\User;


class CartonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$messages = Message::where('user_id', '=', Auth::id())->where('type', '=', 'carton')->orderBy('id', 'DESC')->limit(50)->get();

        $i = 1;

    	return view('carton', compact('messages', 'i'));
    }

    public function create(MessageRequest $request)
    {
    	$tab = explode(',', $request->num);

    	$newtab = [];

    	$i = 0;
    	
    	while ($i < count($tab)) 
    	{
    		if (strlen($tab[$i]) == 8) 
    		{
    			$newtab [] = intval($tab[$i]);

    			$i++;
    		}
    		else
    		{
    			$request->session()->flash('error', 'Les numéros doivent être de 8 chiffres.');

                $request->session()->flash('lastval', $request->num);

    			return redirect('/carton');
    		}
    	}

        $nbrmsg = count($newtab);

        /*$j = 0;

        while ($j < $nbrmsg) 
        {
            //dd($newtab[$j]);
            Nexmo::message()->send([
                'to'   => "+227$newtab[$j]",
                'from' => 'Nijma',
                'text' => 'Bonsoir, Votre colis est bien arrive vous pourrez passer le recupere munis de votre piece d\'identite. Merci d\'avance'
            ]);

            $j++;
        }*/

    	$numero = implode(',', $newtab);

        $date = Carbon::now();

        $date_msg = Carbon::create($date->year, $date->month, $date->day);

        //$maintenant=Carbon::create($date->year, $date->month, $date->day, $date->hour, $date->minute, $date->second);

        Message::create([
            'message' => $request->msg,
            'numero' => $numero,
            'nbr_numero' => $nbrmsg,
            'date_env' => $date_msg,
            'heur' => $date->hour.':'.$date->minute.':'.$date->second,
            'type' => 'carton',
            'user_id' => Auth::id(),
        ]);

        $request->session()->flash('success', 'Les messages ont bien été transmis aux destinateurs.');

        return redirect('/carton');

    }
}
