<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use Auth;
use Carbon\Carbon;
use App\Message;
use App\User;

class EnveloppeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $messages = Message::where('user_id', '=', Auth::id())->orderBy('id', 'DESC')->limit(50)->get();

        $i = 1;

    	return view('enveloppe', compact('messages', 'i'));
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

    			return redirect('/enveloppe');
    		}
    	}

        $nbrmsg = count($newtab);

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
            'type' => 'enveloppe',
            'user_id' => Auth::id(),
        ]);

        $request->session()->flash('success', 'Les messages ont bien été transmis aux destinateurs.');

        return redirect('/enveloppe');

    }
}
