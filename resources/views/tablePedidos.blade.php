@extends('layouts.template')
@section('pedidotable', 'active')
@section('title', 'Lista de Pedidos')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-success">
                <h4 class="card-title ">Lista de Clientes</h4>
                <p class="card-category">Todos os Clientes cadastrados</p>
            </div>
            <div class="card-body">
                @if(count($listaPedidos)>0)
                <div class="table-responsive">
                    <table class="table table-bordered table-success table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Cliente</th>
                                <th class="text-center">Nome do Pedido</th>
                                <th class="text-center">Endereço</th>
                                <th class="text-center">Cidade</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Bairro</th>
                                <th class="text-center">CEP</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listaPedidos as $pedido)
                            <tr>
                                <td class="text-center">{{$pedido->nome}}</td>
                                <td class="text-center">{{$pedido->nome_pedido}}</td>
                                <td class="text-center">{{$pedido->Endereco_cliente}}</td>
                                <td class="text-center">{{$pedido->Cidade_cliente}}</td>
                                <td class="text-center">{{$pedido->Estado_cliente}}</td>
                                <td class="text-center">{{$pedido->Bairro_cliente}}</td>
                                <td class="text-center">{{$pedido->CEP_cliente}}</td>
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