<?php
// jogos.php
require('carregar_twig.php');
require('carregar_pdo.php');
echo date('d/m/Y H:i:s');die;

use Carbon\Carbon;

$jogos = $pdo->query('SELECT * FROM jogos');
$todosJogos = $jogos->fetchAll(PDO::FETCH_ASSOC);

$hoje = Carbon::now();  

foreach ($todosJogos as &$jogo) {
    $jogo['lancamento'] = Carbon::parse($jogo['lancamento'])->locale('pt_BR')->isoFormat('LL');
}

echo $twig->render('jogos.html', [
    'jogos' => $todosJogos,
]);