# Metrics

## Introduktion
Den här rapporten undersöker kodkvaliteten för mitt "Report"-repo inom kursen mvc. Jag kommer att använda två verktyg PhpMetrics och Scrutinizer för att hjälpa mig med min analys.
I synnerhet kommer jag att titta på hur "sex Cs" kan påverka kodkvaliteten. De sex C:na är: Codestyle, Coverage, Complexity, Cohesion, Coupling, och CRAP. 

*CodeStyle* innebär att det finns ett enhetligt sätt att skriva kod enligt en fastställd standard. Detta gör det lättare att underhålla kod och även samarbete mellan utvecklare som arbetar med koden. 
 
*Coverage* är helt enkelt mängden av din kod som har testats med andra ord procentandelen av klasserna och funktionerna som har enhetstester. En väl testad kodbas kan visa var det finns buggar och identifiera vilka områden som behöver mer utveckling. Som det kommer att diskuteras senare har jag full kodtäckning i vissa delar av min kod och ingenting i andra - vilket betyder att dessa områden kan vara benägna att buggar.

*Complexity* betyder hur komplex din kod är. Det här kan visas genom *cyclomatic complexity* eller antalet kodrader som finns. I Scrutinizer kan det visas i kolumnen "Complexity". Mina controllers och `DeckOfCards` är de mest komplexa.

*Cohesion* i din kod betyder att metoderna eller elementen i din klass är relaterade eller har ett enda syfte. Detta gör din kod lättare att testa och förstå för andra. 

*Coupling* mäter hur beroende en klass är till andra klasser och hur många ändringar som kan göras i klassen. *Loose coupling* är idealisk eftersom det är mindre risk att koden går sönder. Sektionen *Coupling* i PhpMetric har ett bra översikt av statistiken.

*CRAP* ger et betyg baserad på *complexity* och *coverage*. En hög CRAP-betyg kan indikera att koden kan ha många buggar eller att det är mer troligt att buggar kan introduceras när koden ändras. 

Inom koden som jag har analyserat är *complexity* och *coverage* det viktigaste. Det här innebär också att CRAP-betyg också måste övervakas. 

## PhpMetrics
Det här avsnittet kommer jag att diskutera hur koden analyserades av PhpMetrics. I allmänhet fungerade min kod bra med linters och så jag fick inga kritiska *violations* och bara ett fel. Jag hade dock sju violations

### Violations
Eftersom jag inte hade testat mina Controllers och har ingen bra *coverage*. Det betyder att det finns inget sätt att jag kan veta hur eller varför de har fel, men statisken från det här verktyget hjälper. Som man kan se i bilden nedan visade PhpMetrics att ett *Blob / God-object* dyker upp i min `APIController`. Ett blob-objekt eller *god class* följer inte *Single Responsibility Principle*. Med andra ord, min klass försöker göra mer än en sak. Det här är faktiskt rätt eftersom vi har använt `APIController` för att visa data från de olika projekt som vi har gjort under den här kursen. Det här är därför en ganska komplex klass som förklarar varför den skulle vara "Probably bugged".

Tyvärr går mitt `App/Card`-paket emot *Stable Abstractions Principle*. Min `Card`-klass kan fungera som en mall för `CardGraphic`-klassen, men den har en hög grad av instabilitet eftersom objekt som tillhör den här klassen kan och ändras mycket. En av de tydliga viktiga förändringarna jag skulle göra är att göra mitt `App\Card`-paket abstrakt och stabilt. Jag skulle då skapa ytterligare klasser för att representera de olika typerna av kort t.ex. *suits* och *values*. Mitt `App\Entity`-paket visar också att det går emot *Stable Abstractions Principle*. Det här är svårt eftersom jag inte utvecklade det här paketet eftersom det skapades av *Doctrine*.

