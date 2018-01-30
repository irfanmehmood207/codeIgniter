<head>
    <style>
        input[type=email], input[type=submit] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post" action="http://localhost/task1/ci/Index.php/index/pwdRecovery">
			<label><b>Password Recovery</b></label>
            <input type="email" placeholder="abc@example.com" name="email" required>
			<input type="submit" class="btn btn-primary" value="Reset" />
	     </form>
    </div>
</body>