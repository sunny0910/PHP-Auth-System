<?php
namespace PHP\includes;

use PHP\controllers\Logincontroller;
$loggedin = new Logincontroller;
?>

<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="#">PHP Task</a></li>
  <li role="presentation"><a href="/home">Home</a></li>
  <?php
    if ($loggedin->isLoggedin()) {
  ?>
  <li role="presentation" id='logout' class='active'><a href="/logout"><span class="fa fa-sign-out"></span>Logout</a></li>
  <?php
    }
  ?>
</ul>
<br>
<br>