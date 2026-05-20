<?php

$produtos = [
    ["nome" => "Braço Robótico", "preco" => 25000],
    ["nome" => "Célula de Solda", "preco" => 45000],
    ["nome" => "Esteira Inteligente", "preco" => 12000]
];

function calcularDesconto($preco, $percentual) {
    return $preco - ($preco * ($percentual / 100));
}

function buscarProdutosCaros($lista) {

    $resultado = [];

    foreach($lista as $produto) {

        if($produto['preco'] > 20000) {
            $resultado[] = $produto;
        }
    }

    return $resultado;
}

function validarProdutos($lista) {

    if(empty($lista)) {
        return false;
    }

    foreach($lista as $produto) {

        if($produto['preco'] < 0) {
            return false;
        }
    }

    return true;
}
?>