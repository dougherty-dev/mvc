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

/* about.html.twig */
class __TwigTemplate_ddf48122773390b3530c158ff9419703 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "about.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "about.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "about.html.twig", 1);
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

        yield "Om";
        
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
        yield "    <section class=\"two-columns\">
        <h1>Om MVC</h1>
        <p class=\"initcap\">Kursen DV1608 <em>Objektorienterade webbteknologier</em> syftar till att beskriva <code>Hello world!</code> på det mest komplicerade vis som kan föreställas, omfattande 200 MB kod utvecklad under 300 manår. Samt kanske att förbereda för mer avancerade projekt med hjälp av tunga ramverk.</p>
        <p>Moment omfattar objektorienterad PHP med klasser, egenskaper, arv, namnrymder med mera, i kombination med objektorienterad databashantering (ORM). Som ramverk nyttjas Symfony med komponenter som Twig, direkt under Symfonys egen http-server och kanske även PHP:s motsvarighet.</p>
        <p>Git brukas som versionshanterare, kanske mest för drillens skull, medan resultaten publiceras på sedvanligt manér till en server. Även en del API:er med JSON nyttjas, parallellt med motsvarande behandling i annan kurs. Kursen har ett centralt <a href=\"https://github.com/dbwebb-se/mvc\">kursrepo</a> på Github, där även gaffel för detta projekt <a href=\"https://github.com/dougherty-dev/mvc\">huseras</a>.</p>
        <img src=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/chihiro-about.avif"), "html", null, true);
        yield "\" width=\"1536\" alt=\"Chihiro\">
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
        return "about.html.twig";
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
        return array (  107 => 11,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}Om{% endblock %}

{% block body %}
    <section class=\"two-columns\">
        <h1>Om MVC</h1>
        <p class=\"initcap\">Kursen DV1608 <em>Objektorienterade webbteknologier</em> syftar till att beskriva <code>Hello world!</code> på det mest komplicerade vis som kan föreställas, omfattande 200 MB kod utvecklad under 300 manår. Samt kanske att förbereda för mer avancerade projekt med hjälp av tunga ramverk.</p>
        <p>Moment omfattar objektorienterad PHP med klasser, egenskaper, arv, namnrymder med mera, i kombination med objektorienterad databashantering (ORM). Som ramverk nyttjas Symfony med komponenter som Twig, direkt under Symfonys egen http-server och kanske även PHP:s motsvarighet.</p>
        <p>Git brukas som versionshanterare, kanske mest för drillens skull, medan resultaten publiceras på sedvanligt manér till en server. Även en del API:er med JSON nyttjas, parallellt med motsvarande behandling i annan kurs. Kursen har ett centralt <a href=\"https://github.com/dbwebb-se/mvc\">kursrepo</a> på Github, där även gaffel för detta projekt <a href=\"https://github.com/dougherty-dev/mvc\">huseras</a>.</p>
        <img src=\"{{ asset('build/images/chihiro-about.avif') }}\" width=\"1536\" alt=\"Chihiro\">
    </section>
{% endblock %}
", "about.html.twig", "/Users/nik/Sites/dbwebb-kurser/mvc/me/report/templates/about.html.twig");
    }
}
