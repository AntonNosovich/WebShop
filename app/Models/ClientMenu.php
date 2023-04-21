<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class ClientMenu extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $table = 'client_menu';

    protected $guard_name = 'web';
    protected $fillable = [
        'name',
        'slag',
        'is_new',
        'active',
        'parent_id'
    ];

    public function child()
    {
        return $this->hasMany(ClientMenu::class,'parent_id','id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_tool','tool_id','product_id');
    }

     public function advertising()
     {
         return $this->hasOne(Advertising::class,'category_id','id');
     }

}
