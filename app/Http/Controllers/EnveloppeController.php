<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use Auth;
use Carbon\Carbon;
use App\Message;

class EnveloppeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view('enveloppe');
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
            'user_id' => Auth::id(),
        ]);

        $request->session()->flash('success', 'Les messages ont bien été transmis aux destinateurs.');

        return redirect('/enveloppe');

    }
}
