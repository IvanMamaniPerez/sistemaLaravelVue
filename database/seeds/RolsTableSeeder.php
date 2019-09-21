<?php

use Illuminate\Database\Seeder;
use App\Rol;
class RolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Rol::truncate();
        $rol = new Rol;
        $rol->descripcion = "descripcion 1"
        $rol->save(); 
    }
}
