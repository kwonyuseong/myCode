from tkinter import *
class MyApp:
    def __init__(self,Parent):
        self.F=Frame(Parent)
        self.F.pack()
       
       
        self.button1=Button(self.F)
        self.button1["text"]="Hello, World!"
        self.button1.pack()
        
        self.button2 = Button(self.F)
        self.button2["text"] = "Submit"
        self.button2.pack()
        
        
        
root = Tk()
myapp=MyApp(root)
root.mainloop()