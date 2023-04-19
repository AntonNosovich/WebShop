<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertising extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $guard_name = 'web';


    public function category()
    {
      return $this->belongsTo(ClientMenu::class);
    }

    public function images()
    {
        return $this->hasMany(AdverestingImage::class,'advertising_id','id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
