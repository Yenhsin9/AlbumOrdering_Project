### 環境設置
1.	安裝Appserv至本機”C:\”位置，並設定好帳號密碼
2.	下載AlbumOrdering_Project.zip並解壓縮
3.	將提供之AlbumOrdering_Project資料夾移動至”C:\AppServ\www”
4.	開啟使用者登入頁面” http://localhost/AlbumOrdering_Project/login.html”

### AlbumOrdering_Project檔案結構
- Admin 資料夾：管理者頁面
  * 首頁
    ├─manage.php
  * 登入
    ├─loginAdmin.html 
  * 管理項目(包含新增、更改、刪除)
    ├─artist
    ├─info
    ├─member
    ├─order
    ├─product
- Asset 資料夾：美編頁面
  ├─css 資料夾
  ├─fonts 資料夾
  ├─images 資料夾
  ├─js 資料夾
-crawler 資料夾：資料爬蟲
  ├─downloaded_images 資料夾
  ├─data.txt
  ├─pagess.py

* 首頁
  ├─mainpage.php
* 單一商品頁面
  ├─chineseProduct.php
  ├─englishProduct.php
  ├─japaneseProduct.php
  ├─koreanProduct.php
* 全域檔案
  ├─Header.php
  ├─Footer.php
  ├─Global.php
  ├─db_connection.php
* 展示資料
  ├─displayAlbum.php
  ├─displayInfo.php
  ├─displayProduct.php
  ├─printFullname.php
* 登入
  ├─login.html
* 使用項目(包含新增、更改、刪除)
    ├─cart
    ├─member
    ├─order
    ├─payment
    ├─question
