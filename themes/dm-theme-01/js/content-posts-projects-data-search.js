document.addEventListener("DOMContentLoaded", async function() {
    var projectsFormId = "#post-list-sort-and-search";

    try {
        const getPageUrl = window.location.href;
        const getPagePath = getPageUrl.substring(0, getPageUrl.lastIndexOf('/') + 1);
        const jsonFilterFilePath = getPagePath + "content/json/data/data-posts-projects-filter-fields.json";
        const jsonFilePath = getPagePath + "content/json/index/index-data-posts-projects.json";

        const filterFields = await fetchJson(jsonFilterFilePath);
        const projectsData = await fetchJson(jsonFilePath);

        constructFilterFields(filterFields, projectsFormId);

        const searchPostButton = document.getElementById("search-post");
        if (searchPostButton) {
            searchPostButton.addEventListener("click", function (event) {
                event.preventDefault();
                searchProjectsWithFilters(filterFields, projectsData);
                updateQueryAmount();
            });
        } else {
            console.log("The search button was not found.");
        }

        extractOptionsFieldsJsonProjects(filterFields, projectsData);

    } catch (error) {
        console.error('Error:', error);
    }
});

function searchProjectsWithFilters(filterFields, projectsData) {
    if (!projectsData) {
        console.error("Error: projectsData is empty or undefined.");
        return;
    }

    if (!filterFields || !Array.isArray(filterFields)) {
        console.error("Error: filterFields is empty or not an array.");
        return;
    }

    const filterValues = {};

    filterFields.forEach(filter => {
        const id = filter.id;
        const element = document.getElementById(id);
        if (element) {
            filterValues[id] = element.value.toLowerCase();
        }
    });

    const searchKeywordsElement = document.getElementById("post-keywords");
    const searchKeywords = searchKeywordsElement ? searchKeywordsElement.value.toLowerCase() : "";

    const projectList = document.getElementById("post-list");
    const projects = projectList.getElementsByClassName("dm-post-item");

    for (let i = 0; i < projectsData.length; i++) {
        const postData = projectsData[i]["post_data"];
        let isVisible = true;

        filterFields.forEach(filter => {
            const id = filter.id;
            const filterValue = filterValues[id];
            const fieldValue = getValueFromJsonPath(projectsData[i], filter["json-path"]);

            if (fieldValue) {
                if (filter["json-type"] === "array" && Array.isArray(fieldValue)) {

                    const valuesArray = fieldValue.map(item => filter["json-get"] ? item[filter["json-get"]].toLowerCase() : item.toLowerCase());
                    if (!valuesArray.includes(filterValue) && filterValue !== "default" && filterValue !== "") {
                        isVisible = false;
                    }
                }
                else if(filter["json-type"] == "string") {

                    const singleValue = filter["json-get"] ? fieldValue[filter["json-get"]].toLowerCase() : fieldValue.toLowerCase();

                    if (singleValue !== filterValue && filterValue !== "default" && filterValue !== "") {
                        isVisible = false;
                    }
                }
                else if (filter["json-type"] == "date") {
                    const projectYear = extractYearFromDate(fieldValue);
                    const filterYear = extractYearFromDate(filterValue);

                    if (projectYear && filterYear) {
                        switch (filter["json-date-search-mode"]) {
                            case "<":
                                if (parseInt(projectYear) >= parseInt(filterYear)) {
                                    isVisible = false;
                                }
                                break;
                            case ">":
                                if (parseInt(projectYear) <= parseInt(filterYear)) {
                                    isVisible = false;
                                }
                                break;
                            case "<=":
                                if (parseInt(projectYear) > parseInt(filterYear)) {
                                    isVisible = false;
                                }
                                break;
                            case ">=":
                                if (parseInt(projectYear) < parseInt(filterYear)) {
                                    isVisible = false;
                                }
                                break;
                            case "=":
                            default:
                                if (parseInt(projectYear) !== parseInt(filterYear)) {
                                    isVisible = false;
                                }
                                break;
                        }
                    }
                }
            } else if (filterValue !== "default" && filterValue !== "") {
                isVisible = false;
            }
        });

        if (searchKeywords !== "") {
            const postTextContent = JSON.stringify(postData).toLowerCase();
            if (!postTextContent.includes(searchKeywords)) {
                isVisible = false;
            }
        }

        projects[i].style.display = isVisible ? "flex" : "none";

        const dataMotionValue = "transition-fade-1 transition-slideInLeft-1";
        projects[i].setAttribute("data-motion", dataMotionValue);
    }
}


