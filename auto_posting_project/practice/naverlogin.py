#2017-07-10 작성시작

# ------------- 시작 -----------------

#사용 변수및 기타등등
# Chrome의 경우 | 아까 받은 chromedriver의 위치를 지정해준다.

from selenium import webdriver
#크롬 드라이버로 실행
driver = webdriver.Chrome('../../../chromedriver_win32/chromedriver')
# driver = webdriver.Chrome()
#파이어 폭스로 실행응 안되
# driver = webdriver.Firefox()
#함수
#나중에 인터넷 환경에 따라 일괄 선택 할 수 있도록 바꾸자
    
def delay_short():
    driver.implicitly_wait(2)
    
def delay_midle():
    driver.implicitly_wait(3)
    
def delay_long():
    driver.implicitly_wait(7)

def test_func(arg_selector,arg_xpath):
    driver.find_element_by_css_selector(arg_selector).send_key('방법1')
    driver.find_element_by_xpath(_xpath).send_key('방법2')



#웹페이지가 로드 안됬는데 실행시키면 안되니 페이지가 변경 될때마다 밑의 함수로 시간을 준다
# 암묵적으로 웹 자원 로드를 위해 3초까지 기다려 준다.
#driver.implicitly_wait(delay_3sec)
delay_midle()


# #url 에 접근
# 테스트로 구글 띄우기
# driver.get('https://google.com')

#로그인
try:
    # 네이버 로그인 url 접근
    driver.get('https://nid.naver.com/nidlogin.login')
    delay_midle()
    # driver.get('https://naver.com')

    #아이디와 입력할 위치 지정
    #by_id, by_css_selector 둘다 사용 가능
    username = driver.find_element_by_name('id')
    password = driver.find_element_by_name('pw')

    #아이디와 비번 입력
    username.send_keys('kkhqq11')
    password.send_keys('Qwer4197*')
    
    #변수에 지정 하지 않고도 가능 
    #driver.find_element_by_name('id').send_keys('kkhqq11')

    #로그인 버튼 누르기    
    driver.find_element_by_xpath('//*[@id="frmNIDLogin"]/fieldset/input').click()
    delay_midle()
    
except:
    pring("이미 로그인되어 있음!")

    

    

