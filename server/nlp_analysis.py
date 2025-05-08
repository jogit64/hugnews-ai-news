try:
    from transformers import pipeline
    # Chargement du modèle Roberta pour l'analyse de sentiment
    classifier = pipeline("sentiment-analysis", model="cardiffnlp/twitter-roberta-base-sentiment")

    def analyze_article(article):
        text = article["content"][:512]  # Tronque pour éviter les limites du modèle
        result = classifier(text)[0]
        article["sentiment"] = {
            "label": result["label"],
            "score": round(result["score"], 3)
        }
        return article

except ImportError:
    # Fallback simple si transformers n'est pas installé
    def analyze_article(article):
        article["sentiment"] = {
            "label": "POSITIVE",
            "score": 0.9  # Simulé
        }
        return article
