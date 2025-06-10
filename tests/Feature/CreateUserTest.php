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

    // Verifica se o user RH foi inserido com sucesso
    $this->assertDatabaseHas('users', [
        'name' => 'RH user 1',
        'email' =>'rhuser@gmail.com',
        'role' => 'rh',
        'permissions' => '["rh"]',
    ]);
});

// it('Tests if an RH users can insert a new colaborator', function () {

//     // Criar user 
//     addAdminUser();

//     // Criar os departamentos
//     addDepartment('Administração');
//     addDepartment('Recursos Humanos');

//     // Login com admin
//     $result = $this->post('/login', [
//         'email' => 'admin@rhmangnt.com',
//         'password' => 'Aa123456'
//     ]);

//     // Verifica se o login foi feito com sucesso
//     expect($result->status())->toBe(302);
//     expect($result->assertRedirect('/home'));

//     // Verifica se o admin consegue adicionar user do RH
//     $result = $this->post('/rh-users/create-colaborator', [
//         'name' => 'RH user',
//         'email' => 'rh2@rhmangnt.com',
//         'select_department' => 2,
//         'address' => 'Rua dez',
//         'zip_code' => '1234-123',
//         'city' => 'Lisboa',
//         'phone' => '123456789',
//         'salary' => '1000.00',
//         'admission_date' => "2025-06-09",
//         'role' => 'rh',
//         'permissions' => '["rh"]'
//     ]);

//     // Verifica se o user RH foi inserido com sucesso
//     $this->assertDatabaseHas('users', [
//         'name' => 'RH user',
//         'email' => 'rh2@rhmangnt.com',
//         'role' => 'rh',
//         'permissions' => '["rh"]'
//     ]);
// });

function addDepartment($name){
    Department::insert([
        'name' => $name,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}
