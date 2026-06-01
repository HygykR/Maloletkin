"use strict";

const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');

let speed = 5;
let gameRunning = true;
let score = 0;
let highScore = 0;
let animationId = null;

let carWidth = 40;
let carHeight = 60;

const player = {
    x: 0,
    y: 0,
    width: 40,
    height: 60,
    image: new Image()
};
player.image.src = 'car.png';

let enemies = [];

let roadY1 = 0;
let roadY2 = -512;

const roadImage = new Image();
roadImage.src = 'road.jpg';

const enemyImage = new Image();
enemyImage.src = 'car_red.png';

let imagesLoaded = 0;

function checkImages() {
    imagesLoaded++;
    if (imagesLoaded === 3) {
        startGame();
    }
}

player.image.onload = checkImages;
player.image.onerror = checkImages;
enemyImage.onload = checkImages;
enemyImage.onerror = checkImages;
roadImage.onload = checkImages;
roadImage.onerror = checkImages;

function resize() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    
    carWidth = canvas.width * 0.1;
    carHeight = carWidth * 1.5;
    
    player.width = carWidth;
    player.height = carHeight;
    player.x = canvas.width / 2 - player.width / 2;
    player.y = canvas.height - player.height - 20;
}

function startGame() {
    resize();
    gameRunning = true;
    score = 0;
    speed = 5;
    enemies = [];
    roadY1 = 0;
    roadY2 = -canvas.height;
    
    player.x = canvas.width / 2 - player.width / 2;
    player.y = canvas.height - player.height - 20;
    
    gameLoop();
}

function gameLoop() {
    if (!gameRunning) return;
    
    update();
    draw();
    
    animationId = requestAnimationFrame(gameLoop);
}

function update() {
    roadY1 += speed;
    roadY2 += speed;
    
    if (roadY1 >= canvas.height) {
        roadY1 = roadY2 - canvas.height;
    }
    if (roadY2 >= canvas.height) {
        roadY2 = roadY1 - canvas.height;
    }
    
    for (let i = 0; i < enemies.length; i++) {
        enemies[i].y += speed;
    }
    
    if (Math.random() < 0.03 && gameRunning) {
        let enemyX = Math.random() * (canvas.width - carWidth);
        enemies.push({
            x: enemyX,
            y: -carHeight,
            width: carWidth,
            height: carHeight
        });
    }
    
    for (let i = 0; i < enemies.length; i++) {
        if (enemies[i].y > canvas.height) {
            score++;
            enemies.splice(i, 1);
            i--;
        }
    }
    
    for (let i = 0; i < enemies.length; i++) {
        if (player.x < enemies[i].x + enemies[i].width &&
            player.x + player.width > enemies[i].x &&
            player.y < enemies[i].y + enemies[i].height &&
            player.y + player.height > enemies[i].y) {
            gameOver();
            break;
        }
    }
    
    speed = 5 + Math.floor(score / 20);
}

function draw() {
    ctx.drawImage(roadImage, 0, roadY1, canvas.width, canvas.height);
    ctx.drawImage(roadImage, 0, roadY2, canvas.width, canvas.height);
    
    for (let i = 0; i < enemies.length; i++) {
        ctx.drawImage(enemyImage, enemies[i].x, enemies[i].y, enemies[i].width, enemies[i].height);
    }
    
    ctx.drawImage(player.image, player.x, player.y, player.width, player.height);
    
    ctx.fillStyle = 'white';
    ctx.font = 'bold 30px Arial';
    ctx.shadowColor = 'black';
    ctx.shadowBlur = 4;
    ctx.fillText('Счет: ' + score, 20, 50);
    ctx.fillText('Рекорд: ' + highScore, 20, 100);
    ctx.shadowBlur = 0;
}

function gameOver() {
    gameRunning = false;
    
    if (score > highScore) {
        highScore = score;
    }
    
    showPopup();
}

function showPopup() {
    let popup = document.createElement('div');
    popup.style.position = 'fixed';
    popup.style.top = '0';
    popup.style.left = '0';
    popup.style.width = '100%';
    popup.style.height = '100%';
    popup.style.backgroundColor = 'rgba(0,0,0,0.8)';
    popup.style.display = 'flex';
    popup.style.justifyContent = 'center';
    popup.style.alignItems = 'center';
    popup.style.zIndex = '1000';
    
    let box = document.createElement('div');
    box.style.backgroundColor = 'white';
    box.style.padding = '40px';
    box.style.borderRadius = '20px';
    box.style.textAlign = 'center';
    box.style.fontFamily = 'Arial';
    box.style.minWidth = '300px';
    
    box.innerHTML = `
        <h1 style="color: red; margin-bottom: 20px;">GAME OVER</h1>
        <p style="font-size: 24px; margin-bottom: 10px;">Счет: ${score}</p>
        <p style="font-size: 20px; margin-bottom: 30px;">Рекорд: ${highScore}</p>
        <p style="font-size: 18px; color: green;">Нажми ПРОБЕЛ чтобы играть снова</p>
    `;
    
    popup.appendChild(box);
    document.body.appendChild(popup);
    
    document.addEventListener('keydown', function restart(e) {
        if (e.code === 'Space') {
            e.preventDefault();
            document.body.removeChild(popup);
            document.removeEventListener('keydown', restart);
            restartGame();
        }
    });
}

function restartGame() {
    gameRunning = true;
    score = 0;
    speed = 5;
    enemies = [];
    roadY1 = 0;
    roadY2 = -canvas.height;
    
    player.x = canvas.width / 2 - player.width / 2;
    player.y = canvas.height - player.height - 20;
    
    gameLoop();
}

let leftPressed = false;
let rightPressed = false;

document.addEventListener('keydown', function(e) {
    if (e.key === 'ArrowLeft') {
        leftPressed = true;
        e.preventDefault();
    } else if (e.key === 'ArrowRight') {
        rightPressed = true;
        e.preventDefault();
    }
});

document.addEventListener('keyup', function(e) {
    if (e.key === 'ArrowLeft') {
        leftPressed = false;
        e.preventDefault();
    } else if (e.key === 'ArrowRight') {
        rightPressed = false;
        e.preventDefault();
    }
});

function updatePlayerPosition() {
    if (!gameRunning) return;
    
    let moveSpeed = 10;
    if (leftPressed && player.x > 0) {
        player.x -= moveSpeed;
    }
    if (rightPressed && player.x + player.width < canvas.width) {
        player.x += moveSpeed;
    }
}

window.addEventListener('resize', function() {
    resize();
    if (gameRunning) {
        player.x = Math.min(Math.max(player.x, 0), canvas.width - player.width);
        player.y = canvas.height - player.height - 20;
    }
});

const originalUpdate = update;
update = function() {
    updatePlayerPosition();
    originalUpdate();
};