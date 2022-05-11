<?php

namespace Database\Seeders;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        foreach(Admin::all() as $item){
            $item->employee()->create(
                array(
                    'name' => $faker->name,
                    'email' => $faker->unique()->safeEmail,
                    'email_verified_at' => now(),
                    'password' => 'password',
                    'remember_token' => Str::random(10),
                    'document' => $this->cpfRandom(),
                    'birthday' => '15/07/1995',
                    'job_position' => 'Estágiario',
                    'cep' => '89950000',
                    'street' => 'Rua XYZ',
                    'number' => '123',
                    'complement' => 'Casa',
                    'neighborhood' => 'Centro',
                    'city' => 'Barracão',
                    'state' => 'PR',
                    'country' => 'Brasil',
                )
            );

            $item->employee()->create(
                array(
                    'name' => $faker->name,
                    'email' => $faker->unique()->safeEmail,
                    'email_verified_at' => now(),
                    'password' => 'password',
                    'remember_token' => Str::random(10),
                    'document' => $this->cpfRandom(),
                    'birthday' => '15/07/1995',
                    'job_position' => 'Estágiario',
                    'cep' => '89950000',
                    'street' => 'Rua XYZ',
                    'number' => '123',
                    'complement' => 'Casa',
                    'neighborhood' => 'Centro',
                    'city' => 'Barracão',
                    'state' => 'PR',
                    'country' => 'Brasil',
                )
            );

        }

    }

    private function cpfRandom($mascara = "1") {
        $n1 = rand(0, 9);
        $n2 = rand(0, 9);
        $n3 = rand(0, 9);
        $n4 = rand(0, 9);
        $n5 = rand(0, 9);
        $n6 = rand(0, 9);
        $n7 = rand(0, 9);
        $n8 = rand(0, 9);
        $n9 = rand(0, 9);
        $d1 = $n9 * 2 + $n8 * 3 + $n7 * 4 + $n6 * 5 + $n5 * 6 + $n4 * 7 + $n3 * 8 + $n2 * 9 + $n1 * 10;
        $d1 = 11 - (self::mod($d1, 11) );
        if ($d1 >= 10) {
            $d1 = 0;
        }
        $d2 = $d1 * 2 + $n9 * 3 + $n8 * 4 + $n7 * 5 + $n6 * 6 + $n5 * 7 + $n4 * 8 + $n3 * 9 + $n2 * 10 + $n1 * 11;
        $d2 = 11 - (self::mod($d2, 11) );
        if ($d2 >= 10) {
            $d2 = 0;
        }
        $retorno = '';
        if ($mascara == 1) {
            $retorno = '' . $n1 . $n2 . $n3 . "." . $n4 . $n5 . $n6 . "." . $n7 . $n8 . $n9 . "-" . $d1 . $d2;
        } else {
            $retorno = '' . $n1 . $n2 . $n3 . $n4 . $n5 . $n6 . $n7 . $n8 . $n9 . $d1 . $d2;
        }
        return $retorno;
    }

    /**
     * @param type $dividendo
     * @param type $divisor
     * @return type
     */
    private static function mod($dividendo, $divisor) {
        return round($dividendo - (floor($dividendo / $divisor) * $divisor));
    }
}
