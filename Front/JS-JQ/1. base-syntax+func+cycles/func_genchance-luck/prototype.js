var winner70 = 0;
var winner30 = 0;
var winner10 = 0;
var arr = new Array();
arr.push({id: 1, int: 300});
arr.push({id: 333, int: 1000});
arr.push({id: 672, int: 5000});
var k = 0;
while (k != 100) {
    for (var i = 0; i < arr.length; i++) {
        var rand = Math.floor(Math.random() * 101);
        if (rand < 70 && arr[i].int>= 5000) {// 70% chance to win
            winner70++;
        }
        if (rand < 30 && arr[i].int>= 1000 && arr[i].int< 5000) {// 30% chance to win
            winner30++;
        }
        if (rand < 10 && arr[i].int>= 300 && arr[i].int< 1000) {// 10% chance to win
            winner10++;
        }
    }
    k++;
}
console.log("winner70 выиграл в " + winner70 + "% случаев");
console.log("winner30 выиграл в " + winner30 + "% случаев");
console.log("winner10 выиграл в " + winner10 + "% случаев");