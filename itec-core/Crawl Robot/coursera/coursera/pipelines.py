# -*- coding: utf-8 -*-

# Define your item pipelines here
#
# Don't forget to add your pipeline to the ITEM_PIPELINES setting
# See: http://doc.scrapy.org/en/latest/topics/item-pipeline.html

import mysql.connector
from scrapy.exceptions import DropItem
from coursera.items import CourseraItem


class CourseraPipeline(object):
    def __init__(self):
        self.conn = mysql.connector.connect(user='root', password='123456', host='127.0.0.1', database='a')
        self.cursor = self.conn.cursor()

    def process_item(self, item, spider):
        # query = """INSERT INTO Coursera(Coursename,Language,Url,Instructor,Creator,Basicinfo,Description,Targetlearner,Weekname,Weekinfo,Weekgraded,Imageurl,Ratingstars,Ratingcount) VALUES("%s","%s",'%s',"%s","%s","%s","%s","%s","%s","%s","%s",'%s',"%s","%s")""" % (item['coursename'],item['language'],item['url'],item['instructors'],item['creator'],item['basicinfo'],item['description'],item['targetlearner'],item['weekname'],item['weekinfo'],item['weekgraded'],item['imageurl'],item['ratingstars'],item['ratingcount'])
        query = """INSERT INTO xyz(ratingstars,ratingcount,review) VALUES ("%s","%s","%s")""" %(item['ratingstars'],item['ratingcount'],item['review'])
        self.cursor.execute(query)
        self.conn.commit()
        return item

    def close_spider(self, spider):
        self.cursor.close()
        self.conn.close()
