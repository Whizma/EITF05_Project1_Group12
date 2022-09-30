# EITF05_Project1_Group12
nice webshop using XAMPP 


## TODO Construction phase:
### HTML
- [ ] page design
- [ ] login
- [ ] present items
- [ ] checkout

### TLS
- [x]  Fully working TLS_AES_128_GCM_SHA256, 128 bit keys, TLS 1.3)
### How to setup TLS (and https)
```console
cp httpd.conf /opt/lampp/etc
cp httpd-ssl.conf httpd-vhosts.conf /opt/lampp/etc/extra
cp -r localhostcerts /opt/lamp/etc
cp mysite.crt /etc/ssl/certs 
cp mysite.key /etc/ssl/private
```
- all directories are recommendations, but may look different on different operating systems so moving files to wherever and changing responding .conf files is also possible if directories are non-existing
- restart server and put https://localhost in browser

### database
- [ ] setup

### functionality (php?)
 - [ ] login 
    - [ ] databas
- [ ] post items
- [ ] put in shopping basket
- [ ] checkout and payment
    - [ ] receipt


## TODO Security
- [ ] sql injection
- [ ] xss (cross-site scripting)
   - attack working using the script on https://localhost/login/create_user.php using \<a onmouseover="alert(document.cookie)"\>xxs link\</a\> as username and password clearing password policy
- [ ] csrf (cross-site request forgery)

### tl;dr säkerhet
* SQL Injection

Ett sätt att utnyttja säkerhetsproblem i hanteringen av indata till sida som arbetar mot en databas. Injektionen sker genom att en användare skickar in parametrar till en databasfråga, utan att parametrarna transformeras korrekt med avseende på speciella tecken. Ganska ez

* XSS (cross-site scripting)

XSS-attacker möjliggör för attackerande att skicka client-side skript till hemsidor. XSS-säkerhetsbrister kan exempelvis användas till att kapa inloggningar genom att stjäla webbkakor eller för att modifiera en webbsidas utseende och funktionalitet.

Ett exempel på hur XSS kan modifiera en sidas utseende vore om ett fält där det är meningen att text ska skrivas inte är skyddat mot HTML-kod. Då kan användaren lägga in stora bilder eller ramar som tar upp plats och förstör utseendet på sidan. Även länkar till skadliga sidor kan då planteras där.

* CSRF (cross-site request forgery)

En typ av exploit där obehöriga kommandon skickas från en användare som webbapplikationen litar på. Kommandon som specially-crafted image tags, hidden forms, och JavaScript XMLHttpRequests, fungerar utan användarens kännedom. Till skillnad från XSS, som utnyttjar användarens tillit för en enskild sida, så utnyttjar CSRF tilliten som hemsidan har till användarens webbläsare. En CSRF attack lurar användaren att skicka en oavsedd request som kan leda till oavsiktligt läckage av klient- eller serverdata, ändring av sessionstillstånd eller manipulering av en slutanvändares konto.

