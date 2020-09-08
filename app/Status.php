<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['nama_status'];

    public function Schedule()
    {
        return $this->hasMany('App\Schedule');
    }
}
