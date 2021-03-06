from sklearn import datasets, linear_model
import matplotlib.pyplot as plt
import numpy as np
import pandas as pd
csv = pd.read_csv("hh.csv")

space=csv[['tutor','globalranking','noreview','rating','point']]
price=csv['total_point']
X = np.array(space).reshape(-1,5)

y = np.array(price)

X_train = X[:len(X)/2]
X_test =X[len(X)/2:]
y_train = y[:len(y)/2]
y_test = y[len(y)/2:]

regr = linear_model.LinearRegression()
regr.fit(X,y)

#train result
#plt.scatter(X_train, y_train, color= 'red')
# plt.plot(X_train, regr.predict(X_train), color = 'blue')
# plt.title ("Visuals for Training Dataset")
# plt.xlabel("rating")
# plt.ylabel("comment")
# plt.show()
#
# #Test Results
# plt.scatter(X_test, y_test, color= 'red')
# plt.plot(X_test, regr.predict(X_test), color = 'blue')
# plt.title("Visuals for Test DataSet")
# plt.xlabel("rating")
# plt.ylabel("comment")
# plt.show()

print regr.predict([[1,2,3,4,5]])
