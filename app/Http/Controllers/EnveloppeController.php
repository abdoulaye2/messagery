<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use Auth;

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

    	$tabstring = implode(',', $newtab);


    }
}
