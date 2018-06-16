<!-- BEGIN CORPUS-->
<div class="col g-ml-45 g-ml-0--lg g-pb-65--md g-bg-gray-light-v5">
    <!-- BEGIN padding -->
    <div class="g-pa-20">
        <!-- begin header tasks-->
        <div class="media">
            <div class="d-flex align-self-center g-mt-10">
                <h1 class="g-font-weight-300 g-font-size-28 g-color-black mb-0">Tasks</h1>
            </div>

            <div class="media-body align-self-center text-right">
                <a class="btn btn-xl u-btn-lightblue-v3 g-width-160--md g-font-size-default g-ml-10" href="add_task.php">New Task
              </a>
            </div>
        </div>

        <hr class="d-flex g-brd-gray-light-v7 g-my-30">
        <div class="media g-mb-30">
            <div class="d-flex align-self-center align-items-center">
                <span class="g-hidden-sm-down g-color-gray-dark-v6 g-mr-12">Type:</span>

                <div class="u-select--v1 g-pr-20">
                    <select class="js-select u-select--v1-select w-100" style="display: none;">
                        <option data-content='<span class="d-flex align-items-center"><span class="u-badge-v2--md g-pos-stc g-transform-origin--top-left g-bg-lightblue-v3 g-mr-8--sm"></span><span class="g-hidden-sm-down g-line-height-1_2 g-color-black">Sharing</span></span>'>Sharing</option>
                        <option data-content='<span class="d-flex align-items-center"><span class="u-badge-v2--md g-pos-stc g-transform-origin--top-left g-bg-darkblue-v2 g-mr-8--sm"></span><span class="g-hidden-sm-down g-line-height-1_2 g-color-black">Request</span></span>'>Request</option>
                        <option data-content='<span class="d-flex align-items-center"><span class="u-badge-v2--md g-pos-stc g-transform-origin--top-left g-bg-teal-v2 g-mr-8--sm"></span><span class="g-hidden-sm-down g-line-height-1_2 g-color-black">Task</span></span>'>Task</option>

                    </select>
                    <i class="hs-admin-angle-down g-absolute-centered--y g-right-0 g-color-gray-light-v6 ml-auto"></i>
                </div>
            </div>



            <div class="media-body align-self-center g-ml-10 g-ml-0--md">
                <div class="input-group g-pos-rel g-max-width-380 float-right">
                    <input class="form-control g-font-size-default g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-rounded-20 g-pl-20 g-pr-50 g-py-10" type="text" placeholder="Search for task">
                    <button class="btn g-pos-abs g-top-0 g-right-0 g-z-index-2 g-width-60 h-100 g-bg-transparent g-font-size-16 g-color-lightred-v2 g-color-lightblue-v3--hover rounded-0" type="submit">
                        <i class="hs-admin-search g-absolute-centered"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- end header tasks-->


        <!-- begin tasks-->
        <table class="table w-100 g-mb-25">
            <thead class="g-hidden-sm-down g-color-gray-dark-v6">
                <tr>

                    <th class="g-bg-gray-light-v8 g-font-weight-400 g-valign-middle g-brd-bottom-none g-py-15">
                        <div class="d-flex align-items-center justify-content-between">
                            Name

                        </div>
                    </th>
                    <th class="g-bg-gray-light-v8 g-font-weight-400 g-valign-middle g-brd-bottom-none g-py-15">
                        <div class="d-flex align-items-center justify-content-between">
                            Title

                        </div>
                    </th>
                    <th class="g-bg-gray-light-v8 g-font-weight-400 g-valign-middle g-brd-bottom-none g-py-15">
                        <div class="d-flex align-items-center justify-content-between">
                            Deadline

                        </div>
                    </th>

                    <th class="g-bg-gray-light-v8 g-font-weight-400 g-valign-middle g-brd-bottom-none g-py-15">
                        <div class="d-flex align-items-center justify-content-between">
                            Type

                        </div>
                    </th>

                    <th class="g-bg-gray-light-v8 g-font-weight-400 g-valign-middle g-brd-bottom-none g-py-15 g-pr-25"></th>
                </tr>
            </thead>

            <tbody class="g-font-size-default g-color-black" id="accordion-09" role="tablist" aria-multiselectable="true">

                <?php 
     $uid = $_SESSION['usersID'];
            
           
           if (isset($_POST['task'])){
                
        $createComment = new Comments();

$createComment->setUser($uid);
$createComment->setMessage($_POST['message']);
               
               if (isset($_POST['state'])) {
                   
                  $createComment->setState($_POST['state']); 
               }
               
               else {
                   
                   $createComment->setState('0');
               }

$createComment->setTask($_POST['task']);
 
        $createComment->addComment();
            }

		$tasks = $tasks->getTasks();
		foreach($tasks as $item):
	?>
                    <tr id="contact-1-header" role="tab">

                        <td class="g-valign-middle g-brd-top-none g-brd-bottom g-brd-gray-light-v7 g-py-15 <g-py-></g-py->30--md g-px-5 g-px-10--sm">
                            <a class="d-flex align-items-center u-link-v5 g-color-black g-color-lightblue-v3--hover g-color-lightblue-v3--opened" href="#contact-<?php echo htmlspecialchars($item['tasksID']) ?>" aria-expanded="false" aria-controls="contact-1" data-toggle="collapse" data-parent="#contacts">
                                <img class="g-width-40 g-width-50--md g-height-40 g-height-50--md g-brd-around g-brd-2 g-brd-transparent g-brd-lightblue-v3--parent-opened rounded-circle g-mr-20--sm" src="assets/img/uploads/<?php 
                                 
                                           $users = new User($db);
