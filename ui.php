<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $branch = $_POST["branch"];
    $output = shell_exec("php dbexec.php");
    echo "Backup process started for branch: $branch\n";
    echo $output;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="styles.css" rel="stylesheet">
    <title>Backup Trigger</title>
</head>
<body>
    <form method="POST" action="">
        <label for="branch">Branch:</label>
        <input type="text" id="branch" name="branch"><br>
        <input type="submit" value="Trigger Backup">
    </form>
</body>
</html>