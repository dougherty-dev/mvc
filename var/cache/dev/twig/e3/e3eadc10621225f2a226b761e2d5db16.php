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

/* base.html.twig */
class __TwigTemplate_7b5892e7765f6950af11c8fd8835e1f1 extends Template
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

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"sv\">
    <head>
        <meta charset=\"UTF-8\">
        <title>";
        // line 5
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
        <link rel=\"icon\" href=\"";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/favicon.ico"), "html", null, true);
        yield "\">
";
        // line 7
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 10
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 13
        yield "    </head>
    <body>
        <header>
            <nav id=\"navbar\">
                <ul>
                    <li><a href=\"";
        // line 18
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\">Hem</a></li> ·
                    <li><a href=\"";
        // line 19
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("about");
        yield "\">Om</a></li> ·
                    <li><a href=\"";
        // line 20
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("report");
        yield "\">Rapport</a></li> ·
                    <li><a href=\"";
        // line 21
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("lucky");
        yield "\">Tur</a></li> ·
                    <li><a href=\"";
        // line 22
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("card");
        yield "\">Kort</a></li> ·
                    <li><a href=\"";
        // line 23
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api");
        yield "\">API:n</a></li>
                </ul>
                <ul>
                    <li><a href=\"";
        // line 26
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("session");
        yield "\">session</a><li> |
                    <li><a href=\"";
        // line 27
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("session_delete");
        yield "\">förstör</a></li>
                </ul>
            </nav>
        </header>
        <main class=\"main\">
            ";
        // line 32
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 33
        yield "        </main>
        <footer>
            <p><a href=\"https://dougherty-dev.github.io/webapp-lager/\">Webapp</a>&nbsp;|
                <a href=\"https://www.student.bth.se/~nido24/dbwebb-kurser/mvc/me/report/public/\">MVC</a>&nbsp;|
                <a href=\"https://www.student.bth.se/~nido24/dbwebb-kurser/oopython/me/kmom06/yahtzee5/app.cgi\">OOPython</a>
                (<a href=\"https://www.student.bth.se/~nido24/dbwebb-kurser/oopython/me/kmom10/spellchecker/app.cgi/\">projekt</a>)&nbsp;|
                <a href=\"https://www.student.bth.se/~nido24/dbwebb-kurser/databas/me/redovisa/me.php\">DB</a>&nbsp;|
                <a href=\"https://www.student.bth.se/~nido24/dbwebb-kurser/js/me/public/\">JS</a>&nbsp;|
                <a href=\"https://www.student.bth.se/~nido24/dbwebb-kurser/design/me/portfolio/\">Design</a>
                (<a href=\"https://www.student.bth.se/~nido24/dbwebb-kurser/design/me/kmom10/\">projekt</a>)&nbsp;|
                <a href=\"https://www.student.bth.se/~nido24/dbwebb-kurser/webtec/me/report/public/me.php\">Webtec</a>
                (<a href=\"https://www.student.bth.se/~nido24/dbwebb-kurser/webtec/me/proj/public/home.php\">projekt</a>)</p>
            <p>© 2025 <span style=\"color: var(--orange);\">nido24</span></p>
        </footer>
    </body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
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

        yield "Welcome!";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 8
        yield "    ";
        yield $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackLinkTags("app");
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 10
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 11
        yield "    ";
        yield $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackScriptTags("app");
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 32
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.html.twig";
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
        return array (  221 => 32,  207 => 11,  194 => 10,  180 => 8,  167 => 7,  144 => 5,  117 => 33,  115 => 32,  107 => 27,  103 => 26,  97 => 23,  93 => 22,  89 => 21,  85 => 20,  81 => 19,  77 => 18,  70 => 13,  68 => 10,  66 => 7,  62 => 6,  58 => 5,  52 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"sv\">
    <head>
        <meta charset=\"UTF-8\">
        <title>{% block title %}Welcome!{% endblock %}</title>
        <link rel=\"icon\" href=\"{{ asset('build/images/favicon.ico') }}\">
{% block stylesheets %}
    {{ encore_entry_link_tags('app') }}
{% endblock %}
{% block javascripts %}
    {{ encore_entry_script_tags('app') }}
{% endblock %}
    </head>
    <body>
        <header>
            <nav id=\"navbar\">
                <ul>
                    <li><a href=\"{{ path('home') }}\">Hem</a></li> ·
                    <li><a href=\"{{ path('about') }}\">Om</a></li> ·
                    <li><a href=\"{{ path('report') }}\">Rapport</a></li> ·
                    <li><a href=\"{{ path('lucky') }}\">Tur</a></li> ·
                    <li><a href=\"{{ path('card') }}\">Kort</a></li> ·
                    <li><a href=\"{{ path('api') }}\">API:n</a></li>
                </ul>
                <ul>
                    <li><a href=\"{{ path('session') }}\">session</a><li> |
                    <li><a href=\"{{ path('session_delete') }}\">förstör</a></li>
                </ul>
            </nav>
        </header>
        <main class=\"main\">
            {% block body %}{% endblock %}
        </main>
        <footer>
            <p><a href=\"https://dougherty-dev.github.io/webapp-lager/\">Webapp</a>&nbsp;|
                <a href=\"https://www.student.bth.se/~nido24/dbwebb-kurser/mvc/me/report/public/\">MVC</a>&nbsp;|
                <a href=\"https://www.student.bth.se/~nido24/dbwebb-kurser/oopython/me/kmom06/yahtzee5/app.cgi\">OOPython</a>
                (<a href=\"https://www.student.bth.se/~nido24/dbwebb-kurser/oopython/me/kmom10/spellchecker/app.cgi/\">projekt</a>)&nbsp;|
                <a href=\"https://www.student.bth.se/~nido24/dbwebb-kurser/databas/me/redovisa/me.php\">DB</a>&nbsp;|
                <a href=\"https://www.student.bth.se/~nido24/dbwebb-kurser/js/me/public/\">JS</a>&nbsp;|
                <a href=\"https://www.student.bth.se/~nido24/dbwebb-kurser/design/me/portfolio/\">Design</a>
                (<a href=\"https://www.student.bth.se/~nido24/dbwebb-kurser/design/me/kmom10/\">projekt</a>)&nbsp;|
                <a href=\"https://www.student.bth.se/~nido24/dbwebb-kurser/webtec/me/report/public/me.php\">Webtec</a>
                (<a href=\"https://www.student.bth.se/~nido24/dbwebb-kurser/webtec/me/proj/public/home.php\">projekt</a>)</p>
            <p>© 2025 <span style=\"color: var(--orange);\">nido24</span></p>
        </footer>
    </body>
</html>
", "base.html.twig", "/Users/nik/Sites/dbwebb-kurser/mvc/me/report/templates/base.html.twig");
    }
}
