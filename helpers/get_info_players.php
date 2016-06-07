<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  include_once "common/navbar_log.php";
  } else {
  include_once "common/navbar.php";
  }
$servername = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "registrations";
$newURL = "http://77.70.92.71/htdocs/home.php";
// Create connection
$conn = new mysqli($servername, $username1, $password1, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//PLAYERS ID
$getplayer1ID = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM Users WHERE username = '".$_SESSION['username']."'"));
$player1ID = $getplayer1ID['id'];
//echo $player1ID;
$getplayer2ID = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM Users WHERE username = '".$_SESSION['username_2']."'"));
$player2ID = $getplayer2ID['id'];
//echo $player2ID;

//PLAYERS WINS
$getplayer1Wins = mysqli_fetch_assoc(mysqli_query($conn, "SELECT wins FROM Users JOIN Statistics ON (id=playerID) WHERE username = '".$_SESSION['username']."' "));
$player1Wins = $getplayer1Wins['wins'];
//echo $player1Wins;
$getplayer2Wins = mysqli_fetch_assoc(mysqli_query($conn, "SELECT wins FROM Users JOIN Statistics ON (id=playerID) WHERE username = '".$_SESSION['username_2']."' "));
$player2Wins = $getplayer2Wins['wins'];

//PLAYERS LOSSES
$getplayer1Losses = mysqli_fetch_assoc(mysqli_query($conn, "SELECT losses FROM Users JOIN Statistics ON (id=playerID) WHERE username = '".$_SESSION['username']."' "));
$player1Losses = $getplayer1Losses['losses'];
//--------------------------------------
$getplayer2Losses = mysqli_fetch_assoc(mysqli_query($conn, "SELECT losses FROM Users JOIN Statistics ON (id=playerID) WHERE username = '".$_SESSION['username_2']."' "));
$player2Losses = $getplayer2Losses['losses'];

//PLAYERS CHECKOUTS
$getplayer1Checkouts = mysqli_fetch_assoc(mysqli_query($conn, "SELECT checkout FROM Users JOIN Statistics ON (id=playerID) WHERE username = '".$_SESSION['username']."' "));
$player1Checkouts = $getplayer1Checkouts['checkout'];
//--------------------------------------
$getplayer2Checkouts = mysqli_fetch_assoc(mysqli_query($conn, "SELECT checkout FROM Users JOIN Statistics ON (id=playerID) WHERE username = '".$_SESSION['username_2']."' "));
$player2Checkouts = $getplayer2Checkouts['checkout'];

//PLAYERS THREE DART AVERAGE
$getplayer1ThreeDartAverage = mysqli_fetch_assoc(mysqli_query($conn, "SELECT three_dart_average FROM Users JOIN Statistics ON (id=playerID) WHERE username = '".$_SESSION['username']."' "));
$player1ThreeDartAverage = $getplayer1ThreeDartAverage['three_dart_average'];
//--------------------------------------
$getplayer2ThreeDartAverage = mysqli_fetch_assoc(mysqli_query($conn, "SELECT three_dart_average FROM Users JOIN Statistics ON (id=playerID) WHERE username = '".$_SESSION['username_2']."' "));
$player2ThreeDartAverage = $getplayer2ThreeDartAverage['three_dart_average'];

/*//PLAYERS WIN LEGS
$getplayer1WinLegs = mysqli_fetch_assoc(mysqli_query($conn, "SELECT win-legs FROM Users JOIN Statistics ON (id=playerID) WHERE username = '".$_SESSION['username']."' "));
$player1WinLegs = $getplayer1WinLegs['win-legs'];
//--------------------------------------
$getplayer2WinLegs = mysqli_fetch_assoc(mysqli_query($conn, "SELECT win-legs FROM Users JOIN Statistics ON (id=playerID) WHERE username = '".$_SESSION['username_2']."' "));
$player2WinLegs = $getplayer2WinLegs['win-legs'];

//PLAYERS LOSE LEGS
$getplayer1LoseLegs = mysqli_fetch_assoc(mysqli_query($conn, "SELECT lose-legs FROM Users JOIN Statistics ON (id=playerID) WHERE username = '".$_SESSION['username']."' "));
$player1LoseLegs = $getplayer1LoseLegs['lose-legs'];
//--------------------------------------
$getplayer2LoseLegs = mysqli_fetch_assoc(mysqli_query($conn, "SELECT lose-legs FROM Users JOIN Statistics ON (id=playerID) WHERE username = '".$_SESSION['username_2']."' "));
$player2LoseLegs = $getplayer2LoseLegs['lose-legs'];

//PLAYERS WIN SETS
$getplayer1WinSets = mysqli_fetch_assoc(mysqli_query($conn, "SELECT win-sets FROM Users JOIN Statistics ON (id=playerID) WHERE username = '".$_SESSION['username']."' "));
$player1WinSets = $getplayer1WinSets['win-sets'];
//--------------------------------------
$getplayer2WinSets = mysqli_fetch_assoc(mysqli_query($conn, "SELECT win-sets FROM Users JOIN Statistics ON (id=playerID) WHERE username = '".$_SESSION['username_2']."' "));
$player2WinSets = $getplayer2WinSets['win-sets'];

//PLAYERS LOSE SETS
$getplayer1LoseSets = mysqli_fetch_assoc(mysqli_query($conn, "SELECT lose-sets FROM Users JOIN Statistics ON (id=playerID) WHERE username = '".$_SESSION['username']."' "));
$player1LoseSets = $getplayer1LoseSets['lose-sets'];
//--------------------------------------
$getplayer2LoseSets = mysqli_fetch_assoc(mysqli_query($conn, "SELECT lose-sets FROM Users JOIN Statistics ON (id=playerID) WHERE username = '".$_SESSION['username_2']."' "));
$player2LoseSets = $getplayer2LoseSets['lose-sets'];*/

function doSmth(){
  echo "asdasdasd";
}
?>
<script>
var new_score_player_1 = "<?php echo $_SESSION['gameScore']; ?>";
var new_score_player_2 = "<?php echo $_SESSION['gameScore']; ?>";
var legs_player_1 = 0;
var legs_player_2 = 0;
var sets_player_1 = 0;
var sets_player_2 = 0;
var sets = "<?php echo $_SESSION['setScore']; ?>";
var legs = "<?php echo $_SESSION['legScore']; ?>";
var player1w = "<?php echo $player1Wins; ?>";
var player1wins = parseInt(player1w);
var player2w = "<?php echo $player2Wins; ?>";
var player2wins = parseInt(player2w);
var player1l = "<?php echo $player1Losses; ?>";
var player1losses = parseInt(player1l);
var player2l = "<?php echo $player2Losses; ?>";
var player2losses = parseInt(player2l);

var player1ind = "<?php echo $player1ID ?>";
var player1id = parseInt(player1ind);
var player2ind = "<?php echo $player2ID ?>";
var player2id = parseInt(player2ind);
</script>
