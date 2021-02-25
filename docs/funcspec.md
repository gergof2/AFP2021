# Funkcionális Specifikáció

## Rövid áttekintés

- A rendszer célja egy dobozos szoftver megvalósítása. Mivel a hazánkban népszerű üzenetküldő 
rendszerek technológiai elavultságuk és a céges pénzügyi helyzet miatt kezdenek
kiszorulni a kis hazai piacról. Ezért szüksége van az embereknek valami olyan
üzenetküldő rendszerre, ami  jobb,olcsóbb és megbízhatóbb.
Ezt hivatott megvalósítani a mi szoftverünk.
Adatvédelmi szempontokból megfelel az uniós elvárásoknak, ingyenes és magyar.

## jelenlegi helyzet

- Mivel a magyar állam törvényeiben egyre jobban teret nyer az informatika szabályozása,
ezért a nagy vállalatok vagy alkalmazkodnak ehhez a lépéshez, vagy kivonulnak a piacról.
A nagyobb vállalatok álltalában nem akarnak alkalmazkodni a reklámfelületek adózási
szabályaihoz, így inkább elhagyják a piacot. Ennek hatására hazánkban nincs aki
biztosítsa az emberek számára az online térben való üzenetküldési lehetőséget.
Ezért készül a mi szoftverünk hogy ezen igényeknek eleget tegyen.

## követelménylista

|Module| ID | Név| Kifejezés|
|------| ---- |--- | ---      |
|Jogosultság| K_1 | Bejelentkezési felület|A felhasználó az email címe és a jelszava segítségével bejelentkezhet. Ha a megadott email cím vagy jelszó nem megfelelő, akkor a felhasználó hibaüzenetet kap.|
|Jogosultság| K_2 | Regisztráció | A felhasználó a felhasználói nevének, email  címének és jelszavának megadásával regisztrálja magát.A jelszó tárolása kódolva történik az adatbázisban.Ha valamelyik adat ezek közül hiányzik vagy nemfelel meg a követelményeknek, akkor a rendszer értesíti erről a felhasználót.|
|Jogosultság| K_3 | Elérhetőségi szintek | Elérhető / Tétlen / Elfoglalt / Nem elérhető |
|Modifikáció| K_4 | Felhasználó módosítása | A felhasználó módosítani tudja saját Felhasználónevét. |
|Modifikáció| K_5 | Jelszó módosítása | A felhasználó módosítani tudja saját jelszavát. |
|Modifikáció| k_6 | Felhasználók megjelölése | A felhasználók megjelölhetik egymást , és ezzel üzeneteket kapnak |
|Felület| K_7 | Felhasználói rangok | A felhasználók autómatikusan rangot kapnak az elért szintjük/teljesítményük alapján|
|Felület| K_8.1 | Üzenet küldés | A felhasználók közösen egy csetablakban küldhetnek üzeneteket egy közös üzenőfalra |
|Felület| K_8.2 | Hagüzenet küldése | A felhasználók hangüzeneteket is küldhetnek egymásnak |
|Felület| K_8.3 | Üzenetek Naplózása | A felhasználók üzeneteinél megjelenik mikor küldték |
|Felület| K_9 | hangulatjelek | A felhasználók bizonyos betűkombinációval hangulatjeleket küldhetnek ( smile )

## Jelenlegi üzleti folyamatok modellje

- A mai világban már mindenki ismeri a Messenger fogalmát, rengeteg üzenetküldő rendszer létezik 
ezek közül kerül ki a mi rendszerünk a "Timber" .

- A legelső chat rendszert Talkomatic-nak nevezték, amit Doug Brown és David Wooley hozott létre, a PLATO (Programmed Logic for Automatic Teaching Operations)
 rendszeren, az Illinois-i egyetemen, 1973-ban. Számos csatornát ajánlott fel, amelyekre legfeljebb öt ember csatlakozhatott. 
 
- A mi rendszerünk célja valamelyféle innováció hozzáadása ahhoz, amit 1973-ban kezdtek el és mai napig fejlődött.
Mindeközben a szolgáltatásunk stabilitása prioritást élvez. A felhasználó chat résztvevőn képes lesz majd valamikor
egyértelmű kezelőfelületen az adott chat szobán keresztül akadálymentesen tud a többi résztvevővel kommunikálni.
                   
## Igényelt üzleti folyamatok modellje

- Az emberek számára szeretnénk megkönnyíteni a távolságtartást. Szeretnénk csoportoknak , közösségeknek egy olyan alkamazást
nyújtani ami megkönnyíti nekik a beszélgetéseket, és az üzenetváltást. Megoszthatják egymással az élményeiket 
képeken keresztül üzenetekkel vagy hangokall. Minnél többet beszélnek egymássla annál magasabb rangot kaphatnak a rendszertöl
 , ha valaki nagyon aktyv az feljebb lép , ha pedig inaktív akkor leesik rangban. A Felhasználók könnyebb tájékozódás érdekében
 jelölni fogjuk hogy elérhető e , vagy épp elfoglalt esetleg inaktív állapotban van.
 
## Használati esetek

- Beszélgetés
- Szórakozás
- Kapcsolattartás
- Élmény

## Megfeleltetés, hogyan fedik le a használati esetek a követelményeket

- Beszélgetés >> K_8.1 (Üzenet küldés)
- Szórakozás >>  K_9 (smile)
- Kapcsolattartás >> K_3 (állapotjelző)
- Élmény >> All (Az alkalmazás használata)
                                               
## Képernyő tervek

![Image of Yaktocat](https://octodex.github.com/images/yaktocat.png)
![Image](https://github.com/gergof2/AFP2021/blob/main/docs/images/AFP_pictue_plan.jpg)


                               
                                  
                                  
                                  
                                 
                                                                                                               
                                                                                                                   
                                    

  
