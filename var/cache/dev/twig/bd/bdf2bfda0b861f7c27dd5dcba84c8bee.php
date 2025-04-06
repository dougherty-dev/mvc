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
class __TwigTemplate_0fe6ad600a3d9b9a608ebf307654a14b extends Template
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
        <!-- option value=\"#kmom03\">km03</option>
        <option value=\"#kmom04\">km04</option>
        <option value=\"#kmom05\">km05</option>
        <option value=\"#kmom06\">km06</option>
        <option value=\"#kmom10\">km10</option -->
    </select>
    <h1>Rapport</h1>
    <section class=\"two-columns\" id=\"kmom02\">
        <h2>Kmom02</h2>
        <p class=\"initcap\"></p>
        <p></p>
        <p></p>
        <figure>
            <img src=\"";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/chihiro-kmom02.avif"), "html", null, true);
        yield "\" width=\"1792\" alt=\"Chihiro\">
            <figcaption>Chihiro programmerar kortklasser.</figcaption>
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
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/chihiro-kmom01.avif"), "html", null, true);
        yield "\" width=\"1536\" alt=\"Chihiro\">
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
        return array (  136 => 37,  119 => 23,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
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
        <!-- option value=\"#kmom03\">km03</option>
        <option value=\"#kmom04\">km04</option>
        <option value=\"#kmom05\">km05</option>
        <option value=\"#kmom06\">km06</option>
        <option value=\"#kmom10\">km10</option -->
    </select>
    <h1>Rapport</h1>
    <section class=\"two-columns\" id=\"kmom02\">
        <h2>Kmom02</h2>
        <p class=\"initcap\"></p>
        <p></p>
        <p></p>
        <figure>
            <img src=\"{{ asset('build/images/chihiro-kmom02.avif') }}\" width=\"1792\" alt=\"Chihiro\">
            <figcaption>Chihiro programmerar kortklasser.</figcaption>
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
            <img src=\"{{ asset('build/images/chihiro-kmom01.avif') }}\" width=\"1536\" alt=\"Chihiro\">
            <figcaption>@mos inskärper allvaret i studierna.</figcaption>
        </figure>
    </section>
{% endblock %}
", "report.html.twig", "/Users/nik/Sites/dbwebb-kurser/mvc/me/report/templates/report.html.twig");
    }
}
