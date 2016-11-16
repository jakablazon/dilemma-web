$(document).ready(function () {
    var id = $("#qid").val();
    $('#left').click(function () {
        increase(id, "count1");
    });
    $('#right').click(function () {
        increase(id, "count2");
    });

    function increase(id, side) {
        if (!getCookie('lockVote')) {
            $.post("/vote",
                {
                    id: id,
                    side: side
                },
                function (response) {
                    setCookie('lockVote', 1);
                    alert(response.message);
                });
        } else {
            alert('You already voted today!')
        }
    }

    function setCookie(key, value) {
        var date = new Date();
        var expirationDate = new Date(date.getFullYear(), date.getMonth(), date.getDate(), 23, 59, 59);
        document.cookie = key + '=' + value + ';expires=' + expirationDate;
    }

    function getCookie(key) {
        var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
        return keyValue ? keyValue[2] : null;
    }
});