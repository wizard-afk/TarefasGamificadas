<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class Login extends BaseController
{
    public function index()
    {
        echo View('login/index');
    }

    public function autenticar()
    {
        $dados = $this->request->getVar();

        $login_model = new LoginModel();

        $login = $login_model->where('Usuario', $dados['Usuario'])->where('Senha', $dados['Senha'])->first();

        if (!empty($login)) {
            // Inicia a sessão com dados do usuário
            session()->set([
                'usuario_id'   => $login['LoginId'],
                'usuario_nome' => $login['Usuario'],
                'logado'       => true
            ]);

            return redirect()->to('/tarefas/listar'); // ✅ redireciona corretamente para tarefas
        }

        return redirect()->to('/login?alert=errorLogin');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
