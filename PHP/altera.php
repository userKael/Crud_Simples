<?php

include 'conexao.php';

$nome = filter_input(INPUT_POST, "nome");
$cpf = filter_input(INPUT_POST, "cpf");
$endereco = filter_input(INPUT_POST, "endereco");
$cep = filter_input(INPUT_POST, "cep");
$cidade = filter_input(INPUT_POST, "cidade");
$data_nascimento = filter_input(INPUT_POST, "data_nascimento");
$salario = filter_input(INPUT_POST, "salario");

$upcliente = "update cliente set nome='$nome', salario='$salario', data_nascimento='$data_nascimento' where cpf='$cpf'";
$resultcli = mysqli_query($con, $upcliente);

$upendereco = "update endereco set cep='$cep', endereco='$endereco', cidade='$cidade' where contato_cliente='$cpf'";
$resultend = mysqli_query($con, $upendereco);

if ($resultcli && $resultend) {
    echo "<script>alert('Cadastro Alterado Com Sucesso');";
    echo "location.href='./pagina_consulta.php'</script>";
}
else{  
    echo "<script>alert('Falha Ao Alterar Cadastro');";
    echo "location.href='./pagina_consulta.php'</script>";
}
