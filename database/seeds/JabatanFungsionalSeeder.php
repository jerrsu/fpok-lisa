<?php

use Illuminate\Database\Seeder;

class JabatanFungsionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatan_fungsional')->insert([
            'nama' => 'ADMINISTRATOR',
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
        ]);
    }
}
