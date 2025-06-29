<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>StartDev Brasil - Login</title>

    <!-- Google Font: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('tema/plugins/fontawesome-free/css/all.min.css') ?>" />
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('tema/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('tema/dist/css/adminlte.min.css') ?>" />

    <style>
        body.login-page {
            font-family: 'Poppins', sans-serif;
            background: url('<?= base_url('tema/dist/img/stars-bg.jpg') ?>') no-repeat center center fixed;
            background-size: cover;
            color: #e0d7ff;
        }

        .login-box {
            width: 380px;
            margin: 7% auto;
        }

        /* Card com fundo translúcido */
        .card-outline.card-primary {
            background: rgba(25, 20, 50, 0.85);
            border-radius: 16px;
            border: 1.5px solid #6e6ba9;
            box-shadow: 0 0 25px rgba(110, 107, 173, 0.7);
            color: #e0d7ff;
        }

        .card-header.text-center a.h1 {
            font-weight: 700;
            font-size: 2.8rem;
            color: #bbaaff;
            text-shadow: 0 0 8px #bbaaff;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        /* Logo borboleta ao lado do texto */
        .card-header.text-center a.h1 img {
            height: 50px;
            filter: drop-shadow(0 0 10px #bbaaff);
        }

        .login-box-msg {
            color: #d1cfff;
            font-weight: 500;
            margin-bottom: 1.5rem;
        }

        /* Inputs */
        .form-control {
            background: rgba(255 255 255 / 0.15);
            border: 1px solid #888;
            color: #eee;
            border-radius: 8px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255 255 255 / 0.3);
            border-color: #bbaaff;
            color: #fff;
            box-shadow: 0 0 8px #bbaaff;
        }

        .input-group-text {
            background: rgba(255 255 255 / 0.15);
            border: 1px solid #888;
            color: #bbaaff;
            border-radius: 8px;
        }

        /* Botão */
        .btn-primary {
            background-color: #6e6ba9;
            border: none;
            border-radius: 30px;
            font-weight: 600;
            letter-spacing: 1px;
            box-shadow: 0 0 12px #6e6ba9;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #8c89c4;
            box-shadow: 0 0 18px #8c89c4;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1">
                    <img src="<?= base_url('tema/dist/img/borboleta.png') ?>" alt="Logo Borboleta" />
                    FlutterTasks
                </a>
            </div>
            <div class="card-body">
                <?php if (isset($_GET['alert'])) : ?>
                    <p class="login-box-msg">Acesso Negado! Informe os dados corretamente.</p>
                <?php else : ?>
                    <p class="login-box-msg">Acesse sua conta para continuar</p>
                <?php endif; ?>

                <form action="/login/autenticar" method="post" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Digite seu usuário" name="Usuario" required autofocus />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Digite sua senha" name="Senha" required />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">ACESSE SUA CONTA</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('tema/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('tema/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('tema/dist/js/adminlte.min.js') ?>"></script>
</body>

</html>
