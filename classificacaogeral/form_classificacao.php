<?php require_once '../template/cabecalho.php'; ?>
<?php
	if (isset($registro)) {
		$acao = "classificacao.php?acao=atualizar&id=" . $registro['id_classificacao'];
	} else {
		$acao = "classificacao.php?acao=gravar";
	}
?>
<div class="container">
    <form class="" action="<?php echo $acao; ?>" method="post">
        <div class="from-group">
            <label for="id_piloto">Piloto</label>
            <select class="form-control" name="id_piloto" id="id_piloto" required>
                <option value="">Escolha um item na lista</option>
				<?php foreach ($lista_piloto as $item): ?>
                    <option value="<?php echo $item['id_piloto']; ?>"
						<?php if (isset($registro) && $registro['id_piloto'] == $item['id_piloto']) {
							echo "selected";
						} ?>>
						<?php echo $item['nome']; ?>
                    </option>
				<?php endforeach; ?>
            </select>
        </div>
        <div class="from-group">
            <label for="posicao_piloto">Posição do Piloto</label>
            <input id="posicao_piloto" class="form-control" type="number" name="posicao_piloto"
                   value="<?php if (isset($registro)) {
					   echo $registro['posicao_piloto'];
				   } ?>" required>
        </div>
        <div class="from-group">
            <label for="vitoria">Vitoria</label>
            <input id="vitoria" class="form-control" type="number" name="vitoria"
                   value="<?php if (isset($registro)) {
					   echo $registro['vitoria'];
				   } ?>" required>
        </div>
        <br>
        <button class="btn btn-info" type="submit">Enviar</button>
    </form>
</div>
