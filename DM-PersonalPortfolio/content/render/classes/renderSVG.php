<?php
require __DIR__ . "/../functions/global-functions.php";


class SVGRenderer {
    private static $icons;

    private static function initIcons() {
        self::$icons = getDataJson('data-icons', 'data');
    }

    public static function hasIcon($name) {
        self::initIcons();
        return isset(self::$icons[$name]);
    }

    public static function renderSVG($name) {
        self::initIcons(); // Initialize icons if not already done
        if (self::hasIcon($name)) {
            echo self::$icons[$name];
        } else {
            echo "<span>SVG icon not found: " . $name . "</span>";
        }
    }

    public static function getSVG($name) {
        self::initIcons(); // Initialize icons if not already done
        if (self::hasIcon($name)) {
            return self::$icons[$name];
        } else {
            return "<span>SVG icon not found: " . $name . "</span>";
        }
    }
}
?>
