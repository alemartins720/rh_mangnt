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