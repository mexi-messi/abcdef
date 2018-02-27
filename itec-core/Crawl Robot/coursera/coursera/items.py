# -*- coding: utf-8 -*-

# Define here the models for your scraped items
#
# See documentation in:
# http://doc.scrapy.org/en/latest/topics/items.html

from scrapy.item import Item, Field


class CourseraItem(Item):
    url = Field()
    coursename = Field()
    description = Field()
    targetlearner = Field()
    creator = Field()
    instructors = Field()
    basicinfo = Field()
    language = Field()
    weekname = Field()
    weekabout = Field()
    weekinfo = Field()
    weekgraded = Field()
    imageurl = Field()
    ratingstars = Field()
    ratingcount = Field()
    review = Field()
