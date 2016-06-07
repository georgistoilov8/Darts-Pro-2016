<?php include_once "common/header.php"; ?>

<link rel="stylesheet" href="Style/scoreboard_style.css" type="text/css" />

<?php include_once "helpers/get_info_players.php"; ?>

<head>
  <script src="jquery-1.12.2.min.js"></script>
</head>

<div id="main">
	<div class="divform">
		<span>
			<div class="col-md-push-3 col-md-6 col-xs-12" style="text-align:center">
				<div>
					<form name="input2" style="margin-left: 30%; margin-right: 30%; margin-bottom:5%" onsubmit="changePlayer();return false;">
					  	<label class="score">Score:</label>
					  	<input type="text" id="score" name="score" maxlength="3" class="score_input" patern="/d"><br>
					  	<input type="button" name="Cancel" class="btn btn-primary red" value="Cancel" onclick="cancelThrow" />
					  	<input id = "submit" type="submit" value="Submit" name="Submit" class="btn btn-primary blue" onclick="changePlayer(); return false"/>
					</form>

					<span>
						<label class="scorePlate" id="num1" value="501">
							<script>
								document.write(new_score_player_1);
							</script>
						</label>
						<label class="scorePlate" id="num2" value="501">
							<script>
								document.write(new_score_player_2);
							</script>
						</label>
					</span>
				</div>
				<div>
					<label id="l_player_1" class="statsValPlate" name="player1Legs">
						<script>
							document.write(legs_player_1);
						</script>
					</label>
					<label class="statsNamePlate"> Legs </label>
					<label id="l_player_2" class="statsValPlate" name="player2Legs">
						<script>
							document.write(legs_player_2);
						</script>
					</label>
				</div>
				<div>
					<label class="statsValPlate" name="player1Sets" id="player1set">
						 <script>
							document.write(sets_player_1);
						</script>
					</label>
					<label class="statsNamePlate"> Sets </label>
					<label class="statsValPlate" name="player2Sets" id="player2set">
						<script>
							document.write(sets_player_2);
						</script>
					</label>
				</div>
				<div>
					<label class="statsValPlate" name="player1wins" id="player1wins">
						<script>
							document.write(player1wins);
						</script>
					</label>
					<label class="statsNamePlate"> Wins </label>
					<label class="statsValPlate" name="player2wins" id="player2wins">
						<script>
							document.write(player2wins);
						</script>
					</label>
				</div>
				<div>
					<label class="statsValPlate" name="player1losses" id="playe1losses">
						<script>
							document.write(player1losses);
						</script>
					</label>
					<label class="statsNamePlate"> Losses </label>
					<label class="statsValPlate" name="player2losses" id="player2losses">
						<script>
							document.write(player2losses);
						</script>
					</label>
				</div>
				<div>
					<label class="statsValPlate" name="player1checkout"> 0 </label>
					<label class="statsNamePlate"> Checkout % </label>
					<label class="statsValPlate" name="player2checkout"> 0 </label>
				</div>
				<div>
					<label class="statsValPlate" name="player1Avr"> 0 </label>
					<label class="statsNamePlate"> 3-Dart Average </label>
					<label class="statsValPlate" name="player2Avr"> 0 </label>
				</div>
			</div>
			<div class="col-md-pull-6 col-md-3 col-xs-6" style="text-align:center">
					<div id="p1">
						<label><?php echo $_SESSION['username']?></label><br>
					</div>
					<div class="Row">
						<div id="div1p1" style="display:none"class="Column good_looking_div">
		            		<label id="first_label"></label>
		        		</div>
		        		<div id="div2p1" style="display:none;" class="Column good_looking_div">
		            		<label id="second_label"></label>
		        		</div>
		        		<div id="div3p1" style="display:none;" class="Column div_double">
		            		<label id="third_label"></label>
		        		</div>
		        	</div>
				<div>
				</div>
				<textarea readonly id="txt1" rows="20" name="player1Throws" style="resize: none;"></textarea>
			</div>
			<div class="col-md-3 col-xs-6" style="text-align:center">
				<div id="p2">

				<label><?php echo $_SESSION['username_2']?></label><br>
				</div>
				<div class="Row">
						<div id="div1p2" style="display:none"class="Column good_looking_div">
		            		<label id="label1p2"></label>
		        		</div>
		        		<div id="div2p2" style="display:none;" class="Column good_looking_div">
		            		<label id="label2p2"></label>
		        		</div>
		        		<div id="div3p2" style="display:none;" class="Column div_double">
		            		<label id="label3p2"></label>
		        		</div>
		        	</div>
				<div class="text-center">
				</div>
				<textarea readonly id="txt2" rows="20" name="player2Throws" style="resize: none;"></textarea>
			</div>
		</span>
	</div>
</div>

<?php include_once "helpers/scoreboard_logic.php"; ?>

<?php include_once "common/sidebar.php"; ?>

<?php include_once "common/footer.php"; ?>
