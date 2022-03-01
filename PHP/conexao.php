<?php
    $servidor="127.0.0.1"; //$ para declarar variaveis
    $usuario="root";
    $senha="usbw";
    $banco="Folha_Pagto";

    $conexao = mysqli_connect ($servidor, $usuario, $senha, $banco); //para conectar ao banco de dados
    if ($conexao){
    }else{
        echo 'Erro ao conectar com o servidor.';
    }
?>