<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flappy Bird</title>
    <link rel="stylesheet" href="css/flappy.css">
    
    <style>
        @font-face {
            font-family: 'SuperMario';
            src: url("fontes/SuperMario256.ttf") format('truetype');
        }
        .titulo{
            font-family: 'SuperMario';
            font-size: 40px;
        }
        .btn{
            width: 80px;
            height: 35px;
            background-color: #739E82;
            border-radius: 5px;
            font-family:'SuperMario';
            margin-top: 25px;
        }
        .btn:hover, .cursor:hover{
            cursor: pointer;

        }
        
         label, p, h4, span{
            color: black;
            font-family: 'Trebuchet MS';
            font-size: 18px;
         }
       
    </style>
</head>
<body class="conteudo">
    <h1 class="titulo">Flappy Bird</h1>
    <div class="jogo">
        <div class="container">
            <h4>Configurações do Jogo</h4>
            <form action="cadastro.php" method="POST">
                <div class="mini-container" id="container-nome">
                    <label for="cNome" >Nome do jogador: </label>
                    <input type="text" id="cNome"  name="cNome" required>
                </div>
                <div class="mini-container">
                  <p>Cenário do jogo: </p>
                        <input type="radio"  class="cursor" id="cNoturno" name="cCenario" value="noturmo"><label for="cNoturno" class="cursor">Noturno</label>
                        <input type="radio"  class="cursor"id="cDiurno" name="cCenario" checked value="diurno"><label for="cDiurno" class="cursor">Diurno</label>
                </div>
                <div class="mini-container" >
                    <p>Intervalo entre abertura dos canos: </p>
                        <input type="radio" class="cursor" id="iFacil" name="iIntervalo" value="iFacil"> <label for="iFacil" class="cursor">Fácil</label>
                        <input type="radio" class="cursor" id="iMedio" name="iIntervalo" checked value="iMedia"> <label for="iMedio" class="cursor">Médio</label>
                        <input type="radio" class="cursor" id="iDificil" name="iIntervalo" value="iDificl"> <label for="iDificil" class="cursor">Difícil</label>
                </div>
                <div class="mini-container">
                    <p>Distância entre os canos: </p>
                    <input type="radio" class="cursor" id="dFacil" name="dDistancia" value="dFacil"> <label for="dFacil" class="cursor">Fácil</label>
                    <input type="radio" class="cursor" id="dMedio" name="dDistancia" checked value="dMedia"> <label for="dMedio" class="cursor">Média</label>
                    <input type="radio" class="cursor" id="dDificil" name="dDistancia" value="dDificil"> <label for="dDificil" class="cursor">Difícil</label>
                </div>
                <div class="mini-container">
                    <label for="cVelocidade">Velocidade do jogo: </label>
                    <span> 1 <input value="1" name="cVelocidade" type="range" min="1" max="10" class="cursor"> 10</span>
                </div>
                <div class="mini-container">
                    <label for="cPersonangens">Personagens: </label>
                    <select name="cPersonagem" id="cPersonagens" class="cursor">
                        <option  value="passaro">Pássaro</option>
                        <option  value="mario">Mario</option>
                        <option  value="crash">Crash</option>
                    </select>
                </div>
                <div class="mini-container">
                    <p>Tipo de Jogo: </p>
                    <input type="radio" class="cursor" id="tTreino" name="tTipo" value="tTreino"> <label for="tTreino" class="cursor">Treino</label>
                    <input type="radio" class="cursor" id="tReal" name="tTipo" checked value="tTreal"> <label for="tReal" class="cursor">Real</label>
                </div>
                <div class="mini-container">
                    <p>Velocidade do personagem: </p>
                    <input type="radio" class="cursor" id="vBaixa" name="vVelocidade" value="vBaixa"> <label for="vBaixa" class="cursor">Baixa</label>
                    <input type="radio" class="cursor" id="vMedia" name="vVelocidade" checked value="vMedia"> <label for="vMedia" class="cursor">Média</label>
                    <input type="radio" class="cursor" id="vRapida" name="vVelocidade" value="vDificil"> <label for="vDificil" class="cursor">Difícil</label>
                </div>
                <div class="mini-container">
                    <p>Pontuação: </p>
                    <input type="radio" class="cursor" id="p1" name="pPontuacao" checked value="1"> <label for="p1" class="cursor">1</label>
                    <input type="radio" class="cursor" id="p10" name="pPontuacao" value="10"> <label for="p10" class="cursor">10</label>
                    <input type="radio" class="cursor" id="p100" name="pPontuacao" value="100"> <label for="p100" class="cursor">100</label>
                </div>
                <div class="mini-container">
                    <input type="submit" value="Jogar" class="btn">
                </div>
            </form>
        </div>
        
         
    </div>

   <script src="js/flappy.js"></script>
    </body>
</html>