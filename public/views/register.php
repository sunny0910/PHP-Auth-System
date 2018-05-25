<?php
require 'header.php';
?>
<title>Register</title>
</head>
<body>
<?php require 'includes/navbar.php'; ?>

<div class="registerform">
<form method='POST' id='registerformtag'>
<?php
if ($this->alert == true) {
    echo "<div class='alert alert-danger'>
          Please check your input.
          </div>";
    $this->alert = false;
}
?>
  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" name='name' class="form-control" id="name" placeholder="name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Phone</label>
    <input style="border: 1px solid #ccc;border-radius: 2px;" class='code' type='text' name='code' value='+91' disabled>
    <input style="width: 95%;" type="text" name='phone' class="form-control" if="phone" placeholder="phone">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Gender</label>
    <input type="radio" name='gender' value='Male' id="inlineRadio1" >Male
    <br>
    <input type="radio" name='gender' value='Female' id="inlineRadio2">Female
  </div>
<i class="fa fa-spinner fa-spin load" style="font-size:35px; margin-left: 50%; color: #337ab7; position: absolute;"></i>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="email" name='email' placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">UserName</label>
    <input type="text" name='username' class="form-control" id="username" placeholder="username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name='password' id="password" class="form-control" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" name='confirmpassword' class="form-control" placeholder="Confirm Password">
  </div>
  <input type="submit" class="btn btn-primary register" name='registersubmit'>
</form>

</div>
<?php
require 'footer.php';
if ($this->userExists== true) {
    echo "<script>swal('User Exists','error');</script>";
    $this->userExists =false;
}

?>
</body>