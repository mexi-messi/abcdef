from subprocess import call
import sys
import json


csname = ["SQL"]


for i in csname:
    call(["scrapy", "crawl", "coursera", "-a", "query="+i, "-o", "Coursera"+i+".csv", "-t", "csv"])

print("ajchn")
