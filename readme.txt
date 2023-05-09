npm run build

php -S localhost:8888 -t public

phpcs -sw --standard=PSR1 file.php

// DETECT STYLE ISSUES

tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src --dry-run
tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src --dry-run -v

// FIX STYLE ISSUES
tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src

// CODE ISSUES IN php

tools/phpmd/vendor/bin/phpmd src text cleancode,codesize,controversial,design,naming,unusedcode

// ALL FILES
tools/phpmd/vendor/bin/phpmd . text phpmd.xml

// PHPSTAN

tools/phpstan/vendor/bin/phpstan analyse src

// SQL

php bin/console make:migration
php bin/console doctrine:migrations:migrate

// PHPMETRICS

tools/phpmetrics/vendor/bin/phpmetrics --config=phpmetrics.json

---------------------------------------------------

klasser
[ ] Card
[ ] CardGraphic: inherit from card
[ ] CardHand
[ ] DeckOfCards
[ ] DeckOfCards with jokers? (OPTIONAL)
[ ] 1 composition (CardHand and DeckOfCards)
[ ] No strict methods. Follow instructions.

Card style
[ ] Choose a style to represent the DeckOfCards
[ ] Choose a more visual version  for CardGraphic?

Git
[ ] When finished with a part. Commit!

Skapa klasser och använd dem i webbsidor
[ ] Skapa en kontroller i Symfony där du kan skapa routes för denna delen av uppgiften.
[ ] Gör en förstasida card som länkar till samtliga undersidor för denna uppgiften. Detta är din “landningssida” för denna uppgiften. Placera länken till sidan i din navbar så den är lätt att nå.
[ ] På din landdningssida, berätta kort om strukturen på dina klasser, vilka klasser har du och hur är de relaterade till varandra. Rita ett UML klass diagram och visa i sidan.
[ ] Skapa en sida card/deck som visar samtliga kort i kortleken sorterade per färg och värde.
[ ] Skapa en sida card/deck/shuffle som visar samtliga kort i kortleken när den har blandats.
[ ] Skapa en sida card/deck/draw som drar ett kort från kortleken och visar upp det. Visa även antalet kort som är kvar i kortleken.
[ ] Skapa en sida card/deck/draw/:number som drar :number kort från kortleken och visar upp dem. Visa även antalet kort som är kvar i kortleken.
[ ] Kortleken skall sparas i sessionen så om man anropar sidorna draw och draw/:number så skall hela tiden antalet kort från korleken minskas tills kortleken är slut. När man gör card/deck/shuffle så kan kortleken återställas.
[ ] [OPTIONELLT] Skapa en sida card/deck/deal/:players/:cards som delar ut ett antal :cards från kortleken till ett antal :players och visar upp de korten som respektive spelare har fått. Visa även antalet kort som är kvar i kortleken.

Bygg JSON api
[ ] Skapa en landningssida för routen api/ som visar en webbsida med en sammanställning av alla JSON routes som din webbplats erbjuder.
[ ] Börja med att lägga till den route du skapade i kmom01 api/quote, länka till den och ge en kort förklaring av vad routen gör.
[ ] Skapa en kontroller i Symfony där du kan skapa routes för ett JSON API för denna delen av uppgiften.
[ ] Skapa en route GET api/deck som returnerar en JSON struktur med hela kortleken sorterad per färg och värde.
[ ] Skapa en route POST api/deck/shuffle som blandar kortleken och därefter returnerar en JSON struktur med kortleken.
[ ] Skapa route POST api/deck/draw och POST api/deck/draw/:number som drar 1 eller :number kort från kortleken och visar upp dem i en JSON struktur samt antalet kort som är kvar i kortleken. Kortleken sparas i sessionen så om man anropar dem flera gånger så minskas antalet kort i kortleken.
[ ] [OPTIONELLT] Skapa en route POST api/deck/deal/:players/:cards som delar ut ett antal :cards från kortleken till ett antal :players och visar upp de korten som respektive spelare har fått i en JSON struktur. Visa även antalet kort som är kvar i kortleken.

Kodvalidering
[ ] Fixa till din kod enligt den kodstil du kör genom att köra composer csfix.

Publicera
[ ] Committa alla filer och lägg till en tagg 2.0.0. Om du gör uppdateringar så ökar du taggen till 2.0.1, 2.0.2, 2.1.0 eller liknande.
[ ] Kör dbwebb test kmom02 för att kolla att du inte har några uppenbara fel.
[ ] Pusha upp repot till GitHub, inklusive taggarna.
[ ] Gör en dbwebb publishpure report och kontrollera att att det fungerar på studentservern.
