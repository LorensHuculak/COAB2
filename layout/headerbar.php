<!-- Header -->
<header id="js-header" class="u-header u-header--sticky-top">
    <div class="u-header__section u-header__section--admin-dark g-min-height-65">
        <nav class="navbar no-gutters g-pa-0">
            <div class="col-auto d-flex flex-nowrap u-header-logo-toggler g-py-12">
                <!-- Logo -->
                <a href="home.php" class="navbar-brand d-flex align-self-center g-hidden-xs-down g-line-height-1 py-0 g-mt-5">

                    <img src="assets/img/logo/logo-light.png" alt="">




                </a>
                <!-- End Logo -->

                <!-- Sidebar Toggler -->
                <a class="js-side-nav u-header__nav-toggler d-flex align-self-center ml-auto" href="#!" data-hssm-class="u-side-nav--mini u-sidebar-navigation-v1--mini" data-hssm-body-class="u-side-nav-mini" data-hssm-is-close-all-except-this="true" data-hssm-target="#sideNav">
                    <i class="hs-admin-align-left"></i>
                </a>

                <!-- End Sidebar Toggler -->
            </div>

            <!-- Top Search Bar -->

            <div class="g-hidden-sm-down u-header--search col-sm g-py-12 g-ml-15--sm g-ml-20--md g-mr-10--sm">
                <div class="g-max-width-450">
                    <h4 class=" g-color-gray-dark-v2 g-ml-30 ">Cohousing Waasland</h4>

                </div>
            </div>

            <!-- End Top Search Bar -->

            <!-- Messages/Notifications/Top Search Bar/Top User -->
            <div class="col-auto d-flex g-py-12 g-pl-40--lg ml-auto">

                <!-- Top Messages -->
                <div class="g-pos-rel g-hidden-sm-down g-mr-5">
                    <a id="messagesInvoker" class="d-block text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20" href="#!" aria-controls="messagesMenu" aria-haspopup="true" aria-expanded="false" data-dropdown-event="click" data-dropdown-target="#messagesMenu" data-dropdown-type="css-animation" data-dropdown-duration="300" data-dropdown-animation-in="fadeIn" data-dropdown-animation-out="fadeOut">
                        <span class="u-badge-v1 g-top-7 g-right-7 g-width-18 g-height-18 g-bg-primary g-font-size-10 g-color-white rounded-circle p-0">2</span>
                        <i class="hs-admin-comment-alt g-absolute-centered"></i>
                    </a>


                    <!-- Top Messages List -->
                    <div id="messagesMenu" class="g-absolute-centered--x g-width-340 g-max-width-400 g-mt-17 rounded" aria-labelledby="messagesInvoker">
                        <div class="media u-header-dropdown-bordered-v1 g-pa-20">
                            <h4 class="d-flex align-self-center text-uppercase g-font-size-default g-letter-spacing-0_5 g-mr-20 g-mb-0">Messages</h4>
                            <div class="media-body align-self-center text-right">
                                <a class="g-color-white" href="messages.html">View All</a>
                            </div>
                        </div>

                        <ul class="p-0 mb-0">
                            <!-- Top Messages List Item -->
                            <li class="media g-pos-rel u-header-dropdown-item-v1 g-pa-20">
                                <div class="d-flex g-mr-15">

                                </div>

                                <div class="media-body">
                                    <h5 class="g-font-size-16 g-font-weight-400 g-mb-5"><a href="#!">Lenny Van Camp</a></h5>
                                    <p class="g-mb-10">Hey!</p>

                                    <em class="d-flex align-self-center align-items-center g-font-style-normal g-color-lightblue-v2">
            <i class="hs-admin-time icon-clock g-mr-5"></i> <small>5 min ago</small>
          </em>
                                </div>
                                <a class="u-link-v2" href="#!">Read</a>
                            </li>
                            <!-- End Top Messages List Item -->

                            <!-- Top Messages List Item -->
                            <li class="media g-pos-rel u-header-dropdown-item-v1 g-pa-20">
                                <div class="d-flex g-mr-15">

                                </div>

                                <div class="media-body">
                                    <h5 class="g-font-size-16 g-font-weight-400 g-mb-5"><a href="#!">Jonathan De Roeck</a></h5>
                                    <p class="g-mb-10">I've lost my key..</p>

                                    <em class="d-flex align-self-center align-items-center g-font-style-normal g-color-lightblue-v2">
            <i class="hs-admin-time icon-clock g-mr-5"></i> <small>22 min ago</small>
          </em>
                                </div>
                                <a class="u-link-v2" href="#!">Read</a>
                            </li>
                            <!-- End Top Messages List Item -->

                        </ul>
                    </div>
                    <!-- End Top Messages List -->
                </div>
                <!-- End Top Messages -->

                <!-- Top Notifications -->
                <div class="g-pos-rel g-hidden-sm-down">


                    <script>
                        var xhr = new XMLHttpRequest();
                        xhr.open("GET", "https://platform.clickatell.com/messages/http/send?apiKey=ux82svGGSii62Xu-IYBdhQ==&to=32472053765&content=Test+message+text", true);
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                console.log('success');
                            }
                        };
                        xhr.send();
                    </script>


                    <a class="d-block text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20" href="#modal6" data-modal-target="#modal6" data-modal-effect="blur">
                        <i class="hs-admin-bell g-absolute-centered"></i>
                    </a>

                    <!-- Notification Modal -->
                    <div id="notificationsMenu" class="js-custom-scroll g-absolute-centered--x g-width-340 g-max-width-400 g-height-250 g-mt-17 rounded" aria-labelledby="notificationsInvoker">
                        <div id="modal6" class="text-left g-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">
                            <button type="button" class="close" onclick="Custombox.modal.close();">
                                <i class="hs-icon hs-icon-close"></i>
                            </button>
                            <h4 class="g-mb-20">Notification</h4>
                            <div class="form-group">


                                <textarea id="inputGroup-2_3" class=" g-color-black form-control form-control-md u-textarea-expandable g-brd-none g-brd-bottom g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-resize-none g-overflow-hidden" rows="3" placeholder="Enter your message..."></textarea>

                                <small class="form-text text-muted g-font-size-default g-mt-20">
                    <strong>Note:</strong> You will send an alert to every community member.
                  </small>
                            </div>

                            <div class="media-body align-self-center text-right">
                                <a class="js-fancybox btn btn-xl u-btn-lightblue-v3 g-width-160--md g-font-size-default g-ml-10" href="#!">Send <i class="g-ml-10 fa fa-arrow-right"></i>
              </a>
                            </div>
                        </div>

                    </div>
                    <!-- End Top Notifications List -->
                </div>
                <!-- End Top Notifications -->

                <!-- Top Search Bar (Mobi) -->
                <a id="searchInvoker" class="g-hidden-sm-up text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20" href="#!" aria-controls="searchMenu" aria-haspopup="true" aria-expanded="false" data-is-mobile-only="true" data-dropdown-event="click" data-dropdown-target="#searchMenu" data-dropdown-type="css-animation" data-dropdown-duration="300" data-dropdown-animation-in="fadeIn" data-dropdown-animation-out="fadeOut">
                    <i class="hs-admin-search g-absolute-centered"></i>
                </a>
                <!-- End Top Search Bar (Mobi) -->
                <?php 

