@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {!! \Button::primary('Cadastrar usuário')->asLinkTo(route('admin.users.create')) !!}
        <?php $icon = Icon::create('floppy-disk') ?>
        {!! \Table::withContents($users->items())
            ->striped()
             ->callback('Ações', function ($field,$model){
                 $linkEdit = route('admin.users.edit',['user' => $model->id]);
                 $linkShow = route('admin.users.show',['user' => $model->id]);
                 return Button::link(Icon::create('pencil') .' Editar')->asLinkTo($linkEdit).'|'.
                           Button::link(Icon::create('folder-open') .'&nbsp;&nbsp;Ver')->asLinkTo($linkShow);
             }) !!}
    </div>
    <div class="text-center">
    {!! $users->links() !!}
    </div>
</div>
@endsection
