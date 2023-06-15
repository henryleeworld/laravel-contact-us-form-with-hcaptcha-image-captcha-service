# Laravel 10 帶有 hCaptcha 圖形驗證服務的聯絡表單

hCaptcha 是一個重視隱私性的驗證碼服務，不會出售個人資料，僅收集最低限度需要的資料，也會透明地對外揭露資料收集和使用的方法，而且支援隱私通行證，減少使用者需要驗證的次數，使得整體驗證體驗更好，hCaptcha 還提供完善的無障礙功能，讓視障人士也能輕鬆地進行驗證，更重要的是，hCaptcha 能夠在 Google 被封鎖的地區運作，並透過電子郵件聯絡表單取得網站訪客的意見回饋，進而改善產品和服務，並運用這些想法改善所有人的體驗。 

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移。
```sh
$ php artisan migrate
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/contact` 來進行聯絡。

----

## 畫面截圖
![](https://i.imgur.com/yGCWCyr.png)
> 訪客透過聯絡表單傳達訊息

![](https://i.imgur.com/wasnQtn.png)
> 透過表單寄送電子郵件給網站管理者