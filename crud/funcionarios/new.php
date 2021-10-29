<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include('./config.php');

        //verificar a conexão
        $conn = new mysqli($host, $user, $password, $dbname);
    
        if($conn->connect_error){
            die("Erro na conexão: ".$conn->connect_error);
        }
        else {
          $funcionario_id = $_POST['funcionario_id'];
          $nome_funcionario = $_POST['nome_funcionario'];
          $contato_funcionario = $_POST['contato_funcionario'];
          $funcao_funcionario = $_POST['funcao_funcionario'];
          $salario_funcionario = $_POST['salario_funcionario'];

          $sql = "insert into cadastros (funcionario_id, nome_funcionario, contato_funcionario, funcao_funcionario, salario_funcionario) values ('$funcionario_id', '$nome_funcionario', '$contato_funcionario', '$funcao_funcionario', '$salario_funcionario')";
          if($conn->query($sql) === FALSE ){
            echo "Falha: ".$sql."\n".$conn->error;
          }
        }
    }
?>

<script>
  function alerta() {
    window.alert("Cadastro realizado com sucesso!");
  }
</script>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Novo Funcionário</h1>
</div>
<form method="post" action="" onsubmit="alerta()">
  <div class="mb-3">
    <label for="funcionario_id" class="form-label">Id</label>
    <input type="text" class="form-control" id="funcionario_id" name="funcionario_id">
  </div>
  <div class="mb-3">
    <label for="nome_funcionario" class="form-label">Nome</label>
    <input type="text" class="form-control" id="nome_funcionario" name="nome_funcionario">
  </div>
  <div class="mb-3">
    <label for="contato_funcionario" class="form-label">Contato</label>
    <input type="text" class="form-control" id="contato_funcionario" name="contato_funcionario">
  </div>
  <div class="mb-3">
    <label for="funcao_funcionario" class="form-label">Função</label>
    <input type="text" class="form-control" id="funcao_funcionario" name="funcao_funcionario">
  </div>
  <div class="mb-3">
    <label for="salario_funcionario" class="form-label">Salário</label>
    <input type="text" class="form-control" id="salario_funcionario" name="salario_funcionario">
  </div>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>