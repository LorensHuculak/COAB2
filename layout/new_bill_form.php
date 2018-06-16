<?php
$usersid = $_SESSION['usersID'];
$date = date('Y-m-d', time());
                  

  if (!empty($_POST['deadline'])) {
      
        $createBill = new Bills();
        $createBill->setName($_POST['name']);
        $createBill->setDate($date);
        $createBill->setDeadline($_POST['deadline']);
        $createBill->setPrice($_POST['price']);
        $createBill->setType($_POST['type']);
        $createBill->setOwner($usersid);
        $createBill->setSite($_POST['site']);
        $createBill->setDoc($_POST['document']);

        $createBill->addBill();
      
        }




?>

    <!-- BEGIN CORPUS-->
    <div class="col g-ml-45 g-ml-0--lg g-pb-65--md g-bg-gray-light-v5">
        <!-- BEGIN padding -->
        <div class="g-pa-20">

            <div class="media">
                <div class="d-flex align-self-center g-mt-10">
                    <a href="bills.php"><span class="u-icon-v1 g-color-primary g-mr-20 g-mt-2"><i class="icon-arrow-left u-line-icon-pro u-line-icon-pro"></i></span></a>
                    <h1 class="g-font-weight-300 g-font-size-28 g-color-black mb-0">New Bill</h1>
                </div>


            </div>
            <hr class="d-flex  g-my-30">
            <!-- General Forms -->

            <form method="post" class="g-pa-30 g-pt-0">
                <!-- Text Input -->

                <div class="form-group g-mb-20">

                    <label class="g-mb-10" for="inputGroup1_1">Bill Name</label>
                    <input id="inputGroup1_1" class="form-control form-control-md rounded-4 g-color-gray-dark-v8" name="name" type="text" placeholder="Enter title"> </div>


                <div class="form-group g-mb-20">
                    <label class="g-mb-10 ">Total Price</label>
                    <div class="input-group g-brd-primary--focus">
                        <div class="input-group-prepend">
                            <span class="input-group-text rounded-4 g-bg-white g-color-gray-light-v1"><i class="fa fa-euro"></i></span>
                        </div>
                        <input name="price" class="form-control form-control-md border-left-0 rounded-4 pl-0 g-color-gray-dark-v8" type="text" placeholder="Enter Price">
                    </div>
                    <small class="g-font-weight-300 g-font-size-12 g-color-gray-dark-v6 g-pt-5">Please use a comma for decimals.</small>
                </div>
                <div class="form-group g-mb-20">

                    <label class="g-mb-10" for="inputGroup1_1">Distribution Key</label>
                    <div class="form-group u-select--v3 g-pos-rel g-brd-gray-light-v7 rounded-4 mb-0">
                        <select name="type" class="js-select u-select--v3-select u-sibling w-100" required="required" title="Choose a Distribution Key" style="display: none;">


                            <option value="1" data-content='<span class="d-flex align-items-center w-100"><i class="hs-admin-home g-font-size-18 g-mr-15"></i><span>Linear</span></span>'>Linear
                            </option>
                            <option value="2" data-content='<span class="d-flex align-items-center w-100"><i class="hs-admin-face-smile g-font-size-18 g-mr-15"></i><span>Per Capita</span></span>'>Per Capita
                            </option>
                            <option value="3" data-content='<span class="d-flex align-items-center w-100"><i class="hs-admin-layout-placeholder g-font-size-18 g-mr-15"></i><span>Gross Area</span></span>'>Gross Area
                                <option value="4" data-content='<span class="d-flex align-items-center w-100"><i class="fa fa-times g-font-size-18 g-mr-15"></i><span>None</span></span>'>None
                                </option>
                        </select>

                        <div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
                            <i class="hs-admin-angle-down"></i>
                        </div>
                    </div>
                </div>




                <!-- End Text Input -->
                <!-- Input with Autocomplete -->
                <div class="form-group g-mb-20">
                    <label class="g-mb-10" for="autocomplete1">Due Date</label>
                    <input id="autocomplete2" class="form-control form-control-md rounded-4 g-color-gray-dark-v8" type="date" name="deadline" data-url="assets/include/ajax/autocomplete-data-1.json"> </div>

                <div class="form-group g-mb-20">

                    <label class="g-mb-10" for="inputGroup1_1">Online Payment URL</label>
                    <input id="inputGroup1_1" class="form-control form-control-md rounded-4 g-color-gray-dark-v8" name="site" type="text" placeholder="Enter URL (Optional)"> </div>


                <div class="form-group g-mb-20">

                    <label class="g-mb-10" for="inputGroup1_1">Uipload Document</label>
                    <input type="file" name="document" class="form-control-file g-color-gray-dark-v8" id="exampleInputFile" aria-describedby="fileHelp"> </div>




                <button class="btn btn-md btn-xl--md u-btn-lightblue-v3 g-width-160--md g-font-size-12 g-font-size-default--md   g-mt-15" type="submit ">Add Event</button>
                <!-- End Input with Autocomplete -->
            </form>



            <hr class="g-brd-gray-light-v4 ">
            <div class="media">
                <div class="d-flex align-self-center">
                    <h1 class="g-font-weight-300 g-font-size-28 g-color-black mb-0">Manage Bills</h1>
                </div>


            </div>
            <small class="form-text text-muted g-font-size-default g-mt-10 g-mb-20">Proceed by adding participants to your bills.</small>
            <!-- End General Forms -->


            <div class="row">

                <?php 
     $uid = $_SESSION['usersID'];
            
            if (isset($_POST['bill'], $_POST['user'])){
                
                $createPayer = new Payers();

        $createPayer->setBill($_POST['bill']);
        $createPayer->setUser($_POST['user']);
        $createPayer->setPaid(0);

      
        $createPayer->addPayer();
            }
         

		$bills = $bills->manageBills();
		foreach($bills as $item):
	?>
                    <div class="col-md-6 col-lg-4 g-mb-30">
                        <div class="card g-pb-30 g-brd-gray-light-v7 rounded">
                            <form action="" method="post">
                                <header class="card-header g-bg-transparent g-brd-bottom-none g-pa-20 g-pa-30--sm">
                                    <div class="media g-mb-15">
                                        <h3 class="g-font-weight-300 g-font-size-20 g-color-black g-mb-15"><?php
                                            
                                             
                                            echo htmlspecialchars($item['name']); ?></h3>
                                        <h3 class="g-font-weight-300 g-font-size-20 g-color-cyan g-mb-15 d-flex justify-content-end"> - € <?php echo htmlspecialchars($item['price']); ?></h3>


                                        <div class="media-body d-flex justify-content-end">
                                            <div class="g-pos-rel g-z-index-2">
                                                <a id="dropDown<?php echo htmlspecialchars($item['billid']); ?>Invoker" class="g-line-height-0 g-font-size-24 g-color-gray-light-v6 g-color-lightblue-v3--hover u-link-v5" href="#!" aria-controls="dropDown<?php echo htmlspecialchars($item['billid']); ?>" aria-haspopup="true" aria-expanded="false" data-dropdown-event="click" data-dropdown-target="#dropDown<?php echo htmlspecialchars($item['billid']); ?>" data-dropdown-type="jquery-slide">
                                                    <i class="hs-admin-more-alt g-ml-20"></i>
                                                </a>

                                                <div id="dropDown<?php echo htmlspecialchars($item['billid']); ?>" class="u-shadow-v31 g-pos-abs g-right-0 g-bg-white" aria-labelledby="dropDown<?php echo htmlspecialchars($item['billid']); ?>Invoker">
                                                    <ul class="list-unstyled g-nowrap mb-0">
                                                        <li>
                                                            <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="edit_bill.php?id=<?php echo htmlspecialchars($item['billid'])?>">
                                                                <i class="hs-admin-pencil g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i> Edit
                                                            </a>
                                                        </li>


                                                        <li>
                                                            <a data-id="<?php echo htmlspecialchars($item['billid']); ?>" class="deleteBill d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="#!">
                                                                <i class="hs-admin-trash g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i> Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="media-body d-flex">
                                        <span class="d-flex align-items-center g-color-gray-light-v6 "><i class="hs-admin-calendar g-font-size-18"></i><span class="g-hidden-sm-down g-color-gray-dark-v6 g-ml-8">Due Date</span></span>
                                        <div class="text-left g-ml-20">
                                            <?php   $deadlineformat = new DateTime($item['deadline']);
    
    echo htmlspecialchars(date_format($deadlineformat, 'd F Y')); ?>
                                        </div>



                                        <span class="d-flex align-items-center g-color-gray-light-v6 g-ml-40"><i class="hs-admin-key g-font-size-18"></i><span class="g-hidden-sm-down g-color-gray-dark-v6 g-ml-8">Distribution Key</span></span>
                                        <div class="text-left g-ml-20">
                                            <?php 
                                    $keys = new Bills();
                                $key = $keys->getKey($item["type"]);
                                                                   
                                    echo htmlspecialchars($key[0]["type"]);
                                                                   
                                                                   ?>
                                        </div>
                                    </div>


                                    <input type="hidden" name="bill" value="<?php echo htmlspecialchars($item['billid'])?>">
                                </header>

                                <hr class="d-flex g-brd-gray-light-v7 g-mx-20 g-mx-30--sm my-0">

                                <div class="card-block g-px-20 g-px-30--sm g-py-10 g-py-15--sm">


                                    <?php 
     
        
                                               
         

