<?php

include 'conexao.php';

$nome = filter_input(INPUT_POST, "nome");
$cpf = filter_input(INPUT_POST, "cpf");
$endereco = filter_input(INPUT_POST, "endereco");
$cep = filter_input(INPUT_POST, "cep");
$cidade = filter_input(INPUT_POST, "cidade");
$data_nascimento = filter_input(INPUT_POST, "data_nascimento");
$salario = filter_input(INPUT_POST, "salario");

$cadcliente = "insert into cliente values ('$cpf','$nome','$salario','$data_nascimento')";
$resultcliente = mysqli_query($con, $cadcliente);

$cadendereco = "insert into endereco values ('$cep','$endereco','$cidade','$cpf')";
$resultendereco = mysqli_query($con, $cadendereco);

if ($resultcliente && $resultendereco) {
    echo '<script>alert("Cadastrado Com Sucesso");</script>';
} else {
    echo '<script>alert("Erro Ao Cadastrar");</script>';
}

?>

<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="../CSS/style.css">

<body>
    <div class="shadow p-3 bg-body rounded div-cad">
        <table class="table">

            <tbody>
                <tr>
                    <th scope="row">CPF:</th>
                    <td colspan="2"><?php echo "$cpf"; ?></td>
                </tr>
                <tr>
                    <th scope="row">NOME:</th>
                    <td colspan="2"><?php echo "$nome "; ?></td>
                <tr>
                    <th scope="row">SALARIO:</th>
                    <td colspan="2"><?php echo "$salario "; ?></td>
                </tr>
                <tr>
                    <th scope="row">DATA DE NASCIMENTO:</th>
                    <td colspan="2"><?php echo "$data_nascimento";  ?></td>
                </tr>
                <tr>
                    <th scope="row">CEP:</th>
                    <td colspan="2"><?php echo "$cep";  ?></td>
                </tr>
                <tr>
                    <th scope="row">ENDEREÇO:</th>
                    <td colspan="2"><?php echo "$endereco "; ?></td>
                </tr>
                <tr>
                    <th scope="row">CIDADE:</th>
                    <td colspan="2"><?php echo "$cidade";  ?></td>
                </tr>
            </tbody>
        </table>

    </div>

    <form action="../cadastro.html" method="POST">
        <button type="submit" class="btn btn-dark btn-cadv">VOLTAR</button>
    </form>

</body>


</html>