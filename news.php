<?php
include_once 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="stylesheets/news.css">
  <link rel="stylesheet" type="text/css" href="stylesheets/hover.css"/>
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
  <title>Enter Report</title>
</head>
<!-- This is my product -->
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

<p class="newshead">NewsFeed</p>
<span class="dropdown">
<p class="dropdowntext">Filter by type of incident</p>
<span class="dd">
<form method="POST" action="news2.php">
<select class="selinc" name="filter">
  <option class="incopt" value="murder">Murder</option>
  <option class="incopt" value="impersonation">Impersonation</option>
  <option class="incopt" value="boothcapturing">Booth Capturing</option>
  <option class="incopt" value="threatening">Threatening</option>
  <option class="incopt" value="bribery">Bribery</option>
</select>
<button id="filter_but" type="submit" value="Filter">Filter</button>
</form>
</span>
</span>

<div class="feed">
  <?php
  $query = "SELECT date,type,location FROM complains order by date desc";
  $run_query = @mysqli_query($conn,$query);
  while($row= mysqli_fetch_row($run_query)){
    $type=$row[1];
    $date=$row[0];
    $location=$row[2];
    echo('
        <div class="feedbox">
        <ul class="feedlist">
      <li>
        <span class="fieldhead">Type of Incident:</span><span class="fielddata">'.$type.'</span>
      </li>
      <li>
        <span class="fieldhead">Date and time:</span><span class="fielddata">'.$date.'</span>
      </li>
      <li>
        <span class="fieldhead">Location:</span><span class="fielddata">'.$location.'</span>
      </li>
    </ul>
  </div>

      ');

  }

  ?>
</div>  
