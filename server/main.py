from news_fetcher import get_articles
from nlp_analysis import analyze_article
from wp_publish import publish_article

def main():
    print("📥 Récupération des articles...")
    articles = get_articles()

    for article in articles:
        print(f"\n🧠 Analyse de : {article['title']}")
        article = analyze_article(article)
        publish_article(article)

if __name__ == "__main__":
    main()
