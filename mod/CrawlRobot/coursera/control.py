from subprocess import call

abc = ["SQL"]

for i in abc:
    call(["scrapy", "crawl", "coursera", "-a", "query="+i, "-o", "Coursera"+i+".csv", "-t", "csv"])
