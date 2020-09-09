<?php

namespace App;

use App\Item;
use App\User;
use App\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ItemExit extends Model
{
    protected $fillable = [
        'user_id',
        'customer_id',
        'item_id',
        'ip_adrress',
        'backbond',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
