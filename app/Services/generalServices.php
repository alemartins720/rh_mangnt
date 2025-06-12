<?php

namespace App\Services;

use Illuminate\Process\FakeProcessResult;

class generalServices
{
    public static function checkIfSalaryIsGreaterThan($salary, $amount)
    {
        return $salary > $amount;
    }

    public static function createPhraseWithNameAndSalary($name, $salary)
    {
        return "O salário do(a) $name é $salary";
    }

    public static function getSalaryWithBonus($salary, $bonus)
    {
        return $salary + $bonus;
    }

    public static function fakeDataInJson()
    {
        // Cria 10 clientes com dados falsos
        $clients = [];
        for ($i = 0; $i < 10; $i++) {
            $clients[] = [
                'name' => \Faker\Factory::create()->name(),
                'email' => \Faker\Factory::create()->email(),
                'phone' => \Faker\Factory::create()->phoneNumber(),
                'address' => \Faker\Factory::create()->address(),
            ];
        }

        return json_encode($clients, JSON_PRETTY_PRINT);
    }

    public static function jsonComplexData()
    {
        return json_encode(
            [
                'name' => 'João Ribeiro',
                'email' => 'joaoribeiro@gmail.com',
                'moradas' => [
                    [
                        'rua' => 'Rua 1',
                        'cidade' => 'Lisboa',
                        'pais' => 'Portugal'
                    ],
                    [
                        'rua' => 'Rua 2',
                        'cidade' => 'Porto',
                        'pais' => 'Portugal'
                    ]

                ],
                'telefones' => [
                    'phones' => [
                        '123456789',
                        '979797979',
                        '535353535'
                    ],
                    'mobiles' => [
                        '767676767',
                        '535353535',
                        '545545454'
                    ]
                ]
            ]
        );
    }
}
