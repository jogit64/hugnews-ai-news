<?php
if (!defined('ABSPATH')) {
    exit;
}

// ✅ Vérifier si la fonction n'existe pas déjà pour éviter les conflits
if (!function_exists('hugnews_news_ajax_run_script')) {
    add_action('wp_ajax_hugnews_news_run_script', 'hugnews_news_ajax_run_script');

    function hugnews_news_ajax_run_script()
    {
        // ✅ Chemin du script Python et du log
        $script_path = "/home/johann/hugnews-ai-news/server/hugnews_script.py";
        $log_file = "/var/www/hugnews/wp-content/uploads/hugnews_news.log"; // Fichier où le script Python écrit les logs
        $output_file = "/var/www/hugnews/wp-content/uploads/wordpress_output.log"; // Nouveau fichier pour le résultat final

        // ✅ Vérification de l'existence du script
        if (!file_exists($script_path)) {
            wp_send_json_error(['error' => '❌ Erreur : Le script Python est introuvable.']);
            wp_die();
        }

        // ✅ Supprimer l'ancien fichier de sortie (si existant) pour éviter les anciens résultats
        if (file_exists($output_file)) {
            unlink($output_file);
        }

        // ✅ Exécuter le script en arrière-plan
        //$command = "nohup python3 " . escapeshellarg($script_path) . " manual > " . escapeshellarg($log_file) . " 2>&1 && echo 'Terminé' > " . escapeshellarg($output_file) . " &";
        //$command = "/var/www/venvs/hugnews/bin/python " . escapeshellarg($script_path) . " manual > " . escapeshellarg($log_file) . " 2>&1";

        //$command = "nohup /var/www/venvs/hugnews/bin/python " . escapeshellarg($script_path) . " manual > " . escapeshellarg($log_file) . " 2>&1 && echo 'Terminé' > " . escapeshellarg($output_file) . " &";
        $command = "nohup /var/www/venvs/hugnews/bin/python " . escapeshellarg($script_path) . " manual > " . escapeshellarg($log_file) . " 2>&1 && echo 'Terminé' > " . escapeshellarg($output_file) . " &";

        shell_exec($command);

        // ✅ Retourner immédiatement la réponse AJAX
        wp_send_json_success(['success' => true, 'output' => '✅ Script lancé en arrière-plan. Attendez quelques secondes pour voir les résultats.']);
        wp_die();
    }

    // ✅ Fonction AJAX pour récupérer le résultat final
    add_action('wp_ajax_hugnews_get_script_result', 'hugnews_get_script_result');

    function hugnews_get_script_result()
    {
        $output_file = "/var/www/hugnews/wp-content/uploads/wordpress_output.log";
        $log_file = "/var/www/hugnews/wp-content/uploads/hugnews_news.log";


        if (file_exists($output_file)) {
            $logs = file_get_contents($log_file);
            // Supprimer htmlspecialchars() pour permettre le rendu du HTML, tout en gardant nl2br pour les retours à la ligne
            wp_send_json_success(['success' => true, 'logs' => nl2br($logs)]);
        } else {
            wp_send_json_success(['success' => false, 'logs' => '⏳ Le script est toujours en cours d\'exécution...']);
        }
        wp_die();
    }
}
