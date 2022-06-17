<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Framingham心血管疾病風險預測結果</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<style>
        html {
            height: 100%;
        }

        body {
            background-image: url(images/background2.gif);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        }
</style>
</head>
<div class="container">
<hr>
<h2 class="text-center"><font color="#FFFFFF", size="6",face="微軟正黑體">Framingham</font></h2>
<h2 class="text-center"><font color="#FFFFFF", size="6",face="微軟正黑體">心血管疾病風險預測</font></h2>
<hr />
<div class="row justify-content-center table-bordered table-sm shadow p-3 mb-5 bg-light rounded">
<?php
  $smoke;
  $total;
  function age_gender($age, $gender) {
  $age_gender_array=array(
  0=>array(-1,0,1,2,3,4,5,6,7),
  1=>array(-9,-4,0,3,6,7,8,8,8));
  $age_score = 0;
     if($gender=='男生')
  {
   $row_index=0;
  }
   if($gender=='女生')
  {
   $row_index=1;
  }
  if ($age >=30 && $age <=34)
  {
   $column_index = 0;
  }
     if ($age >=35 && $age <=39)
  {
   $column_index = 1;
  }
     if ($age >=40 && $age <=44)
  {
   $column_index = 2;
  }
     if ($age >=45 && $age <=49)
  {
   $column_index = 3;
  }
     if ($age >=50 && $age <=54)
  {
   $column_index = 4;
  }
     if ($age >=55 && $age <=59)
  {
   $column_index = 5;
  }
     if ($age >=60 && $age <=64)
  {
   $column_index = 6;
  }
     if ($age >=65 && $age <=69)
  {
   $column_index = 7;
  }
     if ($age >=70)
  {
   $column_index = 8;
  }
     $age_score=$age_gender_array[$row_index][$column_index];
  return $age_score;
 }
 function blood_gender($gender,$blood_press1,$blood_press2)
 {
 $age_gender_array_man=array(
 0=>array(0,0,1,2,3),
 1=>array(0,0,1,2,3),
 2=>array(1,1,1,2,3),
 3=>array(2,2,2,2,3),
 4=>array(3,3,3,3,3)
 );
 $age_gender_array_woman=array(
 0=>array(-3,0,0,2,3),
 1=>array(0,0,0,2,3),
 2=>array(0,0,0,2,3),
 3=>array(2,2,2,2,3),
 4=>array(3,3,3,3,3)
 );
  $blood_score = 0;
  switch($_REQUEST['blood_press1'])
  {
   case('79'):$column_index = 0;break;
   case('85'):$column_index = 1;break;
   case('88'):$column_index = 2;break;
   case('95'):$column_index = 3;break;
   case('101'):$column_index = 4;break;
  }
  switch($_REQUEST['blood_press2'])
  {
   case('110'):$row_index = 0;break;
   case('125'):$row_index = 1;break;
   case('135'):$row_index = 2;break;
   case('145'):$row_index = 3;break;
   case('165'):$row_index = 4;break;
  }
     if($gender=='男生')
  {
   $blood_score=$age_gender_array_man[$row_index][$column_index];
  }
   if($gender=='女生'){
   $blood_score=$age_gender_array_woman[$row_index][$column_index];
  }
  return $blood_score;
 }
 function hdl_gender($hdl, $gender)
 {
 $hdl_gender_array=array(
 0=>array(2,1,0,0,-2),
 1=>array(5,2,1,0,-3)
 );
  $hdl_score = 0;
     if($gender=='男生'){$row_index=0;
       }
   if($gender=='女生'){$row_index=1;
       }
  switch ($_REQUEST['hdl'])
  {
  case ('20'):
   $column_index = 0;
   break;
  case('40'):
   $column_index = 1;
   break;
  case('48'):
   $column_index = 2;
   break;
  case('55'):
   $column_index = 3;
   break;
  case('70'):
   $column_index = 4;
   break;
  }
  $hdl_score=$hdl_gender_array[$row_index][$column_index];
  return $hdl_score;
 }
 function tdl_gender($tdl, $gender)
 {
 $tdl_gender_array=array(
 0=>array(-3,0,1,2,3),
 1=>array(-2,0,1,1,3)
 );
  $tdl_score = 0;
     if($gender=='男生')
  {
   $row_index=0;
  }
   if($gender=='女生')
  {
   $row_index=1;
  }
  switch ($_REQUEST['tdl'])
  {
  case ('150'):
   $column_index = 0;
   break;
  case('170'):
   $column_index = 1;
   break;
  case('220'):
   $column_index = 2;
   break;
  case('250'):
   $column_index = 3;
   break;
  case('280'):
   $column_index = 4;
   break;
  }
     $tdl_score=$tdl_gender_array[$row_index][$column_index];
  return $tdl_score;
 }
 function smoke_gender($smoke, $gender)
 {
  $smoke_score=0;
  if(isset($_REQUEST['smoke'])){$smoke_score=2;}
  else{$smoke_score=0;}
  return $smoke_score;
 }
 function sugar_gender($sugar, $gender)
 {
  if (isset($_REQUEST['sugar']))
  {
   if($gender=='男生')
   {
    $sugar_score=2;
   }
   if($gender=='女生')
   {
    $sugar_score=4;
   }
  }
  else{
   $sugar_score=0;
  }
  return $sugar_score;
 }
 $gender = $_REQUEST['SexGroup'];
 switch ($_REQUEST['SexGroup'])
 {
  case ('1'):
   $gender = '男生';
   break;
  case('2'):
   $gender = '女生';
   break;
 }

 ?>

 
  <table class="table">
					<thead>
					<th>項目</th>
					<th>數據</th>
					</thead>

                    <tbody>
                        <tr>
                            <td>性別(Gender)</td>
                            <td><?php echo $gender.'<br>';?></td>
                        </tr>
                        <tr>
                            <td>年齡(Age)</td>
                            <td><?php  echo $_REQUEST['age'].'<br>'; ?></td>
                        </tr>
                        <tr>
                            <td>舒張壓(Diastolic)</td>
                            <td><?php  echo $_REQUEST['blood_press1'].'<br>'; ?></td>
                        </tr>
						<tr>
                            <td>收縮壓(Systolic)</td>
                            <td><?php  echo $_REQUEST['blood_press2'].'<br>'; ?></td>
                        </tr>
						<tr>
                            <td>高密度膽固醇指數(HDL)</td>
                            <td><?php  echo $_REQUEST['hdl'].'<br>'; ?></td>
                        </tr>
						<tr>
                            <td>總膽固醇指數(TDL)</td>
                            <td><?php  echo $_REQUEST['tdl'].'<br>'; ?></td>
                        </tr>
						<tr>
                            <td>是否服用血壓藥物(Anti-hypertensives)</td>
                            <td><?php if(isset($_REQUEST['high_blood']))
									{
										$high_blood=1;
										echo '是'.'<br>';}
										else{
												$high_blood=0;
										echo '無'.'<br>';
									}?></td>
                        </tr>
						<tr>
                            <td>是否吸菸(Smoking)</td>
                            <td><?php if(isset($_REQUEST['smoke'])){
										$smoke=1;
										echo '是'.'<br>';}
									else{
										$smoke=0;
										echo '否'.'<br>';
										}?></td>
                        </tr>
						<tr>
                            <td>是否罹患糖尿病(Diabetes)</td>
                            <td><?php if(isset($_REQUEST['sugar'])){
										$sugar=1;
										echo '是'.'<br>';}
									else{
										$sugar=0;
										echo '否'.'<br>';
										}?></td>
                        </tr>
                    </tbody>
                </table>
