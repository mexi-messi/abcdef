from sklearn import linear_model
import numpy as np
from numpy import matrix
import pandas as pd
import mysql.connector
import pandas as pd
cnx = mysql.connector.connect(user='root', password='123456', database='a')

cursor = cnx.cursor()
querry1 = ("SELECT tutor,cm,rating,ranking FROM course")
cursor.execute(querry1)
rows = cursor.fetchall()
X = matrix(rows)

querry2 = ("SELECT total from course")
cursor.execute(querry2)
rows2 = cursor.fetchall()
y = matrix(rows2)

regr = linear_model.LinearRegression()
regr.fit(X,y)


cursor.close()
cnx.close()
