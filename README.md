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

## 🧩 Vue d’ensemble du projet Hugnews

Le projet Hugnews comprend plusieurs plugins complémentaires, développés pour automatiser la production, le filtrage et la diffusion de contenu éthique :

### 🔹 Hugnews AI NEWS _(ce dépôt)_

Génération automatique d’articles inspirants à partir de plusieurs APIs d’actualité, filtrage sémantique, analyse de sentiment (Roberta / BERT), validation éthique via GPT-4 et publication vers WordPress.

### 🔹 Hugnews AI RSS _(non publié ici)_

Pipeline similaire au précédent, mais basé sur l'import de flux RSS ciblés. Intègre les mêmes filtres de tonalité, d’éthique, d’image et de doublon. Actif en production.

### 🔹 Hugnews AI Writer

Génération complète d’articles originaux par GPT-4 sur des thématiques choisies. Mode batch ou individuel, prompts dynamiques, images et tags automatisés.

### 🔹 Positive Video Generator

Intégration de vidéos inspirantes issues de plateformes libres de droits, filtrées par mots-clés et thématiques.

### 🔧 HugNews Cache Preloader

Plugin technique de préchargement du cache WordPress via script Python simulant des visites réelles (desktop, mobile), configurable par interface ou CLI.

> Pour plus d’informations, voir la présentation complète des modules sur la page [À propos de Hugnews.fr](https://hugnews.fr/a-propos/)

---

## 🔗 Pour aller plus loin

- [README Python (server)](./server/README.md)
- [README Plugin WordPress (wordpress)](./wordpress/README.md)
- Site en ligne (démo) : [hugnews.fr](https://hugnews.fr)

---

👤 Projet réalisé par johannr.fr  
📬 Contact : johannr.fr