<?php
$age = $_REQUEST['age'];
$blood_press1 = $_REQUEST['blood_press1'];
$blood_press2 = $_REQUEST['blood_press2'];
$hdl = $_REQUEST['hdl'];
$tdl = $_REQUEST['tdl'];
$total=@age_gender($_REQUEST['age'], $gender)+blood_gender($gender,$_REQUEST['blood_press1'],$_REQUEST['blood_press2'])+hdl_gender($_REQUEST['hdl'], $gender)+tdl_gender($_REQUEST['tdl'], $gender)+smoke_gender(isset($_REQUEST['smoke']), $gender)+sugar_gender(isset($_REQUEST['sugar']), $gender);
 echo '---------------------------------------------------------------------------------------------------------------------' . '<br>';
 echo '評分: ' . $total.'分' . '<br>';
 $total_score='unknow';
 if($total<=-1&&$gender=='男生'){$total_score='2%';}
 if($gender=='男生'){
 switch($total){
  case ('0'):
   $total_score='3%';
   break;
  case ('1'):
   $total_score='3%';
   break;
  case ('2'):
   $total_score='4%';
   break;
  case ('3'):
   $total_score='5%';
   break;
  case ('4'):
   $total_score='7%';
   break;
  case ('5'):
   $total_score='8%';
   break;
  case ('6'):
   $total_score='10%';
   break;
  case ('7'):
   $total_score='13%';
   break;
  case ('8'):
   $total_score='16%';
   break;
  case ('9'):
   $total_score='20%';
   break;
  case ('10'):
   $total_score='25%';
   break;
  case ('11'):
   $total_score='31%';
   break;
  case ('12'):
   $total_score='37%';
   break;
  case ('13'):
   $total_score='45%';
   break;
 }}
 if($total>=14&&$gender=='男生')
 {
  $total_score='54%';
 }
 if($total<-2&&$gender=='女生')
 {
  $total_score='1%';
 }
 if($gender=='女生')
 {
  switch($total)
  {
  case ('-1'):
   $total_score='2%';
   break;
  case ('0'):
   $total_score='2%';
   break;
  case ('1'):
   $total_score='2%';
   break;
  case ('2'):
   $total_score='3%';
   break;
  case ('3'):
   $total_score='3%';
   break;
  case ('4'):
   $total_score='4%';
   break;
  case ('5'):
   $total_score='4%';
   break;
  case ('6'):
   $total_score='5%';
   break;
  case ('7'):
   $total_score='6%';
   break;
  case ('8'):
   $total_score='7%';
   break;
  case ('9'):
   $total_score='8%';
   break;
  case ('10'):
   $total_score='10%';
   break;
  case ('11'):
   $total_score='11%';
   break;
  case ('12'):
   $total_score='13%';
   break;
  case ('13'):
   $total_score='15%';
   break;
  case ('14'):
   $total_score='18%';
   break;
  case ('15'):
   $total_score='20%';
   break;
  case ('16'):
   $total_score='24%';
   break;
 }}
 if($total>=17&&$gender=='女生'){$total_score='28%';}
 echo '心血管疾病發生率：' . $total_score. '<br>';;
 $result = '';
    if($total<=6&&$gender=='男生') {$result = '低風險族群' ;}
    if($total>6&&$total<=9&$gender=='男生') {$result = '中風險族群' ;}
    if($total>9&&$gender=='男生') {$result = '高風險族群' ;}
 if($total<=10&&$gender=='女生') {$result = '低風險族群' ;}
    if($total>10&&$total<=15&$gender=='女生') {$result = '中風險族群' ;}
    if($total>15&&$gender=='女生') {$result = '高風險族群' ;}
 echo '' . $result. '<br>';
 
 
 // 寫入資料庫
