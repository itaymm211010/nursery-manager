<?php
/*
Plugin Name: Nursery Manager
Plugin URI: https://github.com/yourusername/nursery-manager
Description: מערכת ניהול משתלה עם זיהוי צמחים וממשק נייד
Version: 1.0.0
Requires at least: 5.8
Requires PHP: 7.4
Author: Your Name
Author URI: https://yourwebsite.com
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: nursery-manager
Domain Path: /languages
*/

if (!defined('ABSPATH')) exit;

// Constants
define('NURSERY_VERSION', '1.0.0');
define('NURSERY_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('NURSERY_PLUGIN_URL', plugin_dir_url(__FILE__));
define('NURSERY_PLUGIN_BASENAME', plugin_basename(__FILE__));

// Autoloader
spl_autoload_register(function ($class) {
    $prefix = 'NurseryManager\\';
    $base_dir = NURSERY_PLUGIN_DIR . 'includes/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

// Main plugin class
class Nursery_Manager {
    private static $instance = null;

    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {
        $this->init_hooks();
    }

    private function init_hooks() {
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));

        add_action('plugins_loaded', array($this, 'load_plugin_textdomain'));
        add_action('init', array($this, 'init'));
    }

    public function activate() {
        require_once NURSERY_PLUGIN_DIR . 'includes/class-activator.php';
        Nursery_Activator::activate();
    }

    public function deactivate() {
        require_once NURSERY_PLUGIN_DIR . 'includes/class-deactivator.php';
        Nursery_Deactivator::deactivate();
    }

    public function load_plugin_textdomain() {
        load_plugin_textdomain(
            'nursery-manager',
            false,
            dirname(NURSERY_PLUGIN_BASENAME) . '/languages/'
        );
    }

    public function init() {
        if (!class_exists('WooCommerce')) {
            add_action('admin_notices', function() {
                ?>
                <div class="error">
                    <p><?php _e('Nursery Manager requires WooCommerce to be installed and active.', 'nursery-manager'); ?></p>
                </div>
                <?php
            });
            return;
        }

        $this->load_dependencies();
        $this->init_components();
    }

    private function load_dependencies() {
        require_once NURSERY_PLUGIN_DIR . 'includes/class-settings.php';
        require_once NURSERY_PLUGIN_DIR . 'includes/class-mobile-interface.php';
        require_once NURSERY_PLUGIN_DIR . 'includes/class-plant-recognition.php';
        require_once NURSERY_PLUGIN_DIR . 'includes/class-ai-handler.php';
        require_once NURSERY_PLUGIN_DIR . 'includes/class-prompt-manager.php';
    }

    private function init_components() {
        new Nursery_Settings();
        new Nursery_Mobile_Interface();
        new Nursery_Plant_Recognition();
        new Nursery_AI_Handler();
        new Nursery_Prompt_Manager();
    }
}

// Initialize plugin
function nursery_manager() {
    return Nursery_Manager::get_instance();
}

// Start the plugin
nursery_manager();