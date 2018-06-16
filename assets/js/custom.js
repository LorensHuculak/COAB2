$(document).ready(function () {

    $(".deleteTask").click(function (event) {

        //BUTTON WAS CLICKED
        var $tasksid = $(this).attr("data-id");
        var $element = $(this).parent().parent().parent();
        //SUBMIT DATA USING AJAX CALL
        $.ajax({
            type: "POST"
            , data: {
                'tasksid': $tasksid
            }
            , url: "ajax/remove_task.php"
            , success: function (msg) {


                $element.remove();

            }
            , error: function () {

            }
        });

    });


    $(".deleteEvent").click(function (event) {

        //BUTTON WAS CLICKED
        var $eventsid = $(this).attr("data-id");
        var $element = $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent();
        //SUBMIT DATA USING AJAX CALL
        $.ajax({
            type: "POST"
            , data: {
                'eventsid': $eventsid
            }
            , url: "ajax/remove_event.php"
            , success: function (msg) {


                $element.remove();

            }
            , error: function () {

            }
        });

    });


    $(".deleteVote").click(function (event) {

        //BUTTON WAS CLICKED
        var $votesid = $(this).attr("data-id");
        var $element = $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent();
        //SUBMIT DATA USING AJAX CALL
        $.ajax({
            type: "POST"
            , data: {
                'votesid': $votesid
            }
            , url: "ajax/remove_vote.php"
            , success: function (msg) {


                $element.remove();

            }
            , error: function () {

            }
        });

    });

    $(".deleteBill").click(function (event) {

        //BUTTON WAS CLICKED
        var $billsid = $(this).attr("data-id");
        var $element = $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent();
        //SUBMIT DATA USING AJAX CALL
        $.ajax({
            type: "POST"
            , data: {
                'billsid': $billsid
            }
            , url: "ajax/remove_bill.php"
            , success: function (msg) {


                $element.remove();

            }
            , error: function () {

            }
        });

    });

    $(".deleteChoice").click(function (event) {

        //BUTTON WAS CLICKED
        var $choicesid = $(this).attr("data-id");
        var $element = $(this).parent().parent();
        //SUBMIT DATA USING AJAX CALL
        $.ajax({
            type: "POST"
            , data: {
                'choicesid': $choicesid
            }
            , url: "ajax/remove_choice.php"
            , success: function (msg) {


                $element.remove();

            }
            , error: function () {

            }
        });

    });

    $(".deletePayer").click(function (event) {

        //BUTTON WAS CLICKED
        var $payersid = $(this).attr("data-id");
        var $element = $(this).parent().parent();
        //SUBMIT DATA USING AJAX CALL
        $.ajax({
            type: "POST"
            , data: {
                'payersid': $payersid
            }
            , url: "ajax/remove_payer.php"
            , success: function (msg) {


                $element.remove();

            }
            , error: function () {

            }
        });

    });


});