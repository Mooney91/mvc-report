<h2 id="kmom06">Kmom06</h2>

### Hur uppfattade du verktyget phpmetrics och fann du några särskilda bitar mer värdefulla än andra? Var det några särskilda metrics eller bilder du uppskattade? 

Det var den första gången jag använde automatiserad testning så jag var mycket glad över att se statistiken att *PhpMetrics * visar. Det ger mycket värdefulla data som kan användas för att analysera din kod. Jag anser att det förmodligen ger lite för mycket data för nybörjaren och man behöver en mycket djup förståelse för vad de olika fälten betyder. Även för en expert skulle man troligen behöva titta på dokumentationen för att ha en tydlig förståelse för hur de olika värdena beräknas. Det är bra att se hur varje klass jämförs med varandra, men ibland kan det här ge en felaktig bild av din kod eller så kan det vara värdelöst i din analys. När man arbetar med ett program med många olika klasser de uppnår och gör olika saker. Det är svårt att jämföra dessa klasser. 

Å andra sidan tyckte jag att sektionen om *Coupling* (både *afferent* och *efferent*) var mycket intressant och ger dig några tydliga data att reflektera över. Jag kunde se att jag använde den för att omfaktorisera min kod eller för att fokusera min uppmärksamhet på en viss klass. 

### Berätta hur det gick att integrera med Scrutinizer och vilken är din första känsla av verktyget och dess badges? Vilken kodtäckning och kodkvalitet fick du efter första bygget? 

Det tog mig ett tag att integrera min kod med *Scrutinizer* eftersom jag hade ett fel angående en saknad `PHP\TextUI\Application`-klass. Det måste ha varit en form av bugg eftersom det enda sättet jag kunde lösa det var att ta bort min `phpunit.xml`-fil och klistra in innehållet igen. Jag fick sedan ett fel som handlade om hur Scrutinizer fungerar med PHP 8.1. Det här löste jag genom att lägga till `image: default-bionic` till min `.scrutinizer.yml`-fil. 

Att integrera med din Git-repo är en fantastisk funktion eftersom Scrutinizer just kan existera passivt i bakgrunden medan man arbetar med sin kod. Jag tyckte att sidan inte var så intuitiv som den kunde vara, men den visar mycket tydligare var buggar och fel kan hittas.  

Jag är ett stort fan av *badges*. Utan sammanhang är de svåra att tolka men de är ett tecken på kodkvalitet. Jag tycker att de skulle dra nytta av att lägga till ytterligare *badges* eller möjligheten att skapa *badges* för ett visst *namespace*. 

Efter det första bygget kunde jag nå poängen 9,98, vilket jag var mycket nöjd med. Jag hade bara 28% kodtäckning eftersom det här inte inkluderade mina `Controllers` och några av de andra projekt som vi har arbetat med. Det här inkluderade bara kortspelet som vi hade arbetat med. 

### Hur är din egen syn på kodkvalitet, berätta lite om den? Tror du man kan man påvisa kodkvalitet i någon viss mån med badges eller vad tror du? 

Jag anser att kodkvalitet kan vara en kombination av många olika aspekter såsom läsbarhet, underhållsbarhet och hur coden är dokumenterad. *Scrutinizer* och *PhpMetrics* klarar sig bra när det gäller att visa koppling och komplexitet i koden, vilket är viktiga aspekter. Det är tydligt att man behöver många verktyg för att uppmuntra och analysera kodkvalitet. Som jag diskuterade lite tidigare tycker jag att *badges* är väldigt bra om de är mätbara på något sätt. De måste vara tydliga vad de menar. Utan kunskap säger *Scrutinizer*-betyget inte omedelbart vad det betyder. Jag tycker att det är ett bra sätt att uppmuntra utvecklare att skriva bättre kod eftersom det är ett roligt sätt att försöka få de “gröna” *badges*. 

### Vilken är din TIL för detta kmom?  

Jag lärde mig hur man kan skapa automatiska tester för min kod och hur de kan användas för att analysera min kod. Jag gillade särskilt hur *Scrutinizer* kan kopplas till din Git-repo. Jag lärde mig också hur man lägger till markdown-filer till din twig-template. Lyckligtvis kan jag använda denna nyfunna kunskap för den här rapporten såväl som i slutprojektet. 

 

 