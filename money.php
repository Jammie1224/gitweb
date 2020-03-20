<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8">
		<title> 確認訂單 </title>
		<link href="train.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	
		<h1 style = "color: #000066; text-align:center; font-weight:bolder">台鐵訂票系統</h1>
		<h2 style = "color: #000066; text-align:center; font-weight:bolder"> 線上訂票 </h2>
		
		<div> 
			<img src =" 7.png" class = "picture_2">
			<img src = "thomas-the-tank-engine-95382.jpg" class ="picture_1">       
			<img src = "depositphotos_227029094-stock-illustration-simple-black-white-freehand-drawn.jpg" class = "smoke">
			<img src =" sticker (1).png" class = "picture_12"> 
		</div>
		
		
		<div class = "lala"> 
			<font size = "1"> 
				<a href="個人訂票.html" style="text-decoration:none; color:#000066;">
					<h1>返回訂票</h1> 
				</a>
			</font>
		</div>
		
		<div> 
			<font size = "6" style="text-align:center"> 
				<a href="pay.php" style="text-decoration:none; color:#000066; text-align:center;" class = "word_1">
					<p><b>信用卡繳費</b></p> 
				</a>
			</font>
		</div>
		
		<div> 
			<font size = "6" style="text-align:center"> 
				<a href="pay.php" style="text-decoration:none; color:#000066; text-align:center;" class = "word_2">
					<p><b>臨櫃繳費</b></p> 
				</a>
			</font>
		</div>
		
		<?php
			$num = $_GET["num"];
			//UPDATE `ticket` SET `pay` = '1' WHERE `ticket`.`ticket_id` = 9869;
			$query = "UPDATE `ticket` SET `pay` = '1' WHERE `ticket`.`ticket_id` ='$num'";
			/*print($query);
			print("<br>");*/
			
			$datatab = "test"; 
			$database = mysqli_connect( "localhost", "root", "12345678", $datatab);
			$result = mysqli_query( $database,$query );
			$result_1 = mysqli_query( $database,$query );
			
			if( !$database)
			{
				die("cannot connect to the database! </body></html>");
			}
			if( $datatab !=  "test")
			{
				die("cannot open the database! </body></html>" );
			}
			
			if(!isset($result)) 
			{
				print("<p>could not execute query!</p>");
				die( mysqli_error()."</body></html>");
			}
		
			mysqli_close( $database );
		?>
		
		
	</body>

</html>