# imports
import tkinter as tk
import tkinter.scrolledtext as tkst
from tkinter import Menu
from tkinter import ttk
from selenium import webdriver
#크롬 드라이버로 실행
driver = webdriver.Chrome('../../../chromedriver_win32/chromedriver')

global post_num, input_naver_id, input_naver_pw, input_macro

# Click OK button
def delay_short():
    driver.implicitly_wait(10)
    print("딜레이 short 실행")
    
def delay_midle():
    driver.implicitly_wait(30)
    print("딜레이 midlle 실행")
    
def delay_long():
    driver.implicitly_wait(100)
    print("딜레이 long 실행")

def clickOK():
    post_count = post_num.get()
    text = "<------------구분선------------->"
    text = text + "\n" + category.get() + "카테고리를 선택 하셧습니다."
    text = text + "\n총 " + str(post_count) + "개의 포스트 가 작성됩니다.\n"
    scrt.insert(tk.INSERT, text)                    # insert text in a scrolledtext
    scrt.see(tk.END)
    
    
    

    #웹페이지가 로드 안됬는데 실행시키면 안되니 페이지가 변경 될때마다 밑의 함수로 시간을 준다
    # 암묵적으로 웹 자원 로드를 위해 3초까지 기다려 준다.
    #driver.implicitly_wait(delay_3sec)
    delay_midle()
    
    #로그인
    try:
        # 네이버 로그인 url 접근
        driver.get('https://nid.naver.com/nidlogin.login')
        # delay_midle()
        # driver.get('https://naver.com')
    
        #아이디와 입력할 위치 지정
        #by_id, by_css_selector 둘다 사용 가능
        username = driver.find_element_by_name('id')
        password = driver.find_element_by_name('pw')
    
        #아이디와 비번 입력
        #--------------------------------------- 아이디와 비번 좀--------------------------------------- 
        #--------------------------------------- 아이디와 비번 좀--------------------------------------- 
        #--------------------------------------- 아이디와 비번 좀--------------------------------------- 

        # username.send_keys("kkhqq11")        
        # password.send_keys("Qwer4197*")
        username.send_keys(input_naver_id.get())        
        password.send_keys(input_naver_pw.get())
        driver.implicitly_wait(3)
        
        #변수에 지정 하지 않고도 가능 
        #driver.find_element_by_name('id').send_keys('kkhqq11')
    
        #로그인 버튼 누르기    
        driver.find_element_by_xpath('//*[@id="frmNIDLogin"]/fieldset/input').click()
        delay_midle()
        
    except:
        print("로그인 코드 오류!")
    finally:
        #naver홈페이지에 찾아 들어가기 지금 안됨
        # blog_btn = driver.find_element_by_css_selector('li a.tab_blog')
        # blog_btn.clcik()
        # 
        # driver.implicitly_wait(delay_2sec)
        # 
        # myblog_btn = driver.find_element_by_css_selector('a.svc_link_weak')
        # myblog_btn.click()
        
        #그냥 자기 블로그 쳐서 들어가기
        #driver.get('블로그 주소')
        #driver.implicitly_wait(delay_2sec)
        
        #그냥 블로그 홈페이지로 이동
        
        # driver.get('http://section.blog.naver.com')
        # delay_midle()
        # 
        # blog_btn = driver.find_element_by_css_selector('ul.user_btns li a.btn_item1')
        # blog_btn.click()
        # delay_long()
        #--------------------------------------- 아이디-------------------------------------- 
        #--------------------------------------- 아이디-------------------------------------- 
        #--------------------------------------- 아이디-------------------------------------- 
        
        #http://blog.naver.com/kkhqq11?Redirect=Write&
    
    #글쓰기 버튼 클릭
            if(post_count != 0):
                for i in range(post_count):
                    try:
                        delay_long()
                        delay_long()
                        naverid = input_naver_id.get()
                        blog_url = 'http://blog.naver.com/'+ naverid
                        driver.get(blog_url)
                        
                        delay_midle()
                        #네이버 블로그는 iFrame으로 나누어져 있기 때문에 바고 글쓰기 버튼을 누를시 에러 출력
                        #switch_to_frame을 이용하여 프레임을 전환 한다.
                        driver.switch_to_frame("mainFrame")
                        
                        #div 태그에 아이디가 post_admin 놈을 찾고 그안의 a 태그를 가진놈을 선택
                        write_button = driver.find_element_by_css_selector('#post-admin > a.col._checkBlock._rosRestrict')
                        write_button.click()                       
                        
                        driver.switch_to_frame("mainFrame")
                        
                        delay_midle()
                        
                        title = driver.find_element_by_xpath('//*[@id="subject"]')
                        title.clear()
                        #------------------------ 말머리 넣기 기능 + 크롤링한 제목 20자 이상 끊기 --------------------------------------- 
                        #------------------------ 말머리 넣기 기능 + 크롤링한 제목 20자 이상 끊기 --------------------------------------- 
                        #------------------------ 말머리 넣기 기능 + 크롤링한 제목 20자 이상 끊기 --------------------------------------- 
                        
                        macro = input_macro.get()
                        crolling = ""
                        macro = macro + crolling
                        title.send_keys(macro)
                        
                        delay_midle()
                        
                        driver.switch_to_frame("se2_iframe")
                        body = driver.find_element_by_xpath('/html/body')
                        body.clear()
                        
                        #이제 여기서 크롤링 할 것
                        body.send_keys('crolling testing ')
                        delay_short()
                
                        driver.switch_to_default_content()
                        driver.switch_to_frame("mainFrame")
                        delay_short()
                        print('when2')
                        
                        publish_button = driver.find_element_by_css_selector('#btn_submit > img')
                        delay_long()
                        publish_button.click()
                        delay_long()
                
                    except:
                        print('글쓰기 버튼 클릭중 오류')
                
    
