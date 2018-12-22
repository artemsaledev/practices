var el = document.getElementById("gen-numb"); 
var arr = new Array();
arr.push({id: 1, int: 1});
arr.push({id: 2, int: 3});
arr.push({id: 3, int: 6});
arr.push({id: 4, int: 9});
arr.push({id: 5, int: 11});
arr.push({id: 6, int: 13});
arr.push({id: 7, int: 15});
arr.push({id: 8, int: 18});
arr.push({id: 9, int: 24});

function Genchance(){ 
    for (var i = 0; i < arr.length; i++) {
        var rand = Math.floor(Math.random() * 101);
        if (rand == 24 && arr[i].int>= 24) { 
            el.style.backgroundPosition = "-316px 0px";//9
        }
        if (rand < 18 && arr[i].int>= 18 && arr[i].int< 24) { 
            el.style.backgroundPosition = "-276px 0px"; //8
        }
        if (rand < 15 && arr[i].int>= 15 && arr[i].int< 18) { 
            el.style.backgroundPosition = "-237px 0px"; //7
        }
        if (rand < 13 && arr[i].int>= 13 && arr[i].int< 15) { 
            el.style.backgroundPosition = "-197px 0px"; //6
        }
        if (rand < 11 && arr[i].int>= 11 && arr[i].int< 13) { 
            el.style.backgroundPosition = "-157px 0px"; //5
        }
        if (rand < 9 && arr[i].int>= 9 && arr[i].int< 11) { 
            el.style.backgroundPosition = "-118px 0px"; //4
        }
        if (rand < 6 && arr[i].int>= 6 && arr[i].int< 9) { 
            el.style.backgroundPosition = "-77px 0px"; //3
        }
        if (rand < 3 && arr[i].int>= 3 && arr[i].int< 6) {
            el.classList.add("back-pos-anim");
            el.style.backgroundPosition = "-36px 0px"; //2
        }
        if (rand ==1 && arr[i].int>= 1) { 
            el.style.backgroundPosition = "0px 0px"; //1
        }
    } //for 
} //myfunc
// document.getElementById('gen-numb').onclick = function() {
// Genchance();
// }
// This changes everything
"use strict";
// reset the transition by...
el.addEventListener("click", function(e){
  e.preventDefault;
  el.classList.remove("back-pos-anim");
  void el.offsetWidth;
  el.classList.add("back-pos-anim");
  Genchance();
}, false);