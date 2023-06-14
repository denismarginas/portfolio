<?php

class RendererStructure {
    public function header() {
        include 'render_structure/header.php';
        include 'render_structure/body-start.php';
    }

    public function footer() {
        include 'render_structure/body-end.php';
        include 'render_structure/footer.php';
    }
}

class RendererSections {
    public function section_about() {
        include 'render_sections/section-about.php';
    }
    public function section_categories() {
        include 'render_sections/section-categories.php';
    }
    public function section_web_development_experience() {
        include 'render_sections/section-web-development-experience.php';
    }
    public function section_web_development_description() {
        include 'render_sections/section-web-development-description.php';
    }
}
class URLPath {
    private static $urlPaths = [
        'page' => '../../',
        'template' => '../../../'
    ];

    public static function getUrlPaths() {
        return self::$urlPaths;
    }
}

class MediaPath {
    private static $urlPaths = [
        'page' => '../../',
        'template' => '../../../'
    ];

    public static function getUrlPaths() {
        return self::$urlPaths;
    }
}

?>