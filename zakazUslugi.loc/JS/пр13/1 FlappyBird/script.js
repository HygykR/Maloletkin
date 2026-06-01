"use strict"

let cvs = document.querySelector('#canvas')
let ctx = cvs.getContext('2d')

let bird = new Image()
let bg = new Image()
let fg = new Image()
let pipeUp = new Image()
let pipeBottom = new Image()

bird.src = 'img/bird.png'
bg.src = 'img/bg.png'
fg.src = 'img/fg.png'
pipeUp.src = 'img/pipeUp.png'
pipeBottom.src = 'img/pipeBottom.png'

let fly = new Audio()
let score_audio = new Audio()
fly.src = 'audio/svist.mp3'
score_audio.src = 'audio/sliva.mp3'

let gap = 90
let score = 0

// Позиция птички
let xPos = 10
let yPos = 150
let grav = 1

document.addEventListener("keydown", function(e){
    if(e.key == " "){
        yPos -= 20      
        fly.play()
    }
})

let pipe = []
pipe[0] = {
    x: cvs.width,
    y: 0
}


function draw(){
    ctx.drawImage(bg, 0, 0)


    for(let i = 0;i<pipe.length;i++){
    ctx.drawImage(pipeUp, pipe[i].x, pipe[i].y)
    ctx.drawImage(pipeBottom, pipe[i].x, pipe[i].y + pipeUp.height + gap)
    pipe[i].x --

    if(pipe[i].x == 125){
        pipe.push({
            x : cvs.width,
            y : Math.floor(Math.random() * (cvs.height - pipeUp.height - gap)) - pipeUp.height
        })
    }

    if(xPos + bird.width >= pipe[i].x && xPos <= pipe[i].x + pipeUp.width && (yPos <= pipe[i].y + pipeUp.height || yPos + bird.height >= pipe[i].y + pipeUp.height + gap)){
        location.reload() //game over
    }

    if(pipe[i].x == 5){
        score++
        score_audio.play()
    }
}


    ctx.drawImage(fg, 0, cvs.height - fg.height)
    ctx.drawImage(bird, xPos, yPos)

    yPos += grav

    ctx.fillStyle = '#000'
    ctx.font = '24px Verdana'
    ctx.fillText('Счет: ' + score, 10, cvs.height - 20)
    
    requestAnimationFrame(draw)
}

pipeBottom.onload = draw