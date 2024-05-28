<?php

$firstname = $lastname = $email = "";
$error_message = "";


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    if (!empty($_GET["firstname"]) && !empty($_GET["lastname"]) && !empty($_GET["email"])) {
        $firstname = htmlspecialchars($_GET["firstname"]);
        $lastname = htmlspecialchars($_GET["lastname"]);
        $email = htmlspecialchars($_GET["email"]);
    } else {
        $error_message = "Please fill in all the fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
</head>
<body>
    <form action="" method="GET">
        <label for="firstname">First Name:</label><br>
        <input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>"><br>
        <label for="lastname">Last Name:</label><br>
        <input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($lastname); ?>"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
        <button type="submit">Submit</button>
    </form>

    <?php if (!empty($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php else: ?>
        <?php if (!empty($firstname) && !empty($lastname) && !empty($email)): ?>
            <h2>Output</h2>
            <p>First Name: <?php echo $firstname; ?></p>
            <p>Last Name: <?php echo $lastname; ?></p>
            <p>Email: <?php echo $email; ?></p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
