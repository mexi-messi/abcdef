from subprocess import call

abc = ["sql","css","python3"]

for i in abc:
    call(["scrapy", "crawl", "tutorialspointbot", "-a", "query="+i, "-o", "tutorialspointdocument"+i+".csv", "-t", "csv"])
