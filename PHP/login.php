<?php
include 'conexao.php';

$usuario = $_POST ["txt_registroNumero"]; 
$senha = $_POST ["txt_senha"];

$sql = mysqli_query($conexao, "select * from tb_funcionarios where (N_Registro='$usuario') and 	tb_senha='$senha'");

if (mysqli_num_rows($sql)>0){
    $sql = mysqli_query($conexao, "select * from tb_funcionarios where (N_Registro='$usuario') and tb_acesso='1'");
    if (mysqli_num_rows($sql)>0){
        echo  "<script>
        alert('Logado, Bem Vindo(a) ADM'); //Vai avisar que está Logado
        window.location.replace('../MenuAdmin.html'); //Redireciona para a pag de acesso dependendo da sua prioridade, se é de nivel 1 ou 2
        </script>";
    }
    else{
        echo  "<script>
        alert('Logado, Bem Vindo(a) COMUM'); //Vai avisar que está Logado
        window.location.replace('../Login.html'); //Redireciona para a pag de acesso dependendo da sua prioridade, se é de nivel 1 ou 2
        </script>";
    }
}
else{
    echo "<script>
    window.location.replace('../Login.html'); //Redireciona para a pag de login de novo
    alert('N° do registro ou senha estão incorretos'); //Vai avisar que está errado
    </script>";
    //O header ficava atropelando o alert então substitui tudo pelo js
}
?>