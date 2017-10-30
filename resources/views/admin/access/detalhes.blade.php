@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">Nome</th>
                    <td>{{$access->name}}</td>
                </tr>
                <tr>
                    <th scope="row">Usuario roteador</th>
                    <td>{{$access->route_user}}</td>
                </tr>
                <tr>
                    <th scope="row">Senha roteador</th>
                    <td>{{$access->route_password}}</td>
                </tr>
                <tr>
                    <th scope="row">Usuário ppoe</th>
                    <td>{{$access->ppoe_user}}</td>
                </tr>
                <tr>
                    <th scope="row">Senha ppoe</th>
                    <td>{{$access->ppoe_password}}</td>
                </tr>
                <tr>
                    <th scope="row">Usuário wifi</th>
                    <td>{{$access->wifi_user}}</td>
                </tr>
                <tr>
                    <th scope="row">Senha wifi</th>
                    <td>{{$access->wifi_password}}</td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-8 col-md-offset-2 text-center">
        {!! \Button::success('Voltar')->asLinkTo(route('admin.access.index')) !!}
    </div>
</div>
@endsection
