# mozi-bead

## Használat

1. XAMMP htdocs mappájába csomagold ki.
2. phpmyadmin-on belül importlád a a "mozi.sql" fájlt
3. Utána XAMMP Apache és MySQL szerver indítása után elérhető lesz.

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
