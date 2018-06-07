<?php require('includes/config.php');

//REDITECT
if( $user->isLoggedIn() ){ header('Location: home.php'); }

if(isset($_POST['submit'])){

	// BASIC FORM VALIDATION (Github -> David Carr)
	if(strlen($_POST['username']) < 3){
		$error[] = 'Username is too short.';
	} else {
		$statement = $db->prepare('SELECT username FROM users WHERE username = :username');
		$statement->execute(array(':username' => $_POST['username']));
		$result = $statement->fetch(PDO::FETCH_ASSOC);

		if(!empty($result['username'])){
			$error[] = 'Username is already in use.';
		}

	}

	if(strlen($_POST['password']) < 3){
		$error[] = 'Password is too short.';
	}

	if(strlen($_POST['passwordConfirm']) < 3){
		$error[] = 'Confirm password is too short.';
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = 'Passwords do not match.';
	}


	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Please enter a valid email address';
	} else {
		$statement = $db->prepare('SELECT email FROM users WHERE email = :email');
		$statement->execute(array(':email' => $_POST['email']));
		$result = $statement->fetch(PDO::FETCH_ASSOC);

		if(!empty($result['email'])){
			$error[] = 'Email provided is already in use.';
		}

	}


	//NO ERRORS 
	if(!isset($error)){

		//HASH PASSWORD
		$password = $_POST['password'];
            $options = [
                    'cost' => 12,
                ];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT, $options);
      

		try {

			$statement = $db->prepare('INSERT INTO users (username,password,email,picture,type) VALUES (:username, :password, :email, :picture, :type)');
			$statement->execute(array(
				':username' => $_POST['username'],
				':password' => $hashedPassword,
				':email' => $_POST['email'],
                ':picture' => "user.jpg",
                ':type' => "Roommate"
			));
            
		
			header('Location: index.php?action=registrated');
			exit;

		//CATCH ERROR
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}

//define page title
$title = 'COAB - Signup';

//include header template
require('layout/header_login.php');
?>



    <main>
        <!-- Signup -->
        <section class="g-height-100vh g-flex-centered g-bg-size-cover g-bg-pos-center-center g-bg-gray-light-v5" style="background-image: url(assets/img/bg/roomies.jpg);">
            <div class="container g-py-50 g-pos-rel g-z-index-1">
                <div class="row justify-content-center u-box-shadow-v24">
                    <div class="col-sm-10 col-md-9 col-lg-6">
                        <div class="g-bg-white rounded g-py-40 g-px-30">
                            <header class="text-center mb-4">
                                <img width="125" height="125" class="g-py-15 g-px-15 mb-3" src="assets/img/logo/checklogo.png" alt="">
                                <h2 class="h2 g-color-black g-font-weight-600">Sign Up</h2>
                            </header>

                            <?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				//if action is joined show sucess
				if(isset($_GET['action']) && $_GET['action'] == 'registrated'){
					echo "<h2 class='text-center bg-success'>Registration Succesful!</h2>";
				}
				?>



                                <!-- Form -->
                                <form role="form" method="post" action="" autocomplete="off" class="g-py-15">

                                    <div class="mb-4">

                                        <input type="text" name="username" id="username" placeholder="Username" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15">

                                    </div>

                                    <div class="mb-4">
                                        <input type="email" name="email" id="email" placeholder="Email Address" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="2" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15">
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 mb-4">
                                            <input type="password" name="password" id="password" placeholder="Password" tabindex="3" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15">
                                        </div>

                                        <div class="col-xs-12 col-sm-6 mb-4">
                                            <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Confirm Password" tabindex="4" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15">
                                        </div>
                                    </div>

                                    <div class="row justify-content-between mb-5">

                                        <div class="col align-self-center">
                                            <button type="submit" name="submit" value="Register" tabindex="5" class="btn btn-md btn-block u-btn-cyan rounded g-py-13" type="button">Create Account</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- End Form -->

                                <footer class="text-center">
                                    <p class="g-bg-white g-color-gray-dark-v5 g-font-size-13 mb-0">Already have an account? <a class="g-color-cyan g-font-weight-600" href="login.php">Login</a></p>
                                </footer>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Signup -->
    </main>



    <?php

require('layout/footer.php');
?>