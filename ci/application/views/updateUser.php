<html>
	<head>
	   <title>Update User Data</title>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
           <?php $haveUserId =  $this->uri->segment(3);
          //  echo $haveUserId;
           ?>
		<div align="center">
			<form id="myform" method="post" action="http://localhost/task1/ci/Index.php/index/updatingUserRecord/<?php echo $haveUserId?>">
				<label>Enter First Name :</label>
				<input type="text" name="firstName" placeholder="John" pattern="^[A-Za-z ]+$" title="Use Alphabetic Letters Only" required  ><br><br>
				<label>Enter Last Name :</label>
				<input type="text" name="lastName" placeholder="William" pattern="^[A-Za-z ]+$" title="Use Alphabetic Letters Only" required ><br><br>
				<input type="submit" name="updateUserData" value="Update User">	
			</form>
		</div>
	</body>
</html>