function extractOptionsFieldsJsonProjects(filterFields, projectsData) {
    if (!projectsData) {
        console.error("Error: projectsData is empty or undefined.");
        return;
    }

    if (!filterFields || !Array.isArray(filterFields)) {
        console.error("Error: filterFields is empty or not an array.");
        return;
    }

    // Initialize filterOptions dynamically based on filterFields
    filterFields.forEach(filter => {
        const { id, "json-path": jsonPath, "json-type": jsonType, "json-get": jsonGet, style } = filter;
        const selectElement = document.getElementById(id);

        if (!selectElement) {
            console.error(`Error: select element with ID '${id}' not found.`);
            return;
        }

        selectElement.innerHTML = `<option value="default">${filter.placeholder || ""}</option>`;

        const options = new Set(); // Use a Set to store unique options
        projectsData.forEach(item => {
            const value = getValueFromJsonPath(item, jsonPath);
            if (value !== undefined) {
                if (Array.isArray(value)) {
                    value.forEach(item => {
                        let option = jsonGet ? item[jsonGet] : item;
                        if (jsonType === "date") { // Check if jsonType is "date"
                            option = extractYearFromDate(option); // Extract year if it's a date
                        }
                        if (option !== undefined && !options.has(option)) { // Check if option is not already added
                            options.add(option);
                            appendOption(selectElement, option, style);
                        }
                    });
                } else {
                    let option = jsonGet ? value[jsonGet] : value;
                    if (jsonType === "date") { // Check if jsonType is "date"
                        option = extractYearFromDate(option); // Extract year if it's a date
                    }
                    if (option !== undefined && !options.has(option)) { // Check if option is not already added
                        options.add(option);
                        appendOption(selectElement, option);
                    }
                }
            }
        });
    });
}

function appendOption(selectElement, option, style) {
    const optionElement = document.createElement("option");
    optionElement.value = option;
    optionElement.textContent = option;
    if (style && typeof style === "string") {
        optionElement.setAttribute("style", style);
    }
    selectElement.appendChild(optionElement);
}

function getValueFromJsonPath(item, jsonPath) {
    if (!jsonPath) return undefined;

    const paths = jsonPath.replace(/\['([^']+)'\]/g, '.$1').split('.').filter(path => path !== ''); // Filter out empty strings
    let value = item;

    paths.forEach(path => {
        value = value ? value[path] : undefined;
    });

    return value;
}


function constructFilterFields(filterFields, projectsFormId) {
    var projectsForm = document.querySelector(projectsFormId);

    if (projectsForm) {
        while (projectsForm.firstChild) {
            projectsForm.removeChild(projectsForm.firstChild);
        }
        var projectsFormHTML = "";

        var projectsFormHTML_block1 = "";
        var projectsFormHTML_block2 = "";

        if (filterFields) {
            filterFields.forEach(function(field) {
                projectsFormHTML_block1 += constructPFormField(field);
            });
        }

        projectsFormHTML_block2 += constructPFormFieldInputSearch();
        projectsFormHTML_block2 += constructPFormButtonSubmit();

        projectsFormHTML += '<ul>'
        projectsFormHTML += '<li id="block-filters" class="block-1">' + projectsFormHTML_block1 + '</li>'
        projectsFormHTML += '<li id="block-search" class="block-2">' + projectsFormHTML_block2 + '</li>'
        projectsFormHTML += '</ul>'


        projectsForm.innerHTML = projectsFormHTML;

        appendIconsWithToggle(filterFields, projectsForm, ".block-2")
    }
}

