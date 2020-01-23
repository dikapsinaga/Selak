<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapak extends Model
{
    protected $table = 'lapak';

    public $timestamps = false;

    public function Booklist()
    {
        return $this->hasMany('App\Booklist');
    }
}
