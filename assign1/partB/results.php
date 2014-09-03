<html>
	<head>
	</head>	
	<body>			
		
		<center>


			<form action = "results.php" method="GET">
			<h1>Input Wine Name</h1>
			<input type = "text" name="search"/>
			<input type = "submit" value="Search Wine" size="50">
			</form>
			
			<h1>Wine DataBase</h1>
			<br/>
		</center>
		      <?php
			$winename=$_GET['search'];
                       $con= mysqli_connect("localhost","root","Pau061994B","winestore");
		       
                     	 $v="SELECT wine_name FROM wine WHERE wine_name=".$winename."";
		         $q= "SELECT * FROM wine INNER JOIN wine_variety ON wine.wine_id = wine_variety.wine_id JOIN winery ON wine.winery_id=winery.winery_id JOIN region ON winery.region_id=region.region_id JOIN inventory ON wine.wine_id=inventory.wine_id JOIN items ON wine.wine_id=items.wine_id WHERE wine_name LIKE '%".$_GET[search]."%' LIMIT 0,1350";
			if (mysqli_connect_errno()) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
										}
				 $vald=mysqli_query($con,$v);
                 		 $squery=mysqli_query($con,$q);
               	     	
		 ?>
			<table border ="1"  align="center">
		<?php		//Check Database for Validation
				 if(mysqli_num_rows($squery)>0){
		?>
				<tr>
					<td><h1>Wine</h1></td>
					<td><h1>Variety</h1></td>
					<td><h1>Year</h1> </td>
					<td><h1>Winery</h1> </td>
 					<td><h1>Region</h1> </td>
					<td><h1>Cost</h1></td>
					<td><h1>Available</h1></td>
					<td><h1>Stock Sold</h1></td>
					<td><h1>Sales Revenues</h1></td>	
				</tr>

		<?php
				 while($row = mysqli_fetch_array($squery, MYSQL_ASSOC) )
				
				{	
		?>
				<tr>
					<td>
				<?php	echo $row['wine_name']; ?>
					</td>
					<td>
				<?php	echo $row['variety_id'];?>
					</td>
					<td>
				<?php 	echo $row['year'];?>
					</td>
					<td>
				<?php 	echo $row['winery_name'];?>
					</td>
					<td>
				<?php 	echo $row['region_name'];?>
					</td>
					<td>
				<?php 	echo $row['cost'];?>
					</td>
					<td>
                                <?php   echo $row['on_hand'];?>
                                        </td>
					<td>
                                <?php   echo $row['qty'];?>
                                        </td>
					<td>
                                <?php   echo $row['price'];?>
                                        </td>

				</tr>
		<?php		}}else {?>

					<tr><td><h1>NO WINE</h1></td></tr> 
	
				<?php	}
				   ?>
			
			</table>	</body>

</html>
