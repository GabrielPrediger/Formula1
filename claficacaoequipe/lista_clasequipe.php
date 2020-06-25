<div class="container print">
    <h2>Classificação Equipe</h2>
    <a class="btn btn-info" href="clasequipe.php?acao=novo">Novo</a>
	<?php if (count($registros)==0): ?>
        <p>Nenhum registro encontrado.</p>
	<?php else: ?>
        <table class="table table-hover table-stripped">
            <thead>
            <tr>
                
                <th>Equipe</th>
                <th>Posição Equipe</th>
                <th>Vitórias</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
			<?php foreach ($registros as $linha): ?>
                <tr>
                    
                    <td><?= $linha['nome_equipe']; ?></td>
                    <td><?= $linha['posicao_equipe']; ?></td>
                    <td><?= $linha['vitorias']; ?></td>
                    <td>
                        <a class="btn btn-info btn-sm" href="../equipe/equipe.php?acao=listar&id_equipe=<?php echo $linha['id_equipe']; ?>">Equipe</a>
                        <a class="btn btn-warning btn-sm" href="clasequipe.php?acao=buscar&id=<?php echo $linha['id_clasequipe']; ?>">Editar</a>
                        <a class="btn btn-danger btn-sm" href="clasequipe.php?acao=excluir&id=<?php echo $linha['id_clasequipe']; ?>">Excluir</a>
                    </td>
                </tr>
			<?php endforeach; ?>
            </tbody>
        </table>
	<?php endif; ?>
</div>
