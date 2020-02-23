<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class StatistiqueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$env = Message::where('type', 'enveloppe')->get();

        $sumenv = 0;

        foreach ($env as $value) 
        {
            $sumenv = $sumenv + $value->nbr_numero;
        }

    	$sach = Message::where('type', 'sachet')->get();

        $sumsach = 0;

        foreach ($sach as $value) 
        {
            $sumsach = $sumsach + $value->nbr_numero;
        }

    	$car = Message::where('type', 'carton')->get();

        $sumcar = 0;

        foreach ($car as $value) 
        {
            $sumcar = $sumcar + $value->nbr_numero;
        }

    	$col = Message::where('type', 'colis')->get();

        $sumcol = 0;

        foreach ($col as $value) 
        {
            $sumcol = $sumcol + $value->nbr_numero;
        }

    	$messages = Message::limit(50)->orderBy('id', 'DESC')->get();

    	$i = 1;

    	return view('statistique', compact('sumenv', 'sumsach', 'sumcar', 'sumcol', 'messages', 'i'));
    }
}