async function appendIconsWithToggle(filterFields, projectsForm, blockClass) {
    if (filterFields.length > 8) {
        const icons = [
            ["filter-query", "query-text", "hide"],
            ["filter", "block-filters", "show"]
        ];

        var blockElement = projectsForm.querySelector(blockClass);
        blockElement.classList.add("advance-search");

        if (blockElement) {
            const searchInputDiv = document.createElement('div');
            searchInputDiv.className = 'search-input';

            const toggleIconsDiv = document.createElement('div');
            toggleIconsDiv.className = 'toggle-icons';

            const queryDiv = document.createElement('div');
            queryDiv.className = 'query-text collapse';
            queryDiv.id = 'query-text';

            searchInputDiv.innerHTML = blockElement.innerHTML;
            blockElement.innerHTML = '';

            blockElement.appendChild(searchInputDiv);
            blockElement.appendChild(toggleIconsDiv);
            blockElement.appendChild(queryDiv);

            icons.forEach(([iconName, sectionId, display]) => {
                getIconSVG(iconName).then((filterIcon) => {
                    if (filterIcon) {
                        const iconDiv = document.createElement('div');
                        iconDiv.id = `toggle-${iconName}`;
                        iconDiv.className = 'icon';
                        iconDiv.setAttribute('aria-controls', sectionId);
                        iconDiv.setAttribute('data-toggle', 'collapse');
                        var expandDisplay = "false"
                        if (display === "show") {
                            expandDisplay = "true"
                        }
                        iconDiv.setAttribute('aria-expanded', expandDisplay);
                        iconDiv.innerHTML = filterIcon;
                        toggleIconsDiv.appendChild(iconDiv);

                        const sectionElement = document.getElementById(sectionId);
                        if (sectionElement) {
                            const isExpanded = iconDiv.getAttribute('aria-expanded') === 'true';
                            sectionElement.setAttribute('data-toggle-animation', 'collapse');

                            if (isExpanded) {
                                sectionElement.setAttribute('data-display', 'show');
                            } else {
                                sectionElement.setAttribute('data-display', 'hide');
                            }
                        }
                    }
                });
            });

            var query_amount = countVisibleProjects();

            queryDiv.innerHTML = 'Showing <span id="query-amount">' + query_amount + '</span> results.';
        }
    }
}

function countVisibleProjects() {
    const projectListElement = document.getElementById("post-list");
    const projects = projectListElement.getElementsByClassName("dm-post-item");

    let count = 0;
    for (let i = 0; i < projects.length; i++) {
        const style = window.getComputedStyle(projects[i]);
        if (style.display === 'flex') {
            count++;
        }
    }
    return count;
}

function updateQueryAmount() {
    const queryAmountElement = document.getElementById("query-amount");
    queryAmountElement.innerText = "(loading...)";
    setTimeout(() => {
        const visibleCount = countVisibleProjects();
        queryAmountElement.innerText = visibleCount;
    }, 100);
}

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
        option.value = item;
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
    var html ='';
    html += '<div class="filter">';

    if (field["label"]) {
        html += '<label>' + field["label"] + '</label>';
    }
    var style ='';
    if (field["style"] && typeof field["style"] === "string") {
        style =  'style="' + field["style"] + '"';
    }
    if (field["type"] == 'select' && field["name"] && field["placeholder"]) {
        html += '<select id="post-' + field["name"] + '" name="' + field["name"] + '" data-placeholder-value="'  + field["placeholder"] + '"'  + style +  '>';
        html += '<option value="default">' + field["placeholder"] + '</option>';
        html += '</select>';

    }
    html += '</div>';

    return html;
}

function constructPFormFieldInputSearch() {
    return '<input id="post-keywords" class="post-search" placeholder="Search keywords...">';
}

function constructPFormButtonSubmit() {
    return '<button id="search-post" type="submit" class="post-search-submit">Search</button>';
}
function getIconSVG(name) {
    const getPageUrl = window.location.href;
    const getPagePath = getPageUrl.substring(0, getPageUrl.lastIndexOf('/') + 1);
    const jsonIcons = getPagePath + "content/json/data/data-icons.json";

    return fetch(jsonIcons)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data[name]) {
                return data[name];
            } else {
                console.error(`Icon with name "${name}" not found.`);
                return '';
            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
            return '';
        });
}

async function fetchJson(url) {
    const response = await fetch(url);
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.json();
}