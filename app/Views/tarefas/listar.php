<?= $this->extend('templates/template') ?>

<?= $this->section('conteudo') ?>

<style>
  
  @media (min-width: 992px) {
    .main-sidebar ~ .content-wrapper {
      margin-left: 30px !important;
    }
  }

  body {
    background: linear-gradient(to bottom right, #fdfbff, #f0f4ff);
    font-family: 'Poppins', sans-serif;
    color: #444;
  }

  .content-wrapper {
    background-color: #ffffffc9;
    border-radius: 12px;
    padding: 1rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
  }

  .card {
    border: none;
    border-radius: 16px;
    box-shadow: 0 2px 10px rgba(173, 173, 255, 0.2);
  }

  .card-body {
    background: #fafaff;
    border-radius: 12px;
  }

  .btn {
    border-radius: 20px;
    font-weight: 500;
    transition: all 0.3s ease-in-out;
  }

  .btn-info {
    background-color: #a8d8ff;
    border-color: #a8d8ff;
    color: #fff;
  }

  .btn-info:hover {
    background-color: #8ecfff;
    transform: scale(1.05);
  }

  .btn-success {
    background-color: #b7e4c7;
    border-color: #b7e4c7;
  }

  .btn-success:hover {
    background-color: #a3d9b1;
    transform: scale(1.05);
  }

  .btn-warning {
    background-color: #ffe099;
    border-color: #ffe099;
    color: #5c4b00;
  }

  .btn-warning:hover {
    background-color: #ffdb7d;
    transform: scale(1.05);
  }

  .btn-danger {
    background-color: #ffb3c6;
    border-color: #ffb3c6;
    color: #58111a;
  }

  .btn-danger:hover {
    background-color: #ff99ae;
    transform: scale(1.05);
  }

  .table th, .table td {
    vertical-align: middle;
    border: 1px solid #e2e6f0;
    background-color: #fefeff;
  }

  .modal-content {
    border-radius: 16px;
    border: 2px solid #dadbf7;
    background: #ffffff;
  }

  .modal-header {
    background-color: #f1f1ff;
    border-bottom: none;
    border-radius: 16px 16px 0 0;
  }

  .modal-footer {
    background-color: #f9f9fb;
    border-top: none;
    border-radius: 0 0 16px 16px;
  }

  .form-control, .form-select {
    border-radius: 10px;
    border: 1px solid #d6d6ec;
  }

  h1.m-0 {
    color: #6c63ff;
    font-weight: bold;
  }

  .badge-info {
    background-color: #d0c3ff;
    color: #4c3d99;
    border-radius: 1rem;

    .highlight-points {
    background: linear-gradient(135deg, #d0c3ff, #f8e1ff);
    border-radius: 20px;
    padding: 10px 20px;
    font-size: 1.2rem;
    font-weight: 600;
    color: #4a3e8e;
    box-shadow: 0 0 12px rgba(208, 195, 255, 0.5);
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
  }

  .highlight-points i {
    color: #6a5acd;
  }
</style>


<div class="modal fade" id="modal-nova-tarefa">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="/tarefas/cadastrar" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Nova Tarefa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" class="form-control" name="Titulo" required>
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <textarea class="form-control" name="Descricao" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Dificuldade</label>
                        <select name="dificuldade" class="form-control" required>
                            <option value="facil">Fácil</option>
                            <option value="medio">Média</option>
                            <option value="dificil">Difícil</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tempo estimado</label>
                        <select name="tempo_estimado" class="form-control" required>
                            <option value="5m">5 minutos</option>
                            <option value="15m">15 minutos</option>
                            <option value="30m">30 minutos</option>
                            <option value="1h">1 hora</option>
                            <option value="2h">2 horas ou mais</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-editar-tarefa">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="/tarefas/editar" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Tarefa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="modal-editar-tarefa-TarefaId" name="TarefaId">
                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" class="form-control" id="modal-editar-tarefa-Titulo" name="Titulo" required>
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <textarea class="form-control" id="modal-editar-tarefa-Descricao" name="Descricao" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Dificuldade</label>
                        <select name="dificuldade" id="modal-editar-tarefa-Dificuldade" class="form-control" required>
                            <option value="facil">Fácil</option>
                            <option value="medio">Média</option>
                            <option value="dificil">Difícil</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tempo estimado</label>
                        <select name="tempo_estimado" id="modal-editar-tarefa-Tempo" class="form-control" required>
                            <option value="5m">5 minutos</option>
                            <option value="15m">15 minutos</option>
                            <option value="30m">30 minutos</option>
                            <option value="1h">1 hora</option>
                            <option value="2h">2 horas ou mais</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tarefas</h1>
        </div>
        <div class="col-sm-6 text-right">
          <div class="highlight-points">
            <i data-lucide="star"></i>
            Pontuação Total: <strong><?= $pontosTotais ?? 0 ?></strong>
          </div>
        </div>
      </div>
    </div>
  </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-nova-tarefa">
                        <i class="fas fa-plus-circle"></i> Nova Tarefa
                    </button>
                </div>
            </div>

            <?php if(isset($_GET['alert'])): ?>
                <?php if($_GET['alert'] == "successCreate"): ?>
                    <div class="alert alert-success">Tarefa cadastrada com sucesso!</div>
                <?php elseif($_GET['alert'] == "successEdit"): ?>
                    <div class="alert alert-success">Tarefa atualizada com sucesso!</div>
                <?php elseif($_GET['alert'] == "successDelete"): ?>
                    <div class="alert alert-success">Tarefa excluída com sucesso!</div>
                <?php elseif($_GET['alert'] == "successConcluir"): ?>
                    <div class="alert alert-success">Tarefa concluída com sucesso!</div>
                <?php endif; ?>
            <?php endif; ?>

            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th>Descrição</th>
                                        <th>Dificuldade</th>
                                        <th>Tempo Estimado</th>
                                        <th>Pontos</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($tarefas as $tarefa): ?>
                                        <tr>
                                            <td><?= esc($tarefa['Titulo']) ?></td>
                                            <td><?= esc($tarefa['Descricao']) ?></td>
                                            <td><?= ucfirst($tarefa['dificuldade']) ?></td>
                                            <td><?= $tarefa['tempo_estimado'] ?></td>
                                            <td><?= $tarefa['pontos'] ?? 0 ?></td>
                                            <td>
                                                <button class="btn btn-warning" onclick="prepararEdicao(
                                                    <?= $tarefa['TarefaId'] ?>,
                                                    `<?= esc($tarefa['Titulo']) ?>`,
                                                    `<?= esc($tarefa['Descricao']) ?>`,
                                                    `<?= esc($tarefa['dificuldade']) ?>`,
                                                    `<?= esc($tarefa['tempo_estimado']) ?>`
                                                )">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <a href="/tarefas/excluir/<?= $tarefa['TarefaId'] ?>" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>

                                                <a href="/tarefas/concluir/<?= $tarefa['TarefaId'] ?>" class="btn btn-success">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php if (empty($tarefas)): ?>
                                        <tr><td colspan="6">Nenhuma tarefa cadastrada ainda.</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
  lucide.createIcons();
  
function prepararEdicao(id, titulo, descricao, dificuldade = 'medio', tempo = '30m') {
    document.getElementById('modal-editar-tarefa-TarefaId').value = id;
    document.getElementById('modal-editar-tarefa-Titulo').value = titulo;
    document.getElementById('modal-editar-tarefa-Descricao').value = descricao;
    document.getElementById('modal-editar-tarefa-Dificuldade').value = dificuldade;
    document.getElementById('modal-editar-tarefa-Tempo').value = tempo;
    $('#modal-editar-tarefa').modal('show');
}
</script>

<?= $this->endSection() ?>                       