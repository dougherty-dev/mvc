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
class __TwigTemplate_fffd3def8ec255037213b55afc30e1a1 extends Template
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
                <p>Ett spelkort har valören två till tio, knekt, dam, kung eller ess, i röd eller svart färg, i någon av sviterna ♣️ klöver, ♦️ ruter, ♥️ hjärter eller ♠️ spader. Fyra sviter med tretton valörer vardera, inalles femtiotvå spelkort, bygger således klassen <code>Card</code>.</p>
                <p>Till klassen hör också en textmässig representation av de femtiotvå spelkorten, dels i form av unicodetecken för respektive spelkort i respektive svit, sammanfogade i en femtiotvå tecken lång sträng som representerar den grundläggande kortleken; dels i ett motsvarande fält <code>utf</code> för enkel hämtning via index. Leken löper över [0, 51].</p>
                <p>Två jokrar tillkommer i den utvidgade klassen <code>CardGraphic</code>, som expanderar kortleken till 54 tecken på samma manér. Klassen definierar även en metod för att uttrycka spelkorten i klartext <strong>klöver ess</strong> o.s.v., även om metoden för närvarande är vilande.</p>
                <p>En klass <code>Hand</code> tillkommer för att hantera delmängder av spelkort, med metoder för att beskriva korten. Slutligen implementeras en klass <code>Deck</code> som nyttjar kompositioner av såväl <code>Hand</code> som <code>Card</code> i metoder för att definiera kortleken och utföra operationer, exempelvis att blanda, dra ett kort ur eller återställa leken.</p>
            </section>
            <div class=\"center\">
                <figure>
                    <img src=\"";
        // line 16
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
        return array (  113 => 16,  102 => 7,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}Kortspel{% endblock %}

{% block body %}
{% include 'card_template.html.twig' %}
            <section class=\"three-columns\">
                <h2>Struktur</h2>
                <p>Ett spelkort har valören två till tio, knekt, dam, kung eller ess, i röd eller svart färg, i någon av sviterna ♣️ klöver, ♦️ ruter, ♥️ hjärter eller ♠️ spader. Fyra sviter med tretton valörer vardera, inalles femtiotvå spelkort, bygger således klassen <code>Card</code>.</p>
                <p>Till klassen hör också en textmässig representation av de femtiotvå spelkorten, dels i form av unicodetecken för respektive spelkort i respektive svit, sammanfogade i en femtiotvå tecken lång sträng som representerar den grundläggande kortleken; dels i ett motsvarande fält <code>utf</code> för enkel hämtning via index. Leken löper över [0, 51].</p>
                <p>Två jokrar tillkommer i den utvidgade klassen <code>CardGraphic</code>, som expanderar kortleken till 54 tecken på samma manér. Klassen definierar även en metod för att uttrycka spelkorten i klartext <strong>klöver ess</strong> o.s.v., även om metoden för närvarande är vilande.</p>
                <p>En klass <code>Hand</code> tillkommer för att hantera delmängder av spelkort, med metoder för att beskriva korten. Slutligen implementeras en klass <code>Deck</code> som nyttjar kompositioner av såväl <code>Hand</code> som <code>Card</code> i metoder för att definiera kortleken och utföra operationer, exempelvis att blanda, dra ett kort ur eller återställa leken.</p>
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
