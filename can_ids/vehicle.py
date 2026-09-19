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


class ATM_Vehicle:
    def __init__(self, master):
        self.master = master
        self.frame = Frame(self.master)

        mm = PIL.Image.open("images/road1.jpg")
        img2 = PIL.ImageTk.PhotoImage(mm)
        panel2 = Label(self.master, image = img2)
        panel2.image = img2 # keep a reference!
        panel2.pack()
        panel2.place(x=0,y=0)

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

        mg8='a2.png"
        fg8 = PhotoImage(file='images/'+mg8)
        self.gg8 = self.canvas.create_image(10,10, anchor=NW, image=fg8)

        

if __name__ == '__main__':
    root = Tk()
    b = ATM_Vehicle(root)
    root.configure(background='black')
    root.title('ATM Vehicle Location')
    root.geometry("600x520")
    root.mainloop()
