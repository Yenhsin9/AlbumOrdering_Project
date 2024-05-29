import os
import re
from bs4 import BeautifulSoup
import urllib.request as req
from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

main_url = "https://www.95music.com/"
search_url = 'product_search_v2.php?'

chrome_driver_path = 'C:\\chromedriver.exe'  # 修改這裡的路徑
chrome_options = Options()
chrome_options.add_argument("--headless")  # 無頭
chrome_options.add_argument("--disable-notifications")  # 禁用通知

html_file = open('95music.html', 'w', encoding='utf-8')
product_file = open('product.sql', 'w', encoding='utf-8')
artists = set()

category_mapping = {
    "K-POP": "k-pop",
    "J-POP": "j-pop",
    "C-POP": "m-pop",
    "E-POP": "west"
}

def price_int(price_str):
    price_str = price_str.replace(',', '')
    price_num = re.findall(r'\d+', price_str)

    if price_num:
        price = int(price_num[0])
        return price
    return None

def process_title(title):
    info_match = re.search(r'【(.*?)】', title)
    info = info_match.group(1) if info_match else ''

    cleaned_title = re.sub(r'【.*?】', '', title)
    cleaned_title = re.split(r'※', cleaned_title)[0]

    cleaned_title = cleaned_title.strip()

    return [cleaned_title, info]

def download_image(image_url, folder='downloaded_images'):
    if not os.path.exists(folder):
        os.makedirs(folder) 
    image_name = image_url.split("/")[-1]
    image_path = os.path.join(folder, image_name)
    req.urlretrieve(image_url, image_path)

def search_and_fetch(url, keyword=None, index=0):
    service = Service(chrome_driver_path)
    driver = webdriver.Chrome(service=service, options=chrome_options)
    try:
        driver.get(url)  
        if keyword:
            search_input = WebDriverWait(driver, 10).until(EC.presence_of_element_located((By.NAME, "key")))
            search_input.send_keys(keyword)
            search_button = WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.CLASS_NAME, "btn")))
            search_button.click()
        
        cd_button = WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.LINK_TEXT, "CD")))
        cd_button.click()
            
        if index > 0:
            for _ in range(index):
                next_button = WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.LINK_TEXT, "下一頁 >")))
                next_button.click()
                WebDriverWait(driver, 10).until(EC.staleness_of(next_button))  

        html = driver.page_source
        html_file.write(html)  
        return BeautifulSoup(html, 'html.parser')
    except Exception as e:
        print("An error occurred:", e)
        return None
    finally:
        driver.quit()

def getData(url, keyword=None, page_index=0):
    soup = search_and_fetch(url, keyword, page_index)
    try:
        # Title & Artist & Info & Price & Pics
        title_tags = soup.find_all('span', {'class': 'shorten'})
        other_tags = soup.find_all('span', {'class': 'shorten_neme'})
        pic_tags = soup.find_all('a', style=True)
        link_tags = soup.find_all('a', {'href': re.compile(r'product_detail\.php\?id=\d+&search=\d+&key=\w+&media=\d+&in=\d+&pa=\d+')})

        # 合併
        for i in range(len(title_tags)):
            global kind
            title = title_tags[i].text.strip()
            other_info = [tag.text.strip() for tag in other_tags[i*5:i*5+3]]
            artists.add(other_info[0])

            if kind == None:
                service = Service(chrome_driver_path)
                driver = webdriver.Chrome(service=service, options=chrome_options)
                product_link = link_tags[i]['href']
                product_link = main_url + product_link
                print(product_link)

                driver.get(product_link)
                WebDriverWait(driver, 10).until(EC.presence_of_element_located((By.CLASS_NAME, 'prd-img')))
                html = driver.page_source
                product_soup = BeautifulSoup(html, 'html.parser')
                dt_tags = product_soup.find_all('dt')

                for dt_tag in dt_tags:
                    if dt_tag.get_text() == "商品類別：":
                        category = dt_tag.find_next_sibling('dd').get_text()
                        kind = category.split('/')[0]
                        kind = category_mapping.get(kind, kind.lower())
                        print("商品類別:", kind)
                driver.back()
            album_set = [other_info[0]] + process_title(title) + [price_int(other_info[-1])] + [kind]

            # 找到圖片 URL 並下載
            if i < len(pic_tags):
                style = pic_tags[i].get('style')
                if 'background-image' in style:
                    start_idx = style.find("url('") + len("url('")
                    end_idx = style.find("')", start_idx)
                    image_url = style[start_idx:end_idx]
                    if not image_url.startswith('http'):
                        image_url = url + image_url
                    
                    # 將圖片 URL 加入 album_set
                    album_set.append(image_url.split("/")[-1])
                    download_image(image_url)
            product_file.write(str(album_set).replace('[', '(').replace(']', ')') + ',\n')

    except Exception as e:
        print('關鍵字找不到:', e)

data = []
with open('data.txt', 'r', encoding='utf-8') as f:
    lines = f.readlines()
    for line in lines:
        data.append(line.split())

if (input('刪除資料庫資料?(Y): ') == 'Y'):
    product_file.write("-- 還原\n")
    product_file.write("UPDATE kind_count SET count = 4;\n")
    product_file.write("UPDATE artist_count SET count = 7;\n")
    product_file.write("DELETE FROM product WHERE product_id REGEXP '^k-pop[0-9]+$';\n")
    product_file.write("DELETE FROM product WHERE product_id REGEXP '^j-pop[0-9]+$';\n")
    product_file.write("DELETE FROM product WHERE product_id REGEXP '^m-pop[0-9]+$';\n")
    product_file.write("DELETE FROM product WHERE product_id REGEXP '^west[0-9]+$';\n")
    product_file.write("DELETE FROM artist WHERE artist_id REGEXP '^S[0-9]+$';\n")
        
kind = None
page_url = main_url + search_url
product_file.write('INSERT INTO product (artist_id, title, info, price, kind, img) VALUES\n')
for i in range(len(data)):
    for j in range(int(data[i][1])):
        print(data[i][0], '- page', j+1)
        getData(page_url, data[i][0], j)
    kind = None


product_file.seek(0, os.SEEK_END)  
product_file.seek(product_file.tell() - 3, os.SEEK_SET) 
product_file.truncate()  
product_file.write(';\n') 

html_file.close()
product_file.close()