Mitt `App\Entity`-paket är svårt att ändra eftersom det skapades av *Doctrine* – ignorerar jag den här varningen eftersom det finns för att stödja ett tredjepartsverktyg? Jag tror i alla fall att jag skulle vilja lägga till några enhetstester till dessa klasser för att säkerställa att de gör vad de tänker göra.
![Class Violations]({{ asset('img/classviolations.png') }})

### Composer
De allra flesta *libraries* som jag använder är uppdaterade. Av de *libraries* som kräver uppdateringar är *Symfony* och* Doctrine* – dessa kräver endast mindre uppdateringar. Även om endast mindre uppdateringar krävs för mina *libraries*, bör jag se till att de hålls uppdaterade och att min repo förblir kompatibel med de senaste versionerna.

### Size & Volume

Mina kontroller har de flesta rader kod eftersom de kräver många rader kod för att ställa in varje sida utan mycket logik. Vad det här verktyget visar är att mina klasser `DeckOfCards`, `Game` och `Player` är ganska stora. Med hjälp av *Size & volym*-analysen visar den att jag har glömt att ta bort ett ganska stort antal kommentarer i mitt `LibraryRepository` och `ProductRepository`. När det gäller att hålla min kod ren och snygg skulle jag ta bort dessa för att få ett bättre förhållande mellan kod och kommentarer.

![Lines of Coade]({{ asset('img/linesofcode.png') }})

### Complexity & defects
Återigen har mina Controllers en hög grad av komplexitet och de har en så hög poäng för *relative system complexity* att det här döljer medelpoängen för alla mina klasser. Min `DeckOfCards`-klass har också en hög WMC-poäng. Det här skulle tyda ett stort antal metoder och komplexitet.

Mina `DeckOfCards`, `Game` och `Player` klasser är ganska långa och de behöver kanske delas upp i flera klasser. Det här gäller särskilt min `Game`-klass som har ganska mycket funktionalitet. `DeckOfCards` hade också en hög WMC-poäng, vilket tyder på att jag borde försöka minska klassens komplexitet och antalet metoder som klassen har.

### Coupling

Klasserna som är släkt med mitt spel, `App\Card\CardHand`, `App\Card\DeckOfCards` och `App\Game\Player` har det högsta antalet *afferent couplings*. Det här är inte förvånande eftersom det här är designat. Spelet kräver att `Player` påverkar andra klasser. Mina kontroller får därför väldigt låga poäng på det här eftersom de fungerar isolerat. Däremot har de mycket höga poäng för *efferent coupling* eftersom de behöver visa och bearbeta data från ett stort antal klasser. Min `GameController` och `APIController` har de högsta poängen i detta eftersom de är de mest komplexa och har den högsta nivån av instabilitet.

## Scrutinizer

<a href="https://scrutinizer-ci.com/g/Mooney91/mvc-report/build-status/master"><img src="https://scrutinizer-ci.com/g/Mooney91/mvc-report/badges/build.png?b=main" alt="Build Status" /></a>
<a href="https://scrutinizer-ci.com/g/Mooney91/mvc-report/?branch=master"><img src="https://scrutinizer-ci.com/g/Mooney91/mvc-report/badges/coverage.png?b=main" alt="Code Coverage" /></a> 
<a href="https://scrutinizer-ci.com/g/Mooney91/mvc-report/?branch=master"><img src="https://scrutinizer-ci.com/g/Mooney91/mvc-report/badges/quality-score.png?b=main" alt="Scrutinizer Code Quality" /></a></p>

Allt som allt är jag väldigt nöjd med min *Scrutinizer*-poäng (9.98). Det är väldigt tydligt att jag har väldigt låg kodtäckning. Detta beror på att mina controller-klasser och klasser för *Doctrine* inte har testats. Detta sänker mitt genomsnitt mycket. Om man tittar på bilden nedan kan man se att jag har 100% kodtäckning relaterad till mina spelklasser.
image.png

![Code Coverage]({{ asset('img/coverage.png')}})