# Click radio buttons
# def clickRadio():
#     scrt.insert(tk.INSERT, value3.get())
#     scrt.see(tk.END)


# Click a exit menu
# def clickExit():
#     win.quit()
#     win.destroy()
#     exit()


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
    categoryCombo = ttk.Combobox(win, width=13, textvariable=category)   # Create a combobox
    categoryCombo['values'] = ("IT", "일본")                      # Combobox's items
    categoryCombo.grid(column=1, row=0)
    categoryCombo.current(0)
    
    #포스팅 겟수
        # 포스팅 겟수 텍스트
    labelpost_num = ttk.Label(win, text="포스팅 겟수:")         
    labelpost_num.grid(column=0, row=1)                 

        #갯수 입력 창
    post_num = tk.IntVar()                                      
    post_num_Entered = ttk.Entry(win, width=15, textvariable=post_num) 
    post_num_Entered.grid(column=1, row=1)
    #아이디 입력
    label_naver_id = ttk.Label(win, text="네이버 ID:")        
    label_naver_id.grid(column=0, row=2)                 
    
    input_naver_id = tk.StringVar()                                       
    naver_id_Entered = ttk.Entry(win, width=15, textvariable=input_naver_id)  
    naver_id_Entered.grid(column=1, row=2)
    
    #비밀번호 입력
    label_naver_pw = ttk.Label(win, text="네이버 pw:")          
    label_naver_pw.grid(column=0, row=3)                 
    
    input_naver_pw = tk.StringVar()                                       
    naver_pw_Entered = ttk.Entry(win, width=15, textvariable=input_naver_pw) 
    naver_pw_Entered.grid(column=1, row=3)       

    #말머리 입력
    label_naver_pw = ttk.Label(win, text="제목 자동 완성:")         
    label_naver_pw.grid(column=0, row=4)                  
    
    input_macro = tk.StringVar()                                     
    input_macro_Entered = ttk.Entry(win, width=15, textvariable=input_macro) 
    input_macro_Entered.grid(column=1, row=4)        

    #시작 버튼
    action = ttk.Button(win, text="작성 시작", command=clickOK)    
    action.grid(column=2, row=5)
    
    #스크롤 박스
    scrt = tkst.ScrolledText(win, width=50, height=8, wrap=tk.WORD) 
    scrt.grid(column=0, row=6, columnspan=3)
                                            
    
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