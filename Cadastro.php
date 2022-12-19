<?php
    include("ConexaoBD.php");

    $jogador = $_POST['cNome'];
    $cenario = $_POST['cCenario'];
    $intervalo = $_POST['iIntervalo'];
    $abertura = $_POST['dDistancia'];
    $velocidade = $_POST['cVelocidade'];
    $personagem = $_POST['cPersonagem'];
    $tipoJogo = $_POST['tTipo'];
    $velocidadePersonagem = $_POST['vVelocidade'];
    $pontuacao = $_POST['pPontuacao'];

    $retornoBD;
    $conexaoBD;

    $objConexao = new ConexaoBD();
    $conexaoBD = $objConexao->getConexaoBD();

    $mysqli = conexaoBD->prepare("INSERT INTO `partida`(`idpartida`,`jogador`,`cenario`,`velocidade`, `intervalo`,`distancia`,`personagem`, `tipoJogo`,`velocidadePersonagem`, `pontuacao`) VALUES(NULL,?,?,?,?,?,?,?,?,?) ");

    $mysqli->bind_param('ssssisssi', $jogador, $cenario, $intervalo, $abertura, $velocidade, $personagem, $tipoJogo, $velocidadePersonagem, $pontuacao);

    $retorno = $mysqli->execute();

    echo'<script>window.location.href="index.php?jogador='.$jogador.'&cenario='.$cenario.'&velocidadeJogo='.$velocidadeJogo.
    '&intervalo='.$intervalo.'&distanciaCanos='.$abertura.'&personagem='.$personagem.'&tipo='.$tipoJogo.
    '&pontuacao='.$pontuacao.'&VelocidadePersonagem='.$velocidadePersonagem.'"</script>';

    


