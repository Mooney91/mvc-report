<h2 id="kmom10">Kmom10</h2>

### Introduktion 

Den här är min redovisningstext för projektet inom mvc (DV1608 V23 lp4 Objektorienterade webbteknologier). Det här projektet fokuserar på de 17 globala målen för hållbar utveckling. Två av dessa mål kommer att utforskas med hjälp av verktyg som lärts under mvc-kursen. 

### Krav 1, 2, 3 

Det första jag ville säkerställa var att jag hade en bra struktur för projektet. Jag skapade en ny mapp inom `templates` och lade till en `base.html.twig`-fil och en `index.html.twig`` (`/proj`). Det var för att säkerställa att jag kunde skapa ett helt nytt utseende och struktur för projektet som skilde sig från resten av webbplatsen. Samtidigt skapade jag en ny `ProjectController` i `Controllers`-mappen. Det innehåller router:n för projektet inklusive projektets API-sidorna. 

Under kursen har min `app.css`-fil växt mycket. Nu när jag behövde en unik design för webbplatsen skulle den växa mer och jag behövde ett bättre sätt att organisera min css. Jag bestämde mig för att installera SASS och separera relaterad css i olika filer. Jag skapade en separat projektfil så att alla designelement kunde lagras tillsammans. För att göra webbplatsen att se lite mer professionell ut lade jag till footer:n med tre kolumner med ytterligare information. Jag var också särskilt uppmärksam på typsnitten som används på hemsidan och färgpaletten. 

Jag hämtade lite inspiration från den officiella Global Goals-webbplatsen och jag försökte mycket hårt för att göra webbplatsen, tillgänglig, enkel, och attraktiv för publiken. Min `index.html.twig`-sida blir då en *landing page* för webbplatsen och fungerar även som en reset-sida eftersom vi bara behöver läsa data och inte manipulera den. 

Jag skapade sedan en "about"-sida (`/proj/about`), en sida som diskuterar databasen, API-*landingpage* och de två sidorna för de två globala målen - *Quality Education* och *Reduced Inequalities*. Jag var nu redo att ta mig an en av de mest utmanande delarna av projektet - databasen och tabellerna som finns i den. 

Eftersom jag kommer att skapa tabellerna i databasen med Doctrine, ville jag först samla in mina data och strukturera datan. Källan till data var SCB och även om det var mycket intressant data var det inte rådata och det lagrades som matriser snarare än en vanlig tabell. Det här skulle göra det svårare att extrahera. Jag kommer att diskutera mer om hur jag tog dessa data och skapade tabellerna under sektionen om *krav 6*. 

Till slut skapade jag tre tabeller, `Education`, `LowEconomic` och `AgeEconomic`. Med hjälp av data från tabellerna skapade jag sedan några diagram för att visa olika aspekter av data och diskuterade mina resultat på webbsidorna. 

Jag byggde på `README.MD` som jag skapade för min git-repo. Jag beskrev orsaken till repo:t och beskrev vad varje sida på repo:t innehöll. I `readme` finns det också information om hur man klona och startar webbplatsen samt några verktyg som kan användas i samband med webbplatsen. Jag har kört *phpdocs* och *phdmetrics* för att skapa dokumentationen och metrics-data för min webbplats. *Scrutinizer* arbetar också i bakgrunden för att analysera min repo och jag har lagt till *badges* till `README.MD`. 

Som det står i *Scrutinizer* har jag inte 100% kodtäckning. Jag har strävat efter att testa så mycket av mina funktioner och metoder som möjligt som skulle kunna testas; det finns dock några som jag avsiktligt inte har testat, såsom mina *Controllers* och *Repositories*. Som diskuterats i *krav 6* var det mycket svårt att testa metoderna som skulle skapa mina diagram. Dessutom visar de också höga nivåer av komplexitet och längd; det här krävdes för att kunna arbeta med data och skapa diagrammet. För fullständighetens skull har jag beslutat att lämna dessa mappar som en del av min *Scrutinizer*-analys eftersom det ger en realistisk bild av hur webbplatsen ser ut i dag. Jag vill, i en idealisk värld, återvända till hemsidan i framtiden och se var den kan förbättras eller vad som kan testas. Enligt *Symfonys* dokumentation rekommenderas inte testning med *repositories*. 

### Krav 4 

Jag skapade en ny *route* - `/proj/api/` som *landing-page* för min API-webbplats. Jag lade till knappar för var och en av de *router* som jag ville skapa. För varje knapp skapade jag en ny *route* och använde 'findAll'-metoden från *Doctrine* för att hämta data från tabellerna. Om specifika data behövdes använde jag helt enkelt en foreach loop och en if-sats för att samla in de data som behövdes. Jag lägger sedan helt enkelt resulterande data till json. För extra funktionalitet har jag lagt till två formulär på den här sidan. Det första formuläret kan användaren välja vilket år de vill se data från tabellen `Education`. För tabellen `LowEconomic` kan användaren välja att se data efter en viss `birthplace` genom att använda formuläret. Efter att ha skapat min databas var det här kravet en av de första jag började med. Det var enkelt att börja med och jag kunde felsöka min databas och min kod med hjälp av knapparna som jag hade skapat för krav 4. Jag diskuterar vidare i *krav 6* hur jag ändrade hur jag skrev koden för API-sidorna med DQL. 

### Krav 5 

Krav 5 är ett av nyckelkraven för det här valet av projekt eftersom det bygger på tabellerna i min databas. För att skapa mina tabeller och hur jag har använt dem har jag mest diskuterat i sektionerna för krav 1, 2, 3 och 6. Jag hämtar data från mina tabeller med hjälp av get-metoderna i filen för tabellen i mappen `Entity` . Man kan hitta mer information om min databas på `proj/about/databas`, som kan nås via sidan `proj/about`. 

*Doctrine* och hur vi använde databaser i databaskursen (med Javascript som applikationsspråk) är två sätt att interagera med en databas. *Doctrine* är ett ORM-library som använder PHP som språk. Den omvandlar databasen till PHP-objekt så att man kan använda klassmetoder för att interagera med databasen istället för SQL-queries. Med andra ord, tabeller blir "entiteter" och man kan använda CRUD-metoder för att komma åt dem. I databaskursen skrev vi SQL-queries som lagrades och sedan hämtades med Javascript med hjälp av `promise-mysql`.  

En fördel med att använda *Doctrine* är att vi kan välja mellan att använda *MySQL* och *SQLite*. I mitt fall använde jag *SQLite*, men jag skulle ha behövt konfigurera min applikation i ett annat sätt om jag använde den under databaskursen.  En annan fördel med *Doctrine* är att man kan komma åt databasen direkt genom en *abstraction layer*. Med vår alternativa metod behövde vi skriva queriesarna manuellt och tänka på SQL-injektion och andra säkerhetsproblem. 

Det finns också andra saker att tänka på när man använder *Doctrine*. Enligt dokumentationen kan man använda SQL-frågor i Doctrine, men det är inte lika enkelt och varje databashanteringssystem använder olika metoder och tillägg. *Doctrine* har också en DQL (Doctrine Query Language) som kan användas för att komma åt databasen. Det är inte enkelt och kan ta lite tid att förstå - jag diskuterar hur jag använde DQL under sektionen om *Krav 6*. En till nackdel är att *Doctrine* kan ladda hela entiteter och objekt vilket innebär att den använder mer minne än att query med SQL som vi gjorde i databaskursen. 

Båda våra sätt att interagera med databasen innebär att det finns *dependency* på dessa system. Eftersom SQL är mer eller mindre standardiserat och Javascript ganska väletablerat finns det bara ett fåtal libraries och tillägg såsom `promise-sql` för att hålla sig uppdaterade och kompatibla. För *Doctrine* blir man beroende av systemet och det finns en risk att hela din applikation skulle behöva uppdateras för att behålla kompatibiliteten. 

Personligen tyckte jag att jag hade mer kontroll över databasen när jag använde SQL-queries och Javascript. SQL ger också ett enklare sätt att köra avancerade och komplexa SQL-frågor. Däremot, *Doctrine* kan vara svårare med ett extra *abstraction layer* även om man kan använda SQL och DQL för att göra mer komplicerade queries. 

### Krav 6 

I det här sektionen kommer jag att diskutera tre olika delar av mitt projekt som jag antingen har tyckt vara utmanande eller anses ligga utanför baskraven. 

Eftersom en av huvudfokusen i det här projektet var att skapa tabeller, behövde jag hitta data. Min första utmaning var att ta data från SCB och konvertera den till ett format som kunde itereras igenom och läggas till som ett objekt. Den bestämde sig för att skapa en .csv-fil för varje mina tabeller som innehåller mina data och konvertera det här till en JSON-fil. CSV-filer är mycket läsbara och lätta att uppdatera för de som är bekanta med databaser och JSON är ett enkelt format att arbeta med för programmering. 

För det första var data från SCB matriser inte vanliga tabeller, så jag behövde "flatten" datan till en tabell-format. Jag gjorde helt enkelt det här i Excel genom att konvertera det till en tabell och omvandla data genom att t.ex. "unpivoting” kolumnerna för varje "year". Jag kunde sedan ändra kolumn-headers till gemener för att få det att spegla standardkonventionerna för fältnamn. Jag konverterade den här tabellen till en .csv och jag har skapat då mina data. 

Nästa utmaning var att konvertera filen till JSON-data. Det här var ganska svårt att räkna ut eftersom jag behövde öppna filen och konvertera den till ett helt annat format. Jag behövde visserligen leta upp på nätet hur man gör det här på det mest effektiva sättet och hittade en funktion för Javascript. Jag skrev om logiken i PHP, men jag hittade några problem. Jag upptäckte att jag hade en tom rad i slutet av min csv-fil, vilket funktionen inte gillade. Jag hade ett Json-format, men jag kunde sedan inte hitta en av nycklarna när jag försökte skapa ett nytt objekt. Jag upptäckte att jag konstigt nog hade ett whitespace-character framför min första *header* i .csv. Det var väldigt svårt att hitta och jag upptäckte bara problemet genom att använda `var_dump` och kopiera och klistra in det i VSCode.  

På jakt efter en lösning på dessa problem hittade jag en annan funktion som kunde konvertera en csv till json som använde en inbyggd php-funktion `fgetcsv`. Det var till slut mer kortfattat och lättare att förstå. Slutligen skulle jag göra en metod som kunde konvertera valfri csv till JSON-data och den kunde användas för att lägga till data för vilken som helst av mina tabeller. 

En av huvuduppgifterna i det här projektet var att visualisera data. Jag ville ha något som skulle vara modernt och jag skulle kunna använda i framtiden. För våra ändamål hittade jag ett populärt library som heter `Chart.js`. Det verkade ganska enkelt att implementera och det hade ett bra urval av grafer att välja mellan. 

Dokumentationen verkade ganska okomplicerad men jag var lite osäker på hur jag skulle integrera den i Symfony. Lyckligtvis finns det ett Symfony-paket som kan användas för att integrera i din Symfony-applikation. Eftersom den är designad speciellt för Symfony bestämde jag mig för att använda den. Installationen var ganska enkel. 

Jag delade upp skapandet av varje diagram i en annan funktion, det är så att jag kunde ta bort all logik och kod från *Controller*-filen. Inom funktionen måste jag använda `ChartBuilderInterface` som används för att skapa diagrammet. Jag måste sedan skapa de variabler som kommer att behövas när jag skapar diagrammet. *Labels* för diagrammet och datan som visas. Datan använder API:n för att hämta data från tabellerna. Jag skapar sedan diagrammet (`$chartBuilder->createChart(Chart::TYPE_LINE);`) och lägger sedan till *labels*, data:n, och vilka färger som ska visas. När man har skapat det kan man hämta det och använda `render_chart` i twig för att visa diagrammet. Det här var ganska okomplicerat men sedan ville jag visa två olika datasets. Det gjordes genom att skapa två variabler för de två datasets och sedan skapa en array av datasets. 

Sedan ville jag skapa ett diagram som visade mer än två datasets, faktiskt mer än åtta. Jag kunde inte upprepa samma process eftersom jag skulle skriva liknande kod mer än en gång. Istället skapade jag en loop som kunde lägga till data för varje `birthplace` oavsett hur många `birthplaces` det fanns. På liknande sätt skapade jag en loop så att jag inte behövde skriva varje dataset manuellt. Det här koden kan sedan hantera alla ändringar i datakällan. Den enda begränsningen var att jag var tvungen att specificera varje färg som skulle användas i diagrammet, men det kunde fixas genom att slumpmässigt generera färger beroende på hur många rader som är representerade i arrayen. 

Även om jag såg många exempel på internet på att använda foreach loopar och if-statement för att skapa eller hämta data för att skapa diagram, verkade det vara ett ganska mödosamt sätt att skapa det. 

Jag kom ihåg att Doctrine har skapat en DQL (Doctrine Query Language) som kan användas för att query data från databasen, så jag ville testa det. Jag hade redan mina diagram, men jag ville försöka ändra mina API-router så att de skulle hämta data med DQL istället.  

Dokumentationen på deras hemsida gav ganska användbara exempel för att komma igång. Jag kunde hämta all data från min `AgeEconomic`-tabell genom att använda `createQuery` och använda resultatet för att förvandlas till JSON. Dokumentationen stod inte tydligt att ``EntityManagerInterface’ behövde läggas till som en parameter i funktionen, vilket var lite knepigt att ta reda på. Jag ville då hämta data med vissa villkor. Jag gjorde det klassiska misstaget att försöka skriva DQL som om det vore SQL genom att använda en SQL WHERE-sats, men det fungerade inte. Istället måste man använda DQLs 'setParameter' tillsammans med WHERE.  

Allt som allt är jag nöjd med det här resultatet. Jag tycker att jag har mer kontroll över datan, men det har också resulterat i färre rader kod. 

### Hur projektet gick att genomföra 

Det här projektet var väldigt roligt eftersom jag kunde tillämpa de olika koncept som jag har lärt mig under kursen. Jag var särskilt intresserad av ORM och hur man hämtar data från en databas på det här sättet. Jag trodde att det här var mer fördelaktigt för mig eftersom jag använder mycket data i mitt arbete. Det var på början inte lätt att hitta data, omvandla data och få den att passa mina syften. Den allmänna strukturen i projektet kunde jag skapa ganska snabbt, men att hämta data, oavsett om det var direkt med API och logik eller med DQL, var inte lätt på början. Som diskuterats måste min datakälla vara i ett visst format eftersom den måste vara kompatibel med hur jag använde Doctrine, vilket gjorde det svårare. 

Projektet var rimligt för den här kursen men det var till en början svårt att välja vilket projekt som jag skulle göra eftersom de alla var väldigt olika. I slutändan är jag ganska nöjd med webbplatsens utseende och funktionalitet. Jag tyckte särskilt mycket om att använda *Chart.js* och det här verktyget kommer jag verkligen att använda i framtiden. 

### Mina tankar om kursen 

Det var en bra kurs och jag tycker att den har samlat många av de koncept som vi har använt under året. Det var också bra att ha lite uppfräschning av PHP. Jag tycker att kursen visar hur långt vi har kommit under året och genom att skapa egna tester och utveckla vårt spel har vi blivit mer självständiga. Det var lite förvirrande till en början eftersom det var lite svårt att skilja mellan webapp-kursen och mvc-kursen. Det finns naturligtvis många komponenter som måste ställas in och installera i början så skillnaderna försvann väldigt snabbt. 

Jag uppskattar verkligen videoföreläsningarna som Mikael har skapat. De är mycket tydliga, omfattande och tar dig igenom vad som skulle vara några svåra koncept eller processer. De skriftliga resurserna och artiklarna är också uppskattade särskilt som jag mest lär mig från skriftliga källor. Det var särskilt användbart för mig när jag installerade *Doctrine*. Det skulle ha varit bra att ha en allmän överblick över vad som skulle skapas eller utvecklas under kursen i början men jag förstår att det skulle ha varit svårt eftersom kursen håller på att utvecklas. Det är bra att ha i bakhuvudet hur länge man skulle arbeta med *CardGame* eller till och med Rapport-mappen (eftersom vi använder det för mer än bara våra redovisningstexter). 

Jag är mycket nöjd med den här kursen eftersom den har sammanfört koncept som har diskuterats under året och visat hur självständiga vi har blivit i vårt arbete. Jag rekommenderar kursen till mina kollegor och vänner.
