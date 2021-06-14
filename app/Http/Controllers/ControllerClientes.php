<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerClientes extends Controller
{
    public function actionCadastraCliente(Request $request)
    {
        $verificar_email = DB::select('SELECT email FROM clientes WHERE email = :email', [':email' => $request->email]);
        if (count($verificar_email) === 0) {
            $inserir = DB::insert('INSERT INTO clientes (nome, email) VALUES(:nome, :email)', [
                ':nome' => $request->nome,
                ':email' => $request->email
            ]);
            if ($inserir === true) {
                $aviso = "Cliente cadastrado";
                $cor = "success";
            } else {
                $aviso = "Algum campo erro ocorreu";
                $cor = "danger";
            }
        } else {
            $aviso = 'Este email já existe';
            $cor = "danger";
        }
        return redirect()->route('home')->with('aviso', ['msg' => $aviso, 'cor' => $cor]);
    }

    public function tableClientes()
    {
        $listaClientes = DB::select('SELECT * FROM clientes');
        $array = [
            'listaClientes' => $listaClientes
        ];
        return view('tableCliente', $array);
    }
}
