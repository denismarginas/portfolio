
document.addEventListener("DOMContentLoaded", function() {
    // Construct Form - Start

    var projectsFormId = "#post-list-sort-and-search";

    var filterFields = [
        {
            "name": "category",
            "placeholder": "Category:",
            "type": "select"
        },
        {
            "name": "date-end",
            "placeholder": "Until Date:",
            "type": "select"
        },
        {
            "name": "employ",
            "placeholder": "Employee:",
            "type": "select"
        },
        {
            "name": "web-platform",
            "placeholder": "Web Platform:",
            "type": "select"
        },
        {
            "name": "web-technology",
            "placeholder": "Web Technology:",
            "type": "select"
        },
        {
            "name": "media-platform",
            "placeholder": "Media Platform:",
            "type": "select"
        }
    ];



    var projectsForm = document.querySelector(projectsFormId);

    if (projectsForm) {
        while (projectsForm.firstChild) {
            projectsForm.removeChild(projectsForm.firstChild);
        }
        var projectsFormHTML = "";

        var projectsFormHTML_block1 = "";

        if (filterFields) {
            filterFields.forEach(function(field) {
                projectsFormHTML_block1 += constructPFormField(field);
            });
        }

        var projectsFormHTML_block2 = "";

        projectsFormHTML_block2 += constructPFormFieldInputSearch();
        projectsFormHTML_block2 += constructPFormButtonSubmit();

        projectsFormHTML += '<ul>'
        projectsFormHTML += '<li class="block-1">' + projectsFormHTML_block1 + '</li>'
        projectsFormHTML += '<li class="block-2">' + projectsFormHTML_block2 + '</li>'
        projectsFormHTML += '</ul>'

        projectsForm.innerHTML = projectsFormHTML;
    }
    // Construct Form - End

    var jsonPostsData;

    const currentPageUrl = window.location.href;
    const currentPagePath = currentPageUrl.substring(0, currentPageUrl.lastIndexOf('/') + 1);
    const jsonFilePath = currentPagePath + "content/json/index/index-data-posts-projects.json";

    fetch( jsonFilePath )
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            jsonPostsData = data;
            if (jsonPostsData !== null) {
                var post_category = [];
                var post_year_start_set = new Set();
                var post_year_end_set = new Set();
                var post_web_platform = [];
                var post_web_technology = [];
                var post_media_platform = [];
                var post_employ = [];

                jsonPostsData.forEach(function(item) {
                    // Category
                    if (item["post_data"] && 'categories' in item["post_data"]) {
                        item["post_data"]['categories'].forEach(function(category) {
                            if (!post_category.includes(category)) {
                                post_category.push(category);
                            }
                        });
                    }
                    // Employ
                    if (item["post_data"] && 'employer' in item["post_data"] && !post_employ.includes(item["post_data"]['employer'])) {
                        post_employ.push(item["post_data"]['employer']);
                    }
                    // Date
                    if (item["post_data"] && 'date' in item["post_data"]) {
                        var dateObj = item["post_data"]['date'];

                        if (dateObj['date_start'] && 'date_start' in dateObj) {
                            var yearStart = extractYearFromDate(dateObj['date_start']);
                            if (yearStart !== null) {
                                post_year_start_set.add(yearStart);
                            }
                        }

                        if (dateObj['date_end'] && 'date_end' in dateObj) {
                            var yearEnd = extractYearFromDate(dateObj['date_end']);
                            if (yearEnd !== null) {
                                post_year_end_set.add(yearEnd);
                            }
                        }
                    }

                    // Web Languages
                    if (item["post_data"] && 'web_technology' in item["post_data"]) {
                        item["post_data"]['web_technology'].forEach(function(technology) {
                            var technologyName = technology.name;
                            if (!post_web_technology.includes(technologyName)) {
                                post_web_technology.push(technologyName);
                            }
                        });
                    }

                    // Web Platforms
                    if (item["post_data"] && 'web_platform' in item["post_data"]) {
                        item["post_data"]['web_platform'].forEach(function(platform) {
                            var platformName = platform.name;
                            if (!post_web_platform.includes(platformName)) {
                                post_web_platform.push(platformName);
                            }
                        });
                    }

                    // Media Platform
                    if (item["post_data"] && 'media_platforms' in item["post_data"]) {
                        item["post_data"]['media_platforms'].forEach(function(platform) {
                            var platformName = platform.name;
                            if (!post_media_platform.includes(platformName)) {
                                post_media_platform.push(platformName);
                            }
                        });
                    }
                });

                var post_year_start = Array.from(post_year_start_set).sort(sortAsc);
                var post_year_end = Array.from(post_year_end_set).sort(sortAsc);
                post_category.sort(sortAsc).sort(categorySort);
                post_web_platform.sort(sortAsc);
                post_web_technology.sort(sortAsc);
                post_media_platform.sort(sortAsc);
                post_employ.sort(sortAsc).sort(employSort);

            }
            var postListSortAndSearchElement = document.getElementById("post-list-sort-and-search");


            handleSelect("post-category", post_category);
            handleSelect("post-date-end", post_year_end);
            handleSelect("post-employ", post_employ);3
            handleSelect("post-web-platform", post_web_platform);
            handleSelect("post-web-technology", post_web_technology);
            handleSelect("post-media-platform", post_media_platform);

            document.getElementById("search-post").addEventListener("click", function (event) {
                event.preventDefault();

                // Get the selected values from the select elements
                const selectedCategory = document.getElementById("post-category").value.toLowerCase();
                const selectedDate = document.getElementById("post-date-end").value;
                const selectedEmploy = document.getElementById("post-employ").value.toLowerCase();
                const selectedWebPlatform = document.getElementById("post-web-platform").value;
                const selectedWebLanguage = document.getElementById("post-web-technology").value;
                const selectedMediaPlatform = document.getElementById("post-media-platform").value;
                const searchKeywords = document.getElementById("post-keywords").value.toLowerCase();

                // Iterate through the jsonPostsData and filter the posts
                const postList = document.getElementById("post-list");
                const posts = postList.getElementsByClassName("dm-post-item");
                for (let i = 0; i < jsonPostsData.length; i++) {
                    const postData = jsonPostsData[i]["post_data"];
                    const postCategories = postData["categories"] || []; // No need to convert categories to lowercase
                    const postEmploy = (postData["employer"] || "").toLowerCase();
                    const postWebPlatform = (postData["web_platform"] || []).map(item => item.name);
                    const postWebLanguage = (postData["web_technology"] || []).map(item => item.name);
                    const postMediaPlatform = (postData["media_platforms"] || []).map(item => item.name);
                    const postDateEnd = postData["date"] ? postData["date"]["date_end"]  : "";
                    const postDateStart = postData["date"]  ? postData["date"]["date_start"] : "";

                    // Convert the selected date and post date to numeric years for comparison
                    const selectedYear = selectedDate !== "default" ? parseInt(extractYearFromDate(selectedDate)) : null;
                    const postYear = postDateEnd ? parseInt(extractYearFromDate(postDateEnd)) : null;
                    const postStartYear = postDateStart ? parseInt(extractYearFromDate(postDateStart)) : null;

                    // Check if the post meets the search criteria
                    const selectedCategoryLowercase = selectedCategory.toLowerCase();
                    const matchCategory = selectedCategory === "default" || postCategories.some(category => category.toLowerCase() === selectedCategoryLowercase);
                    const matchDate = selectedDate === "default" ||
                        (selectedYear &&
                            ((postYear && selectedYear <= postYear) && (postStartYear && selectedYear >= postStartYear)));
                    const matchEmploy = selectedEmploy === "default" || postEmploy.includes(selectedEmploy);

                    // Adjust for fields that might not exist in the post datax`R
                    const matchWebPlatform = !selectedWebPlatform || selectedWebPlatform === "default" || postWebPlatform.includes(selectedWebPlatform);
                    const matchWebLanguage = !selectedWebLanguage || selectedWebLanguage === "default" || postWebLanguage.includes(selectedWebLanguage);
                    const matchMediaPlatform = !selectedMediaPlatform || selectedMediaPlatform === "default" || postMediaPlatform.includes(selectedMediaPlatform);

                    // Check if the keywords match any field in the postData object
                    const matchKeywords =
                        !searchKeywords ||
                        includesKeyword(postData, searchKeywords.toLowerCase());


                    if (posts[i]) {
                        // Show/hide the post based on the search result
                        posts[i].style.display = matchCategory && matchDate && matchEmploy && matchWebPlatform && matchWebLanguage && matchMediaPlatform && matchKeywords ? "flex" : "none";

                        // Update the data-motion attribute
                        const dataMotionValue = "transition-fade-1 transition-slideInLeft-1";
                        posts[i].setAttribute("data-motion", dataMotionValue);
                    }
                }
            });
        })
        .catch(error => console.error('Error fetching JSON:', error));
});

