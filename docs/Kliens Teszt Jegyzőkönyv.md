# Kliens Tesztjegyzőkönyv
## 2021. 05. 12.

##Feketedobozos tesztelést használtunk a következő eredményekkel:
### Login Ablak Tesztelés:
-Login ablakon belüli regisztrációs gomb. Megnyomom.  
1. Várt müködés: Megjelenik a regisztrációs ablak.  
2. Ami történik: Megjelenik a regisztrációs ablak. Helyes müködés.

-Login ablakon belüli bejelentkező gomb.  
1. Várt müködés: Megfelelő adatok bevitele esetén beléptet és megjelenik a főablak, egyébként nem enged be.  
2. Ami történik: Szügség szerüen, megfelelő adatok bevitele esetén beléptet és megjelenik a főablak, egyébként nem enged be.  

-Helytelen adatokat beirva:  
1. Várt müködés: Az ablak feldob egy üzenetdobozt, amely tájékoztat arról, hogy a felhasználónév/jelszó kombináció nem létezik.    
2. Ami történik: Elvártak szerint, az ablak feldob egy üzenetdobozt, amely tájékoztat arról, hogy a felhasználónév/jelszó kombináció nem létezik.  

### Regisztrációs Ablak Tesztelés:  
-Regisztráció ablakon belüli fiók létrehozó gombra kattintok:  
1. Várt müködés: Létrehozza a fiókot, a megfelelő hitelesitő adatokkal.  
2. Ami történik: Az elvártak szerint létrehozza a fiókot, amennyiben az adatok helyesek.  

-Helytelen adatokat beirva:
1. Várt müködés: Az ablak feldob egy üzenetdobozt, amely tájékoztat arról, hogy a fiók már létezik.  
2. Ami történik: Az ablak feldobja az adott üzenetdobozt, de nem egyértelmü hogy miért nem elfogadhatóak az adatok.  

### Főablak Tesztelés:  
-Bejelentkezés utáni események:  
1. Várt müködés: Sikeres bejelentkezés esetén a legfrissebb üzenetek jelennek meg. Illetve minden aktiv felhasználót kilistáz.  
2. Ami történik: Sikeres bejelentkezés esetén a legfrissebb üzenetek jelennek meg. Illetve minen aktiv felhasználót kilistáz, mutatva az alstátuszukat Mindet kiirva és az aljára görgetve.  

-Üzenet küldés gomb:
1. Várt müködés: Az üzenet el lesz küldve, majd megjelenik az üzenetlista alján.
2. Ami történik: Az üzenet sikeresen elküldve, kiirva a lista aljára és a lista legördül hogy a legfrissebb üzenet látható legyen.

-Üzenetek folyamatos frissülése:
1. Várt müködés: Elküldött és beérkező üzenetekért való folyamatos frissités, majd kiiratás.
2. Ami történik: A program sikeresen kiirja az új üzeneteket és mindig a legfrissebbet mutatja (legörget) amennyiben a felhasználó nem régebbi üzeneteket néz.

-Aktiv felhasználók listájának folyamatos frissitése:
1. Várt müködés: Az elérhető felhasználók megjelenése.
2. Ami történik: Az elérhető felhasználók szükségszerüen megjelennek, az al-állapotukkal együtt. (elérhető, elfoglalt, nincs gépnél)
