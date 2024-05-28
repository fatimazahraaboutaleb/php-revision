<?php

$firstname = $lastname = $email = "";
$firstname_error = $lastname_error = $email_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;

    if (empty($_POST["firstname"])) {
        $firstname_error = "First name is required";
        $valid = false;
    } else {
        $firstname = htmlspecialchars($_POST["firstname"]);
    }

    if (empty($_POST["lastname"])) {
        $lastname_error = "Last name is required";
        $valid = false;
    } else {
        $lastname = htmlspecialchars($_POST["lastname"]);
    }

    if (empty($_POST["email"])) {
        $email_error = "Email is required";
        $valid = false;
    } else {
        $email = htmlspecialchars($_POST["email"]);
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
    <form action="" method="POST">
        <label for="firstname">First Name:</label><br>
        <input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>"><br>
        <span style="color: red;"><?php echo $firstname_error; ?></span><br>
        
        <label for="lastname">Last Name:</label><br>
        <input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($lastname); ?>"><br>
        <span style="color: red;"><?php echo $lastname_error; ?></span><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
        <span style="color: red;"><?php echo $email_error; ?></span><br>
        
        <button type="submit">Submit</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $valid): ?>
        <h2>Output</h2>
        <p>First Name: <?php echo $firstname; ?></p>
        <p>Last Name: <?php echo $lastname; ?></p>
        <p>Email: <?php echo $email; ?></p>
    <?php endif; ?>
</body>
</html>
