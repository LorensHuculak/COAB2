<?php 

$userspic = new User($db);
$item = $userspic->getProfilePicture();
$uid = $_SESSION['usersID'];
$users = new User($db);

$users = $users->getSingleUser($uid);
  if (!empty($_POST)) {
      
            $updateUser = new User($db);
      
            

        $updateUser->setHousehold($_POST['gezin']);
        $updateUser->setArea($_POST['oppervlakte']);
      
      if (isset($_POST['beheerder'])) {
                $updateUser->setAdmin(1);
          
      } else {
          
          $updateUser->setAdmin(0);
      }

      
    $updateUser->editHousehold();
   
      header("Refresh:0");

           
  }
    



?>


    <div class="col g-ml-45 g-ml-0--lg g-pb-65--md ">
        <div class="g-pa-20 ">
            <div class="row ">
                <div class="col-md-3 g-mb-30 g-mb-0--md ">
                    <div class="h-100 g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-15 g-pa-20--md ">
                        <!-- User Information -->
                        <section class="text-center g-mb-30 g-mb-50--md ">
                            <div class="d-inline-block g-pos-rel g-mb-20 ">

                                <img class="g-width-200 img-fluid rounded-circle " src="assets/img/uploads/<?php echo htmlspecialchars($item[0]['picture']);?>" alt="Image description ">
                            </div>

                            <h3 class="g-font-weight-300 g-font-size-20 g-color-black mb-0 "><?php 
                  $username = htmlspecialchars($_SESSION["username"]);
                  echo $username; 
                  
                
?></h3>
                        </section>
                        <!-- User Information -->

                        <!-- Profile Completion
                                        <section class="g-mb-30 g-mb-50--md ">
                                            <h4 class="media h6 g-font-weight-400 g-mb-15 ">
			<span class="d-flex align-self-center g-color-gray-dark-v6 ">Profile Completion</span>
			<span class="media-body align-self-center text-right g-color-gray-dark-v6 ">75%</span>
		</h4>

                                            <div class="progress g-height-4 g-rounded-2 ">
                                                <div class="progress-bar g-bg-lightblue-v4 g-rounded-3 " role="progressbar " style="width: 60% " aria-valuenow="60 " aria-valuemin="0 " aria-valuemax="100 "></div>
                                            </div>
                                        </section>
                                        <!-- End Profile Completion -->

                        <!-- Profile Sidebar -->
                        <section>
                            <ul class="list-unstyled mb-0 ">
                                <li class="g-brd-top g-brd-gray-light-v7 mb-0 ">
                                    <a class="d-flex align-items-center u-link-v5 g-parent g-py-15  " href="profile.php">
                                        <span class="g-font-size-18 g-color-gray-light-v6 g-color-primary--parent-hover g-color-primary-v3--parent-active g-mr-15 ">
						<i class="hs-admin-user "></i>
					</span>
                                        <span class="g-color-gray-dark-v6 g-color-primary--parent-hover g-color-primary--parent-active ">Profile Information</span>
                                    </a>
                                </li>


                                <li class="g-brd-top g-brd-gray-light-v7 mb-0 ">
                                    <a class="d-flex align-items-center u-link-v5 g-parent g-py-15 " href="profile_residence.php">
                                        <span class="g-font-size-18 g-color-gray-light-v6 g-color-primary-v3--parent-hover g-color-primary-v3--parent-active g-mr-15 ">
						<i class="hs-admin-home "></i>
					</span>
                                        <span class="g-color-gray-dark-v6 g-color-primary--parent-hover g-color-primary--parent-active ">Residential Information</span>
                                    </a>
                                </li>



                                <li class="g-brd-top g-brd-gray-light-v7 mb-0 ">
                                    <a class="d-flex align-items-center u-link-v5 g-parent g-py-15 active" href="profile_invite.php">
                                        <span class="g-font-size-18 g-color-gray-light-v6 g-color-primary-v3--parent-hover g-color-primary-v3--parent-active g-mr-15 ">
						<i class="hs-admin-announcement "></i>
					</span>
                                        <span class="g-color-gray-dark-v6 g-color-primary--parent-hover g-color-primary--parent-active ">Invite Members</span>
                                    </a>
                                </li>

                            </ul>
                        </section>
                        <!-- End Profile Sidebar -->
                    </div>

                </div>

                <div class="col-md-9 ">
                    <div class="h-100 g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-15 g-pa-20--md ">
                        <form enctype="multipart/form-data" method="post" class="g-pa-30 g-mb-30">
                            <header>
                                <h2 class="text-uppercase g-font-size-12 g-font-size-default--md g-color-black mb-0 ">Send an Invitation</h2>
                            </header>

                            <hr class="d-flex g-brd-gray-light-v7 g-my-15 g-my-30--md ">

                            <div class="row g-mb-20 ">
                                <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md ">
                                    <label class="mb-0 " for="#firstName ">Member Name</label>
                                </div>

                                <div class="col-md-9 align-self-center ">
                                    <div class="form-group g-pos-rel mb-0 ">
                                        <span class="g-pos-abs g-top-0 g-right-0 d-block g-width-40 h-100 opacity-0 g-opacity-1--success ">
                          <i class="hs-admin-check g-absolute-centered g-font-size-default g-color-lightblue-v3 "></i>
                        </span>
                                        <input id="username" name="gezin" class="form-control form-control-md g-color-gray-dark-v8 g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12 " type="text " placeholder="Enter Name" required="required " data-msg="This field is mandatory " data-error-class="u-has-error-v3 " data-success-class="has-success " aria-required="true ">

                                    </div>
                                </div>
                            </div>

                            <div class="row g-mb-20 ">
                                <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md ">
                                    <label class="mb-0 " for="#firstName ">Member Email</label>
                                </div>

                                <div class="col-md-9 align-self-center ">
                                    <div class="form-group g-pos-rel mb-0 ">
                                        <span class="g-pos-abs g-top-0 g-right-0 d-block g-width-40 h-100 opacity-0 g-opacity-1--success ">
                          <i class="hs-admin-check g-absolute-centered g-font-size-default g-color-lightblue-v3 "></i>
                        </span>
                                        <input id="username" name="oppervlakte" class="form-control form-control-md g-color-gray-dark-v8 g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12 " type="text " placeholder="Enter Email" required="required " data-msg="This field is mandatory " data-error-class="u-has-error-v3 " data-success-class="has-success " aria-required="true ">

                                    </div>
                                </div>
                            </div>



                            <!--     <div class="row g-mb-20 ">
                                <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md ">
                                    <label class="mb-0 " for="#lastName ">Name</label>
                                </div>

                                <div class="col-md-9 align-self-center ">
                                    <div class="form-group g-pos-rel mb-0 ">
                                        <span class="g-pos-abs g-top-0 g-right-0 d-block g-width-40 h-100 opacity-0 g-opacity-1--success ">
                          <i class="hs-admin-check g-absolute-centered g-font-size-default g-color-lightblue-v3 "></i>
                        </span>
                                        <input id="lastName " name="name" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12 " type="text " value="Huculak " required="required " data-msg="This field is mandatory " data-error-class="u-has-error-v3 " data-success-class="has-success " aria-required="true ">
                                    </div>
                                </div>
                            </div> -->


                            <div>
                                <button class="btn btn-md btn-xl--md u-btn-lightblue-v3 g-width-160--md g-font-size-12 g-font-size-default--md g-mb-10 g-mt-30 " type="submit ">Send Invite</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>