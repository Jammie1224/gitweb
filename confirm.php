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
			<img src =" sticker.png" class = "picture_11">
			<img src =" 火車卡通圖-1200x628 (1).jpg" class = "picture_8">	
		</div>
		
		
		
		<div class = "lala"> 
			<font size = "1"> 
				<a href="個人訂票.html" style="text-decoration:none; color:#000066;">
					<h1>返回訂票</h1> 
				</a>
			</font>
		</div>
		
		<?php
			$num = rand(1000,9999);
			$seat = rand(1,200);
			//print($num);
			//print("<br>");
			//INSERT INTO `ticket` (`ticket_id`, `train_Num`, `seat`, `pay`) VALUES ('9352', '101', '97', '0');
			$select = $_POST["ticket"];
			/*print($select);
			print("<br>");*/
			
			$query = "INSERT INTO `ticket` (`ticket_id`, `train_Num`, `seat`, `pay`) 
					  VALUES ('$num', '$select', '$seat', '0')";
			/*print($query);
			print("<br>");*/
			
			$query_1 = "SELECT * FROM `ticket` 
						WHERE `ticket_id` = '$num'";
			/*print($query_1);
			print("<br>");*/
			
			$datatab = "test"; 
			$database = mysqli_connect( "localhost", "root", "12345678", $datatab);
			$result = mysqli_query( $database,$query );
			$result_1 = mysqli_query( $database,$query_1 );
			
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
			//print($num);
		?>
		
		<form  method="post" action="<?php echo "money.php?num=$num";?>" class = "word"> 
			<input type="submit" value="確定">
		</form>
		
		<table width="800" style="border:3px #000066 dashed" border="1" align="center" > 
			<tr>
				<td align="center" width="80" height="50">訂單編號</td> 
				<td align="center" width="80" height="50">車次</td>
				<td align="center" width="80" height="50">座位</td>  
				<td align="center" width="80" height="50">是否繳費</td>
			</tr>
		
			<?php
				
				while( $row = mysqli_fetch_row( $result_1 ) )
				{
					print( "<tr>" );
					for( $i = 0; $i < count($row); $i++ )
					{	
						if ($i == 3 )
						{
							if ($row[3]==0)
							{
								print( "<td align='center' width='80' height='40'>否</td>" );
							}
							else
							{
								print( "<td align='center' width='80' height='40'>是</td>" );
							}
						}
						else
						{
							print( "<td align='center' width='80' height='40'>
									$row[$i]
								</td>" );	
						}		
					}
					print("</tr>");
				}
				
				
				
			?>
		</table>
		
		
	</body>

</html>