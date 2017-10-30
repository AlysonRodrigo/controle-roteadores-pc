@extends('layouts.app')

@section('content')
    <div class="container">
        {!! form($form->add('edit','submit',[
                           'attr' => ['class' => 'btn btn-primary btn-block'],
                           'label' => Icon::create('floppy-disk') .'&nbsp;&nbsp;Salvar access'
                        ])) !!}
    </div>
@endsection