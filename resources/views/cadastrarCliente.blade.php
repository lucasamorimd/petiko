@extends('layouts.template')
@section('title', 'Cadastrar Cliente')
@section('clienteform', 'active')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Cliente</h4>
                <p class="card-category">Dados de Cadastro</p>
            </div>
            <div id="bodyCard" class="card-body">
                <form id="formCliente" method="post" action="{{route('formClienteAction')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div id="validateNome" class="form-group">
                                <label class="bmd-label-floating">Nome do Cliente</label>
                                <input id="nome" type="text" class="form-control" name="nome">
                            </div>

                            <div id="validateEmail" class="form-group">
                                <label class="bmd-label-floating">Email</label>
                                <input id="email" type="email" class="form-control" name="email">
                            </div>
                            <button type="submit" onclick="event.preventDefault(); cadastrarCliente()" class="btn btn-primary">Cadastrar</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection