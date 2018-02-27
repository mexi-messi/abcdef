import schedule as sc
import time
#https://pypi.python.org/pypi/schedule
def job():
    print("CONG VIEC 1")

def job2():
    print("CONG VIEC 2")

sc.every(2).seconds.do(job)
sc.every().sunday.at("13:15").do(job2)


while True:
    sc.run_pending()
