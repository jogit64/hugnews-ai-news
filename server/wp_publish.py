def publish_article(article):
    sentiment = article.get("sentiment", {})
    print(f"📝 Publication simulée :")
    print(f"→ Titre     : {article['title']}")
    print(f"→ Sentiment : {sentiment.get('label', 'UNKNOWN')} (score {sentiment.get('score', '?')})")
