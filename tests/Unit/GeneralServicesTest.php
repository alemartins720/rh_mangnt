<?php

use App\Services\generalServices;

it('Tests if the salary is grather than a specific amount', function () {
    $salary = 1000;
    $amount = 500;

    $result = generalServices::checkIfSalaryIsGreaterThan($salary, $amount);

    expect($result)->toBeTrue();
});

it('Tests if the salary is not grather than a specific amount', function () {
    $salary = 1000;
    $amount = 1500;

    $result = generalServices::checkIfSalaryIsGreaterThan($salary, $amount);

    expect($result)->toBeFalse();
});

it('Tests if the phrase is created correctly', function () {
    $name = "João Ribeiro";
    $salary = 1000;

    $result = generalServices::createPhraseWithNameAndSalary($name, $salary);

    expect($result)->toBe('O salário do(a) João Ribeiro é 1000');
});

it('Tests if the salary with bonus is calculater correctly', function () {
    $salary = 1000;
    $bonus = 250;

    $result = generalServices::getSalaryWithBonus($salary, $bonus);

    expect($result)->toBe(1250);
});

it('Tests if the fake json data is created correctly', function () {

    $results = GeneralServices::fakeDataInJson();

    $clients = json_decode($results, true);

    expect(count($clients))->toBeGreaterThanOrEqual(1);
    expect($clients[0])->toHaveKeys(['name', 'email', 'phone', 'address']);
})->skip('Temporariamente Inativo');

it('Tests if the complex data is created correctly', function () {

    $result = GeneralServices::jsonComplexData();

    $data = json_decode($result, true);

    expect($data)->toHaveKeys(['name', 'email', 'moradas', 'telefones']);
    expect($data['moradas'])->toBeArray();
    expect($data['moradas'][0])->toHaveKeys(['rua', 'cidade', 'pais']);
    expect($data['telefones'])->toHaveKeys(['phones', 'mobiles']);
    expect($data['telefones']['phones'])->toBeArray();
    expect($data['telefones']['mobiles'])->toBeArray();
})->todo('Rever código deste teste');
