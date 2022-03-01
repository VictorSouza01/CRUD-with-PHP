<?php
	include 'conexao.php'; // conexão de banco de dados

	$registro = $_POST ["txt_registroN"];
	$nome = $_POST ["txt_nome"];
	$data = $_POST ["txt_data"];
    $cargo = $_POST ["txt_cargo"];
    $qtds_Salario = $_POST ["txt_qtdS"];
	$senha = $_POST ["txt_senha"];
	$acesso = $_POST ["txt_acess"];
	$email = $_POST ["txt_email"];
	$tel = $_POST ["txt_numerotel"];
	$cpf = $_POST ["txt_cpf"];
    $salario_bruto;
    $salario_liquido;
    $inss;


	//data 2021-11-29

	if($registro == NULL or $nome == NULL or $acesso == NULL or $senha == NULL or $data == NULL or $qtds_Salario == NULL){
		echo  "<script>
		alert('Verifique se todos os campos foram preenchidos!');
		window.location.replace('../home_funcionarios.html'); 
		</script>";

	}
	else{

		$sql = mysqli_query($conexao, "select * from tb_funcionarios where N_Registro='$registro'");
		if(mysqli_num_rows($sql) > 0){
			echo "<script>
			window.location.replace('../home_funcionarios.html'); //Redireciona para a pag de login de novo
			alert(Funcionário já cadastrado!'); //Vai avisar que está errado
			</script>";
		}
		else {
			//verificação do inss e vê o valor do salario bruto
			$salario_bruto = $qtds_Salario * 1039;
			if ($salario_bruto > 1350){
				$inss = $salario_bruto * 0.11;
				$salario_liquido = $salario_bruto - $inss; 
			}
			else{
				$inss = 0;
				$salario_liquido = $salario_bruto;
			}
			if($acesso == "ADMINISTRADOR"){
				$acesso=1;
			}
			else{
				$acesso=0;
			}
	
			//efetua o cadastro no banco de dados
			$sql = mysqli_query($conexao, "insert into tb_funcionarios (N_Registro, Nome_Funcionario, data_admissao, cargo, qtde_salarios, salario_bruto, inss, salario_liquido, tb_senha, tb_acesso, tb_email, tb_cpf, tb_celular) values ('$registro','$nome','$data', '$cargo', '$qtds_Salario', '$salario_bruto', '$inss', '$salario_liquido', '$senha', '$acesso', '$email', '$cpf', '$tel')");
	
			echo "<script>
			window.location.replace('../home_funcionarios.html'); //Redireciona para a pag de login de novo
			alert(Funcionário cadastrado com sucesso!'); //Vai avisar que está errado
			</script>";
		}
	}

?>