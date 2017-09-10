/**
 *  sendrequest file will manage the click action for view log button and pagination links.
 */
$(document).ready(function() {

    //executes code below when user click on pagination links
    $("#results").on( "click", ".pagination_logs a", function (e){
        e.preventDefault();
        $(".loading-div").show(); //show loading element
        var page = $(this).attr("data-page"); //get page number from link
        $("#results").load("fetch_pages.php",{"page":page,file:$("#pathToFile").val()}, function(){ //get content from PHP page
            $(".loading-div").hide(); //once done, hide loading element
        });

    });

    //executes code below when user click on View Log button.
    $("#viewLogFileBtn").on( "click", function (e) {
        e.preventDefault();
        $(".loading-div").show(); //show loading element
        var page = 1;
        $("#results").load("fetch_pages.php",{"page":page,file:$("#pathToFile").val()}, function(){ //get content from PHP page
            $(".loading-div").hide(); //once done, hide loading element
        });
    })
});