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
    public function renderSection($sectionName) {
        $filePath = 'render_sections/section-' . strtolower(str_replace('_', '-', $sectionName)) . '.php';
        if (file_exists($filePath)) {
            include $filePath;
        } else {
            echo 'Section not found';
        }
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