function extractYearFromDate(dateStr) {
    var regex = /\b\d{4}\b|\b\d{1,2}\/\d{4}\b|\b\d{2}\.\d{4}\b/g;
    var matches = dateStr.match(regex);
    if (matches && matches.length > 0) {
        return matches[0].split(/[\/.]/).pop();
    }
    return null;
}
function sortAsc(a, b) {
    return a.localeCompare(b);
}
function employSort(a, b) {
    if (a === "Freelancer" || a === "Unspecify") return 1;
    if (b === "Freelancer" || b === "Unspecify") return -1;
    return a.localeCompare(b);
}
function categorySort(a, b) {
    var specialCategories = ["Miscellaneous Projects"];
    if (specialCategories.includes(a)) return 1;
    if (specialCategories.includes(b)) return -1;
    return a.localeCompare(b);
}
function createOptions(selectElement, array) {
    const defaultOptionText = selectElement.getAttribute("name");
    const defaultOption = document.createElement("option");
    defaultOption.value = "default";
    defaultOption.textContent = defaultOptionText;
    selectElement.appendChild(defaultOption);

    array.forEach((item) => {
        const option = document.createElement("option");
        option.value = item; // Use the normal text as the value
        option.textContent = item;
        selectElement.appendChild(option);
    });
}

function clearOptions(selectElement) {
    while (selectElement.firstChild) {
        selectElement.removeChild(selectElement.firstChild);
    }
}
function handleSelect(id, array) {
    const selectElement = document.getElementById(id);
    if (selectElement) {
        clearOptions(selectElement);
        createOptions(selectElement, array);
    }
}
function includesKeyword(data, keyword) {
    if (Array.isArray(data)) {
        return data.some((item) => includesKeyword(item, keyword));
    } else if (typeof data === "object" && data !== null) {
        return Object.values(data).some((value) => includesKeyword(value, keyword));
    } else if (typeof data === "string") {
        return data.toLowerCase().includes(keyword);
    }
    return false;
}

function constructPFormField(field) {
    if (field["type"] == 'select' && field["name"] && field["placeholder"]) {
        var html = '<select id="post-' + field["name"] + '" name="' + field["placeholder"] + '">';
        html += '<option value="default">' + field["placeholder"] + '</option>';
        html += '</select>';
        return html;
    }
}
function constructPFormFieldInputSearch() {
    return '<input id="post-keywords" class="post-search" placeholder="Search keywords...">';
}
function constructPFormButtonSubmit() {
    return '<button id="search-post" type="submit" class="post-search-submit">Search</button>';
}