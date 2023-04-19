<?php

namespace Database\Seeders;

use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstMenuTool=Menu::create([

            'name'=>'Menu Settings',
            'route'=>'menus.create',
            'image'=>'uploads/menu.svg',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),

        ]);
        $firstMenuTool->assignRole('super-manager');

    }
}
