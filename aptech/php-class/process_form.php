<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php if (isset($_POST['submitted'])) { ?>
        <h1> Welcome <?= $_POST['name'] ?? ''; ?></h1>
        <h1> Email Id <?= $_POST['email']; ?></h1>
        <h1> Age <?= $_POST['mobile']; ?></h1>
        <h1> Gender <?= $_POST['gender']; ?></h1>
        <h1> City <?= $_POST['country']; ?></h1>
    <?php } ?>
</body>
</html>