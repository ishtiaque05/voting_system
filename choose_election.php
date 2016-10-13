<?php
session_start();
include("functions.php");
include("admin/php/connect_to_mysql.php");

if(isset($_POST['Submit'])) {
header("location:parliamentary.php");
}
if(isset($_POST['Submit2'])) {
header("location:partyelection.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>|| CHOOSE ELECTION SYSTEM ||</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style2 {
	color: #000000;
	font-size: 16px;
}
.style8 {color: #0000FF; font-weight: bold; font-size: 16px; }
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
		  <a href="registration.php">|  Registration  |</a></li>
		<li><a href="loginCandidate.php" >|  Candidate Registration  |</a></li><li>
		  <a href="contact.php">|  Contact Us  |</a></li>
	</ul>
</div>
<div id="content">
  <div id="left">
    <p align="right" style="text-align:center; color:#60B7DE;">	<a href="logout.php">LOGOUT</a></p>
</div>
   <th height="41" colspan="2" scope="col"><h1><center>
        <span class="style2">To Start Voting you must choose the Type of Election to start with</span>
   </center></strong></h1></th>
	<p>&nbsp;</p>
</div>
</div>
<div id="footer">
  <table width="463" align="center">
    <tr>
      <td width="455" height="61"><form id="form1" method="post" action="">
        <table width="459" height="103" align="center">
          <tr>
            <td width="305" height="55"><div align="center" class="style8">PARLIAMENTARY ELECTIONS </div></td>
            <td width="142"><label>
              <div align="center">
                <input type="submit" name="Submit" value="PARLIAMENTARY" />
                </div>
            </label></td>
          </tr>
          <tr>
            <td height="40"><div align="center" class="style8">INTERNAL PARTY ELECTIONS </div></td>
            <td><div align="center">
              <input type="submit" name="Submit2" value="PARTYELECTION" />
            </div></td>
          </tr>
        </table>
            </form>
      </td>
    </tr>
  </table>
  <p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>Copyright &copy; E-VOTING SYSTEM</a></p>
</div>
</body>
</html>
