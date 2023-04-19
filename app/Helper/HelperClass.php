<?php

namespace App\Helper;

use App\Http\Controllers\Frontend\Requests\LoginRequest;
use App\Http\Controllers\Frontend\Requests\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class HelperClass
{
    public function getRole(){
        $roles= new Role();

        return($roles->where('id','>',1)->pluck('name'));
    }
}
