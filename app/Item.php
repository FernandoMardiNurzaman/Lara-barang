<?php

namespace App;

use App\Category;
use App\ItemExit;
use App\Condition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Item extends Model
{
    protected $fillable = [
        'condition_id', 'category_id', 'code', 'item_name', 'price', 'fromWhere', 'fault_items', 'photo'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function ItemExit()
    {
        return $this->hasMany(ItemExit::class);
    }
    public function getImgAttribute()
    {
        $path = public_path() . 'uploads/images/' . $this->photo;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }
}
