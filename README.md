# Hugnews AI News 📰🤖

Ce dépôt présente un projet complet de publication automatique d'articles inspirants, éthiques et filtrés, via traitement du langage naturel (NLP) et intégration dans WordPress.

Ce système se compose de deux parties :

- 🧠 Une **partie Python (démo)**, responsable de la collecte, de l'analyse NLP et de la préparation des articles.
- 🛠 Une **partie WordPress (plugin réel)**, permettant de suivre, lancer et contrôler les traitements depuis l'administration du site.

Ce projet est utilisé sur [hugnews.fr](https://hugnews.fr), un site démo personnel conçu comme **preuve de concept** dans le cadre d’un portfolio.

---

## 📁 Structure du dépôt

<pre lang="markdown"> ## 📁 Structure du dépôt ``` hugnews-ai-news/ ├── server/ # Scripts Python de démonstration │ ├── main.py # Point d’entrée │ ├── nlp_analysis.py # Analyse de sentiment avec Roberta/BERT │ ├── news_fetcher.py # Simulation de récupération d’articles │ ├── wp_publish.py # Simulation de publication WordPress │ ├── config.example.json │ └── README.md # Documentation Python │ ├── wordpress/ │ ├── hugnews-ai-news-filter.php # Plugin principal WordPress │ ├── admin/ │ │ ├── hugnews-settings.php # Lancement manuel des scripts │ │ ├── cron_logs.php # Affichage des logs NLP │ │ └── run_script.php # Exécution serveur via shell_exec │ └── README.md # Documentation WordPress ``` </pre>

---

## 💡 Objectif du projet

> Montrer comment combiner des outils modernes (Python + NLP) avec un CMS traditionnel (WordPress) pour automatiser la production de contenu filtré et ciblé.

Le système a été conçu pour :

- Filtrer des contenus sur critères positifs, bienveillants, non violents (ex : antispécisme)
- Analyser le sentiment avec BERT/Roberta
- Rester déployable et compréhensible
- Être utilisé comme **outil d’apprentissage personnel** et démonstration technique

---

## 🔐 À propos du code

- Le code Python est une **version simplifiée et présentable**, inspirée de la version déployée sur VPS.
- Le plugin WordPress est **réel**, mais destiné à un usage interne uniquement (pas destiné à la distribution publique).
- Le tout est **documenté et modulable**.

---

## 🔗 Pour aller plus loin

- [README Python (server)](./server/README.md)
- [README Plugin WordPress (wordpress)](./wordpress/README.md)
- Site en ligne (démo) : [hugnews.fr](https://hugnews.fr)

---

👤 Projet réalisé par johannr.fr  
📬 Contact : johannr.fr
