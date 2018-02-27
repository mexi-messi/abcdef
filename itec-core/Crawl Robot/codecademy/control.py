from subprocess import call

abc = ["learn-python", "learn-sql", "sql-table-transformation"]

for i in abc:
    call(["scrapy", "crawl", "codecademyspider", "-a", "query="+i, "-o", "ccode"+i+".csv", "-t", "csv"])
