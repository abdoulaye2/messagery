<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Message extends Model
{
	public $timestamps = false;

    protected $fillable = ['message', 'numero', 'nbr_numero', 'date_env', 'heur', 'type', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
