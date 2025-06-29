<?= $this->extend('templates/template') ?>

<?= $this->section('conteudo') ?> <!-- Verifique se o nome da section bate com seu template -->
<div class="container-fluid">
    <div class="row">

        <!-- Conteúdo Principal -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2" style="color: black;">🌱 Seu Jardim</h1>
            </div>

            <!-- Mensagens Flash -->
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <!-- Card do Jardim -->
            <div class="card shadow-sm" style="border-radius: 18px; background:rgb(75, 88, 81); position: relative; overflow: hidden;">
                <div class="card-body" style="background: rgba(20, 20, 30, 0.85); color: #fff; border-radius: 16px; border: 1px solid #4e4e6a; box-shadow: 0 0 20px rgba(80, 80, 130, 0.4); position: relative; z-index: 2;">

                    <div class="text-center mb-4" style="position: relative; z-index: 2;">
                        <!-- Imagem de estrelas atrás da árvore -->
                        <img 
                            src="<?= base_url('tema/dist/img/stars-bg.jpg') ?>" 
                            alt="Fundo Estrelado" 
                            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 800px; opacity: 0.3; pointer-events: none; z-index: 1;"
                        >
                        <!-- Imagem da árvore grande e centralizada -->
                        <img 
                            src="<?= base_url('tema/dist/img/arvore-nivel-' . $jardim['nivel'] . '.png') ?>" 
                            alt="Árvore Nível <?= esc($jardim['nivel']) ?>" 
                            class="arvore-img"
                            style="width: 320px; max-width: 100%; filter: drop-shadow(0 0 15px #bbaaff); animation: flutuar 4s ease-in-out infinite; position: relative; z-index: 2;"
                        >
                    </div>

                    <div class="text-center mb-3">
                        <p class="card-text" style="font-size: 1.25rem;">
                            <strong>Nível:</strong> <?= esc($jardim['nivel']) ?> &nbsp;&nbsp;|&nbsp;&nbsp; 
                            <strong>Pontos Disponíveis:</strong> <span id="pontos-usuario"><?= esc($pontos) ?></span>
                        </p>
                    </div>

                    <div class="text-center mb-3" style="color: #ddd; font-style: italic;">
                        Você já gastou <strong><?= esc($pontos_gastos) ?></strong> pontos neste jardim.<br>
                        <?php if ($falta_para_subir > 0): ?>
                            Faltam <strong><?= esc($falta_para_subir) ?></strong> pontos para subir para o próximo nível.
                        <?php else: ?>
                            Parabéns! Você já pode subir de nível.
                        <?php endif; ?>
                    </div>


                    <hr style="border-color: #444;">

                    <!-- Ações -->
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        <form method="post" action="<?= base_url('jardim/realizarAcao/regar') ?>">
                            <button type="submit" class="btn btn-primary" <?= ($pontos < 20) ? 'disabled' : '' ?>>
                                💧 Regar (-20 pts)
                            </button>
                        </form>

                        <form method="post" action="<?= base_url('jardim/realizarAcao/abracar') ?>">
                            <button type="submit" class="btn btn-success" <?= ($pontos < 10) ? 'disabled' : '' ?>>
                                🤗 Abraçar (-10 pts)
                            </button>
                        </form>

                        <form method="post" action="<?= base_url('jardim/realizarAcao/adubar') ?>">
                            <button type="submit" class="btn btn-warning" <?= ($pontos < 20) ? 'disabled' : '' ?>>
                                🌿 Adubar (-20 pts)
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </main>
    </div>
</div>

<style>
  body {
    font-family: 'Poppins', sans-serif;
    color: #f0f0f0;
    background-color: #121212; /* fundo neutro para a página */
  }

  .btn-primary {
    background-color: #4a90e2;
    border: none;
    border-radius: 20px;
    font-weight: 500;
    transition: all 0.3s ease-in-out;
  }

  .btn-primary:hover {
    transform: scale(1.05);
    filter: brightness(1.1);
  }

  .btn-success {
    background-color: #5cd6a0;
    border: none;
    border-radius: 20px;
    font-weight: 500;
    transition: all 0.3s ease-in-out;
  }

  .btn-success:hover {
    transform: scale(1.05);
    filter: brightness(1.1);
  }

  .btn-warning {
    background-color: #ffe066;
    border: none;
    color: #333;
    border-radius: 20px;
    font-weight: 500;
    transition: all 0.3s ease-in-out;
  }

  .btn-warning:hover {
    transform: scale(1.05);
    filter: brightness(1.1);
  }

  @keyframes flutuar {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-8px); }
    100% { transform: translateY(0px); }
  }
</style>

<?= $this->endSection() ?>
