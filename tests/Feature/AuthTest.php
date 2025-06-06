<?php

use App\Models\User;

use Egulias\EmailValidator\Result\Reason\ExpectingATEXT;

it('Display the logon page when not logged in', function () {

    // Verifica no contexto do Fortify, se ao entrar na página inicial, vai ser redirecionado para a página de login
    $result = $this->get('/')->assertRedirect('/login');

    // Verificar se o resultado é 302
    expect($result->status())->toBe(302);

    // Verifica  se a rota de login é acessível com status 200
    expect($this->get('/login')->status())->toBe(200);

    // Verifica se a página de login contém o texto "Esqueceu a sua senha?"
    expect($this->get('/login')->content())->toContain("Esqueceu a sua senha?");
});

it('Display the recover password page correctly', function () {
    expect($this->get('/forgot-password')->status())->toBe(200);
    expect($this->get('/forgot-password')->content())->toContain("Já sei a minha senha?");
});

it('Test if an admin user can login with success' , function(){

    // Criar um admin
    User::insert([
        'department_id' => 1,   // Administração
            'name' => 'Administrador',
            'email' => 'admin@rhmangnt.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Aa123456'),
            'role' => 'admin',
            'permissions' => '["admin"]',
            'created_at' => now(),
            'updated_at' => now(),
    ]);

    // Login com o admin criado
    $result = $this->post('/login' , [
        'email' => 'admin@rhmangnt.com',
        'password' => 'Aa123456'
    ]);

    // Verifica se o login foi feito com sucesso
    expect($result->status())->toBe(302);
    expect($result->assertRedirect('/home'));
});
