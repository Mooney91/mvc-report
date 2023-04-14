<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* report.html.twig */
class __TwigTemplate_650b070136375238094c0adee138600b extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "report.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "report.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "report.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "About";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <h1>Report</h1>

    
    <h2>Redovisning av kursmoment i kursen Databasteknologier för webben</h1>
    
        
    <ul>
        <li><a href=\"#kmom01\">kmom01</a></li>
        <li><a href=\"#kmom02\">kmom02</a></li>
        <li><a href=\"#kmom03\">kmom03</a></li>
        <li><a href=\"#kmom04\">kmom04</a></li>
        <li><a href=\"#kmom05\">kmom05</a></li>
        <li><a href=\"#kmom06\">kmom06</a></li>
        <li><a href=\"#kmom10\">kmom07-10</a></li>
    </ul>
    
    <section>

    <h2 id=\"kmom01\">Kmom01</h2>

    <h3>Berätta kort om dina förkunskaper och tidigare erfarenheter kring objektorientering.</h3> 
    <p>Jag har använt objektorienterad programmering ganska flitigt i år i kurserna fokuserade på Python och Javascript. OOP är ett programmeringsparadigm som fokuserar på skapandet av objekt – och på dessa språk är det genom skapandet av klasser där objekt kan skapas. Metoder kan skapas i klassen så att attributen kan nås eller ändras endast genom dessa fördefinierade metoder (encapsulation). Dessa attribut kan skapas som “public” eller “private”. Objekt kan också ärva metoder och attribut från andra klasser - man kan återanvända attribut och skapa en hierarki.</p>

    <h3>Berätta kort om PHPs modell för klasser och objekt. Vilka är de grunder man behöver veta/förstå för att kunna komma igång och skapa sina första klasser? </h3>
    <p>Man börjar använda \"class\"-nyckelordet för att skapa klassen eller \"new\" för att skapa objektet. Som på många språk kan PHP ha “private”, “protected” och “public” funktioner (metoder). På min rapportsidan har jag använt \"public” funktioner för att rendera webbsidorna (det här påvisar encapsulation.). PHP har också arv. Man kan använda nyckelordet \"extends\" för att ärva egenskaper från en annan klass. Polymorfism är ganska enkelt i PHP, genom att använda/skriva de metoder som man behöver. En subklass kan också \"override\" metoden om det behövs.</p>
    <p>Vi har inte använt klass och objekt mycket än, så många av funktionerna såsom en konstruktor och egenskaper som ofta används i OOP har vi inte använt.</p>

    <h3>Reflektera kort över den kodbas, koden, strukturen som användes till uppgiften me/report, hur uppfattar du den?</h3>
    <p>Jag använde Symfoni för att skapa rapportsidan. Jag har en \"assets\"-mapp som används för att lagra mina style.css- och js-filer och en “public”-mapp som innehåller mina bilder. Den här mappen innehåller också “.htaccess “filen som används när man använder filerna på studentsidan.</p>
    <p>Den viktigaste, när det gäller vad som används regelbundet, är mappen \"templates\" som innehåller de sidor som kommer att renderas. Templaten \"base.html.twig\" används för att skapa en övergripande mall för de andra sidorna. Det har grunden för min head, header och footer.</p>
    <p>Äntligen har jag min Controller-mapp som har min \"ReportController.php\"-fil. I filen skapas en klass som har “public” funktioner som renderar var och en av de olika sidorna och skickar data till dem. Det här är den mest utmanande aspekten av kursmomentet och kommer att diskuteras senare.</p>

    <h3>Med tanke på artikeln “PHP The Right Way”, vilka delar in den finner du extra intressanta och värdefulla? Är det några särskilda områden som du känner att du vill veta mer om? Lyft fram några delar av artikeln som du känner mer värdefulla.</h3>
    <p>Den mest intressanta delen för mig hittills är kapitlet \"Coding Practices\" i synnerhet \"Date and Time\". Det här kapitlet ger flera förslag på hur man använder \"DateTime\", till exempel att hitta intervallet mellan datum med DateInterval. Det finns också en länk till ett kapitel som listar några videohandledningar. Det är videor från alla olika källor, men också en som är länkad direkt till \"PHP The Right Way\". Det här är särskilt användbart om man vill veta ett ämne mer i detalj och vill ha en förklaring. Det finns många delar som jag vill veta mer om, men kapitlet om \"Säkerhet\" skulle vara till nytta. Jag vill veta mer om \"Password Hashing\" och hur PHP kan användas för att göra webbsidan säkrare.</p>

    <h3>Vilken är din TIL för detta kmom?</h3>
    <p>Min TIL från detta kursmoment är controllern. Jag har inte använt det här tidigare och jag har inte renderat webbplatser med PHP. Dessutom har jag inte använt objektorienterad programmering i PHP tidigare. Även om jag inte har använt det och vi introducerades för några nya koncept, kändes det hela bekant eftersom vi har använt liknande teknologier med Javascript och Python.</p>
        
    </section>
    
    <section>

    <h2 id=\"kmom02\">Kmom02</h2>

    <h3>Förklara kort de objektorienterade konstruktionerna arv, komposition, interface och trait och hur de används i PHP.</h3>
    <p>Arv: Det betyder att en klass kan ärva attributer och metoder från en “parent class”. Man använder nyckelordet “extends” efter klassens namn för att ärva från en viss klass. Man kan fortfarande överride” metoderna och attributen från parent-klassen.</p>
    <p>Komposition: Komposition betyder att en klass kan innehålla ett (eller flera) objekt från en annan klass. Man kan skapa en variabel med ett objekt från en annan klass inom klassen och även använda metoderna från den där klassen.</p>
    <p>Interface: Interface innebär att klassen måste uppfylla metoderna som finns i interfacen (men inte nödvändigtvis hur det ska lösa det). Det är liksom en mall för funktionalitet för en klass. Man kan skapa ett interface genom att använda “interface” nyckelordet).</p>
    <p>Trait: PHP har inget stöd för multipel-arv men man kan fortfarande utöka funktionalitet av en klass genom att använda trait. Det är liksom en “kodmodul” men för klasser och klassen kan använda metoderna från trait som om den vore sin egen. Man skapar en trait genom att använda “trait” nyckelordet och man använder en trait inom en klass genom att använda “use” nyckelordet.</p>

    <h3>Berätta om din implementation från uppgiften. Hur löste du uppgiften, är du nöjd/missnöjd, vilken förbättringspotential ser du i din koden och dina klasser?</h3>
    <p>Jag började den här uppgiften med att skapa den övergripande strukturen för kortspel. Jag visste att jag behövde fyra klasser: Card, CardHand, DeckOfCards och CardGraphic. Genom att använda den sista övningen som mall kunde jag anpassa dem efter mina behov. Jag tog lite tid att bestämma mig för hur jag skulle representera mina kort. Jag ville visa korten tydligt och inte bara en strängrepresentation av dem, så jag bestämde mig för att använda UTF-8-koden för varje spelkort. Jag ville också undvika att skapa en lång arraylista, så till slut använde jag tabellen på Wikipedia-sidan \"Playing cards in Unicode\" för att räkna ut en funktion för att skapa en array för spelkorten. Det här var lite knepigt att implementera och eftersom de bara är en enkel \"tecken” kan de inte manipuleras på samma sätt som en bild kan. I nästa kursmoment vill jag ändra mina spelkort till riktiga bilder av korten.</p>  
    <p>Nästa steg var att skapa mina rutter. Återigen skapade jag den övergripande strukturen och testade varje webbplats för att se om de fungerade. Jag skapade sedan steg för steg varje rutt när jag implementerade funktionaliteten för varje krav. Mina templater fyllde jag i på ungefär samma sätt, men jag försökte göra dessa så enkla som möjligt och att behålla det mesta av koden i klasserna och på rutterna.  Som helhet är jag nöjd med resultatet, men jag vill ha lite feedback för att se om jag har genomfört det här på det mest effektiva sättet.</p>

    <h3>Berätta hur det kändes att modellera ett kortspel med flödesdiagram och psuedokod. Var det något som du tror stödjer dig i din problemlösning och tankearbete för att strukturera koden kring en applikation?</h3>
    <p>Eftersom vi hade skapat ett UML-diagram i en av våra tidigare kurser kände jag mig ganska bekväm med att skapa det. Att skapa ett av dessa diagram är alltid en bra övning för att se hur man kan börja ett projekt och samla sina tankar om en uppgift. Man kan sedan visualisera i sitt huvud hur flödet av projektet skulle kunna se ut. Tyvärr hade jag lämnat den här delen ganska sent och jag hade velat ha skapat den här från början - jag var för ivrig och ville dumt nog börja skriva min kod så snart som möjligt. Pseudokod, även om den inte kan implementeras direkt, är också ett bra sätt att strukturera sina tankar och att koncentrera sig på de delar som kan implementeras först och för att visa funktionens potentiella flöde. Jag använder pseudokod ganska mycket i mitt arbete, så jag kan se helheten i uppgiften innan den ens har skrivits.</p>

    <h3>Vilken är din TIL för detta kmom?</h3>
    <p>Jag har lärt mig mycket av det här kursmomentet. Det tog ett tag för mig att komma igång med den här kursen, men jag känner nu till och känner mig bekant med Symfonys struktur och hur varje del - rutten, klasserna och templater samverkar för att skapa något. Den har också samlat bregrepp från tidigare kurser. Det var också mycket fördelaktigt att lära sig mer om Git och hur man skriver commit-meddelanden. Även om det kan tyckas vara en enkel sak att göra, vet jag från mitt eget arbete att commit-meddelanden kan vara väldigt ogenomskinliga och otydliga. Det är också bra att ha en \"standard\" form som man följer.</p>
    </section>


