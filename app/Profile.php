<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Html\Editor\Fields\Hidden;

class Profile extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'position', 'gender', 'image_user'
    ];
    protected $hidden = [
        'password'
    ];
}
