<?php
if (!defined('ABSPATH')) {
    exit;
}

// Page d'administration simplifiée du plugin
function hugnews_ai_news_settings_page()
{
?>
    <div class="wrap">
        <h1>HugNews AI News</h1>
        <p>Cliquez FORT sur le bouton pour exécuter le script de filtrage et publication !</p>

        <button id="show-cron-logs" class="button">Voir les logs du cron</button>
        <div id="hugnews-cron-logs"
            style="margin-top: 15px; padding: 10px; border: 1px solid #ccc; background: #f3f3f3; white-space: normal; font-family: monospace;">
        </div>

        <button id="run-hugnews-news-script" class="button button-primary">Lancer l'importation</button>
        <div id="hugnews-news-result"
            style="margin-top: 15px; padding: 10px; border: 1px solid #ddd; background: #f9f9f9; white-space: normal; font-family: inherit;">
        </div>
    </div>

    <style>
        #hugnews-news-result strong {
            color: #0073aa;
        }
    </style>

    <script>
        const ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>


    <script type="text/javascript">
        jQuery(document).ready(function($) {
            let scriptRunning = false;
            let checkScriptActive = false;

            $("#run-hugnews-news-script").click(function() {
                if (scriptRunning) {
                    console.log("⚠️ Script déjà en cours, clic ignoré.");
                    return;
                }

                scriptRunning = true;
                checkScriptActive = true;
                $("#hugnews-news-result").html("<p>⏳ Exécution en cours...</p>");

                $.post(ajaxurl, {
                        action: 'hugnews_news_run_script'
                    })
                    .done(function(responseText) {
                        let response;
                        try {
                            response = typeof responseText === 'object' ? responseText : JSON.parse(
                                responseText);
                        } catch (e) {
                            $("#hugnews-news-result").html("<p>❌ Erreur parsing JSON :</p><div>" +
                                responseText + "</div>");
                            console.error("❌ Erreur parsing JSON :", e, responseText);
                            return;
                        }

                        if (response.success) {
                            $("#hugnews-news-result").html(
                                "<p>✅ Script lancé en arrière-plan. Attendez quelques secondes...</p>");
                            checkScriptResult();
                        } else {
                            $("#hugnews-news-result").html("<p>❌ Erreur lors de l'exécution.</p><div>" +
                                response.error + "</div>");
                            scriptRunning = false;
                            checkScriptActive = false;
                        }
                    })
                    .fail(function(jqXHR, textStatus, errorThrown) {
                        $("#hugnews-news-result").html("<p>❌ Erreur AJAX : " + textStatus + "</p><div>" +
                            errorThrown + "</div>");
                        console.error("❌ Erreur AJAX :", textStatus, errorThrown);
                        scriptRunning = false;
                        checkScriptActive = false;
                    });
            });

            $("#show-cron-logs").click(function() {
                $("#hugnews-cron-logs").html("<p>⏳ Chargement des logs du cron...</p>");

                $.post(ajaxurl, {
                        action: 'hugnews_get_cron_logs'
                    })
                    .done(function(responseText) {
                        let response;
                        try {
                            response = typeof responseText === 'object' ? responseText : JSON.parse(
                                responseText);
                        } catch (e) {
                            $("#hugnews-cron-logs").html("<p>❌ Erreur parsing JSON :</p><pre>" +
                                responseText + "</pre>");
                            console.error("❌ Erreur parsing JSON :", e, responseText);
                            return;
                        }

                        if (response.success && response.data && response.data.logs) {
                            $("#hugnews-cron-logs").html(response.data.logs);
                        } else {
                            $("#hugnews-cron-logs").html(
                                "<p>❌ Données invalides dans la réponse AJAX.</p>");
                            console.warn("Réponse brute :", response);
                        }

                    })
                    .fail(function(jqXHR, textStatus, errorThrown) {
                        $("#hugnews-cron-logs").html("<p>❌ Erreur AJAX : " + textStatus + "</p><div>" +
                            errorThrown + "</div>");
                    });
            });

            function checkScriptResult() {
                if (!checkScriptActive) return;

                setTimeout(function() {
                    console.log("🔍 Vérification des logs en cours...");

                    $.post(ajaxurl, {
                            action: 'hugnews_get_script_result'
                        })
                        .done(function(responseText) {
                            let response;
                            try {
                                response = typeof responseText === 'object' ? responseText : JSON.parse(
                                    responseText);
                            } catch (e) {
                                console.error("❌ Erreur parsing JSON dans checkScriptResult :", e,
                                    responseText);
                                checkScriptActive = false;
                                return;
                            }

                            if (response.success) {
                                $("#hugnews-news-result").html(response.logs);
                                if (/🏁 Script terminé/i.test(response.logs)) {
                                    scriptRunning = false;
                                    checkScriptActive = false;
                                } else {
                                    checkScriptResult();
                                }
                            } else {
                                console.warn(
                                    "⚠️ Erreur temporaire dans checkScriptResult(), nouvelle tentative..."
                                );
                                checkScriptResult();
                            }
                        })
                        .fail(function(jqXHR, textStatus, errorThrown) {
                            console.error("❌ Erreur AJAX dans checkScriptResult :", textStatus,
                                errorThrown);
                            checkScriptActive = false;
                        });

                }, 5000);
            }
        });
    </script>

<?php
}

function hugnews_ai_news_add_menu()
{
    add_menu_page(
        'HugNews AI News',
        'HugNews AI News',
        'manage_options',
        'hugnews-ai-news',
        'hugnews_ai_news_settings_page',
        'dashicons-admin-site',
        25
    );
}
add_action('admin_menu', 'hugnews_ai_news_add_menu');
