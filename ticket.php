<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8">
		<title>搜尋結果</title>
		<link href="train.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<h1 style = "color: #000066; text-align:center; font-weight:bolder">台鐵訂票系統</h1>
		<h2 style = "color: #000066; text-align:center; font-weight:bolder"> 線上訂票 </h2>
		
		<div> 
			<img src =" 7.png" class = "picture_2">
			<img src = "thomas-the-tank-engine-95382.jpg" class ="picture_1">       
			<img src = "depositphotos_227029094-stock-illustration-simple-black-white-freehand-drawn.jpg" class = "smoke">
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
			$start_station = $_POST["start"];
			//print ($start_station);
			$terminal_station = $_POST["終點站"];
			$day = $_POST["day"];
			$type = $_POST["type"];
			$query = "SELECT * FROM `train` WHERE ";
			
			if( $start_station != "0")
			{
				$query = $query . " `start_station` = '".$start_station."' "; 
			}
			if( $terminal_station != "0")
			{
				if ($start_station != "0")
				{
					$query = $query . "and ";
				}	
				$query = $query . " `terminal_station` = '".$terminal_station."' "; 
			}
			if( $type != "0")
			{
				if ($terminal_station != "0")
				{
					$query = $query . "and";
				}	
				$query = $query . "`train_type_id` = '".$type."'";
			}
			if( $day != null)
			{
				if ($type != "0")
				{
					$query = $query . "and";
				}	
				$query = $query . " `date` = '".$day."' ";
			}				
			if( $start_station == "0" and $terminal_station == "0" and $day == null and $type == "0")
			{
				$query = $query . " 1 ";
			}
			//print( "query = ".$query );
			//print("<br>");
			
			$datatab = "test"; 
			$database = mysqli_connect( "localhost", "root", "12345678", $datatab);
			$result = mysqli_query( $database,$query );
			$result_1 = mysqli_query( $database,$query );
		
			if(mysqli_error($database))
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
		
		<table width="800" style="border:3px #000066 dashed" border="1" align="center"> 
			<tr>
				<td align="center" width="80" height="50">班次</td> 
				<td align="center" width="80" height="50">車型</td>
				<td align="center" width="80" height="50">起點</td>
				<td align="center" width="80" height="50">終點</td>
				<td align="center" width="80" height="50">日期</td> 
				<td align="center" width="80" height="50">到站時間</td>
				<td align="center" width="80" height="50">售價</td> 
				<td align="center" width="80" height="50">剩餘座位</td>  
				<td align="center" width="80" height="50">訂票</td> 
				
			</tr>
		
			<?php
				$startid = null;
				$endid = null;
				
				while( $row = mysqli_fetch_row( $result ) )
				{
					print( "<tr>" );
					
					for( $i = 0; $i < count($row); $i++ )
					{	
						
						if( $i == 2 )
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
								print( "<td align='center' width='80' height='40'>
											$row_start_station[0]
										</td>" );
							}	
						}
						if( $i == 3 )
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
								print( "<td align='center' width='80' height='40'>
											$row_end_station[0]
										</td>" );
							}
						}
						if( $i != 3 and $i != 2 )
						{
							print( "<td align='center' width='80' height='40'>
										$row[$i]
									</td>" );
						}
						
					}
					
					print ("<form action='confirm.php' method='post'>
								<td align='center'>
									<input type='radio' name='ticket' value='$row[0]'> 
								</td>
							");
					print("</tr>");
					//print($row[0]);
					
				}
				
				
				print(" <input class='correct' type='submit' value='確定'> ");
				print(" </form> ");
				
				$num = mysqli_num_rows($result);
				if ( $num == null)
				{
					print ("<script> 
								alert('目前暫無列車'\n) 
								location.href='個人訂票.html'
							</script>");
				}
				
			?>
		</table>
		
		<table class="type_table" width="120" style="border:3px #000066 dashed" border="1"> 
			<tr><td colspan="2" align="center" height="50">車型</td></tr>
			<tr>
			<td align="center">1</td>
			<td align="center" height="40">自強號</td>
			</tr>
			<tr>
			<td align="center">2</td>
			<td align="center" height="40">太魯閣</td>
			</tr>
			<tr>
			<td align="center">3</td>
			<td align="center" height="40">普悠瑪</td>
			</tr>
			<tr>
			<td align="center">4</td>
			<td align="center" height="40">莒光號</td>
			</tr>
		</table>
		
	</body>

</html>