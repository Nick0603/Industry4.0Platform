# 工業4.0平台建置

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)



## Documentation
- [Laravel website](http://laravel.com/docs).
- [SkyMars 參ㄇwebsite](http://faremo.pmc.org.tw/RegisterServer/PageIndex.aspx?Language=TW)
- [gmail 發信](https://developers.google.com/gmail/api/?hl=zh-TW)
  - 帳號無二階段認證，需開啟[低應用程式許可](https://www.google.com/settings/security/lesssecureapps)
  - 帳號有二階段認證，則需另外申請[應用程式密碼申請](https://developers.google.com/gmail/api/?hl=zh-TW)
- [簡訊王 api]

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
