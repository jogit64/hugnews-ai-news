<?php
if (!defined('ABSPATH')) {
    exit;
}

// Action AJAX pour lire les logs générés par le CRON
add_action('wp_ajax_hugnews_get_cron_logs', 'hugnews_get_cron_logs_v2');
add_action('wp_ajax_nopriv_hugnews_get_cron_logs', 'hugnews_get_cron_logs_v2');

function hugnews_get_cron_logs_v2()
{
    ob_clean();
    file_put_contents("/tmp/debug_cron_logs.txt", "✅ hugnews_get_cron_logs exécutée avec succès\n", FILE_APPEND);


    // 🔒 Supprime toute sortie parasite
    if (ob_get_length()) ob_clean();

    header('Content-Type: application/json; charset=utf-8');

    $cron_log_path = '/var/www/hugnews/logs/hugnews_news_cron.log';

    if (!file_exists($cron_log_path)) {
        wp_send_json_error(['error' => 'Fichier de log du cron introuvable.']);
        return;
    }

    $logs = file_get_contents($cron_log_path);

    if (trim($logs) === '') {
        wp_send_json_success(['logs' => "<em>Aucun log à afficher pour le moment.</em>"]);
        return;
    }

    $logs = nl2br($logs);
    $logs = wp_kses_post($logs);

    wp_send_json_success(['logs' => $logs]);
}
