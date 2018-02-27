# -*- coding: utf-8 -*-
import scrapy
from scrapy.item import Item, Field

class tutorialspoitItem(Item):
    name_of_course = Field()
    link_of_course = Field()
    overview = Field()
    syllabus = Field()



class TutorialspoitbotSpider(scrapy.Spider):
    # name to crawl data
    name = "tutorialspointbot"
    allowed_domains = ["www.tutorialspoint.com"]
    # start url page to crawl
    def start_requests(self):
        yield scrapy.Request('https://www.tutorialspoint.com/%s' %self.query + '/index.htm')
    # order output data
    custom_settings = {
    'FEED_EXPORT_FIELDS': ["name_of_course", "link_of_course", "overview", "syllabus"],
  }
  # detail crawling contents
    def parse(self, response):
        item = tutorialspoitItem()
        item['name_of_course'] = response.xpath('/html/body/div[3]/div[1]/div/div[2]/div[1]/div/h1[1]/text()').extract_first(),
        item['link_of_course'] = response.request.url,
        item['overview'] = response.xpath('/html/body/div[3]/div[1]/div/div[2]/div[1]/div/p[1]/text()').extract(),
        item['syllabus'] = response.xpath('/html/body/div[3]/div[1]/div/div[1]/aside/ul/li/a/text()').extract()
        return item
