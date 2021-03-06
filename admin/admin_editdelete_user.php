<?php
	session_start();
	include("php/connect_to_mysql.php");
	include("php/myFunctions.php");
	
	$msg = "";
	
	
	disableComponents();
	 
	$submit = (isset($_POST['btnSearch']) ? strip_tags($_POST['btnSearch']):'');
	$submit1 = (isset($_POST['btnUpdate']) ? strip_tags($_POST['btnUpdate']):'');
	$submit2 = (isset($_POST['btnDelete']) ? strip_tags($_POST['btnDelete']):'');
	$vid = (isset($_POST['txtVoterId']) ? strip_tags($_POST['txtVoterId']):'');
	if(!empty($vid) || isset($vid)){
		selectUsersUsingId($vid);
		enableComponents();
	}
	
	if($submit == "Search"){
		if(empty($_POST['txtVoterId']))
			$msg = "User ID is empty!";
		else{
			selectUsersUsingId($_POST['txtVoterId']);
		}
	}else if($submit1 == "Update"){
		mysql_query("update tblusers set fname= '$_POST[txtFname]', mname = '$_POST[txtMname]', lname = '$_POST[txtLname]', no_street = '$_POST[txtNoStreet]', region = '$_POST[txtRegion]', contact_no = '$_POST[txtContactNo]', dob = '$_POST[txtDOB]', age = '$_POST[txtAge]', gender = '$_POST[selGender]' where voter_id = '$_POST[txtVoterId]'") or die(mysql_error());
		$msg = "Successfully updated the record!";
		disableComponents();
	}else if($submit2 == "Delete"){
		mysql_query("delete from tblusers where voter_id = '$_POST[txtVoterId]'") or die(mysql_error());
		mysql_query("delete from tblaccount where voter_id = '$_POST[txtVoterId]'") or die(mysql_error());
		$msg = "Successfully deleted the record!";
		disableComponents();
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/styles.css" rel="stylesheet" type="text/css" />
<title>Dadads - Administrator</title>
</head>
<body id="adminpage">
<div id="main_wrapper">
	<div id="main_header">
		<div id="admin_name"><h1>Welcome <?php echo $_SESSION["name"]; ?></h1></div>
	</div><!-- end of header -->
	<div id="main_menu" class="menu_sel">
		<ul id="menu_icons">
			<li><a href="admin_addnew_user.php"><img src="images/User-Group-icon.png" /><p class="selected">Users</p></a></li>
			
		</ul>
	</div><!-- end of menu -->
	<div class="cleaner h40"></div>
	<div id="main_top"></div>
	<div id="main_con">
		<?php require_once('includes/left_nav.php');?>
		
        <div id="content">
			<h2>User Information <span style="color: #a11; font-size: 13px; margin-left: 50px;"><?php echo $msg; ?></span></h2>
			
			<form name="editdelete_user_form" method="post" action="admin_editdelete_user.php">
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td class="border border_tlr border_ts border_ls border_bs col_1">Search by:</td>
					<td class="border border_ts border_bs col_1"><input type="text" name="txtVoterId" value="<?php echo $voterID; ?>" /></td>
					<td colspan="2" class="border border_ts border_bs border_rs border_trr"><input class="src_btn" type="submit" name="btnSearch" value="Search" /></td>
				</tr>
				<tr>
					<td class="border border_ls col_1"><br></td>
					<td class="border col_2">First</td>
					<td class="border col_2">Middle</td>
					<td class="border border_rs col_2">Last</td>
				</tr>
				<tr>
					<td class="border border_ls border_bs col_1">Name:</td>
					<td class="border border_bs col_2"><input type="text" name="txtFname" value="<?php echo $fname; ?>" <?php echo $txtFnameDisable; ?> /></td>
					<td class="border border_bs col_2"><input type="text" name="txtMname" value="<?php echo $mname; ?>" <?php echo $txtMnameDisable; ?> /></td>
					<td class="border border_bs border_rs col_2"><input type="text" name="txtLname" value="<?php echo $lname; ?>" <?php echo $txtLnameDisable; ?> /></td>
				</tr>
				<tr>
					<td class="border border_ls col_1"><br></td>
					<td class="border col_2">No. and Street</td>
					<td class="border col_2">Region</td>
					<td class="border border_rs col_2">Contact No.</td>
				</tr>
				<tr>
					<td class="border border_ls border_bs col_1">Address:</td>
					<td class="border border_bs col_2"><input type="text" name="txtNoStreet" value="<?php echo $noSt; ?>" <?php echo $txtNoStreetDisable; ?> /></td>
					<td class="border border_bs col_2"><input type="text" name="txtRegion" value="<?php echo $region; ?>" <?php echo $txtRegionDisable; ?> /></td>
					<td class="border border_bs border_rs col_2"><input type="text" name="txtContactNo" value="<?php echo $contactNo; ?>" <?php echo $txtContactNoDisable; ?> /></td>
				</tr>
				<tr>
					<td colspan="2" class="border border_ls col_1"><br></td>
					<td class="border col_2">Age</td>
					<td class="border border_rs col_2">Gender</td>
				</tr>
				<tr>
					<td class="border border_ls border_bs col_1">Date of Birth</td>
					<td class="border border_bs col_2"><input type="text" name="txtDOB" value="<?php echo $dob; ?>" <?php echo $txtDOBDisable; ?> /></td>
					<td class="border border_bs col_2"><input type="text" name="txtAge" value="<?php echo $age; ?>" <?php echo $txtAgeDisable; ?> /></td>
					<td class="border border_bs border_rs col_2">
						<select name="selGender" <?php echo $txtGenderDisable; ?> class="col_1"><option></option ><option <?php echo $selectMaleGender; ?>>Male</option><option <?php echo $selectFemaleGender; ?>>Female</option></select>
					</td>
				</tr>
			</table>
			
			<div class="marginleft_1">
				<input class="margintop_2 sub_btn" type="submit" name="btnUpdate" value="Update" <?php echo $btnUpdateDisable; ?> />
				<input class="margintop_2 sub_btn" type="submit" name="btnDelete" value="Delete" <?php echo $btnDeleteDisable; ?> />
			</div>
			</form>
		</div><!-- end of content -->
		<div class="cleaner"></div>
	</div><!-- end of con -->
	<div id="main_footer">
		<div class="cleaner h40"></div>
		<center>
			 Copyright &copy; 2014 E-Voting System
		</center>
	</div><!-- end of footer -->
</div>
</body>
</html>