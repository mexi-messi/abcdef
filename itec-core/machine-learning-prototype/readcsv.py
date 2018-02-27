import csv

f = open('some.csv')
csv_f = csv.reader(f)
csv_f.next()

for row in csv_f:
    if int(row[2]) > 20:
        print(row[0] + " " +row[2] + " lon hon 20")
