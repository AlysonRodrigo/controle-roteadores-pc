@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {!! \Button::primary('Cadastrar roteador')->asLinkTo('admin.access.create') !!}
        <?php $icon = Icon::create('floppy-disk') ?>
        {!! \Table::withContents($access->items())
                ->striped()
                ->callback('Ações', function ($field,$model){
                  $linkEdit = route('admin.access.edit',['access' => $model->id]);
                  $linkShow = route('admin.access.show',['access' => $model->id]);
                     return Button::link(Icon::create('pencil') .' Editar')->asLinkTo($linkEdit).'|'.
                            Button::link(Icon::create('folder-open') .'&nbsp;&nbsp;Ver')->asLinkTo($linkShow);

                })!!}
    </div>
    <div class="text-center">
        {!! $access->links() !!}
    </div>
</div>
@endsection
