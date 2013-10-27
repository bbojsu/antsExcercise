<?php

include ("class.ant.php");
$listOfAnts = array();
if (empty($_POST)){
	for ($i=0; $i<10; $i++){
		$listOfAnts[] = new queenAnt();
	}
	for ($i=0; $i<10; $i++){
		$listOfAnts[] = new soldierAnt;
	}
	for ($i=0; $i<10; $i++){
		$listOfAnts[] = new workerAnt;
	}
}
else{
	$antsType = explode(",",$_POST['type']);
	$antsHealth = explode(",",$_POST['health']);
	
	for($i=0; $i<count($antsType);  $i++){
		if ($antsType[$i] == "queenAnt")
			$listOfAnts[] = new queenAnt($antsHealth[$i]);
		elseif ($antsType[$i] == "soldierAnt")
			$listOfAnts[] = new soldierAnt($antsHealth[$i]);
		else
			$listOfAnts[] = new workerAnt($antsHealth[$i]);
	}
	
	foreach ($listOfAnts as $item){
		//now apply damage
		$damageFactor = rand(0,80);
		$item->damage($damageFactor);
	}
}
?>
<html>
<head>
	<link rel="stylesheet" href="style.css">
	<title>Ants excersise</title>
</head>
<body>
	<table>
	<thead>
		<tr>
			<th>Ant type</th>
			<th>Health</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$formListType = "";
	$formListHealth = "";
	foreach ($listOfAnts as $item){	
		$className=get_class($item);
		
		//prepare info for form
		if (strlen($formListType)==0)
			$formListType="$className";
		else
			$formListType.=",$className";
			
		if (strlen($formListHealth)==0)
			$formListHealth=$item->getHealth();
		else
			$formListHealth.=",".$item->getHealth();
			
		//show ants info
		if ($item->deadOrAlive() == "dead")
			echo "<tr class='deadAnt'><td>$className</td><td>".$item->getHealth()." (dead)</td></tr>";
		else
			echo "<tr class='liveAnt'><td>$className</td><td>".$item->getHealth()."</td></tr>";

	}?>
	</tbody>
	</table>
	<?php

	echo "<br><form name='causeDamage' action='index.php' method='post'>
		<input type='hidden' name='type' value='$formListType'>
		<input type='hidden' name='health' value='$formListHealth'>
		<input type='submit' value='Cause random damage'>
	</form>
	";
	?>

</body>
</html>
