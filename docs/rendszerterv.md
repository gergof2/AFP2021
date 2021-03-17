# Rendszerterv

## 1.0 A rendszer célja

A rendszer egy kisebb közösség chat ablakára fog szolgálni. A legelső chat rendszert Talkomatic-nak nevezték,
amit Doug Brown és David Wooley hozott létre, a PLATO (Programmed Logic for Automatic Teaching Operations)
rendszeren, az Illinois-i egyetemen, 1973-ban. Számos csatornát ajánlott fel, amelyekre legfeljebb öt ember
csatlakozhatott. A felhasználók képernyőin az üzenetek karakterről karakterre jelentek meg, ahogyan azokat
gépelték. A Talkomatic az 1980-as évek közepén nagyon népszerű volt a PLATO felhasználók körében.
2014-ben Brown és Wooley egy web-alapú verziót is kiadatott a Talkomatic-ból.  
  
Az első online rendszer, amely igazi "chat" parancsokat használt, a "The Source" azaz "A Forrás" szolgáltatáshoz
készült Tom Walker és Fritz Thane által, a Dialcom társaságtól. 
  
Egyéb chat platformok is virágoztak az 1980-as években. Ezek közül a legkorábbi, ami GUI-val rendelkeztek,
a Broadcast, amely egy Macintosh bővítmény volt. Különösen népszerűvé vált az amerikai és német egyetemi
campusokon.

A mi rendszerünk célja valamelyféle innováció hozzáadása ahhoz, amit 1973-ban kezdtek el és mai napig fejlődött.
Mindeközben a szolgáltatásunk stabilitása prioritást élvez. A felhasználó chat résztvevőn képes lesz majd
valamikor egyértelmű kezelőfelületen az adott chat szobán keresztül akadálymentesen tud a többi résztvevővel
kommunikálni.

## Elvárt működés
Amikor a felhasználó az oldalt/a programot megnyitja, egy belépési menü fogadja, ahol vagy bejelentkezik, vagy ha nincs még regisztrációja, akkor először a rendszer megkéri a felhasználót, hogy regisztráljon. Ezt követően a felhasználó felcsatlakozik egy online chat felületre, ahol a többi felhasználóval tud kommunikálni.  

A chat felületen lehetőség van beállítani a saját státuszunkat, amit 4 féle státuszból választhatunk ki: elérhető, tétlen, elfoglalt vagy ki van jelentkezve(offline).A chaten szöveges üzeneteket lehet küldeni, illetve képeket is, amiket le lehet tölteni. Az üzenetek alatt megtalálható egy kis menürész, ahol lehetőség van reagálni az adott üzenetre, vagy ha saját üzenetünk alatt vagyunk, van lehetőségünk módosítani az üzenet tartalmát.

## Rendszer futtatása saját gépen 
A letöltött mappában található php fájlokat egy xampp/wamp program segítségével, adott mappákban kell elhelyezni, majd ezt követően az adott alkalmazásban elindítani az Apache és a MySQL részt. Ha ezzel megvagyunk, akkor már csak az adatbázist kell beimportálnunk a phpmyadminba.

## Projekt terv

#### __Projektszerepkörök, felelősségek:__  
        project manager: Horváth Dániel
        server & database development felelős: Kerepesi Gergő
        web development felelős: Szalóki Dávid
        client development felelős: Seres Péter
        Tesztelésért felelős: Horváth Dániel
        
#### __Ütemterv:__

