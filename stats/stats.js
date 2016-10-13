/**
 * Created by jure on 13/10/2016.
 */
$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "stats.php",
        dataType: "html",
        success: function (response) {
            var obj = JSON.parse(response);
            $("#th1").html(obj.option1);
            $("#th2").html(obj.option2);
            $("#td1").html(obj.count1);
            $("#td2").html(obj.count2);
        }
    });
});