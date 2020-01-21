<?php
// set ip white-list & get user ip
$isAllowed = ['192.168.139.192' => 'jasper', '192.168.139.177' => 'reinaert', '192.168.139.229' => 'jan', '::1' => 'localhost', '192.168.139.112' => 'stijn', '' => 'adel'];
$clientIP = $_SERVER['REMOTE_ADDR'];

// check if user is allowed and execute code if allowed
if (array_key_exists($clientIP, $isAllowed)) {

    // check if user forgot password
    if (array_key_exists('pass', $_POST) && !$_POST['pass'] == '') {

        // fetch user from database
        $user = $_POST['user'];
        $pdo = new PDO('mysql:host=192.168.139.125;dbname=api;port=3306', 'user', 'pythauser');
        $connection = $pdo->query("SELECT id, `user`, pass FROM api.login WHERE user='$user';");

        // check user database password hash
        while ($row = $connection->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($_POST['pass'], $row['pass'])) {

                if (array_key_exists('for', $_POST)) {
                    $connection = $pdo->prepare("INSERT INTO api.keys (`for`, 'key') VALUES(:for, :key)");
                    $connection->bindParam(':for', $_POST['for']);
                    $connection->bindParam(':key', $_POST['key']);
                    $connection->execute();
                }
                // echo 'yay';
            }
            // message for wrong password
            else {
                echo 'whoops wrong password! <a href="../admin">go back</a>';
                die;
            }
        }
    }
    // message to clarify that the user did not enter a password
    else {
        echo "user is $isAllowed[$clientIP] with ip $clientIP and forgot to enter password? ";
        echo '<a href="../admin">go back</a>';
        die;
    }
}
// if user is not whitelisted kill the script
else {
    die;
}


// create api string
$key = implode('-', str_split(substr(strtolower(md5(microtime() . rand(1000, 9999))), 0, 30), 6));



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <title>database exercise</title>
</head>

<body>
    <div class="container">
        <h1>API-key manager</h1>
        <legend>Current api keys in use</legend>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Used for</th>
                    <th scope="col">Key</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php


                var_dump($_POST);

                ?>
            </tbody>
        </table>
        <form method="post">
            <fieldset>
                <legend>Add a new api key</legend>
                <div class="form-row">
                    <div class="form-group col">
                        <label>What will this key be used for</label>
                        <input type="text" name="for" class="form-control" required>
                    </div>
                    <div class="form-group col">
                        <label>API-key</label>
                        <input type="text" name="key" class="form-control" <?php echo 'value="' . $key . '"'; ?>>
                    </div>
                    <div class="col-1">
                        <label>add key</label>
                        <button type="submit" class="btn btn-primary">add</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</body>

</html>
<?php

if (array_key_exists('for', $_POST)) {
    var_dump($_POST);
}

?>