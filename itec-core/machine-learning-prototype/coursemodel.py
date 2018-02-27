from sklearn import linear_model
import mysql.connector
from numpy import matrix
#connect to mysql
cnx = mysql.connector.connect(user='root', password='123456', database='a')
#define course
class course:
    lspoint  = {}
    activist = 0
    reflector = 0
    pragmatist = 0
    theorist = 0
    def __init__(self,overview,activist,reflector,pragmatist,theorist):
        self.lspoint = lspoint
        self.activist = activist
        self.reflector = reflector
        self.pragmatist = pragmatist
        self.theorist = theorist
#define coursera
class coursera(course):
    cursor = cnx.cursor()
    #querry to select course that has highest point
    querry1 = ("SELECT coursename FROM xyz as x1 WHERE x1.no_review >= all(select x2.no_review from xyz as x2)")
    cursor.execute(querry1)
    rows = cursor.fetchall()
    #querry to select feature for linear regression
    querry2 = ("SELECT rating,no_rating,no_review FROM xyz")
    cursor.execute(querry2)
    rows2 = cursor.fetchall()
    X = matrix(rows2)
    #querry to select feature for linear regression
    querry3 = ("SELECT total from xyz")
    cursor.execute(querry3)
    rows3 = cursor.fetchall()
    y = matrix(rows3)
    #linear regression for predicting totalpoint
    regr = linear_model.LinearRegression()
    regr.fit(X,y)
    #calculate learning style point
    total = 1
    totalvid = 2
    totalquiz = 3
    totalread = 4
    total = totalread+totalvid+totalquiz+1
    course.activist =(totalvid+totalquiz+1)%total
    course.reflector =(totalvid+1)%total
    course.pragmatist =(totalquiz+1+totalvid)%total
    course.theorist =(totalread+totalquiz)%total
    course.lspoint.update({'coursename':rows,'activist':course.activist,'reflector':course.reflector,'pragmatist':course.pragmatist,'theorist':course.theorist})

    # cursor.close()
#define udacity
class udacity(course):
    cursor = cnx.cursor()
    querry1 = ("SELECT coursename FROM udacity as x1 WHERE x1.bookmark >= all(select x2.bookmark from udacity as x2)")
    cursor.execute(querry1)
    rows = cursor.fetchall()
    X = matrix(rows)
    #querry to select feature for linear regression
    # querry2 = ("SELECT tutor,cm,rating,ranking FROM udacity")
    # cursor.execute(querry2)
    # rows = cursor.fetchall()
    # X = matrix(rows)
    # #querry to select feature for linear regression
    # querry3 = ("SELECT total from udacity")
    # cursor.execute(querry3)
    # rows2 = cursor.fetchall()
    # y = matrix(rows2)

    #calculate learning style point
    total = 5
    totalvid = 6
    totalquiz = 7
    totalread = 8
    total = totalread+totalvid+totalquiz+1
    course.activist =(totalvid+totalquiz+1)%total
    course.reflector =(totalvid+1)%total
    course.pragmatist =(totalquiz+1+totalvid)%total
    course.theorist =(totalread+totalquiz)%total
    course.lspoint.update({'coursename':rows,'activist':course.activist,'reflector':course.reflector,'pragmatist':course.pragmatist,'theorist':course.theorist})
    cursor.close()
#course comparing function
def compare(self,other,key):
    if (key == "activist"):
        if (max(self.lspoint["%s"%key],other.lspoint["%s"%(key)]) == self.lspoint["%s"%key]):
            return self.lspoint
        else:
            return other.lspoint

cnx.close()
print (compare (coursera,udacity,"activist"))
