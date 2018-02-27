# -*- coding: utf-8 -*-

# Define here the models for your scraped items
#
# See documentation in:
# http://doc.scrapy.org/en/latest/topics/items.html

import scrapy


class EdxSpiderItem(scrapy.Item):
    language = Field()
    title = Field()
    shortdes = Field()
    url = Field()
    level = Field()
    image = Field()
    weektocomplete = Field()
    org = Field()
    key = Field()
    instructorsname = Field()
    instructorsposition = Field()
    instructorsorg = Field()
    instructorsimage = Field()
    prerequisites = Field()
    syllabus = Field()
    whatyouwilllearn = Field()
