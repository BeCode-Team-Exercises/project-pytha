<form action="#" method="post" autocomplete="off">
    <ul>
        <li>
            <label for="name">name</label>
            <input type="text" name=":user" autocomplete="off">
        </li>
        <li>
            <label for="name">password</label>
            <input type="password" name=":pass" autocomplete="off">
        </li>
    </ul>
    <button type="submit">set password</button>
</form>
<?php

if (array_key_exists(':pass', $_POST)) {
    $pass = $_POST[':pass'];
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $_POST[':pass'] = $pass;
    $pdo = new PDO('mysql:host=192.168.139.125;dbname=api;port=3306', 'user', 'pythauser');
    $connection = $pdo->prepare("INSERT INTO api.login (`user`, pass) VALUES(:user, :pass)");
    foreach (array_keys($_POST) as $item) {
        $connection->bindParam($item, $_POST[$item]);
    };
    $connection->execute();
}
