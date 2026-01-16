<?php

namespace Database\Seeders;
use App\Models\Pegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for($i=0; $i < ; $i++) {
            Pegawai::create([
                'nama_pegawai' => $faker->name(),
                'nik' => $faker0>
            ])

        }

        Pegawai::create([
            'nama_pegawai' => 'Alif Muhammad',
            'nik' => '12345678',
            'alamat' => 'Jl.Raya No.123',
            'umur' => 25,
            'tanggal_lahir' => '1998-05-15',
            'tempat_lahir' => 'Jakarta',
            'jenis_kelamin' => 'laki-laki'
        ]);
    }
}
