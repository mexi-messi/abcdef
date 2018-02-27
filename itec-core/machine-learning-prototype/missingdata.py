from sklearn import linear_model
import numpy as np
from numpy import matrix
import pandas as pd
import mysql.connector
import pandas as pd
from fancyimpute import KNN
cnx = mysql.connector.connect(user='root', password='123456', database='a')

cursor = cnx.cursor()
querry1 = ("SELECT cao,dai FROM e")
cursor.execute(querry1)
rows = cursor.fetchall()
x = matrix(rows)
X = (KNN(3).complete(x))
print X

querry2 = ("SELECT nang from e")
cursor.execute(querry2)
rows2 = cursor.fetchall()
y = matrix(rows2)
print y
# print y
# regr = linear_model.LinearRegression()
# regr.fit(X,y)
# print regr.predict([[1,2]])
cursor.close()
cnx.close()
