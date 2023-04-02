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
    <p>Jag har använt objektorienterad programmering ganska flitigt i år i kurserna fokuserade på Python och Javascript. OOP är ett programmeringsparadigm som fokuserar på skapandet av objekt – och på dessa språk är det genom skapandet av klasser som objekt kan skapas. Metoder kan skapas i klassen så att attributen kan nås eller ändras endast genom dessa fördefinierade metoder (encapsulation). Dessa attribut kan skapas som “public” eller “private”. Objekt kan också ärva metoder och attribut från andra klasser - man kan återanvända attribut och skapa en hierarki.</p>

    <h3>Berätta kort om PHPs modell för klasser och objekt. Vilka är de grunder man behöver veta/förstå för att kunna komma igång och skapa sina första klasser? </h3>
    <p>Man börjar använda \"class\"-nyckelordet för att skapa klassen eller \"new\" för att skapa objektet. Som på många språk kan PHP ha “private”, “protected” och “public” funktioner (metoder). På min rapportsidan har jag använt \"public” funktioner för att rendera webbsidorna (det här påvisar encapsulation.). PHP har också arv. Man kan använda nyckelordet \"extends\" för att ärva egenskaper från en annan klass. Polymorfism är ganska enkelt i PHP, genom att använda/skriva de metoder som man behöver. En subklass kan också \"override\" metoden om det behövs.</p>
    <p>Vi har inte använt klass och objekt mycket än, så många av funktionerna såsom en konstruktor och egenskaper som ofta används i OOP har vi inte använt.</p>

    <h3>Reflektera kort över den kodbas, koden, strukturen som användes till uppgiften me/report, hur uppfattar du den?</h3>
    <p>Jag använde Symfoni för att skapa rapportsidan. Jag har en \"assets\"-mapp som används för att lagra mina style.css- och js-filer och en “public”-mapp som innehåller mina bilder. Den här mappen innehåller också “.htaccess “filen som används när man använder filerna på studentsidan.</p>
    <p>Den viktigaste, när det gäller vad som används regelbundet, är mappen \"templates\" som innehåller de sidor som kommer att renderas.  Templaten \"base.html.twig\" används för att skapa en övergripande mall för de andra sidorna. Det har grunden för min head,  header och footer.</p>
    <p>Äntligen har jag min Controller-mapp som har min \"ReportController.php\"-fil. I filen skapas en klass som har “public” funktioner som renderar var och en av de olika sidorna och skickar data till dem. Det här är den mest utmanande aspekten av kursmomentet och kommer att diskuteras senare.</p>

    <h3>Med tanke på artikeln “PHP The Right Way”, vilka delar in den finner du extra intressanta och värdefulla? Är det några särskilda områden som du känner att du vill veta mer om? Lyft fram några delar av artikeln som du känner mer värdefulla.</h3>
    <p>Den mest intressanta delen för mig hittills är kapitlet \"Coding Practices\" i synnerhet \"Date and Time\". Det här kapitlet ger flera förslag på hur man använder \"DateTime\", till exempel att hitta intervallet mellan datum med DateInterval. Det finns också en länk till ett kapitel som listar några videohandledningar. Det är videor från alla olika källor, men också en som är länkad direkt till \"PHP The Right Way\". Det här är särskilt användbart om man vill veta ett ämne mer i detalj och vill ha en förklaring. Det finns många delar som jag vill veta mer om, men kapitlet om \"Säkerhet\" skulle vara till nytta. Jag vill veta mer om \"Password Hashing\" och hur PHP kan användas för att göra webbsidan säkrare.</p>

    <h3>Vilken är din TIL för detta kmom?</h3>
    <p>Min TIL från detta kursmoment är controllern. Jag har inte använt det här tidigare och jag har inte renderat webbplatser med PHP. Dessutom har jag inte använt objektorienterad programmering i PHP tidigare. Även om jag inte har använt det och vi introducerades för några nya koncept, kändes det hela bekant eftersom vi har använt liknande teknologier med Javascript och Python.</p>
        
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
    <p>Jag har använt objektorienterad programmering ganska flitigt i år i kurserna fokuserade på Python och Javascript. OOP är ett programmeringsparadigm som fokuserar på skapandet av objekt – och på dessa språk är det genom skapandet av klasser som objekt kan skapas. Metoder kan skapas i klassen så att attributen kan nås eller ändras endast genom dessa fördefinierade metoder (encapsulation). Dessa attribut kan skapas som “public” eller “private”. Objekt kan också ärva metoder och attribut från andra klasser - man kan återanvända attribut och skapa en hierarki.</p>

    <h3>Berätta kort om PHPs modell för klasser och objekt. Vilka är de grunder man behöver veta/förstå för att kunna komma igång och skapa sina första klasser? </h3>
    <p>Man börjar använda \"class\"-nyckelordet för att skapa klassen eller \"new\" för att skapa objektet. Som på många språk kan PHP ha “private”, “protected” och “public” funktioner (metoder). På min rapportsidan har jag använt \"public” funktioner för att rendera webbsidorna (det här påvisar encapsulation.). PHP har också arv. Man kan använda nyckelordet \"extends\" för att ärva egenskaper från en annan klass. Polymorfism är ganska enkelt i PHP, genom att använda/skriva de metoder som man behöver. En subklass kan också \"override\" metoden om det behövs.</p>
    <p>Vi har inte använt klass och objekt mycket än, så många av funktionerna såsom en konstruktor och egenskaper som ofta används i OOP har vi inte använt.</p>

    <h3>Reflektera kort över den kodbas, koden, strukturen som användes till uppgiften me/report, hur uppfattar du den?</h3>
    <p>Jag använde Symfoni för att skapa rapportsidan. Jag har en \"assets\"-mapp som används för att lagra mina style.css- och js-filer och en “public”-mapp som innehåller mina bilder. Den här mappen innehåller också “.htaccess “filen som används när man använder filerna på studentsidan.</p>
    <p>Den viktigaste, när det gäller vad som används regelbundet, är mappen \"templates\" som innehåller de sidor som kommer att renderas.  Templaten \"base.html.twig\" används för att skapa en övergripande mall för de andra sidorna. Det har grunden för min head,  header och footer.</p>
    <p>Äntligen har jag min Controller-mapp som har min \"ReportController.php\"-fil. I filen skapas en klass som har “public” funktioner som renderar var och en av de olika sidorna och skickar data till dem. Det här är den mest utmanande aspekten av kursmomentet och kommer att diskuteras senare.</p>

    <h3>Med tanke på artikeln “PHP The Right Way”, vilka delar in den finner du extra intressanta och värdefulla? Är det några särskilda områden som du känner att du vill veta mer om? Lyft fram några delar av artikeln som du känner mer värdefulla.</h3>
    <p>Den mest intressanta delen för mig hittills är kapitlet \"Coding Practices\" i synnerhet \"Date and Time\". Det här kapitlet ger flera förslag på hur man använder \"DateTime\", till exempel att hitta intervallet mellan datum med DateInterval. Det finns också en länk till ett kapitel som listar några videohandledningar. Det är videor från alla olika källor, men också en som är länkad direkt till \"PHP The Right Way\". Det här är särskilt användbart om man vill veta ett ämne mer i detalj och vill ha en förklaring. Det finns många delar som jag vill veta mer om, men kapitlet om \"Säkerhet\" skulle vara till nytta. Jag vill veta mer om \"Password Hashing\" och hur PHP kan användas för att göra webbsidan säkrare.</p>

    <h3>Vilken är din TIL för detta kmom?</h3>
    <p>Min TIL från detta kursmoment är controllern. Jag har inte använt det här tidigare och jag har inte renderat webbplatser med PHP. Dessutom har jag inte använt objektorienterad programmering i PHP tidigare. Även om jag inte har använt det och vi introducerades för några nya koncept, kändes det hela bekant eftersom vi har använt liknande teknologier med Javascript och Python.</p>
        
    </section>
    



{% endblock %}", "report.html.twig", "/home/mooney/dbwebb-kurser/mvc/me/report/templates/report.html.twig");
    }
}