|Funkció/Story|Feladat/Task|Prioritás|Becslés|Aktuális Becslés|Eltelt Idő|Hátralévő idő|
|-------------|------------|---------|-------|----------------|----------|-------------|
|Követelmény Specifikáció| | 1 | 2 hét | 2 hét | 1 hét | 1 hét |
|Funkcionális Specifikáció| | 1 | 2 hét | 2 hét | 1 hét | 1 hét |
|Rendszerterv| | 1 | 2 hét | 2 hét | 1 hét | 1 hét |
|Adattárolás|Adatmodell megtervezése | 2 | 2 hét | 2 hét | 0 hét | 2 hét |
|Adattárolás| Adatbázis megvalósítása a szerveren | 2 | 2 hét | 2 hét | 0 hét | 2 hét |
|Szerverfüggvények| | 2 | 2 hét | 2 hét | 0 hét | 2 hét |
|Web| Képernyőtervek elkészítése | 3 | 3 hét | 2 hét | 0 hét | |
|Web| Prototípus elkészítése | 3 | 3 hét | 2 hét | 0 hét | |
|Web| Adatbázis létrehozása | 3 | 3 hét | 2 hét | 0 hét | |
|Web| Menüstruktúra elkészítése | 3 | 3 hét | 2 hét | 0 hét | |
|Honlap| Kezdőlap funkciók elkészítése | 3 | 3 hét | 2 hét | 0 hét | |
|Honlap| Login funkció megvalósítás | 3 | 3 hét | 2 hét | 0 hét | |
|Honlap| Regisztráció funkció megvalósítás | 3 | 3 hét | 2 hét | 0 hét | |
|Website| Üzenetküldés és kapcsolódó funkciók megvalósítás | 4 | 3 hét | 2 hét | 0 hét | |
|Website| Tesztelés | 4 | 3 hét | 2 hét | 0 hét | |
|Website| Kiegésszítő fungciók létrehozása | 4 | 3 hét | 2 hét | 0 hét | |
|Website| Kieg.fungc. Tesztelése | 4 | 3 hét | 2 hét | 0 hét | |

## Mérföldkövek

- A prototipus elkészítése
- Vevő érdeklődésének felkeltése


## Üzleti folyamatok modelje

