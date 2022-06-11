<?php
session_start();
    $this_login = $_GET['login'];
    $this_passwd = $_GET['passwd'];
    $submit_state = $_GET['submit'];

    if ($this_login && $this_passwd && ($submit_state === "OK"))
    {
        $_SESSION['login'] = $this_login;
        $_SESSION['passwd'] = $this_passwd;
    }
?>
<html><body>
<form action="index.php" method="get">
   Username: <input type="text" name="login" value="<?php echo $_SESSION['login'];?>" />
   <br />
   Password: <input type="password" name="passwd" value="<?php echo $_SESSION['passwd'];?>" />
<input type="submit" name="submit" value="OK" />
</form>
</body></html>