# -*- coding: utf-8 -*-

# Define your item pipelines here
#
# Don't forget to add your pipeline to the ITEM_PIPELINES setting
# See: http://doc.scrapy.org/en/latest/topics/item-pipeline.html
import pymysql
from scrapy import log

from tutorialspoit import settings
from tutorialspoit.items import tutorialspoitItem

class TutorialspoitPipeline(object):
    def __init__(self):
        pass