![Image](https://github.com/gergof2/AFP2021/blob/main/docs/images/BusinessModel.png)

Az emberek számára szeretnénk megkönnyíteni a távolságtartást. Szeretnénk csoportoknak , közösségeknek egy olyan alkamazást nyújtani ami megkönnyíti nekik a beszélgetéseket, és az üzenetváltást. Megoszthatják egymással az élményeiket képeken keresztül üzenetekkel vagy hangokall.  

Minél többet beszélnek egymássla annál magasabb rangot kaphatnak a rendszertöl, ha valaki nagyon aktyv az feljebb lép , ha pedig inaktív akkor leesik rangban. A Felhasználók könnyebb tájékozódás érdekében jelölni fogjuk hogy elérhető e , vagy épp elfoglalt esetleg inaktív állapotban van.

## Követelmények
- Funkcionális követelmények:
  - Felhasználók adatainak tárolása
  - Üzenetek üzembehelyezés utáni örökös tárolása
  - webes felületen és windows 10 kliens környezetben való működés
  - További közösségi funkciók 

- Nem funkcionális követelmények:
  - A felhasználók csak saját adataikhoz férnek hozzá változtatáshoz, 
  - Megtekintéshez más felhasználók egyes adataihoz hozzáférnek

- Törvényi előírások:
  - GDPR-nak való megfelelés

## Funkcionális terv

### Rendszerszereplők:  
  - Admin  
  - Általános felhasználó  

### Rendszerhasználati esetek és lefutásaik:
- ADMIN:  
  - Beléphet bármilyen szereplőként teljes hozzáférése van a rendszerhez
  - A felhasználói adatokat látják, változtathatják
  - Felhasználó hozzáadására, törlésére van lehetőségük
  - Üzenet írása
  - Üzenet szerkesztése
  - Üzenet cenzúrázása
  - Felhasználói adatok módosítása
  - Üzenetek törlése
  - Felhasználók ideiglenes némítása
  - Felhasználók ideiglenes vagy végleges tiltása a szolgáltatásból

- Felhasználó:  
  - Beléphet Windows 10 kliensen vagy webes felületen regisztrálás után
  - Saját adataikat módosíthatják
  - Felhasználó hozzáadására, törlésére van lehetőségük
  - Üzenet írása
  - Üzenet szerkesztése
  - Felhasználói adatok módosítása
  - Saját üzenetek törlése
  
- Bővitési lehetőségek:
    - A felhasználó
        - Hangulatjeleket is küldhet
        - Képet fogadhat / küldhet
        - Halgalapú kommunikáció a voice cheten
        - rangokat szerezhet az üzenetei alapján

### Menü-hierarchiák

  -A menürendszert egy, a weboldal fejléce alatt található vízszintes,lenyíló menüket is tartalmazó
   navigációs sávban építettük fel.

  - #### Bejelentkezés:
    - Bejelentkezés
    - Regisztráció
    - Elfelejtett jelszó
    - Elfelejtett felhasználónév
    - Help
    
  - #### Főmenü
    - Üzenet lista
    - Üzenet szövegdoboz
    - Felhasználói lista
    - Preferenciák
    - Státuszbeállítás

### Fizikai környezet

- Az alkalmazás webes felületen és Win10 klienre készül.
- Mobilos aplikáció nem támogatott
- Nincsenek vásárolt szoftverkomponensek.

Szerverkonponensek listája:
  - 2x AMD EPYC 7702
  - 124Gb GDDR4
  - 10 x 4096Gb WD HDD
  
Fejlesztői eszközök:
  - IntelliJ Idea Community
  - Visual Studio Community
  - Xampp Server
  - Sublime Text
  - Visual Studio Code
  
### Tesztterv

- A rendszerterv szerint implementált szoftver tesztelésének célja, hogy ellenőrizze az Üzleti folyamatok
modellje című pontban meghatározott folyamatok helyes, specifikáció szerinti lefutását, valamint hogy a
kliens webes felület felhasználóbarát módon jelenik meg, és használható különböző hardver és szoftverkörnyezetben.

- A tesztelés során használt kiszolgáló hardverkonfigurációja a telepítés során használt hardverrel
kompatibilis, teljesítményben (processzor, operatív memória, háttértár) nem tér el jelentősen.
A telepítéshez természetesen az általunk ajánlott konfiguráció kerül beszerzésre a felhasználó által.

- A tesztelés során használt kliens hardverek a napjainkban általánosan elterjedt hardverkonfigurációjú
PC-k illetve laptopok, melyeken a leggyakrabban használt böngészőkön (Google Chrome, Mozilla Firefox,
Microsoft Edge) teszteljük a rendszert az alábbiakban részletezettek szerint. A minimum hardverkonfiguráció:
Intel Celeron processzor, 4GB RAM, 128GB HDD, a képernyők felbontása: 1280x1024, 1920x1080.

- A tesztelés során az üzleti folyamatokhoz tartozó különböző forgatókönyvek eredményét vizsgáljuk.
Amennyiben az elvártnak megfelelő eredményt kapjuk, a teszteset sikeresnek tekinthető, ellenkező esetben 
a hibát rögzítjük a tesztjegyzőkönyvben. Ezt követően a feljegyzett hibákat javítjuk a szoftverben, és újbóli 
tesztelésnek vetjük alá a rendszert.

- A rendszer alábbiakban leírt tesztelésének előfeltétele, hogy az adatbázisba phpMyAdmin segítségével
felvegyünk egy első adminisztrátori jogosultsággal rendelkező felhasználót a User táblába.
Felhasználónév: admin, a további adatok a fejlesztő-tesztelő személyes adatai lesznek.
Ezzel belépve tudjuk tesztelni a Felhasználó funkcióit.

### Telepítési terv

- Fizikai telepítési terv:
    - Szükség van egy adatbázis szerverre, amely közvetlenül csatlakozik a webszerververhez.
    - A webszerverre közvetlenül az internetről kapcsolódnak rá a kliensek.
    
- Szoftver telepítési terv:
    - A szoftver webes felületéhez csak egy ajánlott a böngésző telepítése szükséges
     ( Google Chrome, Firefox, Opera, Edge) külön szoftver nem kell hozzá.