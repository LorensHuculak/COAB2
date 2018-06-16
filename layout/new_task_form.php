<?php
$usersid = $_SESSION['usersID'];




  if (!empty($_POST['taskname'])) {
      
        $createTask = new Tasks();
      

      
        $createTask->setTaskName($_POST['taskname']);
          $createTask->setDeadline($_POST['deadline']);
       $createTask->setMessage($_POST['message']);
        $createTask->setOwner($usersid);
        $createTask->setType($_POST['type']);
    
      $createTask->addTask();
      
       
      
        }




?>

    <!-- BEGIN CORPUS-->
    <div class="col g-ml-45 g-ml-0--lg g-pb-65--md g-bg-gray-light-v5">
        <!-- BEGIN padding -->
        <div class="g-pa-20">

            <div class="media">
                <div class="d-flex align-self-center g-mt-10">
                    <a href="tasks.php"><span class="u-icon-v1 g-color-primary g-mr-20 g-mt-2"><i class="icon-arrow-left u-line-icon-pro u-line-icon-pro"></i></span></a>
                    <h1 class="g-font-weight-300 g-font-size-28 g-color-black mb-0">New Task</h1>
                </div>


            </div>
            <hr class="d-flex  g-my-30">
            <!-- General Forms -->

            <form method="post" class="g-pa-30 g-pt-0">
                <!-- Text Input -->

                <div class="form-group g-mb-20">

                    <label class="g-mb-10" for="inputGroup1_1">Task Name</label>
                    <input id="inputGroup1_1" class="form-control form-control-md rounded-4" name="taskname" type="text" placeholder="Enter title"> </div>


                <!-- Rounded Select -->
                <div class="g-mb-20">
                    <label class="g-mb-10">Type</label>

                    <div class="form-group u-select--v3 g-pos-rel g-brd-gray-light-v7 g-rounded-4 mb-0">
                        <select name="type" class="js-select u-select--v3-select u-select-dropdown--blue-theme u-sibling w-100" required="required" title="Select a type" style="display: none;">
                            <option value="3" data-content='<span class="d-flex align-items-center w-100"><span class="u-tags-v1 text-center g-brd-around g-brd-lightblue-v3 g-bg-lightblue-v3 g-color-white g-rounded-50 g-py-1 g-px-20 g-mr-20">Sharing</span></span>'></option>
                            <option value="1" data-content='<span class="d-flex align-items-center w-100"><span class="u-tags-v1 text-center g-brd-around g-brd-teal-v2 g-bg-teal-v2 g-color-white g-rounded-50 g-py-1 g-px-20 g-mr-20">Task</span>'></option>
                            <option value="2" data-content='<span class="d-flex align-items-center w-100"><span class="u-tags-v1 text-center g-brd-around g-brd-darkblue-v2 g-bg-darkblue-v2 g-color-white g-rounded-50 g-py-1 g-px-20 g-mr-20">Request</span></span>'></option>

                        </select>

                        <div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
                            <i class="hs-admin-angle-down"></i>
                        </div>
                    </div>
                </div>
                <!-- End Rounded Select -->


                <div class="form-group g-mb-20">

                    <label class="g-mb-10" for="inputGroup1_1">Description</label>
                    <input id="inputGroup1_1" class="form-control form-control-md rounded-4" name="message" type="text" placeholder="Enter a description"> </div>

                <!-- End Text Input -->
                <!-- Input with Autocomplete -->
                <div class="form-group g-mb-20">
                    <label class="g-mb-10" for="autocomplete1">Deadline</label>
                    <input id="autocomplete2" class="form-control form-control-md rounded-4" type="date" name="deadline" data-url="assets/include/ajax/autocomplete-data-1.json"> </div>

                <button class="btn btn-md btn-xl--md u-btn-lightblue-v3 g-width-160--md g-font-size-12 g-font-size-default--md   g-mt-15" type="submit ">Add Task</button>
                <!-- End Input with Autocomplete -->
            </form>
            <hr class="g-brd-gray-light-v4 ">




        </div>