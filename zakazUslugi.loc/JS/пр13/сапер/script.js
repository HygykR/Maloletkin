"use strict";

let canvas = document.createElement('canvas');
let ctx = canvas.getContext('2d');
document.body.appendChild(canvas);

let rows = 9;
let cols = 9;
let cellSize = 40;
let totalMines = 10;

canvas.width = cols * cellSize;
canvas.height = rows * cellSize;

let board = [];
let gameOver = false;
let win = false;
let firstClick = true;

let flags = 0;
let minesLeft = totalMines;

let infoDiv = document.createElement('div');
document.body.appendChild(infoDiv);

let popup = null;

function updateInfo() {
    infoDiv.textContent = '💣' + (minesLeft - flags) + ' | 🚩 ' + flags;
}

function createEmptyBoard() {
    let b = [];
    for(let i = 0; i < rows; i++) {
        b[i] = [];
        for(let j = 0; j < cols; j++) {
            b[i][j] = {
                mine: false,
                revealed: false,
                flag: false,
                neighbor: 0
            };
        }
    }
    return b;
}

function placeMines(firstRow, firstCol) {
    let mines = 0;
    while(mines < totalMines) {
        let r = Math.floor(Math.random() * rows);
        let c = Math.floor(Math.random() * cols);
        if(!board[r][c].mine && !(r === firstRow && c === firstCol)) {
            board[r][c].mine = true;
            mines++;
        }
    }
    calculateNeighbors();
}

function calculateNeighbors() {
    for(let i = 0; i < rows; i++) {
        for(let j = 0; j < cols; j++) {
            if(board[i][j].mine) continue;
            let count = 0;
            for(let di = -1; di <= 1; di++) {
                for(let dj = -1; dj <= 1; dj++) {
                    let ni = i + di;
                    let nj = j + dj;
                    if(ni >= 0 && ni < rows && nj >= 0 && nj < cols && board[ni][nj].mine) {
                        count++;
                    }
                }
            }
            board[i][j].neighbor = count;
        }
    }
}

function revealCell(row, col) {
    if(row < 0 || row >= rows || col < 0 || col >= cols) return;
    if(board[row][col].revealed || board[row][col].flag) return;
    if(gameOver) return;
    
    board[row][col].revealed = true;
    
    if(board[row][col].mine) {
        gameOver = true;
        showPopup(false);
        draw();
        return;
    }
    
    if(board[row][col].neighbor === 0) {
        for(let di = -1; di <= 1; di++) {
            for(let dj = -1; dj <= 1; dj++) {
                if(di === 0 && dj === 0) continue;
                revealCell(row + di, col + dj);
            }
        }
    }
    
    checkWin();
    draw();
}

function checkWin() {
    let allSafeRevealed = true;
    for(let i = 0; i < rows; i++) {
        for(let j = 0; j < cols; j++) {
            if(!board[i][j].mine && !board[i][j].revealed) {
                allSafeRevealed = false;
            }
        }
    }
    if(allSafeRevealed) {
        gameOver = true;
        win = true;
        showPopup(true);
    }
}

function showPopup(isWin) {
    if(popup) return;
    
    popup = document.createElement('div');
    document.body.appendChild(popup);
    
    let title = document.createElement('h2');
    let message = document.createElement('p');
    let button = document.createElement('button');
    let hint = document.createElement('p');
    
    if(isWin) {
        title.textContent = 'ПОБЕДА!';
        message.textContent = 'Вы открыли все ячейки!';
    } else {
        title.textContent = 'ВЗРЫВ!';
        message.textContent = 'Вы наступили на мину';
    }
    
    button.textContent = 'Новая игра';
    hint.textContent = 'Нажмите ПРОБЕЛ';
    
    popup.appendChild(title);
    popup.appendChild(message);
    popup.appendChild(button);
    popup.appendChild(hint);
    
    button.addEventListener('click', function() {
        document.body.removeChild(popup);
        popup = null;
        restartGame();
    });
}

function restartGame() {
    board = createEmptyBoard();
    gameOver = false;
    win = false;
    firstClick = true;
    flags = 0;
    updateInfo();
    draw();
    if(popup) {
        document.body.removeChild(popup);
        popup = null;
    }
}

