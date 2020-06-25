
<div class="container print">
  <h2>Equipe</h2>
  <a class="btn btn-info" href="form_equipe.php?acao=novo">Novo</a>
  <?php if (count($registros)==0): ?>
    <p>Nenhum registro encontrado.</p>
  <?php else: ?>
    <table class="table table-hover table-stripped">
      <thead>
      <tr>
          
          <th>Nome</th>
          <th>País</th>
          <th>Ações</th>
      </tr>
      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
            
            <td><?= $linha['nome']; ?></td>
            <td><?= $linha['pais']; ?></td>
              <td>
                <a class="btn btn-info btn-sm" href="../piloto/piloto.php?acao=listar&id_equipe=<?php echo $linha['id_equipe']; ?>">Pilotos</a>
                <a class="btn btn-warning btn-sm" href="equipe.php?acao=buscar&id=<?php echo $linha['id_equipe']; ?>">Editar</a>
                <a class="btn btn-danger btn-sm" href="equipe.php?acao=excluir&id=<?php echo $linha['id_equipe']; ?>">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
