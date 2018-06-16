<?php
$usersid = $_SESSION['usersID'];

$details = new Votes();
$details = $details->getSinglePoll();

  if (!empty($_POST['deadline'])) {
      
        $createPoll = new Votes();

        $createPoll->setQuestion($_POST['question']);
          $createPoll->setDescription($_POST['description']);
        $createPoll->setDeadline($_POST['deadline']);
        $createPoll->setOwner($usersid);

      
        $createPoll->updatePoll();
      
       header("Refresh:0");
      
     
      
      
        }


if (!empty($_POST['name'])) {
    
    $createChoice = new Choices();

        $createChoice->setName($_POST['name']);
        $createChoice->setPoll($_POST['poll']);
  
        $createChoice->addChoice();
}

?>

    <!-- BEGIN CORPUS-->
    <div class="col g-ml-45 g-ml-0--lg g-pb-65--md g-bg-gray-light-v5">
        <!-- BEGIN padding -->
        <div class="g-pa-20">

            <div class="media">
                <div class="d-flex align-self-center g-mt-10">
                    <a href="voting.php"><span class="u-icon-v1 g-color-primary g-mr-20 g-mt-2"><i class="icon-arrow-left u-line-icon-pro u-line-icon-pro"></i></span></a>
                    <h1 class="g-font-weight-300 g-font-size-28 g-color-black mb-0">Edit Poll</h1>
                </div>


            </div>
            <hr class="d-flex  g-my-30">
            <!-- General Forms -->
            <small class="form-text text-muted g-font-size-default g-mt-10 g-mb-20">Start by creating a poll with a deadline.</small>
            <form method="post" class="g-pa-30 g-pt-0">
                <!-- Text Input -->

                <div class="form-group g-mb-20">

                    <label class="g-mb-10" for="inputGroup1_1">Voting Topic</label>
                    <input id="inputGroup1_1" class="form-control form-control-md rounded-4 g-color-gray-dark-v8" name="question" type="text" placeholder="<?php echo $details[0]['question']; ?>"> </div>

                <div class="form-group g-mb-20">

                    <label class="g-mb-10" for="inputGroup1_1">Description</label>
                    <input id="inputGroup1_1" class="form-control form-control-md rounded-4 g-color-gray-dark-v8" name="description" type="text" placeholder="<?php echo $details[0]['description']; ?>"> </div>


                <!-- End Text Input -->
                <!-- Input with Autocomplete -->
                <div class="form-group g-mb-20">
                    <label class="g-mb-10" for="autocomplete1">Voting Deadline</label>
                    <input id="autocomplete2" class="form-control form-control-md rounded-4 g-color-gray-dark-v8" type="date" name="deadline" data-url="assets/include/ajax/autocomplete-data-1.json"> </div>

                <button class="btn btn-md btn-xl--md u-btn-lightblue-v3 g-width-160--md g-font-size-12 g-font-size-default--md   g-mt-15" type="submit ">Add Poll</button>
                <!-- End Input with Autocomplete -->
            </form>
            <hr class="g-brd-gray-light-v4 ">
            <div class="media">
                <div class="d-flex align-self-center">
                    <h1 class="g-font-weight-300 g-font-size-28 g-color-black mb-0">Manage Polls</h1>
                </div>


            </div>
            <small class="form-text text-muted g-font-size-default g-mt-10 g-mb-30">Proceed by adding choices to your polls.</small>
            <!-- End General Forms -->


            <div class="row">

                <?php 
     $uid = $_SESSION['usersID'];
            
            if (isset($_POST['poll'], $_POST['choice'])){
                
                $createAnswer = new Answers();

        $createAnswer->setPoll($_POST['poll']);
        $createAnswer->setUser($uid);
        $createAnswer->setChoice($_POST['choice']);

      
        $createAnswer->addAnswer();
            }
         

		$votings = $votings->getVotings();
		foreach($votings as $item):
	?>
                    <div class="col-md-6 col-lg-4 g-mb-30">
                        <div class="card g-pb-30 g-brd-gray-light-v7 rounded">
                            <form action="" method="post">
                                <header class="card-header g-bg-transparent g-brd-bottom-none g-pa-20 g-pa-30--sm">
                                    <div class="media g-mb-15">
                                        <h3 class="g-font-weight-300 g-font-size-20 g-color-black g-mb-15"><?php echo htmlspecialchars($item['question']); ?> - <?php   $deadlineformat = new DateTime($item['deadline']);
    
    echo htmlspecialchars(date_format($deadlineformat, 'd F Y')); ?></h3>


                                        <div class="media-body d-flex justify-content-end">
                                            <div class="g-pos-rel g-z-index-2">
                                                <a id="dropDown<?php echo htmlspecialchars($item['voteid'])?>Invoker" class="g-line-height-0 g-font-size-24 g-color-gray-light-v6 g-color-lightblue-v3--hover u-link-v5" href="#!" aria-controls="dropDown<?php echo htmlspecialchars($item['voteid'])?>" aria-haspopup="true" aria-expanded="false" data-dropdown-event="click" data-dropdown-target="#dropDown<?php echo htmlspecialchars($item['voteid'])?>" data-dropdown-type="jquery-slide">
                                                    <i class="hs-admin-more-alt g-ml-20"></i>
                                                </a>

                                                <div id="dropDown<?php echo htmlspecialchars($item['voteid'])?>" class="u-shadow-v31 g-pos-abs g-right-0 g-bg-white" aria-labelledby="dropDown<?php echo htmlspecialchars($item['voteid'])?>Invoker">
                                                    <ul class="list-unstyled g-nowrap mb-0">
                                                        <li>
                                                            <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="edit_voting.php?id=<?php echo htmlspecialchars($item['voteid'])?>">
                                                                <i class="hs-admin-pencil g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i> Edit
                                                            </a>
                                                        </li>


                                                        <li>
                                                            <a data-id="<?php echo htmlspecialchars($item['voteid']); ?>" class="deleteVote d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="#!">
                                                                <i class="hs-admin-trash g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i> Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <input type="hidden" name="poll" value="<?php echo htmlspecialchars($item['voteid'])?>">
                                </header>

                                <hr class="d-flex g-brd-gray-light-v7 g-mx-20 g-mx-30--sm my-0">

                                <div class="card-block g-px-20 g-px-30--sm g-py-10 g-py-15--sm">


                                    <?php 
     
            
         
