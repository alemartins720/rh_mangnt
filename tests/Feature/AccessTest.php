<?php

use Nette\Localization\ITranslator;

it('Tests is an admin user can see the RH users page', function () {

    // Criar o admin
    addAdminUser();

    // Efetuar login com o admin
    auth()->loginUsingId(1);

    // Verifica se acessa com sucesso a pagina de RH users
    expect($this->get('/rh-users')->status())->toBe(200);
});

it('Tests if is not possible to acces the home page without logged user', function () {

    // Verifica se é possível acessar a home page
    expect($this->get('/home')->status())->toBe(302);

    // ou

    expect($this->get('/home')->status())->not()->toBe(200);
});

it('Tests if user logged in can access to the login page', function () {

    //Adicionar admin a base de dados
    addAdminUser();

    // Login automático
    auth()->loginUsingId(1);

    expect($this->get('/login')->status())->not()->toBe(200);
});

it('Tests if user logged in can access to the recover password page', function () {

    //Adicionar admin a base de dados
    addAdminUser();

    // Login automático
    auth()->loginUsingId(1);

    expect($this->get('/forgot-password')->status())->not()->toBe(200);
});
