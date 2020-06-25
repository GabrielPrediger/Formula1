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
		$sql = "SELECT c.*, e.nome as nome_equipe
                FROM clasequipe c
                JOIN equipe e on e.id_equipe = c.id_equipe";
		$query = $con->query($sql);
		$registros = $query->fetchAll();

		// print_r($registros); exit;
		require_once '../template/cabecalho.php';
		require_once 'lista_clasequipe.php';
		require_once '../template/rodape.php';
	} /**
	 * Ação Novo
	 * Ação Novo
	 **/
	elseif ($acao == "novo") {
		$lista_equipe = getEquipes();

		// print_r($lista_equipe); exit;
		require_once '../template/cabecalho.php';
		require_once 'form_clasequipe.php';
		require_once '../template/rodape.php';
	} /**
	 * Ação Gravar
	 **/
	elseif ($acao == "gravar") {
		$registro = $_POST;
		// var_dump($registro);

		$sql = "INSERT INTO clasequipe(posicao_equipe, vitorias, id_equipe)
                  VALUES(:posicao_equipe, :vitorias, :id_equipe)";
		$query = $con->prepare($sql);
		$query->bindParam(':posicao_equipe', $_POST['posicao_equipe']);
		$query->bindParam(':vitorias', $_POST['vitorias']);
		$query->bindParam(':id_equipe', $_POST['id_equipe']);

		$result = $query->execute($registro);
		if ($result) {
			header('Location: ./clasequipe.php');
		} else {
			print_r($registro);
			echo "Erro ao tentar inserir o registro, msg: " . print_r($query->errorInfo());
		}
	} /**
	 * Ação Excluir
	 **/
	elseif ($acao == "excluir") {
		$id = $_GET['id'];
		$sql = "DELETE FROM clasequipe WHERE id_clasequipe = :id";
		$query = $con->prepare($sql);
		$query->bindParam(':id', $id);
		$result = $query->execute();

		if ($result) {
			header('Location: ./clasequipe.php');
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
		$sql = "SELECT * FROM clasequipe WHERE id_clasequipe = :id";
		$query = $con->prepare($sql);
		$query->bindParam(':id', $id);

		$query->execute();
		$registro = $query->fetch();
		$lista_equipe = getEquipes();

		// var_dump($registro); exit;
		require_once '../template/cabecalho.php';
		require_once 'form_clasequipe.php';
		require_once '../template/rodape.php';
	} /**
	 * Ação Atualizar
	 **/
	elseif ($acao == "atualizar") {
		$sql = "UPDATE clasequipe SET posicao_equipe = :posicao_equipe, vitorias = :vitorias, id_equipe = :id_equipe WHERE id_clasequipe = :id";
		$query = $con->prepare($sql);

		$query->bindParam(':id', $_GET['id']);
		$query->bindParam(':id_equipe', $_POST['id_equipe']);
		$query->bindParam(':posicao_equipe', $_POST['posicao_equipe']);
		$query->bindParam(':vitorias', $_POST['vitorias']);
		$result = $query->execute();

		if ($result) {
			header('Location: ./clasequipe.php');
		} else {
			echo "Erro ao tentar atualizar os dados" . print_r($query->errorInfo());
		}
	}

	function getEquipes()
	{
		$sql = "SELECT * FROM equipe";
		$query = $GLOBALS['con']->query($sql);
		return $query->fetchAll();
	}

?>
