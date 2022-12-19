const urlParams = new URLSearchParams(window.location.search);
const pontuacao = urlParams.get('pontuacao');

function mudarCenario(){
    const urlParams = new URLSearchParams(window.location.search);

    const cenario = urlParams.get('cenario');
    const Jogo = document.querySelector('[wm-flappy]')
    if(cenario == 'diurno'){
        Jogo.style.background= 'var(--backgroundDark)';
    }
    else{
        Jogo.style.background= 'var(--backgroundLight)';
    }
    
}

function mudarVelocidade(){
    const urlParams = new URLSearchParams(window.location.search);
    const velocidade = urlParams.get('velocidadeJogo');
    return velocidade;
}

function mudarPontuacao(){
    const urlParams = new URLSearchParams(window.location.search);
    const pontuacao = urlParams.get('pontuacao');
    return parseInt(pontuacao)
}

function mudarPersonagem(){
    const urlParams = new URLSearchParams(window.location.search);
    const personagem = urlParams.get('personagem'); 

    switch(personagem){
        case 'passaro':
            return 'img/passaro.png' 
            break;
        case 'mario':
            return 'img/mario.png'
            break;
        case 'crash':
            return 'img/crash.png'
            break;
        default:
            return null;
    }
}

function mudarAbertura(){
    const urlParams = new URLSearchParams(window.location.search);
    const abertura = urlParams.get('distanciaCanos');

    switch(abertura){
        case 'facil':
            return 280
            break;
        case 'medio':
            return 210
            break;
        case 'dificil':
            return 180
            break;
        default:
            return null;
    }
}

function mudarIntervalo(){
    const urlParams = new URLSearchParams(window.location.search);
    const intervalo = urlParams.get('intervalo');

    switch(intervalo){
        case 'facil':
            return 480
            break;
        case 'medio':
            return 390
            break;
        case 'dificil':
            return 300
            break;
        default:
            return null;
    }
}



function novoElemento(tagName, className) {
    const elemento = document.createElement(tagName)
    elemento.className = className
    return elemento
}

function Barreira(reversa = false) {
    this.elemento = novoElemento('div', 'barreira')
    const borda = novoElemento('div', 'borda')
    const corpo = novoElemento('div', 'corpo')
    this.elemento.appendChild(reversa ? corpo : borda)
    this.elemento.appendChild(reversa ? borda : corpo)

    this.setAltura = altura => corpo.style.height = `${altura}px`

}

function ParDeBarreiras(altura, abertura, popsicaoNaTela) {
    this.elemento = novoElemento('div', 'par-de-barreiras')
    this.superior = new Barreira(true)
    this.inferior = new Barreira(false)

    this.elemento.appendChild(this.superior.elemento)
    this.elemento.appendChild(this.inferior.elemento)


     this.sortearAbertura = () => {
        const alturaSuperior = Math.random() * (altura - abertura)
        const alturaInferior = altura - abertura - alturaSuperior
        this.superior.setAltura(alturaSuperior)
        this.inferior.setAltura(alturaInferior)
    }
    this.getX = () => parseInt(this.elemento.style.left.split('px')[0])
    this.setX =  popsicaoNaTela => this.elemento.style.left = `${popsicaoNaTela}px`
    this.getLargura = () => this.elemento.clientWidth

    this.sortearAbertura()
    this.setX(popsicaoNaTela)
 } 

function Barreiras(altura, largura, abertura, espaco, notificarPonto) {
    this.pares = [
        new ParDeBarreiras(altura, abertura, largura),
        new ParDeBarreiras(altura, abertura, largura + espaco),
        new ParDeBarreiras(altura, abertura, largura + espaco * 2),
        new ParDeBarreiras(altura, abertura, largura + espaco * 3),

    ]

    const deslocamento = mudarVelocidade()
        this.animar = () => {
        this.pares.forEach(par => {
            par.setX(par.getX() - deslocamento)

            if (par.getX() < -par.getLargura()) {
                par.setX(par.getX() + espaco * this.pares.length)
                par.sortearAbertura()
            }
            const meio = largura / 2
            const cruzouMeio = par.getX() + deslocamento >= meio
                && par.getX() < meio
            if (cruzouMeio) {
                notificarPonto()
            }
        })
    }
}

function Passaro(alturaJogo) {
    let voando = false

    this.elemento = novoElemento('img', 'passaro')
    this.elemento.src = mudarPersonagem()

    this.getY = () => parseInt(this.elemento.style.bottom.split('px')[0])
    this.setY = y => this.elemento.style.bottom = `${y}px`

    window.onkeydown = e => voando = true
    window.onkeyup = e => voando = false

    this.animar = () => {
        const novoY = this.getY() + (voando ? 8 : -5)
        const alturaMaxima = alturaJogo - this.elemento.clientWidth

        if (novoY <= 0) {
            this.setY(0)
        } else if (novoY >= alturaMaxima) {
            this.setY(alturaMaxima)
        } else {
            this.setY(novoY)
        }
    }
    this.setY(alturaJogo / 2)
}

 function Progresso() {

    this.elemento = novoElemento('span', 'progresso')
    this.atualizarPontos = pontos => {
        this.elemento.innerHTML = pontos
    }
    this.atualizarPontos(0)
}

 function estaoSobrepostos(elementoA, elementoB) {

    const a = elementoA.getBoundingClientRect()
    const b = elementoB.getBoundingClientRect()
    const horizontal = a.left + a.width >= b.left && b.left + b.width >= a.left
    const vertical = a.top + a.height >= b.top && b.top + b.height >= a.top

    return horizontal && vertical
}

function colidiu(passaro, barreiras) {
    let colidiu = false

    barreiras.pares.forEach(parDeBarreiras => {
        if (!colidiu) {
            const superior = parDeBarreiras.superior.elemento
            const inferior = parDeBarreiras.inferior.elemento
            colidiu = estaoSobrepostos(passaro.elemento, superior)
                || estaoSobrepostos(passaro.elemento, inferior)
        }
    })
    return colidiu

}

 function FlappyBird() {
    let pontos = 0
    const areaDoJogo = document.querySelector('[wm-flappy]')
    const altura = areaDoJogo.clientHeight
    const largura = areaDoJogo.clientWidth

    const progresso = new Progresso()
    const barreiras = new Barreiras(altura, largura, mudarAbertura(), mudarIntervalo(),
        () => progresso.atualizarPontos(++pontos))

    const passaro = new Passaro(altura)

    areaDoJogo.appendChild(progresso.elemento)
    areaDoJogo.appendChild(passaro.elemento)
    barreiras.pares.forEach(par => areaDoJogo.appendChild(par.elemento))
    

    this.start = () => {
        const temporizador = setInterval(() => {
            barreiras.animar()
            passaro.animar()

              if(colidiu(passaro,barreiras)){
                 clearInterval(temporizador) 
             } 
        }, 20)
    }
}

let btn = document.querySelector('#btn')
btn.addEventListener('click', FlappyBird() )
 //new FlappyBird().start() 