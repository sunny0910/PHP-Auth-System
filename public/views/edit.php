<?php
require 'header.php';
?>
<title>Edit Account</title>
</head>
<body>
<?php require 'includes/navbar.php'; ?>
<div class="registerform">
<form method='POST' id='editformtag'>
  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" name='name' class="form-control" id="exampleInputName" value= "<?php echo $this->user['name'];?>" >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Phone</label>
    <input style="border: 1px solid #ccc;border-radius: 2px;" class='code' type='numeric' name='code' value='+91' disabled>
    <input style="width: 95%;" type="numeric" name='phone' class="form-control" id="exampleInputEmail1" value="<?php echo $this->user['phone'];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Gender</label>
    <input type="radio" name='gender' value='Male' id="inlineRadio1" <?php echo ($this->user['gender']=='Male')? 'checked':'notchecked'; ?> >Male
    <input type="radio" name='gender' value='Female' id="inlineRadio1"  <?php echo ($this->user['gender']=='Female')? 'checked':'notchecked'; ?> >Female
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name='email' id="exampleInputEmail1" value="<?php echo $this->user['email'];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">UserName</label>
    <input type="text" name='username' class="form-control" id="exampleInputUserName" value="<?php echo $this->user['username'];?>" disabled>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name='ep' class="form-control" id='epassword' id="exampleInputPassword1" placeholder="New Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" name='ecp' class="form-control" id="exampleInputPassword1" placeholder='Confirm Password'>
  </div>
  <input type="submit" class="btn btn-primary" name='editsubmit'>

</form>
</div>
<?php
require 'footer.php';
if ($success == true) {
    echo "<script> swal('success','Account Edited','success');</script>";
    $success= false;
}
?>
</body>