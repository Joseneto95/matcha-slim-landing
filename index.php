<?php
$referrer = $_SERVER['HTTP_REFERER'];
if (strpos($referrer, 'mtwspy') !== false) {
    header("HTTP/1.0 404 Not Found");
    echo '<center><h1>Зарабатывайте больше с AdCombo!</h1><p>Присоединяйтесь к команде <a href="https://adcombo.com">AdCombo</a> и зарабатывайте намного больше!</p></center>';
    exit();
}

// Disable all error reporting
//ini_set('error_reporting', 0);

// Importing libraries
require_once dirname(__FILE__) . '/vendor/autoload.php';
// Importing config file
require_once dirname(__FILE__) . '/config.php';
// Importing our service functions
require_once dirname(__FILE__) . '/lib.php';

// Default content location
$content_path = 'content/';

// Load mobile detection library
use Detection\MobileDetect;

// Detecting mobile devices and rendering mobile version if needed
if (ACLandingConfig::DETECT_MOBILE) {
    $detect = new MobileDetect;
    $is_mobile = $detect->isMobile();
    if (file_exists(dirname(__FILE__) . '/content/mobile') && $is_mobile) {
        $content_path = 'content/mobile/';
    }
}

// Rendering index of our content
Render_Template($content_path, $is_mobile);
