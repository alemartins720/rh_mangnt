<?php

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
