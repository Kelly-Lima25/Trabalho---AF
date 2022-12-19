<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flappy Bird</title>
    <link rel="stylesheet" href="css/flappy.css">
</head>
<body class="conteudo">
    <h1>Flappy Bird</h1>
    <div class="jogo">
        <div class="container">
            <h4>Configurações do Jogo</h4>
            <form action="" method="get">
                <div class="mini-container" id="container-nome">
                    <label for="cNome" >Nome do jogador: </label>
                    <input type="text" id="cNome"  name="cNome" value="cNome" required>
                </div>
                <div class="mini-container">
                  <p>Cenário do jogo: </p>
                        <input type="radio" id="cNoturno" name="cCenario" value="Diurno"><label for="cNoturno">Noturno</label>
                        <input type="radio" id="cDiurno" name="cCenario" checked value="Noturno"><label for="cDiurno">Diurno</label>
                </div>
                <div class="mini-container">
                    <p>Intervalo entre abertura dos canos: </p>
                        <input type="radio" id="iFacil" name="iIntervalo" value="iFacil"> <label for="iFacil">Fácil</label>
                        <input type="radio" id="iMedio" name="iIntervalo" checked value="iMedia"> <label for="iMedio">Médio</label>
                        <input type="radio" id="iDificil" name="iIntervalo" value="iDificl"> <label for="iDificil">Difícil</label>
                </div>
                <div class="mini-container">
                    <p>Distância entre os canos: </p>
                    <input type="radio" id="dFacil" name="dDistancia" value="dFacil"> <label for="dFacil">Fácil</label>
                    <input type="radio" id="dMedio" name="dDistancia" checked value="dMedia"> <label for="dMedio">Média</label>
                    <input type="radio" id="dDificil" name="dDistancia" value="dDificil"> <label for="dDificil">Difícil</label>
                </div>
                <div class="mini-container">
                    <label for="cVelocidade">Velocidade do jogo: </label>
                    <span>1<input value="1" name="cVelocidade" type="range" min="1" max="10">10</span>
                </div>
                <div class="mini-container">
                    <label for="cPersonangens">Personagens: </label>
                    <select name="cPersonagem" id="cPersonagens">
                        <option value="passaro">Pássaro</option>
                        <option value="mario">Mario</option>
                        <option value="crash">Crash</option>
                    </select>
                </div>
                <div class="mini-container">
                    <p>Tipo de Jogo: </p>
                    <input type="radio" id="tTreino" name="tTipo" value="tTreino"> <label for="tTreino">Treino</label>
                    <input type="radio" id="tReal" name="tTipo" checked value="tTreal"> <label for="tReal">Real</label>
                </div>
                <div class="mini-container">
                    <p>Velocidade do personagem: </p>
                    <input type="radio" id="vBaixa" name="vVelocidade" value="vBaixa"> <label for="vBaixa">Baixa</label>
                    <input type="radio" id="vMedia" name="vVelocidade" checked value="vMedia"> <label for="vMedia">Média</label>
                    <input type="radio" id="vRapida" name="vVelocidade" value="vDificil"> <label for="vDificil">Difícil</label>
                </div>
                <div class="mini-container">
                    <p>Pontuação: </p>
                    <input type="radio" id="p1" name="pPontuacao" checked value="1"> <label for="p1">1</label>
                    <input type="radio" id="p10" name="pPontuacao" value="10"> <label for="p10">10</label>
                    <input type="radio" id="p100" name="pPontuacao" value="100"> <label for="p100">100</label>
                </div>
                <div class="mini-container">
                    <input type="button" value="Jogar">
                </div>
            </form>
        </div>
        <div wm-flappy>
        </div>
         
    </div>

   <script src="js/flappy.js"></script>
    </body>
</html>