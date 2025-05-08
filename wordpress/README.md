# Plugin WordPress `hugnews-ai-news-filter`

Ce plugin WordPress a été développé dans le cadre du projet **Hugnews.fr**, un site de démonstration technique pour l'automatisation de la publication d'articles inspirants et éthiques à partir de sources d’actualités publiques, enrichis par des outils de traitement du langage naturel (NLP).

---

## 🎯 Objectif du projet

L'objectif de ce projet est de :

- Mettre en œuvre une chaîne complète : **collecte → filtrage → évaluation NLP → publication WordPress**
- Produire automatiquement des contenus **positifs, éthiques et non violents** (filtrage antispéciste, détection de mots problématiques, analyse de sentiment)
- Offrir une **interface de suivi et de déclenchement manuel** des traitements NLP sur un serveur distant

Le site Hugnews.fr, bien que fonctionnel, est volontairement limité (en nombre d’articles/jour, en volume de requêtes API) afin de rester dans une **logique de portfolio personnel** et de maîtrise des coûts.

---

## ⚙️ Fonctionnement du plugin

Ce plugin WordPress **n'est pas destiné aux utilisateurs finaux**, mais à un usage **interne**. Il permet :

- D’intégrer un menu d’administration `Hugnews` dans l’interface WordPress
- De **lancer manuellement le script Python NLP** depuis WordPress (via `shell_exec`)
- De **consulter les logs** détaillés du système de publication (succès, rejets, seuils de confiance, scores NLP)
- D'ajuster les paramètres ou relancer un traitement sans attendre la planification via `cron`

---

## 🔐 À propos de la sécurité

Ce plugin étant utilisé uniquement par l'administrateur (développeur), il :

- **Ne prévoit pas de système d'authentification ou de nonce**, car son usage est restreint à un environnement VPS privé
- N'est **pas destiné à être distribué** sur le répertoire WordPress.org ou utilisé dans un contexte multi-utilisateur

Dans un contexte professionnel ou multi-admin, des sécurisations supplémentaires seraient bien sûr nécessaires (nonces, capacité, permissions WordPress, etc.).

---

## 🧠 NLP et suivi du traitement

Le projet utilise deux modèles NLP (`bert-base-uncased`, `roberta-base`) selon configuration. L’interface admin permet :

- De visualiser les évaluations des modèles (positif, neutre, négatif)
- De consulter les **seuils de décision par "étoiles"**
- De suivre les filtres appliqués (mots interdits, cohérence thématique)
- De **comparer la qualité des publications selon le modèle utilisé**

---

## 📦 Fichiers du plugin

| Fichier                      | Rôle                                            |
| ---------------------------- | ----------------------------------------------- |
| `hugnews-ai-news-filter.php` | Plugin principal, intégration au menu WordPress |
| `admin/hugnews-settings.php` | Interface de déclenchement du script Python     |
| `admin/cron_logs.php`        | Affichage des logs d'exécution                  |
| `admin/run_script.php`       | Lance le script NLP en ligne de commande        |

---

## 🚀 Ce que ce plugin démontre

- La capacité à **connecter un serveur Python via une interface WordPress**
- L’intégration de **traitement automatique de contenu** dans un CMS populaire
- La création d’une **interface d’administration rapide et utile pour le debug**
- Une logique de développement centrée sur un besoin métier et une ligne éditoriale claire

---

## 🧪 Projet complémentaire

Le traitement Python (analyse NLP, appel aux APIs de news, filtrage, scoring) est disponible dans le dépôt complémentaire [`hugnews-ai-news-demo`](https://github.com/tonprofil/hugnews-ai-news-demo).

---

## 📄 Licence

Ce code est publié à des fins de démonstration et de portfolio uniquement.  
Le plugin complet peut être adapté et sécurisé selon le contexte d’utilisation.

---

👤 Projet conçu et développé par Johannr.fr — [Hugnews.fr](https://hugnews.fr)
