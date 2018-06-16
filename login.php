<?php
//include config
require_once('includes/config.php');

//REDIRECT
if( $user->isLoggedIn() ){ header('Location: index.php'); } 

//LOGIN ON SUBMIT
if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

	
	if($user->login($username,$password)){ 
        
		header('Location: home.php');
		
	
	} else {
		$error[] = 'Username or Password not found.';
	}

}//end if submit

//define page title
$title = 'COAB - Login';

//include header template
require('layout/header_login.php'); 
?>




    <main>

        <!-- Login -->
        <section class="g-height-100vh g-flex-centered g-bg-size-cover g-bg-pos-center-center g-bg-gray-light-v5" style="background-image: url(assets/img/bg/roomies.jpg)">
            <div class="container g-py-100 g-pos-rel g-z-index-1">
                <div class="row justify-content-center">
                    <div class="col-sm-8 col-lg-5">
                        <div class="g-bg-white rounded g-py-40 g-px-30">
                            <header class="text-center mb-4">

                                <img width="125" height="125" class="g-py-15 g-px-15 mb-3" src="assets/img/logo/checklogo.png" alt="">
                                <h2 class="h2 g-color-black g-font-weight-600">Login</h2>
                            </header>

                            <?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				if(isset($_GET['action'])){

					//check the action
					switch ($_GET['action']) {
						case 'active':
							echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
							break;
				
					
					}

				}

				
				?>

                                <!-- Form -->
                                <form role="form" method="post" action="" autocomplete="off" class="g-py-15">
                                    <div class="mb-4">
                                        <input type="text" name="username" id="username" placeholder="Username" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-cyan--hover rounded g-py-15 g-px-15">
                                    </div>




                                    <div class="g-mb-35">
                                        <input input type="password" name="password" id="password" placeholder="Password" tabindex="3" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-cyan--hover rounded g-py-15 g-px-15 mb-3">

                                    </div>

                                    <div class="mb-4">
                                        <button type="submit" name="submit" value="Login" tabindex="5" class="btn btn-md btn-block u-btn-cyan rounded g-py-13" type="button">Login</button>
                                    </div>
                                </form>
                                <!-- End Form -->

                                <footer class="text-center">
                                    <p class="g-bg-white g-color-gray-dark-v5 g-font-size-13 mb-0">Don't have an account? <a class="g-color-cyan g-font-weight-600" href="index.php">Sign Up</a></p>
                                </footer>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Login -->

    </main>







    <?php 
require('layout/footer.php'); 
?>