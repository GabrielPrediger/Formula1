<?php
	session_start(); //DEVE SER A PRIMEIRA LINHA
	
	//Finaliza a sessão logado da Aplicação
	if (isset($_GET['acao']) && $_GET['acao'] == "sair") {
		unset($_SESSION['logado']);
	}
?>

<?php define('BASE_URL', 'http://localhost/Formula1'); ?>
<!doctype html>
<html lang="en">
<head>
    <title>Pagina Inicial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="<?= BASE_URL ?>">
            <img src="<?= BASE_URL ?>/imagens/pngguru.com.png" alt="" style="width:40px;">
        </a>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>/equipe/equipe.php">Equipe</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>/piloto/piloto.php">Piloto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>/claficacaoequipe/clasequipe.php">Classificação de Equipe</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>/classificacaogeral/classificacao.php">Classificação Geral</a>
            </li>
        </ul>
        <ul class="navbar-nav" style="position: absolute; right: 20px;">
            <?php if (isset($_SESSION['logado']['nome'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="#">Olá, <?= $_SESSION['logado']['nome'] ?>!</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?acao=sair">Sair</a>
            </li>
            <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>/login.php">Login</a>
            </li>
            <?php } ?>
        </ul>
    </nav>
    
    <nav class="navbar fixed-bottom navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Equipe</a>
        <a class="navbar-brand" href="#">Piloto</a>
        <a class="navbar-brand" href="#">Classificação Equipe</a>
        <a class="navbar-brand" href="#">Classificação Piloto</a>

    </nav>



</body>
</html>