$name = $users->getSingleUser($item['owner']);
                                        
                                            echo htmlspecialchars($name[0]['picture']);?>
" alt="Image Description">
                                <span class="g-hidden-sm-down"><?php 
                                 
                                           $users = new User($db);
$name = $users->getSingleUser($item['owner']);
                                        
                                            echo htmlspecialchars($name[0]['username']);?>
</span>
                            </a>
                        </td>
                        <td class="g-valign-middle g-brd-top-none g-brd-bottom g-brd-gray-light-v7 g-py-15 g-py-30--md">
                            <?php echo htmlspecialchars($item['taskname']) ?>
                        </td>
                        <td class="g-hidden-sm-down g-valign-middle g-brd-top-none g-brd-bottom g-brd-gray-light-v7 g-py-15 g-py-30--md g-px-5 g-px-10--sm">
                            <a class="u-link-v5 g-text-break-word g-color-black g-color-cyan--hover" href="">
                                <span class="g-hidden-sm-down"><?php 
    
       $deadlineformat = new DateTime($item['deadline']);
    
    echo htmlspecialchars(date_format($deadlineformat, 'd F Y')); ?></span>
                            </a>
                        </td>


                        <td class="g-hidden-sm-down  g-valign-middle g-brd-top-none g-brd-bottom g-brd-gray-light-v7 g-py-15 g-py-30--md">


                            <?php 
                            
    $types = new Types();
                            $types = $types->getType($item['type']);
                            
                            if ($types[0]['id'] == 1) {
                                echo ' <span class="u-tags-v1 text-center g-width-150--md g-brd-around g-brd-teal-v2 g-bg-teal-v2 g-font-size-12 g-font-size-default--md g-color-white g-rounded-50 g-py-4 g-px-15">Task</span>';
                            } else if ($types[0]['id'] == 2) {
                                 echo '<span class="u-tags-v1 text-center g-width-150--md g-brd-around g-brd-darkblue-v2 g-bg-darkblue-v2 g-font-size-12 g-font-size-default--md g-color-white g-rounded-50 g-py-4 g-px-15">Request</span>';
                            } else {
                                 echo '<span class="u-tags-v1 text-center g-width-150--md g-brd-around g-brd-lightblue-v3 g-bg-lightblue-v3 g-font-size-12 g-font-size-default--md g-color-white g-rounded-50 g-py-4 g-px-15">Sharing</span>';
                            }
                            
                            
                            ?>

                        </td>

                        <td class="g-valign-middle g-brd-top-none g-brd-bottom g-brd-gray-light-v7 g-py-15 g-py-30--md g-px-5 g-px-10--sm g-pr-25">

                            <?php if($uid == $item['owner']) {
    
    echo '<div class="d-flex align-items-center g-line-height-1">
                                <a class="u-link-v5 g-color-gray-light-v6 g-color-cyan--hover g-mr-15" href="edit_task.php?id='.htmlspecialchars($item['tasksID']).'">
                                    <i class="hs-admin-pencil g-font-size-18"></i>
                                </a>
                                <a data-id="'.htmlspecialchars($item['tasksID']).'" class="deleteTask u-link-v5 g-color-gray-light-v6 g-color-cyan--hover" href="#">
                                    <i  class="hs-admin-trash g-font-size-18"></i>
                                </a>
                            </div>';
    
}
                            
                            
                            
                            
                            ?>


                        </td>
                    </tr>
                    <tr>
                        <td class="g-bg-gray-light-v8 g-brd-top-none p-0" colspan="8">
                            <div id="contact-<?php echo htmlspecialchars($item['tasksID']) ?>" class="g-font-weight-400 g-font-size-default g-brd-bottom g-brd-gray-light-v7 g-px-20 g-px-40--md g-py-20 collapse" role="tabpanel" aria-labelledby="contact-1-header">
                                <div class="row">


                                    <div class="col-md-5 g-mb-30 g-mb-0--md">
                                        <h4 class="text-uppercase g-font-size-12 g-font-size-default--md g-color-black g-mb-12">Description</h4>



                                        <p class="g-color-gray-dark-v6 g-mb-20">
                                            <?php echo htmlspecialchars($item['message']) ?>
                                        </p>

                                        <h4 class="text-uppercase g-font-size-12 g-font-size-default--md g-color-black g-mb-18">COMMENTS</h4>
                                        <form action="" method="post">
                                            <div class="g-mt-15 g-mb-15">
                                                <label class="form-check-inline u-check g-mr-20 mx-0 mb-0 g-mt-0 g-pt-0">
                                                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-right-0" name="state" checked="" value="1" type="checkbox">
                                                    <div class="u-check-icon-radio-v7">
                                                        <i class="fa" data-check-icon="&#xf00c"></i>
                                                    </div>
                                                </label>
                                                <small class="form-text-inline text-muted g-font-size-default">Yes, I want to participate.</small>
                                            </div>
                                            <input type="hidden" name="task" value="<?php echo htmlspecialchars($item['tasksID']) ?>">
                                            <div class="g-pos-rel">
                                                <button class="btn u-input-btn--v1 g-width-40 g-bg-primary g-rounded-right-4" type="submit">
                                                    <i class="fa fa-paper-plane g-absolute-centered g-font-size-16 g-color-white"></i>
                                                </button>
                                                <textarea id="inputGroup-1_3" class="form-control form-control-md u-textarea-expandable g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4 g-resize-none g-overflow-hidden" name="message" rows="3" placeholder="Write a comment"></textarea>
                                            </div>
                                        </form>


                                    </div>

                                    <div class="col-md-6">
                                        <h4 class="text-uppercase g-font-size-12 g-font-size-default--md g-color-black g-mb-15">Activity</h4>
                                        <?php 
    $comments = new Comments();
    $comments = $comments->getAllComments($item['tasksID']);
                                 
                               
    
    foreach($comments as $comment) {
    
        $users = new User($db);
        $name = $users->getSingleUser($comment['user']);
        
        
        if ($comment['state'] == 1) {
            
            echo '<div class="media flex-wrap g-brd-bottom g-brd-gray-light-v7 g-py-10">
                                            <div class="d-flex align-self-center g-order-2 g-order-1--md w-200 g-width-auto--md g-mr-15">
                                                
                                               
                                                <span class="u-tags-v1 text-center g-width-150 g-bg-white g-font-size-default g-color-teal-v2 g-rounded-50 g-py-4 g-px-15"><i class="fa fa-handshake-o g-mr-10"></i>'.htmlspecialchars($name[0]['username']).'</span>

                                            </div>

                                            <div class="media-body g-order-1 g-order-2--md g-color-gray-dark-v6 g-mb-10 g-mb-0--md">'.htmlspecialchars($comment['message']).'</div>
                                        </div>';
            
        } else {
            echo '<div class="media flex-wrap g-brd-bottom g-brd-gray-light-v7 g-py-10">
                                            <div class="d-flex align-self-center g-order-2 g-order-1--md w-200 g-width-auto--md g-mr-15">
                                                
                                               
                                                <span class="u-tags-v1 text-center g-width-150 g-color-gray-dark-v2 g-bg-white g-font-size-default g-rounded-50 g-py-4 g-px-15">'.htmlspecialchars($name[0]['username']).'</span>

                                            </div>

                                            <div class="media-body g-order-1 g-order-2--md g-color-gray-dark-v6 g-mb-10 g-mb-0--md">'.htmlspecialchars($comment['message']).'</div>
                                        </div>';
            
        }
    
    
}  ?>



                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <!-- begin
                             1 task-->


                    <?php endforeach; ?>








            </tbody>
        </table>

        <!-- end tasks -->
    </div>
    <!-- EIND PADDING-->