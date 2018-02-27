# -*- coding: utf-8 -*-
import scrapy
from scrapy.item import Item, Field

class CodecademyItem(Item):
    name_of_course = Field()
    link_of_course = Field()
    overview = Field()
    syllabus = Field()



class CodecademyspiderSpider(scrapy.Spider):
    name = 'codecademyspider'
    allowed_domains = ['https://www.codecademy.com']
   # This is the url address for crawling
    def start_requests(self):
        yield scrapy.Request('https://www.codecademy.com/learn/%s' %self.query)
   # This for the order for output the items of csv
    custom_settings = {
    'FEED_EXPORT_FIELDS': ["name_of_course", "link_of_course", "overview", "syllabus"],
  }

   # Crawling details
    def parse(self, response):
        item = CodecademyItem()
   # Course name
        item['name_of_course'] = response.xpath('/html/body/div[2]/section/section/div/div/div/div[1]/div/div/div/div[1]/div/div[2]/div[1]/text()').extract(),
   # Link
        item['link_of_course'] = response.request.url,
   # syllabus
        item['syllabus']  = response.xpath('/html/body/div[2]/section/section/div/div/div/div[1]/div/div/div/div[3]/div[3]/div/div/div/div/div/div/a/div/div/text()').extract(),
   # overview
        item['overview']  = response.xpath('/html/body/div[2]/section/section/div/div/div/div[1]/div/div/div/div[3]/div[2]/div/div/p/text()').extract()
        return item
