<script src="<?php echo $GLOBALS['urlPath'];?>themes/dm-theme/assets/js/content-posts-projects-data-search.js"></script>

<form id="post-list-sort-and-search" data-motion="transition-fade-0" data-duration="0.7s">
    <ul>
        <li>
            <select id="post-category" name="Category:">
                <option value="default">category</option>
            </select>
            <select id="post-date-end" name="Until Date:">
                <option value="default">date</option>
            </select>
            <select id="post-employ" name="Employee:">
                <option value="default">employee</option>
            </select>
            <select id="post-web-platform" name="Web Platform">
                <option value="default">web-platform</option>
            </select>
            <select id="post-web-language" name="Web Language">
                <option value="default">web-language</option>
            </select>
            <select id="post-media-platform" name="Media Platform">
                <option value="default">media-platform</option>
            </select>
        </li>
        <li>
            <input id="post-keywords" class="post-search" placeholder="Search keywords...">
            <button id="search-post" type="submit" class="post-search-submit">Search</button>
        </li>
    </ul>
</form>
