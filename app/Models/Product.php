<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function comments()
    {
        return $this->hasMany(Comments::class,'product_id','id');
    }

    public function items()
    {
        return $this->hasMany(Item::class,'product_id','id');
    }

    public function images()
    {
        return $this->hasMany(Image::class,'product_id','id');
    }

    public function tools()
    {
        return $this->belongsToMany(ClientMenu::class,'product_tool','product_id','tool_id');
    }
}
