<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<title>Farmingham心血管疾病偵測</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<style>
        html {
            height: 100%;
        }

        body {
            background-image: url(images/background1.gif);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        }
</style>
</head>
<div class="text-center">
<hr>
<h2 class="font-weight-bold"><font color="#FFFFFF", size="6">Framingham</font></h2>
<h2 class="font-weight-bold"><font color="#FFFFFF", size="6">心血管疾病風險預測</font></h2>
<hr>
</div>
<div class="container">
<div class="row justify-content-center table-bordered table-sm shadow p-3 mb-5 bg-light rounded">	
<p>&nbsp;</p>
<?php
//修改資料
require_once('conn_db.php'); 
	$sql=$pdo->prepare('select * from heart where id=?');
	$sql->execute([$_REQUEST['id']]);
	

  //取出資料
	foreach ($sql->fetchAll() as $row) {}
?>
<form action="update.php" method="post" name="form1" id="form1">
<input type="hidden" name="id" value=<?php echo $row['id']; ?>> 
  <table class="table table-bordered">
      <tr>
        <td width="190">危險因子(Risk Factors)</td>
        <td width="145">單位(Unit)</td>
        <td width="150">資料(Data)</td>
      </tr>
      <tr>
        <td>性別(Gender)</td>
        <td>&nbsp;</td>
        <td><p>
          <label>
		 <input checked="true" name="SexGroup" type="radio" value ="1" <?php if ($row['sex'] == '男生') echo 'checked'; ?>> 男生(Male)
		  <label>
		<input name="SexGroup" type="radio" value ="2" <?php if ($row['sex'] == '女生') echo 'checked'; ?>> 女生(Female) </td>
        </p></td>
      </tr>
      <tr>
        <td>年齡(Age)</td>
        <td>歲</td>
        <td>
          <select name="age" id="age">
		  <?php
		  for($i=10; $i<=99;$i++){
			  echo '<option value="' . $i . '">' . $i . '</option>';
		  }
		  ?>
		  </select></td>
      </tr>
      <tr>
        <td>血壓(Blood Pressure)</td>
        <td>舒張壓(Diastolic)</td>
        <td>
          	<select name=" blood_press1" id="blood_press1">
			<option value ="79">小於80</option><option value ="85">80-84</option><option value ="88">85-89</option><option value ="95">90-99</option><option value ="101">100以上</option>        	</select>
		</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>收縮壓(Systolic)</td>
        <td>
			<select name=" blood_press2" id="blood_press2">
			<option value ="110">小於120</option><option value ="125">120-129</option><option value ="135">130-139</option><option value ="145">140-159</option><option value ="165">160以上</option>        	</select>
		</td>
      </tr>
      <tr>
        <td width="300" >使用高血壓藥物(Anti-hypertensives)</td>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="high_blood">有</td>
      </tr>
      <tr>
        <td>抽煙(Smoking)</td>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="smoke">有</td>
      </tr>
      <tr>
        <td>糖尿病(Diabetes)</td>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="sugar">有</td>
      </tr>
      <tr>
        <td>高密度膽固醇(HDL)</td>
        <td>mg/dl</td>
        <td>
			<select name=" hdl" id="hdl">
			<option value ="20">小於35</option><option value ="40">35-44</option><option value ="48">45-49</option><option value ="55">50-59</option><option value ="70">60以上</option>  
			</select>
		</td>
      </tr>
      <tr>
        <td>總膽固醇(TDL)</td>
        <td>mg/dl</td>
        <td>
			<select name=" tdl" id="tdl">
			<option value ="150">小於160</option><option value ="170">160-199</option><option value ="220">200-239</option><option value ="250">240-279</option><option value ="280">279以上</option>  
			</select>
		</td>
      </tr>
    </tbody>
  </table>
  <p class="text-center">
    <input type="submit" name="submit" id="submit" class="btn btn-outline-success" value="送出">
    <input type="reset" name="reset" id="reset" class="btn btn-outline-danger" value="重設">
  </p>
</form>
<p>&nbsp;</p>
	</div>
	</div>
<div>
<div class="text-center">
<hr>
<h><font color="#FFFFFF", size="5">Copyright(c) 2022 All rights reserved. ACS107105 吳秉翰</font></h>
</div>
	</div>
	
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>