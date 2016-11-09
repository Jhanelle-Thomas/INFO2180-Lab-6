$(document).ready(function() {
    var searchButton = $("#search");
    var searchAllButton = $("#searchAll");
    var result = $("#result");
    
    searchButton.on("click", function(element) {
        element.preventDefault();
        var word = $("input").val();
        if (word != "") {
            $.ajax("request.php?q=" + word, {
                method: 'GET'
            }).done(function(response) {
                $(result).html(response);
            }).fail(function() {
                $(result).html("There was a problem with the request.");
            });     
        } else {
            $(result).html("Please enter a word.");
        }
    });
    
    searchAllButton.on("click", function(element) {
        element.preventDefault();
        var list = document.createElement("ol");
        $.ajax("request.php?q=&all=true", {
            method: 'GET',
            dataType: "xml"
        }).done(function(response) {
            var definitions = $(response).find("item");
            $(definitions).each(function() {
                var listItem = document.createElement("li");
                var heading = document.createElement("h3");
                var para1 = document.createElement("p");
                var para2 = document.createElement("p");
                
                $(heading).text($(this).find("word").text().toUpperCase());
                $(para1).text($(this).find("definition").text());
                $(para2).text("- " + $(this).find("author").text());
                
                $(listItem).append($(heading));
                $(listItem).append($(para1));
                $(listItem).append($(para2));
                $(list).append($(listItem));
            });
            $(result).html($(list));
        }).fail(function() {
            $(result).html("There was a problem with the request.");
        });
    });
});