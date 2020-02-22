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
    	$env = Message::where('type', 'enveloppe');

    	$sach = Message::where('type', 'sachet');

    	$car = Message::where('type', 'carton');

    	$col = Message::where('type', 'colis');

    	$messages = Message::limit(50)->orderBy('id', 'DESC')->get();

    	$i = 1;

    	return view('statistique', compact('env', 'sach', 'car', 'col', 'messages', 'i'));
    }
}
