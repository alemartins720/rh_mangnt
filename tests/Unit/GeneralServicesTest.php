<?php

use App\Services\generalServices;

it('Tests if the salary is grather than a specific amount', function(){
    $salary = 1000;
    $amount = 500;

    $result = generalServices::checkIfSalaryIsGreaterThan($salary , $amount);

    expect($result)->toBeTrue();
});

it('Tests if the salary is not grather than a specific amount', function(){
    $salary = 1000;
    $amount = 1500;

    $result = generalServices::checkIfSalaryIsGreaterThan($salary , $amount);

    expect($result)->toBeFalse();
});

it('Tests if the phrase is created correctly' , function(){
    $name = "João Ribeiro";
    $salary = 1000;

    $result = generalServices::createPhraseWithNameAndSalary($name , $salary);

    expect($result)->toBe('O salário do(a) João Ribeiro é 1000');
});