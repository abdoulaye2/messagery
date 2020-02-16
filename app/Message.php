<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	public $timestamps = false;

    protected $fillable = ['message', 'numero', 'nbr_numero', 'date_env', 'heur', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