Som tidigare på *PhpMetrics* har mina kontroller och spel en hög nivå av komplexitet på *Scrutinizer*. DeckOfCards har den högsta nivån av komplexitet. I allmänhet verkar storleken på varje klass vara högre på *Scrutinizer*, men liknande klasser dyker upp igen. Alla utom en av mina filer har A-betyg och det verkar tro att det inte finns några problem med *coupling*.

Om vi tittar på metoden att jag fick betyget "B" på `postPlay()` i `GameController`-klassen, så kan vi se att det är ganska komplext med fem villkor. Det här är en av huvudfunktionerna i mitt spel, vilket gör det svårt att ändra. Eftersom den har hög komplexitet och den inte har testats - har den en mycket hög CRAP-poäng.

Trots det goda betyget identifierade Scrutinizer fem problem med min kod. Två var från filen .php-cs-fixer.dist.php. Typen PhpCsFixer\Finder hittades inte.

En annan bugg (och ett brott mot kodstil) var att en array i `GameController`-klasser returnerade fel typer. Det här är förmodligen ett misstag i min dokumentation.

En annan bugg var att det i min `Player`-klass finns en oanvänd kod - Tilldelningen till $point är död och kan tas bort.

Slutligen finns det en Kernel.php, som kräver en saknad trait. Jag kommer att behöva undersöka hur man ger de saknade egenskaperna som de behöver.

## Förbättringar

Eftersom min kodtäckning enligt Scrutinizer är 28% tycker jag att det är oerhört viktigt att lägga till fler enhetstester inom de områden som jag inte ska testat. Det här kommer att vara utmanande eftersom det inte finns något bra sätt att testa kontroller och repositories är begränsade för att testa. Därför kommer jag att koncentrera mig på klasserna `Library` och `Product` i `App\Entity`. 

Jag kommer också att ta bort alla onödiga kommentarer som dyker upp i min kod. Det här kommer att ha väldigt liten effekt på *Scrutnizer*, men det kommer att göra en skillnad mot PhpMetrics och få min kod att se lite renare ut 

Slutligen kommer jag att försöka fixa problemen som hittades av *Scrutinizer*. Det här kommer förhoppningsvis att ta min poäng från 9,98 till en magnifik 10 (eller 9,99). Jag kommer att fokusera på arrayen av 'GameController' som returnerar "fel" typ och den oanvända koden i klassen 'Player'- men jag måste säkerställa att det här inte bryter något oavsiktligt. Jag kommer också att ta en snabb titt på hur jag kan minska komplexiteten i min GameController för att minimera min CRAP-betyg. 

### Resultat 

Jag kan inte fixa felet `.php-cs-fixer.dist.php` eftersom filen som Scrutinizer hänvisar till nås med autoload - en fil som Scrutinizer inte har tillgång till.

## Diskussion

Att använda dessa verktyg är ganska bra för att visa var det finns potentiella buggar och för att säkerställa att din kod är ren och snygg. När det gäller kodkvalitet kan det hjälpa till att visa om koden är läsbar och underhållbar, men också konsekvent. Linters kan hjälpa till att göra din kod ren och skapa dokumentation för din kod. Till en viss grad kan det visa om koden är testbar, men att använda dessa verktyg kan ha några nackdelar. Även om den visar den potentiella komplexiteten hos din kod och kodtäckning (*coverage*), visar den inte om den är effektiv eller om den fungerar. Det gör det inte om det finns fel eller om det skulle kunna hantera större mängder data. 

PhpMetrics, Scrutinizer och olika linters som finns fungerar mycket bra för att säkerställa ren kod och kodkvalitet. Det som saknas är det mänskliga elementet. Man skulle kunna ha en granskningsprocess på plats så att kollegor kan kontrollera koden. Även om det inte nödvändigtvis är relaterat till *ren kod*, kan det finnas en intern process eller process med klienter/användare där koden testas. 

