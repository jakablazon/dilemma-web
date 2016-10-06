/**
 * Created by Miha on 28. 09. 2016.
 */
$limit = 0;
$id = 0;

$(document).ready(function () {
    getDbSize();
    $('.left').click(function () {
        increase("left");
        loadNew();
    });
    $('.right').click(function () {
        increase("right");
        loadNew();
    });
    $('.test').click(function () {
        loadNew();
    });
});


function increase(side) {
    $.post("increment.php",
        {
            val: side,
            id: $id
        },
        function (response) {
            var obj = JSON.parse(response);
            alert(obj.message);
        });
}

function getDbSize() {
    $.ajax({
        type: "GET",
        url: "selector.php",
        data: {
            "index": -1
        },
        dataType: "html",
        success: function (response) {
            $limit = response;
            loadNew();
        }
    });
}

function loadNew() {
    $id = Math.floor(Math.random() * $limit) + 1;
    $.ajax({
        type: "GET",
        url: "selector.php",
        data: {
            "index": $id
        },
        dataType: "html",
        success: function (response) {
            var obj = JSON.parse(response);
            $("#left-content").html(obj.option1);
            $("#right-content").html(obj.option2);
            $("#left-img").attr("src", 'assets/' + obj.image1);
            $("#right-img").attr("src", 'assets/' + obj.image2);
        }
    });
}