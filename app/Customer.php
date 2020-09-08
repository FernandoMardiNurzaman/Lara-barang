<?php

namespace App;

use App\ItemExit;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customer_name',
        'addrees',
        'bandwith',
        'price',
        'height_tower',
        'informasion'
    ];

    public function ItemExit()
    {
        return $this->hasMany(ItemExit::class);
    }
}
