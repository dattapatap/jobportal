$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('input[type ="radio"]').on('click', function() {
    $('#next').prop('disabled', false);
});

function startTimers(interval) {
    console.log('sdsds');
    setInterval(displayTimer, 1000);
    setInterval(displayTimerCurrent, 1000);

    setInterval(updateServer, 1000 * (60 * interval));
}

function displayTimer() {
    console.log('sdsds');

    remTime--;
    var mins = Math.floor(remTime / 60);
    var secs = Math.floor(remTime % 60);
    if (remTime < 0)
        updateServer();
    $('#timeRemaining').text(mins.pad(2) + ":" + secs.pad(2));


}

function displayTimerCurrent() {
    currQRemTime--;
    var mins = Math.floor(currQRemTime / 60);
    var secs = Math.floor(currQRemTime % 60);
    if (currQRemTime < 0) {
        $("input:radio[name=options]").attr("disabled", true);
        $('#next').prop('disabled', false);
    }

    if (currQRemTime >= 0)
        $('#currentRemaining').text(mins.pad(2) + ":" + secs.pad(2));
}




function updateServer() {
    $.ajax({
        type: "POST",
        url: "/employee/assessment/updateRemaningTime",
        cache: false,
        success: function(data) {
            console.log(data);
            if (data.status == false) {
                window.location.href = "http://localhost:8000/employee/assessment/testTaken";
            }
        },
        error: function(e) {
            console.log(e.responseText);
        }
    });
}

Number.prototype.pad = function(size) {
    var s = String(this);
    while (s.length < (size || 2)) { s = "0" + s; }
    return s;
}