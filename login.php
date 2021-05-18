<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'cscamp';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if(isset($_SESSION['loggedin'])){
    header('Location: volunteer.php');
    exit;
}

require_once 'google-api/vendor/autoload.php';

// Creating new google client instance
$client = new Google_Client();

// Enter your Client ID
$client->setClientId('138252252921-q5q21h8jt087qjokegdsm987rvm9uick.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('Z309SciSXgDimkyCfrBuk6y-');
// Enter the Redirect URL
$client->setRedirectUri('https://784b8d299f1f.ngrok.io/login.php');

// Adding those scopes which we want to get (email & profile Information)
$client->addScope("https://www.googleapis.com/auth/userinfo.email");
$client->addScope("https://www.googleapis.com/auth/plus.login");
$client->addScope("https://www.googleapis.com/auth/userinfo.profile");
$client->addScope("https://www.googleapis.com/auth/plus.me");

if(isset($_GET['code'])):

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if(!isset($token["error"])){

        $client->setAccessToken($token['access_token']);

        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
    
        // Storing data into database
        $id = mysqli_real_escape_string($con, $google_account_info->id);
        $full_name = mysqli_real_escape_string($con, trim($google_account_info->name));
        $email = mysqli_real_escape_string($con, $google_account_info->email);
        $profile_pic = mysqli_real_escape_string($con, $google_account_info->picture);

        // checking user already exists or not
        $get_user = mysqli_query($con, "SELECT vol_id FROM users WHERE vol_id=$id");      
        if(mysqli_num_rows($get_user) > 0){
			session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['vol_id'] = $id; 
            header('Location: volunteer.php');
            exit;

        }
        else{

            // if user not exists we will insert the user
            $insert = mysqli_query($con, "INSERT INTO `users`(`vol_id`,`name`,`email`,`profile_image`) VALUES (".$id.", '".$full_name."', '".$email."', '".$profile_pic."')");
			echo "<p>".$insert."</p>" ;
            if($insert){
				session_regenerate_id();
				$_SESSION['loggedin'] = TRUE;
				$_SESSION['vol_id'] = $id; 
				header('Location: volunteer.php');
                exit;
            }
            else{
                echo "Sign up failed!(Something went wrong).";
            }

        }

    }
    else{
        header('Location: login.php');
        exit;
    }
    
else: 
    // Google Login Url = $client->createAuthUrl(); 
?>


<!DOCTYPE html>
<html>
	<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Login</title>
		<link rel="stylesheet" href="login.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
		
		<div class="login">
			<h1>Login</h1>
			<form action="authenticate.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
                
                <a href="register.html">Create an Account</a>
				<a class="btn btn-lg btn-google btn-block text-uppercase" href="<?php echo $client->createAuthUrl(); ?>"><i class="fab fa-google mr-2"></i> Sign in with Google</a>
                     <?php endif; ?>

			</form>
		</div>
	</body>
</html>