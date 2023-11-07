<?php 
if (isset($_SESSION["id"])) {
    header("Location: panel.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Panel</h1>
    <form action="../logout.php" method="post">
        <button type="submit" value="Logout" class="btn-logout">Logout</button>
    </form>
    

</body>
</html>