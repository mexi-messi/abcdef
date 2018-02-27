from sklearn import linear_model
import pandas as pd
csv = pd.read_csv("hh.csv")

space=csv['cao']
price=csv['nang']
x = space.reshape(-1,1)

regr = linear_model.LinearRegression()
regr.fit(x, price)
print("CAI DKM TRAC KU " + str(*regr.predict(177)))
