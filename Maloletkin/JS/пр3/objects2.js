let getStatistics = function (players) {
  let total = 0
  for (let i = 0; i < players.length; i++) {
    total += players[i].goals
  }
  
  for (let i = 0; i < players.length; i++) {
    players[i].coefficient = players[i].goals * 2 + players[i].passes
    players[i].percent = Math.round((players[i].goals * 100) / total)
  }
  
  return players
}

let players = [
  {name: 'Вася', goals: 5, passes: 3},
  {name: 'Петя', goals: 2, passes: 7},
  {name: 'Коля', goals: 8, passes: 1}
]

let result = getStatistics(players)

console.log(result)