$users = new User($db);
$item = $users->getProfilePicture();

?>
                    <!-- Top User -->
                    <div class="col-auto d-flex g-pt-5 g-pt-0--sm g-pl-10 g-pl-20--sm">
                        <div class="g-pos-rel g-px-10--lg">
                            <a id="profileMenuInvoker" class="d-block" href="#!" aria-controls="profileMenu" aria-haspopup="true" aria-expanded="false" data-dropdown-event="click" data-dropdown-target="#profileMenu" data-dropdown-type="css-animation" data-dropdown-duration="300" data-dropdown-animation-in="fadeIn" data-dropdown-animation-out="fadeOut">
                                <span class="g-pos-rel">
        <span class="u-badge-v2--xs u-badge--top-right g-hidden-sm-up g-bg-lightblue-v5 g-mr-5"></span>
                                <img class="g-width-30 g-width-40--md g-height-30 g-height-40--md rounded-circle g-mr-10--sm" src="assets/img/uploads/<?php echo htmlspecialchars($item[0]['picture']);?>" alt="">
                                </span>
                                <span class="g-pos-rel g-top-2 g-color-gray-dark-v5">
        <span class="g-hidden-sm-down"><?php 
                  $username = htmlspecialchars($_SESSION["username"]);
                  echo $username; 
                  
                
