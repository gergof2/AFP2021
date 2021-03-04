# Követelmény specifikáció

## A jelenlegi helyzet

Hazánkban a népszerű üzenetküldő rendszerek technológiai elavultsága és a céges pénzügyi helyzetek miatt kezdenek kiszorulni a kis hazai piacról. Ez az jelenti, hogy egyre kevesebb felhasználó használja a már létező programokat, így nem tudják egymással tartani a kapcsolatot. Ezért szüksége van az embereknek valami olyan üzenetküldő rendszerre, ami jobb,olcsóbb és megbízhatóbb.

## A kívánt rendszer

Az általunk készülő program célja a felhasználók által használt szoftver helyére egy új és friss alkalmazás kerüljön, ami lehetővé teszi, hogy egy friss és új környezetben tudjanak kommunikálni a felhasználók egymással. A rendszer php nyelven kerül megírása és weblapként funkciónál, illetve egy C# nyelven megírt, letölthető változat is kikerül. Az alkalmazáson belül a felhasználó láthatja, hogy ki van fent, ki elfoglalt, tétlen, vagy nincs éppen fent. Üzeneteket és képeket tud küldeni, a képeket letölteni. Tud reagálni az előzőekre, és emojikat használni.

## Elvárt működés

Amikor a felhasználó az oldalt/a programot megnyitja, egy belépési menü fogadja, ahol vagy bejelentkezik, vagy ha nincs még regisztrációja, akkor először a rendszer megkéri a felhasználót, hogy regisztráljon. Ezt követően a felhasználó felcsatlakozik egy online chat felületre, ahol a többi felhasználóval tud kommunikálni. A chat felületen lehetőség van beállítani a saját státuszunkat, amit 4 féle státuszból választhatunk ki: elérhető, tétlen, elfoglalt vagy ki van jelentkezve(offline). A chaten szöveges üzeneteket lehet küldeni, illetve képeket is, amiket le lehet tölteni. Az üzenetek alatt megtalálható egy kis menürész, ahol lehetőség van reagálni az adott üzenetre, vagy ha saját üzenetünk alatt vagyunk, van lehetőségünk módosítani az üzenet tartalmát.

Rendszer futtatása saját gépen: A letöltött mappában található php fájlokat egy xampp/wamp program segítségével, adott mappákban kell elhelyezni, majd ezt követően az adott alkalmazásban elindítani az Apache és a MySQL részt. Ha ezzel megvagyunk, akkor már csak az adatbázist kell beimportálnunk a phpmyadminba.

A beinportálandó fájl neve: afp2021_Database.

## Szükséges funkciók listája

| Modul | ID | Név | Leírás |
| :-----: | :--: | :-----: | :--------: |
|Backend|F1|Adatbázis|Az adatbázis tárolja az alkalmazás által használt adatokat|
|Frontend|F2|Felhasználó beléptető oldal|A felhasználó beléptetésére használt oldal.|
|Frontend|F3|Regisztrációs oldal|A felhasználó regisztrációjára használt oldal.|
|Frontend|F4|Chat oldal|Beléptetés után megjelenő felület.|

## Adatbázis

3 adatbázis táblát fogunk használni a projekt megvalósításához.

1. A user tábla:
   
   ![Image](https://github.com/gergof2/AFP2021/blob/main/docs/images/user.png)

   - userid: a felhasználóhoz tartozó azonosító
   - username: felhasználónév
   - password: jelszó
   - email: a felhasználó email címe
   - registerdate: mikor regisztrált
   - statusid: a szoftverben éppen látható státusza(offline, aktív, elfoglalt, stb.)

2. userlogin tábla:
   
   ![Image](https://github.com/gergof2/AFP2021/blob/main/docs/images/userlogin.png)

   - id: egy adott belépés sorszáma
   - userid: a user táblával összekötött azonosító
   - timedate: mikor lépett fel a felhasználó
   - ipaddress: a felhasználóü által használt eszköz ip címe
   - platform: honnan lépett fel a felhasználó(program, valamely böngésző)

3. messages tábla:

    ![Image](https://github.com/gergof2/AFP2021/blob/main/docs/images/messages)

    - id: egy adott üzenet sorszáma
    - userid: a user táblával összekötött azonosító
    - text: a felhasználó által küldött üzenet
    - files: a felhasználó által küldött fájlok elérésí útvonala
    - timedate: mikor írta az üzenetet a felhasználó

## Jogszabályok

## Szótár

- **backend**: adat-hozzáférési réteg a szoftverben.
- **frontend**: felület a felhasználó és a backend között.
