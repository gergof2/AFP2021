# Követelmény specifikáció

## A jelenlegi helyzet

Mivel a magyar állam törvényeiben egyre jobban teret nyer az informatika szabályozása,
ezért a nagy vállalatok vagy alkalmazkodnak ehhez a lépéshez, vagy kivonulnak a piacról.
A nagyobb vállalatok álltalában nem akarnak alkalmazkodni a reklámfelületek adózási
szabályaihoz, így inkább elhagyják a piacot. Ennek hatására hazánkban nincs aki
biztosítsa az emberek számára az online térben való üzenetküldési lehetőséget.
Ezért készül a mi szoftverünk, hogy ezen igényeknek eleget tegyen.

## A kívánt rendszer

Az általunk készülő dobozos szoftver célja a felhasználók által használt szoftver helyére egy 
új és friss alkalmazás kerüljön, ami lehetővé teszi, hogy egy új környezetben tudjanak
kommunikálni a felhasználók egymással. A rendszer php nyelven kerül megírása, ami kommunikál az 
sql adatbázissal és weblapként funkciónál. Css-el ellátva, ami a kinézetért felelős, illetve egy 
C# nyelven megírt, letölthető változat is kikerül. Az alkalmazáson belül
a felhasználó láthatja, hogy ki van fent, ki elfoglalt, tétlen, vagy nincs éppen fent.
Üzeneteket és képeket tud küldeni, a képeket letölteni. Tud reagálni az előzőekre, és emojikat
használni.

## Elvárt működés

Amikor a felhasználó az oldalt/a programot megnyitja, egy belépési menü fogadja, ahol vagy
bejelentkezik, vagy ha nincs még regisztrációja, akkor először a rendszer megkéri a
felhasználót, hogy regisztráljon. Ezt követően a felhasználó felcsatlakozik egy online chat
felületre, ahol a többi felhasználóval tud kommunikálni. A chat felületen lehetőség van 
beállítani a saját státuszunkat, amit 4 féle státuszból választhatunk ki: elérhető, tétlen, 
elfoglalt vagy ki van jelentkezve(offline). A chaten szöveges üzeneteket lehet küldeni, illetve 
képeket is, amiket le lehet tölteni. Az üzenetek alatt megtalálható egy kis menürész, ahol 
lehetőség van reagálni az adott üzenetre, vagy ha saját üzenetünk alatt vagyunk, van 
lehetőségünk módosítani az üzenet tartalmát.

### Rendszer futtatása saját gépen:

A letöltött mappában található afp2021_Database
(AFP2021\web\application\database) fájlt egy xampp/wamp 
program segítségével, a program htdocs mappájában kell elhelyezni, majd ezt követően az adott 
alkalmazásban elindítani az Apache és a MySQL részt. Ha ezzel megvagyunk, akkor már csak az 
adatbázist kell beimportálnunk a phpmyadminba, majd elindítani az alkalmazást/megnyitni
böngészőn keresztül a localhost-ot.

## Szükséges funkciók listája

| Modul | ID | Név | Leírás |
| :-----: | :--: | :-----: | :--------: |
| Backend | F1 | Adatbázis | Az adatbázis tárolja az alkalmazás által használt adatokat |
| Backend | F2 | Funkciók | A felhasználó által használt parancsok végrehajtása |
| Frontend | F3 | Felhasználó beléptető oldal | A felhasználó beléptetésére használt oldal. |
| Frontend | F4 | Regisztrációs oldal | A felhasználó regisztrációjára használt oldal. |
| Frontend | F5 | Chat oldal | Beléptetés után megjelenő felület. |
|Frontend | F6 | Státuszállítás | A felhasználók saját állapotukat tudja állítani |

## További lehetséges funkciók listája

| Modul | ID | Név | Leírás |
| :-----: | :--: | :-----: | :---------: |
| Backend | F6 | Voice chat | Hang alapú kommunikáció |
| Frontemd | F7 | Voice chat | Hang alapú kommunikációhoz használható szoba |
| Frontend | F8 | Emojik | Emojik használata |
| Frontend | F9 | Rang rendszer | Különböző felhasználói rang |
| Frontend | F10 | Név/Rang megjelölés | Chat üzenetben a felhasználók megjelölhetnek egy másik felhasználót vagy rangot |

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

    ![Image](https://github.com/gergof2/AFP2021/blob/main/docs/images/messages.png)

    - id: egy adott üzenet sorszáma
    - userid: a user táblával összekötött azonosító
    - text: a felhasználó által küldött üzenet
    - files: a felhasználó által küldött fájlok elérésí útvonala
    - timedate: mikor írta az üzenetet a felhasználó

## A rendszerre vonatkozó törvények, rendeletek, szabványok és ajánlások felsorolása

- AZ EURÓPAI PARLAMENT ÉS A TANÁCS (EU) 2016/679 RENDELETE
(2016. április 27.)
a természetes személyeknek a személyes adatok kezelése tekintetében történő védelméről és az 
ilyen adatok szabad áramlásáról, valamint a 95/46/EK irányelv hatályon kívül helyezéséről 
(általános adatvédelmi rendelet)

- 2011.évi CXII. törvény az információs önrendelkezési jogról és az információszabadságról

- 1.§2 E törvény célja a hatálya alá tartozó tárgykörökben az adatok kezelésére vonatkozó 
alapvető szabályok meghatározása annak érdekében, hogy a természetes személyek magánszféráját az 
adatkezelők tiszteletben tartsák, valamint a közügyek átláthatósága a közérdekű és a közérdekből 
nyilvános adatok megismeréséhez és terjesztéséhez fűződő jog érvényesítésével megvalósuljon.

## Szótár

- **backend**: adat-hozzáférési réteg a szoftverben.
- **frontend**: felület a felhasználó és a backend között.
- **voice chat**: hang alapú kommunikáció.
- **emoji**: hangulatjel.
- **dobozos szoftver**: nagy közönségnek készűlt termék.
