<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="zh-tw" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Framingham心血管疾病風險預測</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384- GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" 
crossorigin="anonymous">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body style="background-color:#E6E6F2">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384- q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<p class="auto-style1">
 <span><strong><h2 align="center" >Framingham</h2></strong></span></p>
 <span><strong><h2 align="center" >心血管疾病風險預測</h2></strong></span></p>
 <hr>
<?php
//抓取資料庫
require_once('conn_db.php'); 
$sql=$pdo->prepare('select * from heart');
$sql->execute()
?>


<table class="table table-hover table-sm"  align="center"  style="width: 70%">
	<tr bgcolor="#CF9E9E" style="text-align: center">
		<td><strong>ID</strong></td>
		<td><strong>Sex</strong></td>
		<td><strong>Age</strong></td>
		<td><strong>Diastolic</strong></td>
		<td><strong>Systolic</strong></td>
		<td><strong>Anti-Hypertensives</strong></td>
		<td><strong>Smoker</strong></td>
		<td><strong>Diabetes</strong></td>
		<td><strong>TDL</strong></td>
		<td><strong>HDL</strong></td>
		<td><strong>Score</strong></td>
		<td><strong>Risk</strong></td>
		<td></td>
		<td></td>
	</tr>
	

	<?php foreach ($sql->fetchAll() as $row) {   
	      echo '<tr bgcolor="#F3F3FA"style="text-align: center">';
	      echo '<td>' . $row['id'] . '</td>';
	      echo '<td>' . $row['sex'] . '</td>';
		  echo '<td>' . $row['age'] . '</td>';
  		  echo '<td>' . $row['diastolic'] . '</td>';  
	      echo '<td>' . $row['systolic'] . '</td>';  
	      echo '<td>' . $row['antih'] . '</td>';  
	      echo '<td>' . $row['smoker'] . '</td>';
		  echo '<td>' . $row['diabete'] . '</td>';
	      echo '<td>' . $row['tdl'] . '</td>';
		  echo '<td>' . $row['hdl'] . '</td>';
		  echo '<td>' . $row['score'] . '</td>';
		  echo '<td>' . $row['risk'] . '%'.'</td>';
	      echo '<td>' . '<a href="edit.php?id='. $row['id']. '">[ EDIT ]' . '</a></td>';
		  echo '<td>' . '<a href="del.php?id='. $row['id']. '">[ DEL ]' . '</a></td>';
		  echo '</tr>';
		  
	  }

	?> 

</table>
<hr>
<h6 align="center"><strong>Total : <?php echo $sql->rowCount(); ?> Records.</strong></h6>
<div class="row justify-content-center table-bordered table-sm shadow p-3 mb-5 bg-light rounded">	
	<input type="button" value="返回" onclick="location.href='index.php'">
	<img src="images/sadpepe.gif" width="45" height="45"></a>
</div>
<hr>
<div class="text-center">
<h><font color="#000000", size="5">Copyright(c) 2022 All rights reserved. ACS107105 吳秉翰</font></h>
</div>
</p>
</body>


</html>