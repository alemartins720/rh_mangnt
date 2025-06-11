<?php

it('Tests is an admin user can see the RH users page' , function() {

    // Criar o admin
    addAdminUser();

    // Efetuar login com o admin
    auth()->loginUsingId(1);

    // Verifica se acessa com sucesso a pagina de RH users
    expect($this->get('/rh-users')->status())->toBe(200);

});