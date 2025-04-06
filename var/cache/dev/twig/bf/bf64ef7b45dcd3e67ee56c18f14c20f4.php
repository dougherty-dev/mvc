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

/* home.html.twig */
class __TwigTemplate_36cd26bc423fd6a4a857f779086bef76 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "home.html.twig", 1);
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

        yield "Hem";
        
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
        <h1>Om Chihiro</h1>
        <p class=\"initcap\">千尋です。よろしくお願いします！<em>(Chihiro desu. Yoroshiku onegaishimasu!)</em> Detta är min enkla boning i kursen MVC, en dammig virtuell labblokal med gamla trasiga tjockskärmar och andra komponenter från <em>annodazumal</em>. Det är i denna kusliga miljö vi ämnar förkovra oss i MVC.</p>
        <p>För ändamålets skull norpar vi denna gång ett alter ego i form av Ogino Chihiro (荻野千尋), huvudfigur i fantastiska <em>Spirited away</em> (2001), en japansk saga med riklig ansamling av <em>susuwatari</em>, <em>yōkai</em> och andra <em>kami</em> ur den japanska folkloren.</p>
        <p>Chihiro är bara tio år, men intelligent som få. MVC-kursen blir en enkel resa för henne, i alla fall med hjälp av <em>kami</em>. Det handlar om fantasi mer än logik, och Chihiros föreställningsvärld är ovanligt rik.</p>
        <h2>Om sajten</h2>
        <p>Symfony nyttjas för att rendera sidor och annat innehåll, med PHP som ryggrad. GPT-4o respektive DALL·E 3 används för att generera bilder, ur vilka en lämplig palett för CSS extraheras. Bilder föreligger genomgående i 10-bitars HEIF/AVIF för bästa prestanda. Utvecklingsmiljön består av MacOS Sequoia 15.4 med AMP-stack och erforderliga paket via brew, composer och npm.</p>
        <p></p>
        <img src=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/chihiro.avif"), "html", null, true);
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
        return "home.html.twig";
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
        return array (  110 => 14,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}Hem{% endblock %}

{% block body %}
    <section class=\"two-columns\">
        <h1>Om Chihiro</h1>
        <p class=\"initcap\">千尋です。よろしくお願いします！<em>(Chihiro desu. Yoroshiku onegaishimasu!)</em> Detta är min enkla boning i kursen MVC, en dammig virtuell labblokal med gamla trasiga tjockskärmar och andra komponenter från <em>annodazumal</em>. Det är i denna kusliga miljö vi ämnar förkovra oss i MVC.</p>
        <p>För ändamålets skull norpar vi denna gång ett alter ego i form av Ogino Chihiro (荻野千尋), huvudfigur i fantastiska <em>Spirited away</em> (2001), en japansk saga med riklig ansamling av <em>susuwatari</em>, <em>yōkai</em> och andra <em>kami</em> ur den japanska folkloren.</p>
        <p>Chihiro är bara tio år, men intelligent som få. MVC-kursen blir en enkel resa för henne, i alla fall med hjälp av <em>kami</em>. Det handlar om fantasi mer än logik, och Chihiros föreställningsvärld är ovanligt rik.</p>
        <h2>Om sajten</h2>
        <p>Symfony nyttjas för att rendera sidor och annat innehåll, med PHP som ryggrad. GPT-4o respektive DALL·E 3 används för att generera bilder, ur vilka en lämplig palett för CSS extraheras. Bilder föreligger genomgående i 10-bitars HEIF/AVIF för bästa prestanda. Utvecklingsmiljön består av MacOS Sequoia 15.4 med AMP-stack och erforderliga paket via brew, composer och npm.</p>
        <p></p>
        <img src=\"{{ asset('build/images/chihiro.avif') }}\" width=\"1536\" alt=\"Chihiro\">
    </section>
{% endblock %}
", "home.html.twig", "/Users/nik/Sites/dbwebb-kurser/mvc/me/report/templates/home.html.twig");
    }
}