$choices = new Choices();
$answers = new Answers();
                                    
                                
                                    $votecompleted = $answers->getAnswers($item['voteid']);
                               
                                  
                                        
                                        $displayAnswer = new Answers();
                       $displayAnswer = $displayAnswer->getPercentage($item['voteid']);
		foreach($displayAnswer as $procent) { 
             echo '<div class="media align-self-center g-mb-5">
                                    <div class="d-flex g-width-100 g-font-weight-300 g-color-gray-dark-v10">'.htmlspecialchars($procent['name']).'</div>

                                    <div class="media-body align-self-center">
                                        <div class="progress g-height-4 g-rounded-2">
                                            <div class="progress-bar g-bg-lightblue-v3 g-rounded-2" role="progressbar" style="width:'.htmlspecialchars($procent['percentage']).'%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-self-center justify-content-end g-font-weight-300 g-color-black g-width-40">'.htmlspecialchars($procent['count']).'<a data-id="'.htmlspecialchars($procent['choiceid']).'" class="deleteChoice u-link-v5 g-color-gray-light-v6 g-color-cyan--hover g-mt-3 g-ml-5" href="#!">
                                            <i class="hs-admin-trash g-font-size-18 "></i>
                                        </a></div>
                                </div>';
        }
            
           
      
            
      
                                        

	?>





                                </div>


                                <hr class="d-flex g-brd-gray-light-v7 g-mx-20 g-mx-30--sm g-mb- 0 my-0">
                                <div class="form-group g-pa-20 g-pb-0 g-mb-0">


                                    <div class="g-pos-rel">
                                        <button class="btn u-input-btn--v1 g-width-40 g-bg-primary g-rounded-right-4" type="submit">
                                            <i class="fa fa-plus g-absolute-centered g-font-size-16 g-color-white"></i>
                                        </button>
                                        <input id="inputGroup-1_4" name="name" class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3 g-rounded-4 g-px-14 g-py-10" type="text" placeholder="Add a Choice">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <?php endforeach; ?>


            </div>
        </div>