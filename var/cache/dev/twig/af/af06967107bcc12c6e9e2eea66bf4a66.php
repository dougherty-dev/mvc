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

/* game.html.twig */
class __TwigTemplate_51e6c3e94b813e308392f77862f8bcc6 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "game.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "game.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "game.html.twig", 1);
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

        yield "21";
        
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
        yield "            <section class=\"center\">
                <a href=\"";
        // line 7
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game_dojo");
        yield "\"><button class=\"humongous\">Spela 21</button></a>
            </section>
            <section class=\"three-columns\">
                <h1>Kortspelet 21</h1>
                <p>Tjugoett är en implementation av det klassiska kortspelet <em>Black Jack</em>. Målet är att med två eller flera kort komma så nära 21 utan att överskrida summan.</p>
                <h2>Regler</h2>
                <p>I denna variant finns en spelare och en bank. Både bank och spelare erhåller 100 pengar att satsa, och spelet fortgår tills någon av parterna är bankrutt.</p>
                <p>Spelaren tilldelas ett kort, och kan välja att satsa ett belopp beroende av valören. Beloppet får inte överstiga bankens eller spelarens saldo. Spelaren kan därefter begära ytterligare kort tills han är nöjd eller blir tjock.</p>
                <p>Om spelaren blir tjock vinner banken. I annat fall tilldelas banken kort på motsvarande sätt. Banken känner inte spelarens hand. Banken vinner vid lika eller fler poäng upp till 21. Spelaren vinner om banken blir tjock.</p>
                <p>Kortleken nyttjas tills den är delad till sista kortet, varvid fria kort samlas och blandas. Spelaren erhåller statistik beroende av lekens aktuella tillstånd, med skattning av sannolikheten att bli tjock vid ytterligare dragning av kort.</p>
                <p>Som tillval kan bankiren nyttja samma statistiska resonemang, i annat fall tillämpas en grov strategi utan hjälp av statistik, nämligen att banken stannar vid 17 eller högre värde på handen.</p>
                <p>Valörer för kort är angivna 2–10, 11 för knekt, 12 för dam, 13 för kung samt 1 eller 14 för ess. En joker är värd vad som helst mellan 1 och 14, för bäst anpassning till summan 21.</p>
                <h2>Implementation</h2>
                <p><a href=\"";
        // line 20
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game_doc");
        yield "\">Dokumentation</a> kring implementationen ges separat.</p>
                <figure>
                    <img src=\"";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/game/game-21.avif"), "html", null, true);
        yield "\" width=\"1536\" alt=\"21\">
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
        return "game.html.twig";
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
        return array (  124 => 22,  119 => 20,  103 => 7,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}21{% endblock %}

{% block body %}
            <section class=\"center\">
                <a href=\"{{ path('game_dojo') }}\"><button class=\"humongous\">Spela 21</button></a>
            </section>
            <section class=\"three-columns\">
                <h1>Kortspelet 21</h1>
                <p>Tjugoett är en implementation av det klassiska kortspelet <em>Black Jack</em>. Målet är att med två eller flera kort komma så nära 21 utan att överskrida summan.</p>
                <h2>Regler</h2>
                <p>I denna variant finns en spelare och en bank. Både bank och spelare erhåller 100 pengar att satsa, och spelet fortgår tills någon av parterna är bankrutt.</p>
                <p>Spelaren tilldelas ett kort, och kan välja att satsa ett belopp beroende av valören. Beloppet får inte överstiga bankens eller spelarens saldo. Spelaren kan därefter begära ytterligare kort tills han är nöjd eller blir tjock.</p>
                <p>Om spelaren blir tjock vinner banken. I annat fall tilldelas banken kort på motsvarande sätt. Banken känner inte spelarens hand. Banken vinner vid lika eller fler poäng upp till 21. Spelaren vinner om banken blir tjock.</p>
                <p>Kortleken nyttjas tills den är delad till sista kortet, varvid fria kort samlas och blandas. Spelaren erhåller statistik beroende av lekens aktuella tillstånd, med skattning av sannolikheten att bli tjock vid ytterligare dragning av kort.</p>
                <p>Som tillval kan bankiren nyttja samma statistiska resonemang, i annat fall tillämpas en grov strategi utan hjälp av statistik, nämligen att banken stannar vid 17 eller högre värde på handen.</p>
                <p>Valörer för kort är angivna 2–10, 11 för knekt, 12 för dam, 13 för kung samt 1 eller 14 för ess. En joker är värd vad som helst mellan 1 och 14, för bäst anpassning till summan 21.</p>
                <h2>Implementation</h2>
                <p><a href=\"{{ path('game_doc') }}\">Dokumentation</a> kring implementationen ges separat.</p>
                <figure>
                    <img src=\"{{ asset('build/images/game/game-21.avif') }}\" width=\"1536\" alt=\"21\">
                </figure>
            </section>
{% endblock %}
", "game.html.twig", "/Users/nik/Sites/dbwebb-kurser/mvc/me/report/templates/game.html.twig");
    }
}
