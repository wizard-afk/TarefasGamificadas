<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TarefaModel;
use App\Models\LoginModel;

class Tarefas extends BaseController
{
    private function calcularPontos($dificuldade, $tempo)
    {
        $mapaTempo = [
            '5m' => 1,
            '15m' => 2,
            '30m' => 3,
            '1h' => 4,
            '2h' => 5
        ];
    
        $pesoDificuldade = [
            'facil' => 1,
            'medio' => 2,
            'dificil' => 3
        ];
    
        $baseTempo = $mapaTempo[$tempo] ?? 1;
        $peso = $pesoDificuldade[$dificuldade] ?? 1;

        // Fórmula unificada: (tempo * 10) + (dificuldade * 5)
        return intval(($baseTempo * 10) + ($peso * 5));
    }

    public function listar()
    {
        $tarefa_model = new TarefaModel();
        $login_id = session()->get('usuario_id');

        $tarefas = $tarefa_model
            ->where('LoginId', $login_id)
            ->where('concluida', 0)
            ->findAll();

            $login_model = new LoginModel();
            $usuario = $login_model->find($login_id);
            $pontosTotais = $usuario['Pontos'] ?? 0;

        $data['tarefas'] = $tarefas;
        $data['pontosTotais'] = $pontosTotais;

        echo view('templates/header');
        echo view('tarefas/listar', $data);
        echo view('templates/footer');
    }

    public function cadastrar()
    {
        $dados = $this->request->getVar();
        $dados['LoginId'] = session()->get('usuario_id');

        $dados['pontos'] = $this->calcularPontos($dados['dificuldade'], $dados['tempo_estimado']);

        $tarefa_model = new TarefaModel();
        $tarefa_model->insert($dados);

        return redirect()->to('/tarefas/listar?alert=successCreate');
    }

    public function editar()
    {
        $dados = $this->request->getVar();
        $tarefa_model = new TarefaModel();

        $dados['pontos'] = $this->calcularPontos($dados['dificuldade'], $dados['tempo_estimado']);

        $tarefa_model->where('TarefaId', $dados['TarefaId'])
                     ->where('LoginId', session()->get('usuario_id'))
                     ->set($dados)
                     ->update();

        return redirect()->to('/tarefas/listar?alert=successEdit');
    }

    public function excluir($id)
    {
        $tarefa_model = new TarefaModel();

        $tarefa_model->where('TarefaId', $id)
                     ->where('LoginId', session()->get('usuario_id'))
                     ->delete();

        return redirect()->to('/tarefas/listar?alert=successDelete');
    }

    public function concluir($id)
    {
        $tarefa_model = new TarefaModel();

        $tarefa = $tarefa_model
                    ->where('TarefaId', $id)
                    ->where('LoginId', session()->get('usuario_id'))
                    ->first();

        if ($tarefa && !$tarefa['concluida']) 
        {
            // Marca como concluída
            $tarefa_model->update($id, ['concluida' => 1]);

            // Adiciona pontos ao usuário (baseado nos pontos da tarefa)
            $login_model = new LoginModel();
            $usuario_id = session()->get('usuario_id');

            $usuario = $login_model->find($usuario_id);
            $pontos_atuais = $usuario['Pontos'] ?? 0;

            $login_model->update($usuario_id, [
                'Pontos' => $pontos_atuais + $tarefa['pontos']
            ]);
        }

    

        return redirect()->to('/tarefas/listar?alert=successConclude');
    }

}
