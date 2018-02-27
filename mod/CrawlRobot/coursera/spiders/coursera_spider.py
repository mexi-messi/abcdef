# -*- coding: utf-8 -*-
import scrapy
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

class CourseraSpider(scrapy.Spider):
    name = 'coursera'

    def start_requests(self):
        for i in range (0,40,20):
            yield scrapy.Request('https://www.coursera.org/courses?languages=en&query=%s' % self.query +'&start='+str(i))


    def parse(self, response):
        urls = response.css('#rendered-content > div > div > div.rc-CatalogSearch.bt3-container > div:nth-child(2) > div.rc-SearchResults.bt3-col-xs-9 > div > div > a::attr(href)').extract()
        for url in urls:
            url = response.urljoin(url)
            if "learn" in url:
                yield scrapy.Request(url=url, callback=self.parse_details)
            else:
                print('None')


    def parse_details(self, response):
            item = CourseraItem()
            item['imageurl'] = response.xpath("//div[contains(@class, 'body-container')]//@style").re_first(r'url\(([^\)]+)')
            item['url'] = response.url
            item['coursename'] = [s.replace("\u200b"," ") for s in response.css('div.rc-CTANavItem > div.content-container >h2.course-name-text::text').extract()],
            item['description'] =  response.xpath('//*[@id=" "]/div/div[1]/div/div[1]/div/p/text()').extract(),
            item['targetlearner'] = [s.replace("\u200b"," ") for s in response.xpath('//*[@id=" "]/div/div[2]/p/text()').extract()],
            item['creator'] = response.css('div.rc-Creators > div.partner > div.headline-2-text::text').extract(),
            item['instructors'] = response.css('div.rc-InstructorsSection > ul > li > div > div.bt3-row > div.instructor-info > p > span > a::text').extract(),
            item['basicinfo'] = response.css('div > div.rc-BasicInfo > table > tbody > tr > td.td-data::text').extract(),
            item['language'] = response.css('div > div.rc-BasicInfo > table > tbody > tr > td > div > div.rc-Language::text').extract(),
            item['weekname'] = [s.replace("\u200b"," ") for s in response.css('div.rc-Syllabus > div.rc-TogglableContent.syllabus > div.content > div.content-inner > div > div > div.week-body > div > div.module-name.headline-2-text::text').extract()],
            item['weekabout'] = response.css('div.rc-Syllabus > div.rc-TogglableContent.syllabus > div.content > div > div > div > div.week-body > div > div.module-desc.body-1-text > div > div.content > div::text').extract(),
            item['weekinfo'] = response.css('div.rc-Syllabus > div.rc-TogglableContent.syllabus > div.content > div > div > div > div.week-body > div > div.rc-ModuleSummary > div.summary.horizontal-box > div > span > span::text').extract(),
            item['weekgraded'] = response.css('div.rc-Syllabus > div.rc-TogglableContent.syllabus > div.content > div > div > div > div.week-body > div > div.rc-ModuleSummary > div.graded-items > span > span.body-1-text::text').extract(),
            item['ratingstars'] = response.xpath('//*[@id="ratings"]/div[2]/div[1]/div[2]/span/text()').extract(),
            item['ratingcount'] = response.xpath('//*[@id="ratings"]/div[2]/div[1]/div[2]/span/span/text()').extract()
            return item
