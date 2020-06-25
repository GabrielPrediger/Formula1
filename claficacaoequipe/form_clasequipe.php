<?php require_once '../template/cabecalho.php'; ?>
<?php
	if (isset($registro)) {
		$acao = "clasequipe.php?acao=atualizar&id=" . $registro['id_clasequipe'];
	} else {
		$acao = "clasequipe.php?acao=gravar";
	}
?>
<div class="container">
    <form class="" action="<?php echo $acao; ?>" method="post">
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
        <div class="from-group">
            <label for="posicao_equipe">Posição da Equipe</label>
            <input id="posicao_equipe" class="form-control" type="number" name="posicao_equipe"
                   value="<?php if (isset($registro)) {
					   echo $registro['posicao_equipe'];
				   } ?>" required>
        </div>
        <div class="from-group">
            <label for="vitorias">Vitoria</label>
            <input id="vitorias" class="form-control" type="number" name="vitorias"
                   value="<?php if (isset($registro)) {
					   echo $registro['vitorias'];
				   } ?>" required>
        </div>
        <br>
        <button class="btn btn-info" type="submit">Enviar</button>
    </form>
</div>
