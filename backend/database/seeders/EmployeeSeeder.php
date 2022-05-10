<?php

namespace Database\Seeders;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            'name' => 'Teste',
            'email' => 'teste@teste.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'document' => '632.748.400-09',
            'birth_date' => Carbon::createFromFormat('d/m/Y', '15/07/1995')->startOfDay(),
            'job_position' => 'Estágiario',
            'cep' => '89950000',
            'street' => 'Rua XYZ',
            'number' => '123',
            'complement' => 'Casa',
            'neighborhood' => 'Centro',
            'city' => 'Barracão',
            'state' => 'PR',
            'country' => 'Brasil',
        );

        $admin = Admin::first();

        $admin->employee()->create($data);
    }
}
