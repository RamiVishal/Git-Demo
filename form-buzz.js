$(document).ready(function () {
    $(".click1").click(function () {
        if (parseInt($('#ispopupopen').val())) {
            $('#onload').modal('show');
            $('#ispopupopen').val(0);
        }
    });
    $(".click2").click(function () {
        if (parseInt($('#ispopupopen').val())) {
            $('#onload1').modal('show');
            $('#ispopupopen').val(0);
        }
    });
    $("#onload").on('hide.bs.modal', function () {
        $('#ispopupopen').val(1);
        onClick();
    });

    $("#onload1").on('hide.bs.modal', function () {
        $('#ispopupopen').val(1);
        onClick();
    });

    $(".stick_close").click(function () {
        if (parseInt($('#ispopupopen').val())) {
            $('#onload').modal('hide');
            $('#ispopupopen').val(1);
        }
    });

});



g_timer = null;


$(document).ready(function () {
    startTimer();
});

function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}


function buzzbtn() {
    $('.sticklist').addClass('vibrate-3');
    //$('#sideService').addClass('open');
    setTimeout(function () {
        //$('#sideService').removeClass('open');
        $('.sticklist').removeClass('vibrate-3');

    }, 10000);
}

$(".sticklist ").mouseover(function () {
    $(this).removeClass('vibrate-3');
});



function startTimer() {
    g_timer = window.setInterval(function () {
        // var today = new Date();
        var cookiesisset = getCookie('isloadopenmodel');
        console.log(parseInt($('#ispopupopen').val()) + "---" + cookiesisset);
        if (parseInt($('#ispopupopen').val()) && $('#inquiery-model').val() != 'inquiryset' && parseInt(cookiesisset) != '1') {
            $('#onload').modal('show');
            $('#ispopupopen').val(0);
            document.cookie = "isloadopenmodel=1";
            //buzzbtn();
        } else if (parseInt($('#ispopupopen').val()) && cookiesisset == '1') {
            // $('#onload').modal('show');
            // $('#ispopupopen').val(0);
            buzzbtn();
        }
    }, 20000);
}

function onClick() {
    clearTimeout(g_timer);
    // var today = new Date();
    // console.log("cancle model" + today)
    startTimer();
}



// phone number validation 
$(".number21").keypress(function (e) {
    //if the letter is not digit then display error and don't type anything
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
        return false;
    }
});


jQuery(document).ready(function () {
    jQuery(".open-close-arrow").click(function () {
        jQuery(".open-close-arrow").toggleClass("open");
        jQuery(".sticklist ul").toggleClass("open");
    });
});



// redirect link

// var hreff = $("#lnnk").attr('href');
// setTimeout(
//     function () {
//         window.location = hreff;
//     }, 5000);