<!-- BEGIN CORPUS-->
<div class="col g-ml-45 g-ml-0--lg g-pb-65--md g-bg-gray-light-v5">
    <!-- BEGIN padding -->
    <div class="g-pa-20">
        <div class="media">
            <div class="d-flex align-self-center g-mt-10">
                <h1 class="g-font-weight-300 g-font-size-28 g-color-black mb-0">Bills</h1>
            </div>

            <div class="media-body align-self-center text-right">
                <a class="btn btn-xl u-btn-lightblue-v3 g-width-160--md g-font-size-default g-ml-10" href="add_bill.php">New Bill
              </a>
            </div>
        </div>

        <hr class="d-flex g-brd-gray-light-v7 g-my-30">
        <div class="col-xl-12">

            <!-- Income Cards -->
            <div class="card g-brd-gray-light-v7 g-mb-30">
                <header class="media g-pa-15 g-pa-25-30-0--md g-mb-20">
                    <div class="media-body align-self-center">


                        <div id="rangePickerWrapper3" class="u-datepicker-left u-datepicker--v3 g-pr-10">
                            <input id="rangeDatepicker3" class="g-font-size-12 g-font-size-default--md" type="text" data-rp-wrapper="#rangePickerWrapper3" data-rp-type="range" data-rp-date-format="d M Y" data-rp-default-date='["01 Jan 2016", "31 Dec 2017"]'>
                            <i class="hs-admin-angle-down g-absolute-centered--y g-right-0 g-color-gray-light-v3"></i>
                        </div>
                    </div>

                    <div class="d-flex align-self-end align-items-center">
                        <span class="totalprice g-line-height-1 g-font-weight-300 g-font-size-28 g-color-lightblue-v4"></span>
                        <span class="d-flex align-self-center g-font-size-0 g-ml-10">
       
      </span>
                    </div>
                </header>

                <div class="g-pa-15 g-pa-0-30-25--md">
                    <table class="js-datatable table table-responsive-sm w-100" data-dt-info="#datatableInfo4" data-dt-search="#datatableSearch4" data-dt-entries="#datatableEntries4" data-dt-pagination="datatablePagination4" data-dt-is-responsive="false" data-dt-pagination-classes="list-inline text-right mb-0" data-dt-pagination-items-classes="list-inline-item g-hidden-sm-down" data-dt-pagination-links-classes="u-pagination-v1__item u-pagination-v1-2 g-bg-lightblue-v3--active g-color-white--active g-brd-gray-light-v7 g-brd-lightblue-v3--hover g-brd-lightblue-v3--active g-rounded-4 g-py-8 g-px-15" data-dt-pagination-next-classes="list-inline-item" data-dt-pagination-next-link-classes="u-pagination-v1__item u-pagination-v1-2 g-brd-gray-light-v7 g-brd-lightblue-v3--hover g-rounded-4 g-py-8 g-px-12" data-dt-pagination-next-link-markup='<span class="g-line-height-1 g-valign-middle" aria-hidden="true"><i class="hs-admin-angle-right"></i></span><span class="sr-only">Next</span>' data-dt-pagination-prev-classes="list-inline-item" data-dt-pagination-prev-link-classes="u-pagination-v1__item u-pagination-v1-2 g-brd-gray-light-v7 g-brd-lightblue-v3--hover g-rounded-4 g-py-8 g-px-12" data-dt-pagination-prev-link-markup='<span class="g-line-height-1 g-valign-middle" aria-hidden="true"><i class="hs-admin-angle-left"></i></span><span class="sr-only">Prev</span>' data-dt-details-invoker=".js-details-show">
                        <thead>
                            <tr>


                                <th class="g-first-child g-font-weight-300 g-color-gray-dark-v6 g-brd-top-none">Name</th>
                                <th class="g-font-weight-300 g-color-gray-dark-v6 g-brd-top-none">Status</th>
                                <th class="g-font-weight-300 g-color-gray-dark-v6 g-brd-top-none">Date</th>
                                <th class="g-font-weight-300 g-color-gray-dark-v6 g-brd-top-none g-hidden-sm-down">Document</th>
                                <th class="text-right g-font-weight-300 g-color-gray-dark-v6 g-brd-top-none">Price</th>

                            </tr>
                        </thead>
                        <tbody>



                            <?php 
     $uid = $_SESSION['usersID'];
            
           
           if (isset($_POST['pay'])){
                
        $setpayment = new Payers();

$setpayment->setUser($uid);
 $setpayment->setPaid(1); 
               
$setpayment->updatePayment($_POST['pay']);
               

            }
                            
                             if (isset($_POST['unpay'])){
                
        $setpayment = new Payers();

$setpayment->setUser($uid);
 $setpayment->setPaid(0); 
               
$setpayment->updatePayment($_POST['unpay']);
               

            }

		$bills = $bills->getBills();
		foreach($bills as $item):
	?>
                                <tr class="g-parent" data-details='<div class="media align-items-center ">
                              
                              
                             <div class="d-flex "><a class="btn u-tags-v1 text-center g-width-130 g-brd-around g-brd-teal-v2 g-bg-teal-v2 g-color-white g-rounded-50 g-py-4 g-px-15" href="<?php echo htmlspecialchars($item["site"]); ?>" target="_blank" ><span class="">Pay Bill</span></a></div>
                               
                               <span class="d-flex align-items-center g-color-gray-light-v6 g-ml-40"><i class="hs-admin-calendar g-font-size-18"></i><span class="g-hidden-sm-down g-color-gray-dark-v6 g-ml-8">Due Date</span></span><div class="text-left g-ml-20"><?php   $deadlineformat = new DateTime($item["deadline"]);
    
    echo htmlspecialchars(date_format($deadlineformat, "d-m-Y")); ?></div>
                                
                        
                                
                                <span class="d-flex align-items-center g-color-gray-light-v6 g-ml-40"><i class="hs-admin-key g-font-size-18"></i><span class="g-hidden-sm-down g-color-gray-dark-v6 g-ml-8">Distribution Key</span></span><div class="text-left g-ml-20"><?php 
                                    $keys = new Bills();
                                $key = $keys->getKey($item["type"]);
                                                                   
                                    echo htmlspecialchars($key[0]["type"]);
                                                                   
                                                                   ?></div>
                                
                                <span class="d-flex align-items-center g-color-gray-light-v6 g-ml-40"><i class="hs-admin-user g-font-size-18"></i><span class="g-hidden-sm-down g-color-gray-dark-v6 g-ml-8">Issuer</span></span><div class="text-left g-ml-20"><?php 
                                                                   
                         $users = new User($db);
        $name = $users->getSingleUser($item["owner"]);
                                                                   echo htmlspecialchars($name[0]["username"]); ?></div>                                
        
                              
                                 </div>

                               
                                
                                '>

                                    <td class="js-details-show text-left g-first-child g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">
                                        <span class="d-flex align-items-center">
                        <i class="hs-admin-arrow-circle-down g-font-size-20 g-color-gray-light-v6 d-block g-d-none--parent-opened"></i>
                        <i class="hs-admin-arrow-circle-up g-font-size-20 g-color-lightblue-v3 d-none g-d-block--parent-opened"></i>
                        <span class="g-ml-20"><?php echo htmlspecialchars($item['name']) ?></span>
                                        </span>
                                    </td>
                                    <form method="post" action="">

                                        <?php   if ($item['paid'] == 1) {
    
                echo '<input type="hidden" name="unpay" value="'.htmlspecialchars($item['id']).'"><td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">
                                            <button type="submit" class="u-tags-v1 text-center g-width-100 g-brd-around g-brd-cyan g-bg-cyan g-font-size-default g-color-white g-rounded-50 g-py-4 g-px-15">Paid</button>
                                        </td>';
    
                                    } else {
    
    echo '<input type="hidden" name="pay" value="'.htmlspecialchars($item['id']).'"><td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">
                                            <button type="submit" class="u-tags-v1 text-center g-width-100 g-brd-around g-brd-lightblue-v3 g-bg-lightblue-v3 g-font-size-default g-color-white g-rounded-50 g-py-4 g-px-15">Unpaid</button>
                                        </td>';
} ?>
                                    </form>


                                    <td class="g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">
                                        <?php   $deadlineformat = new DateTime($item['date']);
    
    echo htmlspecialchars(date_format($deadlineformat, 'd F Y')); ?>
                                    </td>
                                    <td class="g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10 g-hidden-sm-down">
                                        <a class="d-block text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 g-color-gray-dark-v5 g-color-yellow--hover rounded-circle g-font-size-20" target="_blank" href="assets/files/<?php echo htmlspecialchars($item['document']); ?>">
                                            <i class="hs-admin-file g-absolute-centered"></i>
                                        </a>
                                    </td>

                                    <td class="text-right g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">
                                        <span>€ <span class="subtotalprice"><?php 
                            $bills = new Bills();                             
           if ($item['type'] == 1)  {
                
                     $calcPrice = $bills->calcLinear($item['billid'], $uid);
                                
            } else if ($item['type'] == 2) {
                
                $calcPrice = $bills->calcCapita($item['billid'], $uid);
            } else if ($item['type'] == 3 ) {
                $calcPrice = $bills->calcArea($item['billid'], $uid);
            }
                                        
             echo htmlspecialchars(number_format((float)$calcPrice[0]['calcPrice'], 2, '.', ''));
 
         	?></span></span>

                                    </td>

                                </tr>



                                <?php endforeach; ?>





                        </tbody>
                    </table>
                </div>

            </div>
            <!-- End Income Card -->



            <!-- Income Card -->

        </div>

        <!-- EIND PADDING-->
    </div>
    <!-- EIND PADDING-->

    <script>
    </script>