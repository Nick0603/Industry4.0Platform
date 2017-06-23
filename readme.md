# 工業4.0平台建置

## 測試：
- 網址：http://industry4platform.herokuapp.com/
- 帳：admin@gmail.com 密：123456789

![](http://i.picasion.com/pic85/6d8c26d6594c2b5e1d9080bd8e27d1f9.gif)
## Documentation
- [Laravel website](http://laravel.com/docs).
- [SkyMars Express](http://faremo.pmc.org.tw/RegisterServer/PageIndex.aspx?Language=TW)
- [gmail 發信](https://developers.google.com/gmail/api/?hl=zh-TW)
  - 帳號無二階段認證，需開啟[低應用程式許可](https://www.google.com/settings/security/lesssecureapps)
  - 帳號有二階段認證，則需另外申請[應用程式密碼申請](https://developers.google.com/gmail/api/?hl=zh-TW)
- [簡訊王 api](https://www.kotsms.com.tw/index.php?selectpage=pagenews&kind=4&viewnum=238)

## Development
開發環境可以使用 [wagon](http://www.laravel-dojo.com/opensource/wagon)
確認有composer、php、mysql可用
```
git clone https://github.com/Nick0603/Industry4.0Platform.git
cd Industry4.0Platform
composer install

cp .env.sample .env
vim .env
# .env範例 在下方
php artisan key:generate
php artisan migration
php artisan db:seed
php artisan serve
# 開啟 localhost:8000
# 測試帳號：guest@gmail.com  密碼：guestguest
```

### .env檔範例
```
APP_ENV=local
APP_DEBUG=true
APP_KEY=  由待會的 php artisan key:generate  產生
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= __________
DB_USERNAME= __________
DB_PASSWORD= __________

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME= yourAccount@gmail.com
MAIL_PASSWORD= yourPassword #如果有二階段認證帳號，改填api key，詳情請看document
MAIL_ENCRYPTION=tls
```
