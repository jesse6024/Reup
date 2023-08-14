<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    require('db.php');
    session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])) {
        // removes backslashes
        $username = stripslashes($_POST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $password = $_POST['password'];
        // $userPassword = "";
        //Checking is user existing in the database or not
        $query = "SELECT * FROM `register` WHERE username='$username'";
        $result = mysqli_query($con, $query) or die(mysqli_error($mysql));
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;

            while ($row = mysqli_fetch_assoc($result)) {

                if (password_verify($password, $row['userPassword'])) {


                    $_SESSION['dateJoined'] = $row['dateJoined'];
                    $_SESSION['trust_level'] = $row['trust_level'];
                    $_SESSION['total_orders'] = $row['total_orders'];

                    $_SESSION['account_role'] = $row['account_role'];
                    $account_role = $_SESSION['account_role'];

                    switch ($account_role) {
                        case 'Admin':
                            header("Location: homepage.php");
                            break;
                        case 'Vendor':
                            header("Location: homepage.php");
                            break;
                        default:
                            header("Location: homepage.php");
                            break;
                    }
                } else {
                    echo "<div class='form'>
                        <h3>Username/password is incorrect.</h3>
                        <br/>Click here to <a href='login.php'>Login</a></div>";
                }
            }
        }
    } else {
    ?>
        <div class="login-banner" style="
height: 100%;
">
            <div class="login-head-container" style="
    /*border: solid 1px black;*/
    width: 60%;
    height: 20%;
    text-align: center;
    margin-top: 2%;
    margin-left: 25%;
">
 <h1 style="color: black; position: absolute; margin-top: 200px; margin-left: 20%;">REUP MARKET</h1>
                <div class="header-title" style="
    text-align: center;
    ">
                   
                </div>
            </div>
            <div class="form" style="width: 300px; margin: 0 auto; border: solid 1px black; text-align: center; margin-top: 0%; position: absolute; overflow: hidden; margin-left: 43%; margin-top: 300px;">
                <h1>Log In</h1>
                <form action="" method="post" name="login">
                    <input type="text" name="username" placeholder="Username" required />
                    <input type="password" name="password" placeholder="Password" required />

                    <input name="login_btn" type="submit" value="Login" />
                </form>
                <p>Not registered yet? <a href='register.php'>Register Here</a></p>
            </div>
        <?php } ?>
</body>

</html>