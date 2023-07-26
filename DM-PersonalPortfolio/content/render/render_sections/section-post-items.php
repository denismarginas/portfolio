<?php $posts = extractDataPosts( __DIR__ . "/../render_posts/" ); ?>
<?php
$search_and_sort_bar = true;
?>



<section class="dm-posts-list grid-background-animation">
    <container>
        <?php if(isset($search_and_sort_bar) ) : ?>
        <script>
            var jsonPostsData = <?php echo json_encode($posts, JSON_HEX_APOS) ?>;
            //console.log(jsonPostsData);

            document.addEventListener("DOMContentLoaded", function() {
                if (jsonPostsData !== null) {
                    var post_category = [];
                    var post_year_start_set = new Set();
                    var post_year_end_set = new Set();
                    var post_web_platform = [];
                    var post_web_language = [];
                    var post_media_platform = [];
                    var post_employ = [];

                    jsonPostsData.forEach(function(item) {
                        // Category
                        if (item[1] && 'categories' in item[1]) {
                            item[1]['categories'].forEach(function(category) {
                                if (!post_category.includes(category)) {
                                    post_category.push(category);
                                }
                            });
                        }
                        // Employ
                        if (item[1] && 'employ' in item[1] && !post_employ.includes(item[1]['employ'])) {
                            post_employ.push(item[1]['employ']);
                        }
                        // Date
                        if (item[1] && 'date' in item[1]) {
                            var dateObj = item[1]['date'];

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
                        if (item[1] && 'web_languages' in item[1]) {
                            item[1]['web_languages'].forEach(function(language) {
                                var languageName = language.name;
                                if (!post_web_language.includes(languageName)) {
                                    post_web_language.push(languageName);
                                }
                            });
                        }

                        // Web Platforms
                        if (item[1] && 'web_platform' in item[1]) {
                            item[1]['web_platform'].forEach(function(platform) {
                                var platformName = platform.name;
                                if (!post_web_platform.includes(platformName)) {
                                    post_web_platform.push(platformName);
                                }
                            });
                        }

                        // Media Platform
                        if (item[1] && 'media_platforms' in item[1]) {
                            item[1]['media_platforms'].forEach(function(platform) {
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
                    post_web_language.sort(sortAsc);
                    post_media_platform.sort(sortAsc);
                    post_employ.sort(sortAsc).sort(employSort);


                    console.log("Categories:", post_category);
                    console.log("Year Start:", post_year_start);
                    console.log("Year End:", post_year_end);
                    console.log("Employees:", post_employ);
                    console.log("Web Platforms:", post_web_platform);
                    console.log("Web Languages:", post_web_language);
                    console.log("Media Platforms:", post_media_platform);
                }
                var postListSortAndSearchElement = document.getElementById("post-list-sort-and-search");

                if (postListSortAndSearchElement) {
                    console.log("Update the sort elements.");
                } else {
                    console.log("Element with id 'post-list-sort-and-search' does not exist.");
                }

            });
            function extractYearFromDate(dateStr) {
                // Regular expression to match year in various date formats
                var regex = /\b\d{4}\b|\b\d{1,2}\/\d{4}\b|\b\d{2}\.\d{4}\b/g;
                var matches = dateStr.match(regex);

                if (matches && matches.length > 0) {
                    return matches[0].split(/[\/.]/).pop(); // Extract the year from the last match
                }

                return null; // Return null if no valid year found
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
        </script>
        <form id="post-list-sort-and-search">
            <ul>
                <li>
                    <select class="post-category">
                        <option value="default">category</option>
                    </select>
                    <select class="post-date">
                        <option value="default">date</option>
                    </select>
                    <select class="post-employ">
                        <option value="default">employ</option>
                    </select>
                    <select class="post-web-platform">
                        <option value="default">web-platform</option>
                    </select>
                    <select class="post-web-language">
                        <option value="default">web-language</option>
                    </select>
                    <select class="post-media-platform">
                        <option value="default">media-platform</option>
                    </select>
                </li>
                <li>
                    <input class="post-search" placeholder="Search keywords...">
                    <button type="submit" class="post-search-submit">Search</button>
                </li>
            </ul>
        </form>

        <?php endif; ?>
        <ul id="post-list">
            <?php foreach ($posts as $post) : ?>
                <?php
                $post_path = pathinfo($post[0], PATHINFO_FILENAME).".html";
                $post_data = $post[1];
                ?>
                <?php if( isset($post_data["display"] ) && ( $post_data["display"] == "enable") ) : ?>
                    <li class="dm-post-item" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.4s" >
                        <?php if( strtoupper($post_data["colors"]["post_color_background"]) == "#FFFFFF") :
                            $shine_animation = 'data-animation="shine-gray"';
                        else :
                            $shine_animation = 'data-animation="shine"';
                        endif; ?>
                        <a class="dm-post-item-logo" href="<?php echo $post_path; ?>" <?php echo $shine_animation; ?>
                           style="background-color: <?php echo $post_data["colors"]["post_color_background"]; ?>;">
                            <?php echo renderLogoPost($post_data); ?>
                        </a>
                        <div class="dm-post-item-details">
                            <ul class="dm-post-item-categories">
                                <?php foreach ($post_data["categories"] as $post_category) : ?>
                                    <li>
                                        <span><?php echo $post_category;?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <a class="dm-post-item-title" href="<?php echo $post_path; ?>">
                                <?php echo $post_data["title"]; ?>
                            </a>
                            <p class="dm-post-item-description">
                                <?php echo getFirstCharacters($post_data["description"], 130); ?>
                            </p>
                        </div>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </container>
</section>