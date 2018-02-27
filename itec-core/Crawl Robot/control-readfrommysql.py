from subprocess import call
import mysql.connector
import time

cnx = mysql.connector.connect(user='root', password='123456', host='127.0.0.1', database='moodle')
cursor = cnx.cursor()

query = ("SELECT fullname FROM mdl_course")

cursor.execute(query)

rows = cursor.fetchall()

for i in rows:
    for i2 in i:
    	call(["scrapy", "crawl", "coursera", "-a", "query="+str(i2)+ "-o", "Coursera"+str(i2)+".csv", "-t", "csv"])
    	print("Crawling " + str(i2))




cursor.close()
cnx.close()
