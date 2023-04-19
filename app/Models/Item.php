<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guard_name = 'web';
    protected $guarded = [];
    protected $table = 'items';
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function advertising()
    {
        return $this->hasMany(Advertising::class,'item_id','id');
    }
}
