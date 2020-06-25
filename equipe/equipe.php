<?php
    require_once '../config/conexao.php';

    if (!isset($_GET['acao'])) {
        $acao = "listar";
    } else {
        $acao = $_GET['acao'];
    }

    /**
    * Ação de listar
    */
    if($acao=="listar"){
       $sql   = "SELECT *
                 FROM equipe s";
       $query = $con->query($sql);
       $registros = $query->fetchAll();

       // print_r($registros); exit;
       require_once '../template/cabecalho.php';
       require_once 'lista_equipe.php';
       require_once '../template/rodape.php';
    }
    /**
    * Ação Novo
    **/
    else if($acao == "novo"){
      $lista_genero = getGeneros();

      // print_r($lista_genero); exit;
      require_once '../template/cabecalho.php';
      require_once 'form_equipe.php';
      require_once '../template/rodape.php';
    }
    /**
    * Ação Gravar
    **/
    else if($acao == "gravar"){
        $registro = $_POST;
        // var_dump($registro);

        $sql = "INSERT INTO equipe(nome, pais)
                  VALUES(:nome, :pais)";
        $query = $con->prepare($sql);
        $query->bindParam(':nome', $_POST['nome']);
        $query->bindParam(':pais', $_POST['pais']);
        
        $result = $query->execute($registro);
        if($result){
            header('Location: ./equipe.php');
        }else{
            echo "Erro ao tentar inserir o registro, msg: " . print_r($query->errorInfo());
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM equipe WHERE id_equipe = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $id);
    
        $result = $query->execute();
        
        if($result){
            header('Location: ./equipe.php');
        }else{
            if($query->errorCode() == 23000) {
                echo 'Não é possível apagar, pois existe pilotos associados a equipe.';
            } else {
                echo "Erro ao tentar remover o registro de id: " . $id;
            }
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "buscar"){
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM equipe WHERE id_equipe = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);

        $query->execute();
        $registro = $query->fetch();

        // var_dump($registro); exit;
        require_once '../template/cabecalho.php';
        require_once 'form_equipe.php';
        require_once '../template/rodape.php';
    }
    /**
    * Ação Atualizar
    **/
    else if($acao == "atualizar"){
        $sql   = "UPDATE equipe SET nome = :nome, pais = :pais WHERE id_equipe = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $_GET['id']);
        $query->bindParam(':nome', $_POST['nome']);
        $query->bindParam(':pais', $_POST['pais']);
        $result = $query->execute();
    
        if ($result) {
            header('Location: ./equipe.php');
        } else {
            echo "Erro ao tentar atualizar os dados" . print_r($query->errorInfo());
        }
    }
 ?>
