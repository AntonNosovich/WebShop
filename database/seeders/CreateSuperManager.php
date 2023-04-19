<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateSuperManager extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superManager=User::create([

                'name'=>'SuperManager',
                'email'=>'nosovicanton6@gmail.com',
                'password'=>11111111,
                'lastname'=>'SuperManager',
                'address'=>'Belarus',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),

        ]);

        Role::create([

            'name'=>'super-manager',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),

        ]);

        $superManager->assignRole('super-manager','manager');
    }
}
