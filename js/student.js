$(function() {
    //alert("You are a Student");
    $('.disabledP').hide();
    var student_id = $('.listOfDays').attr("st-id");
    getDaysOfStudent(student_id);


    // add Activity
    $('.addActivity').click(function(e) {
        e.preventDefault();
        $('.disabledP').fadeIn();
        $('.addActivityForm').submit(function(event) {
            event.preventDefault();

            console.log("Form is being submited");
            addActivity();


        });

    });






    //getProress

});



function addActivity() {
    var student_id = $('.addActivityForm').attr("st-id");
    var day_no = $('.addActivityForm .day_no').val();
    var activity_details = $('.addActivityForm .activity_details').val();


    var formdata = {
        "student_id": student_id,
        "day_no": day_no,
        "activity_details": activity_details
    };

    var formSettings = {
        "type": "POST",
        //"dataType": "json",
        "data": formdata,
        "url": "api/logbook/add",
    };

    $.ajax(formSettings).success(function(response) {
        alert(JSON.stringify(formdata));
        if (response.status == 'failed' || response.status == 'error') {
            console.log(JSON.stringify(response));
            notify("Activity not Created Please check your submited details", "warning");
        } else if (response.status == 'success') {
            $('.addActivityForm')[0].reset();
            console.log(JSON.stringify(response));
            notify("Activity Created", "success");
            $('.disabledP').fadeOut();
            getDaysOfStudent(student_id);

        } else {

        }

    });

}

function studentProgress(id = "") {

}

function getDaysOfStudent(id = "") {
    var formsSettings = {
        "type": "GET",
        "dataType": "json",
        "url": "api/progress/" + id,
    };


    $.ajax(formsSettings).success(function(response) {
        $('.day_no_list').html("");

        if (response.status == 'failed' || response.status == 'error') {

            notify("You have not Added To your Logbook Please Add some thing", "warning");

        } else if (response.status == 'success') {
            var elementV = response.data;
            var progressP = response.percentage;
            $('.progressP').html("");
            $('.progressP').html(progressP);

            var appendData = "";
            $.each(elementV, function(key, value) {
                appendData += ' &nbsp; <a href="' + value.day_no + '" class="dayBtn btn btn-sm btn-default">' + value.day_no + '</a> &nbsp; ';

            });
            $('.day_no_list').html(appendData);

            $('.dayBtn').click(function(event) {
                event.preventDefault();
                var dayNox = $(this).attr('href');
                var std = $('.listOfDays').attr("st-id");
                activityByDay(dayNox, std);
            });


        }



    });

}


function activityByDay(id = "", st = "") {
    $('.disabledP').fadeIn();
    var formsSettings = {
        "type": "GET",
        "dataType": "json",
        "url": "api/activity/" + id + "/" + st,
    };


    $.ajax(formsSettings).success(function(response) {
        $('.activity_list').html("");

        if (response.status == 'failed' || response.status == 'error') {

            notify("There are no Activities", "warning");
            $('.disabledP').hide();

        } else if (response.status == 'success') {
            var elementV = response.data;

            var appendData = "";
            $.each(elementV, function(key, value) {
                appendData += '<p class="alert alert-success" href="' + value.id + '">' + value.activity_details + '<button href="' + value.id + '" class="delActivity pull-right btn btn-danger btn-xs">x</button></p><br>';

            });
            $('.activity_list').html(appendData);

            $('.delActivity').click(function(event) {
                event.preventDefault();
                var actId = $(this).attr('href');
                activityDel(actId);
            });

        }



    });

}

function activityDel(actId = "") {
    var formsSettings = {
        "type": "GET",
        "dataType": "json",
        "url": "api/activity/delete/" + id
    };

    $.ajax(formsSettings).success(function(response) {
        $('.activity_list').html("");

        if (response.status == 'failed' || response.status == 'error') {

            notify("There are no Activities", "warning");
            $('.disabledP').hide();

        } else if (response.status == 'success') {
            var elementV = response.data;

            var appendData = "";
            $.each(elementV, function(key, value) {
                appendData += '<p class="alert alert-success" href="' + value.id + '">' + value.activity_details + '<button href="' + value.id + '" class="delActivity pull-right btn btn-danger btn-xs">x</button></p><br>';

            });
            $('.activity_list').html(appendData);

            $('.delActivity').click(function(event) {
                event.preventDefault();
                var actId = $(this).attr('href');
                activityDel(actId);
            });

        }



    });
}