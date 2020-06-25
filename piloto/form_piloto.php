<?php require_once '../template/cabecalho.php'; ?>
<?php
	if (isset($registro)) {
		$acao = "piloto.php?acao=atualizar&id=" . $registro['id_piloto'];
	} else {
		$acao = "piloto.php?acao=gravar";
	}
?>
<div class="container">
    <form class="" action="<?php echo $acao; ?>" method="post">
        <div class="from-group">
            <label for="nome">Nome</label>
            <input id="nome" class="form-control" type="text" name="nome"
                   value="<?php if (isset($registro)) {
				       echo $registro['nome'];
			       } ?>" required>
        </div>
        <div class="from-group">
            <label for="numero">Numero</label>
            <input id="numero" class="form-control" type="number" name="numero"
                   value="<?php if (isset($registro)) {
				       echo $registro['numero'];
			       } ?>" required>
        </div>
        <div class="from-group">
            <label for="pais">País</label>
            <input id="pais" class="form-control" type="text" name="pais"
                   value="<?php if (isset($registro)) {
				       echo $registro['pais'];
			       } ?>" required>
        </div>
        <div class="from-group">
            <label for="id_equipe">Equipe</label>
            <select class="form-control" name="id_equipe" id="id_equipe" required>
                <option value="">Escolha um item na lista</option>
				<?php foreach ($lista_equipe as $item): ?>
                    <option value="<?php echo $item['id_equipe']; ?>"
						<?php if (isset($registro) && $registro['id_equipe'] == $item['id_equipe']) {
							echo "selected";
						} ?>>
						<?php echo $item['nome']; ?>
                    </option>
				<?php endforeach; ?>
            </select>
        </div>
        <br>
        <button class="btn btn-info" type="submit">Enviar</button>
    </form>
</div>

<?php require_once '../template/rodape.php'; ?>
