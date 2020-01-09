<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
    <title>adminpage</title>
</head>

<body>
    <div class="jumbotron mb-0">
        <h2 class=" display-4">API admin</h2>
        <p class="lead">This is a simple jumbotron-style component for loggin into the adminpage.</p>
        <hr class="my-4">
        <p>This page will be useless without the admin password...<p>
                <form method="POST" action="admin.php" autocomplete="off">
                    <div class="md-form col-md-4">
                        <input type="text" name="password" id="form1" class="form-control">
                        <label for="form1">password</label>
                        <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>
                    </div>
                </form>
    </div>
    <div class="bg"></div>

    <style>
        body,
        html {
            height: 100%;
            overflow: hidden;
        }

        .bg {
            background-image: url("test.jpg");
            height: 100vh;
            background-position: bottom;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>


    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>
</body>

</html>