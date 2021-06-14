<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerHome extends Controller
{
    public function home()
    {
        $countClientes = DB::select("SELECT id FROM clientes");
        $countPedidos = DB::select("SELECT id FROM pedidos");

        return view('home', [
            'clientes' => count($countClientes),
            'pedidos' => count($countPedidos),
        ]);
    }
}
