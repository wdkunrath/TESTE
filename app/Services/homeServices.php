<?php

namespace App\Services;


class HomeServices
{
    function __construct() {
        $listClientes = json_decode(file_get_contents('http://www.mocky.io/v2/5de67e9f370000540009242b'),true);
        $historicoCompra = json_decode(file_get_contents('http://www.mocky.io/v2/5e960a2d2f0000f33b0257c4'),true);

        $this->listClientes  = $listClientes;
        $this->historicoCompra  = $historicoCompra;
    }

    public function listCliente(){
        $cliente = [];

        usort($this->historicoCompra, function ($a, $b){
            $valor = strcmp($a['valorTotal'], $b['valorTotal']);
            return $valor;
        });

        $cpfs = array_unique(array_column($this->historicoCompra,'cliente'));

        foreach ($cpfs as $chave => $item) {
            foreach ($this->listClientes as $key => $value) {
                if($value['cpf'] == $item){
                    $cliente[] = $value;
                }
            }
        }

        return $cliente;
    }

    public function maiorCompra(){
        $maiorCompra = '';

        $valores = array_column($this->historicoCompra,'valorTotal');
        arsort($valores);

        foreach ($this->historicoCompra as $chave => $item) {
            if(date('Y', strtotime($item['data'])) == "2019"){
                if($item['valorTotal'] == $valores[48]){
                    foreach ($this->listClientes as $key => $value) {
                        if($item['cliente'] == $value['cpf']){
                            $maiorCompra = $value['nome'];
                        }
                    }
                }
            }
        }

        return $maiorCompra;
    }

    public function listaClienteComprante($ano){
        $listaClienteComprante = [];
        $clienteMaisCompras = [];
        $cliente = [];

        /* Verifica a data Recebida e separa todas a compras do ano solicitado
        OBS: pode ser colocado filtro e separada como função*/
        foreach ($this->historicoCompra as $chave => $item) {
            if(date('Y', strtotime($item['data'])) == $ano){
                foreach ($this->listClientes as $key => $value) {
                    if($item['cliente'] == $value['cpf']){
                        $listaClienteComprante[] = $value;
                    }
                }
            }
        }

        $cpfs = array_unique(array_column($listaClienteComprante,'cpf'));

        /* Conta quantas compras tem cada Cliente e lista as compras feitas
        OBS: Pode vir a ser uma função separada*/
        foreach ($cpfs as $key => $cpf){
            $array = HomeServices::recursive($listaClienteComprante, $cpf);
            $clienteMaisCompras[] = [
                array_unique($array[0]),
                'count'   => count($array)
            ];
        }

        /* Verifica se tem mais de uma compra*/
        foreach ($cpfs as $i => $item){
            foreach ($clienteMaisCompras as $x => $value) {
                $cpfC = implode(array_unique(array_column($value,'cpf')));
                if($cpfC == $item){
                    if($clienteMaisCompras[$x]['count'] > 1){
                        $cliente[] = $value;
                    }
                }
            }
        }

        return $cliente;
    }

    protected function recursive($array,$cpf){
        $clienteMais = [];

        for ($i=0; $i < count($array); $i++) {
            if($array[$i]['cpf'] == $cpf){
                $clienteMais[] = $array[$i];
            }
        }

        return $clienteMais;
    }
}
