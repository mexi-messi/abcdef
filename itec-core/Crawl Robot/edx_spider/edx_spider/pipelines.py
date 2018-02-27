# -*- coding: utf-8 -*-

# Define your item pipelines here
#
# Don't forget to add your pipeline to the ITEM_PIPELINES setting
# See: http://doc.scrapy.org/en/latest/topics/item-pipeline.html

import mysql.connector
from edx_spider.items import EdxSpiderItem


class EdxSpiderPipeline(object):
    def __init__(self):
        self.conn = mysql.connector.connect(user='root', password='123456', host='127.0.0.1', database='a')
        self.cursor = self.conn.cursor()

    def process_item(self, item, spider):
        #self.cursor.execute("""INSERT INTO test (coursename, description) VALUES (%s, %s)""", (item['coursename'], item['description']))
        # query = "INSERT INTO x(a) VALUES ('%s') " % (item['level'])
        query = "INSERT INTO Edx(Title,Language,Shortdes,Url,Level,Image,Weektocomplete,Org,Instructorsname,Instructorsposition,Instructorsorg,Instructorsimage,Prerequisites,Syllabus,Whatyouwilllearn)  VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')" % (item['title'],item['language'],item['shortdes'],item['url'],item['level'],item['image'],item['weektocomplete'],item['org'],item['instructorsname'],item['instructorsposition'],item['instructorsorg'],item['instructorsimage'],item['prerequisites'],item['syllabus'],item['whatyouwilllearn'])
        self.cursor.execute(query)
        self.conn.commit()
        return item

    def close_spider(self, spider):
        self.cursor.close()
        self.connection.close()
