<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8">
		<title> 訂單查詢結果 </title>
		<link href="train.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<h1 style = "color: #000066; text-align:center; font-weight:bolder">台鐵訂票系統</h1>
		<h2 style = "color: #000066; text-align:center; font-weight:bolder">訂單紀錄 </h2>
		
		<div> 
			<img src =" 7.png" class = "picture_2">
			<img src = "thomas-the-tank-engine-95382.jpg" class ="picture_1">       
			<img src = "depositphotos_227029094-stock-illustration-simple-black-white-freehand-drawn.jpg" class = "smoke">
			<img src =" kO5HLej.png" class = "picture_13"> 
			<img src =" 火車卡通圖-1200x628 (1).jpg" class = "picture_8">
		</div>
		
		<div class = "lala"> 
			<font size = "1"> 
				<a href="紀錄.html" style="text-decoration:none; color:#000066;">
					<h1>返回查詢</h1> 
				</a>
			</font>
		</div>
		
		<?php
			$id = $_POST["id"];
			//print($id);
			//SELECT * FROM `map` LEFT JOIN `country` ON `map`.`c_id` = `country`.`id`
			$query ="SELECT `ticket`.`ticket_id`, `ticket`.`train_Num`, `ticket`.`seat`,
							`train`.`train_type_id`, `train`.`start_station`, `train`.`terminal_station`,
							`train`.`date`, `train`.`time`, `train`.`money`, `ticket`.`pay`
					 FROM `ticket` JOIN `train` ON `ticket`.`train_Num` = `train`.`trainNum`
					 WHERE `ticket`.`ticket_id` = '$id'";
			/*print($query);
			print("<br>");*/
			
			
			$datatab = "test"; 
			$database = mysqli_connect( "localhost", "root", "12345678", $datatab);
			$result = mysqli_query( $database,$query);
			
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
		
		<table width="1000" style="border:3px #000066 dashed" border="1" align="center" > 
			<tr>
				<td align="center" width="80" height="50">訂單編號</td> 
				<td align="center" width="80" height="50">車次</td>
				<td align="center" width="80" height="50">座位</td>  
				<td align="center" width="80" height="50">車型</td>
				<td align="center" width="80" height="50">起點</td>
				<td align="center" width="80" height="50">終點</td>
				<td align="center" width="80" height="50">日期</td> 
				<td align="center" width="80" height="50">到站時間</td>
				<td align="center" width="80" height="50">售價</td> 
				<td align="center" width="80" height="50">是否繳費</td>
			</tr>
		
			<?php
				$startid = null;
				$endid = null;
				while( $row = mysqli_fetch_row( $result ) )
				{
					print( "<tr>" );
					for( $i = 0; $i < count($row); $i++ )
					{	
						if( $i == 4 )
						{
							if ( $result != null)
							{
								$startid = $row[$i];
								$datatab = "test"; 
								$database = mysqli_connect( "localhost", "root", "12345678", $datatab);
							
								$query_1 = "SELECT `start_station_name` FROM `station` WHERE `start_station_id` = '".$startid."'";
								$result_start_station = mysqli_query( $database,$query_1 );
								mysqli_close( $database );
								$row_start_station = mysqli_fetch_row( $result_start_station );
								print( "<td align='center' width=80' height='40'> 
											$row_start_station[0] 
										</td>" );
							}	
						}
						if( $i == 5 )
						{
							if ( $result != null)
							{
								$endid = $row[$i];
								$datatab = "test"; 
								$database = mysqli_connect( "localhost", "root", "12345678", $datatab);
								$query_2 = "SELECT `start_station_name` FROM `station` WHERE `start_station_id` = '".$endid."'";
								$result_end_station = mysqli_query( $database,$query_2 );
								mysqli_close( $database );
								$row_end_station = mysqli_fetch_row( $result_end_station );
								print( "<td align='center'  width=80' height='40'>
											$row_end_station[0]
										</td>" );
							}
						}
						if ($i == 9 )
						{
							if ($row[9]==0)
							{
								print( "<td align='center' width='80' height='40'>否</td>" );
							}
							else
							{
								print( "<td align='center' width='80' height='40'>是</td>" );
							}
						}
						if ($i!=4 and $i!=5 and $i!=9)
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