<?php

namespace App;

use App\User;
use App\Status;
use Illuminate\Database\Eloquent\Model;


class Schedule extends Model
{


    protected $fillable = [
        'user_id',
        'status_id',
        'schedule_name',
        'declaration',

    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Status()
    {
        return $this->belongsTo(Status::class);
    }

    public function getDateAttribute()
    {
        return $this->created_at == $this->updated_at;
    }
}
