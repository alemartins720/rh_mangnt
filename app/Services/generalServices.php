<?php

namespace App\Services;

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
}