$payers = new Payers();
                                    
                                
                             
                                  
            $payerlist = $payers->getPayers($item['billid']);
		foreach($payerlist as $payer) { 
            
               $users = new User($db);
            $bills = new Bills();
$name = $users->getSingleUser($payer['user']);
        
       
            
            
            if ($item['type'] == 1)  {
                
                     $calcPrice = $bills->calcLinear($item['billid'], $payer['user']);
                                
            } else if ($item['type'] == 2) {
                
                $calcPrice = $bills->calcCapita($item['billid'], $payer['user']);
            } else if ($item['type'] == 3 ) {
                $calcPrice = $bills->calcArea($item['billid'], $payer['user']);
            }
                                        
             echo '<div class="media align-self-center g-mb-5">
    <div class="d-flex g-width-100 g-font-weight-300 g-color-gray-dark-v10">'.htmlspecialchars($name[0]['username']).'</div>

    <div class="media-body align-self-center">'.($payer['paid'] == 1 ? '<span class="u-tags-v1 text-center g-width-130 g-brd-around  g-brd-cyan g-bg-cyan g-color-white g-rounded-50 g-py-4 g-px-15">Paid</span>' : '<span class="u-tags-v1 text-center g-width-130 g-brd-around g-brd-teal-v2 g-bg-teal-v2 g-color-white g-rounded-50 g-py-4 g-px-15">Unpaid</span>').'</div>

    <div class="d-flex align-self-center justify-content-end g-font-weight-300 g-color-black ">€ '.htmlspecialchars(number_format((float)$calcPrice[0]['calcPrice'], 2, '.', '')).'
        <a data-id="'.htmlspecialchars($payer['id']).'" class="deletePayer u-link-v5 g-color-gray-light-v6 g-color-cyan--hover g-mt-3 g-ml-5" href="#!">
            <i class="hs-admin-trash g-font-size-18 "></i>
        </a>
    </div>
</div>';
        }
            
           
      
            
      
                                        

	?>





                                </div>


                                <hr class="d-flex g-brd-gray-light-v7 g-mx-20 g-mx-30--sm g-mb- 0 my-0">
                                <div class="form-group g-pa-20 g-pb-0 g-mb-0">




                                    <div class="g-pos-rel  g-bg-gray-light-v5">


                                        <button class="btn u-input-btn--v1 g-width-40 g-bg-primary g-rounded-right-4" type="submit">
                                            <i class="fa fa-plus g-absolute-centered g-font-size-16 g-color-white"></i>
                                        </button>
                                        <select id="inputGroup-1_4" name="user" class="js-select u-select--v3-select u-sibling " required="required" title="Add a Participant" style="display: none;">




                                            <?php
 $users = new User($db);     
                               
                                              $admins = $users->getAdmins();
		foreach($admins as $admin) {  
        
    echo '<option value="'.htmlspecialchars($admin["usersID"]).'" data-content=\'<span class="d-flex align-items-center w-100"><span>'.htmlspecialchars($admin["username"]).'</span></span>\'>'.htmlspecialchars($admin["username"]).'
                                                </option>';
        
            
            
        } ?>

                                        </select>


                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <?php endforeach; ?>


            </div>


        </div>