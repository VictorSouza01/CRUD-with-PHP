<?php

include 'conexao.php';

$num = 0;

//isset faz busca 
if(isset($_POST['txt_buscar']) != ''){
    $sql = mysqli_query($conexao, "select * from tb_funcionarios where N_Registro like '{$_POST['txt_buscar']}%' order by N_Registro asc");
}
else{
    $sql = mysqli_query($conexao, "select * from tb_funcionarios order by Nome_Funcionario asc");
}

if (isset($_GET['apagar'])){
    $sql = mysqli_query($conexao, "delete from tb_funcionarios where N_Registro=". $_GET['apagar']);

    echo "<br>";
    echo "<center>";
    echo "<hr>";
    echo "FUNCIONÁRIO EXCLUIDO";
    echo "<br>";
    echo "<a href=\"listagem.php\">Retornar a listagem</a>";
    echo "</center>";
    echo "<hr>";
    return false;
}
else{

}
?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listagem</title>
        <link rel="stylesheet" href="../../ProvaScript/CSS/ListagemF.css">
    </head>
    <body>
        <form name="frm_listagem" method="POST" action="listagem.php">
            <center>
                <span>DIGITE O REGISTRO DO FUNCIONÁRIO:</span>      
                <input type="search" name="txt_buscar" placeholder="N° Registro"> 
                <input type="submit" name="btn_confime" value="FILTRAR" class="btn_Pes">
                <a href="../home_funcionarios.html"><input type='button' name='btn_voltar' value='VOLTAR' class="btn_Pes"></a>
            </center>
                   
                
        </form>
        <table border="1" align="center">
            <tr><!--TR acrescenta linhas na tabela-->
                <th colspan="15" bgcolor="white">TABELA DE FUNCIONÁRIOS</th>             
            </tr>
            <tr>
                <th class="thMenu" bgcolor="white">N°</th>
                <th class="thClick" bgcolor="white">REGISTRO</th>
                <th class="thClick" bgcolor="white">NOME</th>
                <th class="thMenu" bgcolor="white">DATA DE ADMISSÃO</th>
                <th class="thMenu" bgcolor="white">CARGO</th>
                <th class="thMenu" bgcolor="white">QUANTIDADE DE SALÁRIOS</th>
                <th class="thMenu" bgcolor="white">SALÁRIO BRUTO</th>
                <th class="thMenu" bgcolor="white">INSS</th>
                <th class="thMenu" bgcolor="white">SALÁRIO LÍQUIDO</th>
                <th class="thMenu" bgcolor="white">SENHA</th>
                <th class="thMenu" bgcolor="white">ACESSO</th>
                <th class="thMenu" bgcolor="white">E-MAIL</th>
                <th class="thMenu" bgcolor="white">CPF</th>
                <th class="thMenu" bgcolor="white">CELULAR</th>
                <th class="thMenu" bgcolor="white">APAGAR</th>
            </tr>

            <tr>
                <?php
                    while($linha =mysqli_fetch_assoc($sql)) {
                ?>                      
                    <td class="NumerosTD"><?php $num=$num+1; echo $num; ?></td>
                    <td class="NumerosTD" ><?php echo $linha['N_Registro']; ?></td>
                    <td class="fitwidth"><?php echo $linha['Nome_Funcionario']; ?></td>
                    <td class="fitwidth"><?php echo $linha['data_admissao']; ?></td>
                    <td class="fitwidth"><?php echo $linha['cargo']; ?></td>
                    <td class="fitwidth"><?php echo $linha['qtde_salarios']; ?></td>
                    <td class="fitwidth"><?php echo $linha['salario_bruto']; ?></td>
                    <td class="fitwidth"><?php echo $linha['inss']; ?></td>
                    <td class="fitwidth"><?php echo $linha['salario_liquido']; ?></td> 
                    <td class="fitwidth"><?php echo $linha['tb_senha']; ?></td> 
                    <td id="ACESSO_ID" class="fitwidth"><?php

                    if ($linha['tb_acesso'] == "1"){
                        echo "ADMIN";
                    }
                    else{
                        echo "USÚARIO PADRÃO";
                    }                   
                    ?></td> 
                    <td class="fitwidth"><?php echo $linha['tb_email']; ?></td> 
                    <td class="fitwidth"><?php echo $linha['tb_cpf']; ?></td> 
                    <td class="fitwidth"><?php echo $linha['tb_celular']; ?></td> 
                    <td class="btn_excluirC" id="btn_excluir"><a href="listagem.php?apagar='<?php echo $linha['N_Registro'];?>'"><img src='../IMGS/del.png'></a></td>
            </tr>
                <?php     }
                echo "<br>";
                ?>                       
        </table>
    </body>
</html>