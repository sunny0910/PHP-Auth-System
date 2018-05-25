<?php
require 'header.php';
?>
<title>Login</title>
</head>
<body>
<?php require 'includes/navbar.php'; ?>
<div class='loginform'>
    <form method='POST' class='loginformtag' >

<div class="form-group">
    <label for="exampleInputEmail1">UserName</label>
    <input type="text" name='username' class="form-control" id="exampleInputUserName" placeholder="username">
</div>

<div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>
    <input type="submit" class="btn btn-primary" name='loginsubmit' value='Submit'>
    <input type="button" class='btn btn-info forget' name='forgetpassword' value="Forget Password">
    <br>
<i class="fa fa-spinner fa-spin load" style="font-size:35px; margin-left: 50%; color: #337ab7;"></i>
    </form>
    <div class='forgettab'>
        <input class='text' type="email" name='email' placeholder='Email-Id'>
        <input type="submit" class='btn btn-primary email' name='sendpassword' value='Send me password'>
    </div>
</div>
<?php
require 'footer.php';
if (isset($error)) {
    echo "<script> swal('login failed','".$error."','error');</script>";
}
    ?>

</body>
