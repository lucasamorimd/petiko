@extends('layouts.template')
@section('clientetable', 'active')
@section('title', 'Lista de Clientes')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-success">
                <h4 class="card-title ">Lista de Clientes</h4>
                <p class="card-category">Todos os Clientes cadastrados</p>
            </div>
            <div class="card-body">
                @if(count($listaClientes)>0)
                <div class="table-responsive">
                    <table class="table table-bordered table-success table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Nome</th>
                                <th class="text-center">E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listaClientes as $cliente)
                            <tr>
                                <td class="text-center">{{$cliente->nome}}</td>
                                <td class="text-center">{{$cliente->email}}</td>
                            </tr>
                            @endforeach
                            @else
                            <div class="card">
                                <div class="card-body">
                                    Não há dados cadastrados ainda.
                                </div>
                            </div>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection