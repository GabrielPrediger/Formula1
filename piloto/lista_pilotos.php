
<div class="container print">
  <h2>Pilotos</h2>
  <a class="btn btn-info" href="piloto.php?acao=novo">Novo</a>
  <?php if (count($registros)==0): ?>
    <p>Nenhum registro encontrado.</p>
  <?php else: ?>
    <table class="table table-hover table-stripped">
      <thead>
      <tr>
          
          <th>Nome</th>
          <th>Numero</th>
          <th>País</th>
          <th>Equipe</th>
          <th>Ações</th>
      </tr>
      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
            
            <td><?= $linha['nome']; ?></td>
            <td><?= $linha['numero']; ?></td>
            <td><?= $linha['pais']; ?></td>
            <td><?= $linha['nome_equipe']; ?></td>
            <td>
                <a class="btn btn-warning btn-sm" href="piloto.php?acao=buscar&id=<?php echo $linha['id_piloto']; ?>">Editar</a>
                <a class="btn btn-danger btn-sm" href="piloto.php?acao=excluir&id=<?php echo $linha['id_piloto']; ?>">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
