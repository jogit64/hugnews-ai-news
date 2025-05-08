# Hugnews AI News — Démonstration Illustrée du Pipeline NLP

Ce dépôt présente une **illustration structurée et volontairement simplifiée** du pipeline Python utilisé en production sur [Hugnews.fr](https://hugnews.fr).  
L’objectif est de rendre visible la logique technique d’un système de publication automatique d’articles inspirants basé sur le NLP, l’éthique éditoriale et l’automatisation WordPress.

---

## 🎯 Objectif de cette version publique

Cette version GitHub permet :

- D’illustrer l’architecture logique du traitement en production
- De montrer la maîtrise de l’automatisation avec NLP, API, REST
- De préserver lisibilité et confidentialité (sécurité, clé API, logs, cron)

---

## ⚙️ Fonctionnement de la démo

### Étapes principales (dans cette version) :

1. Récupération simulée d’articles (`news_fetcher.py`)
2. Analyse de sentiment avec `Roberta` ou fallback (`nlp_analysis.py`)
3. Publication fictive avec affichage console (`wp_publish.py`)

---

## 🧠 Fonctionnalités réelles (non incluses ici, mais utilisées en production)

> Le pipeline complet exécuté sur VPS comprend notamment :

- 🔁 Appels multi-API (NewsAPI, GNews, NewsData, Mediastack)
- 📑 Gestion dynamique des mots-clés, pagination, doublons
- 🧠 Analyse NLP multi-modèles (BERT / Roberta)
- ⭐ Système de scoring par étoiles avec seuils personnalisés
- 🤖 Validation thématique via GPT-4 (respect d’une ligne éditoriale antispéciste)
- 🔐 Vérifications de contenu, de doublons et de sécurité publication
- 🖼️ Génération et upload automatique d’illustrations (Unsplash / Pixabay / scraping)
- ⚙️ Exécution automatisée via `cron`, logs HTML, threading et verrouillage multi-process

---

## 📁 Structure de la démo

| Fichier               | Description                         |
| --------------------- | ----------------------------------- |
| `main.py`             | Orchestration du traitement         |
| `news_fetcher.py`     | Articles simulés (mock)             |
| `nlp_analysis.py`     | Sentiment analysis via Transformers |
| `wp_publish.py`       | Simulation de publication WordPress |
| `config.example.json` | Exemple de configuration            |
| `example_output.json` | Exemple de sortie d’analyse NLP     |

---

## 🧠 À propos du projet

> Ce projet a été conçu comme un exercice complet de mise en œuvre autonome :
>
> - Intégration d’un pipeline NLP modulaire
> - Sélection thématique guidée par des critères éthiques
> - Déploiement et exécution en environnement serveur réel

Le code complet est utilisé dans un système actif en production, mais non publié ici pour des raisons de sécurité et de lisibilité.

---

## 🔧 Technologies illustrées

- Python 3
- Hugging Face Transformers
- REST API WordPress
- Logging, threading, cron, .env
- Modularité, filtrage, automatisation

---

## 📄 Licence

Ce projet est publié à des fins **illustratives uniquement**.  
Le système en production est maintenu privé.

---

👤 Projet développé par [johannr.fr](https://hugnews.fr)
