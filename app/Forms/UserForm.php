<?php

namespace App\Forms;

use App\Models\User;
use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('email', 'email')
            ->add('password','password',[
                'label' => 'Senha'
            ])->add('role', 'select', [
                'choices' => [User::ROLE_ADMIN => 'Administrador', User::ROLE_MANAGER => 'Gerente'],
                'selected' => User::ROLE_ADMIN,
                'empty_value' => '=== Selecione o perfil ==='
            ]);

    }
}
