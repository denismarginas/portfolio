

<script src="../../themes/dm-theme/assets/js/content-data-index.js"></script>
<script src="../../themes/dm-theme/assets/js/content-data-search.js"></script>

<section class="dm-search-section grid-background-animation">
    <container>
        <div class="dm-search-header">
            <h1>Search</h1>
            <form id="search" class="dm-search-bar">
                <div class="search-input">
                    <input id="post-keywords" class="post-search" placeholder="Search keywords...">
                    <button id="search-post" type="submit" class="post-search-submit">Search</button>
                </div>
                <div id="searched-string-section" class="searched-string-section">
                    <span class="searched-string">keyword</span>
                    <span class="searched-delete">
                        <?php SVGRenderer::renderSVG('close'); ?>
                    </span>
                </div>
            </form>
        </div>
        <ul id="search-list" class="dm-search-list">
            <li class="search-item">
                <a class="search-item-image" href="#">
                    <img src="../../content/img/placeholder/page-placeholder.svg">
                </a>
                <div class="search-item-data">
                    <a class="title" href="#">Title Page</a>
                    <p class="description">This is a short description of meta page.</p>
                </div>
            </li>
        </ul>
    </container>
</section>