<!-- BEGIN CORPUS-->
<div class="col g-ml-45 g-ml-0--lg g-pb-65--md g-bg-gray-light-v5">
    <!-- BEGIN padding -->
    <div class="g-pa-20">

        <!-- header event-->
        <div class="media">
            <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-28 g-color-black mb-0">Events</h1>
            </div>

            <div class="media-body align-self-center text-right">
                <a class="btn btn-xl u-btn-lightblue-v3 g-width-160--md g-font-size-default g-ml-10" href="add_event.php">New Event
              </a>
            </div>
        </div>
        <hr class="d-flex g-brd-gray-light-v7 g-my-30">
        <div class="media g-mb-30">
            <div class="d-flex align-self-center align-items-center">
                <span class="g-hidden-sm-down g-color-gray-dark-v6 g-mr-12">Status:</span>

                <div class="u-select--v1 g-pr-20">
                    <select class="js-select u-select--v1-select w-100" style="display: none;">
                        <option data-content='<span class="d-flex align-items-center"><span class="u-badge-v2--md g-pos-stc g-transform-origin--top-left g-bg-lightblue-v3 g-mr-8--sm"></span><span class="g-hidden-sm-down g-line-height-1_2 g-color-black">In Progress</span></span>'>In Progress</option>
                        <option data-content='<span class="d-flex align-items-center"><span class="u-badge-v2--md g-pos-stc g-transform-origin--top-left g-bg-cyan g-mr-8--sm"></span><span class="g-hidden-sm-down g-line-height-1_2 g-color-black">Joined</span></span>'>Joined</option>

                    </select>
                    <i class="hs-admin-angle-down g-absolute-centered--y g-right-0 g-color-gray-light-v6 ml-auto"></i>
                </div>
            </div>



            <div class="media-body align-self-center g-ml-10 g-ml-0--md">
                <div class="input-group g-pos-rel g-max-width-380 float-right">
                    <input class="form-control g-font-size-default g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-rounded-20 g-pl-20 g-pr-50 g-py-10" type="text" placeholder="Search for event">
                    <button class="btn g-pos-abs g-top-0 g-right-0 g-z-index-2 g-width-60 h-100 g-bg-transparent g-font-size-16 g-color-lightred-v2 g-color-lightblue-v3--hover rounded-0" type="submit">
                        <i class="hs-admin-search g-absolute-centered"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- end header event-->
        <!-- begin events -->
        <div class="row">



            <?php 
     $uid = $_SESSION['usersID'];
            
            
             if (isset($_POST['event'])){
                
                $createAttend = new Attends();

        $createAttend->setEvent($_POST['event']);
        $createAttend->setUser($uid);
 

      
        $createAttend->addAttend();
            }
            
               
             if (isset($_POST['eventdel'])){
                
                $delAttend = new Attends();

       $delAttend->deleteAttend($_POST['eventdel']);
            }
            

		$events = $events->getEvents();
		foreach($events as $item):
	?>
                <div class="col-md-6 col-lg-4 g-mb-30">
                    <!-- 1 EVENT -->
                    <div class="card h-100 g-brd-gray-light-v7 rounded">
                        <header class="card-header g-bg-transparent g-brd-bottom-none g-pa-20 g-pa-30--sm">
                            <div class="media g-mb-15">
                                <h3 class="g-font-weight-300 g-font-size-20 g-color-black g-mb-15"><?php echo htmlspecialchars($item['name']); ?></h3>

                                <div class="media-body d-flex justify-content-end">
                                    <div class="g-pos-rel g-z-index-2">
                                        <a id="dropDown2Invoker" class="g-line-height-0 g-font-size-24 g-color-gray-light-v6 g-color-lightblue-v3--hover u-link-v5" href="#!" aria-controls="dropDown2" aria-haspopup="true" aria-expanded="false" data-dropdown-event="click" data-dropdown-target="#dropDown2" data-dropdown-type="jquery-slide">
                                            <i class="hs-admin-more-alt g-ml-20"></i>
                                        </a>

                                        <div id="dropDown2" class="u-shadow-v31 g-pos-abs g-right-0 g-bg-white" aria-labelledby="dropDown2Invoker">
                                            <ul class="list-unstyled g-nowrap mb-0">
                                                <li>
                                                    <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="#!">
                                                        <i class="hs-admin-pencil g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="#!">
                                                        <i class="hs-admin-archive g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i> Archive
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="#!">
                                                        <i class="hs-admin-check g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i> Mark as Done
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="#!">
                                                        <i class="hs-admin-plus g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i> New Task
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="#!">
                                                        <i class="hs-admin-trash g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i> Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="" method="post">

                                <?php     $attends = new Attends();
                                    $attended = $attends->getAttends($item['eventid']);
                               
                                    if($attended) {
                                        
                                 echo  '<input type="hidden" name="eventdel" value="'.htmlspecialchars($item['eventid']).'"><input type="submit" class="u-tags-v1 text-center g-width-130 g-brd-around g-brd-cyan g-bg-cyan g-color-white g-rounded-50 g-py-4 g-px-15" value="Joined">';
                                                          
                                                          }    else {
                                 echo    '<input type="hidden" name="event" value="'.htmlspecialchars($item['eventid']).'"><input type="submit" class="u-tags-v1 text-center g-width-130 g-brd-around g-brd-teal-v2 g-bg-teal-v2 g-color-white g-rounded-50 g-py-4 g-px-15" value="Join">';
                            
                                    
                                    
                                }?>

                            </form>
                        </header>

                        <hr class="d-flex g-brd-gray-light-v7 g-mx-20 g-mx-30--sm my-0">

                        <div class="card-block g-px-20 g-px-30--sm g-py-10 g-py-15--sm">
                            <div class="media align-self-center g-mb-5">
                                <p>
                                    <?php echo htmlspecialchars($item['description']); ?>
                                </p>
                            </div>
                        </div>

                        <hr class="d-flex g-brd-gray-light-v7 g-mx-20 g-mx-30--sm my-0">

                        <div class="card-block g-px-20 g-px-30--sm g-py-15 g-py-20--sm">
                            <div class="row g-mb-25">
                                <div class="col-md-6 g-mb-25 g-mb-0--md">
                                    <h5 class="g-font-size-default g-color-gray-dark-v6 g-mb-5 g-mb-5">Due date</h5>
                                    <p class="g-color-black mb-0">
                                        <?php echo htmlspecialchars($item['deadline']); ?>
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <h5 class="g-font-size-default g-color-gray-dark-v6 g-mb-5 g-mb-5">Owner</h5>
                                    <p class="g-color-black mb-0">
                                        <?php 
                                 
                                           $users = new User($db);