canvas.addEventListener('click', function(e) {
    if(gameOver) return;
    
    let rect = canvas.getBoundingClientRect();
    let scaleX = canvas.width / rect.width;
    let scaleY = canvas.height / rect.height;
    
    let x = (e.clientX - rect.left) * scaleX;
    let y = (e.clientY - rect.top) * scaleY;
    
    let col = Math.floor(x / cellSize);
    let row = Math.floor(y / cellSize);
    
    if(row >= 0 && row < rows && col >= 0 && col < cols) {
        if(board[row][col].flag) return;
        
        if(firstClick) {
            placeMines(row, col);
            firstClick = false;
        }
        revealCell(row, col);
    }
});

canvas.addEventListener('contextmenu', function(e) {
    e.preventDefault();
    if(gameOver) return;
    
    let rect = canvas.getBoundingClientRect();
    let scaleX = canvas.width / rect.width;
    let scaleY = canvas.height / rect.height;
    
    let x = (e.clientX - rect.left) * scaleX;
    let y = (e.clientY - rect.top) * scaleY;
    
    let col = Math.floor(x / cellSize);
    let row = Math.floor(y / cellSize);
    
    if(row >= 0 && row < rows && col >= 0 && col < cols) {
        if(!board[row][col].revealed) {
            board[row][col].flag = !board[row][col].flag;
            if(board[row][col].flag) {
                flags++;
            } else {
                flags--;
            }
            updateInfo();
            draw();
        }
    }
});

document.addEventListener('keydown', function(e) {
    if(e.key === ' ' || e.key === 'Space') {
        e.preventDefault();
        restartGame();
    }
});

function draw() {
    ctx.fillStyle = '#333';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    
    for(let i = 0; i < rows; i++) {
        for(let j = 0; j < cols; j++) {
            let x = j * cellSize;
            let y = i * cellSize;
            
            if(board[i][j].revealed) {
                if(board[i][j].mine) {
                    ctx.fillStyle = '#e74c3c';
                    ctx.fillRect(x, y, cellSize-1, cellSize-1);
                    ctx.fillStyle = 'black';
                    ctx.font = 'bold 24px Arial';
                    ctx.fillText('💣', x+8, y+32);
                } else {
                    ctx.fillStyle = '#ddd';
                    ctx.fillRect(x, y, cellSize-1, cellSize-1);
                    if(board[i][j].neighbor > 0) {
                        if(board[i][j].neighbor == 1) ctx.fillStyle = '#3498db';
                        else if(board[i][j].neighbor == 2) ctx.fillStyle = '#27ae60';
                        else if(board[i][j].neighbor == 3) ctx.fillStyle = '#e74c3c';
                        else if(board[i][j].neighbor == 4) ctx.fillStyle = '#8e44ad';
                        else ctx.fillStyle = '#2c3e50';
                        ctx.font = 'bold 24px Arial';
                        ctx.fillText(board[i][j].neighbor, x+13, y+32);
                    }
                }
            } else {
                ctx.fillStyle = '#888';
                ctx.fillRect(x, y, cellSize-1, cellSize-1);
                ctx.fillStyle = '#aaa';
                ctx.fillRect(x+2, y+2, cellSize-5, cellSize-5);
                
                if(board[i][j].flag) {
                    ctx.fillStyle = '#e74c3c';
                    ctx.font = '28px Arial';
                    ctx.fillText('🚩', x+8, y+32);
                }
            }
            
            ctx.strokeStyle = '#555';
            ctx.strokeRect(x, y, cellSize, cellSize);
        }
    }
    
    if(gameOver && !win) {
        ctx.fillStyle = 'rgba(0,0,0,0.7)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        ctx.fillStyle = 'red';
        ctx.font = 'bold 36px Arial';
        ctx.fillText('GAME OVER', canvas.width/2-100, canvas.height/2);
    } else if(win) {
        ctx.fillStyle = 'rgba(0,0,0,0.7)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        ctx.fillStyle = 'green';
        ctx.font = 'bold 36px Arial';
        ctx.fillText('YOU WIN!', canvas.width/2-80, canvas.height/2);
    }
}

restartGame();