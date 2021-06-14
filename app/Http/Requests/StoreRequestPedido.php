<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequestPedido extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return  [
            'select_cliente' => 'required',
            'Nome_pedido' => 'required',
            'CEP_cliente' => 'required',
            'Cidade_cliente' => 'required',
            'Estado_cliente' => 'required',
            'UF_cliente' => 'required',
            'Endereco_cliente' => 'required',
            'Bairro_cliente' => 'required',
            'Complemento_cliente' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'select_cliente.required' => 'Você não escolheu um cliente',
            'Nome_pedido.required' => 'Qual é o nome do pedido?',
            'CEP_cliente.required' => 'Informe um CEP válido para preencher automaticamente o endereço!',
            'Cidade_cliente.required' => 'Coloque a cidade onde o pedido será entregue',
            'Estado_cliente.required' => 'Em qual estado fica a cidade do cliente?',
            'Endereco_cliente.required' => 'Precisa ser colocado um endereço para entrega',
            'UF_cliente.required' => 'Coloque também a UF apenas por precaução',
            'Bairro_cliente.required' => 'Qual é o bairro?',
            'Complemento_cliente.required' => 'Finalize dizendo se o endereço é casa, apartamento e etc.'
        ];
    }
}
