<?php
$usersid = $_SESSION['usersID'];


  if (!empty($_POST['deadline'])) {
      
        $createEvent = new Events();

        $createEvent->setName($_POST['name']);
       $createEvent->setDescription($_POST['description']);
        $createEvent->setDeadline($_POST['deadline']);
        $createEvent->setOwner($usersid);

      
        $createEvent->addEvent();
      
        }




?>

    <!-- BEGIN CORPUS-->
    <div class="col g-ml-45 g-ml-0--lg g-pb-65--md g-bg-gray-light-v5">
        <!-- BEGIN padding -->
        <div class="g-pa-20">

            <div class="media">
                <div class="d-flex align-self-center g-mt-10">
                    <a href="events.php"><span class="u-icon-v1 g-color-primary g-mr-20 g-mt-2"><i class="icon-arrow-left u-line-icon-pro u-line-icon-pro"></i></span></a>
                    <h1 class="g-font-weight-300 g-font-size-28 g-color-black mb-0">New Event</h1>
                </div>


            </div>
            <hr class="d-flex  g-my-30">
            <!-- General Forms -->

            <form method="post" class="g-pa-30 g-pt-0">
                <!-- Text Input -->

                <div class="form-group g-mb-20">

                    <label class="g-mb-10" for="inputGroup1_1">Event Name</label>
                    <input id="inputGroup1_1" class="form-control form-control-md g-rounded-4 g-color-gray-dark-v8" name="name" type="text" placeholder="Enter title"> </div>


                <div class="form-group g-mb-20">

                    <label class="g-mb-10" for="inputGroup1_1">Description</label>
                    <input id="inputGroup1_1" class="form-control form-control-md g-rounded-4 g-color-gray-dark-v8" name="description" type="text" placeholder="Enter a description"> </div>

                <!-- End Text Input -->
                <!-- Input with Autocomplete -->
                <div class="form-group g-mb-20">
                    <label class="g-mb-10" for="autocomplete1">Event Deadline</label>
                    <input id="autocomplete2" class="form-control form-control-md rounded-4 g-color-gray-dark-v8" type="date" name="deadline" data-url="assets/include/ajax/autocomplete-data-1.json"> </div>

                <button class="btn btn-md btn-xl--md u-btn-lightblue-v3 g-width-160--md g-font-size-12 g-font-size-default--md   g-mt-15" type="submit ">Add Event</button>
                <!-- End Input with Autocomplete -->
            </form>
            <hr class="g-brd-gray-light-v4 ">




        </div>