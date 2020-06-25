<div class="container print">
    <h2>Classificação Piloto</h2>
    <a class="btn btn-info" href="classificacao.php?acao=novo">Novo</a>
	<?php if (count($registros)==0): ?>
        <p>Nenhum registro encontrado.</p>
	<?php else: ?>
        <table class="table table-hover table-stripped">
            <thead>
            <tr>
                
                <th>Piloto</th>
                <th>Posicao Piloto</th>
                <th>Vitória</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
			<?php foreach ($registros as $linha): ?>
                <tr>
                    
                    <td><?= $linha['nome_piloto']; ?></td>
                    <td><?= $linha['posicao_piloto']; ?></td>
                    <td><?= $linha['vitoria']; ?></td>
                    <td>
                        <a class="btn btn-info btn-sm" href="../piloto/piloto.php?acao=listar&id_piloto=<?php echo $linha['id_piloto']; ?>">Piloto</a>
                        <a class="btn btn-warning btn-sm" href="classificacao.php?acao=buscar&id=<?php echo $linha['id_classificacao']; ?>">Editar</a>
                        <a class="btn btn-danger btn-sm" href="classificacao.php?acao=excluir&id=<?php echo $linha['id_classificacao']; ?>">Excluir</a>
                    </td>
                </tr>
			<?php endforeach; ?>
            </tbody>
        </table>
	<?php endif; ?>
</div>
