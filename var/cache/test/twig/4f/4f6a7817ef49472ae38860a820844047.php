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
class __TwigTemplate_d142cd9ece6be410219e7c75de6a53ae extends Template
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
            yield "                    <p>
                        <form method=\"POST\" action=\"";
            // line 26
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game_player_draws_process");
            yield "\">
                            <input type=\"hidden\" name=\"player\" value=\"0\">
                            <button type=\"submit\" name=\"draw\" value=\"draw\">Dra kort</button>
                        </form>
                    </p>
                    ";
        }
        // line 32
        yield "                    ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 32, $this->source); })()), "session", [], "any", false, false, false, 32), "get", ["game"], "method", false, false, false, 32), "state", [], "any", false, false, false, 32) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 32, $this->source); })()), "session", [], "any", false, false, false, 32), "get", ["game"], "method", false, false, false, 32), "STATES", [], "any", false, false, false, 32), "player_draws", [], "array", false, false, false, 32))) {
            // line 33
            yield "                    <p>
                        <form method=\"POST\" action=\"";
            // line 34
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game_player_draws_process");
            yield "\">
                            <input type=\"hidden\" name=\"player\" value=\"0\">
                            <button type=\"submit\" name=\"draw\" value=\"draw\">Dra kort</button>
                            ";
            // line 37
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 37, $this->source); })()), "session", [], "any", false, false, false, 37), "get", ["game"], "method", false, false, false, 37), "players", [], "any", false, false, false, 37), 0, [], "array", false, false, false, 37), "hand", [], "any", false, false, false, 37), "handValues", [], "method", false, false, false, 37)) > 1)) {
                // line 38
                yield "                            <button type=\"submit\" name=\"stay\" value=\"stay\">Stanna</button>
                            ";
            }
            // line 40
            yield "                        </form>
                    </p>
                    ";
        }
        // line 43
        yield "                    ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 43, $this->source); })()), "session", [], "any", false, false, false, 43), "get", ["game"], "method", false, false, false, 43), "state", [], "any", false, false, false, 43) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 43, $this->source); })()), "session", [], "any", false, false, false, 43), "get", ["game"], "method", false, false, false, 43), "STATES", [], "any", false, false, false, 43), "player_bets", [], "array", false, false, false, 43))) {
            // line 44
            yield "                    <p>
                        <form method=\"POST\" action=\"";
            // line 45
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game_player_bets_process");
            yield "\">
                            <input type=\"number\" name=\"bet\" min=\"1\" max=\"";
            // line 46
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(min(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 46, $this->source); })()), "session", [], "any", false, false, false, 46), "get", ["game"], "method", false, false, false, 46), "players", [], "any", false, false, false, 46), 0, [], "array", false, false, false, 46), "balance", [], "any", false, false, false, 46), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 46, $this->source); })()), "session", [], "any", false, false, false, 46), "get", ["game"], "method", false, false, false, 46), "players", [], "any", false, false, false, 46), 1, [], "array", false, false, false, 46), "balance", [], "any", false, false, false, 46)), "html", null, true);
            yield "\" value=\"1\">
                            <button type=\"submit\">Satsa</button>
                        </form>
                    </p>
                    ";
        }
        // line 51
        yield "                </div>
                <div class=\"dojo_midsection\">
                    <h1>🃏 ";
        // line 53
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 53, $this->source); })()), "session", [], "any", false, false, false, 53), "get", ["game"], "method", false, false, false, 53), "deck", [], "any", false, false, false, 53), "remainingCards", [], "method", false, false, false, 53), "html", null, true);
        yield "</h1>
                    <p>";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 54, $this->source); })()), "session", [], "any", false, false, false, 54), "get", ["game"], "method", false, false, false, 54), "state", [], "any", false, false, false, 54), "html", null, true);
        yield "</p>
                    <table class=\"game_table\">
                        <tr>
                            <th>P(&le; 21):</th>
                            <td class=\"upto21 right\">";
        // line 58
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 58, $this->source); })()), "session", [], "any", false, false, false, 58), "get", ["game"], "method", false, false, false, 58), "cardStats", [], "any", false, false, false, 58), 0, [], "array", false, false, false, 58), "html", null, true);
        yield " %</td>
                        </tr>
                        <tr>
                            <th>P(&gt; 21):</th>
                            <td class=\"over21 right\">";
        // line 62
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 62, $this->source); })()), "session", [], "any", false, false, false, 62), "get", ["game"], "method", false, false, false, 62), "cardStats", [], "any", false, false, false, 62), 1, [], "array", false, false, false, 62), "html", null, true);
        yield " %</td>
                        </tr>
                    </table>
                    ";
        // line 65
        if (((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 66
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 66, $this->source); })()), "session", [], "any", false, false, false, 66), "get", ["game"], "method", false, false, false, 66), "state", [], "any", false, false, false, 66) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 66, $this->source); })()), "session", [], "any", false, false, false, 66), "get", ["game"], "method", false, false, false, 66), "STATES", [], "any", false, false, false, 66), "bank_wins", [], "array", false, false, false, 66)) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 67
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 67, $this->source); })()), "session", [], "any", false, false, false, 67), "get", ["game"], "method", false, false, false, 67), "state", [], "any", false, false, false, 67) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 67, $this->source); })()), "session", [], "any", false, false, false, 67), "get", ["game"], "method", false, false, false, 67), "STATES", [], "any", false, false, false, 67), "player_wins", [], "array", false, false, false, 67))) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 68
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 68, $this->source); })()), "session", [], "any", false, false, false, 68), "get", ["game"], "method", false, false, false, 68), "state", [], "any", false, false, false, 68) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 68, $this->source); })()), "session", [], "any", false, false, false, 68), "get", ["game"], "method", false, false, false, 68), "STATES", [], "any", false, false, false, 68), "player_busted", [], "array", false, false, false, 68))) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 69
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 69, $this->source); })()), "session", [], "any", false, false, false, 69), "get", ["game"], "method", false, false, false, 69), "state", [], "any", false, false, false, 69) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 69, $this->source); })()), "session", [], "any", false, false, false, 69), "get", ["game"], "method", false, false, false, 69), "STATES", [], "any", false, false, false, 69), "bank_busted", [], "array", false, false, false, 69)))) {
            // line 72
            yield "                    <p>
                        <form method=\"POST\" action=\"";
            // line 73
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game_player_wins_process");
            yield "\">
                            <button type=\"submit\" name=\"continue\" value=\"continue\">Fortsätt</button>
                        </form>
                    </p>
                    ";
        }
        // line 78
        yield "                    ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 78, $this->source); })()), "session", [], "any", false, false, false, 78), "get", ["game"], "method", false, false, false, 78), "state", [], "any", false, false, false, 78) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 78, $this->source); })()), "session", [], "any", false, false, false, 78), "get", ["game"], "method", false, false, false, 78), "STATES", [], "any", false, false, false, 78), "game_over", [], "array", false, false, false, 78))) {
            // line 79
            yield "                    <p>
                        <form method=\"POST\" action=\"";
            // line 80
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game_over_process");
            yield "\">
                            <button type=\"submit\" name=\"game_over\" value=\"game_over\">Avsluta</button>
                        </form>
                    </p>
                    ";
        }
        // line 85
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
        // line 94
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 94, $this->source); })()), "session", [], "any", false, false, false, 94), "get", ["game"], "method", false, false, false, 94), "players", [], "any", false, false, false, 94), 1, [], "array", false, false, false, 94), "balance", [], "any", false, false, false, 94), "html", null, true);
        yield "</td>
                            <td>";
        // line 95
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 95, $this->source); })()), "session", [], "any", false, false, false, 95), "get", ["game"], "method", false, false, false, 95), "players", [], "any", false, false, false, 95), 1, [], "array", false, false, false, 95), "bet", [], "any", false, false, false, 95), "html", null, true);
        yield "</td>
                        </tr>
                    </table>
                    <h2>Hand (";
        // line 98
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 98, $this->source); })()), "session", [], "any", false, false, false, 98), "get", ["game"], "method", false, false, false, 98), "players", [], "any", false, false, false, 98), 1, [], "array", false, false, false, 98), "score", [], "any", false, false, false, 98), "html", null, true);
        yield ")</h2>
                    ";
        // line 99
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 99, $this->source); })()), "session", [], "any", false, false, false, 99), "get", ["game"], "method", false, false, false, 99), "players", [], "any", false, false, false, 99), 1, [], "array", false, false, false, 99), "hand", [], "any", false, false, false, 99), "hand", [], "any", false, false, false, 99));
        foreach ($context['_seq'] as $context["_key"] => $context["card"]) {
            // line 100
            yield "                    <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("build/images/cards/" . CoreExtension::getAttribute($this->env, $this->source, $context["card"], "value", [], "any", false, false, false, 100)) . ".svg")), "html", null, true);
            yield "\" width=\"100\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 100, $this->source); })()), "session", [], "any", false, false, false, 100), "get", ["deck_values"], "method", false, false, false, 100), CoreExtension::getAttribute($this->env, $this->source, $context["card"], "value", [], "any", false, false, false, 100), [], "array", false, false, false, 100), "html", null, true);
            yield "\" title=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 100, $this->source); })()), "session", [], "any", false, false, false, 100), "get", ["deck_text_values"], "method", false, false, false, 100), CoreExtension::getAttribute($this->env, $this->source, $context["card"], "value", [], "any", false, false, false, 100), [], "array", false, false, false, 100), "html", null, true);
            yield "\">
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['card'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        yield "                </div>
            </section>
            <section class=\"center\">
                <div>
                ";
        // line 106
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 106, $this->source); })()), "session", [], "any", false, false, false, 106), "get", ["game"], "method", false, false, false, 106), "showDeck", [], "any", false, false, false, 106)) {
            // line 107
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::sort($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 107, $this->source); })()), "session", [], "any", false, false, false, 107), "get", ["game"], "method", false, false, false, 107), "deck", [], "any", false, false, false, 107), "deck", [], "any", false, false, false, 107)));
            foreach ($context['_seq'] as $context["_key"] => $context["card"]) {
                // line 108
                yield "                    <span><img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("build/images/cards/" . CoreExtension::getAttribute($this->env, $this->source, $context["card"], "value", [], "any", false, false, false, 108)) . ".svg")), "html", null, true);
                yield "\" width=\"50\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 108, $this->source); })()), "session", [], "any", false, false, false, 108), "get", ["deck_values"], "method", false, false, false, 108), CoreExtension::getAttribute($this->env, $this->source, $context["card"], "value", [], "any", false, false, false, 108), [], "array", false, false, false, 108), "html", null, true);
                yield "\" title=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 108, $this->source); })()), "session", [], "any", false, false, false, 108), "get", ["deck_text_values"], "method", false, false, false, 108), CoreExtension::getAttribute($this->env, $this->source, $context["card"], "value", [], "any", false, false, false, 108), [], "array", false, false, false, 108), "html", null, true);
                yield "\"></span>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['card'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 110
            yield "                ";
        }
        // line 111
        yield "                </div>
            </section>
            <section class=\"center\">
                <form method=\"POST\" action=\"";
        // line 114
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game_options_process");
        yield "\">
                    AI-bank <input type=\"checkbox\" name=\"bankIntelligence\"";
        // line 115
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 115, $this->source); })()), "session", [], "any", false, false, false, 115), "get", ["game"], "method", false, false, false, 115), "bankIntelligence", [], "any", false, false, false, 115), "html", null, true);
        yield "> |
                    Kortlek <input type=\"checkbox\" name=\"showDeck\"";
        // line 116
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 116, $this->source); })()), "session", [], "any", false, false, false, 116), "get", ["game"], "method", false, false, false, 116), "showDeck", [], "any", false, false, false, 116), "html", null, true);
        yield "> |
                    <button type=\"submit\" name=\"options\" value=\"options\">Spara</button>
                </form>
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
        return array (  341 => 116,  337 => 115,  333 => 114,  328 => 111,  325 => 110,  312 => 108,  307 => 107,  305 => 106,  299 => 102,  286 => 100,  282 => 99,  278 => 98,  272 => 95,  268 => 94,  257 => 85,  249 => 80,  246 => 79,  243 => 78,  235 => 73,  232 => 72,  230 => 69,  229 => 68,  228 => 67,  227 => 66,  226 => 65,  220 => 62,  213 => 58,  206 => 54,  202 => 53,  198 => 51,  190 => 46,  186 => 45,  183 => 44,  180 => 43,  175 => 40,  171 => 38,  169 => 37,  163 => 34,  160 => 33,  157 => 32,  148 => 26,  145 => 25,  142 => 24,  129 => 22,  125 => 21,  121 => 20,  115 => 17,  111 => 16,  100 => 7,  87 => 5,  64 => 3,  41 => 1,);
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
                    <p>
                        <form method=\"POST\" action=\"{{ path('game_player_draws_process') }}\">
                            <input type=\"hidden\" name=\"player\" value=\"0\">
                            <button type=\"submit\" name=\"draw\" value=\"draw\">Dra kort</button>
                        </form>
                    </p>
                    {% endif %}
                    {% if app.session.get('game').state == app.session.get('game').STATES['player_draws'] %}
                    <p>
                        <form method=\"POST\" action=\"{{ path('game_player_draws_process') }}\">
                            <input type=\"hidden\" name=\"player\" value=\"0\">
                            <button type=\"submit\" name=\"draw\" value=\"draw\">Dra kort</button>
                            {% if app.session.get('game').players[0].hand.handValues() | length > 1 %}
                            <button type=\"submit\" name=\"stay\" value=\"stay\">Stanna</button>
                            {% endif %}
                        </form>
                    </p>
                    {% endif %}
                    {% if app.session.get('game').state == app.session.get('game').STATES['player_bets'] %}
                    <p>
                        <form method=\"POST\" action=\"{{ path('game_player_bets_process') }}\">
                            <input type=\"number\" name=\"bet\" min=\"1\" max=\"{{ min(app.session.get('game').players[0].balance, app.session.get('game').players[1].balance) }}\" value=\"1\">
                            <button type=\"submit\">Satsa</button>
                        </form>
                    </p>
                    {% endif %}
                </div>
                <div class=\"dojo_midsection\">
                    <h1>🃏 {{ app.session.get('game').deck.remainingCards() }}</h1>
                    <p>{{ app.session.get('game').state }}</p>
                    <table class=\"game_table\">
                        <tr>
                            <th>P(&le; 21):</th>
                            <td class=\"upto21 right\">{{ app.session.get('game').cardStats[0] }} %</td>
                        </tr>
                        <tr>
                            <th>P(&gt; 21):</th>
                            <td class=\"over21 right\">{{ app.session.get('game').cardStats[1] }} %</td>
                        </tr>
                    </table>
                    {% if (
                        app.session.get('game').state == app.session.get('game').STATES['bank_wins']
                        or app.session.get('game').state == app.session.get('game').STATES['player_wins']
                        or app.session.get('game').state == app.session.get('game').STATES['player_busted']
                        or app.session.get('game').state == app.session.get('game').STATES['bank_busted']
                        )
                    %}
                    <p>
                        <form method=\"POST\" action=\"{{ path('game_player_wins_process') }}\">
                            <button type=\"submit\" name=\"continue\" value=\"continue\">Fortsätt</button>
                        </form>
                    </p>
                    {% endif %}
                    {% if (app.session.get('game').state == app.session.get('game').STATES['game_over']) %}
                    <p>
                        <form method=\"POST\" action=\"{{ path('game_over_process') }}\">
                            <button type=\"submit\" name=\"game_over\" value=\"game_over\">Avsluta</button>
                        </form>
                    </p>
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
                </div>
            </section>
            <section class=\"center\">
                <div>
                {% if app.session.get('game').showDeck %}
                {% for card in app.session.get('game').deck.deck|sort %}
                    <span><img src=\"{{ asset('build/images/cards/'~card.value~'.svg') }}\" width=\"50\" alt=\"{{ app.session.get('deck_values')[card.value] }}\" title=\"{{ app.session.get('deck_text_values')[card.value] }}\"></span>
                {% endfor %}
                {% endif %}
                </div>
            </section>
            <section class=\"center\">
                <form method=\"POST\" action=\"{{ path('game_options_process') }}\">
                    AI-bank <input type=\"checkbox\" name=\"bankIntelligence\"{{ app.session.get('game').bankIntelligence }}> |
                    Kortlek <input type=\"checkbox\" name=\"showDeck\"{{ app.session.get('game').showDeck }}> |
                    <button type=\"submit\" name=\"options\" value=\"options\">Spara</button>
                </form>
            </section>
{% endblock %}
", "dojo.html.twig", "/Users/nik/Sites/dbwebb-kurser/mvc/me/report/templates/dojo.html.twig");
    }
}
