
import mysql.connector
from numpy import matrix

# a = pd.DataFrame(coursera,columns = ['coursename','rating','no_rating','no_review'])
cnx = mysql.connector.connect(user='root', password='123456', database='a')
def coursera():
    lspoint = {}
    # coursera = pd.read_csv("courserasql.csv")
    # ux, point = coursera [['coursename','rating','no_rating','no_review']], coursera['total']
    # print point
    # for i in range(len(point)):
    #      if  point[i] != max(point):
    #          point.pop(i)
    cursor = cnx.cursor()
    querry1 = ("SELECT coursename FROM xyz as x1 WHERE x1.no_review >= all(select x2.no_review from xyz as x2)")

    cursor.execute(querry1)
    rows = cursor.fetchall()
    X = matrix(rows)

    total = totalread+totalvid+totalquiz+1
    activist =(totalvid+totalquiz+1)%total
    reflector =(totalvid+1)%total
    pragmatist =(totalquiz+1+totalvid)%total
    theorist =(totalread+totalquiz)%total
    # querry2 = ("SELECT total from course")
    # cursor.execute(querry2)
    # rows2 = cursor.fetchall()
    # y = matrix(rows2)
    #
    # regr = linear_model.LinearRegression()
    # regr.fit(X,y)
    lspoint.update({'coursename':X,'activist':activist,'reflector':reflector,'pragmatist':pragmatist,'theorist':theorist})
    cursor.close()
    cnx.close()
    return lspoint

coursera()
