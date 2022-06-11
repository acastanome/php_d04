<?php
$this_login = $_POST['login'];
$this_passwd = $_POST['passwd'];
$submit_state = $_POST['submit'];
$folder = "../private";
$file_path = "../private/passwd";
$found = FALSE;

if ($this_login && $this_passwd && $submit_state && ($submit_state === "OK"))
{
    if (!file_exists($folder))
        mkdir($folder);
    if (!file_exists($file_path))
        file_put_contents($file_path, null);
    $file_contents = unserialize(file_get_contents($file_path));
    if ($file_contents)
    {
        foreach ($file_contents as $key => $value)
        {
            if ($value['login'] === $this_login)
                $found = TRUE;
        }
    }
    if ($found === TRUE)
        echo "Error\n";
    else
    {
        $one['login'] = $this_login;
        $one['passwd'] = hash('whirlpool', $this_passwd);
        $file_contents[] = $one;
        file_put_contents($file_path, serialize($file_contents));
        echo "OK\n";
    }
}
else
    echo "Error\n";
?>
