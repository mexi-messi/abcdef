from subprocess import call

abc = ["SQL", "Machine Learning"]

for i in abc:
    call(["scrapy", "crawl", "coursera", "-a", "query="+i, "-o", "Coursera"+i+".csv", "-t", "csv"])
