<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class AccessForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('route_user', 'text')
            ->add('route_password', 'password')
            ->add('ppoe_user', 'text')
            ->add('ppoe_password', 'password')
            ->add('wifi_user', 'text')
            ->add('wifi_password', 'password');
    }
}
