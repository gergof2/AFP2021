# Webes Teszt Jegyzőkönyv
## 2021.05.12

Feketedobozos tesztelést használtunk, és a következő eredmény született:

### Navigációs bár tesztelés

  - Jobb felső sarokban van egy switch box. Elhúzom.
    - Várt működés: Megváltozik a weboldal témája(világos/sötét).
    - Ami történik: Megváltozik a weboldal témája(világos/sötét). 
    
  __Helyes működés__.
  
  - Belekattintok a fejlécben található regisztrációs menüpontra.
    - Várt működés: Átlép a regisztrációs oldalra.
    - Ami történik: Átlép a regisztrációs oldalra. 
    
  __Helyes működés__.
  
  - Belekattintok a fejlécben található login menüpontra.
    - Várt működés: Átlép a beléptető oldalra.
    - Ami történik: Átlép a beléptető oldalra.
    
  __Helyes működés__.
  
  - Belépett felhasználóként rákattintunk a fejlécen található logout menüpontra.
    - Várt működés: A rendszer kijelentkeztet minket és a home oldalra irányít át.
    - Ami történik: A rendszer kijelentkeztet minket és a home oldalra irányít át.
    
    __Helyes működés__.
  
### Regisztrációs oldal tesztelés

  - Nevet, email címet és jelszót megadva rákattintunk a regisztráció gombra.
    - Várt működés: 
      1. Sikeres regisztráció esetén átirányít a beléptető oldalra.
      2. Sikertelen regisztráció esetén marad az adott oldalon és hibát ír ki.
    - Ami történik: 
      1. Sikeres regisztráció esetén átirányít a beléptető oldalra.
      2. Sikertelen regisztráció esetén marad az adott oldalon és hibát ír ki.
 
    __Helyes működés.__

### Beléptető oldal tesztelés

  - Nevet és jelszót megadva rákattintunk a login gombra.
    - Várt működés: 
      1. Sikeres belépés esetén az üzenetküldő oldalra irányít át. 
      2. Sikertelen belépés esetén marad az adott oldalon és hibát ír ki.
    - Ami történik:  
      1. Sikeres belépés esetén az üzenetküldő oldalra irányít át.
      2. Sikertelen belépés esetén marad az adott oldalon és hibát ír ki.

     __Helyes működés.__
     
 ### Üzenetküldő oldal tesztelés
 
  - Belépést követően a rendszer átirányít az üzenetekhez.
    - Várt működés:
      1. Az adatbázisból kiírja a felhasználók üzeneteit.
      2. Az üzenetek görgethetőek.
      3. Az üzenetek automatikusan frissülnek.
      4. Egy szöveget beírva rákattintunk a send message gombra és elküldi az üzenetet.
      5. Jobb oldalt megjeleníti az összes felhasználót és a hozzájuk tartozó státuszukat.
    - Ami történik:
      1. Az adatbázisból kiírja a felhasználók üzeneteit.
      2. Az üzenetek görgethetőek.
      3. Az üzenetek automatikusan frissülnek. Frissítéskor a csúszka automatikusan legalulra kerül. Az éppen gépelt üzenetet frissítéskor törli az oldal.
      4. Egy szöveget beírva rákattintunk a send message gombra és elküldi az üzenetet.
      5. Jobb oldalt megjeleníti az összes felhasználót és a hozzájuk tartozó státuszukat.
      
      __Helyes működés__ , kivétel a 3. pont.
         
    
