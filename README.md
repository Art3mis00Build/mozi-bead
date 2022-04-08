# mozi-bead

## Használat

1. XAMMP htdocs mappájába csomagold ki.
2. phpmyadmin-on belül importlád a a "mozi.sql" fájlt
3. Utána XAMMP Apache és MySQL szerver indítása után elérhető lesz.

##### Tanács
Mappa amibe pakolod legyen mozi a neve, mert így nem kell átírnod semmit. De ha nem akarod akkor a fájlokban ahol API lekérés van a linkből cseréld ki a "mozi" útvonalat.

Következő munka az lesz, hogy ez ne legyen ennyire szenvedős.

Teszt: localhost/{mappa ahova tetted, ha nincs ilyen akkor kihagyhatod}/admin => Admin főoldalnak kéne előugrania

---

## API

### POST

#### api/post/CustomerAdd.php
AJAX/POST - JSON fájlt fogad. Foglalást lehet leadni, de adatok nélkül.

JSON tartalma:
* id
* sor
* oszlop

#### api/post/CustomerDelete.php
AJAX/POST - JSON fájlt ogad. Foglalálst lehet törölni.

JSON tartalma:
* fogid - fogadasid lenne

#### api/post/FilmAdd.php
PHP/POST egy form-ból kapja meg az adatok. Filmet lehet hozzáadni.

#### api/post/FilmDelete.php?id={id}
PHP/POST törlés. {id} szerint tölri a filmet az adatbázisból.

#### api/post/FilmEdit.php?id={id}
PHP/POST egy form-ból kapja az adatokat, plusz az URL-ből a film id-jét. Filmek adatait lehet szerkeszteni.

---

### GET

#### api/get/getAllCustById.php?id={vetitesid}
Visszaadja vetitesid szerint az összes foglalót ahhoz a vetítéshez. Egy JSON fájlt küld vissza.

#### api/get/getAllCustomer.php
Visszaadja az összes foglalást. JSON fájlt küld vissza.

#### api/get/getAllFilms.php
Visszaadja az összes filmet. JSON fájlt küld vissza.

#### api/get/getAllVetites.php
Visszaadja az összes vetitest a film címével. JSON fájlt küld vissza.

#### api/get/getCustomersForFilm.php
Visszaadja az összes foglalót a filmekhez. JSON fájlt küld vissza.

#### api/get/getFilmId.php?id={filmid}
Visszaadja filmid alapján az adott film adatait.

#### api/get/getNumAllRes.php
Visszaadja, hogy összesen hány foglalás van. JSON fájlt küld vissza.

#### api/get/getTodayCustomer.php
Visszaadja, hogy összesen hány foglalás van a mai naphoz vetítések szerint. JSON fájlt küld vissza.

#### api/get/getTodayFilms.php
Visszaadja, hogy összesen filmet amit mai napon játszanak, plusz hogy hanyan foglaltak arra, vetítés szerint. JSON fájlt küld vissza.

#### api/get/getTodayCustomer.php
Visszaadja, hogy összesen hány foglalás van az aktuális héten vetítések szerint. JSON fájlt küld vissza.

---

## Rövid használat

1. Tetszőleges böngészőt url-be írd.
2. XAMPP esetén: localhost/{mappa neve}/{kiválasztott API}
3. Példa: localhost/mozi/api/get/getTodayCustomer.php