$name = $users->getSingleUser($item['owner']);
                                        
                                            echo htmlspecialchars($name[0]['username']);?>

                                    </p>
                                </div>
                            </div>

                            <!--    <div class="g-mb-25">
                                        <h5 class="g-font-size-default g-color-gray-dark-v6 g-mb-5 g-mb-5">Last edited</h5>
                                        <p class="g-color-black mb-0">New design uploaded by Adam</p>
                                    </div> -->

                            <ul class="list-inline mb-0">

                                <?php 
                               
                                $displayAttends = new Attends();
                       $displayAttends = $displayAttends->getAllAttends($item['eventid']);
                                
                                 $i = 0;
		foreach($displayAttends as $attendee) {
            
                                 
                                           $users = new User($db);
$name = $users->getSingleUser($attendee['user']);
                                        
                                           
                                            if ($i < 3) {
                                             echo  '<li class="list-inline-item g-mb-10 g-mb-0--sm">
                                        <img class="g-width-40 g-height-40 rounded-circle" src="assets/img/uploads/'.htmlspecialchars($name[0]['picture']).'" alt="Image Description">
                                    </li>';
                                                  $i++;
                                            }
            
          
            
        }
            
                               
       
                                ?>


                                    <?php 
                                
                            $attends = new Attends();
                            $attendCount = $attends->countAttends($item['eventid']);
                            $newCount = $attendCount[0]['attendees'];
                            $finalCount = $newCount - 3;
                                
                            if ($newCount > 3) {
                                
                                echo'
                                        <li class="list-inline-item g-mb-10 g-mb-0--sm">
                                            <div class="d-flex align-items-center justify-content-center g-width-40 g-height-40 g-bg-lightblue-v4 g-color-white rounded-circle g-pos-rel g-top-1">+'.$finalCount.'</div>
                                        </li>';
                                
                            }
                                
                                
                                
                                
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- END 1 EVENT -->



                <?php endforeach; ?>



                    <!-- 1 EVENT -->
                    <div class="col-md-6 col-lg-4 g-mb-30">
                        <div class="card h-100 g-brd-gray-light-v7 rounded">
                            <header class="card-header g-bg-transparent g-brd-bottom-none g-pa-20 g-pa-30--sm">
                                <div class="media g-mb-15">
                                    <h3 class="g-font-weight-300 g-font-size-20 g-color-black g-mb-15">Community Meeting June</h3>

                                    <div class="media-body d-flex justify-content-end">
                                        <div class="g-pos-rel g-z-index-2">
                                            <a id="dropDown2Invoker" class="g-line-height-0 g-font-size-24 g-color-gray-light-v6 g-color-lightblue-v3--hover u-link-v5" href="#!" aria-controls="dropDown2" aria-haspopup="true" aria-expanded="false" data-dropdown-event="click" data-dropdown-target="#dropDown2" data-dropdown-type="jquery-slide">
                                                <i class="hs-admin-more-alt g-ml-20"></i>
                                            </a>

                                            <div id="dropDown2" class="u-shadow-v31 g-pos-abs g-right-0 g-bg-white" aria-labelledby="dropDown2Invoker">
                                                <ul class="list-unstyled g-nowrap mb-0">
                                                    <li>
                                                        <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="#!">
                                                            <i class="hs-admin-pencil g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i> Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="#!">
                                                            <i class="hs-admin-archive g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i> Archive
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="#!">
                                                            <i class="hs-admin-check g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i> Mark as Done
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="#!">
                                                            <i class="hs-admin-plus g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i> New Task
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="#!">
                                                            <i class="hs-admin-trash g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i> Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <span class="u-tags-v1 text-center g-width-130 g-brd-around g-brd-primary g-bg-primary g-color-white g-rounded-50 g-py-4 g-px-15">Join</span>
                            </header>

                            <hr class="d-flex g-brd-gray-light-v7 g-mx-20 g-mx-30--sm my-0">

                            <div class="card-block g-px-20 g-px-30--sm g-py-10 g-py-15--sm">
                                <div class="media align-self-center g-mb-5">
                                    <p>The topic of this month's Community Meeting will be 'work groups'. We will evaluate our skills and form the groups. </p>
                                </div>
                            </div>

                            <hr class="d-flex g-brd-gray-light-v7 g-mx-20 g-mx-30--sm my-0">

                            <div class="card-block g-px-20 g-px-30--sm g-py-15 g-py-20--sm">
                                <div class="row g-mb-25">
                                    <div class="col-md-6 g-mb-25 g-mb-0--md">
                                        <h5 class="g-font-size-default g-color-gray-dark-v6 g-mb-5 g-mb-5">Due date</h5>
                                        <p class="g-color-black mb-0">12 Jun 2017</p>
                                    </div>

                                    <div class="col-md-6">
                                        <h5 class="g-font-size-default g-color-gray-dark-v6 g-mb-5 g-mb-5">Owner</h5>
                                        <p class="g-color-black mb-0">Lenny Van Camp
                                        </p>
                                    </div>
                                </div>

                                <!--    <div class="g-mb-25">
                                        <h5 class="g-font-size-default g-color-gray-dark-v6 g-mb-5 g-mb-5">Last edited</h5>
                                        <p class="g-color-black mb-0">New design uploaded by Adam</p>
                                    </div> -->

                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item g-mb-10 g-mb-0--sm">
                                        <img class="g-width-40 g-height-40 rounded-circle" src="assets/img-temp/125x125/img1.jpg" alt="Image Description">
                                    </li>
                                    <li class="list-inline-item g-mb-10 g-mb-0--sm">
                                        <img class="g-width-40 g-height-40 rounded-circle" src="assets/img-temp/125x125/img12.jpg" alt="Image Description">
                                    </li>
                                    <li class="list-inline-item g-mb-10 g-mb-0--sm">
                                        <div class="d-flex align-items-center justify-content-center g-width-40 g-height-40 g-bg-lightblue-v4 g-color-white rounded-circle g-pos-rel g-top-1">+12</div>
                                    </li>
                                    <li class="list-inline-item g-mb-10 g-mb-0--sm">
                                        <a class="d-flex align-items-center justify-content-center u-link-v5 g-width-40 g-height-40 g-bg-gray-light-v8 g-bg-primary--hover g-color-lightblue-v4 g-color-white--hover rounded-circle g-pos-rel g-top-1" href="#!">
                                            <i class="hs-admin-plus"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END 1 EVENT -->
                    <!-- add event -->
                    <div class="col-md-6 col-lg-4 g-mb-30">
                        <a class="d-flex align-items-center justify-content-center u-link-v5 g-parent h-100 g-brd-around g-brd-style-dashed g-brd-gray-light-v7 rounded g-pa-30" href="add_event.php" data-src="#new-project-form" data-speed="350">
                            <span class="text-center">
                  <span class="d-inline-block g-pos-rel g-width-50 g-height-50 g-font-size-default g-color-lightblue-v4 g-brd-around g-brd-lightblue-v4 rounded-circle g-mb-5">
                    <i class="hs-admin-plus g-absolute-centered"></i>
                  </span>
                            <span class="d-block g-font-weight-300 g-font-size-16 g-color-gray-dark-v6 g-color-lightblue-v4--parent-hover">Start New Event</span>
                            </span>
                        </a>
                    </div>
                    <!-- end add event -->
        </div>



        <!-- end events-->
    </div>
    <!-- EIND PADDING-->