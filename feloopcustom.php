<?php
/**
 * Plugin Name: feloopCustom
 * Version: 1.0.0
 * Plugin URI: http://www.hughlashbrooke.com/
 * Description: This is your starter template for your next WordPress plugin.
 * Author: Hugh Lashbrooke
 * Author URI: http://www.hughlashbrooke.com/
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: feloopcustom
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Hugh Lashbrooke
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!defined('FELOOPC_DIR')) {
    define('FELOOPC_DIR', plugin_dir_path(__FILE__));
}

if (!defined('FELOOPC_NAME')) {
    define('FELOOPC_NAME', plugin_basename(__FILE__));
}

if (!defined('FELOOPC_URL')) {
    define('FELOOPC_URL', plugin_dir_url(__FILE__));
}

if (!defined('FELOOPC_PATH')) {
    define('FELOOPC_PATH', __FILE__);
}


// Load plugin class files.
require_once 'includes/class-feloopcustom.php';
require_once 'includes/class-feloopcustom-settings.php';

// Load plugin libraries.
require_once 'includes/lib/class-feloopcustom-admin-api.php';
require_once 'includes/lib/class-feloopcustom-post-type.php';
require_once 'includes/lib/class-feloopcustom-taxonomy.php';

/**
 * Returns the main instance of feloopCustom to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return feloopCustom feloopCustom
 */
function feloopcustom(): feloopCustom
{
    $instance = feloopCustom::instance(__FILE__, '1.0.0');

    if (is_null($instance->settings)) {
        $instance->settings = feloopCustom_Settings::instance($instance);
    }

    return $instance;
}
// Add Actions
require_once FELOOPC_DIR . 'includes/actions/StylesToDashboard.php';
require_once FELOOPC_DIR . 'includes/actions/ChangePostLabel.php';

// Add Filters
require_once FELOOPC_DIR . 'includes/filters/CustomPostTypes.php';
require_once FELOOPC_DIR . 'includes/filters/CustomTaxonomies.php';
require_once FELOOPC_DIR . 'includes/filters/CustomShortcodeGallery.php';
require_once FELOOPC_DIR . 'includes/filters/CustomAttachmentImage.php';

// Add Shortcodes
require_once FELOOPC_DIR . 'includes/shortcodes/customShortcodes.php';
