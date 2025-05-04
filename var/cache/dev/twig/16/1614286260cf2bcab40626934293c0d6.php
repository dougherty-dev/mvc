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

/* api.html.twig */
class __TwigTemplate_22f4ba80e54987595f8b81cd358fd73d extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "api.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "api.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "api.html.twig", 1);
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

        yield "Api:n";
        
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
        yield "    <section class=\"center\">
        <h1>Tillgängliga API:n</h1>
        <table class=\"left striped\">
            <tbody>
                <tr>
                    <th>Citat</th>
                    <td><button type=\"button\"><a href=\"";
        // line 12
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("quotation");
        yield "\">Slumpa citat.</a></button></td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <th>Kortlek</th>
                    <td><button type=\"button\"><a href=\"";
        // line 18
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_deck");
        yield "\">Visa ordnad kortlek</a></button></td>
                </tr>
                <tr>
                    <th>Blanda kortlek</th>
                    <td><form method=\"post\" action=\"";
        // line 22
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_deck_shuffle");
        yield "\">
                        <button type=\"submit\">Visa blandad kortlek</button>
                    </form>
                    </td>
                </tr>
                <tr>
                    <th>Dra ett kort ur leken</th>
                    <td><form method=\"post\" action=\"";
        // line 29
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_deck_draw");
        yield "\">
                        <button type=\"submit\">Dra kort</button>
                    </form>
                    </td>
                </tr>
                <tr>
                    <th>Dra flera kort</th>
                    <td><form method=\"post\" action=\"";
        // line 36
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_deck_draw_number_post", ["number" => 5]);
        yield "\">
                        <input type=\"number\" min=\"1\" name=\"number\" value=\"5\">
                        <button type=\"submit\">Dra kort</button>
                    </form>
                    </td>
                </tr>
                <tr>
                    <th>Dela kort till spelare</th>
                    <td>
                        <form method=\"post\" action=\"";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_deck_deal_players_cards_post", ["players" => 3, "cards" => 5]), "html", null, true);
        yield "\">
                            Spelare
                            <input type=\"number\" min=\"1\" name=\"players\" value=\"3\">
                            Kort
                            <input type=\"number\" min=\"1\" name=\"cards\" value=\"5\">
                            <button type=\"submit\">Dela kort</button>
                        </form>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <th>Kortspelet 21</a></th>
                    <td><button type=\"button\"><a href=\"";
        // line 58
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_game");
        yield "\">Aktuell ställning</a></button></td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <th>Bibliotek</a></th>
                    <td><button type=\"button\"><a href=\"";
        // line 64
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_library_books");
        yield "\">Visa böcker</a></button></td>
                </tr>
                <tr>
                    <th>ISBN: Visa bok</th>
                    <td><button type=\"button\"><a href=\"";
        // line 68
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_library_book_isbn", ["isbn" => "9782876837539"]);
        yield "\">9782876837539</a></button> <button type=\"button\"><a href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_library_book_isbn", ["isbn" => "9780380807345"]);
        yield "\">9780380807345</a></button> <button type=\"button\"><a href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_library_book_isbn", ["isbn" => "9781111111111"]);
        yield "\">❌ 9781111111111</a></button></td>
                </tr>
            </tbody>
        </table>
        <figure>
            <img src=\"";
        // line 73
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/chihiro-api.avif"), "html", null, true);
        yield "\" width=\"896\" alt=\"Chihiro\">
            <figcaption>@mos fastnar i en loop.</figcaption>
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
        return "api.html.twig";
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
        return array (  200 => 73,  188 => 68,  181 => 64,  172 => 58,  156 => 45,  144 => 36,  134 => 29,  124 => 22,  117 => 18,  108 => 12,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}Api:n{% endblock %}

{% block body %}
    <section class=\"center\">
        <h1>Tillgängliga API:n</h1>
        <table class=\"left striped\">
            <tbody>
                <tr>
                    <th>Citat</th>
                    <td><button type=\"button\"><a href=\"{{ path('quotation') }}\">Slumpa citat.</a></button></td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <th>Kortlek</th>
                    <td><button type=\"button\"><a href=\"{{ path('api_deck') }}\">Visa ordnad kortlek</a></button></td>
                </tr>
                <tr>
                    <th>Blanda kortlek</th>
                    <td><form method=\"post\" action=\"{{ path('api_deck_shuffle') }}\">
                        <button type=\"submit\">Visa blandad kortlek</button>
                    </form>
                    </td>
                </tr>
                <tr>
                    <th>Dra ett kort ur leken</th>
                    <td><form method=\"post\" action=\"{{ path('api_deck_draw') }}\">
                        <button type=\"submit\">Dra kort</button>
                    </form>
                    </td>
                </tr>
                <tr>
                    <th>Dra flera kort</th>
                    <td><form method=\"post\" action=\"{{ path('api_deck_draw_number_post', {'number': 5}) }}\">
                        <input type=\"number\" min=\"1\" name=\"number\" value=\"5\">
                        <button type=\"submit\">Dra kort</button>
                    </form>
                    </td>
                </tr>
                <tr>
                    <th>Dela kort till spelare</th>
                    <td>
                        <form method=\"post\" action=\"{{ path('api_deck_deal_players_cards_post', {'players': 3, 'cards': 5}) }}\">
                            Spelare
                            <input type=\"number\" min=\"1\" name=\"players\" value=\"3\">
                            Kort
                            <input type=\"number\" min=\"1\" name=\"cards\" value=\"5\">
                            <button type=\"submit\">Dela kort</button>
                        </form>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <th>Kortspelet 21</a></th>
                    <td><button type=\"button\"><a href=\"{{ path('api_game') }}\">Aktuell ställning</a></button></td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <th>Bibliotek</a></th>
                    <td><button type=\"button\"><a href=\"{{ path('api_library_books') }}\">Visa böcker</a></button></td>
                </tr>
                <tr>
                    <th>ISBN: Visa bok</th>
                    <td><button type=\"button\"><a href=\"{{ path('api_library_book_isbn', {'isbn': '9782876837539'}) }}\">9782876837539</a></button> <button type=\"button\"><a href=\"{{ path('api_library_book_isbn', {'isbn': '9780380807345'}) }}\">9780380807345</a></button> <button type=\"button\"><a href=\"{{ path('api_library_book_isbn', {'isbn': '9781111111111'}) }}\">❌ 9781111111111</a></button></td>
                </tr>
            </tbody>
        </table>
        <figure>
            <img src=\"{{ asset('build/images/chihiro-api.avif') }}\" width=\"896\" alt=\"Chihiro\">
            <figcaption>@mos fastnar i en loop.</figcaption>
        </figure>
    </section>
{% endblock %}
", "api.html.twig", "/Users/nik/Sites/dbwebb-kurser/mvc/me/report/templates/api.html.twig");
    }
}
