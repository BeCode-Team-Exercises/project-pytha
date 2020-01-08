<?php
if (array_key_exists('password', $_POST)) {
    echo $_POST['password'];
} else {
    echo '<img src="https://i.ytimg.com/vi/xeSrypE4Mis/hqdefault.jpg">';
    die;
}
