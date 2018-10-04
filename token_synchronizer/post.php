<?php

	if(isset($_POST['uname']) && isset($_POST['psw']))
	{
		$uname=$_POST['uname'];
		$psw=$_POST['psw'];

		if (($uname=='thara') && ($psw=='123'))
		{
			//echo "LOGIN SUCCESSFUL.";	
		}

		else
		{
			echo "INVALID LOGIN. PLEASE TRY AGAIN.";
			exit();
		}

	}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Cross Site Request Foregery Protection using Synchronizer Token Patterns</title>
	<link rel="stylesheet" href="styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	$(document).ready(function()
	{
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() 
		{
			if (this.readyState == 4 && this.status == 200) 
			{
				document.getElementById("csrf_token_hidden").setAttribute('value', this.responseText) ;
			}
	
		};
	
		xhttp.open("GET", "csrf_token_gen.php", true);
		xhttp.send();
	});
	</script>
</head>

<body>

<div class="container">
  <form action="post_results.php" method="post">

    <label for="fname"><b>Name<b></label>
    <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

    <label for="post">Post</label>
    <textarea id="post" name="post" placeholder="Write something.."  required></textarea>

    <input type="submit" value="Submit" class="postbtn">
	
	<input type="hidden" name="csrf_token" value="" id="csrf_token_hidden"/>

  </form>
</div>

</body>

</html>