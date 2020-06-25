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
	if ($acao == "listar") {
		$sql = "SELECT cl.*, p.nome as nome_piloto
                 FROM classificacao cl
                 JOIN piloto p on p.id_piloto = cl.id_piloto";
		$query = $con->query($sql);
		$registros = $query->fetchAll();

		// print_r($registros); exit;
		require_once '../template/cabecalho.php';
		require_once 'lista_classificacao.php';
		require_once '../template/rodape.php';
	} /**
	 * Ação Novo
	 **/
	elseif ($acao == "novo") {
		$lista_piloto = getPilotos();

		// print_r($lista_genero); exit;
		require_once '../template/cabecalho.php';
		require_once 'form_classificacao.php';
		require_once '../template/rodape.php';
	} /**
	 * Ação Gravar
	 **/
	elseif ($acao == "gravar") {
		$registro = $_POST;
		 var_dump($registro);

		$sql = "INSERT INTO classificacao(posicao_piloto, vitoria, id_piloto)
                  VALUES(:posicao_piloto, :vitoria, :id_piloto)";
		$query = $con->prepare($sql);
		$query->bindParam(':posicao_piloto', $_POST['posicao_piloto']);
		$query->bindParam(':vitoria', $_POST['vitoria']);
		$query->bindParam(':id_piloto', $_POST['id_piloto']);

		$result = $query->execute($registro);
		if ($result) {
			header('Location: ./classificacao.php');
		} else {
			echo "Erro ao tentar inserir o registro, msg: " . print_r($query->errorInfo());
		}
	} /**
	 * Ação Excluir
	 **/
	elseif ($acao == "excluir") {
		$id = $_GET['id'];
		$sql = "DELETE FROM classificacao WHERE id_classificacao = :id";
		$query = $con->prepare($sql);

		$query->bindParam(':id', $id);

		$result = $query->execute();

		if ($result) {
			header('Location: ./classificacao.php');
		} else {
			if ($query->errorCode() == 23000) {
				echo 'Não é possível apagar, pois existe pilotos associados a equipe.';
			} else {
				echo "Erro ao tentar remover o registro de id: " . $id;
			}
		}
	} /**
	 * Ação Excluir
	 **/
	elseif ($acao == "buscar") {
		$id = $_GET['id'];
		$sql = "SELECT * FROM classificacao WHERE id_classificacao = :id";
		$query = $con->prepare($sql);
		$query->bindParam(':id', $id);

        $lista_piloto = getPilotos();

		$query->execute();
		$registro = $query->fetch();

		// var_dump($registro); exit;
		require_once '../template/cabecalho.php';
		require_once 'form_classificacao.php';
		require_once '../template/rodape.php';
	} /**
	 * Ação Atualizar
	 **/
	elseif ($acao == "atualizar") {
		$sql = "UPDATE classificacao SET posicao_piloto = :posicao_piloto, vitoria = :vitoria, id_piloto = :id_piloto WHERE id_classificacao = :id";
		$query = $con->prepare($sql);

		$query->bindParam(':id', $_GET['id']);
		$query->bindParam(':id_piloto', $_POST['id_piloto']);
		$query->bindParam(':posicao_piloto', $_POST['posicao_piloto']);
		$query->bindParam(':vitoria', $_POST['vitoria']);
		$result = $query->execute();

		if ($result) {
			header('Location: ./classificacao.php');
		} else {
			echo "Erro ao tentar atualizar os dados" . print_r($query->errorInfo());
		}
	}

	function getPilotos()
	{
		$sql = "SELECT * FROM piloto";
		$query = $GLOBALS['con']->query($sql);
		return $query->fetchAll();
	}

?>
