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

    <form action="http://localhost/task1/ci/Index.php/index/signUpUser" method="post">
        <div class="container">
            <h2 align="center">Signup User</h2>
            <label><b>First Name</b></label>
            <input type="text" placeholder="John" pattern="^[A-Za-z ]+$" title="Use Alphabetic Letters Only" name="fname" required>
            <label><b>Last Name</b></label>
            <input type="text" placeholder="William" pattern="^[A-Za-z ]+$" title="Use Alphabetic Letters Only" name="lname" required>
            <label><b>Email</b></label>
            <input type="email" placeholder="abc@example.com" name="email" required>
            <label><b>Password</b></label>
            <input type="password" placeholder="Password" name="psw" required>
            <button type="submit" class="signupbtn">Sign Up</button>
        </div>
    </form>
</body>
</html>
