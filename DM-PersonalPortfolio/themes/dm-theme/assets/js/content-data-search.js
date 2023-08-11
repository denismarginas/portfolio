document.addEventListener("DOMContentLoaded", function() {

    if (content_data !== null) {
        content_data.sort(sortAsc);

        var search = document.getElementById("search");

        if (search) {
            console.log("Update the sort elements.");
        } else {
            console.log("Element with id 'post-list-sort-and-search' does not exist.");
        }
    }

});