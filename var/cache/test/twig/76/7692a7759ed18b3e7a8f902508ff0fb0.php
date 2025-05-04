<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* report.html.twig */
class __TwigTemplate_613ba043a5cd782a09b993562b744cb8 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "report.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "report.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "report.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Rapport";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "    <select id=\"kmom\" aria-label=\"kmom\" onChange=\"window.document.location.href=this.options[this.selectedIndex].value;\">
        <option value=\"#navbar\">topp</option>
        <option value=\"#kmom01\">km01</option>
        <option value=\"#kmom02\">km02</option>
        <option value=\"#kmom03\">km03</option>
        <option value=\"#kmom04\">km04</option>
        <option value=\"#kmom05\">km05</option>
        <!-- option value=\"#kmom06\">km06</option>
        <option value=\"#kmom10\">km10</option -->
    </select>
    <h1>Rapport</h1>
    <section class=\"two-columns\" id=\"kmom06\">
        <h2>Kmom06</h2>
        <p class=\"initcap\">Metrik är ämnet för detta kursmoment, vars huvudsakliga <a href=\"";
        // line 19
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("metrics");
        yield "\">rapport</a> publiceras separat. Tvenne verktyg brukas primärt, varav det ena utgörs av <strong>PhpMetrics</strong>, med en diger ansamling mätmetoder. Första körningen gav sex varningar, varav två utgjordes av svårbegripliga «package violations» och fyra ansågs vara klasser som är «probably bugged» på grund av komplexitetsgraden. Förmodligen är det en rimlig skattning, som ligger i linje med min egen tidigare redovisade ståndpunkt, särskilt avseende poängberäkning i kort- och spelklasserna</p>
        <p>Grafiskt kommer det till uttryck i ett diagram av färgade cirklar i trafikljusets palett, varvid den stora klassen <code>GameActions</code> för «21» är ett rött skynke tillsammans med dess kontrollerklass, tätt följt av <code>HandScore</code> med dess villkorsfyllda rutiner. Det är från början givet var krutet ska läggas, och på så vis fyller instrumentet sin funktion.
        <figure>
            <img src=\"";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/metrics/phpmetrics-scrutinizer.avif"), "html", null, true);
        yield "\" width=\"1356\" alt=\"Scrutinizer och PhpMetrics\">
        </figure>
        <p>Motsvarande körning med <strong>Scrutinizer</strong> gav som resultat «passed» för «build», 100&nbsp;% för täckning (vilket redan var känt) samt 9.89 för «Scrutinizer». Inte så pjåkigt. Verktyget fann fem punkter, bland annat outnyttjade variabler (som linten inte upptäckte) jämte en del udda problem, varav två härrör till extern kod. Sex metoder fick betyg B, medan resten samt alla klasser nådde A. Strävan här är förstås den perfekta tian, men i huvudsak är detta moment redan avklarat. Scrutinizer berättar dessutom hur man kan gå till väga för att åtgärda berörda problem.</p>
        <p>Den egna personliga hållningen är att kodkvalitet i någon mening är avgörande för att kunna hålla större system vid god kvalitet och i underhållbarbart skick. <em>Bloat</em> och buggar är ofelbara konsekvenser när man tappar kontrollen över en stor kodmassa, men då är det redan försent, och man måste skriva om kodbasen från början.</p>
        <p>För egen del är PHPStan ett uppskattat verktyg för att hålla ordning på typer och vilka data man skyfflar runt, och den arsenalen har nu vidgats med ytterligare några värdefulla instrument (TIL). Samtidigt måste sägas att det lätt kan bli lite av en fix idé att jaga poäng, tid och resurser som man istället hade kunnat använda på verklig kodning och kreativa lösningar.</p>
        <figure>
            <img src=\"";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/chihiro-kmom06.avif"), "html", null, true);
        yield "\" width=\"1536\" alt=\"Chihiro förbättrar kodens kvalitet\">
        </figure>
    </section>
    <section class=\"two-columns\" id=\"kmom05\">
        <h2>Kmom05</h2>
        <p class=\"initcap\">Objekt-relationell mappning (ORM) avhandlas via Doctrine i Symfony, kanske mest för att illustrera ännu ett koncept relaterat till databaser. I själva verket vinner man nog inte så mycket på en dylik abstraktion, eftersom man ändå måste ha detaljkännedom om sina tabeller och komma åt data via SQL-liknande satser. Även i andra modeller har man objektorientering på sista raden i PHP via getters, setters och andra mekanismer. MariaDB? <em>Defeats the purpose.</em></p>
        <p>Till yttermera visso tillkommer onödig abstraktion, exempelvis för att uppdatera tabeller, även om det blir lite mindre kod att hantera. Det är inte troligt att förstahandsvalet faller på ORM i någon som helst tillämpning.</p>
        <p>Givet databasens litenhet fordrades ändå en hel del arbete för att få funktionaliteten på plats, kanske mest för att få det att passa med Symfonys gränssnitt. Men CRUD är CRUD, om än i annan tappning, och efter en del inledande svårigheter gick det relativt enkelt att bygga biblioteket.</p>
        <p>För ändamålet kopierades konceptet från den tidigare kortleksmodellen, med en inre twigmall omfattande en inre meny för att få ett enhetligt gränssnitt för biblioteket. En centrerad vy med tabeller för boklistor, enskilda böcker och formulär definierar biblioteket, tillsammans med en frontsida. Enskilda detaljvyer har försetts med ytterligare navigering till nästa och föregående objekt.</p>
        <p>Då filuppladdning inte fungerar på studentservern skippas den biten – utöver att det skulle ta ytterligare tid i anspråk – och av det skälet kan bilder inte hanteras i nuvarande version. Man får nöja sig med att ange titel, författare och ISBN för verken, för vilka en generisk bild definieras i förekommande fall. Grundläggande felhantering och kontroller i formulär har implementerats.</p>
        <p>Denna gång har aspekter av testning funnits med från första stund, men det mest komplexa återfinns alltjämt i kontrollklasserna, som här egentligen är de enda klasserna av relevans. För att kunna testa metoder som förändrar databasen nyttjas en fristående testdatabas (angiven i <code>.env.test.local</code>) för att inte förstöra något i den ordinarie databasen. Därmed kan en återställning först göras, på det att exakta data är kända för ID med mera. Alternativet med mockning är inte så givande i denna enkla modell, eftersom metoderna är få.</p>
        <figure>
            <img src=\"";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/chihiro-kmom05.avif"), "html", null, true);
        yield "\" width=\"1536\" alt=\"Chihiro knåpar ORM\">
        </figure>
    </section>
    <section class=\"two-columns\" id=\"kmom04\">
        <h2>Kmom04</h2>
        <p class=\"initcap\">Enhetstestning med PHPUnit och Xdebug introduceras, tillsammans med automatisk dokumentation via PHPDoc. Här noteras att verktygen i fråga ligger en generation efter aktuell PHP-version (8.6.4), vilket fordrar en del åtgärder för att slippa onödig felrapportering.</p>
        <p>Själva förfarandet att skriva enhetstester följer samma mall som i Python och andra språk, och bereder inga större svårigheter i grunden. Däremot kan det vara en del arbete att samtidigt få testkoden att samspela med PHPStan och andra linters, samt förstås att formulera tester för en mängd klasser och metoder.</p>
        <p>Hundra procent täckning uppnås förvisso i testerna, men till priset av att någon enstaka funktion fick modifieras och någon läggas till. Specifikt befanns vara nödvändigt att ordna en metod <code>emptyDeck()</code> i klassen <code>Deck</code> för att kunna lägga till enstaka kort i en tom kortlek. Detta för att kunna simulera situationer med given utgång, exempelvis att bank eller spelare vinner eller förlorar med säkerhet. Mockning kunde här inte användas för ändamålet.</p>
        <p>Svårast att testa var inte oväntat mer komplex kod, särskilt kedjad sådan utan returnerade resultat. I metoden för poängberäkning upptäcktes faktiskt en bugg tack vare testningen, vilket visar att den har potential att förbättra kod. Givet att man har testning i bakhuvudet redan i ett tidigt skede kan det hända att man vinnlägger sig om att skriva renare och mindre komplex kod, en erfarenhet man gott kan ta med sig från momentet (TIL).</p>
        <p>Däremot är det osäkert om enhetstestning ger «snyggare» kod. Upplevelsen här är att PHPStan är det primära verktyget för att ordna både logiskt felfri och snygg kod, men det kan hända att testbarheten bidrar en smula.</p>
        <p>Enhetstestning är inte heller ett universalverktyg. Med en hammare ska man inte dra i skruv, och på samma sätt är det föga givande att enhetstesta sådant som controllers i ramverket. Funktionella tester är i regel bättre för sådana klasser, varvid vi <a href=\"https://symfony.com/doc/current/testing.html#application-tests\">nyttjar</a> Symfonys utvidgning <code>WebTestCase</code> för att testa router och i förekommande fall vissa egenskaper som sessionsvariabler.</p>
        <p>Summa summarum nås därmed hundra procent täckning även för controllerklasserna, om än av begränsat värde. Tillsammans med felfri lint via PHPStan och PHPMD föreligger därför förhoppningsvis en någorlunda god kodbas.</p>
        <figure>
            <img src=\"";
        // line 53
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/chihiro-kmom04.avif"), "html", null, true);
        yield "\" width=\"1536\" alt=\"Chihiro enhetstestar\">
        </figure>
    </section>
    <section class=\"two-columns\" id=\"kmom03\">
        <h2>Kmom03</h2>
        <p class=\"initcap\">Introduktion av PHPStan och PHP Mess Detector gör att kortklasserna i tidigare kursmoment behöver refaktoreras, samtidigt som de vässas med större mått av inkapsling. Detta är hemmaplan, och nu börjar det likna riktig programmering med erforderlig stringens.</p>
        <p>Konstruktion av flödesdiagram, pesudokod och UML-diagram av klasser som angreppsvektor för problemet är en rimlig ansats. På så sätt kan man få en grundläggande struktur för kodbasen, observera repetitiv kod som kan förläggas i metoder samt avslöja en del tankefel kring den mentala konstruktionen av modellen. Därmed inte sagt att man får en fullständig bild av problemkomplext med sådan modellering, men det är en bra början.</p>
        <p>Klassen <code>Banker</code> befanns småningom vara överflödig, eftersom det är en spelare i mängden med samma slags metoder. Ett fält med <code>Player</code> definierar istället de två spelarna, och kan enkelt byggas ut till fler. Här räcker det att hålla koll på respektive spelare med index.</p>
        <p>Mallarna ska vara dumma, men det blir ändå ett antal <code>if</code>-satser för att hålla reda på knappar i olika tillstånd. Den huvudsakliga logiken sker ändå i klasserna, med bara ett fåtal rutter som alla ryms i en enda klass <code>GameController</code>. Mallarna renderas uteslutande med sessionsvariabler.</p>
        <p>Huvudlogiken finns i <code>GameActions</code>, som ärver magiska getters och setters samt konstanter från föräldraklassen <code>Game</code>. Spelarens aktioner styrs av knappar och inmatning i formulär, medan bankens motsvarande flöde automatiseras.</p>
        <p>Svåraste moment är kanske något överraskande metoder för att beräkna poängsumma (klassen <code>HandScore</code>) samt sannolikheter för att bli tjock, där bruket av två jokrar ökar komplexiteten med en ordning.</p>
        <h3>Om MVC</h3>
        <p>MVC som designmönster är väl i sin ordning, men ramverken är ofta alldeles för rigida. Symfony tycks dock lira bra med PHPStan, vilket är en fördel, inte minst i att hantera sessionsvariabler. Med ramverk är det så att man blir ordentligt fastlåst i en viss ordning, en löpande bandsprincip som passar industrin väl men samtidigt missgynnar mer kreativa angreppsmetoder.</p>
        <p>En intressant egenskap med Symfony är stödet för generella getters/setters via magiska metoder <code>__get()</code><code>__isset()</code> och <code>__set()</code>, vilket reducerar kodmassan en del, inte minst antalet publika metoder. Twig kan då hämta privata egenskaper via dessa metoder, utan att man behöver synliggöra dem.</p>
        <p>TIL är nog att nyttja inkapsling bättre i klasserna, inte minst för att så mycket skräp annars skickas runt i komposition och arv. Mycket givande kurs.</p>
        <p>Alla obligatoriska och valfria moment är implementerade per specifikation. Inga fel noteras med PHPStan, PHPMD eller PHP CS Fixer.</p>
        <figure>
            <img src=\"";
        // line 70
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/chihiro-kmom03.avif"), "html", null, true);
        yield "\" width=\"1536\" alt=\"Chihiro bekantar sig med magiska metoder\">
        </figure>
    </section>
    <section class=\"two-columns\" id=\"kmom02\">
        <h2>Kmom02</h2>
        <p class=\"initcap\">Grunden till ett kortspel implementeras här i objektorienterad PHP under ramverket Symfony och med Twig som motor. Arv, komposition, aggregation, gränssnitt och egenskaper definieras teoretiskt, och ansluter i stort till tidigare stoff i Python.</p>
        <p>Med arv (inheritance) menas här snarare en utvidgning av en föräldraklass till en barnklass, i vilken ytterligare metoder, konstanter och attribut kan definieras. I förekommande fall kan befintliga konstanter och metoder omdefinieras eller öppnas upp mot omvärlden (men inte omvänt).</p>
        <p>Komposition är en klass i en klass, det vill säga klassvis instantiering av en yttre klass. Gränssnitt definierar vi som ett «kontrakt» för en klass, det vill säga en mall för metoder utan specifik implementering, vilket är till nytta för att definiera API:n till brukare.</p>
        <p>Egenskaper (traits) är mer en form av syntaktiskt lim, ofta förekommande kod som kan klistras in efter behag via <code>use</code> och då får en självständig roll i förhållande till den omgivande klassen. Egenskaper kan ofta vara ett alternativ till onödigt krånglig komposition av en miljard klasser.</p>
        <p>För uppgiften i fråga används varken egenskaper eller gränssnitt, men däremot nyttjas arv i ett par instanser. De givna rekommendationerna med kortklasser vidgade med jokrar har här implementerats löst. Men den givna och naturliga implementationen av arv ges här av att nyttja <code>CardController</code> som föräldraklass till <code>CardAPIController</code>, eftersom de båda har gemensamma metoder, konstanter och attribut, exempelvis session, klassen <code>Deck</code> med flera.</p>
        <p>Det är notoriskt krångligt att bygga klasser på ett smidigt sätt, och det finns i princip alltid potential för förbättringar. Klassen <code>Card</code> (eller snarare <code>CardGraphic</code>) är här ganska menlös i förefintligt skick, men skulle säkert kunna byggas mer komplicerat.</p>
        <p>Det lär ta fler kursmoment för att övertyga om ramverkens förträfflighet. Komplexiteten ökar betänkligt utan att ge så stora vinster, även om det har sin tjusning med färdiga lösningar på många vanliga kodproblem. Dessvärre får man lägga en del tid på buggar i själva ramverket snarare än att fokusera på objektorienterad kod i sig.</p>
        <p>Icke desto mindre är det tillfredsställande när man väl kommer över den jobbiga tröskeln och kan börja bygga applikationer. Koden med kontroller, mallar och vyer blir ganska liten och kompakt, även om man är mer begränsad än med rå PHP.</p>
        <p>TIL för kursmomentet får sägas vara sessioner i Symfony och Twig, ett smidigt sätt att hantera objekt till skillnad från PHP:s krångliga motsvarigheter.</p>
        <figure>
            <img src=\"";
        // line 85
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/chihiro-kmom02.avif"), "html", null, true);
        yield "\" width=\"1536\" alt=\"Chihiro spelar kort\">
        </figure>
    </section>
    <section class=\"two-columns\" id=\"kmom01\">
        <h2>Kmom01</h2>
        <p class=\"initcap\">I rasande tempo introduceras ramverket Symfony, och den församlade skaran studerande har bara att försöka hänga med i störtfloden av ny information. Upplägget är bekant sedan tidigare: att plumsa i havet, gripa tag i någon drivved och försöka överleva. Även om man får en del plankor till skänks att hålla fast vid.</p>
        <p>Kontroller, mallar och vyer införs i diskursen, och så även RESTfulla API:n via JSON. Via Twig kan webbsidor slutligen renderas på någorlunda bekant sätt, och på något vis känns motorn i bakgrunden tämligen överflödig.</p>
        <p>Objektorienterad PHP berörs flyktigt, men mestadels för att beskriva klasser i Symfoni. Frågan är om ren OOP kommer att avhandlas i kursen? Hantering av bilder, CSS och Javascript ombesörjs därefter, varefter resultatet är färdigt att distribuera på server likväl som Github.</p>
        <p>Angående förkunskaper kring objektorienterad kod föreligger sådan i form av Ada och PHP, den senare på ganska god nivå. Klasser och objekt skiljer sig inte nämnvärt från andra språk, men instantiering är mycket smidigare. Den som kommer från Python lär uppfatta vissa diskrepanser, som att PHP inte per default nyttjar referens i funktionsanrop.</p>
        <p>Ramverk är egentligen ett jävla skit, men man kan förstå lockelsen i att snabbt ha en modell färdig att implementera, till priset av att man blir synnerligen låst i sin programmering, och därtill beroende av en stor mängd extern programvara som inte alltid lirar felfritt.</p>
        <p>Det finns i princip inget i <em>PHP The Right Way</em> som är särskilt intressant eller tilltalande. Artikeln är förlegad och därtill väldigt rörig. Särskilt upprörande är att man förespråkar en kodstandard som skiljer sig från PHP:s egna (1TBS, K&amp;R).</p>
        <p>TIL får nog sägas vara att nyttja ramverket Symfony, en erfarenhet som kanske är nyttig men som jag aldrig skulle fundera på att använda för egen del. Det är själva definitionen av bloat.</p>
        <figure>
            <img src=\"";
        // line 98
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/chihiro-kmom01.avif"), "html", null, true);
        yield "\" width=\"1536\" alt=\"Chihiro introduceras i PHP\">
            <figcaption>@mos inskärper allvaret i studierna.</figcaption>
        </figure>
    </section>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "report.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  215 => 98,  199 => 85,  181 => 70,  161 => 53,  145 => 40,  130 => 28,  121 => 22,  115 => 19,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}Rapport{% endblock %}

