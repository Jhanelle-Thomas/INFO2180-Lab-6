$(document).ready(function() {
    var searchButton = $("#search");
    
    searchButton.on("click", function() {
        $.ajax('request.php?q=definition', {
            method: 'GET'
        }).done(function(response) {
            alert(response);
        }).fail(function() {
            alert("There was a problem with the request.");
        });
    });
});