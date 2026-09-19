import base64
import os
#from cryptography.hazmat.backends import default_backend
#from cryptography.hazmat.primitives import hashes
#from cryptography.hazmat.primitives.kdf.pbkdf2 import PBKDF2HMAC
#from cryptography.fernet import Fernet
import numpy as np
from matplotlib import pyplot as plt
import pandas as pd
from tkinter import filedialog
from tkinter.filedialog import asksaveasfile
from tkinter.filedialog import askopenfilename
from tkinter import messagebox
import cv2
from datetime import datetime
from datetime import date
import datetime
import os
import time
import threading
import random
from random import seed
from random import randint
import glob
import tkinter as tk
from tkinter import ttk
import PIL.Image, PIL.ImageTk
from tkinter import *
from PIL import Image
from PIL import ImageTk
#import seaborn as sns
#import plotly.express as px
import urllib.request
import urllib.parse
from urllib.request import urlopen
import webbrowser

from sklearn.model_selection import train_test_split
from sklearn.preprocessing import StandardScaler
from sklearn.decomposition import PCA
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import accuracy_score, classification_report, confusion_matrix

import matplotlib.pyplot as plt
import seaborn as sns


import mysql.connector
mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="",
  charset="utf8",
  database="cav_vehicle"
)

class VANGUI:
    def __init__(self, master):
        self.master = master
        self.frame = Frame(self.master)

        
        
        
        
        #self.canvas = Canvas(self.master, bg="white",height=320,width=450)
        #self.canvas.pack()
        #self.canvas.place(x=60,y=50)
        
        
        self.a1 = Label(self.master, text='CAV Simulation',bg='white', fg='brown', font=("Helvetica", 16))
        self.a1.pack()
        self.a1.place(x=200, y=150)
        self.b3 = Button(self.master, text="CAV Vehicle Location Tracking", command=self.traffic_log)
        self.b3.pack()
        self.b3.place(x=180, y=280)

        
        
        


        self.frame.pack()

   
    
    

    def traffic_log(self):
        self.newWindow = Toplevel(self.master)
        bb = VANControl(self.newWindow)

        url="http://localhost/can/test2.php"
        #print(url)
        webbrowser.open_new(url)

    def window_log(self):
            self.newWindow = Toplevel(self.master)
            bb = TrainData(self.newWindow)
                    
            #print('Hello Button1')
            #self.master.withdraw()
            '''un=self.E1.get()
            pw=self.E2.get()
            if un=="admin" and pw=="admin":
                    self.newWindow = Toplevel(self.master)
                    bb = Trafficlog(self.newWindow)
            else:
                    messagebox.showinfo("Login","Username/Password was wrong!")'''
   

