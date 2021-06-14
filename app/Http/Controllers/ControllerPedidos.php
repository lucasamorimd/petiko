<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequestPedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;

class ControllerPedidos extends Controller
{
    public function formPedido()
    {
        $listaClientes = DB::select('SELECT * FROM clientes');
        return view('cadastrarPedido', ['clientes' => $listaClientes]);
    }
    public function pedidosAjax(Request $request)
    {
        $response = Http::pool(fn (Pool $pool) => [
            $pool->as('postmon')->get('https://api.postmon.com.br/v1/cep/' . $request->cep),
            $pool->as('viacep')->get('https://viacep.com.br/ws/' . $request->cep . '/json/unicode/'),
        ]);
        $array = array(
            'postmon' => $response['postmon']->json(),
            'viacep' => $response['viacep']->json()
        );
        return $array;
    }

    public function actionCadastrarPedido(StoreRequestPedido $request)
    {
        if ($request->select_cliente) {
            $insert = DB::insert('INSERT INTO pedidos(
                nome_pedido,
                id_cliente,
                CEP_cliente, 
                Endereco_cliente,
                Cidade_cliente,
                Estado_cliente,
                UF_cliente,
                Bairro_cliente,
                Complemento_cliente) 
                VALUES(
                    :nome_pedido,
                    :id_cliente,
                    :CEP_cliente,
                    :Endereco_cliente,
                    :Cidade_cliente,
                    :Estado_cliente,
                    :UF_cliente,
                    :Bairro_cliente,
                    :Complemento_cliente
                )', [
                ':nome_pedido' => $request->Nome_pedido,
                ':id_cliente' => $request->select_cliente,
                ':CEP_cliente' => $request->CEP_cliente,
                ':Endereco_cliente' => $request->Endereco_cliente,
                ':Cidade_cliente' => $request->Cidade_cliente,
                ':Estado_cliente' => $request->Estado_cliente,
                ':UF_cliente' => $request->UF_cliente,
                ':Bairro_cliente' => $request->Bairro_cliente,
                ':Complemento_cliente' => $request->Complemento_cliente,

            ]);
            if ($insert === true) {
                $msg = "Pedido cadastrado com sucesso!";
                $cor = "success";
                return redirect()->route('home')->with('aviso', ['msg' => $msg, 'cor' => $cor]);
            }
            $msg = "houve algum erro no salvamento";
            $cor = "danger";
            return redirect()->route('formPedido')->with('aviso', ['msg' => $msg, 'cor' => $cor]);
        }
        $msg = "Você não selecionou um cliente";
        $cor = "danger";
        return redirect()->route('formPedido')->with('aviso', ['msg' => $msg, 'cor' => $cor]);
    }

    public function listaPedidos()
    {
        $listaPedidos = DB::select('SELECT * FROM pedidos as p INNER JOIN clientes as c ON p.id_cliente = c.id');
        return view('tablePedidos', ['listaPedidos' => $listaPedidos]);
    }
}
