<?php
	require_once '../config/conexao.php';

	$acao = $_GET['acao'] ?? 'listar';

	/**
	 * Ação Novo
	 **/
	if ($acao == "novo") {
		$lista_equipe = getEquipes();

		require_once '../template/cabecalho.php';
		require_once 'form_piloto.php';
		require_once '../template/rodape.php';
	} /**
	 * Ação Gravar
	 **/
	elseif ($acao == "gravar") {
		$registro = $_POST;

		// var_dump($registro);

		$sql = "INSERT INTO piloto(nome, numero, pais, id_equipe)
                  VALUES(:nome, :numero, :pais, :id_equipe)";
		$query = $con->prepare($sql);

		$query->bindParam(':nome', $_POST['nome']);
		$query->bindParam(':numero', $_POST['numero']);
		$query->bindParam(':pais', $_POST['pais']);
		$query->bindParam(':id_equipe', $_POST['id_equipe']);

		$result = $query->execute($registro);
		if ($result) {
			header('Location: ./piloto.php');
		} else {
			print_r($registro);
			echo "Erro ao tentar inserir o registro, msg: " . print_r($query->errorInfo());
		}
	} /**
	 * Ação Excluir
	 **/
	elseif ($acao == "excluir") {
		$id = $_GET['id'];
		$sql = "DELETE FROM piloto WHERE id_piloto = :id";
		$query = $con->prepare($sql);

		$query->bindParam(':id', $id);

		$result = $query->execute();
		if ($result) {
			header('Location: ./piloto.php');
		} else {
			echo "Erro ao tentar remover o registro de id: " . $id;
		}
	} /**
	 * Ação Excluir
	 **/
	elseif ($acao == "buscar") {
		$id = $_GET['id'];
		$sql = "SELECT * FROM piloto WHERE id_piloto = :id";
		$query = $con->prepare($sql);
		$query->bindParam(':id', $id);

		$query->execute();
		$registro = $query->fetch();

		$lista_equipe = getEquipes();

		// var_dump($registro); exit;
		require_once '../template/cabecalho.php';
		require_once 'form_piloto.php';
		require_once '../template/rodape.php';
	} /**
	 * Ação Atualizar
	 **/
	elseif ($acao == "atualizar") {
		$sql = "UPDATE piloto SET nome = :nome, numero = :numero,
                    pais = :pais WHERE id_piloto = :id";
		$query = $con->prepare($sql);

		$query->bindParam(':id', $_GET['id']);
		$query->bindParam(':nome', $_POST['nome']);
		$query->bindParam(':pais', $_POST['pais']);
		$query->bindParam(':numero', $_POST['numero']);
		$result = $query->execute();

		if ($result) {
			header('Location: ./piloto.php');
		} else {
			echo "Erro ao tentar atualizar os dados" . print_r($query->errorInfo());
		}
	} /**
	 * Ação de listar
	 */
	else {
		$id_equipe = $_GET['id_equipe'] ?? '';
		$sql = "SELECT p.id_piloto, p.nome, p.pais, p.numero, p.id_equipe, e.nome as nome_equipe
                 				FROM piloto p
                 				JOIN equipe e on e.id_equipe = p.id_equipe ";

		if ($id_equipe) {
			$sql .= 'WHERE p.id_equipe = :id_equipe';
			$query = $con->prepare($sql);
			$query->execute([':id_equipe' => $id_equipe]);
		} else {
			$query = $con->query($sql);
		}

		if ($query == false) {
			print_r($con->errorInfo());
		}

		$registros = $query->fetchAll();

		require_once '../template/cabecalho.php';
		require_once 'lista_pilotos.php';
		require_once '../template/rodape.php';
	}

	//função que retorna a lista de equipes cadastrados no banco
	function getEquipes()
	{
		$sql = "SELECT * FROM equipe";
		$query = $GLOBALS['con']->query($sql);
		$lista_equipe = $query->fetchAll();
		return $lista_equipe;
	}

?>
