$(document).ready(function() {
    var searchButton = $("#search");
    var result = $("#result");
    
    searchButton.on("click", function(element) {
        element.preventDefault();
        var word = $("input").val();
        $.ajax('request.php?q=' + word, {
            method: 'GET'
        }).done(function(response) {
            $("#result").html(response);
        }).fail(function() {
            $("#result").html("There was a problem with the request.");
        });
    });
});