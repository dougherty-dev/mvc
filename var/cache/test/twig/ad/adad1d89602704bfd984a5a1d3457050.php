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

/* card.html.twig */
class __TwigTemplate_9d3d83d9c793a67eb47815ec11a296c4 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "card.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "card.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "card.html.twig", 1);
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

        yield "Kortspel";
        
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
        yield from $this->loadTemplate("card_template.html.twig", "card.html.twig", 6)->unwrap()->yield($context);
        // line 7
        yield "            <section class=\"three-columns\">
                <h2>Struktur</h2>
                <p>Ett spelkort har valören två till tio, knekt, dam, kung eller ess, i röd eller svart färg, i någon av sviterna ♣️ klöver, ♦️ ruter, ♥️ hjärter eller ♠️ spader. Fyra sviter med tretton valörer vardera tillsammans med två jokrar, inalles femtiofyra spelkort, bygger således en kortlek.</p>
                <p>Klassen <code>Card</code> definierar i all sin enkelhet ett kort, med ett numeriskt värde [0, 53], tillsammans med en getter. I den utvidgade klassen <code>CardGraphic</code> definieras en textmässig representation av spelkorten, dels i form av unicodetecken för respektive spelkort i respektive svit, sammanfogade i ett fält <code>DECK_ARRAY</code> för enkel hämtning via index. Klassen definierar även en metod för att uttrycka spelkorten i klartext <strong>klöver ess</strong> o.s.v.</p>
                <p>En klass <code>Hand</code> tillkommer för att hantera delmängder av spelkort, med metoder för att beskriva de ingående korten. Slutligen implementeras en klass <code>Deck</code> som nyttjar kompositioner av såväl <code>Hand</code> som <code>CardGraphic</code> i metoder för att definiera kortleken och utföra operationer, exempelvis att blanda, dra ett kort ur eller återställa leken.</p>
            </section>
            <div class=\"center\">
                <figure>
                    <img src=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/card-uml.avif"), "html", null, true);
        yield "\" width=\"1000\" alt=\"UML\">
                </figure>
                <p class=\"huge\">🃑🃒🃓🃔🃕🃖🃗🃘🃙🃚🃛🃝🃞<br>
                🃁🃂🃃🃄🃅🃆🃇🃈🃉🃊🃋🃍🃎<br>
                🂡🂢🂣🂤🂥🂦🂧🂨🂩🂪🂫🂭🂮<br>
                🂱🂲🂳🂴🂵🂶🂷🂸🂹🂺🂻🂽🂾🃟🃟</p>
            </div>
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
        return "card.html.twig";
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
        return array (  112 => 15,  102 => 7,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}Kortspel{% endblock %}

{% block body %}
{% include 'card_template.html.twig' %}
            <section class=\"three-columns\">
                <h2>Struktur</h2>
                <p>Ett spelkort har valören två till tio, knekt, dam, kung eller ess, i röd eller svart färg, i någon av sviterna ♣️ klöver, ♦️ ruter, ♥️ hjärter eller ♠️ spader. Fyra sviter med tretton valörer vardera tillsammans med två jokrar, inalles femtiofyra spelkort, bygger således en kortlek.</p>
                <p>Klassen <code>Card</code> definierar i all sin enkelhet ett kort, med ett numeriskt värde [0, 53], tillsammans med en getter. I den utvidgade klassen <code>CardGraphic</code> definieras en textmässig representation av spelkorten, dels i form av unicodetecken för respektive spelkort i respektive svit, sammanfogade i ett fält <code>DECK_ARRAY</code> för enkel hämtning via index. Klassen definierar även en metod för att uttrycka spelkorten i klartext <strong>klöver ess</strong> o.s.v.</p>
                <p>En klass <code>Hand</code> tillkommer för att hantera delmängder av spelkort, med metoder för att beskriva de ingående korten. Slutligen implementeras en klass <code>Deck</code> som nyttjar kompositioner av såväl <code>Hand</code> som <code>CardGraphic</code> i metoder för att definiera kortleken och utföra operationer, exempelvis att blanda, dra ett kort ur eller återställa leken.</p>
            </section>
            <div class=\"center\">
                <figure>
                    <img src=\"{{ asset('build/images/card-uml.avif') }}\" width=\"1000\" alt=\"UML\">
                </figure>
                <p class=\"huge\">🃑🃒🃓🃔🃕🃖🃗🃘🃙🃚🃛🃝🃞<br>
                🃁🃂🃃🃄🃅🃆🃇🃈🃉🃊🃋🃍🃎<br>
                🂡🂢🂣🂤🂥🂦🂧🂨🂩🂪🂫🂭🂮<br>
                🂱🂲🂳🂴🂵🂶🂷🂸🂹🂺🂻🂽🂾🃟🃟</p>
            </div>
{% endblock %}
", "card.html.twig", "/Users/nik/Sites/dbwebb-kurser/mvc/me/report/templates/card.html.twig");
    }
}
