# -*- coding: utf-8 -*-

# Define here the models for your scraped items
#
# See documentation in:
# http://doc.scrapy.org/en/latest/topics/items.html

from scrapy.item import Item, Field

class tutorialspoitItem(Item):
    name_of_course = Field()
    link_of_course = Field()
    overview = Field()
    syllabus = Field()

