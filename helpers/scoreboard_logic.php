<script>
function cancelThrow()
{

}
function isNumber(n) { return /^-?[\d.]+(?:e-?\d+)?$/.test(n); }

var playerTurn = 0;
function setLabelsP1(a,b,c){
    document.getElementById('first_label').innerHTML = a;
    document.getElementById('second_label').innerHTML = b;
    document.getElementById('third_label').innerHTML = c;
}
function setLabelsP2(a,b,c){
    document.getElementById('label1p2').innerHTML = a;
    document.getElementById('label2p2').innerHTML = b;
    document.getElementById('label3p2').innerHTML = c;
}
function myMethod()
  {
      $.post("common/file.php");
  }

function changePlayer() {
  var textarea = document.getElementById('txt1');
  textarea.scrollTop = textarea.scrollHeight;
  var textarea2 = document.getElementById('txt2');
  textarea2.scrollTop = textarea2.scrollHeight;
  var http = new XMLHttpRequest();
  var url = "";
  var params = "";
  var score = +document.getElementById("score").value;
  if(!isNumber(score)){
    alert("Not a Number!");
    return;
  }
  if(score < 0){
    alert("You can not input negative numbers for score.")
    return;
  }else if(score > 180){
    alert("You can not input numbers bigger than 180");
    return;
  }else
  if(playerTurn == 0){

    document.getElementById("txt1").value += score;
    document.getElementById("txt1").value += "\n";
    new_score_player_1 -= score;
    if((new_score_player_1) < 0 || new_score_player_1 == 1){
      alert("You exceeded your score.");
      new_score_player_1 += score;
      alert(new_score_player_1);
      return;
    }else if((new_score_player_1) == 0){
      legs_player_1 += 1;
      if(legs_player_1 >= legs){
        sets_player_1 += 1;
        document.getElementById("player1set").innerHTML = sets_player_1;
        legs_player_1 = 0;
        legs_player_2 = 0;
        document.getElementById("l_player_2").innerHTML = legs_player_2;
        if(sets_player_1 >= sets){
          player1wins += 1;
          player2losses += 1;

          url = "common/Statistics/player1win.php";
          params = "player1Win="+player1wins+"&player2Lose="+player2losses+"&player1id="+player1id+"&player2id="+player2id;
          http.open("POST", url, true);

          http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

          http.send(params);
          /*http.onreadystatechange = function() {//Call a function when the state changes.
              if(http.readyState == 4 && http.status == 200) {
                  alert(http.responseText);
              }
          }*/
          alert("Player 1 wins. Congratulations");
          sets_player_1 = 0;
          sets_player_2 = 0;
          legs_player_1 = 0;
          legs_player_2 = 0;
          document.getElementById("player1wins").innerHTML = player1wins;
          document.getElementById("player2losses").innerHTML = player2losses;

          document.getElementById("player2set").innerHTML = sets_player_2;
          document.getElementById("player1set").innerHTML = sets_player_1;
          new_score_player_1 = "<?php echo $_SESSION['gameScore']; ?>";
          new_score_player_2 = "<?php echo $_SESSION['gameScore']; ?>";
          document.getElementById("txt1").value += "NEW GAME\n";
          document.getElementById("txt2").value += "\nNEW GAME";
        }
        document.getElementById("txt1").value += "NEW SET.\n";
        document.getElementById("txt2").value += "\nNEW SET.\n";
      }
      document.getElementById("l_player_1").innerHTML = legs_player_1;
      new_score_player_1 = "<?php echo $_SESSION['gameScore']; ?>";
      new_score_player_2 = "<?php echo $_SESSION['gameScore']; ?>";
      document.getElementById("txt1").value += "NEW LEG.\n";
      document.getElementById("txt2").value += "\nNEW LEG.\n";
      document.getElementById("num1").innerHTML = new_score_player_1;
      document.getElementById("num2").innerHTML = new_score_player_2;
    }
    document.getElementById("num1").innerHTML = new_score_player_1;
    document.getElementById("score").value = null;
    playerTurn = 1;
    //console.log(1);
    document.getElementById("p2").style.borderColor = "#00FF00";
    document.getElementById("p1").style.borderColor = "#338A94";
  } else {

    document.getElementById("txt2").value += score;
    document.getElementById("txt2").value += "\n";
    new_score_player_2 -= score;
    if((new_score_player_2) < 0 || new_score_player_2 == 1){
      alert("You exceeded your score.");
      new_score_player_2 += score;
      return;
    }else if((new_score_player_2) == 0){
      legs_player_2 += 1;
      if(legs_player_2 >= legs){
        sets_player_2 += 1;
        document.getElementById("player2set").innerHTML = sets_player_2;
        legs_player_1 = 0;
        legs_player_2 = 0;
        document.getElementById("l_player_1").innerHTML = legs_player_1;
        if(sets_player_2 >= sets){
          player2wins += 1;
          player1losses += 1;

          url = "common/Statistics/player2win.php";
          params = "player1Lose="+player1losses+"&player2Win="+player2wins+"&player1id="+player1id+"&player2id="+player2id;
          http.open("POST", url, true);

          http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

          http.send(params);

          alert("Player 2 wins. Congratulations");
          sets_player_1 = 0;
          sets_player_2 = 0;
          legs_player_1 = 0;
          legs_player_2 = 0;
          document.getElementById("player2wins").innerHTML = player2wins;
          document.getElementById("player1losses").innerHTML = player1losses;

          document.getElementById("player2set").innerHTML = sets_player_2;
          document.getElementById("player1set").innerHTML = sets_player_1;
          new_score_player_1 = "<?php echo $_SESSION['gameScore']; ?>";
          new_score_player_2 = "<?php echo $_SESSION['gameScore']; ?>";
          document.getElementById("txt2").value += "NEW GAME\n";
          document.getElementById("txt1").value += "\nNEW GAME";

        }
        document.getElementById("txt1").value += "\nNEW SET.\n";
        document.getElementById("txt2").value += "NEW SET.\n";

      }
      document.getElementById("l_player_2").innerHTML = legs_player_2;
      new_score_player_1 = "<?php echo $_SESSION['gameScore']; ?>";
      new_score_player_2 = "<?php echo $_SESSION['gameScore']; ?>";
      document.getElementById("txt1").value += "\nNEW LEG.\n";
      document.getElementById("txt2").value += "NEW LEG.\n";
      document.getElementById("num1").innerHTML = new_score_player_1;
      document.getElementById("num2").innerHTML = new_score_player_2;
    }
    document.getElementById("num2").innerHTML = new_score_player_2;
    document.getElementById("score").value = null;
    playerTurn = 0;
    //console.log(0);
    document.getElementById("p1").style.borderColor = "#00FF00";
    document.getElementById("p2").style.borderColor = "#AD4257";
  }
  if (new_score_player_1 < 171 && new_score_player_1 != 169 && new_score_player_1 != 168 && new_score_player_1 != 166 && new_score_player_1!= 165 && new_score_player_1 != 163 && new_score_player_1 != 162 && new_score_player_1 != 159) {
      $('#div1p1').slideDown('slow', function () {
            // Animation complete.
        });
        $('#div2p1').slideDown('slow', function () {
            // Animation complete.
        });
        $('#div3p1').slideDown('slow', function () {
            // Animation complete.
        });

        switch(new_score_player_1){
          case 170: setLabelsP1("T20","T20","DB"); break;
          case 167: setLabelsP1("T20","T19","DB"); break;
          case 164: setLabelsP1("T20","T18","DB"); break;
          case 161: setLabelsP1("T20","T17","DB"); break;
          case 160: setLabelsP1("T20","T20","D20"); break;
          case 158: setLabelsP1("T20","T20","D19"); break;
          case 157: setLabelsP1("T20","T19","D20"); break;
          case 156: setLabelsP1("T20","T20","D18"); break;
          case 155: setLabelsP1("T20","T15","DB"); break;
          case 154: setLabelsP1("T20","T18","D20"); break;
          case 153: setLabelsP1("T20","T19","D18"); break;
          case 152: setLabelsP1("T20","T20","D16"); break;
          case 151: setLabelsP1("T20","T17","D20"); break;
          case 150: setLabelsP1("T20","T18","D18"); break;
          case 149: setLabelsP1("T20","T19","D16"); break;
          case 148: setLabelsP1("T20","T16","D20"); break;
          case 147: setLabelsP1("T20","T17","D18"); break;
          case 146: setLabelsP1("T20","T18","D16"); break;
          case 145: setLabelsP1("T20","T15","D20"); break;
          case 144: setLabelsP1("T20","T20","D12"); break;
          case 143: setLabelsP1("T20","T17","D16"); break;
          case 142: setLabelsP1("T20","T14","D20"); break;
          case 141: setLabelsP1("T20","T15","D18"); break;
          case 140: setLabelsP1("T20","T16","D16"); break;
          case 139: setLabelsP1("T20","T13","D20"); break;
          case 138: setLabelsP1("T20","T14","D18"); break;
          case 137: setLabelsP1("T17","T18","D16"); break;
          case 136: setLabelsP1("T20","T20","D8"); break;
          case 135: setLabelsP1("T20","T15","D15"); break;
          case 134: setLabelsP1("T20","T14","D16"); break;
          case 133: setLabelsP1("T20","T19","D8"); break;
          case 132: setLabelsP1("T20","T20","D6"); break;
          case 131: setLabelsP1("T20","T13","D16"); break;
          case 130: setLabelsP1("T20","T18","D8"); break;
          case 129: setLabelsP1("T19","T20","D6"); break;
          case 128: setLabelsP1("T18","T14","D16"); break;
          case 127: setLabelsP1("T19","T18","D8"); break;
          case 126: setLabelsP1("T19","T19","D6"); break;
          case 125: setLabelsP1("B","T20","D20"); break;
          case 124: setLabelsP1("T20","D16","D16"); break;
          case 123: setLabelsP1("T19","T16","D9"); break;
          case 122: setLabelsP1("T18","T20","D4"); break;
          case 121: setLabelsP1("T20","T15","D8"); break;
          case 120: setLabelsP1("T20","20","D20"); break;
          case 119: setLabelsP1("T19","T10","D16"); break;
          case 118: setLabelsP1("T20","18","D20"); break;
          case 117: setLabelsP1("T20","17","D20"); break;
          case 116: setLabelsP1("T20","16","D20"); break;
          case 115: setLabelsP1("T20","15","D20"); break;
          case 114: setLabelsP1("T20","14","D20"); break;
          case 113: setLabelsP1("T20","13","D20"); break;
          case 112: setLabelsP1("T20","20","D16"); break;
          case 111: setLabelsP1("T20","19","D16"); break;
          case 110: setLabelsP1("T20","18","D16"); break;
          case 109: setLabelsP1("T20","17","D16"); break;
          case 108: setLabelsP1("T20","16","D16"); break;
          case 107: setLabelsP1("T19","18","D16"); break;
          case 106: setLabelsP1("T20","14","D16"); break;
          case 105: setLabelsP1("T20","13","D16"); break;
          case 104: setLabelsP1("T18","18","D16"); break;
          case 103: setLabelsP1("T20","11","D16"); break;
          case 102: setLabelsP1("T20","10","D16"); break;
          case 101: setLabelsP1("T17","18","D16"); break;
          case 100: setLabelsP1("X","T20","D20"); break;
          case 99: setLabelsP1("T19","10","D16"); break;
          case 98: setLabelsP1("X","T20","D19"); break;
          case 97: setLabelsP1("X","T19","D20"); break;
          case 96: setLabelsP1("X","T20","D18"); break;
          case 95: setLabelsP1("T15","18","D16"); break;
          case 94: setLabelsP1("X","T18","D20"); break;
          case 93: setLabelsP1("X","T19","D18"); break;
          case 92: setLabelsP1("X","T20","D16"); break;
          case 91: setLabelsP1("X","T17","D20"); break;
          case 90: setLabelsP1("X","T18","D18"); break;
          case 89: setLabelsP1("X","T19","D16"); break;
          case 88: setLabelsP1("X","T16","D20"); break;
          case 87: setLabelsP1("X","T17","D18"); break;
          case 86: setLabelsP1("X","T18","D16"); break;
          case 85: setLabelsP1("X","T15","D20"); break;
          case 84: setLabelsP1("X","T20","D12"); break;
          case 83: setLabelsP1("X","T17","D16"); break;
          case 82: setLabelsP1("X","T14","D20"); break;
          case 81: setLabelsP1("X","T15","D18"); break;
          case 80: setLabelsP1("X","T16","D16"); break;
          case 79: setLabelsP1("X","T13","D20"); break;
          case 78: setLabelsP1("X","T14","D18"); break;
          case 77: setLabelsP1("X","T15","D16"); break;
          case 76: setLabelsP1("X","T20","D8"); break;
          case 75: setLabelsP1("X","T15","D15"); break;
          case 74: setLabelsP1("X","T14","D16"); break;
          case 73: setLabelsP1("X","T19","D8"); break;
          case 72: setLabelsP1("X","T20","D6"); break;
          case 71: setLabelsP1("X","T13","D16"); break;
          case 70: setLabelsP1("X","T18","D8"); break;
          case 69: setLabelsP1("X","T19","D6"); break;
          case 68: setLabelsP1("X","T16","D10"); break;
          case 67: setLabelsP1("X","T17","D8"); break;
          case 66: setLabelsP1("X","T10","D18"); break;
          case 65: setLabelsP1("X","T15","D10"); break;
          case 64: setLabelsP1("X","D16","D16"); break;
          case 63: setLabelsP1("X","T13","D12"); break;
          case 62: setLabelsP1("X","T10","D16"); break;
          case 61: setLabelsP1("X","T15","D8"); break;
          case 60: setLabelsP1("X","20","D20"); break;
          case 59: setLabelsP1("X","19","D20"); break;
          case 58: setLabelsP1("X","18","D20"); break;
          case 57: setLabelsP1("X","17","D20"); break;
          case 56: setLabelsP1("X","16","D20"); break;
          case 55: setLabelsP1("X","15","D20"); break;
          case 54: setLabelsP1("X","14","D20"); break;
          case 53: setLabelsP1("X","13","D20"); break;
          case 52: setLabelsP1("X","20","D16"); break;
          case 51: setLabelsP1("X","19","D16"); break;
          case 50: setLabelsP1("X","18","D16"); break;
          case 49: setLabelsP1("X","17","D16"); break;
          case 48: setLabelsP1("X","16","D16"); break;
          case 47: setLabelsP1("X","15","D16"); break;
          case 46: setLabelsP1("X","14","D16"); break;
          case 45: setLabelsP1("X","13","D16"); break;
          case 44: setLabelsP1("X","12","D16"); break;
          case 43: setLabelsP1("X","11","D16"); break;
          case 42: setLabelsP1("X","10","D16"); break;
          case 41: setLabelsP1("X","9","D16"); break;
          case 40: setLabelsP1("X","X","D20"); break;
          case 39: setLabelsP1("X","19","D10"); break;
          case 38: setLabelsP1("X","X","D19"); break;
          case 37: setLabelsP1("X","17","D10"); break;
          case 36: setLabelsP1("X","X","D18"); break;
          case 35: setLabelsP1("X","15","D10"); break;
          case 34: setLabelsP1("X","X","D17"); break;
          case 33: setLabelsP1("X","13","D10"); break;
          case 32: setLabelsP1("X","X","D16"); break;
          case 31: setLabelsP1("X","11","D10"); break;
          case 30: setLabelsP1("X","X","D15"); break;
          case 29: setLabelsP1("X","9","D10"); break;
          case 28: setLabelsP1("X","X","D14"); break;
          case 27: setLabelsP1("X","7","D10"); break;
          case 26: setLabelsP1("X","X","D13"); break;
          case 25: setLabelsP1("X","5","D10"); break;
          case 24: setLabelsP1("X","X","D12"); break;
          case 23: setLabelsP1("X","13","D5"); break;
          case 22: setLabelsP1("X","X","D11"); break;
          case 21: setLabelsP1("X","11","D5"); break;
          case 20: setLabelsP1("X","X","D10"); break;
          case 19: setLabelsP1("X","9","D5"); break;
          case 18: setLabelsP1("X","X","D9"); break;
          case 17: setLabelsP1("X","7","D5"); break;
          case 16: setLabelsP1("X","X","D8"); break;
          case 15: setLabelsP1("X","5","D5"); break;
          case 14: setLabelsP1("X","X","D7"); break;
          case 13: setLabelsP1("X","3","D5"); break;
          case 12: setLabelsP1("X","X","D6"); break;
          case 11: setLabelsP1("X","1","D5"); break;
          case 10: setLabelsP1("X","X","D5"); break;
          case 9: setLabelsP1("X","1","D4"); break;
          case 8: setLabelsP1("X","X","D4"); break;
          case 7: setLabelsP1("X","1","D3"); break;
          case 6: setLabelsP1("X","X","D3"); break;
          case 5: setLabelsP1("X","1","D2"); break;
          case 4: setLabelsP1("X","X","D2"); break;
          case 3: setLabelsP1("X","1","D1"); break;
          case 2: setLabelsP1("X","X","D1"); break;
        }
        //-------------------------------------------------------------------------------------------------------------------------------------
        //-------------------------------------------------------------------------------------------------------------------------------------
        //-------------------------------------------------------------------------------------------------------------------------------------

  }
  if (new_score_player_2 < 171 && new_score_player_2 != 169 && new_score_player_2 != 168 && new_score_player_2 != 166 && new_score_player_2!= 165 && new_score_player_2 != 163 && new_score_player_2 != 162 && new_score_player_2 != 159) {
      $('#div1p2').slideDown('slow', function () {
            // Animation complete.
        });
        $('#div2p2').slideDown('slow', function () {
            // Animation complete.
        });
        $('#div3p2').slideDown('slow', function () {
            // Animation complete.
        });

        switch(new_score_player_2){
          case 170: setLabelsP2("T20","T20","DB"); break;
          case 167: setLabelsP2("T20","T19","DB"); break;
          case 164: setLabelsP2("T20","T18","DB"); break;
          case 161: setLabelsP2("T20","T17","DB"); break;
          case 160: setLabelsP2("T20","T20","D20"); break;
          case 158: setLabelsP2("T20","T20","D19"); break;
          case 157: setLabelsP2("T20","T19","D20"); break;
          case 156: setLabelsP2("T20","T20","D18"); break;
          case 155: setLabelsP2("T20","T15","DB"); break;
          case 154: setLabelsP2("T20","T18","D20"); break;
          case 153: setLabelsP2("T20","T19","D18"); break;
          case 152: setLabelsP2("T20","T20","D16"); break;
          case 151: setLabelsP2("T20","T17","D20"); break;
          case 150: setLabelsP2("T20","T18","D18"); break;
          case 149: setLabelsP2("T20","T19","D16"); break;
          case 148: setLabelsP2("T20","T16","D20"); break;
          case 147: setLabelsP2("T20","T17","D18"); break;
          case 146: setLabelsP2("T20","T18","D16"); break;
          case 145: setLabelsP2("T20","T15","D20"); break;
          case 144: setLabelsP2("T20","T20","D12"); break;
          case 143: setLabelsP2("T20","T17","D16"); break;
          case 142: setLabelsP2("T20","T14","D20"); break;
          case 141: setLabelsP2("T20","T15","D18"); break;
          case 140: setLabelsP2("T20","T16","D16"); break;
          case 139: setLabelsP2("T20","T13","D20"); break;
          case 138: setLabelsP2("T20","T14","D18"); break;
          case 137: setLabelsP2("T17","T18","D16"); break;
          case 136: setLabelsP2("T20","T20","D8"); break;
          case 135: setLabelsP2("T20","T15","D15"); break;
          case 134: setLabelsP2("T20","T14","D16"); break;
          case 133: setLabelsP2("T20","T19","D8"); break;
          case 132: setLabelsP2("T20","T20","D6"); break;
          case 131: setLabelsP2("T20","T13","D16"); break;
          case 130: setLabelsP2("T20","T18","D8"); break;
          case 129: setLabelsP2("T19","T20","D6"); break;
          case 128: setLabelsP2("T18","T14","D16"); break;
          case 127: setLabelsP2("T19","T18","D8"); break;
          case 126: setLabelsP2("T19","T19","D6"); break;
          case 125: setLabelsP2("B","T20","D20"); break;
          case 124: setLabelsP2("T20","D16","D16"); break;
          case 123: setLabelsP2("T19","T16","D9"); break;
          case 122: setLabelsP2("T18","T20","D4"); break;
          case 121: setLabelsP2("T20","T15","D8"); break;
          case 120: setLabelsP2("T20","20","D20"); break;
          case 119: setLabelsP2("T19","T10","D16"); break;
          case 118: setLabelsP2("T20","18","D20"); break;
          case 117: setLabelsP2("T20","17","D20"); break;
          case 116: setLabelsP2("T20","16","D20"); break;
          case 115: setLabelsP2("T20","15","D20"); break;
          case 114: setLabelsP2("T20","14","D20"); break;
          case 113: setLabelsP2("T20","13","D20"); break;
          case 112: setLabelsP2("T20","20","D16"); break;
          case 111: setLabelsP2("T20","19","D16"); break;
          case 110: setLabelsP2("T20","18","D16"); break;
          case 109: setLabelsP2("T20","17","D16"); break;
          case 108: setLabelsP2("T20","16","D16"); break;
          case 107: setLabelsP2("T19","18","D16"); break;
          case 106: setLabelsP2("T20","14","D16"); break;
          case 105: setLabelsP2("T20","13","D16"); break;
          case 104: setLabelsP2("T18","18","D16"); break;
          case 103: setLabelsP2("T20","11","D16"); break;
          case 102: setLabelsP2("T20","10","D16"); break;
          case 101: setLabelsP2("T17","18","D16"); break;
          case 100: setLabelsP2("X","T20","D20"); break;
          case 99: setLabelsP2("T19","10","D16"); break;
          case 98: setLabelsP2("X","T20","D19"); break;
          case 97: setLabelsP2("X","T19","D20"); break;
          case 96: setLabelsP2("X","T20","D18"); break;
          case 95: setLabelsP2("T15","18","D16"); break;
          case 94: setLabelsP2("X","T18","D20"); break;
          case 93: setLabelsP2("X","T19","D18"); break;
          case 92: setLabelsP2("X","T20","D16"); break;
          case 91: setLabelsP2("X","T17","D20"); break;
          case 90: setLabelsP2("X","T18","D18"); break;
          case 89: setLabelsP2("X","T19","D16"); break;
          case 88: setLabelsP2("X","T16","D20"); break;
          case 87: setLabelsP2("X","T17","D18"); break;
          case 86: setLabelsP2("X","T18","D16"); break;
          case 85: setLabelsP2("X","T15","D20"); break;
          case 84: setLabelsP2("X","T20","D12"); break;
          case 83: setLabelsP2("X","T17","D16"); break;
          case 82: setLabelsP2("X","T14","D20"); break;
          case 81: setLabelsP2("X","T15","D18"); break;
          case 80: setLabelsP2("X","T16","D16"); break;
          case 79: setLabelsP2("X","T13","D20"); break;
          case 78: setLabelsP2("X","T14","D18"); break;
          case 77: setLabelsP2("X","T15","D16"); break;
          case 76: setLabelsP2("X","T20","D8"); break;
          case 75: setLabelsP2("X","T15","D15"); break;
          case 74: setLabelsP2("X","T14","D16"); break;
          case 73: setLabelsP2("X","T19","D8"); break;
          case 72: setLabelsP2("X","T20","D6"); break;
          case 71: setLabelsP2("X","T13","D16"); break;
          case 70: setLabelsP2("X","T18","D8"); break;
          case 69: setLabelsP2("X","T19","D6"); break;
          case 68: setLabelsP2("X","T16","D10"); break;
          case 67: setLabelsP2("X","T17","D8"); break;
          case 66: setLabelsP2("X","T10","D18"); break;
          case 65: setLabelsP2("X","T15","D10"); break;
          case 64: setLabelsP2("X","D16","D16"); break;
          case 63: setLabelsP2("X","T13","D12"); break;
          case 62: setLabelsP2("X","T10","D16"); break;
          case 61: setLabelsP2("X","T15","D8"); break;
          case 60: setLabelsP2("X","20","D20"); break;
          case 59: setLabelsP2("X","19","D20"); break;
          case 58: setLabelsP2("X","18","D20"); break;
          case 57: setLabelsP2("X","17","D20"); break;
          case 56: setLabelsP2("X","16","D20"); break;
          case 55: setLabelsP2("X","15","D20"); break;
          case 54: setLabelsP2("X","14","D20"); break;
          case 53: setLabelsP2("X","13","D20"); break;
          case 52: setLabelsP2("X","20","D16"); break;
          case 51: setLabelsP2("X","19","D16"); break;
          case 50: setLabelsP2("X","18","D16"); break;
          case 49: setLabelsP2("X","17","D16"); break;
          case 48: setLabelsP2("X","16","D16"); break;
          case 47: setLabelsP2("X","15","D16"); break;
          case 46: setLabelsP2("X","14","D16"); break;
          case 45: setLabelsP2("X","13","D16"); break;
          case 44: setLabelsP2("X","12","D16"); break;
          case 43: setLabelsP2("X","11","D16"); break;
          case 42: setLabelsP2("X","10","D16"); break;
          case 41: setLabelsP2("X","9","D16"); break;
          case 40: setLabelsP2("X","X","D20"); break;
          case 39: setLabelsP2("X","19","D10"); break;
          case 38: setLabelsP2("X","X","D19"); break;
          case 37: setLabelsP2("X","17","D10"); break;
          case 36: setLabelsP2("X","X","D18"); break;
          case 35: setLabelsP2("X","15","D10"); break;
          case 34: setLabelsP2("X","X","D17"); break;
          case 33: setLabelsP2("X","13","D10"); break;
          case 32: setLabelsP2("X","X","D16"); break;
          case 31: setLabelsP2("X","11","D10"); break;
          case 30: setLabelsP2("X","X","D15"); break;
          case 29: setLabelsP2("X","9","D10"); break;
          case 28: setLabelsP2("X","X","D14"); break;
          case 27: setLabelsP2("X","7","D10"); break;
          case 26: setLabelsP2("X","X","D13"); break;
          case 25: setLabelsP2("X","5","D10"); break;
          case 24: setLabelsP2("X","X","D12"); break;
          case 23: setLabelsP2("X","13","D5"); break;
          case 22: setLabelsP2("X","X","D11"); break;
          case 21: setLabelsP2("X","11","D5"); break;
          case 20: setLabelsP2("X","X","D10"); break;
          case 19: setLabelsP2("X","9","D5"); break;
          case 18: setLabelsP2("X","X","D9"); break;
          case 17: setLabelsP2("X","7","D5"); break;
          case 16: setLabelsP2("X","X","D8"); break;
          case 15: setLabelsP2("X","5","D5"); break;
          case 14: setLabelsP2("X","X","D7"); break;
          case 13: setLabelsP2("X","3","D5"); break;
          case 12: setLabelsP2("X","X","D6"); break;
          case 11: setLabelsP2("X","1","D5"); break;
          case 10: setLabelsP2("X","X","D5"); break;
          case 9: setLabelsP2("X","1","D4"); break;
          case 8: setLabelsP2("X","X","D4"); break;
          case 7: setLabelsP2("X","1","D3"); break;
          case 6: setLabelsP2("X","X","D3"); break;
          case 5: setLabelsP2("X","1","D2"); break;
          case 4: setLabelsP2("X","X","D2"); break;
          case 3: setLabelsP2("X","1","D1"); break;
          case 2: setLabelsP2("X","X","D1"); break;
        }

  }
  if(new_score_player_1 == "<?php echo $_SESSION['gameScore']; ?>"){
    $( "#div1p1" ).slideUp( "slow", function() {
      // Animation complete.
    });
    $( "#div2p1" ).slideUp( "slow", function() {
      // Animation complete.
    });
    $( "#div3p1" ).slideUp( "slow", function() {
      // Animation complete.
    });
  }
  if(new_score_player_2 == "<?php echo $_SESSION['gameScore']; ?>"){
    $( "#div1p2" ).slideUp( "slow", function() {
      // Animation complete.
    });
    $( "#div2p2" ).slideUp( "slow", function() {
      // Animation complete.
    });
    $( "#div3p2" ).slideUp( "slow", function() {
      // Animation complete.
    });
  }
}
</script>
