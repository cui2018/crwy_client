(function(){
    $(function(){
        var feedbackul = $(".feedbackul");
        feedbackul[0].addEventListener("click", function() {
            window.location.href = u("feedback/game.html")
        });
        feedbackul[1].addEventListener("click", function() {
            window.location.href = u("feedback/pay.html")
        });
        feedbackul[2].addEventListener("click", function() {
            window.location.href = u("feedback/advice.html")
        });
        feedbackul[3].addEventListener("click", function() {
            window.location.href = u("feedback/agent.html")
        });
        feedbackul[4].addEventListener("click", function() {
            window.location.href = u("feedback/cheat.html")
        });
        feedbackul[5].addEventListener("click", function() {
            window.location.href = u("feedback/jec.html")
        });
        feedbackul[6].addEventListener("click", function() {
            window.location.href = u("feedback/watch.html")
        });
        feedbackul[7].addEventListener("click", function() {
            window.location.href = u("feedback/others.html")
        });
    })
})()