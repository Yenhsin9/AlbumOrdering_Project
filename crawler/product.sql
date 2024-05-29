-- 還原
UPDATE kind_count SET count = 4;
UPDATE artist_count SET count = 7;
DELETE FROM product WHERE product_id REGEXP '^k-pop[0-9]+$';
DELETE FROM product WHERE product_id REGEXP '^j-pop[0-9]+$';
DELETE FROM product WHERE product_id REGEXP '^m-pop[0-9]+$';
DELETE FROM product WHERE product_id REGEXP '^west[0-9]+$';
DELETE FROM artist WHERE artist_id REGEXP '^S[0-9]+$';
INSERT INTO product (artist_id, title, info, price, kind, img) VALUES
('TWICE(娜璉 NAYEON)', '(Digipack Ver.) The 2nd Mini Album (NA)(原裝韓版)', 'JYP特典:小卡1張', 415, 'k-pop ', 'K-JYPK1797-JYP.jpg'),
('TWICE(娜璉 NAYEON)', '(Digipack Ver.) The 2nd Mini Album (NA)(原裝韓版)', 'SOUNDWAVE特典:小卡1張', 415, 'k-pop ', 'K-JYPK1797-SW.jpg'),
('TWICE(娜璉 NAYEON)', '(三版合購套組 SET Ver.) The 2nd Mini Album (NA)(原裝韓版)', 'WITHMUU特典 : 小卡3張+徽章1個', 1955, 'k-pop ', 'K-JYPK1796-WM.jpg'),
('TWICE', 'DIVE (初回限定盤B)', '', 1020, 'k-pop ', 'WPCL-13567.jpg'),
('TWICE', 'DIVE (通常盤)', '', 860, 'k-pop ', 'WPCL-13568.jpg'),
('TWICE', 'DIVE (初回限定盤A)', '', 1150, 'k-pop ', 'WPZL-32138.jpg'),
('TWICE(娜璉 NAYEON)', '(三版合購套組 SET Ver.) The 2nd Mini Album (NA)(原裝韓版)', 'SOUNDWAVE特典:小卡3張+LOGO書籤1個', 1955, 'k-pop ', 'K-JYPK1796-SW.jpg'),
('TWICE(娜璉 NAYEON)', '版本隨機 The 2nd Mini Album (NA)(原裝韓版)', '', 505, 'k-pop ', 'K-JYPK1796.jpg'),
('TWICE', '版本隨機 13TH MINI ALBUM (With YOU-th)(原裝韓版)', '', 495, 'k-pop ', 'K-JYPK1761.jpg'),
('TWICE(娜璉 NAYEON)', '(Digipack Ver.) The 2nd Mini Album (NA)(原裝韓版)', '', 315, 'k-pop ', 'K-JYPK1797.jpg'),
('TWICE', 'DIVE (初回限定盤B)', '7net特典：隨機壓克力鑰匙圈1個(全9款)', 1360, 'k-pop ', 'NowPaint2.png'),
('TWICE', 'DIVE (通常盤)', '7net特典：隨機壓克力鑰匙圈1個(全9款)', 1150, 'k-pop ', 'NowPaint2.png'),
('TWICE', 'DIVE (初回限定盤A)', '7net特典：隨機壓克力鑰匙圈1個(全9款)', 1530, 'k-pop ', 'NowPaint2.png'),
('TWICE', 'DIVE (初回限定盤B)', 'amazon特典：特大封面卡(初回限定盤B ver.)', 1460, 'k-pop ', 'NowPaint2.png'),
('TWICE', 'DIVE (通常盤)', 'amazon特典：特大封面卡(通常盤 ver.)', 1250, 'k-pop ', 'NowPaint2.png'),
('TWICE', 'DIVE (初回限定盤A)', 'amazon特典：特大封面卡(初回限定盤A ver.)', 1620, 'k-pop ', 'NowPaint2.png'),
('TWICE', 'DIVE (初回限定盤B)', 'HMV特典：隨機透明書籤1個(全10款)', 1360, 'k-pop ', 'NowPaint2.png'),
('TWICE', 'DIVE (通常盤)', 'HMV特典：隨機透明書籤1個(全10款)', 1150, 'k-pop ', 'NowPaint2.png'),
('TWICE', 'DIVE (初回限定盤A)', 'HMV特典：隨機透明書籤1個(全10款)', 1530, 'k-pop ', 'NowPaint2.png'),
('TWICE', 'DIVE (初回限定盤B)', 'JoshinWeb特典：隨機照片1張(全9款)', 1360, 'k-pop ', 'NowPaint2.png'),
('TWICE', 'DIVE (通常盤)', 'JoshinWeb特典：隨機照片1張(全9款)', 1150, 'k-pop ', 'NowPaint2.png'),
('TWICE', 'DIVE (初回限定盤A)', 'JoshinWeb特典：隨機照片1張(全9款)', 1530, 'k-pop ', 'NowPaint2.png'),
('TWICE', 'DIVE (初回限定盤B)', 'Neowing特典：隨機手機貼紙1張(全9款)', 1360, 'k-pop ', 'NowPaint2.png'),
('TWICE', 'DIVE (通常盤)', 'Neowing特典：隨機手機貼紙1張(全9款)', 1150, 'k-pop ', 'NowPaint2.png'),
('TWICE', 'DIVE (初回限定盤A)', 'Neowing特典：隨機手機貼紙1張(全9款)', 1530, 'k-pop ', 'NowPaint2.png'),
('TWICE', 'DIVE (初回限定盤B)', 'ONCE JAPAN特典：隨機明信片1張(A5,全9款)', 1300, 'k-pop ', 'MO-ONCE-WPCL-13567.jpg'),
('TWICE', 'DIVE (3型態套組B, 初回限定盤B + 通常盤 + ONCE JAPAN限定盤)', 'ONCE JAPAN套組特典：隨機資料夾2個(A5,全10款)', 3580, 'k-pop ', 'MO-ONCE-WPCL-13567S.jpg'),
('TWICE', 'DIVE (通常盤)', 'ONCE JAPAN特典：隨機明信片1張(A5,全9款)', 1100, 'k-pop ', 'MO-ONCE-WPCL-13568.jpg'),
('TWICE', 'DIVE (ONCE JAPAN限定盤)', 'ONCE JAPAN特典：隨機明信片1張(A5,全9款)', 1150, 'k-pop ', 'MO-ONCE-WPCL-60055.jpg'),
('TWICE', '(娜璉 NAYEON) DIVE (ONCE JAPAN限定個人盤)', 'ONCE JAPAN特典：隨機明信片1張(A5,全9款)', 1150, 'k-pop ', 'MO-ONCE-WPCL-60056.jpg'),
('NiziU', 'RISE UP (初回生産限定盤A)', '', 750, 'j-pop ', 'NowPaint2.png'),
('NiziU', 'RISE UP (初回生産限定盤B)', '', 750, 'j-pop ', 'NowPaint2.png'),
('NiziU', 'RISE UP (通常盤)', '', 500, 'j-pop ', 'NowPaint2.png'),
('NiziU', 'RISE UP (期間生産限定アニメ盤)', '', 460, 'j-pop ', 'NowPaint2.png'),
('NiziU', 'NiziU Live with U 2023 “COCO! nut Fes.” -Stadium Special- in ZOZO Marine Stadium (通常盤, Blu-ray)', '', 1960, 'j-pop ', 'ESXL-304.jpg'),
('NiziU', '1st Single Album (Press Play)(限量原裝韓版)', '', 365, 'j-pop ', 'K-JYPK1732-1.jpg'),
('NiziU', '(版本隨機) 1st Single Album (Press Play)PH Ver.(原裝韓版)', '', 335, 'j-pop ', 'K-JYPK1732.jpg'),
('NiziU', 'COCONUT (初回限定盤A)', '', 1300, 'j-pop ', 'ESCL-5840.jpg'),
('NiziU', 'COCONUT (初回限定盤B)', '', 1170, 'j-pop ', 'ESCL-5842.jpg'),
('NiziU', 'COCONUT (通常盤)', '', 870, 'j-pop ', 'ESCL-5845.jpg'),
('NiziU', 'Paradise (初回限定盤A, CD+Blu-ray)', '', 700, 'j-pop ', 'ESCL-5790.jpg'),
('NiziU', 'Paradise (初回限定盤B, CD+DVD)', '', 590, 'j-pop ', 'ESCL-5793.jpg'),
('NiziU', 'Paradise (通常盤, CD ONLY)', '', 430, 'j-pop ', 'ESCL-5796.jpg'),
('NiziU', 'Paradise (期間生産限定盤, CD ONLY)', '', 430, 'j-pop ', 'ESCL-5797.jpg'),
('NiziU', 'Blue Moon (初回限定盤A, CD+DVD)', '', 610, 'j-pop ', 'ESCL-5745.jpg'),
('NiziU', 'Blue Moon (初回限定盤B, CD+ブックレット)', '', 530, 'j-pop ', 'ESCL-5747.jpg'),
('NiziU', 'Blue Moon (通常盤, CD ONLY)', '', 480, 'j-pop ', 'ESCL-5749.jpg'),
('NiziU', 'CLAP CLAP (初回生産限定盤A, CD+DVD)', '', 610, 'j-pop ', 'ESCL-5688.jpg'),
('NiziU', 'CLAP CLAP (初回生産限定盤B, CD+ブックレット)', '', 530, 'j-pop ', 'ESCL-5690.jpg'),
('NiziU', 'CLAP CLAP (通常盤, CD ONLY)', '', 480, 'j-pop ', 'ESCL-5692.jpg'),
('NiziU', '『U』(初回限定盤A, CD+DVD+隨機小卡A款1張(全10款))', '', 1300, 'j-pop ', 'ESCL-5584.jpg'),
('NiziU', '『U』(初回限定盤B, 2CD+52頁寫真冊+隨機小卡B款1張(全10款))', '', 1170, 'j-pop ', 'ESCL-5586.jpg'),
('NiziU', '『U』(通常盤, CD+24頁歌詞本)', '', 870, 'j-pop ', 'ESCL-5589.jpg'),
('NiziU', "Take a picture / Poppin' Shakin' (初回限定盤A, CD+DVD)", '', 610, 'j-pop ', 'ESCL-5513.jpg'),
('NiziU', "Take a picture / Poppin' Shakin' (初回限定盤B)", '', 530, 'j-pop ', 'ESCL-5515.jpg'),
('NiziU', "Take a picture / Poppin' Shakin' (通常盤, CD ONLY)", '', 480, 'j-pop ', 'ESCL-5517.jpg'),
('NiziU', "Take a picture / Poppin' Shakin' (初回限定盤A+初回限定盤B+通常盤)", 'HMV合購特典：B3透明海報(團體圖像)+成員小卡組3組+隨機B3海報3張(全9款)', 2020, 'j-pop ', 'MO-H-ESCL-5513-SS.jpg'),
('NiziU', 'Step and a step (初回B盤, CD+寫真本)', '', 465, 'j-pop ', '19439854672.jpg'),
('NiziU', '(台版) Step and a step (初回A盤, CD+DVD)', '', 490, 'j-pop ', '19439854682.jpg'),
('NiziU', 'Step and a step (初回限定盤A, CD+DVD+隨機小卡“A款”1張(全10款))', '', 610, 'j-pop ', 'ESCL-5470.jpg');