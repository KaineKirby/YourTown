<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$userLog = false;
if(isset($_SESSION["username"])) {
  $userLog = true;
}
?>

<div class="topNav">
    <ul>
        <li class="title"><h2>Welcome to Bowling Green</h2></li>
        <li><a class="<?php if (basename($_SERVER['PHP_SELF']) == "index.php") echo "active" ; ?>" href="index.php">Home</a></li>
        <li><a class="<?php if (basename($_SERVER['PHP_SELF']) == "visit.php") echo "active" ; ?>" href="visit.php" id="tToQ">Visit here</a></li>
        <li><a class="<?php if (basename($_SERVER['PHP_SELF']) == "eat.php") echo "active" ; ?>" href="eat.php" id="tToS">Eat here</a></li>
        <li><a class="<?php if (basename($_SERVER['PHP_SELF']) == "living.php") echo "active" ; ?>" href="living.php" id="tToA">Live here</a></li>
        <?php if($userLog == false) { ?>
          <li class="right"><a class="<?php if (basename($_SERVER['PHP_SELF']) == "register.php") echo "active" ; ?>" href="register.php">Register</a></li>
          <li class="right"><a class="<?php if (basename($_SERVER['PHP_SELF']) == "login.php") echo "active" ; ?>" href="login.php">Login</a></li>
        <?php } else { ?>
          <li class="right"><a class="<?php if (basename($_SERVER['PHP_SELF']) == "logout.php") echo "active" ; ?>" href="php/logout.php">Logout</a></li>
        <?php } ?>
    </ul>
</div>