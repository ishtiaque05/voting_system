<?php
session_start();
include("functions.php");
include("admin/php/connect_to_mysql.php");

disableComponents();
if($_POST['Submit1']=="search")
{
		$vid=(isset($_POST['txtvoterid']) ? strip_tags($_POST['txtvoterid']):'');
		if(!empty($_POST['txtvoterid'])){
		
	$sqlSelUsers=mysql_query("select * from voter where voter_id='$vid'") or die(mysql_error());
	
	
	if(mysql_num_rows($sqlSelUsers)==1){
		$getRowUser=mysql_fetch_array($sqlSelUsers);
		$fname=$getRowUser["firstname"];
		$lname=$getRowUser["lastname"];
		$name=$fname." ".$lname;
		$age=$getRowUser["age"];
		$address=$getRowUser["address"];
		$region=$getRowUser["region"];
		$phone=$getRowUser["phone"];
		$voterid=$getRowUser["voter_id"];
		


		} 
	}
}

   
			$submit=(isset($_POST["Submit"]) ? strip_tags($_POST["Submit"]):'');
			if($submit=="Registered")
			{
				 if(empty($_POST['txtparty'])){ return 'Please select your party';
				}else if(empty($_POST['txtwealth'])){
					return 'Please select your wealth';
				}else
				mysql_query("insert into candidates(voter_id, wealth,party)
							values('$_POST[txtvoterid]','$_POST[txtwealth]','$_POST[txtparty]')") or die(mysql_error());
				mysql_query("insert into electionvotes(cand_name,party,region) 
							values($name,'$_POST[txtparty]',$region)");
			}
	

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
		  <a href="loginCandidate.php" >|  Candidate Registration |</a></li>
		<li>
		  <a href="contact.php">|  Contact Us  |</a></li>
	</ul>
</div>
<div id="content">
	<div id="left">
    <p style="text-align:center; color:#FF0000;"><strong><marquee  behavior="scroll">THIS REISTRATION FORM IS FOR ELEGIBLE BANGLADESHI WHO ARE ABOVE 18 YEARS OF AGE AS FROM 23RD JUNE 2014 </marquee></strong></p>
</div>
  <th height="41" colspan="2" scope="col"><h1><center>
   </center>
   
   </h1></th>
	</div>
</div>
<div id="footer">
  <table width="651" border="0" align="center">
    <tr>
      <th width="645" height="783" scope="col"><table width="667" height="31" border="0" align="center" bgcolor="#00FF00">
          <tr>
            <th width="607" scope="col"><div align="center"><span class="style4">REGISTRATION FORM </span></div></th>
          </tr>
          <tr>
            <th scope="col"><div "align="center"  style="background:#FF00OO"  >
          <h1    align="center"><strong><?php echo "CANDIDATE REGISTRATION"; ?></strong></h1>
          </div>&nbsp;        </th>
          </tr>
        </table>
          <form action="" method="post" enctype="multipart/form-data" id="form1">
            <table width="431" border="0" align="center" cellpadding="3" cellspacing="17">
			 <tr>
                <td>VOTER'S ID </td>
                <td><input type="text" name="txtvoterid" value="<?php echo $voterid?>"> </td>
				<td><input type="submit" name="Submit1" value="search" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th width="122" scope="col"><div align="justify">FIRSTNAME</div></th>
                <th width="246" scope="col"><div align="justify">
                    <input type="text" name="txtfirstname" value="<?php echo $fname?>" <?php echo $txtFnameDisable; ?> />
                </div></th>
              </tr>
              <tr>
                <td><div align="justify">LASTNAME</div></td>
                <td><div align="justify">
                    <input type="text" name="txtlastname" value="<?php echo $lname?>" <?php echo $txtLnameDisable ?> />
                </div></td>
              </tr>
              
              <tr>
                <td><div align="justify">AGE</div></td>
                <td><div align="justify">
                    <input type="text" name="txtage" value="<?php echo $age?>" <?php echo $txtAgeDisable ?> />
                </div></td>
              </tr>
              <tr>
                <td><div align="justify">ADDRESS</div></td>
                <td><div align="justify">
                    <input type="text" name="txtaddress" value="<?php echo $address?>" <?php echo $txtAddressDisable ?>  />
                </div></td>
              </tr>
              
              <tr>
                <td><div align="justify">STATE/DISTRICT</div></td>
                <td><div align="justify">
                    <input type="text" name="txtregion" value="<?php echo $region?>" <?php echo $txtRegionDisable ?> />
                </div></td>
              </tr>
              
              <tr>
                <td><div align="justify">PHONE</div></td>
                <td><div align="justify">
                    <input type="text" name="txtphone" value="<?php echo $phone?>" <?php echo $txtPhoneDisable ?> />
                </div></td>
              </tr>
			  
			  <tr>
                <td><div align="justify">SELECT PARTY</div></td>
                <td><div align="justify">
                  <label>
                  <select name="txtparty">
					<option></option>
                    <option value="BNP">BNP</option>
                    <option value="AL">AL</option>
					<option value="Workers Party">Workers party</option>
                  </select>
                  </label>
                </div></td>
              </tr>
			  
			  <tr>
                <td><div align="justify">Wealth in tk</div></td>
                <td><div align="justify">
                    <input type="text" name="txtwealth"  />
                </div></td>
              </tr>
			  
			  
			  
			  
              
             
              <tr>
                <td><input type="submit" name="Submit" value="Registered" /></td>
                <td>&nbsp;</td>
              </tr>
            </table>
          </form></th>
    </tr>
  </table>
  <p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>Copyright &copy; E-voting System</a></p>
</div>
</body>
</html>
