<?php
require 'header.php';
?>
<title>Home</title>
</head>
<body>
<?php require 'includes/navbar.php';?>
<?php if ($_SESSION['count']==1) {?>
<div class='loginbox'><p>You Are Successfully Logged IN!</p></div>
<?php  } $_SESSION['count']=0;
    ?>
<div class='homepara'>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus elementum

vehicula est vitae sollicitudin. Ut pulvinar ultricies posuere. Integer

ac iaculis dui, vel rhoncus erat. In tortor nisl, vulputate quis ante

vel, vestibulum luctus nunc. Phasellus id lectus ante. Vivamus ultrices,

nunc ut sollicitudin hendrerit, leo tellus lacinia nulla, at porta orci

orci eget eros. Nullam id ullamcorper mauris, sit amet cursus risus.

Nullam a commodo metus, et facilisis velit. Maecenas volutpat mattis

odio vel dignissim. Etiam ac fringilla diam, suscipit sodales ipsum. Nam

in velit quam. Nunc luctus tempor leo, vel rhoncus mi mattis nec. Lorem

ipsum dolor sit amet, consectetur adipiscing elit. Nullam felis massa,

ultrices sit amet turpis vel, accumsan blandit est. Etiam nec eros

commodo, cursus turpis pulvinar, volutpat odio.</p>

<?php
if ($this->logged) { ?>

<p>
Sed vitae turpis ac nisi malesuada blandit. Quisque eu molestie eros. Donec

facilisis hendrerit augue, eu adipiscing sem lacinia non. Integer

sodales purus odio, non pharetra massa accumsan in. In vitae nunc non

erat posuere tempus a id ipsum. Suspendisse enim augue, bibendum eget

nunc in, lacinia ultrices tortor. Nam enim lorem, gravida eget varius

eu, euismod et purus. Etiam egestas sem eu nisi porttitor pharetra.

Donec eu libero eu lorem convallis porta. Nullam interdum vitae lorem

sit amet dignissim. Proin sit amet tortor ac odio varius dapibus nec at

Sem.
</p>

<div class='editbuttons'>
<a href='/editaccount'><button type="button" class="btn btn-primary" >Edit Account</button></a>
<a href='/logout'><button type="button" class="btn btn-primary" >Logout</button></a>
</div>

<?php } ?>
<?php
if (!$this->logged) {
?>
</div>
<div class='homebuttons'>
<a href='/login'><button type="button" class="btn btn-primary" >Login</button></a>
<a href='/register'><button type="button" class="btn btn-primary" >Register</button></a>
</div>
<?php }
require 'footer.php';
?>
