<?php
$this_login = $_POST['login'];
$this_passwd = $_POST['oldpw'];
$new_passwd = $_POST['newpw'];
$submit_state = $_POST['submit'];
$folder = "../private";
$file_path = "../private/passwd";
$found = FALSE;

if ($this_login && $this_passwd && $new_passwd && $submit_state && ($submit_state === "OK") && (file_exists($file_path)))
{
$file_contents = unserialize(file_get_contents($file_path));
foreach ($file_contents as $key => $value)
    {
        if (($value['login'] === $this_login) && ($value['passwd'] === hash('whirlpool', $this_passwd)))
        {
            $found = TRUE;
            $file_contents[$key]['passwd'] = hash('whirlpool', $new_passwd);
        }
    }
    if ($found)
    {
        file_put_contents($file_path, serialize($file_contents));
        echo "OK\n";
    }
    else
        echo "Error\n";
}
else
    echo "Error\n";
?>
