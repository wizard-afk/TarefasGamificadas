<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:rgb(97, 95, 134);">
  <!-- Logo + Nome -->
  <div class="brand-link text-center" style="background-color:rgb(110, 107, 173); color: #fff;">
    <img src="<?= base_url('tema/dist/img/borboleta.png') ?>" alt="Logo" style="height: 70px; width: auto; margin-bottom: 10px; filter: drop-shadow(0 0 8px rgba(255,255,255,0.3));">
    <span class="brand-text" style="font-size: 1.4rem; font-weight: 500;">FlutterTasks</span>
    <small class="text-light d-block">Sua produtividade em voo</small>
  </div>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Painel do Usuário -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('tema/dist/img/fofo.jpg') ?>" style="width: 60px; height: 60px; border: 3px solid #e0e0ff; border-radius: 8px; object-fit: cover;" alt="User Photo">
      </div>
      <div class="info ml-2">
        <a href="#" class="d-block" style="color: #fff; font-weight: 500;">
          <?= session()->get('nome_usuario') ?? 'Usuário' ?>
        </a>
        <span class="text-light" style="color: #eee !important;">
          <?= date('d/m/Y') ?>
        </span>
      </div>
    </div>

    <!-- Menu de Navegação -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        
        <!-- Minhas Tarefas -->
        <li class="nav-item">
          <a href="/tarefas/listar" class="nav-link" style="color: #e0d7ff;">
            <i class="nav-icon fas fa-tasks" style="color: #ffd9ec;"></i>
            <p>Minhas Tarefas</p>
          </a>
        </li>

        <!-- Jardim -->
        <li class="nav-item">
          <a href="<?= base_url('jardim') ?>" class="nav-link" style="color: #e0d7ff;">
            <i class="nav-icon fas fa-seedling" style="color: #ffd9ec;"></i>
            <p>Jardim</p>
          </a>
        </li>

      </ul>
    </nav>
  </div>
</aside>
