<?php
$firstname=$lastname=$email=$password = "";
$firstnameErr = $lastnameErr = $emailErr = $passwordErr = "";

function validate_form() {
    global $firstname, $lastname, $email, $password;
    global $firstnameErr, $lastnameErr, $emailErr, $passwordErr;

    if (empty($_POST["firstname"])) {
        $firstnameErr = "First name is required";
    } elseif (!preg_match("/^[a-zA-Z\s]{2,50}$/", $_POST["firstname"])) {
        $firstnameErr = "First name must be between 2 and 50 characters and contain only letters and spaces";
    } else {
        $firstname = htmlspecialchars($_POST["firstname"]);
    }

    if (empty($_POST["lastname"])) {
        $lastnameErr = "Last name is required";
    } elseif (!preg_match("/^[a-zA-Z\s]{2,50}$/", $_POST["lastname"])) {
        $lastnameErr = "Last name must be between 2 and 50 characters and contain only letters and spaces";
    } else {
        $lastname = htmlspecialchars($_POST["lastname"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    } else {
        $email = htmlspecialchars($_POST["email"]);
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } elseif (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $_POST["password"])) {
        $passwordErr = "Password must be at least 8 characters long and include at least one letter, one number, and one special character";
    } else {
        $password = htmlspecialchars($_POST["password"]);
    }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    validate_form();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <style>
        .error { color: red; }
    </style>
</head>
<body>
<form action="" method="POST">
        <label for="firstname">First Name:</label><br>
        <input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>">
        <span class="error"><?php echo $firstnameErr; ?></span><br>
        
        <label for="lastname">Last Name:</label><br>
        <input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($lastname); ?>">
        <span class="error"><?php echo $lastnameErr; ?></span><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <span class="error"><?php echo $emailErr; ?></span><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($password); ?>">
        <span class="error"><?php echo $passwordErr; ?></span><br>
        
        <button type="submit">Submit</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($firstnameErr) && empty($lastnameErr) && empty($emailErr) && empty($passwordErr)): ?>
        <h2>Output</h2>
        <p>First Name: <?php echo $firstname; ?></p>
        <p>Last Name: <?php echo $lastname; ?></p>
        <p>Email: <?php echo $email; ?></p>
        <p>Password: <?php echo str_repeat('*', strlen($password));?></p>
    <?php endif; ?>
</body>
</html>
