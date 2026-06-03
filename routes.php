<?php

// Carrega o controller responsável pelos endpoints de usuários.
// Observação: o arquivo no projeto está no singular (UsuarioController.php).
require_once __DIR__ . '/app/Controllers/UsuarioController.php';

// Define controller e ação por query string.
$controller = $_GET['controller'] ?? 'home';
$acao = $_GET['acao'] ?? 'index';

// Este roteador é simples: só reconhece o controller "usuarios".
if ($controller == 'usuarios') {
    $usuariosController = new UsuariosController();

    // Escolhe qual método do controller executar.
    switch ($acao) {
        case 'listar':
            $usuariosController->listar();
            break;

        case 'buscar':
            $usuariosController->buscarPorId();
            break;

        case 'criar':
            $usuariosController->criar();
            break;

        case 'atualizar':
            $usuariosController->atualizar();
            break;

        case 'excluir':
            $usuariosController->excluir();
            break;

        default:
            // Retorno padrão para ação inválida.
            echo 'Ação de usuários não encontrada.';
            break;
    }
} else {
    // Resposta básica para indicar que a aplicação está no ar.
    echo "<h1>AtendeLá</h1>";
    echo "<p>Projeto em execução. Use ?controller=usuarios&acao=listar para testar.</p>";
}