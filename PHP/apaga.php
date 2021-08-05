<?php

include "conexao.php";

$cpf = filter_input(INPUT_POST, "cpf");

$delend = "delete from endereco where contato_cliente = '$cpf'";
$resultend = mysqli_query($con, $delend);

$delcli = "delete from cliente where cpf = '$cpf'";
$resultcli = mysqli_query($con, $delcli);




if ($resultcli && $resultend) {
    echo "<script>alert('Cadastro Deletado Com Sucesso');";
    echo "location.href='./pagina_consulta.php'</script>";
} else {
    echo "<script>alert('Erro ao Deletar Cadastro');";
    echo "location.href='./pagina_consulta.php'</script>";
}
