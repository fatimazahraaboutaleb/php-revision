<?php
$firstname = $lastname = $email = $password = "";
$errors = [];

function validate_form() {
    global $firstname, $lastname, $email, $password, $errors;

    if (empty($_POST["firstname"])) {
        $errors["firstname"] = "First name is required";
    } elseif (!preg_match("/^[a-zA-Z\s]{2,50}$/", $_POST["firstname"])) {
        $errors["firstname"] = "First name must be between 2 and 50 characters and contain only letters and spaces";
    } else {
        $firstname = htmlspecialchars($_POST["firstname"]);
    }

    if (empty($_POST["lastname"])) {
        $errors["lastname"] = "Last name is required";
    } elseif (!preg_match("/^[a-zA-Z\s]{2,50}$/", $_POST["lastname"])) {
        $errors["lastname"] = "Last name must be between 2 and 50 characters and contain only letters and spaces";
    } else {
        $lastname = htmlspecialchars($_POST["lastname"]);
    }

    if (empty($_POST["email"])) {
        $errors["email"] = "Email is required";
    } else {
        $email = htmlspecialchars($_POST["email"]);
    }

    if (empty($_POST["password"])) {
        $errors["password"] = "Password is required";
    } elseif (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $_POST["password"])) {
        $errors["password"] = "Password must be at least 8 characters long and include at least one letter, one number, and one special character";
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
        .error-list { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <form action="" method="POST">
        <!-- <?php if (!empty($errors)): ?> 
            <div class="error-list">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>-->

        <label for="firstname">First Name:</label><br>
        <input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>"><br>
        <span class="error"><?php echo isset($errors["firstname"]) ? $errors["firstname"] : ''; ?></span><br>

        <label for="lastname">Last Name:</label><br>
        <input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($lastname); ?>"><br>
        <span class="error"><?php echo isset($errors["lastname"]) ? $errors["lastname"] : ''; ?></span><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
        <span class="error"><?php echo isset($errors["email"]) ? $errors["email"] : ''; ?></span><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($password); ?>"><br>
        <span class="error"><?php echo isset($errors["password"]) ? $errors["password"] : ''; ?></span><br>

        <button type="submit">Submit</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)): ?>
        <h2>Output</h2>
        <p>First Name: <?php echo $firstname; ?></p>
        <p>Last Name: <?php echo $lastname; ?></p>
        <p>Email: <?php echo $email; ?></p>
        <p>Password: <?php echo str_repeat('*', strlen($password)); ?></p>
    <?php endif; ?>
</body>
</html>