class VANControl():
	
    def __init__(self, master):
        self.master = master
        self.frame = Frame(self.master)

        url="http://localhost/can/test2.php"
        #print(url)
        webbrowser.open_new(url)

        mm = PIL.Image.open("images/road1.jpg")
        img2 = PIL.ImageTk.PhotoImage(mm)
        panel2 = Label(self.master, image = img2)
        panel2.image = img2 # keep a reference!
        panel2.pack()
        panel2.place(x=0,y=0)

        '''mm = PIL.Image.open("images/sig.png")
        img2 = PIL.ImageTk.PhotoImage(mm)
        panel2 = Label(self.master,border=0, image = img2)
        panel2.image = img2 # keep a reference!
        panel2.pack()
        panel2.place(x=295,y=295)

        mm = PIL.Image.open("images/sig.png")
        img2 = PIL.ImageTk.PhotoImage(mm)
        panel2 = Label(self.master,border=0, image = img2)
        panel2.image = img2 # keep a reference!
        panel2.pack()
        panel2.place(x=495,y=295)

        mm = PIL.Image.open("images/sig.png")
        img2 = PIL.ImageTk.PhotoImage(mm)
        panel2 = Label(self.master,border=0, image = img2)
        panel2.image = img2 # keep a reference!
        panel2.pack()
        panel2.place(x=295,y=490)

        mm = PIL.Image.open("images/sig.png")
        img2 = PIL.ImageTk.PhotoImage(mm)
        panel2 = Label(self.master,border=0, image = img2)
        panel2.image = img2 # keep a reference!
        panel2.pack()
        panel2.place(x=495,y=490)'''

        self.canv = Canvas(self.master, bg='#59585D', highlightthickness=0,height=16,width=240)
        self.canv.pack()
        self.canv.place(x=2,y=332)

        
        
        self.canvas = Canvas(self.master, bg='#59585D', highlightthickness=0,height=20,width=820)
        self.canvas.pack()
        self.canvas.place(x=2,y=346)

        self.canvas2 = Canvas(self.master, bg='#59585D', highlightthickness=0,height=20,width=820)
        self.canvas2.pack()
        self.canvas2.place(x=2,y=375)

        self.canvas3 = Canvas(self.master, bg='#59585D', highlightthickness=0,height=1000,width=23)
        self.canvas3.pack()
        self.canvas3.place(x=342,y=30)

        self.canvas4 = Canvas(self.master, bg='#59585D', highlightthickness=0,height=1000,width=23)
        self.canvas4.pack()
        self.canvas4.place(x=377,y=30)

        self.canvas5 = Canvas(self.master, bg='#59585D', highlightthickness=0,height=900,width=23)
        self.canvas5.pack()
        self.canvas5.place(x=420,y=5)

        self.canvas6 = Canvas(self.master, bg='#59585D', highlightthickness=0,height=900,width=23)
        self.canvas6.pack()
        self.canvas6.place(x=460,y=5)

        self.canvas7 = Canvas(self.master, bg='#59585D', highlightthickness=0,height=22,width=700)
        self.canvas7.pack()
        self.canvas7.place(x=5,y=420)

        self.canvas8 = Canvas(self.master, bg='#59585D', highlightthickness=0,height=22,width=700)
        self.canvas8.pack()
        self.canvas8.place(x=5,y=460)

        

        
        
        self.a1 = Label(self.master, text='CAV Vehicle',bg='black', fg='yellow', font=("Helvetica", 16))
        self.a1.pack()
        self.a1.place(x=50, y=55)
        
        self.b1 = Button(self.master, text="Start",bg='black', fg='#99FF33', font=("Helvetica", 14), command=self.moveVehicle)
        #self.b2 = Button(self.master, text="Stop",bg='black', fg='#99FF33', font=("Helvetica", 14), command=self.stop)
        self.b1.pack()
        self.b1.place(x=50, y=100)
        #self.b2.pack()
        #self.b2.place(x=50, y=150)

 

        self.frame.pack()
        self.master.configure(background='lightblue')
        self.master.title('CAV Vehicle Location Tracking')
        self.master.geometry("850x850")

    def Encrypt(self,dfile,key1,dfile2):
    
        path="upload/"+dfile
        
        password_provided = key1 # This is input in the form of a string
        password = password_provided.encode() # Convert to type bytes
        salt = b'salt_' # CHANGE THIS - recommend using a key from os.urandom(16), must be of type bytes
        kdf = PBKDF2HMAC(
            algorithm=hashes.SHA256(),
            length=32,
            salt=salt,
            iterations=100000,
            backend=default_backend()
        )
        key = base64.urlsafe_b64encode(kdf.derive(password))
        input_file = 'upload/'+dfile
        output_file = 'encrypted/'+dfile2
        with open(input_file, 'rb') as f:
            data = f.read()

        fernet = Fernet(key)
        encrypted = fernet.encrypt(data)

        with open(output_file, 'wb') as f:
            f.write(encrypted)
   

    def Decrypt(self,dfile,key1,dfile2):
        
        password_provided = key1 # This is input in the form of a string
        password = password_provided.encode() # Convert to type bytes
        salt = b'salt_' # CHANGE THIS - recommend using a key from os.urandom(16), must be of type bytes
        kdf = PBKDF2HMAC(
            algorithm=hashes.SHA256(),
            length=32,
            salt=salt,
            iterations=100000,
            backend=default_backend()
        )
        key = base64.urlsafe_b64encode(kdf.derive(password))
        input_file = 'encrypted/'+dfile2
        output_file = 'decrypted/'+dfile2
        with open(input_file, 'rb') as f:
            data = f.read()

        fernet = Fernet(key)
        encrypted = fernet.decrypt(data)

        with open(output_file, 'wb') as f:
            f.write(encrypted)


    #Principal Component Analysis - RandomForest
    def load_model():
        mycursor = mydb.cursor()
        mycursor.execute("SELECT * FROM traffic_data")
        data = mycursor.fetchall()
        #print("Dataset Shape:", data.shape)
        #print(data.head())

        #SPLIT FEATURES & LABEL
        X = data.drop("label", axis=1)
        y = data["label"]

        #TRAIN-TEST SPLIT
        X_train, X_test, y_train, y_test = train_test_split(
            X, y, test_size=0.2, random_state=42
        )

        #FEATURE SCALING
        scaler = StandardScaler()
        X_train_scaled = scaler.fit_transform(X_train)
        X_test_scaled = scaler.transform(X_test)

        # PCA (DIMENSION REDUCTION)
        pca = PCA(n_components=0.95)  # retain 95% variance
        X_train_pca = pca.fit_transform(X_train_scaled)
        X_test_pca = pca.transform(X_test_scaled)

        print("Original Features:", X.shape[1])
        print("Reduced Features:", X_train_pca.shape[1])

        #RANDOM FOREST MODEL
        rf = RandomForestClassifier(
            n_estimators=100,
            random_state=42,
            max_depth=10
        )

        rf.fit(X_train_pca, y_train)

        #PREDICTION
        y_pred = rf.predict(X_test_pca)

        #EVALUATION
        accuracy = accuracy_score(y_test, y_pred)

        print("\nAccuracy:", accuracy)
        print("\nClassification Report:\n", classification_report(y_test, y_pred))

        # Confusion Matrix
        cm = confusion_matrix(y_test, y_pred)

        plt.figure()
        sns.heatmap(cm, annot=True, fmt="d")
        plt.title("Confusion Matrix")
        plt.xlabel("Predicted")
        plt.ylabel("Actual")
        plt.show()

    # REAL-TIME PREDICTION FUNCTION

    def detect_intrusion(new_data):
        """
        new_data: list or numpy array of feature values
        """
        new_data = np.array(new_data).reshape(1, -1)

        scaled = scaler.transform(new_data)
        pca_data = pca.transform(scaled)

        prediction = rf.predict(pca_data)[0]

        if prediction == 1:
            return "GPS Spoofing Attack Detected"
        else:
            return "Normal Behavior"

    ##

    def moveVehicle(self):

       

        mycursor = mydb.cursor()
        mycursor.execute("SELECT * FROM traffic_data")
        tdata = mycursor.fetchall()
        print(tdata)

        rn11=randint(1,5)
        txt='Vehicle'+str(rn11)

        #self.a1 = Label(self.master, text=txt,bg='white', fg='black', font=("Helvetica", 14))
        #self.a1.pack()
        #self.a1.place(x=560, y=30)

        ro1=randint(10,12)
        ro2=randint(78,79)
        ro3=randint(1000,7000)
        ro4=randint(1000,6000)
        ro5=randint(60,120)

        ro6=ro3+ro5
        ro7=ro4+ro5
        lat=str(ro1)+"."+str(ro6)
        lon=str(ro2)+"."+str(ro7)
        loc=lat+", "+lon
        
        ##Data from CSV
        #filename = 'dataset/road.csv'
        #data1 = pd.read_csv(filename, header=0)
        #data2 = list(data1.values.flatten())
        cnt=0
        i=0
        j=0
        j3=0
        j4=0
        dat1=[]
        dat2=[]
        dat3=[]
        dat4=[]
        maxcnt=15

        '''for ss in data1.values:
            cnt=len(ss)
            
                
            if ss[1]==1:
                if i<=maxcnt:
                    dat1.append(ss[2])
                    i+=1
            if ss[1]==2:
                if j<=maxcnt:
                    dat2.append(ss[2])
                    j+=1
            if ss[1]==3:
                if j3<=maxcnt:
                    dat3.append(ss[2])
                    j3+=1
            if ss[1]==4:
                if j4<=maxcnt:
                    dat4.append(ss[2])
                    j4+=1'''

        for ss in tdata:
            cnt=len(ss)
            dat1.append(ss[1])
            dat2.append(ss[2])
            dat3.append(ss[3])
            dat4.append(ss[4])
                   
            
        #print(dat1)
        #print(len(dat1))
        ####
        ####
        #print(dat1[0])
        #print(dat2[0])
        #print(dat3[0])
        #print(dat4[0])

        ff=open("det.txt","r")
        num=ff.read()
        ff.close()

        #num1=int(num)+1
        num1=randint(1,18)
        ff=open("det.txt","w")
        ff.write(str(num1))
        ff.close()

        pn=num1
        #print("pn="+str(pn))

        zn1=dat1[pn]
        zn2=dat2[pn]
        zn3=dat3[pn]
        zn4=dat4[pn]
        ###
        
        if zn1%2==1:
            zn11=zn1-1
            zna11=zn11/2
            xn=int(zna11)+1
            xn2=int(zna11)
        else:
            zna11=zn1/2
            xn=int(zna11)
            xn2=int(zna11)
        ###
        if zn2%2==1:
            zn22=zn2-1
            zna22=zn22/2
            xn7=int(zna22)+1
            xn8=int(zna22)
        else:
            zna22=zn2/2
            xn7=int(zna22)
            xn8=int(zna22)
        ###
        if zn3%2==1:
            zn33=zn3-1
            zna33=zn33/2
            xn3=int(zna33)+1
            xn4=int(zna33)
        else:
            zna33=zn3/2
            xn3=int(zna33)
            xn4=int(zna33)
        ###
        if zn4%2==1:
            zn44=zn4-1
            zna44=zn44/2
            xn5=int(zna44)+1
            xn6=int(zna44)
        else:
            zna44=zn4/2
            xn5=int(zna44)
            xn6=int(zna44)
        ###
            

        
        xna=randint(1,2)
        ga=0
        ia=1
        ka=1
        ha=0
        self.mmga=[]
        self.myga=[]
        
        #A Track1########
        #xn=randint(1,6)
        g=0
        i=1
        k=1
        h=0
        self.mmg=[]
        self.myg=[]

        #xn2=randint(1,6)
        g2=0
        i2=1
        k2=1
        h2=0
        self.mmg2=[]
        self.myg2=[]

        

        xn3=randint(1,6)
        mx3=xn3+1000
        g3=mx3
        i3=1
        k3=1
        h3=0
        self.mmg3=[]
        self.myg3=[]

        #xn4=randint(1,6)
        mx4=xn4+1000
        g4=mx4
        i4=1
        k4=1
        h4=0
        self.mmg4=[]
        self.myg4=[]

        #xn5=randint(1,6)
        g5=0
        i5=1
        k5=1
        h5=0
        self.mmg5=[]
        self.myg5=[]

        #xn6=randint(1,6)
        g6=0
        i6=1
        k6=1
        h6=0
        self.mmg6=[]
        self.myg6=[]

        #xn7=randint(1,6)
        mx7=xn7+900
        g7=mx7
        i7=1
        k7=1
        h7=0
        self.mmg7=[]
        self.myg7=[]

        #xn8=randint(1,6)
        mx8=xn8+900
        g8=mx8
        i8=1
        k8=1
        h8=0
        self.mmg8=[]
        self.myg8=[]


        ax=xn+xn2
        cx=xn3+xn4
        dx=xn5+xn6
        bx=xn7+xn8
        axx=[ax,bx,cx,dx]
        
        print(axx)

        self.v1=ax
        self.v2=bx
        self.v3=cx
        self.v4=dx
        
        ###
        ii=0
        av=0
        ave=0
        while ii<3:
            iii=ii+1
            if axx[iii]>axx[0]:
                av+=1
            if axx[iii]==axx[0]:
                ave+=1
            

            ii+=1
        if ave>0:
            if ave==3:
                av=0
            else:
                av=av+0
                
        a_lev=av+1
        ##
        ii2=0
        bv=0
        bve=0
        while ii2<4:
            if ii2==1:
                nores=0
            else:
                if axx[ii2]>axx[1]:
                    bv+=1
                if axx[ii2]==axx[1]:
                    bve+=1
                
            ii2+=1
        if bve>0:
            if bve==3:
                bv=1
            else:
                if axx[0]==axx[1]:
                    bv=bv+1
                else:
                    bv=bv+0
        b_lev=bv+1
        ##
        ii3=0
        cv=0
        cve=0
        while ii3<4:
            if ii3==2:
                nores=0
            else:
                if axx[ii3]>axx[2]:
                    cv+=1
                if axx[ii3]==axx[2]:
                    cve+=1
            ii3+=1
        if cve>0:
            if cve==3:
                cv=2
            else:
                if cve==2:
                    if axx[0]==axx[2] and axx[1]==axx[2]:
                        cv=cv+2
                    elif axx[0]==axx[2]:
                        cv=cv+1
                    elif axx[1]==axx[2]:
                        cv=cv+1
                    else:
                        cv=cv+0
                elif cve==1:
                    if axx[0]==axx[2] or axx[1]==axx[2]:
                        cv=cv+1
                    else:
                        cv=cv+0
        c_lev=cv+1
        ##
        ii4=0
        dv=0
        dve=0
        while ii4<4:
            if ii4==3:
                nores=0
            else:
                if axx[ii4]>axx[3]:
                    dv+=1
                if axx[ii4]==axx[3]:
                    dve+=1
            ii4+=1
        if dve>0:
            if dve==3:
                dv=3
            else:
                if dve==2:
                    dv=dv+2
                elif dve==1:
                    dv=dv+1
                else:
                    dv=dv+0
                
        d_lev=dv+1
        ###
        #print(a_lev)
        #print(b_lev)
        #print(c_lev)
        #print(d_lev)
        
        #print(str(ave)+" "+str(bve)+" "+str(cve)+" "+str(dve))
        #####
        time1=0
        time2=0
        time3=0
        time4=0
        
        ar_big=[ax,bx,cx,dx]
        ar_big.sort()
        #print(ar_big)
        if ar_big[3]>30:
            tt1=ar_big[3]/2
            time1=int(tt1)
        elif ar_big[3]>25:
            time1=18
        elif ar_big[3]>20:
            time1=15
        elif ar_big[3]>10:
            time1=11
        elif ar_big[3]>5:
            time1=8
        else:
            time1=5
            
       
        ####
        if ar_big[2]>30:
            tt2=ar_big[2]/2
            time2=int(tt2)
        elif ar_big[2]>25:
            time2=18
        elif ar_big[2]>20:
            time2=15
        elif ar_big[2]>10:
            time2=11
        elif ar_big[2]>5:
            time2=8
        else:
            time1=5
        
        ####
        if ar_big[1]>30:
            tt3=ar_big[1]/2
            time3=int(tt3)
        elif ar_big[1]>25:
            time3=18
        elif ar_big[1]>20:
            time3=15
        elif ar_big[1]>10:
            time3=11
        elif ar_big[1]>5:
            time3=8
        else:
            time3=5
        ####
        if ar_big[0]>30:
            tt4=ar_big[0]/2
            time4=int(tt4)
        elif ar_big[0]>25:
            time4=18
        elif ar_big[0]>20:
            time4=15
        elif ar_big[0]>10:
            time4=11
        elif ar_big[0]>5:
            time4=8
        else:
            time4=5
        

        trg1=65

        rg2=time2*20
        trg2=trg1+rg2

        rg3=time3*25
        trg3=trg2+rg3

        rg4=time4*25
        trg4=trg3+rg4
        trg5=trg4+200
        trg55=trg5-5
        #print("trg55")
        #print(trg55)

        '''if ar_big[0]>30:
            time1=20
        elif ar_big[0]>20:
            time1=15
        elif ar_big[0]>15:
            time1=10
        else:
            time1=5'''
            
        if ax<=4:
            a_lev=1
            time1=5
            if bx>=cx and bx>=dx:
                b_lev=2
                if cx>=dx:
                    c_lev=3
                    d_lev=4
                else:
                    d_lev=3
                    c_lev=4
            if cx>=bx and cx>=dx:
                c_lev=2
                if bx>=dx:
                    b_lev=3
                    d_lev=4
                else:
                    d_lev=3
                    b_lev=4
            if dx>=bx and dx>=cx:
                d_lev=2
                if cx>=bx:
                    c_lev=3
                    b_lev=4
                else:
                    b_lev=3
                    c_lev=4
            
                
                
        elif bx<=4:
            b_lev=1
            time1=5
            if ax>=cx and ax>=dx:
                a_lev=2
                if cx>=dx:
                    c_lev=3
                    d_lev=4
                else:
                    d_lev=3
                    c_lev=4
            if cx>=ax and cx>=dx:
                c_lev=2
                if ax>=dx:
                    a_lev=3
                    d_lev=4
                else:
                    d_lev=3
                    a_lev=4
            if dx>=ax and dx>=cx:
                d_lev=2
                if cx>=ax:
                    c_lev=3
                    a_lev=4
                else:
                    a_lev=3
                    c_lev=4
            

            
        elif cx<=4:
            c_lev=1
            time1=5
            if ax>=bx and ax>=dx:
                a_lev=2
                if bx>=dx:
                    b_lev=3
                    d_lev=4
                else:
                    d_lev=3
                    b_lev=4
            if bx>=ax and bx>=dx:
                b_lev=2
                if ax>=dx:
                    a_lev=3
                    d_lev=4
                else:
                    d_lev=3
                    a_lev=4
            if dx>=ax and dx>=bx:
                d_lev=2
                if ax>=bx:
                    a_lev=3
                    b_lev=4
                else:
                    b_lev=3
                    a_lev=4

            
        elif dx<=4:
            d_lev=1
            time1=5
            if bx>=ax and bx>=cx:
                b_lev=2
                if cx>=dx:
                    c_lev=3
                    d_lev=4
                else:
                    d_lev=3
                    c_lev=4
            if cx>=bx and cx>=dx:
                c_lev=2
                if bx>=dx:
                    b_lev=3
                    d_lev=4
                else:
                    d_lev=3
                    b_lev=4
            if ax>=bx and ax>=cx:
                a_lev=2
                if bx>=cx:
                    b_lev=3
                    c_lev=4
                else:
                    c_lev=3
                    b_lev=4
            
        
        
        if a_lev==1:
            value1="A-1, Count:"+str(ax)+", Time:"+str(time1)
            rng1=trg1
        elif a_lev==2:
            value1="A-2, Count:"+str(ax)+", Time:"+str(time2)
            rng1=trg2
        elif a_lev==3:
            value1="A-3, Count:"+str(ax)+", Time:"+str(time3)
            rng1=trg3
        elif a_lev==4:
            value1="A-4, Count:"+str(ax)+", Time:"+str(time4)
            rng1=trg4
        #####
        if b_lev==1:
            value2="B-1, Count:"+str(bx)+", Time:"+str(time1)
            rng2=trg1
        elif b_lev==2:
            value2="B-2, Count:"+str(bx)+", Time:"+str(time2)
            rng2=trg2
        elif b_lev==3:
            value2="B-3, Count:"+str(bx)+", Time:"+str(time3)
            rng2=trg3
        elif b_lev==4:
            value2="B-4, Count:"+str(bx)+", Time:"+str(time4)
            rng2=trg4
        #####
        if c_lev==1:
            value3="C-1, Count:"+str(cx)+", Time:"+str(time1)
            rng3=trg1
        elif c_lev==2:
            value3="C-2, Count:"+str(cx)+", Time:"+str(time2)
            rng3=trg2
        elif c_lev==3:
            value3="C-3, Count:"+str(cx)+", Time:"+str(time3)
            rng3=trg3
        elif c_lev==4:
            value3="C-4, Count:"+str(cx)+", Time:"+str(time4)
            rng3=trg4
        #####
        if d_lev==1:
            value4="D-1, Count:"+str(dx)+", Time:"+str(time1)
            rng4=trg1
        elif d_lev==2:
            value4="D-2, Count:"+str(dx)+", Time:"+str(time2)
            rng4=trg2
        elif d_lev==3:
            value4="D-3, Count:"+str(dx)+", Time:"+str(time3)
            rng4=trg3
        elif d_lev==4:
            value4="D-4, Count:"+str(dx)+", Time:"+str(time4)
            rng4=trg4
            

        while ia<=xna:
            ha=ia-1
            hha=ha-ga
            ja=randint(1,5)
            mga='a'+str(ja)+".png"
            fga = PhotoImage(file='images/'+mga)
            self.mmga.append(fga)
            self.gga = self.canv.create_image(hha,0, anchor=NW, image=self.mmga[ha])
            self.myga.append(self.gga)
            #self.my_image1 = PhotoImage(file='images/a2.png')
            #self.my_img1 = self.canvas.create_image(0,0, anchor=NW, image=self.my_image1)
            ga+=50
            
            ia+=1
            
        while i<=xn:
            h1=i-1
            hh=h-g
            j=randint(1,5)
            mg='a'+str(j)+".png"
            fg = PhotoImage(file='images/'+mg)
            self.mmg.append(fg)
            self.gg = self.canvas.create_image(hh,0, anchor=NW, image=self.mmg[h1])
            self.myg.append(self.gg)
            #self.my_image1 = PhotoImage(file='images/a2.png')
            #self.my_img1 = self.canvas.create_image(0,0, anchor=NW, image=self.my_image1)
            g+=50
            
            i+=1

        while i2<=xn2:
            
            h2=i2-1
            hh2=h2-g2
            j2=randint(1,5)
            mg2='a'+str(j2)+".png"
            fg2 = PhotoImage(file='images/'+mg2)
            self.mmg2.append(fg2)
            self.gg2 = self.canvas2.create_image(hh2,0, anchor=NW, image=self.mmg2[h2])
            self.myg2.append(self.gg2)
            g2+=50
            
            i2+=1

        while i3<=xn3:
            
            h3=i3-1
            hh3=h3+g3
            j3=randint(1,5)
            mg3='c'+str(j3)+".png"
            fg3 = PhotoImage(file='images/'+mg3)
            self.mmg3.append(fg3)
            self.gg3 = self.canvas3.create_image(0,hh3, anchor=NW, image=self.mmg3[h3])
            self.myg3.append(self.gg3)
            g3-=50
            
            i3+=1

        while i4<=xn4:
            
            h4=i4-1
            hh4=h4+g4
            j4=randint(1,5)
            mg4='c'+str(j4)+".png"
            fg4 = PhotoImage(file='images/'+mg4)
            self.mmg4.append(fg4)
            self.gg4 = self.canvas4.create_image(0,hh4, anchor=NW, image=self.mmg4[h4])
            self.myg4.append(self.gg4)
            g4-=50
            
            i4+=1

        while i5<=xn5:
            
            h5=i5-1
            hh5=h5-g5
            j5=randint(1,5)
            mg5='d'+str(j5)+".png"
            fg5 = PhotoImage(file='images/'+mg5)
            self.mmg5.append(fg5)
            self.gg5 = self.canvas5.create_image(0,hh5, anchor=NW, image=self.mmg5[h5])
            self.myg5.append(self.gg5)
            g5+=50
            
            i5+=1
        while i6<=xn6:
            
            h6=i6-1
            hh6=h6-g6
            j6=randint(1,5)
            mg6='d'+str(j6)+".png"
            fg6 = PhotoImage(file='images/'+mg6)
            self.mmg6.append(fg6)
            self.gg6 = self.canvas6.create_image(0,hh6, anchor=NW, image=self.mmg6[h6])
            self.myg6.append(self.gg6)
            g6+=50
            
            i6+=1

        while i7<=xn7:
            
            h7=i7-1
            hh7=h7+g7
            j7=randint(1,5)
            mg7='b'+str(j7)+".png"
            fg7 = PhotoImage(file='images/'+mg7)
            self.mmg7.append(fg7)
            self.gg7 = self.canvas7.create_image(hh7,0, anchor=NW, image=self.mmg7[h7])
            self.myg7.append(self.gg7)
            g7-=50
            
            i7+=1

        while i8<=xn8:
            
            h8=i8-1
            hh8=h8+g8
            j8=randint(1,5)
            mg8='b'+str(j8)+".png"
            fg8 = PhotoImage(file='images/'+mg8)
            self.mmg8.append(fg8)
            self.gg8 = self.canvas8.create_image(hh8,0, anchor=NW, image=self.mmg8[h8])
            self.myg8.append(self.gg8)
            g8-=50
            
            i8+=1
        bsig="sig.png"
        asig="sig.png"
        csig="sig.png"
        dsig="sig.png"

        nn=0
        
        print(trg5)

        ff=open("bc.txt","r")
        bc=ff.read()
        ff.close()

        bf=bc+".txt"

        ff1=open("../can/"+bf,"r")
        vf=ff1.read()
        ff1.close()

        vv=vf.split(',')
        vlen=len(vv)
        rn1=randint(1,vlen)
        rn2=rn1-1
        van=vv[rn2]

        
        
        for x in range(0,trg5):

            value1="Vehicle Number: "+van+""
            '''self.a1 = Label(self.master, text=value1,bg='white', fg='black', font=("Helvetica", 14))
            self.a1.pack()
            self.a1.place(x=520, y=30)
                
            if nn>=100 and nn<=250:
                self.a1 = Label(self.master, text='GPS Location Sensing.......................',bg='#FFFFFF', fg='#006600', font=("Helvetica", 14))
                self.a1.pack()
                self.a1.place(x=520, y=70)
            elif nn>250 and nn<=350:
                self.a1 = Label(self.master, text='GPS Location Encrypting....................',bg='#FFFFFF', fg='#006600', font=("Helvetica", 14))
                self.a1.pack()
                self.a1.place(x=520, y=70)
                
            elif nn>350 and nn<=650:
                self.a1 = Label(self.master, text='GPS Location Uploading....................',bg='#FFFFFF', fg='#006600', font=("Helvetica", 14))
                self.a1.pack()
                self.a1.place(x=520, y=70)
            elif nn>650:
                self.a1 = Label(self.master, text='Sent Success.....................',bg='#FFFFFF', fg='#006600', font=("Helvetica", 14))
                self.a1.pack()
                self.a1.place(x=520, y=70)'''
            self.canvas = Canvas(self.master, bg='white', highlightthickness=0,height=300,width=200)
            self.canvas.pack()
            self.canvas.place(x=10,y=540)

            now1 = datetime.datetime.now()
            rdate=now1.strftime("%d-%m-%Y")
            rtime=now1.strftime("%H:%M:%S")
            dtime=rdate+" "+rtime
        
            self.a1 = Label(self.master, text=value1,bg='#FFFFFF', fg='blue', font=("Times New Roman", 12))
            self.a1.pack()
            self.a1.place(x=20, y=560)

            if nn>=100 and nn<=250:
                self.a1 = Label(self.master, text='GPS Location Sensing',bg='#FFFFFF', fg='blue', font=("Times New Roman", 12))
                self.a1.pack()
                self.a1.place(x=20, y=580)

                self.a1 = Label(self.master, text=dtime,bg='#FFFFFF', fg='blue', font=("Times New Roman", 12))
                self.a1.pack()
                self.a1.place(x=20, y=600)
            elif nn>250 and nn<=350:
                self.a1 = Label(self.master, text='GPS Location Encrypting',bg='#FFFFFF', fg='blue', font=("Times New Roman", 12))
                self.a1.pack()
                self.a1.place(x=20, y=580)

                self.a1 = Label(self.master, text=dtime,bg='#FFFFFF', fg='blue', font=("Times New Roman", 12))
                self.a1.pack()
                self.a1.place(x=20, y=600)
            elif nn>350 and nn<=420:
                self.a1 = Label(self.master, text='GPS Location Uploading',bg='#FFFFFF', fg='blue', font=("Times New Roman", 12))
                self.a1.pack()
                self.a1.place(x=20, y=580)

                self.a1 = Label(self.master, text=dtime,bg='#FFFFFF', fg='blue', font=("Times New Roman", 12))
                self.a1.pack()
                self.a1.place(x=20, y=600)
            elif nn>420:

                self.a1 = Label(self.master, text='Sent Success',bg='#FFFFFF', fg='blue', font=("Times New Roman", 12))
                self.a1.pack()
                self.a1.place(x=20, y=580)

                self.a1 = Label(self.master, text=dtime,bg='#FFFFFF', fg='blue', font=("Times New Roman", 12))
                self.a1.pack()
                self.a1.place(x=20, y=600)

            '''self.a1 = Label(self.master, text='Sent Success',bg='#FFFFFF', fg='blue', font=("Times New Roman", 12))
            self.a1.pack()
            self.a1.place(x=20, y=580)

            self.a1 = Label(self.master, text="30-01-2024 16:28:25",bg='#FFFFFF', fg='blue', font=("Times New Roman", 12))
            self.a1.pack()
            self.a1.place(x=20, y=600)'''
            ##
            
           
            ##  
            nn+=1
                      
            #print("x="+str(x))
            '''self.a1 = Label(self.master, text=value1,bg='white', fg='black', font=("Helvetica", 14))
            self.a1.pack()
            self.a1.place(x=560, y=30)
            self.a1 = Label(self.master, text=value2,bg='white', fg='black', font=("Helvetica", 14))
            self.a1.pack()
            self.a1.place(x=560, y=60)
            self.a1 = Label(self.master, text=value3,bg='white', fg='black', font=("Helvetica", 14))
            self.a1.pack()
            self.a1.place(x=560, y=90)
            self.a1 = Label(self.master, text=value4,bg='white', fg='black', font=("Helvetica", 14))
            self.a1.pack()
            self.a1.place(x=560, y=120)'''
                
            ka=1
            while ka<=xna:
                kka=ka-1
                
                if x<50:

                    self.canv.move(self.myga[kka], 4, 0)
                else:
                    
                    self.canv.move(self.myga[kka], 0, -4)
                    
                ka+=1

            ##A Track1
            k=1
            while k<=xn:
                kk=k-1
                if a_lev==1:
                    rval=trg2
                elif a_lev==2:
                    rval=trg3
                elif a_lev==3:
                    rval=trg4
                else:
                    rval=trg5
                    
                if x<60:
                    
                    self.canvas.move(self.myg[kk], 4, 0)
                elif x>rng1 and x<rval:
                    asig="green.png"
                    bsig="sig.png"
                    csig="sig.png"
                    dsig="sig.png"
                    self.canvas.move(self.myg[kk], 4, 0)
                k+=1
            ##A Track2
            k2=1
            while k2<=xn2:
                rrr1=rng1-3
                if a_lev==1:
                    rval=trg2
                elif a_lev==2:
                    rval=trg3
                elif a_lev==3:
                    rval=trg4
                else:
                    rval=trg5
                kk2=k2-1
                if x<60:
                    self.canvas2.move(self.myg2[kk2], 4, 0)
                elif x>rng1 and x<rval:
                    asig="green.png"
                    bsig="sig.png"
                    csig="sig.png"
                    dsig="sig.png"
                    self.canvas2.move(self.myg2[kk2], 4, 0)
                k2+=1

            ##C Track1
            k3=1
            while k3<=xn3:
                rrr3=rng3-3
                if c_lev==1:
                    rval=trg2
                elif c_lev==2:
                    rval=trg3
                elif c_lev==3:
                    rval=trg4
                else:
                    rval=trg5
                kk3=k3-1
                if x<60:
                    self.canvas3.move(self.myg3[kk3], 0, -4)
                elif x>rng3 and x<rval:
                    csig="green.png"
                    bsig="sig.png"
                    asig="sig.png"
                    dsig="sig.png"
                    self.canvas3.move(self.myg3[kk3], 0, -4)
                k3+=1

            ##C Track2
            k4=1
            while k4<=xn4:
                kk4=k4-1
                rrr3=rng3-3
                if c_lev==1:
                    rval=trg2
                elif c_lev==2:
                    rval=trg3
                elif c_lev==3:
                    rval=trg4
                else:
                    rval=trg5
                if x<60:
                    self.canvas4.move(self.myg4[kk4], 0, -4)
                elif x>rng3 and x<rval:
                    csig="green.png"
                    bsig="sig.png"
                    asig="sig.png"
                    dsig="sig.png"
                    self.canvas4.move(self.myg4[kk4], 0, -4)
                k4+=1

            ##D Track1
            k5=1
            while k5<=xn5:
                kk5=k5-1
                rrr4=rng4-3
                if d_lev==1:
                    rval=trg2
                elif d_lev==2:
                    rval=trg3
                elif d_lev==3:
                    rval=trg4
                else:
                    rval=trg5
                if x<60:
                    self.canvas5.move(self.myg5[kk5], 0, 4)
                elif x>rng4 and x<rval:
                    dsig="green.png"
                    bsig="sig.png"
                    csig="sig.png"
                    asig="sig.png"
                    self.canvas5.move(self.myg5[kk5], 0, 4)
                k5+=1
            ##D Track2
            
            k6=1
            while k6<=xn6:
                kk6=k6-1
                rrr4=rng4-3
                if d_lev==1:
                    rval=trg2
                elif d_lev==2:
                    rval=trg3
                elif d_lev==3:
                    rval=trg4
                else:
                    rval=trg5
                if x<60:
                    self.canvas6.move(self.myg6[kk6], 0, 4)
                elif x>rng4 and x<rval:
                    dsig="green.png"
                    bsig="sig.png"
                    csig="sig.png"
                    asig="sig.png"
                    self.canvas6.move(self.myg6[kk6], 0, 4)   
                k6+=1

            ##B Track1
            k7=1
            while k7<=xn7:
                kk7=k7-1
                rrr2=rng2-3
                if b_lev==1:
                    rval=trg2
                elif b_lev==2:
                    rval=trg3
                elif b_lev==3:
                    rval=trg4
                else:
                    rval=trg5
                if x<60:
                    self.canvas7.move(self.myg7[kk7], -4, 0)
                elif x>rng2 and x<rval:
                    bsig="green.png"
                    asig="sig.png"
                    csig="sig.png"
                    dsig="sig.png"
                    self.canvas7.move(self.myg7[kk7], -4, 0)
                k7+=1
            ##B Track2
            
            k8=1
            while k8<=xn8:
                kk8=k8-1
                rrr2=rng2-3
                if b_lev==1:
                    rval=trg2
                elif b_lev==2:
                    rval=trg3
                elif b_lev==3:
                    rval=trg4
                else:
                    rval=trg5
                if x<60:
                    self.canvas8.move(self.myg8[kk8], -4, 0)
                elif x>rng2 and x<rval:
                    bsig="green.png"
                    asig="sig.png"
                    csig="sig.png"
                    dsig="sig.png"
                    self.canvas8.move(self.myg8[kk8], -4, 0)
                k8+=1
            ##signal
            rrr1=rng1-3
            rrr2=rng2-3
            rrr3=rng3-3
            rrr4=rng4-3
            #print(str(rrr1)+" "+str(rrr2)+" "+str(rrr3)+" "+str(rrr4))
            

            
                
            '''mm1 = PIL.Image.open("images/"+asig)
            img1 = PIL.ImageTk.PhotoImage(mm1)
            panel1 = Label(self.master,border=0, image = img1)
            panel1.image = img1 # keep a reference!
            panel1.pack()
            panel1.place(x=295,y=295)

            mm2 = PIL.Image.open("images/"+bsig)
            img2 = PIL.ImageTk.PhotoImage(mm2)
            panel2 = Label(self.master,border=0, image = img2)
            panel2.image = img2 # keep a reference!
            panel2.pack()
            panel2.place(x=495,y=490)

            mm3 = PIL.Image.open("images/"+csig)
            img3 = PIL.ImageTk.PhotoImage(mm3)
            panel3 = Label(self.master,border=0, image = img3)
            panel3.image = img3 # keep a reference!
            panel3.pack()
            panel3.place(x=295,y=490)

            mm4 = PIL.Image.open("images/"+dsig)
            img4 = PIL.ImageTk.PhotoImage(mm4)
            panel4 = Label(self.master,border=0, image = img4)
            panel4.image = img4 # keep a reference!
            panel4.pack()
            panel4.place(x=495,y=295)'''
            
            ##
            self.master.update()
            time.sleep(0.01)

            
                
        
        ############
       



if __name__ == '__main__':
    root = Tk()
    b = VANControl(root)
    root.configure(background='white')
    root.title('CAV Simulation')
    root.geometry("800x750")
    root.mainloop()
