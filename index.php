<?php
	require_once('db.php');
?>

<html>
<head>
	<link href='style.css' rel='stylesheet' type='text/css'/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script language='javascript'>
		
		$(document).ready(function() {
			$("#sign").click(function() {
				$("#signup").slideDown("slow");
				$("#login").slideUp("slow");
				$("#signtext").show();
				$("#reg").hide();
				$(this).css({"background-color": "#DD3B19","box-shadow": "3px 3px 10px #2e2e2e","opacity":"1"});   // DD3B19 in focus
				$("#log").css({"background-color":"#ED5F40","box-shadow": "1px 1px 10px #2e2e2e","opacity":"0.8"});
			});
		
			$("#log").click(function() {
				$("#login").slideDown("slow");
				$("#signup").slideUp("slow");
				$("#signtext").hide();
				$("#reg").show();
				$(this).css({"background-color": "#DD3B19","box-shadow": "3px 3px 10px #2e2e2e","opacity":"1"});   // DD3B19 in focus
				$("#sign").css({"background-color":"#ED5F40","box-shadow": "1px 1px 10px #2e2e2e","opacity":"0.8"});

			});

			$("#reg").click(function() {
				$("#signup").slideDown("slow");
				$("#login").slideUp("slow");
				$("#reg").hide();
				$("#signtext").show();
				$("#sign").css({"background-color": "#DD3B19","box-shadow": "3px 3px 10px #2e2e2e","opacity":"1"});   // DD3B19 in focus
				$("#log").css({"background-color":"#ED5F40","box-shadow": "1px 1px 10px #2e2e2e","opacity":"0.8"});

			});

			$("#signtext").click(function() {
				$("#signup").slideUp("slow");
				$("#login").slideDown("slow");
				$("#signtext").hide();
				$("#reg").show();
				$("#sign").css({"background-color":"#ED5F40","box-shadow": "1px 1px 10px #2e2e2e","opacity":"0.8"});
				$("#log").css({"background-color": "#DD3B19","box-shadow": "3px 3px 10px #2e2e2e","opacity":"1"});   // DD3B19 in focus

			});
			
			$("#log").hover(function() {
				$(this).css('cursor','pointer');
			});
			

			$("#sign").hover(function() {
				$(this).css('cursor','pointer');
			});
			$("#signup").slideDown("slow");
			$("#sign").css({"background-color": "#DD3B19","box-shadow": "3px 3px 10px #2e2e2e","opacity":"1"});   // DD3B19 in focus
			$("#log").css({"background-color":"#ED5F40","box-shadow": "1px 1px 10px #2e2e2e","opacity":"0.8"});

		});
		
	</script>
	</head>
<body>
	<h4 align='right' ><a href="ReadMeFirst.txt" style='color:#fff'; target='_blank'>Read Me</a><h4>
	<h4 align='right' ><a href="fancymonk.zip" style='color:#fff'; download>Download code base</a><h4>
	<table align='center'>
		<tr><td>
		<div id='sign'>
		<h3  align='center'>&nbsp;&nbsp;&nbsp;&nbsp;SIGN UP</h3></div></td>
		<td><div id='log'>
		<h3  align='center'>LOGIN &nbsp;&nbsp;&nbsp;&nbsp;</h3></div></td>
		</tr>
	</table>
	
