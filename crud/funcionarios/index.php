<?php
    include('./config.php');

    //verificar a conexão
    $con = new mysqli($host, $user, $password, $dbname);

    if($con->connect_error){
        die("Erro na conexão: ".$con->connect_error);
    }

    $sql = "select * from cadastros order by nome_funcionario";
    $res = $con->query($sql);

    if($res->num_rows>-1){
        ?>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Funcionários</h1>
            <a href="?p=funcionarios/new" type="button" class="btn btn-primary">Cadastrar</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Contato</th>
                    <th scope="col">Função</th>
                    <th scope="col">Salário</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    //percorrer o array de resultados
                    while($row = $res->fetch_assoc()){
                        echo "<tr>
                            <td>".$row['funcionario_id']."</td>
                            <td>".$row['nome_funcionario']."</td>
                            <td>".$row['contato_funcionario']."</td>
                            <td>".$row['funcao_funcionario']."</td>
                            <td>".$row['salario_funcionario']."</td>
                            </tr>";
                    }
                    ?>
                
                </tbody>
            </table>
        </div>
    <?php
    }
    else {
        echo "Não foram encontrados dados.";
    }
    $con->close();
?>

</body>
</html>