";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "report.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}About{% endblock %}

{% block body %}
    <h1>Report</h1>

    
    <h2>Redovisning av kursmoment i kursen Databasteknologier för webben</h1>
    
        
    <ul>
        <li><a href=\"#kmom01\">kmom01</a></li>
        <li><a href=\"#kmom02\">kmom02</a></li>
        <li><a href=\"#kmom03\">kmom03</a></li>
        <li><a href=\"#kmom04\">kmom04</a></li>
        <li><a href=\"#kmom05\">kmom05</a></li>
        <li><a href=\"#kmom06\">kmom06</a></li>
        <li><a href=\"#kmom10\">kmom07-10</a></li>
    </ul>
    
    <section>

    <h2 id=\"kmom01\">Kmom01</h2>

    <h3>Berätta kort om dina förkunskaper och tidigare erfarenheter kring objektorientering.</h3> 
    <p>Jag har använt objektorienterad programmering ganska flitigt i år i kurserna fokuserade på Python och Javascript. OOP är ett programmeringsparadigm som fokuserar på skapandet av objekt – och på dessa språk är det genom skapandet av klasser där objekt kan skapas. Metoder kan skapas i klassen så att attributen kan nås eller ändras endast genom dessa fördefinierade metoder (encapsulation). Dessa attribut kan skapas som “public” eller “private”. Objekt kan också ärva metoder och attribut från andra klasser - man kan återanvända attribut och skapa en hierarki.</p>

    <h3>Berätta kort om PHPs modell för klasser och objekt. Vilka är de grunder man behöver veta/förstå för att kunna komma igång och skapa sina första klasser? </h3>
    <p>Man börjar använda \"class\"-nyckelordet för att skapa klassen eller \"new\" för att skapa objektet. Som på många språk kan PHP ha “private”, “protected” och “public” funktioner (metoder). På min rapportsidan har jag använt \"public” funktioner för att rendera webbsidorna (det här påvisar encapsulation.). PHP har också arv. Man kan använda nyckelordet \"extends\" för att ärva egenskaper från en annan klass. Polymorfism är ganska enkelt i PHP, genom att använda/skriva de metoder som man behöver. En subklass kan också \"override\" metoden om det behövs.</p>
    <p>Vi har inte använt klass och objekt mycket än, så många av funktionerna såsom en konstruktor och egenskaper som ofta används i OOP har vi inte använt.</p>

    <h3>Reflektera kort över den kodbas, koden, strukturen som användes till uppgiften me/report, hur uppfattar du den?</h3>
    <p>Jag använde Symfoni för att skapa rapportsidan. Jag har en \"assets\"-mapp som används för att lagra mina style.css- och js-filer och en “public”-mapp som innehåller mina bilder. Den här mappen innehåller också “.htaccess “filen som används när man använder filerna på studentsidan.</p>
    <p>Den viktigaste, när det gäller vad som används regelbundet, är mappen \"templates\" som innehåller de sidor som kommer att renderas. Templaten \"base.html.twig\" används för att skapa en övergripande mall för de andra sidorna. Det har grunden för min head, header och footer.</p>
    <p>Äntligen har jag min Controller-mapp som har min \"ReportController.php\"-fil. I filen skapas en klass som har “public” funktioner som renderar var och en av de olika sidorna och skickar data till dem. Det här är den mest utmanande aspekten av kursmomentet och kommer att diskuteras senare.</p>

    <h3>Med tanke på artikeln “PHP The Right Way”, vilka delar in den finner du extra intressanta och värdefulla? Är det några särskilda områden som du känner att du vill veta mer om? Lyft fram några delar av artikeln som du känner mer värdefulla.</h3>
    <p>Den mest intressanta delen för mig hittills är kapitlet \"Coding Practices\" i synnerhet \"Date and Time\". Det här kapitlet ger flera förslag på hur man använder \"DateTime\", till exempel att hitta intervallet mellan datum med DateInterval. Det finns också en länk till ett kapitel som listar några videohandledningar. Det är videor från alla olika källor, men också en som är länkad direkt till \"PHP The Right Way\". Det här är särskilt användbart om man vill veta ett ämne mer i detalj och vill ha en förklaring. Det finns många delar som jag vill veta mer om, men kapitlet om \"Säkerhet\" skulle vara till nytta. Jag vill veta mer om \"Password Hashing\" och hur PHP kan användas för att göra webbsidan säkrare.</p>

    <h3>Vilken är din TIL för detta kmom?</h3>
    <p>Min TIL från detta kursmoment är controllern. Jag har inte använt det här tidigare och jag har inte renderat webbplatser med PHP. Dessutom har jag inte använt objektorienterad programmering i PHP tidigare. Även om jag inte har använt det och vi introducerades för några nya koncept, kändes det hela bekant eftersom vi har använt liknande teknologier med Javascript och Python.</p>
        
    </section>
    
    <section>

    <h2 id=\"kmom02\">Kmom02</h2>

    <h3>Förklara kort de objektorienterade konstruktionerna arv, komposition, interface och trait och hur de används i PHP.</h3>
    <p>Arv: Det betyder att en klass kan ärva attributer och metoder från en “parent class”. Man använder nyckelordet “extends” efter klassens namn för att ärva från en viss klass. Man kan fortfarande överride” metoderna och attributen från parent-klassen.</p>
    <p>Komposition: Komposition betyder att en klass kan innehålla ett (eller flera) objekt från en annan klass. Man kan skapa en variabel med ett objekt från en annan klass inom klassen och även använda metoderna från den där klassen.</p>
    <p>Interface: Interface innebär att klassen måste uppfylla metoderna som finns i interfacen (men inte nödvändigtvis hur det ska lösa det). Det är liksom en mall för funktionalitet för en klass. Man kan skapa ett interface genom att använda “interface” nyckelordet).</p>
    <p>Trait: PHP har inget stöd för multipel-arv men man kan fortfarande utöka funktionalitet av en klass genom att använda trait. Det är liksom en “kodmodul” men för klasser och klassen kan använda metoderna från trait som om den vore sin egen. Man skapar en trait genom att använda “trait” nyckelordet och man använder en trait inom en klass genom att använda “use” nyckelordet.</p>

    <h3>Berätta om din implementation från uppgiften. Hur löste du uppgiften, är du nöjd/missnöjd, vilken förbättringspotential ser du i din koden och dina klasser?</h3>
    <p>Jag började den här uppgiften med att skapa den övergripande strukturen för kortspel. Jag visste att jag behövde fyra klasser: Card, CardHand, DeckOfCards och CardGraphic. Genom att använda den sista övningen som mall kunde jag anpassa dem efter mina behov. Jag tog lite tid att bestämma mig för hur jag skulle representera mina kort. Jag ville visa korten tydligt och inte bara en strängrepresentation av dem, så jag bestämde mig för att använda UTF-8-koden för varje spelkort. Jag ville också undvika att skapa en lång arraylista, så till slut använde jag tabellen på Wikipedia-sidan \"Playing cards in Unicode\" för att räkna ut en funktion för att skapa en array för spelkorten. Det här var lite knepigt att implementera och eftersom de bara är en enkel \"tecken” kan de inte manipuleras på samma sätt som en bild kan. I nästa kursmoment vill jag ändra mina spelkort till riktiga bilder av korten.</p>  
    <p>Nästa steg var att skapa mina rutter. Återigen skapade jag den övergripande strukturen och testade varje webbplats för att se om de fungerade. Jag skapade sedan steg för steg varje rutt när jag implementerade funktionaliteten för varje krav. Mina templater fyllde jag i på ungefär samma sätt, men jag försökte göra dessa så enkla som möjligt och att behålla det mesta av koden i klasserna och på rutterna.  Som helhet är jag nöjd med resultatet, men jag vill ha lite feedback för att se om jag har genomfört det här på det mest effektiva sättet.</p>

    <h3>Berätta hur det kändes att modellera ett kortspel med flödesdiagram och psuedokod. Var det något som du tror stödjer dig i din problemlösning och tankearbete för att strukturera koden kring en applikation?</h3>
    <p>Eftersom vi hade skapat ett UML-diagram i en av våra tidigare kurser kände jag mig ganska bekväm med att skapa det. Att skapa ett av dessa diagram är alltid en bra övning för att se hur man kan börja ett projekt och samla sina tankar om en uppgift. Man kan sedan visualisera i sitt huvud hur flödet av projektet skulle kunna se ut. Tyvärr hade jag lämnat den här delen ganska sent och jag hade velat ha skapat den här från början - jag var för ivrig och ville dumt nog börja skriva min kod så snart som möjligt. Pseudokod, även om den inte kan implementeras direkt, är också ett bra sätt att strukturera sina tankar och att koncentrera sig på de delar som kan implementeras först och för att visa funktionens potentiella flöde. Jag använder pseudokod ganska mycket i mitt arbete, så jag kan se helheten i uppgiften innan den ens har skrivits.</p>

    <h3>Vilken är din TIL för detta kmom?</h3>
    <p>Jag har lärt mig mycket av det här kursmomentet. Det tog ett tag för mig att komma igång med den här kursen, men jag känner nu till och känner mig bekant med Symfonys struktur och hur varje del - rutten, klasserna och templater samverkar för att skapa något. Den har också samlat bregrepp från tidigare kurser. Det var också mycket fördelaktigt att lära sig mer om Git och hur man skriver commit-meddelanden. Även om det kan tyckas vara en enkel sak att göra, vet jag från mitt eget arbete att commit-meddelanden kan vara väldigt ogenomskinliga och otydliga. Det är också bra att ha en \"standard\" form som man följer.</p>
    </section>


{% endblock %}", "report.html.twig", "/home/mooney/dbwebb-kurser/mvc/me/report/templates/report.html.twig");
    }
}
