<?php
include_once 'includes/dbh.inc.php';

$year = '2019';
$query = "SELECT * FROM complains where year ='".$year."';";
$t1n = "SELECT count(*) as c from complains where year ='".$year."' and type = 'murdur';";
$t2n = "SELECT count(*) as c from complains where year ='".$year."' and type = 'impersonation';";
$t3n = "SELECT count(*) as c from complains where year ='".$year."' and type = 'impersonation';";
$t4n = "SELECT count(*) as c from complains where year ='".$year."' and type = 'impersonation';";
$t5n = "SELECT count(*) as c from complains where year ='".$year."' and type = 'impersonation';";
$tq1n = mysqli_query($conn,$t1n);
$tq2n = mysqli_query($conn,$t2n);
$tq3n = mysqli_query($conn,$t3n);
$tq4n = mysqli_query($conn,$t4n);
$tq5n = mysqli_query($conn,$t5n);
$c1=0;
$c2=0;
$c3=0;
$c4=0;
$c5=0;
while($row= @mysqli_fetch_array($tq1n,MYSQL_ASSOC)){
	$c1= $row['c'];
	}
while($row= @mysqli_fetch_array($tq2n,MYSQL_ASSOC)){
	$c2= $row['c'];
	}
while($row= @mysqli_fetch_array($tq3n,MYSQL_ASSOC)){
	$c3= $row['c'];
	}
while($row= @mysqli_fetch_array($tq4n,MYSQL_ASSOC)){
	$c4= $row['c'];
	}
while($row= @mysqli_fetch_array($tq5n,MYSQL_ASSOC)){
	$c5= $row['c'];
	}


echo('
<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheets/charts.css"/>
	<link rel="stylesheet" type="text/css" href="stylesheets/hover.css"/>
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

<script>
function genChart(){
document.getElementsByClassName("selectopts")[0].style.display="none"
document.getElementById("chartContainer").style.display="block"
document.getElementById("barchartContainer").style.display="block"
let data=[{ y: '.$c1.', label: "Bribe" },
{ y: '.$c2.', label: "Loot" },
{ y: '.$c3.', label: "Murder" },
{ y: '.$c4.', label: "Manslaughter" },
{ y: '.$c5.', label: "Killing" },
];
let datapoints=[];
let datapoints2=[];
datapoints2=data;
let total=0;
for(let i=0;i<data.length;i++){
  total+=data[i].y
}
for(let i=0;i<data.length;i++){
  datapoints.push({y:data[i].y/total*100,label:data[i].label})
}

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Heading"
	},
	data: [{
		type: "pie",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}%",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}%",
		dataPoints: datapoints
	}]
});
chart.render();
var barchart = new CanvasJS.Chart("barchartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Electoral crimes"
	},
	axisY: {
		title: "Number of crimes"
	},
	data: [{
		type: "column",
		showInLegend: true,
		legendMarkerColor: "grey",
		legendText: "Number of crimes",
		dataPoints: datapoints2
	}]
});
barchart.render();

}
</script>
</head>
<body>
	<nav class="navabar">
		<div class="logo">
			<a href="index.php"><img class="logopic" src="img/votesafelogo.png"></a>
		</div>
		<ul class="butlist">
			<span class="butres">
				<li class="hvr-glow">
					<a href="">ABOUT</a>
				</li>
				<li class="hvr-glow">
					<a href="">NEWSFEED</a>
				</li>
			</span>
		</ul>
	</nav>
<div class="main">
<span class="selectopts">
	<span class="dropdown">
	<select class="selyr">
	  <option class="yropt" value="2019">2019</option>
	  <option class="yropt" value="2018">2018</option>
	  <option class="yropt" value="2017">2017</option>
	</select>
	</span>
	<span class="getbut">
	<button id="generate_chart" onclick="genChart();return;">Get charts</button>
	</span>
</span>
<div id="chartContainer" style="height: 400px;"></div>
<div id="barchartContainer" style="height: 400px;"></div>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
');
?>
