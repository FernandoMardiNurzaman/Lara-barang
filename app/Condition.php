<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class Condition extends Model
{
    protected $fillable = [
        'condition_name'
    ];


    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
