<?php
// set ip whitelist
$isAllowed = ['192.168.139.192' => 'jasper', '192.168.139.177' => 'reinaert', '192.168.139.229' => 'jan', '::1' => 'localhost', '192.168.139.112' => 'stijn', '' => 'adel'];
// get current user ip
$clientIP = $_SERVER['REMOTE_ADDR'];
// check if user is allowed and execute code if allowed
if (array_key_exists($clientIP, $isAllowed)) {
    if (array_key_exists('password', $_POST)) {
        if (!$_POST['password'] == '') {
            echo $_POST['password'];

            $pdo = new PDO('mysql:host=192.168.139.125;dbname=api;port=3306', 'user', 'user');
            $test = $pdo->query("SELECT id, `user`, pass FROM api.login WHERE id=3;");
            if ($test->rowCount() > 0) {
                while ($row = $test->fetch(PDO::FETCH_ASSOC)) {
                    var_dump($row);
                }
            }
            // $dataBase = $pdo->prepare("SELECT id, `user`, pass FROM api.login WHERE id=3;");
            // foreach (array_keys($_POST) as $item) {
            //     $dataBase->bindParam($item, $_POST[$item]);
            // };
            // $dataBase->execute();
            // $dataBase->fetch(PDO::FETCH_ASSOC);
            // echo ($dataBase);
        } else {
            echo "user is $isAllowed[$clientIP] with ip $clientIP and forgot to enter password?";
        }
    }
    // message to clarify that the user did not enter a password
}
// if user is not allowed kill the script
else {
    echo '<img src="https://i.ytimg.com/vi/xeSrypE4Mis/hqdefault.jpg">';
    die;
}
