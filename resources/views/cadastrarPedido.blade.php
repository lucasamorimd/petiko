@extends('layouts.template')
@section('title', 'Cadastrar Pedido')
@section('pedidoform', 'active')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Pedido</h4>
                <p class="card-category">Dados de Cadastro</p>
            </div>
            <div id="bodyCard" class="card-body">
                @if(session('aviso'))
                <div class="alert alert-{{session('aviso')['cor']}}" role="alert">
                    {{session('aviso')['msg']}}
                </div>
                @endif
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form id="formPedido" method="post" action="{{route('formPedidoAction')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="cliente">Cliente</label>
                                            </div>
                                            <select class="custom-select" id="cliente" name="select_cliente">
                                                <option value="{{null}}">Escolha...</option>
                                                @if(count($clientes)>0)
                                                @foreach($clientes as $cliente)
                                                <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="validateNome_pedido" class="form-group">
                                        <label class="bmd-label-floating">Nome do Pedido</label>
                                        <input id="Nome_pedido" type="text" class="form-control" name="Nome_pedido">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="validateCEP" class="form-group">
                                        <label class="bmd-label-floating">CEP</label>
                                        <input onkeyup="teste()" id="CEP" type="text" class="form-control" name="CEP_cliente">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div id="validateCidade" class="form-group">
                                        <label class="bmd-label-floating">Cidade</label>
                                        <input id="Cidade" type="text" class="form-control" name="Cidade_cliente">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div id="validateEmail" class="form-group">
                                        <label class="bmd-label-floating">Estado</label>
                                        <input id="Estado" type="text" class="form-control" name="Estado_cliente">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div id="validateUF" class="form-group">
                                        <label class="bmd-label-floating">U.F</label>
                                        <input id="UF" type="text" class="form-control" name="UF_cliente">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="validateEndereco" class="form-group">
                                        <label class="bmd-label-floating">Endereco</label>
                                        <input id="Endereco" type="text" class="form-control" name="Endereco_cliente">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="validateBairro" class="form-group">
                                        <label class="bmd-label-floating">Bairro</label>
                                        <input id="Bairro" type="text" class="form-control" name="Bairro_cliente">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="validateComplemento" class="form-group">
                                        <label class="bmd-label-floating">Complemento</label>
                                        <input id="Complemento" type="text" class="form-control" name="Complemento_cliente">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection