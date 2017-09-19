# 세부정보 
# 해결 해야하는것 
# 각각 버튼 카테고리 선택 등 상호작용 어떻게 하는 지 배울것 

#공부한 내용


# imports
import tkinter as tk
import tkinter.scrolledtext as tkst
from tkinter import Menu
from tkinter import ttk


# Click OK button
def clickOK():
    text = "<------------구분선------------->"
    text = text + "\n" + category.get() + "카테고리를 선택 하셧습니다."
    text = text + "\n총 " + str(post_num.get()) + "개의 포스트 가 작성됩니다.\n"
    scrt.insert(tk.INSERT, text)                    # insert text in a scrolledtext
    scrt.see(tk.END)


# Click radio buttons
def clickRadio():
    scrt.insert(tk.INSERT, value3.get())
    scrt.see(tk.END)


# Click a exit menu
def clickExit():
    win.quit()
    win.destroy()
    exit()


if __name__ == '__main__':
    #타이틀 및 기본 설정
    win = tk.Tk()                                   
    win.title("네이버 오토 포스팅기")                     
    
    #카테고리 선택 창
        #카테고리 텍스트
    labelcategory = ttk.Label(win, text="카테고리 :")    
    labelcategory.grid(column=0, row=0)            
    
        #카테고리 내용    
    category = tk.StringVar()                                         # String variable
    categoryCombo = ttk.Combobox(win, width=6, textvariable=category)   # Create a combobox
    categoryCombo['values'] = ("IT", "일본")                      # Combobox's items
    categoryCombo.grid(column=1, row=0)
    categoryCombo.current(0)
    
    #포스팅 겟수
        # 포스팅 겟수 텍스트
    labelpost_num = ttk.Label(win, text="포스팅 겟수:")          # Create a label
    labelpost_num.grid(column=0, row=1)                  # Label's grid
    
        #갯수 입력 창
    post_num = tk.IntVar()                                       # Integer variable
    post_num_Entered = ttk.Entry(win, width=8, textvariable=post_num)  # Create a textbox
    post_num_Entered.grid(column=1, row=1)
    

    #아이디 입력
    labelpost_num = ttk.Label(win, text="네이버 ID:")          # Create a label
    labelpost_num.grid(column=0, row=2)                  # Label's grid
    
    #비밀번호 입력
    labelpost_num = ttk.Label(win, text="네이버 PW:")          # Create a label
    labelpost_num.grid(column=0, row=3)                  # Label's grid

    action = ttk.Button(win, text="작성 시작", command=clickOK)    # Create a button
    action.grid(column=2, row=4)
    
    #스크롤 박스
    scrt = tkst.ScrolledText(win, width=50, height=8, wrap=tk.WORD) # Create a scrolledtext
    scrt.grid(column=0, row=5, columnspan=3)                                              # Default focus
    
    #라디오박스 체크박스 예쩨 나중에 필요하면 쓸것
    # value1 = tk.IntVar()
    # check1 = tk.Checkbutton(win, text="Disabled", variable=value1, state='disabled')    # Create a check button
    # check1.select()
    # check1.grid(column=0, row=3)
    # 
    # value2 = tk.IntVar()
    # check2 = tk.Checkbutton(win, text="UnChecked", variable=value2) # Create a check button
    # check2.grid(column=1, row=3)
    # 
    # value3 = tk.StringVar()
    # rad1 = tk.Radiobutton(win, text="Radio1", variable=value3, value="Clicked a Radio1.\n", command=clickRadio) # Create a radio button
    # rad1.select()
    # rad1.grid(column=2, row=3)
    # rad2 = tk.Radiobutton(win, text="Radio2", variable=value3, value="Clicked a Radio2.\n", command=clickRadio) # Create a radio button
    # rad2.grid(column=2, row=4)

    menuBar = Menu(win)                                     # Create a menu
    win.config(menu=menuBar)

    fileMenu = Menu(menuBar, tearoff=0)                     # Create the File Menu
    fileMenu.add_command(label="New")                       # Add the "New" menu
    fileMenu.add_separator()                                # Add a separator
    fileMenu.add_command(label="Exit", command=clickExit)   # Add the "Exit" menu and bind a function
    menuBar.add_cascade(label="메뉴", menu=fileMenu)

    win.resizable(0, 0)             # Disable resizing the GUI
    win.mainloop()                  # Start GUI