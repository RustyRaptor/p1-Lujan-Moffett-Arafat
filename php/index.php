<?php
require_once('connection.php');
?>
<html>
<body>
<title>ABC media</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#hide").click(function(){
    $("p").hide();
  });
  $("#show").click(function(){
    $("p").show();
  });
});
</script>
<h3>Displays</h3>
<?php
	$query = "select * from DigitalDisplay;";
	$result = $conn->query($query) or die(mysqli_error($conn));
		if($result->num_rows > 0){
			while($r = $result->fetch_assoc()){
?>
<tr>
				<td><?php echo $r["serialNo"];?></td>
				<td><?php echo $r["schedulerSystem"];?></td>
				<td><?php echo $r["modelNo"];?></td>
				<td><?php echo nl2br("\n");?></td>
</tr>
<?php
			}
		}
?>
<h2>Click on a model number below to show that model number's information.</h2>
<?php
	$query2 = "select modelNo from DigitalDisplay;";
	$result2 = $conn->query($query2) or die(mysqli_error($conn));
	if($result2->num_rows > 0){
		while($r2 = $result2->fetch_assoc()){
?>
<tr>
			<td><?php echo $r2["modelNo"];?></td>
			<p><?php $modelno = $r2["modelNo"];
			         $query3 = "select * from Model where modelNo=$modelno;";
				 $result3 = $conn->query($query3) or die(mysqli_error($conn));
				 if($result2->num_rows > 0){
					 while($r3 = $result3->fetch_assoc()){
?>
<tr>
						<td><?php echo $r3["modelNo"];?></td>
						<td><?php echo $r3["width"];?></td>
						<td><?php echo $r3["height"];?></td>
						<td><?php echo $r3["weight"];?></td>
						<td><?php echo $r3["depth"];?></td>
						<td><?php echo $r3["screenSize"];?></td>
</tr>
</p>
<?php
					 }
				 }
?>
			<td><button id="hide">Hide</button></td>
			<td><button id="show">Show</button></td>
</tr>
<?php
		}
	}
	#	$query3 = "select * from Model where modelNo=" . $result2["modelNo"] . ";";
	#	$result3 = $conn->query($query3) or die(mysqli_error($conn));
	#	if($result3->num_rows > 0){
	#		while($r3 = $result3->fetch_assoc()){
?>
<tr>
				<td><?php echo $r3["modelNo"];?></td>
                                                <td><?php echo $r3["width"];?></td>
                                                <td><?php echo $r3["height"];?></td>
                                                <td><?php echo $r3["weight"];?></td>
						<td><?php echo $r3["screenSize"];?></td>
</tr>
<h2>Search for a display</h3>
<h5>Please input a scheduler system below.</h5>
<form action="search_results.php" method="get">
	<input type="text" name="system"><br>
	<input type="submit"><input type="reset">
</form>
<?php
	#$system = $_GET["system"];
	#echo $system;
#$query4 = "select * from DigitalDisplay where schedulerSystem=$system;";
#$result4 = $conn->query($query4) or die(mysqli_error($conn));
#if($result4->num_rows > 0){
#	while($r4 = $result4->fetch_assoc()){
?>
<tr>
		<td><?php echo $r4["serialNo"];?></td>
                <td><?php echo $r4["schedulerSystem"];?></td>
		<td><?php echo $r4["modelNo"];?></td>
</tr>
<?php
#	}
#}
?>
</body>
</html>
