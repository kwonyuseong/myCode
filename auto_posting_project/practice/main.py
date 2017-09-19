#2017-07-10 작성시작

# ------------- 시작 -----------------

#사용 변수및 기타등등
# Chrome의 경우 | 아까 받은 chromedriver의 위치를 지정해준다.

from selenium import webdriver
#크롬 드라이버로 실행
driver = webdriver.Chrome('../../../chromedriver_win32/chromedriver')
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
    username.send_keys('test')
    password.send_keys('test')
    driver.implicitly_wait(3)
    #변수에 지정 하지 않고도 가능 
    #driver.find_element_by_name('id').send_keys('kkhqq11')

    #로그인 버튼 누르기    
    driver.find_element_by_xpath('//*[@id="frmNIDLogin"]/fieldset/input').click()
    delay_midle()
    
except:
    pring("이미 로그인되어 있음!")
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
     driver.get('http://blog.naver.com/test')
# ----- 네이버에서 로그인 할 경우 -----추후 추가

#글쓰기 버튼 클릭
try:
    delay_midle()
    #네이버 블로그는 iFrame으로 나누어져 있기 때문에 바고 글쓰기 버튼을 누를시 에러 출력
    #switch_to_frame을 이용하여 프레임을 전환 한다.
    driver.switch_to_frame("mainFrame")
    
    #div 태그에 아이디가 post_admin 놈을 찾고 그안의 a 태그를 가진놈을 선택
    write_button = driver.find_element_by_css_selector('#post-admin > a.col._checkBlock._rosRestrict')
    write_button.click()                       
    
    
    #테스트용 
    # driver.find_element_by_css_selector('a#category14').click;
    
except:
    print('글쓰기 버튼 클릭중 오류')

#제목 /본문내용 작성
try:
    driver.switch_to_frame("mainFrame")
    
    delay_midle()
    
    title = driver.find_element_by_xpath('//*[@id="subject"]')
    title.clear()
    title.send_keys('[영진전문대학 컴퓨터 정보계열] 테스트 포스팅')
    
    delay_short()
    
    driver.switch_to_frame("se2_iframe")
    body = driver.find_element_by_xpath('/html/body')
    body.clear()
    
    #이제 여기서 크롤링 할 것
    body.send_keys('테스트 ㅁㄴ얼ㄴㅁㅇ')
    delay_short()
except:
    print('본문 작성중 오류')

#글 발행하기
try:
    #블로그 본문으로 전환 되어있던 프레임을 기본 프레임으로 다시 전환
    driver.switch_to_default_content()
    driver.switch_to_frame("mainFrame")
    # driver.switch_to_frame('mainFrame')

    # publish = driver.find_element_by_id('se_top_publish_btn')
    # publish.click()
    #btn_submit > img
    # //*[@id="btn_submit"]/img
    delay_short()
    print('when2')
    # publish_button = drver.find_element_by_id('btn_submit')
    publish_button = driver.find_element_by_css_selector('#btn_submit > img')
    # publish_button = driver.find_element_by_xpath('//*[@id="btn_submit"]/img')
    
    delay_long()
    # publish_button.clcik()
    publish_button.click()
    #close와 quit 의 차이 
    #close 현재 드라이버에서 포커싱 된 단일 윈도우를 종료
    #quit dispose 메소드를 호출하여 seleniumdmf 통해 열린 모든 윈도우와 세션을 종료
    
except:
    print("글 발행 중 오류")
    
    
    
    #크롬 드라이버로 실행
    driver = webdriver.Chrome('../../../chromedriver_win32/chromedriver')

    



    
    

    

