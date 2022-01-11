<?php

?>
<!doctype html>
<html lang="en">
<title>
    Handler
</title>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .container {
            width: 400px;
        }
    </style>
    <title></title>
</head>
<body style="padding-top: 3rem;">

<div class="container">
    <?php
    $pathToDatabase = "C:\Users\Danylo\WebstormProjects\webdev\assets\public\databases\users.csv";

    if (!file_exists($pathToDatabase)) {
        echo "<article class='redText'>Database file doesn't exist</article>";
    }

    $csv = str_getcsv(str_replace("\n", ",", file_get_contents($pathToDatabase)));

    for ($i = 0; $i < count($csv); $i += 4) {
        $users[($i)/3] = [
                'name'      => $csv[$i],
                'email'     => $csv[$i+1],
                'gender'    => $csv[$i+2],
                'filePath'  => $csv[$i+3]
                ];
    }

    echo "<table>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Gender</th>";
    echo "<th>Image</th>";
    echo "<tr>";
    for ($i = 0; $i < count($users); $i++) {
        if (!empty($users[$i]['email'])) {
            echo "<tr>";
            echo "<td>" . $users[$i]['name'] . "</td>";
            echo "<td>" . $users[$i]['email'] . "</td>";
            echo "<td>" . $users[$i]['gender'] . "</td>";
            $myFile = pathinfo($users[$i]['filePath']);
            if ($users[$i]['filePath'] == "")
                $myFile['basename'] = "Default.png";
            echo "<td>" . "<img src='" . "assets/public/images//" . $myFile['basename'] . "' alt='' width='50' height='50'" . "</td>";
            echo "</tr>";
        }
    }
    echo "</table>";
    echo "<br><br>"
    ?>

    <a class="btn" href="adduser.php">return back</a>
</div>
</body>
</html>
