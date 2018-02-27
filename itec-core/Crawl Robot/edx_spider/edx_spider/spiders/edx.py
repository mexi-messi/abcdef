# -*- coding: utf-8 -*-
from scrapy import Spider
import json
from scrapy.item import Item, Field
import scrapy
from bs4 import BeautifulSoup

class EdxSpiderItem(scrapy.Item):
    language = Field()
    title = Field()
    shortdes = Field()
    url = Field()
    level = Field()
    image = Field()
    weektocomplete = Field()
    org = Field()
    instructorsname = Field()
    instructorsposition = Field()
    instructorsorg = Field()
    instructorsimage = Field()
    prerequisites = Field()
    syllabus = Field()
    whatyouwilllearn = Field()


class EdxSpider(Spider):
    name = "edx"
    allowed_domains =["edx.org"]

    def start_requests(self):
        for i in range (1,6):
            yield scrapy.Request('https://www.edx.org/api/v1/catalog/search?page='+str(i)+ '&page_size=9&partner=edx&hidden=0&content_type[]=courserun&content_type[]=program&featured_course_ids=course-v1%%3AMITx+6.00.1x+2T2017_2%%2Ccourse-v1%%3AUBCx+HtC1x+2T2017%%2Ccourse-v1%%3AHarvardX+CS50+X%%2Ccourse-v1%%3ALinuxFoundationX+LFS101x+1T2017%%2Ccourse-v1%%3APennX+SD4x+2T2017%%2Ccourse-v1%%3ABerkeleyX+CS169.1x+3T2017SP%%2Ccourse-v1%%3AMicrosoft+DEV276x+1T2018%%2Ccourse-v1%%3AUBCx+SoftEng1x+1T2018%%2Ccourse-v1%%3AMicrosoft+DAT201x+1T2018&featured_programs_uuids=f374fbdf-4f5e-483e-90a4-602be7a18bf7%%2C7278cf26-3f5b-4852-9ae7-f26396bbaa66%%2Cdb76be3f-b3cc-4a02-a870-e083fa7999bd%%2C98b7344e-cd44-4a99-9542-09dfdb11d31b%%2C482dee71-e4b9-4b42-a47b-3e16bb69e8f2%%2C8ac6657e-a06a-4a47-aba7-5c86b5811fa1&query=%s' % self.query)

    def parse(self, response):
        data = json.loads(response.body_as_unicode())
        for objects in data["objects"]["results"]:
            if objects["type"] == "verified":
                try:
                    key = objects["key"]
                    url = "https://www.edx.org/api/catalog/v2/courses/" + key
                    yield scrapy.Request(url=url, callback=self.parse_details)
                except KeyError:
                    pass
            else:
                pass

    def parse_details(self,response):
        data = json.loads(response.body_as_unicode())
        try:
            item = EdxSpiderItem()
            item["title"] = data["title"]
            item["shortdes"] = data["subtitle"]
            item["weektocomplete"] = data["length"]
            item["level"] = data["level"]["title"]
            item["org"] = data["schools"][0]["name"]
            item["url"] = data["course_about_uri"]
            item["image"] = data["image"]
            for objects in data["staff"]:
                item["instructorsname"] = objects["title"]
                item["instructorsimage"] = objects["image"]
                item["instructorsposition"] = objects["display_position"]["title"]
                item["instructorsorg"] = objects["display_position"]["org"]
            item["language"] = data["languages"][0]["title"]
            prerequisites = BeautifulSoup(data["prerequisites"], "lxml").text
            item["prerequisites"] = prerequisites.replace("\n"," ")
            syllabus = BeautifulSoup(data["syllabus"], "lxml").text
            item["syllabus"] = syllabus.replace("\n"," ")
            whatyouwilllearn = BeautifulSoup(data["what_you_will_learn"], "lxml").text
            item["whatyouwilllearn"] = whatyouwilllearn.replace("\n"," ")
        except KeyError, TypeError:
            item['language'] = "English"
            item['prerequisites'] = "None"
            item['syllabus'] = "None"
            item['whatyouwilllearn'] = "None"
            item["instructorsorg"] = "None"
            item["instructorsposition"] = "None"
            
        yield item