{% block body %}
    <select id=\"kmom\" aria-label=\"kmom\" onChange=\"window.document.location.href=this.options[this.selectedIndex].value;\">
        <option value=\"#navbar\">topp</option>
        <option value=\"#kmom01\">km01</option>
        <option value=\"#kmom02\">km02</option>
        <option value=\"#kmom03\">km03</option>
        <option value=\"#kmom04\">km04</option>
        <option value=\"#kmom05\">km05</option>
        <!-- option value=\"#kmom06\">km06</option>
        <option value=\"#kmom10\">km10</option -->
    </select>
    <h1>Rapport</h1>
    <section class=\"two-columns\" id=\"kmom06\">
        <h2>Kmom06</h2>
        <p class=\"initcap\">Metrik är ämnet för detta kursmoment, vars huvudsakliga <a href=\"{{ path('metrics') }}\">rapport</a> publiceras separat. Tvenne verktyg brukas primärt, varav det ena utgörs av <strong>PhpMetrics</strong>, med en diger ansamling mätmetoder. Första körningen gav sex varningar, varav två utgjordes av svårbegripliga «package violations» och fyra ansågs vara klasser som är «probably bugged» på grund av komplexitetsgraden. Förmodligen är det en rimlig skattning, som ligger i linje med min egen tidigare redovisade ståndpunkt, särskilt avseende poängberäkning i kort- och spelklasserna</p>
        <p>Grafiskt kommer det till uttryck i ett diagram av färgade cirklar i trafikljusets palett, varvid den stora klassen <code>GameActions</code> för «21» är ett rött skynke tillsammans med dess kontrollerklass, tätt följt av <code>HandScore</code> med dess villkorsfyllda rutiner. Det är från början givet var krutet ska läggas, och på så vis fyller instrumentet sin funktion.
        <figure>
            <img src=\"{{ asset('build/images/metrics/phpmetrics-scrutinizer.avif') }}\" width=\"1356\" alt=\"Scrutinizer och PhpMetrics\">
        </figure>
        <p>Motsvarande körning med <strong>Scrutinizer</strong> gav som resultat «passed» för «build», 100&nbsp;% för täckning (vilket redan var känt) samt 9.89 för «Scrutinizer». Inte så pjåkigt. Verktyget fann fem punkter, bland annat outnyttjade variabler (som linten inte upptäckte) jämte en del udda problem, varav två härrör till extern kod. Sex metoder fick betyg B, medan resten samt alla klasser nådde A. Strävan här är förstås den perfekta tian, men i huvudsak är detta moment redan avklarat. Scrutinizer berättar dessutom hur man kan gå till väga för att åtgärda berörda problem.</p>
        <p>Den egna personliga hållningen är att kodkvalitet i någon mening är avgörande för att kunna hålla större system vid god kvalitet och i underhållbarbart skick. <em>Bloat</em> och buggar är ofelbara konsekvenser när man tappar kontrollen över en stor kodmassa, men då är det redan försent, och man måste skriva om kodbasen från början.</p>
        <p>För egen del är PHPStan ett uppskattat verktyg för att hålla ordning på typer och vilka data man skyfflar runt, och den arsenalen har nu vidgats med ytterligare några värdefulla instrument (TIL). Samtidigt måste sägas att det lätt kan bli lite av en fix idé att jaga poäng, tid och resurser som man istället hade kunnat använda på verklig kodning och kreativa lösningar.</p>
        <figure>
            <img src=\"{{ asset('build/images/chihiro-kmom06.avif') }}\" width=\"1536\" alt=\"Chihiro förbättrar kodens kvalitet\">
        </figure>
    </section>
    <section class=\"two-columns\" id=\"kmom05\">
        <h2>Kmom05</h2>
        <p class=\"initcap\">Objekt-relationell mappning (ORM) avhandlas via Doctrine i Symfony, kanske mest för att illustrera ännu ett koncept relaterat till databaser. I själva verket vinner man nog inte så mycket på en dylik abstraktion, eftersom man ändå måste ha detaljkännedom om sina tabeller och komma åt data via SQL-liknande satser. Även i andra modeller har man objektorientering på sista raden i PHP via getters, setters och andra mekanismer. MariaDB? <em>Defeats the purpose.</em></p>
        <p>Till yttermera visso tillkommer onödig abstraktion, exempelvis för att uppdatera tabeller, även om det blir lite mindre kod att hantera. Det är inte troligt att förstahandsvalet faller på ORM i någon som helst tillämpning.</p>
        <p>Givet databasens litenhet fordrades ändå en hel del arbete för att få funktionaliteten på plats, kanske mest för att få det att passa med Symfonys gränssnitt. Men CRUD är CRUD, om än i annan tappning, och efter en del inledande svårigheter gick det relativt enkelt att bygga biblioteket.</p>
        <p>För ändamålet kopierades konceptet från den tidigare kortleksmodellen, med en inre twigmall omfattande en inre meny för att få ett enhetligt gränssnitt för biblioteket. En centrerad vy med tabeller för boklistor, enskilda böcker och formulär definierar biblioteket, tillsammans med en frontsida. Enskilda detaljvyer har försetts med ytterligare navigering till nästa och föregående objekt.</p>
        <p>Då filuppladdning inte fungerar på studentservern skippas den biten – utöver att det skulle ta ytterligare tid i anspråk – och av det skälet kan bilder inte hanteras i nuvarande version. Man får nöja sig med att ange titel, författare och ISBN för verken, för vilka en generisk bild definieras i förekommande fall. Grundläggande felhantering och kontroller i formulär har implementerats.</p>
        <p>Denna gång har aspekter av testning funnits med från första stund, men det mest komplexa återfinns alltjämt i kontrollklasserna, som här egentligen är de enda klasserna av relevans. För att kunna testa metoder som förändrar databasen nyttjas en fristående testdatabas (angiven i <code>.env.test.local</code>) för att inte förstöra något i den ordinarie databasen. Därmed kan en återställning först göras, på det att exakta data är kända för ID med mera. Alternativet med mockning är inte så givande i denna enkla modell, eftersom metoderna är få.</p>
        <figure>
            <img src=\"{{ asset('build/images/chihiro-kmom05.avif') }}\" width=\"1536\" alt=\"Chihiro knåpar ORM\">
        </figure>
    </section>
    <section class=\"two-columns\" id=\"kmom04\">
        <h2>Kmom04</h2>
        <p class=\"initcap\">Enhetstestning med PHPUnit och Xdebug introduceras, tillsammans med automatisk dokumentation via PHPDoc. Här noteras att verktygen i fråga ligger en generation efter aktuell PHP-version (8.6.4), vilket fordrar en del åtgärder för att slippa onödig felrapportering.</p>
        <p>Själva förfarandet att skriva enhetstester följer samma mall som i Python och andra språk, och bereder inga större svårigheter i grunden. Däremot kan det vara en del arbete att samtidigt få testkoden att samspela med PHPStan och andra linters, samt förstås att formulera tester för en mängd klasser och metoder.</p>
        <p>Hundra procent täckning uppnås förvisso i testerna, men till priset av att någon enstaka funktion fick modifieras och någon läggas till. Specifikt befanns vara nödvändigt att ordna en metod <code>emptyDeck()</code> i klassen <code>Deck</code> för att kunna lägga till enstaka kort i en tom kortlek. Detta för att kunna simulera situationer med given utgång, exempelvis att bank eller spelare vinner eller förlorar med säkerhet. Mockning kunde här inte användas för ändamålet.</p>
        <p>Svårast att testa var inte oväntat mer komplex kod, särskilt kedjad sådan utan returnerade resultat. I metoden för poängberäkning upptäcktes faktiskt en bugg tack vare testningen, vilket visar att den har potential att förbättra kod. Givet att man har testning i bakhuvudet redan i ett tidigt skede kan det hända att man vinnlägger sig om att skriva renare och mindre komplex kod, en erfarenhet man gott kan ta med sig från momentet (TIL).</p>
        <p>Däremot är det osäkert om enhetstestning ger «snyggare» kod. Upplevelsen här är att PHPStan är det primära verktyget för att ordna både logiskt felfri och snygg kod, men det kan hända att testbarheten bidrar en smula.</p>
        <p>Enhetstestning är inte heller ett universalverktyg. Med en hammare ska man inte dra i skruv, och på samma sätt är det föga givande att enhetstesta sådant som controllers i ramverket. Funktionella tester är i regel bättre för sådana klasser, varvid vi <a href=\"https://symfony.com/doc/current/testing.html#application-tests\">nyttjar</a> Symfonys utvidgning <code>WebTestCase</code> för att testa router och i förekommande fall vissa egenskaper som sessionsvariabler.</p>
        <p>Summa summarum nås därmed hundra procent täckning även för controllerklasserna, om än av begränsat värde. Tillsammans med felfri lint via PHPStan och PHPMD föreligger därför förhoppningsvis en någorlunda god kodbas.</p>
        <figure>
            <img src=\"{{ asset('build/images/chihiro-kmom04.avif') }}\" width=\"1536\" alt=\"Chihiro enhetstestar\">
        </figure>
    </section>
    <section class=\"two-columns\" id=\"kmom03\">
        <h2>Kmom03</h2>
        <p class=\"initcap\">Introduktion av PHPStan och PHP Mess Detector gör att kortklasserna i tidigare kursmoment behöver refaktoreras, samtidigt som de vässas med större mått av inkapsling. Detta är hemmaplan, och nu börjar det likna riktig programmering med erforderlig stringens.</p>
        <p>Konstruktion av flödesdiagram, pesudokod och UML-diagram av klasser som angreppsvektor för problemet är en rimlig ansats. På så sätt kan man få en grundläggande struktur för kodbasen, observera repetitiv kod som kan förläggas i metoder samt avslöja en del tankefel kring den mentala konstruktionen av modellen. Därmed inte sagt att man får en fullständig bild av problemkomplext med sådan modellering, men det är en bra början.</p>
        <p>Klassen <code>Banker</code> befanns småningom vara överflödig, eftersom det är en spelare i mängden med samma slags metoder. Ett fält med <code>Player</code> definierar istället de två spelarna, och kan enkelt byggas ut till fler. Här räcker det att hålla koll på respektive spelare med index.</p>
        <p>Mallarna ska vara dumma, men det blir ändå ett antal <code>if</code>-satser för att hålla reda på knappar i olika tillstånd. Den huvudsakliga logiken sker ändå i klasserna, med bara ett fåtal rutter som alla ryms i en enda klass <code>GameController</code>. Mallarna renderas uteslutande med sessionsvariabler.</p>
        <p>Huvudlogiken finns i <code>GameActions</code>, som ärver magiska getters och setters samt konstanter från föräldraklassen <code>Game</code>. Spelarens aktioner styrs av knappar och inmatning i formulär, medan bankens motsvarande flöde automatiseras.</p>
        <p>Svåraste moment är kanske något överraskande metoder för att beräkna poängsumma (klassen <code>HandScore</code>) samt sannolikheter för att bli tjock, där bruket av två jokrar ökar komplexiteten med en ordning.</p>
        <h3>Om MVC</h3>
        <p>MVC som designmönster är väl i sin ordning, men ramverken är ofta alldeles för rigida. Symfony tycks dock lira bra med PHPStan, vilket är en fördel, inte minst i att hantera sessionsvariabler. Med ramverk är det så att man blir ordentligt fastlåst i en viss ordning, en löpande bandsprincip som passar industrin väl men samtidigt missgynnar mer kreativa angreppsmetoder.</p>
        <p>En intressant egenskap med Symfony är stödet för generella getters/setters via magiska metoder <code>__get()</code><code>__isset()</code> och <code>__set()</code>, vilket reducerar kodmassan en del, inte minst antalet publika metoder. Twig kan då hämta privata egenskaper via dessa metoder, utan att man behöver synliggöra dem.</p>
        <p>TIL är nog att nyttja inkapsling bättre i klasserna, inte minst för att så mycket skräp annars skickas runt i komposition och arv. Mycket givande kurs.</p>
        <p>Alla obligatoriska och valfria moment är implementerade per specifikation. Inga fel noteras med PHPStan, PHPMD eller PHP CS Fixer.</p>
        <figure>
            <img src=\"{{ asset('build/images/chihiro-kmom03.avif') }}\" width=\"1536\" alt=\"Chihiro bekantar sig med magiska metoder\">
        </figure>
    </section>
    <section class=\"two-columns\" id=\"kmom02\">
        <h2>Kmom02</h2>
        <p class=\"initcap\">Grunden till ett kortspel implementeras här i objektorienterad PHP under ramverket Symfony och med Twig som motor. Arv, komposition, aggregation, gränssnitt och egenskaper definieras teoretiskt, och ansluter i stort till tidigare stoff i Python.</p>
        <p>Med arv (inheritance) menas här snarare en utvidgning av en föräldraklass till en barnklass, i vilken ytterligare metoder, konstanter och attribut kan definieras. I förekommande fall kan befintliga konstanter och metoder omdefinieras eller öppnas upp mot omvärlden (men inte omvänt).</p>
        <p>Komposition är en klass i en klass, det vill säga klassvis instantiering av en yttre klass. Gränssnitt definierar vi som ett «kontrakt» för en klass, det vill säga en mall för metoder utan specifik implementering, vilket är till nytta för att definiera API:n till brukare.</p>
        <p>Egenskaper (traits) är mer en form av syntaktiskt lim, ofta förekommande kod som kan klistras in efter behag via <code>use</code> och då får en självständig roll i förhållande till den omgivande klassen. Egenskaper kan ofta vara ett alternativ till onödigt krånglig komposition av en miljard klasser.</p>
        <p>För uppgiften i fråga används varken egenskaper eller gränssnitt, men däremot nyttjas arv i ett par instanser. De givna rekommendationerna med kortklasser vidgade med jokrar har här implementerats löst. Men den givna och naturliga implementationen av arv ges här av att nyttja <code>CardController</code> som föräldraklass till <code>CardAPIController</code>, eftersom de båda har gemensamma metoder, konstanter och attribut, exempelvis session, klassen <code>Deck</code> med flera.</p>
        <p>Det är notoriskt krångligt att bygga klasser på ett smidigt sätt, och det finns i princip alltid potential för förbättringar. Klassen <code>Card</code> (eller snarare <code>CardGraphic</code>) är här ganska menlös i förefintligt skick, men skulle säkert kunna byggas mer komplicerat.</p>
        <p>Det lär ta fler kursmoment för att övertyga om ramverkens förträfflighet. Komplexiteten ökar betänkligt utan att ge så stora vinster, även om det har sin tjusning med färdiga lösningar på många vanliga kodproblem. Dessvärre får man lägga en del tid på buggar i själva ramverket snarare än att fokusera på objektorienterad kod i sig.</p>
        <p>Icke desto mindre är det tillfredsställande när man väl kommer över den jobbiga tröskeln och kan börja bygga applikationer. Koden med kontroller, mallar och vyer blir ganska liten och kompakt, även om man är mer begränsad än med rå PHP.</p>
        <p>TIL för kursmomentet får sägas vara sessioner i Symfony och Twig, ett smidigt sätt att hantera objekt till skillnad från PHP:s krångliga motsvarigheter.</p>
        <figure>
            <img src=\"{{ asset('build/images/chihiro-kmom02.avif') }}\" width=\"1536\" alt=\"Chihiro spelar kort\">
        </figure>
    </section>
    <section class=\"two-columns\" id=\"kmom01\">
        <h2>Kmom01</h2>
        <p class=\"initcap\">I rasande tempo introduceras ramverket Symfony, och den församlade skaran studerande har bara att försöka hänga med i störtfloden av ny information. Upplägget är bekant sedan tidigare: att plumsa i havet, gripa tag i någon drivved och försöka överleva. Även om man får en del plankor till skänks att hålla fast vid.</p>
        <p>Kontroller, mallar och vyer införs i diskursen, och så även RESTfulla API:n via JSON. Via Twig kan webbsidor slutligen renderas på någorlunda bekant sätt, och på något vis känns motorn i bakgrunden tämligen överflödig.</p>
        <p>Objektorienterad PHP berörs flyktigt, men mestadels för att beskriva klasser i Symfoni. Frågan är om ren OOP kommer att avhandlas i kursen? Hantering av bilder, CSS och Javascript ombesörjs därefter, varefter resultatet är färdigt att distribuera på server likväl som Github.</p>
        <p>Angående förkunskaper kring objektorienterad kod föreligger sådan i form av Ada och PHP, den senare på ganska god nivå. Klasser och objekt skiljer sig inte nämnvärt från andra språk, men instantiering är mycket smidigare. Den som kommer från Python lär uppfatta vissa diskrepanser, som att PHP inte per default nyttjar referens i funktionsanrop.</p>
        <p>Ramverk är egentligen ett jävla skit, men man kan förstå lockelsen i att snabbt ha en modell färdig att implementera, till priset av att man blir synnerligen låst i sin programmering, och därtill beroende av en stor mängd extern programvara som inte alltid lirar felfritt.</p>
        <p>Det finns i princip inget i <em>PHP The Right Way</em> som är särskilt intressant eller tilltalande. Artikeln är förlegad och därtill väldigt rörig. Särskilt upprörande är att man förespråkar en kodstandard som skiljer sig från PHP:s egna (1TBS, K&amp;R).</p>
        <p>TIL får nog sägas vara att nyttja ramverket Symfony, en erfarenhet som kanske är nyttig men som jag aldrig skulle fundera på att använda för egen del. Det är själva definitionen av bloat.</p>
        <figure>
            <img src=\"{{ asset('build/images/chihiro-kmom01.avif') }}\" width=\"1536\" alt=\"Chihiro introduceras i PHP\">
            <figcaption>@mos inskärper allvaret i studierna.</figcaption>
        </figure>
    </section>
{% endblock %}
", "report.html.twig", "/Users/nik/Sites/dbwebb-kurser/mvc/me/report/templates/report.html.twig");
    }
}
