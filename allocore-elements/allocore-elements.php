<?php
/**
 * Plugin Name: Allocore Elements
 * Description: Custom Elementor widgets for Allocore theme.
 * Version: 1.0.0
 * Author: Allocore
 * Text Domain: allocore-elements
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Main Allocore Elements Class
 */
final class Allocore_Elements {

    /**
     * Plugin Version
     */
    const VERSION = '1.0.0';

    /**
     * Minimum Elementor Version
     */
    const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

    /**
     * Minimum PHP Version
     */
    const MINIMUM_PHP_VERSION = '7.0';

    /**
     * Instance
     */
    private static $_instance = null;

    /**
     * Instance
     */
    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Constructor
     */
    public function __construct() {
        add_action('init', [$this, 'i18n']);
        add_action('plugins_loaded', [$this, 'init']);
    }

    /**
     * Load Textdomain
     */
    public function i18n() {
        load_plugin_textdomain('allocore-elements');
    }

    /**
     * Initialize the plugin
     */
    public function init() {
        // Check if Elementor installed and activated
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
            return;
        }

        // Check for required Elementor version
        if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
            return;
        }

        // Check for required PHP version
        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
            return;
        }

        // Add Plugin actions
        add_action('elementor/widgets/register', [$this, 'init_widgets']);
        add_action('elementor/elements/categories_registered', [$this, 'add_elementor_widget_categories']);

        // Enqueue scripts and styles
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
    }

    /**
     * Admin notice
     * Warning when the site doesn't have Elementor installed or activated.
     */
    public function admin_notice_missing_main_plugin() {
        if (isset($_GET['activate'])) unset($_GET['activate']);
        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'allocore-elements'),
            '<strong>' . esc_html__('Allocore Elements', 'allocore-elements') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'allocore-elements') . '</strong>'
        );
        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Admin notice
     * Warning when the site doesn't have a minimum required Elementor version.
     */
    public function admin_notice_minimum_elementor_version() {
        if (isset($_GET['activate'])) unset($_GET['activate']);
        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'allocore-elements'),
            '<strong>' . esc_html__('Allocore Elements', 'allocore-elements') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'allocore-elements') . '</strong>',
             self::MINIMUM_ELEMENTOR_VERSION
        );
        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Admin notice
     * Warning when the site doesn't have a minimum required PHP version.
     */
    public function admin_notice_minimum_php_version() {
        if (isset($_GET['activate'])) unset($_GET['activate']);
        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'allocore-elements'),
            '<strong>' . esc_html__('Allocore Elements', 'allocore-elements') . '</strong>',
            '<strong>' . esc_html__('PHP', 'allocore-elements') . '</strong>',
             self::MINIMUM_PHP_VERSION
        );
        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Register Categories
     */
    public function add_elementor_widget_categories($elements_manager) {
        $elements_manager->add_category(
            'allocore',
            [
                'title' => esc_html__('Allocore', 'allocore-elements'),
                'icon' => 'fa fa-plug',
            ]
        );
    }

    /**
     * Init Widgets
     */
    public function init_widgets($widgets_manager) {
        // Core
        require_once(__DIR__ . '/widgets/hero-section.php');
        require_once(__DIR__ . '/widgets/circular-nav.php');
        require_once(__DIR__ . '/widgets/services-section.php');
        require_once(__DIR__ . '/widgets/contact-section.php');

        // Template
        require_once(__DIR__ . '/widgets/section-heading.php');
        require_once(__DIR__ . '/widgets/accordion.php');
        require_once(__DIR__ . '/widgets/testimonial-card.php');
        require_once(__DIR__ . '/widgets/feature-card.php');

        // Interactive
        require_once(__DIR__ . '/widgets/stats-counter.php');
        require_once(__DIR__ . '/widgets/gradient-button.php');
        require_once(__DIR__ . '/widgets/dual-button.php');
        require_once(__DIR__ . '/widgets/process-step.php');
        require_once(__DIR__ . '/widgets/icon-box.php');

        // Business
        require_once(__DIR__ . '/widgets/pricing-table.php');
        require_once(__DIR__ . '/widgets/cta-box.php');
        require_once(__DIR__ . '/widgets/logo-grid.php');
        require_once(__DIR__ . '/widgets/info-list.php');
        require_once(__DIR__ . '/widgets/team-member.php');

        // Utility
        require_once(__DIR__ . '/widgets/divider.php');
        require_once(__DIR__ . '/widgets/tabs.php');
        require_once(__DIR__ . '/widgets/image-box.php');
        require_once(__DIR__ . '/widgets/video-popup.php');

        // Register
        $widgets_manager->register(new \Allocore_Hero_Widget());
        $widgets_manager->register(new \Allocore_Circular_Nav_Widget());
        $widgets_manager->register(new \Allocore_Services_Widget());
        $widgets_manager->register(new \Allocore_Contact_Widget());

        $widgets_manager->register(new \Allocore_Section_Heading_Widget());
        $widgets_manager->register(new \Allocore_Accordion_Widget());
        $widgets_manager->register(new \Allocore_Testimonial_Card_Widget());
        $widgets_manager->register(new \Allocore_Feature_Card_Widget());

        $widgets_manager->register(new \Allocore_Stats_Counter_Widget());
        $widgets_manager->register(new \Allocore_Gradient_Button_Widget());
        $widgets_manager->register(new \Allocore_Dual_Button_Widget());
        $widgets_manager->register(new \Allocore_Process_Step_Widget());
        $widgets_manager->register(new \Allocore_Icon_Box_Widget());

        $widgets_manager->register(new \Allocore_Pricing_Table_Widget());
        $widgets_manager->register(new \Allocore_CTA_Box_Widget());
        $widgets_manager->register(new \Allocore_Logo_Grid_Widget());
        $widgets_manager->register(new \Allocore_Info_List_Widget());
        $widgets_manager->register(new \Allocore_Team_Member_Widget());

        $widgets_manager->register(new \Allocore_Divider_Widget());
        $widgets_manager->register(new \Allocore_Tabs_Widget());
        $widgets_manager->register(new \Allocore_Image_Box_Widget());
        $widgets_manager->register(new \Allocore_Video_Popup_Widget());
    }

    /**
     * Enqueue Scripts
     */
    public function enqueue_scripts() {
        // Enqueue Circular Nav Script
        wp_register_script(
            'allocore-circular-nav',
            plugins_url('assets/js/circular-nav.js', __FILE__),
            ['jquery'],
            self::VERSION,
            true
        );
    }
}

Allocore_Elements::instance();
