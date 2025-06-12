<?php

use App\Models\User;
use App\Models\Department;

use Egulias\EmailValidator\Result\Reason\ExpectingATEXT;

it('Tests if an admin can insert a new Rh user', function () {

    // Criar user admin
    addAdminUser();

    // Criar os departamentos
    addDepartment('Administração');
    addDepartment('Recursos Humanos');

    // Login com admin
        $result = $this->post('/login', [
        'email' => 'admin@rhmangnt.com',
        'password' => 'Aa123456'
    ]);

    // Verifica se o login foi feito com sucesso
    expect($result->status())->toBe(302);
    expect($result->assertRedirect('/home'));

    // Verifica se o admin consegue adicionar user do RH
    $result = $this->post('/rh-users/create-colaborator', [
        'name' => 'RH user 1',
        'email' => 'rhuser@gmail.com',
        'select_department' => 2,
        'address' => 'Rua 1',
        'zip_code' => '1234-123',
        'city' => '1234-City 1',
        'phone' => '123456789',
        'salary' => '1000.00',
        'admission_date' => "2021-01-10",
        'role' => 'rh',
        'permissions' => '["rh"]',
    ]);

  
    expect(User::where('email' , 'rhuser@gmail.com'));
});

it('Tests if an RH users can insert a new colaborator', function () {

    // Criar user 
    addRhUser();

    // Criar os departamentos
    addDepartment('Administração');
    addDepartment('Recursos Humanos');
    addDepartment('Armazem');

    // Login com rh
        $this->post('/login', [
        'email' => 'rh1@rhmangnt.com',
        'password' => 'Aa123456'
    ]);


    // Verifica se o login foi feito com sucesso
    expect(auth()->user()->role)->toBe('rh');

    // Verifica se o admin consegue adicionar user do RH
    $result = $this->post('/rh-users/management/create-colaborator', [
        'name' => 'Colaborator 1',
        'email' => 'colaborator1@gmail.com',
        'select_department' => 3,
        'address' => 'Rua onzwe',
        'zip_code' => '1234-000',
        'city' => 'City 2',
        'phone' => '123456789',
        'salary' => '1000.00',
        'admission_date' => "2025-06-09",
        'role' => 'colaborator',
        'permissions' => '["colaborator"]'
    ]);

 
    expect(User::where('email' , 'colaborator1@gmail.com'));
});

function addDepartment($name){
    Department::insert([
        'name' => $name,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}
