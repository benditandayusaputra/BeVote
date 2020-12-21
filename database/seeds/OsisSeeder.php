<?php

use App\Osis;
use Illuminate\Database\Seeder;

class OsisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $osis = new Osis();
        $osis->chairman_name = 'Ketua';
        $osis->vice_chairman_name = 'Wakil Ketua';
        $osis->moto = 'Moto';
        $osis->mission = 'Misi';
        $osis->vision = 'Visi';
        $osis->photo = 'default.png';
        $osis->save();
    }
}
