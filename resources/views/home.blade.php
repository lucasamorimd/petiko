@extends('layouts.template')
@section('title', 'Inicial')
@section('home', 'active')
@section('content')
@if(session('aviso'))
<div class="alert alert-{{session('aviso')['cor']}}" role="alert">
    {{session('aviso')['msg']}}
</div>
@endif
<div class="row justify-content-center">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="puff-in-center">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <a href="#">
                        <div class="card-icon">
                            <i class="material-icons" style="color:#fff;">person</i>
                        </div>
                    </a>
                    <p class="card-category">Clientes</p>
                    <h3 class="card-title">
                        {{$clientes}}
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">

                        Total geral de clientes cadastrados
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">

        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <a href="#">
                    <div class="card-icon">
                        <i class="material-icons" style="color:#fff;">event</i>
                    </div>
                </a>
                <p class="card-category">Pedidos</p>
                <h3 class="card-title">
                    {{$pedidos}}
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    Total geral de pedidos.
                </div>
            </div>
        </div>

    </div>
</div>
@endsection