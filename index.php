<?php include('includes/dbh.inc.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <title>Recepten CMS</title>
</head>

<body>
    <h1>Recepten</h1>
    <form action="includes/formhandler.inc.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="text" name="email" placeholder="E-Mail">
        <button>SignUp</button>
    </form>
</body>

</html>