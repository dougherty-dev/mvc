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

/* dojo.html.twig */
class __TwigTemplate_cbd6a0c59a093ce14dc1a96006b5c14d extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dojo.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dojo.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "dojo.html.twig", 1);
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

        yield "21: Dojo";
        
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

        // line 7
        yield "            <section class=\"dojo\">
                <div class=\"dojobox\">
                    <h1>😼 Spelare</h1>
                    <table class=\"game_table\">
                        <tr>
                            <th>Saldo</th>
                            <th>Insats</th>
                        </tr>
                        <tr>
                            <td>";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 16, $this->source); })()), "session", [], "any", false, false, false, 16), "get", ["game"], "method", false, false, false, 16), "players", [], "any", false, false, false, 16), 0, [], "array", false, false, false, 16), "balance", [], "any", false, false, false, 16), "html", null, true);
        yield "</td>
                            <td>";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 17, $this->source); })()), "session", [], "any", false, false, false, 17), "get", ["game"], "method", false, false, false, 17), "players", [], "any", false, false, false, 17), 0, [], "array", false, false, false, 17), "bet", [], "any", false, false, false, 17), "html", null, true);
        yield "</td>
                        </tr>
                    </table>
                    <h2>Hand (";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 20, $this->source); })()), "session", [], "any", false, false, false, 20), "get", ["game"], "method", false, false, false, 20), "players", [], "any", false, false, false, 20), 0, [], "array", false, false, false, 20), "score", [], "any", false, false, false, 20), "html", null, true);
        yield ")</h2>
                    ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 21, $this->source); })()), "session", [], "any", false, false, false, 21), "get", ["game"], "method", false, false, false, 21), "players", [], "any", false, false, false, 21), 0, [], "array", false, false, false, 21), "hand", [], "any", false, false, false, 21), "hand", [], "any", false, false, false, 21));
        foreach ($context['_seq'] as $context["_key"] => $context["card"]) {
            // line 22
            yield "                    <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("build/images/cards/" . CoreExtension::getAttribute($this->env, $this->source, $context["card"], "value", [], "any", false, false, false, 22)) . ".svg")), "html", null, true);
            yield "\" width=\"100\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 22, $this->source); })()), "session", [], "any", false, false, false, 22), "get", ["deck_values"], "method", false, false, false, 22), CoreExtension::getAttribute($this->env, $this->source, $context["card"], "value", [], "any", false, false, false, 22), [], "array", false, false, false, 22), "html", null, true);
            yield "\" title=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 22, $this->source); })()), "session", [], "any", false, false, false, 22), "get", ["deck_text_values"], "method", false, false, false, 22), CoreExtension::getAttribute($this->env, $this->source, $context["card"], "value", [], "any", false, false, false, 22), [], "array", false, false, false, 22), "html", null, true);
            yield "\">
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['card'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        yield "                    ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 24, $this->source); })()), "session", [], "any", false, false, false, 24), "get", ["game"], "method", false, false, false, 24), "state", [], "any", false, false, false, 24) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 24, $this->source); })()), "session", [], "any", false, false, false, 24), "get", ["game"], "method", false, false, false, 24), "STATES", [], "any", false, false, false, 24), "player_initiates", [], "array", false, false, false, 24))) {
            // line 25
            yield "                    <div>
                        <form method=\"POST\" action=\"";
            // line 26
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game_player_draws_process");
            yield "\">
                            <input type=\"hidden\" name=\"player\" value=\"0\">
                            <button type=\"submit\" name=\"draw\" value=\"draw\">Dra</button>
                        </form>
                    </div>
                    ";
        }
        // line 32
        yield "                    ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 32, $this->source); })()), "session", [], "any", false, false, false, 32), "get", ["game"], "method", false, false, false, 32), "state", [], "any", false, false, false, 32) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 32, $this->source); })()), "session", [], "any", false, false, false, 32), "get", ["game"], "method", false, false, false, 32), "STATES", [], "any", false, false, false, 32), "player_draws", [], "array", false, false, false, 32))) {
            // line 33
            yield "                    <div>
                        <form method=\"POST\" action=\"";
            // line 34
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game_player_draws_process");
            yield "\">
                            <input type=\"hidden\" name=\"player\" value=\"0\">
                            <button type=\"submit\" name=\"draw\" value=\"draw\">Dra</button>
                            <button type=\"submit\" name=\"stay\" value=\"stay\">Stanna</button>
                        </form>
                    </div>
                    ";
        }
        // line 41
        yield "                    ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 41, $this->source); })()), "session", [], "any", false, false, false, 41), "get", ["game"], "method", false, false, false, 41), "state", [], "any", false, false, false, 41) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 41, $this->source); })()), "session", [], "any", false, false, false, 41), "get", ["game"], "method", false, false, false, 41), "STATES", [], "any", false, false, false, 41), "player_bets", [], "array", false, false, false, 41))) {
            // line 42
            yield "                    <div>
                        <form method=\"POST\" action=\"";
            // line 43
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game_player_bets_process");
            yield "\">
                            <input type=\"number\" name=\"bet\" min=\"1\" max=\"";
            // line 44
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(min(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 44, $this->source); })()), "session", [], "any", false, false, false, 44), "get", ["game"], "method", false, false, false, 44), "players", [], "any", false, false, false, 44), 0, [], "array", false, false, false, 44), "balance", [], "any", false, false, false, 44), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 44, $this->source); })()), "session", [], "any", false, false, false, 44), "get", ["game"], "method", false, false, false, 44), "players", [], "any", false, false, false, 44), 0, [], "array", false, false, false, 44), "balance", [], "any", false, false, false, 44)), "html", null, true);
            yield "\" value=\"1\">
                            <button type=\"submit\">Satsa</button>
                        </form>
                    </div>
                    ";
        }
        // line 49
        yield "                </div>
                <div class=\"dojo_midsection\">
                    <h1>🃏 ";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 51, $this->source); })()), "session", [], "any", false, false, false, 51), "get", ["game"], "method", false, false, false, 51), "deck", [], "any", false, false, false, 51), "deck", [], "any", false, false, false, 51)), "html", null, true);
        yield "</h1>
                    <p>";
        // line 52
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 52, $this->source); })()), "session", [], "any", false, false, false, 52), "get", ["game"], "method", false, false, false, 52), "state", [], "any", false, false, false, 52), "html", null, true);
        yield "</p>
                    ";
        // line 53
        if (((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 54
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 54, $this->source); })()), "session", [], "any", false, false, false, 54), "get", ["game"], "method", false, false, false, 54), "state", [], "any", false, false, false, 54) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 54, $this->source); })()), "session", [], "any", false, false, false, 54), "get", ["game"], "method", false, false, false, 54), "STATES", [], "any", false, false, false, 54), "bank_wins", [], "array", false, false, false, 54)) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 55
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 55, $this->source); })()), "session", [], "any", false, false, false, 55), "get", ["game"], "method", false, false, false, 55), "state", [], "any", false, false, false, 55) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 55, $this->source); })()), "session", [], "any", false, false, false, 55), "get", ["game"], "method", false, false, false, 55), "STATES", [], "any", false, false, false, 55), "player_wins", [], "array", false, false, false, 55))) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 56
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 56, $this->source); })()), "session", [], "any", false, false, false, 56), "get", ["game"], "method", false, false, false, 56), "state", [], "any", false, false, false, 56) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 56, $this->source); })()), "session", [], "any", false, false, false, 56), "get", ["game"], "method", false, false, false, 56), "STATES", [], "any", false, false, false, 56), "player_busted", [], "array", false, false, false, 56))) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 57
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 57, $this->source); })()), "session", [], "any", false, false, false, 57), "get", ["game"], "method", false, false, false, 57), "state", [], "any", false, false, false, 57) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 57, $this->source); })()), "session", [], "any", false, false, false, 57), "get", ["game"], "method", false, false, false, 57), "STATES", [], "any", false, false, false, 57), "bank_busted", [], "array", false, false, false, 57)))) {
            // line 60
            yield "                    <div>
                        <form method=\"POST\" action=\"";
            // line 61
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game_player_wins_process");
            yield "\">
                            <button type=\"submit\" name=\"continue\" value=\"continue\">Fortsätt</button>
                        </form>
                    </div>
                    ";
        }
        // line 66
        yield "                </div>
                <div class=\"dojobox\">
                    <h1>🏦 Bank</h1>
                    <table class=\"game_table\">
                        <tr>
                            <th>Saldo</th>
                            <th>Insats</th>
                        </tr>
                        <tr>
                            <td>";
        // line 75
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 75, $this->source); })()), "session", [], "any", false, false, false, 75), "get", ["game"], "method", false, false, false, 75), "players", [], "any", false, false, false, 75), 1, [], "array", false, false, false, 75), "balance", [], "any", false, false, false, 75), "html", null, true);
        yield "</td>
                            <td>";
        // line 76
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 76, $this->source); })()), "session", [], "any", false, false, false, 76), "get", ["game"], "method", false, false, false, 76), "players", [], "any", false, false, false, 76), 1, [], "array", false, false, false, 76), "bet", [], "any", false, false, false, 76), "html", null, true);
        yield "</td>
                        </tr>
                    </table>
                    <h2>Hand (";
        // line 79
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 79, $this->source); })()), "session", [], "any", false, false, false, 79), "get", ["game"], "method", false, false, false, 79), "players", [], "any", false, false, false, 79), 1, [], "array", false, false, false, 79), "score", [], "any", false, false, false, 79), "html", null, true);
        yield ")</h2>
                    ";
        // line 80
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 80, $this->source); })()), "session", [], "any", false, false, false, 80), "get", ["game"], "method", false, false, false, 80), "players", [], "any", false, false, false, 80), 1, [], "array", false, false, false, 80), "hand", [], "any", false, false, false, 80), "hand", [], "any", false, false, false, 80));
        foreach ($context['_seq'] as $context["_key"] => $context["card"]) {
            // line 81
            yield "                    <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("build/images/cards/" . CoreExtension::getAttribute($this->env, $this->source, $context["card"], "value", [], "any", false, false, false, 81)) . ".svg")), "html", null, true);
            yield "\" width=\"100\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 81, $this->source); })()), "session", [], "any", false, false, false, 81), "get", ["deck_values"], "method", false, false, false, 81), CoreExtension::getAttribute($this->env, $this->source, $context["card"], "value", [], "any", false, false, false, 81), [], "array", false, false, false, 81), "html", null, true);
            yield "\" title=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 81, $this->source); })()), "session", [], "any", false, false, false, 81), "get", ["deck_text_values"], "method", false, false, false, 81), CoreExtension::getAttribute($this->env, $this->source, $context["card"], "value", [], "any", false, false, false, 81), [], "array", false, false, false, 81), "html", null, true);
            yield "\">
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['card'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 83
        yield "                    ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 83, $this->source); })()), "session", [], "any", false, false, false, 83), "get", ["game"], "method", false, false, false, 83), "state", [], "any", false, false, false, 83) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 83, $this->source); })()), "session", [], "any", false, false, false, 83), "get", ["game"], "method", false, false, false, 83), "STATES", [], "any", false, false, false, 83), "bank_draws", [], "array", false, false, false, 83))) {
            // line 84
            yield "                    <div>
                        <form method=\"POST\" action=\"";
            // line 85
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game_player_draws_process");
            yield "\">
                            <input type=\"hidden\" name=\"player\" value=\"1\">
                            <button type=\"submit\" name=\"draw\" value=\"draw\">Dra</button>
                            <button type=\"submit\" name=\"stay\" value=\"stay\">Stanna</button>
                        </form>
                    </div>
                    ";
        }
        // line 92
        yield "                </div>
            </section>
            <section>
                <div>
                ";
        // line 96
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::sort($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 96, $this->source); })()), "session", [], "any", false, false, false, 96), "get", ["game"], "method", false, false, false, 96), "deck", [], "any", false, false, false, 96), "deck", [], "any", false, false, false, 96)));
        foreach ($context['_seq'] as $context["_key"] => $context["card"]) {
            // line 97
            yield "                    <span><img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("build/images/cards/" . CoreExtension::getAttribute($this->env, $this->source, $context["card"], "value", [], "any", false, false, false, 97)) . ".svg")), "html", null, true);
            yield "\" width=\"50\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 97, $this->source); })()), "session", [], "any", false, false, false, 97), "get", ["deck_values"], "method", false, false, false, 97), CoreExtension::getAttribute($this->env, $this->source, $context["card"], "value", [], "any", false, false, false, 97), [], "array", false, false, false, 97), "html", null, true);
            yield "\" title=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 97, $this->source); })()), "session", [], "any", false, false, false, 97), "get", ["deck_text_values"], "method", false, false, false, 97), CoreExtension::getAttribute($this->env, $this->source, $context["card"], "value", [], "any", false, false, false, 97), [], "array", false, false, false, 97), "html", null, true);
            yield "\"></span>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['card'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 99
        yield "                </div>
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
        return "dojo.html.twig";
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
        return array (  301 => 99,  288 => 97,  284 => 96,  278 => 92,  268 => 85,  265 => 84,  262 => 83,  249 => 81,  245 => 80,  241 => 79,  235 => 76,  231 => 75,  220 => 66,  212 => 61,  209 => 60,  207 => 57,  206 => 56,  205 => 55,  204 => 54,  203 => 53,  199 => 52,  195 => 51,  191 => 49,  183 => 44,  179 => 43,  176 => 42,  173 => 41,  163 => 34,  160 => 33,  157 => 32,  148 => 26,  145 => 25,  142 => 24,  129 => 22,  125 => 21,  121 => 20,  115 => 17,  111 => 16,  100 => 7,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}21: Dojo{% endblock %}

{% block body %}
{#{ dump(app.session.all) }#}
            <section class=\"dojo\">
                <div class=\"dojobox\">
                    <h1>😼 Spelare</h1>
                    <table class=\"game_table\">
                        <tr>
                            <th>Saldo</th>
                            <th>Insats</th>
                        </tr>
                        <tr>
                            <td>{{ app.session.get('game').players[0].balance }}</td>
                            <td>{{ app.session.get('game').players[0].bet }}</td>
                        </tr>
                    </table>
                    <h2>Hand ({{ app.session.get('game').players[0].score }})</h2>
                    {% for card in app.session.get('game').players[0].hand.hand %}
                    <img src=\"{{ asset('build/images/cards/'~card.value~'.svg') }}\" width=\"100\" alt=\"{{ app.session.get('deck_values')[card.value] }}\" title=\"{{ app.session.get('deck_text_values')[card.value] }}\">
                    {% endfor %}
                    {% if app.session.get('game').state == app.session.get('game').STATES['player_initiates'] %}
                    <div>
                        <form method=\"POST\" action=\"{{ path('game_player_draws_process') }}\">
                            <input type=\"hidden\" name=\"player\" value=\"0\">
                            <button type=\"submit\" name=\"draw\" value=\"draw\">Dra</button>
                        </form>
                    </div>
                    {% endif %}
                    {% if app.session.get('game').state == app.session.get('game').STATES['player_draws'] %}
                    <div>
                        <form method=\"POST\" action=\"{{ path('game_player_draws_process') }}\">
                            <input type=\"hidden\" name=\"player\" value=\"0\">
                            <button type=\"submit\" name=\"draw\" value=\"draw\">Dra</button>
                            <button type=\"submit\" name=\"stay\" value=\"stay\">Stanna</button>
                        </form>
                    </div>
                    {% endif %}
                    {% if app.session.get('game').state == app.session.get('game').STATES['player_bets'] %}
                    <div>
                        <form method=\"POST\" action=\"{{ path('game_player_bets_process') }}\">
                            <input type=\"number\" name=\"bet\" min=\"1\" max=\"{{ min(app.session.get('game').players[0].balance, app.session.get('game').players[0].balance) }}\" value=\"1\">
                            <button type=\"submit\">Satsa</button>
                        </form>
                    </div>
                    {% endif %}
                </div>
                <div class=\"dojo_midsection\">
                    <h1>🃏 {{ app.session.get('game').deck.deck | length }}</h1>
                    <p>{{ app.session.get('game').state }}</p>
                    {% if (
                        app.session.get('game').state == app.session.get('game').STATES['bank_wins']
                        or app.session.get('game').state == app.session.get('game').STATES['player_wins']
                        or app.session.get('game').state == app.session.get('game').STATES['player_busted']
                        or app.session.get('game').state == app.session.get('game').STATES['bank_busted']
                        )
                    %}
                    <div>
                        <form method=\"POST\" action=\"{{ path('game_player_wins_process') }}\">
                            <button type=\"submit\" name=\"continue\" value=\"continue\">Fortsätt</button>
                        </form>
                    </div>
                    {% endif %}
                </div>
                <div class=\"dojobox\">
                    <h1>🏦 Bank</h1>
                    <table class=\"game_table\">
                        <tr>
                            <th>Saldo</th>
                            <th>Insats</th>
                        </tr>
                        <tr>
                            <td>{{ app.session.get('game').players[1].balance }}</td>
                            <td>{{ app.session.get('game').players[1].bet }}</td>
                        </tr>
                    </table>
                    <h2>Hand ({{ app.session.get('game').players[1].score }})</h2>
                    {% for card in app.session.get('game').players[1].hand.hand %}
                    <img src=\"{{ asset('build/images/cards/'~card.value~'.svg') }}\" width=\"100\" alt=\"{{ app.session.get('deck_values')[card.value] }}\" title=\"{{ app.session.get('deck_text_values')[card.value] }}\">
                    {% endfor %}
                    {% if app.session.get('game').state == app.session.get('game').STATES['bank_draws'] %}
                    <div>
                        <form method=\"POST\" action=\"{{ path('game_player_draws_process') }}\">
                            <input type=\"hidden\" name=\"player\" value=\"1\">
                            <button type=\"submit\" name=\"draw\" value=\"draw\">Dra</button>
                            <button type=\"submit\" name=\"stay\" value=\"stay\">Stanna</button>
                        </form>
                    </div>
                    {% endif %}
                </div>
            </section>
            <section>
                <div>
                {% for card in app.session.get('game').deck.deck|sort %}
                    <span><img src=\"{{ asset('build/images/cards/'~card.value~'.svg') }}\" width=\"50\" alt=\"{{ app.session.get('deck_values')[card.value] }}\" title=\"{{ app.session.get('deck_text_values')[card.value] }}\"></span>
                {% endfor %}
                </div>
            </section>
{% endblock %}
", "dojo.html.twig", "/Users/nik/Sites/dbwebb-kurser/mvc/me/report/templates/dojo.html.twig");
    }
}
