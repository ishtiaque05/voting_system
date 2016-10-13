<?php
	session_start();
	include("admin/php/connect_to_mysql.php");
	include("admin/php/myFunctions.php");
	
	$msg = "";
	$displayTitle = "";
	$displayContent = "";

			
				$sqlSelUsers = mysql_query("select * from voter ") or die(mysql_error());
				if(mysql_num_rows($sqlSelUsers) >= 1){
					
					while($getRowUser = mysql_fetch_array($sqlSelUsers)){
						$userID = $getRowUser["voter_id"];
						$fname = $getRowUser["firstname"];
						$lname = $getRowUser["lastname"];
						$sex = $getRowUser["sex"];
						$noSt = $getRowUser["address"];
						$region = $getRowUser["region"];
						$addr = $noSt.", ".$region;
						$contactNo = $getRowUser["phone"];
						$email=$getRowUser["email"];
						$username=$getRowUser["username"];
						
						
					}
					
				}else
					$msg = "No record found!";
			
			
		
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>|| VOTING REGISTRATION SYSTEM||</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style11 {font-size: 18px; font-weight: bold; }
.style13 {font-size: x-large; font-weight: bold; color: #000000; }
.style2 {	color: #FF00FF;
	font-weight: bold;
}
.style3 {
	font-size: 18px;
	color: #000000;
}
.style4 {font-size: 18px; color: #FFFFFF; }
.style5 {font-size: 12px}
-->
</style>
</head>
<body>
<div id="header">
  <table width="200" align="center">
    <tr>
      <td height="212"><img src="images/header1.jpg" alt="" width="770" height="210" /></td>
    </tr>
  </table>
</div>
<div id="menu">
	<ul>
		<li> <a href="index.php"> |  Home  |</a></li>
		<li>
		  <a href="login.php">|  Voting  |</a></li>
		<li>
		  <a href="result.php">|  Result  |</a></li>
		<li>
		  <a href="loginCandidate.php" >|  Candidate Registration  |</a></li>
		
	</ul>
</div>
<div id="content">
	<div id="left">
    <p style="text-align:center; color:#FF0000;"><strong><marquee  behavior="scroll">THIS REGISTRATION FORM IS FOR ELEGIBLE BANGLADESHI WHO ARE ABOVE 18 YEARS OF AGE AS FROM 23RD JUNE 2014 </marquee></strong></p>
</div>
  <th height="41" colspan="2" scope="col"><h1><center>
   </center>
   
   </h1></th>
	</div>
</div>
<div id="footer">
			
				<p><strong>Your voter id is : <?php echo $userID ?></strong></p></br>
				<p><strong>User Name :<?php echo $username ?></strong></p></br>
				</br>
				<p>First Name:<?php echo $fname ?></p></br>
				<p>Last Name : <?php echo $lname ?></p></br>
				<p>Sex :<?php echo $sex ?></p></br>
				<p>Address :<?php echo $addr ?></p></br>
				<p>Phone : <?php echo $contactNo ?></p></br>
				<p>Email :<?php echo $email ?></p></br>
				
			
 
  <p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>Copyright &copy; E-voting System</a></p>
</div>
</body>
</html>
