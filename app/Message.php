<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	public $timestamp = false;

    protected $fillable = ['message', 'numero', 'date_env', 'heur', 'user_id'];
}
