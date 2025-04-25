<div>
    <h3>Dados do Admin:</h3>
    <p>Nome: {{ $admin->name }}</p>
    <p>Email: {{ $admin->email }}</p>
    <p>Perfil: {{ $admin->role }}</p>
    <p>Permissões</p>
    <ul>
        @foreach(json_decode($admin->permissions) as $permission)
            <li>{{ $permission }}</li>
        @endforeach
    </ul>
    <h3>Detalhes</h3>
    <p>Endereço: {{ $admin->detail->address }}</p>
    <p>Zip Code: {{ $admin->detail->zip_code }}</p>
    <p>Cidade: {{ $admin->detail->city }}</p>
    <p>Telefone: {{ $admin->detail->phone }}</p>
    <p>Salário: {{ $admin->detail->salary }} €</p>
    <p>Data de Admissão: {{ $admin->detail->admission_date }}</p>
    <h3>Departamento</h3>
    <p>{{ $admin->department->name }}</p>
</div>