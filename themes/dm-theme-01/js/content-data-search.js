document.addEventListener("DOMContentLoaded", function() {
    var content_data;

    const currentPageUrl = window.location.href;
    const currentPagePath = currentPageUrl.substring(0, currentPageUrl.lastIndexOf('/') + 1);
    const jsonFilePath = currentPagePath + "content/json/index/index-data-pages.json";

    fetch(jsonFilePath)
        .then(response => response.json())
        .then(data => {
            content_data = data;
            
            if (content_data !== null) {

                var searchForm = document.getElementById("search");
                var searchInput = document.getElementById("search-keywords");
                var searchedStringSection = document.getElementById("searched-string-section");
                var searchedString = searchedStringSection.querySelector(".searched-string");
                var searchedDelete = searchedStringSection.querySelector(".searched-delete");
                var searchList = document.getElementById("search-list");
        
                // Create a copy of the original content_data for resetting
                var originalContentData = content_data.slice();
        
                if (searchForm && searchInput && searchedStringSection && searchList) {
                    searchForm.addEventListener("submit", function(event) {
                        event.preventDefault(); // Prevent form submission
        
                        var searchTerm = searchInput.value.trim().toLowerCase();
                        //console.log("Search term:", searchTerm);
        
                        // Clear previous search results
                        searchedString.textContent = "";
                        searchedDelete.style.display = "none";
                        searchList.innerHTML = ""; // Clear the search results list
        
                        // Search logic
                        var searchResults = [];
        
                        content_data.forEach(function(dataItem) {
                            var relevanceScore = 0;
                            for (var key in dataItem) {
                                if (dataItem[key].toLowerCase().includes(searchTerm)) {
                                    relevanceScore++; // Increase relevance score for each matching field
                                }
                            }
                            if (relevanceScore > 0) {
                                searchResults.push({ data: dataItem, relevance: relevanceScore });
                            }
                        });
        
                        // Sort results based on relevance
                        searchResults.sort(function(a, b) {
                            return b.relevance - a.relevance; // Sort in descending order
                        });
        
                        //console.log("Sorted search results:", searchResults);
        
                        // Display the sorted search results in the search list
                        searchResults.forEach(function(result) {
                            var li = document.createElement("li");
                            li.setAttribute("data-motion", "transition-fade-1 transition-slideInLeft-1");
                            li.setAttribute("data-duration", "0.4s");
                            li.className = "search-item";
        
                            var aImage = document.createElement("a");
                            aImage.className = "search-item-image";
                            aImage.href = result.data["page"];
        
                            var img = document.createElement("img");
                            img.src = currentPagePath + "content/img/placeholder/page-placeholder.svg";
                            img.setAttribute("lazy-load", "true");
                            aImage.appendChild(img);
        
                            if (result.data["default-img"] !== "" && result.data["default-img"] !== null) {
                                var previewImage = document.createElement("div");
                                previewImage.setAttribute("class", "preview-image");
        
                                var img_default = document.createElement("img");
                                img_default.src = result.data["default-img"];
                                img_default.setAttribute("lazy-load", "true");
                                previewImage.appendChild(img_default);
                                aImage.appendChild(previewImage);
                            }
        
                            var divData = document.createElement("div");
                            divData.className = "search-item-data";
        
                            var aTitle = document.createElement("a");
                            aTitle.className = "title";
                            aTitle.href = result.data["page"];
                            aTitle.textContent = result.data["meta-title"];
        
                            var pDescription = document.createElement("p");
                            pDescription.className = "description";
                            pDescription.textContent = result.data["meta-description"].substring(0, 130); // Extract the first 130 characters
        
                            divData.appendChild(aTitle);
                            divData.appendChild(pDescription);
        
                            li.appendChild(aImage);
                            li.appendChild(divData);
        
                            searchList.appendChild(li);
                        });
        
                        // Update UI with search term
                        searchedString.textContent = searchTerm;
                        if (searchTerm !== "" && searchTerm !== null) {
                            searchedDelete.style.display = "flex"; // Display the delete button
                        } else {
                            searchedDelete.style.display = "none"; // Hide the delete button
                        }
        
        
                    });
        
                    searchedDelete.addEventListener("click", function() {
                        searchedString.textContent = "";
                        searchedDelete.style.display = "none"; // Hide the delete button
                        searchList.innerHTML = ""; // Clear the search results list
        
                        // Clear the search input
                        searchInput.value = "";
        
                        // Reset the content_data to its original state
                        content_data = originalContentData;
                        // Implement logic to display all the search results again
                    });
                } else {
                    //console.log("Search elements not found.");
                }
            }

        })
        .catch(error => console.error('Error fetching JSON:', error));
});
