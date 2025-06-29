<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JardimModel;
use App\Models\LoginModel;

class JardimController extends BaseController
{
    protected $jardimModel;
    protected $loginModel;

    public function __construct()
    {
        $this->jardimModel = new JardimModel();
        $this->loginModel = new LoginModel();
    }

    public function index()
    {
        $loginId = session()->get('usuario_id');
        if (!$loginId) {
            return redirect()->to('/login');
        }

        // Pega dados do usuário (inclui pontos)
        $usuario = $this->loginModel->find($loginId);
        if (!$usuario) {
            return redirect()->to('/login');
        }

        $jardim = $this->jardimModel->where('login_id', $loginId)->first();

        if (!$jardim) {
            $this->jardimModel->insert([
                'login_id' => $loginId,
                'nivel' => 1,
                'pontos_gastos' => 0,
            ]);
            $jardim = $this->jardimModel->where('login_id', $loginId)->first();
        }
    
        // Níveis e metas de pontos gastos
        $niveis = [
            1 => 100,
            2 => 200,
            3 => null, // último nível
        ];
    
        $pontosGastos = $jardim['pontos_gastos'] ?? 0;
        $nivelAtual = $jardim['nivel'];
        $proximoNivel = $nivelAtual < 3 ? $nivelAtual : 3;
        $metaPontos = $niveis[$proximoNivel] ?? null;
    
        $faltaParaSubir = $metaPontos ? max(0, $metaPontos - $pontosGastos) : 0;
    
        return view('jardim/index', [
            'jardim' => $jardim,
            'pontos' => $usuario['Pontos'],
            'pontos_gastos' => $pontosGastos,
            'falta_para_subir' => $faltaParaSubir,
        ]);
    }

    public function realizarAcao($acao)
    {
        $loginId = session()->get('usuario_id');
        if (!$loginId) {
            return redirect()->to('/login');
        }
    
        $usuario = $this->loginModel->find($loginId);
        if (!$usuario) {
            return redirect()->to('/login');
        }
    
        $jardim = $this->jardimModel->where('login_id', $loginId)->first();
        if (!$jardim) {
            return redirect()->back()->with('error', 'Jardim não encontrado.');
        }
    
        $custos = [
            'regar'   => 20,
            'abracar' => 10,
            'adubar'  => 20,
        ];
    
        if (!isset($custos[$acao])) {
            return redirect()->back()->with('error', 'Ação inválida.');
        }
    
        $custo = $custos[$acao];
    
        if ($usuario['Pontos'] < $custo) {
            return redirect()->back()->with('error', 'Pontos insuficientes para ' . $acao);
        }
    
        // Deduz pontos do usuário
        $novoSaldo = $usuario['Pontos'] - $custo;
        $this->loginModel->update($loginId, ['Pontos' => $novoSaldo]);
    
        // Atualiza pontos gastos acumulados no jardim
        $pontosGastosNovos = ($jardim['pontos_gastos'] ?? 0) + $custo;
    
        // Calcula novo nível baseado nos pontos gastos acumulados
        if ($pontosGastosNovos >= 200) {
            $novoNivel = 3;
        } elseif ($pontosGastosNovos >= 100) {
            $novoNivel = 2;
        } else {
            $novoNivel = 1;
        }
    
        // Atualiza jardim com novos pontos gastos e nível
        $this->jardimModel->update($jardim['id'], [
            'pontos_gastos' => $pontosGastosNovos,
            'nivel' => $novoNivel,
        ]);
    
        return redirect()->back()->with('success', "Você realizou a ação: $acao!");
    }    
    
}
