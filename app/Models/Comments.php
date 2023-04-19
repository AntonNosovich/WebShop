<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    public function answers()
    {
        return $this->hasMany(Answers::class,'comment_id','id');
    }
}
