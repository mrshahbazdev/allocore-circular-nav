<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Allocore_Login_Form_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'allocore_login_form';
    }

    public function get_title() {
        return esc_html__('Allocore Login Form', 'allocore-elements');
    }

    public function get_icon() {
        return 'eicon-lock-user';
    }

    public function get_categories() {
        return ['allocore'];
    }

    protected function register_controls() {
        $this->start_controls_section('style_section', ['label' => 'Style', 'tab' => \Elementor\Controls_Manager::TAB_STYLE]);
        $this->add_control('redirect', ['label' => 'Redirect URL', 'type' => \Elementor\Controls_Manager::URL, 'default' => ['url' => home_url()]]);
        $this->add_control('color', ['label' => 'Button Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF8C00']);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if (is_user_logged_in()) {
            echo '<p>You are already logged in.</p>';
            return;
        }

        $args = [
            'echo' => false,
            'redirect' => $settings['redirect']['url'],
            'label_username' => 'Email / Username',
            'label_log_in' => 'Sign In',
            'form_id' => 'allocore-login',
            'id_username' => 'user_login',
            'id_password' => 'user_pass',
            'id_remember' => 'rememberme',
            'id_submit' => 'wp-submit',
            'remember' => true,
            'value_username' => '',
            'value_remember' => false
        ];

        // Custom styling wrapper
        echo '<div class="allocore-login-wrapper max-w-sm mx-auto p-6 border rounded-xl shadow-sm bg-card">';
        echo wp_login_form($args);
        echo '</div>';

        // CSS to style standard WP form elements to match Allocore
        ?>
        <style>
            .allocore-login-wrapper p { margin-bottom: 1rem; }
            .allocore-login-wrapper label { display: block; font-weight: bold; margin-bottom: 0.5rem; font-family: 'Rajdhani', sans-serif; }
            .allocore-login-wrapper input[type="text"], .allocore-login-wrapper input[type="password"] {
                width: 100%; padding: 0.75rem; border-radius: 0.5rem; border: 1px solid var(--border); background-color: var(--background);
            }
            .allocore-login-wrapper input[type="submit"] {
                width: 100%; padding: 0.75rem; border-radius: 0.5rem; background-color: <?php echo esc_attr($settings['color']); ?>; color: white; font-weight: bold; cursor: pointer; border: none; margin-top: 1rem; transition: opacity 0.2s;
            }
            .allocore-login-wrapper input[type="submit"]:hover { opacity: 0.9; }
        </style>
        <?php
    }
}