?></span>
                                <i class="hs-admin-angle-down g-pos-rel g-top-2 g-ml-10"></i>
                                </span>
                            </a>

                            <!-- Top User Menu -->
                            <ul id="profileMenu" class="g-pos-abs g-left-0 g-width-100x--lg g-nowrap g-font-size-14 g-py-20 g-mt-17 rounded" aria-labelledby="profileMenuInvoker">
                                <li class="g-hidden-sm-up g-mb-10">
                                    <a class="media g-py-5 g-px-20" href="#!">
                                        <span class="d-flex align-self-center g-pos-rel g-mr-12">
          <span class="u-badge-v1 g-top-minus-3 g-right-minus-3 g-width-18 g-height-18 g-bg-lightblue-v5 g-font-size-10 g-color-white rounded-circle p-0">10</span>
                                        <i class="hs-admin-comment-alt"></i>
                                        </span>
                                        <span class="media-body align-self-center">Unread Messages</span>
                                    </a>
                                </li>
                                <li class="g-hidden-sm-up g-mb-10">
                                    <a class="media g-py-5 g-px-20" href="#modal6" data-modal-target="#modal6" data-modal-effect="blur">
                                        <span class="d-flex align-self-center g-mr-12">
          <i class="hs-admin-bell"></i>
        </span>
                                        <span class="media-body align-self-center">Notification</span>
                                    </a>
                                </li>

                                <li class="g-mb-10">



                                    <a class="media g-color-lightred-v2--hover g-py-5 g-px-20" href="profile.php">
                                        <span class="d-flex align-self-center g-mr-12">
          <i class="hs-admin-user"></i>
        </span>
                                        <span class="media-body align-self-center">My Profile</span>
                                    </a>
                                </li>



                                <li class="mb-0">
                                    <a class="media g-color-lightred-v2--hover g-py-5 g-px-20" href="logout.php">
                                        <span class="d-flex align-self-center g-mr-12">
          <i class="hs-admin-shift-right"></i>
        </span>
                                        <span class="media-body align-self-center">Sign Out</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- End Top User Menu -->
                        </div>
                    </div>
                    <!-- End Top User -->
            </div>
            <!-- End Messages/Notifications/Top Search Bar/Top User -->
            <!-- Top Activity Toggler -->
            <a id="activityInvoker" class="text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20" href="#!" aria-controls="activityMenu" aria-haspopup="true" aria-expanded="false" data-dropdown-event="click" data-dropdown-target="#activityMenu" data-dropdown-type="css-animation" data-dropdown-animation-in="fadeInRight" data-dropdown-animation-out="fadeOutRight" data-dropdown-duration="300">
                <i class="hs-admin-align-right g-absolute-centered"></i>
            </a>
            <!-- End Top Activity Toggler -->
        </nav>

        <!-- Top Activity Panel -->
        <!-- Top Activity Panel -->
        <div id="activityMenu" class="js-custom-scroll u-header-sidebar g-pos-fix g-top-0 g-left-auto g-right-0 g-z-index-4 g-width-300 g-width-400--sm g-height-100vh" aria-labelledby="activityInvoker">
            <div class="u-header-dropdown-bordered-v1 g-pa-20">
                <a id="activityInvokerClose" class="pull-right g-color-lightblue-v2" href="#!" aria-controls="activityMenu" aria-haspopup="true" aria-expanded="false" data-dropdown-event="click" data-dropdown-target="#activityMenu" data-dropdown-type="css-animation" data-dropdown-animation-in="fadeInRight" data-dropdown-animation-out="fadeOutRight" data-dropdown-duration="300">
                    <i class="hs-admin-close"></i>
                </a>
                <h4 class="text-uppercase g-font-size-default g-letter-spacing-0_5 g-mr-20 g-mb-0">Overview</h4>
            </div>

            <!-- Activity Short Stat. -->
            <section class="g-pa-20">
                <div class="media align-items-center u-link-v5 g-color-white">
                    <span class="g-font-size-16">Bills & Utilities</span>

                    <div class="d-flex align-self-center g-font-size-25 g-line-height-1 g-color-white ml-auto">€ 350</div>


                </div>



                <!-- Calendar Card -->
                <div class="g-mb-30 g-mt-30">
                    <header class="u-bg-overlay g-bg-img-hero g-bg-black-opacity-0_5--after g-rounded-4 g-rounded-0--bottom-left g-rounded-0--bottom-right g-overflow-hidden" style="background-image: url(assets/img-temp/400x270/img3.jpg);">
                        <div class="u-bg-overlay__inner g-color-white g-pa-30">
                            <h3 class="g-font-weight-300 g-font-size-28 g-color-white g-mb-35">
        Friday 3rd
        <span class="d-block g-font-size-16">January 2017</span>
      </h3>
                            <a class="btn btn-md text-uppercase u-btn-outline-white" href="#">Add event</a>
                        </div>
                    </header>

                    <section class=" g-rounded-4 g-rounded-0--top-left g-rounded-0--top-right g-bg-white">
                        <div class="g-pa-10 g-pa-20--md">
                            <div id="datepicker" class="u-datepicker--v2"></div>
                        </div>

                        <ul class="list-unstyled">

                            <li class="media g-bg-gray-light-v8 g-brd-left  g-px-30 g-py-15 g-mb-2 g-ml-minus-1">
                                <strong class="d-flex align-self-center g-width-80 g-color-black">19:00am</strong>

                                <div class="media-body g-font-weight-300 g-color-black">Dinner Public Space</div>
                            </li>

                        </ul>
                    </section>
                </div>
                <!-- End Calendar Card -->


            </section>
            <!-- End Activity Short Stat. -->


            <?php 
                    
  
                    $users = new User($db);
                    
		$users = $users->getUsers();
                      
                    
 
		foreach($users as $item):
                 
	?>

                <!-- User -->
                <figure class="u-shadow-v21 u-block-hover ">
                    <div class="d-flex justify-content-start g-bg-primary--hover g-bg-cyan g-transition-0_3 g-transition--ease-in-out g-pa-30 ">
                        <!-- Figure Image -->
                        <img class="align-self-center g-width-80 g-height-80 rounded-circle mr-4 " src="assets/img/uploads/<?php 
                                                                            if ($item['picture'] == NULL) {
 echo htmlspecialchars('user.jpg');
}       else {                   
                                                                                                        
                 echo htmlspecialchars($item['picture']); }  
                                                                                                        
                                                                                                     ?>">
                        <!-- Figure Image -->

                        <!-- Figure Info -->
                        <div class="d-block align-self-center ">
                            <h4 class="g-color-white--hover g-font-weight-600 g-font-size-16 g-transition-0_3 mb-2 "><?php echo htmlspecialchars($item['username']); ?></h4>

                            <!-- Figure Social Icons -->
                            <ul class="list-inline mb-0 ">
                                <li class="list-inline-item g-mx-3 ">
                                    <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-white--hover rounded-circle " href="#! ">
                                        <i class="fa fa-user "></i>
                                    </a>
                                </li>
                                <li class="list-inline-item g-mx-3 ">
                                    <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-white--hover rounded-circle " href="#! ">
                                        <i class="fa fa-comment "></i>
                                    </a>
                                </li>


                            </ul>
                            <!-- End Figure Social Icons -->
                        </div>
                        <!-- End Figure Info -->
                    </div>
                </figure>
                <!-- End User -->

                <?php endforeach; ?>





        </div>
        <!-- End Top Activity Panel -->
    </div>
</header>
<!-- End Header -->