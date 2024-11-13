<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
function userExists($username) {
    $fileUsers = fopen("Clients.csv", "r");
    if ($fileUsers) {
        //while (($line = fgetcsv($fileUsers, 0, ";")) !== false) {
            while (!feof($fileUsers)) {
                $lineString = fgets($fileUsers);
                $line = explode(";",$lineString);
            if ($line[0] == $username) {
                fclose($fileUsers);
                return true;
            }
        }
        fclose($fileUsers);
    }
    return false;
}
 
if (isset($_POST["userName"], $_POST["psw"], $_POST["pswAgain"])) {
    print("Registration in process...");
    if ($_POST["psw"] == $_POST["pswAgain"]) {
        $fileUsers = fopen("Clients.csv", "a");
        fputs($fileUsers, "\n" . $_POST["userName"] . "," . $_POST["psw"]);
    } else {
        print("Passwords do not match. Please try again!");
    }
}
?>

<h1>To register, please fill in the following form:</h1>

<form method="POST">
    <input type="text" name="userName" placeholder="Enter your username" />
    <input type="password" name="psw" placeholder="Please choose a password" />
    <input type="password" name="pswAgain" placeholder="Please retype the password" />
    <input type="submit" value="Create account" />
</form>

</body>
</html>