<?php
	echo"<div id='signup'>
			<form name='signup' align='center' method='post' action='index.php'>
			<table align='center' title='FancyMonk Signup Form'>
				<tr title='FancyMonk Customer Name'>
					<td><label for='name'>Name :</label><br><br></td>
					<td><input type='text' name ='user' placeholder='eg. Ravi Shah' required><br><br></td>
				</tr>
				<tr title='FancyMonk Customer Mobile'>
					<td><label for='mob'>Mobile :</label><br><br></td>
					<td><input type='text' name='mob' maxlength=10 minlength=10 placeholder='eg. 9414112345' required><br><br></td>
				</tr>
				<tr title='FancyMonk Customer Email'>
					<td><label for='email'>Email id :</label><br><br></td>
					<td><input type='email' name='mail' placeholder='eg. ravishah@gmail.com' required unique><br><br></td>
				</tr>
				<tr title='FancyMonk Customer Password'>
					<td><label for='password'>Password:</label><br><br></td>
					<td><input type='password' name='pass' required><br><br></td>
				</tr>
				<tr>
					<td colspan=2 align='center'><input type='submit' value='SUBMIT' name='submit'><br></td></tr>
			</table>
			</form>
		</div>";

	echo"<div id='login'>
			<form name='login' align='center' method='post' action='index.php'>
			<table align='center' title='FancyMonk Login Form'>
				<tr title='FancyMonk email'>
					<td><label for='email'>Email id:</label><br><br></td>
					<td><input type='email' name='mail' placeholder='eg. ravishah@gmail.com' required unique><br><br></td>
				</tr>
				<tr title='FancyMonk Password'>
					<td><label for='password'>Password:</label><br><br></td>
					<td><input type='password' name='pass' required><br><br></td>
				</tr>
				<tr>
					<td colspan=2 align='center'><input type='submit' value='LOGIN' name='login'><br></td>
				</tr>
				
			</table>
			</form>
		</div>";

	echo "<div id='reg'>
			<table align='center'>		
				<tr>
						<td colspan=2 align='center'><label><u>Not registered yet?SIGN UP</u></label></td>
				</tr>
			</table>
		</div>";

	echo "<div id='signtext'>
		<table align='center'>		
			<tr>
					<td colspan=2 align='center'><label><u>Already registered? LOGIN</u></label></td>
			</tr>
		</table>
	</div>";
	
?>
	
</body>
</html>
<?php
	if(!empty($_POST["submit"])) {

		if(!empty($_POST["user"]&&$_POST["mob"]&&$_POST["mail"]&&$_POST["pass"])) {

			$name = mysql_real_escape_string($_POST["user"]);
			$mob = mysql_real_escape_string($_POST["mob"]);
			$mail = mysql_real_escape_string($_POST["mail"]);
			$pass = trim($_POST["pass"]);
			if( CRYPT_MD5 == 1 )
			{
				$password = crypt('$pass','$1$fancy.!@$');
			}
			echo $password;
			$query = "SELECT `email` FROM `sign` ";
    		$result = mysqli_query($con,$query);
	    	while($row = mysqli_fetch_array($result))
	    	{
	        	if($row[0] == $mail)
	        	{
		      		echo "<script>window.alert('Email " . $mail . " already registered!!!');window.location = 'index.php';</script>";

		      		exit();
		   		 }

	 		}
			$query = "insert into sign(name,contact,email,pass) values ('$name','$mob','$mail','$password')";
			$result = mysqli_query($con,$query);
					if(!$result)
						echo "Error : " . mysqli_error($con);
					else{

						echo  "<script>window.alert('Signed up Succesfully')</script>";
					}
			}
	}

	if(!empty($_POST["login"])) {

		$mail = mysql_real_escape_string($_POST["mail"]);
		$pass = trim($_POST["pass"]);
		if( CRYPT_MD5 == 1 )
		{
			$password = crypt('$pass','$1$fancy.!@$');
		}
		echo $password;
		$query = "SELECT `id` FROM `sign` WHERE `email`='$mail' AND `pass`='$password'";
		$result = mysqli_query($con,$query);
		if(!$result)
						echo "Error : " . mysqli_error($con);
		else{
			$query_num_rows = mysqli_num_rows($result);	
		}
        if($query_num_rows==0){
         echo "<script>window.alert('Invalid UserName or Password');window.location = 'index.php';</script>";
        }
        else if($query_num_rows==1){
        	echo "<script>window.alert('SUCCESSFULLY lOGGED IN!!!');window.location = 'index1.php';</script>";
        }

	}
?>