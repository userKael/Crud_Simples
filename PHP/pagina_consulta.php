<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../CSS/style.css">
    <title>Document</title>
</head>

<body>
    <div class="shadow p-3 mb-5 bg-body rounded">
        <nav class="navbar navbar-expand-lg navbar-ligth bg-ligth rounded-3">
            <div class="container-fluid">
                <a class="navbar-brand">PAGINA DE CONSULTA</a>
                <form class="d-flex" action="./consulta.php" method="POST">
                    <input class="form-control me-2" type="text" placeholder="CPF" name="cpf">
                    <button class="btn btn-outline-success" type="submit">CONSULTAR</button>
                </form>
                <form action="../index.html" method="POST">
                    <button type="submit" class="btn btn-primary">VOLTAR</button>
                </form>
            </div>
        </nav>

    </div>


    <?php
    include 'conexao.php';
    if ($con) {
        $busca = "select * from cliente
        inner join endereco on cliente.cpf = endereco.contato_cliente";

        $resultbusca = mysqli_query($con, $busca);
        $linhas = mysqli_num_rows($resultbusca);
        if ($linhas > 0) {
            for ($i = 0; $i < $linhas; $i++) {
                $colunas = mysqli_fetch_array($resultbusca);

                $nome = $colunas['nome'];
                $cpf = $colunas['cpf'];
                $salario = $colunas['salario'];
                $data_nascimento = $colunas['data_nascimento'];
                $cep = $colunas['cep'];
                $endereco = $colunas['endereco'];
                $cidade = $colunas['cidade'];

    ?>
                <h2 style="text-align: center;">CLIENTES CADASTRADOS:</h2>
                <div id="div-consulta">
                    <form action="conecta.php" method="POST">
                        <form action="actioncad.php">
                            <h5 style="text-align: center; margin-top:10px">CLIENTE: <?php echo "$nome"; ?> </h5>
                            <div class="shadow p-3 bg-body rounded">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">CPF:</th>
                                            <td colspan="2"><input type="text" name="cpf" value="<?php echo "$cpf"; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">NOME:</th>
                                            <td colspan="2"><input type="text" name="nome" value="<?php echo "$nome "; ?>"></td>
                                        <tr>
                                            <th scope="row">SALARIO:</th>
                                            <td colspan="2"><input type="text" name="salario" value="<?php echo "$salario "; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">DATA DE NASCIMENTO:</th>
                                            <td colspan="2"><input type="text" name="data_nascimento" value="<?php echo "$data_nascimento"; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">CEP:</th>
                                            <td colspan="2"><input type="text" name="cep" value="<?php echo "$cep"; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">ENDEREÇO:</th>
                                            <td colspan="2"><input type="text" name="endereco" value="<?php echo "$endereco "; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">CIDADE:</th>
                                            <td colspan="2"><input type="text" name="cidade" value="<?php echo "$cidade"; ?>"></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <button name="altdel" type="submit" value="ALTERAR" class="btn btn-outline-success" style="margin-left: 38%;">ALTERAR</button>
                                <button name="altdel" type="submit" class="btn btn-outline-danger" value="APAGAR"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg></button>
                            </div>
                        </form>
                    </form>

                </div>
            <?php
            }
            ?>


</body>

</html>
<?php
        } else {
?>
    <html>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">

    <body>
        <h1 style=" text-align: center;color: black; margin-top: 3%">NENHUM CADASTRO REALIZADO</h1>
        <form action="../cadastro.html" method="POST">
            <button type="submit" class="btn btn-dark btn-cadv" style="margin-top: 3%; margin-left:37%;">CADASTRAR</button>
        </form>
    </body>

    </html>



<?php
        }
?>


<?php
    } else {
        echo "SEM CONEXÃO COM BANCO DE DADOS :(";
    }
?>