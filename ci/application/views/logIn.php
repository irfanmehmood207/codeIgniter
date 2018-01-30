<!DOCTYPE html>
<html>
<style>
/* Full-width input fields */
input[type=text], input[type=password], input[type=email] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
	align : center;
}

/* Float cancel and signup buttons and add an equal width */
.signupbtn {

    width: 25%;
	align : center;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

</style>
	<body>
        <div class="container">
            <h2 align="center">Login User</h2>
           <form id="myform" method="post" action="http://localhost/task1/ci/Index.php/index/login">
			    <label><b>Email</b></label>
                <input type="email" placeholder="abc@example.com" name="email" required>
                <label><b>Password</b></label>
                <input type="password" placeholder="Password" name="password" required>
                <button type="submit" class="signupbtn">Log In</button>
			</form>
		</div>
		<div align="center">
		   <h4><a href="http://localhost/task1/ci/Index.php/index/forgetPasswordView"><b>forget Password ?</b></a></h4> 
	    </div>
	</body>
</html>	