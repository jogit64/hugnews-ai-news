# Hugnews AI News — Version Démo

Ce projet est une version **simplifiée et présentable** d’un système de publication automatique d’articles inspirants via NLP, développé et utilisé sur le site [Hugnews.fr](https://hugnews.fr).

---

## 🔍 Objectif

Ce dépôt a pour but de **montrer la logique technique** du plugin `Hugnews AI News` utilisé en production :

- Récupération d'articles via API (ici simulée)
- Analyse de sentiment avec un modèle NLP (Roberta)
- Publication automatisée vers WordPress (ici simulée)

---

## ⚙️ Fonctionnement de la démo

Étapes principales :

1. Récupération d'articles simulés (`news_fetcher.py`)
2. Analyse NLP des contenus (`nlp_analysis.py`) avec Roberta ou fallback
3. Affichage des résultats et publication simulée (`wp_publish.py`)

---

## 📁 Structure du projet

| Fichier               | Description                                     |
| --------------------- | ----------------------------------------------- |
| `main.py`             | Point d’entrée : orchestre le flux complet      |
| `news_fetcher.py`     | Renvoie des articles simulés                    |
| `nlp_analysis.py`     | Analyse de sentiment via Roberta                |
| `wp_publish.py`       | Simule la publication d’un article              |
| `config.example.json` | Exemple de configuration sans données sensibles |
| `example_output.json` | Exemple de résultat généré                      |

---

## 🛠️ Composants en production (non inclus ici)

La version réelle en production sur Hugnews.fr inclut :

- Plusieurs APIs d'actualités (NewsAPI, GNews, NewsData, etc.)
- Analyse NLP avancée (Roberta, BERT, GPT-4)
- Filtres thématiques et antispécistes
- Système de scoring par étoiles basé sur les scores de sentiment
- Détection de mots interdits
- CronTab pour automatisation sur VPS
- Logging complet avec analyse des rejets
- Authentification WordPress via App Password
- Déploiement automatique sur serveur

**Remarque :** ces composants sont exclus ici pour raisons de sécurité, lisibilité et simplicité.

---

## 🚀 Intérêt de cette démo

Cette démo illustre :

- La structure modulaire d’un traitement automatique de contenu
- L’usage de modèles NLP modernes avec `transformers`
- Un exemple clair d’intégration WordPress automatisée
- Des compétences concrètes en Python, API REST, NLP et scripting serveur

---

## 🔧 Technologies utilisées

- Python 3
- Transformers (`cardiffnlp/twitter-roberta-base-sentiment`)
- REST API WordPress (mockée ici)
- Git, logging, dotenv

---

## 📄 Licence

Ce projet est publié à des fins **de démonstration uniquement**.  
Le système en production est privé.

---

👤 Projet développé par [johannr.fr](https://hugnews.fr)