require_once('conn_db.php'); 
$sql = $pdo->prepare('Select * from heart');
if($sql->execute())
    echo 'Select Success!' . '<br>';


// 更新資料
// 取得id
$id = $_REQUEST['id'];
$sql = $pdo->prepare('update heart set sex=?, age=?, diastolic=?, systolic=?, antih=?, smoker=?, diabete=?, tdl=?, hdl=?, score=?, risk=? where id=?');
if ($sql->execute([$gender,$age,$blood_press1,$blood_press2,$high_blood,$smoke,$sugar,$tdl,$hdl,$total,$total_score,$id])) 
    echo 'Update sucess ! ' . '<br>';
else
    echo 'Update failed  ! ' . '<br>';



?>

</div>
<div class="row justify-content-center table-bordered table-sm shadow p-3 mb-5 bg-light rounded">					
 <table class="table">
                    <thead>
                        <tr>
                            <th>10年心血管發生率</th>
                            <th>分類</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>&gt;20%</td>
                            <td align="center">高風險</td>
                        </tr>
                        <tr>
                            <td>10-20%</td>
                            <td align="center">中度風險</td>
                        </tr>
                        <tr>
                            <td>10%</td>
                            <td align="center">低風險</td>
                        </tr>
                    </tbody>
                </table>
</div>
<div class="row justify-content-center table-bordered table-sm shadow p-3 mb-5 bg-light rounded">	
	<input type="button" value="返回" onclick="location.href='index.php'">
	<a href="show.php"><img src="images/mario.gif" width="45" height="45"></a>
</div>
<div class="text-center">
<h><font color="#FFFFFF", size="5">Copyright(c) 2022 All rights reserved. ACS107105 吳秉翰</font></h>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>