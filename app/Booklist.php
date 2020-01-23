<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booklist extends Model
{
    protected $table = 'booklist';
    
    public $timestamps = false;

    public function User()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
    
    public function Lapak()
    {
        return $this->belongsTo('App\Lapak', 'id_lapak');
    }
}
