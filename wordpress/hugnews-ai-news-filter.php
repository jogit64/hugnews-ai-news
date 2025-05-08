<?php

/**
 * Plugin Name: HugNews AI News Filter
 * Description: Plugin WordPress permettant d'afficher et de configurer HugNews AI News.
 * Version: 1.0
 * Author: Johan
 */

// Empêcher un accès direct
if (!defined('ABSPATH')) {
    exit;
}



// Inclure les fichiers d'administration
require_once plugin_dir_path(__FILE__) . 'admin/hugnews-settings.php';
require_once plugin_dir_path(__FILE__) . 'admin/run_script.php';
require_once plugin_dir_path(__FILE__) . 'admin/cron_logs.php';






if (!function_exists('hugnews_ai_news_log')) {
    function hugnews_ai_news_log($message)
    {
        $log_file = WP_CONTENT_DIR . '/uploads/hugnews_news.log';

        // 📌 Vérification et initialisation du fichier avec des permissions correctes
        if (!file_exists($log_file)) {
            file_put_contents($log_file, "=== Début du log HugNews News ===\n", FILE_APPEND);
            chmod($log_file, 0664); // ✅ Permet l'écriture à www-data et johann
        }

        // ✅ Écriture sécurisée dans le fichier
        file_put_contents($log_file, date("Y-m-d H:i:s") . " - " . $message . PHP_EOL, FILE_APPEND);
    }
}
