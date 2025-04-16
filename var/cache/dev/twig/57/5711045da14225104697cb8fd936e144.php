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
                            ";
            // line 37
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 37, $this->source); })()), "session", [], "any", false, false, false, 37), "get", ["game"], "method", false, false, false, 37), "players", [], "any", false, false, false, 37), 0, [], "array", false, false, false, 37), "hand", [], "any", false, false, false, 37), "handValues", [], "method", false, false, false, 37)) > 1)) {
                // line 38
                yield "                            <button type=\"submit\" name=\"stay\" value=\"stay\">Stanna</button>
                            ";
            }
            // line 40
            yield "                        </form>
                    </div>
                    ";
        }
        // line 43
        yield "                    ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 43, $this->source); })()), "session", [], "any", false, false, false, 43), "get", ["game"], "method", false, false, false, 43), "state", [], "any", false, false, false, 43) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 43, $this->source); })()), "session", [], "any", false, false, false, 43), "get", ["game"], "method", false, false, false, 43), "STATES", [], "any", false, false, false, 43), "player_bets", [], "array", false, false, false, 43))) {
            // line 44
            yield "                    <div>
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
                    </div>
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
                    ";
        // line 55
        if (((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 56
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 56, $this->source); })()), "session", [], "any", false, false, false, 56), "get", ["game"], "method", false, false, false, 56), "state", [], "any", false, false, false, 56) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 56, $this->source); })()), "session", [], "any", false, false, false, 56), "get", ["game"], "method", false, false, false, 56), "STATES", [], "any", false, false, false, 56), "bank_wins", [], "array", false, false, false, 56)) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 57
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 57, $this->source); })()), "session", [], "any", false, false, false, 57), "get", ["game"], "method", false, false, false, 57), "state", [], "any", false, false, false, 57) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 57, $this->source); })()), "session", [], "any", false, false, false, 57), "get", ["game"], "method", false, false, false, 57), "STATES", [], "any", false, false, false, 57), "player_wins", [], "array", false, false, false, 57))) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 58
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 58, $this->source); })()), "session", [], "any", false, false, false, 58), "get", ["game"], "method", false, false, false, 58), "state", [], "any", false, false, false, 58) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 58, $this->source); })()), "session", [], "any", false, false, false, 58), "get", ["game"], "method", false, false, false, 58), "STATES", [], "any", false, false, false, 58), "player_busted", [], "array", false, false, false, 58))) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 59
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 59, $this->source); })()), "session", [], "any", false, false, false, 59), "get", ["game"], "method", false, false, false, 59), "state", [], "any", false, false, false, 59) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 59, $this->source); })()), "session", [], "any", false, false, false, 59), "get", ["game"], "method", false, false, false, 59), "STATES", [], "any", false, false, false, 59), "bank_busted", [], "array", false, false, false, 59)))) {
            // line 62
            yield "                    <div>
                        <form method=\"POST\" action=\"";
            // line 63
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game_player_wins_process");
            yield "\">
                            <button type=\"submit\" name=\"continue\" value=\"continue\">Fortsätt</button>
                        </form>
                    </div>
                    ";
        }
        // line 68
        yield "                    ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 68, $this->source); })()), "session", [], "any", false, false, false, 68), "get", ["game"], "method", false, false, false, 68), "state", [], "any", false, false, false, 68) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 68, $this->source); })()), "session", [], "any", false, false, false, 68), "get", ["game"], "method", false, false, false, 68), "STATES", [], "any", false, false, false, 68), "game_over", [], "array", false, false, false, 68))) {
            // line 69
            yield "                    <div>
                        <form method=\"POST\" action=\"";
            // line 70
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game_over_process");
            yield "\">
                            <button type=\"submit\" name=\"game_over\" value=\"game_over\">SLUT</button>
                        </form>
                    </div>
                    ";
        }
        // line 75
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
        // line 84
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 84, $this->source); })()), "session", [], "any", false, false, false, 84), "get", ["game"], "method", false, false, false, 84), "players", [], "any", false, false, false, 84), 1, [], "array", false, false, false, 84), "balance", [], "any", false, false, false, 84), "html", null, true);
        yield "</td>
                            <td>";
        // line 85
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 85, $this->source); })()), "session", [], "any", false, false, false, 85), "get", ["game"], "method", false, false, false, 85), "players", [], "any", false, false, false, 85), 1, [], "array", false, false, false, 85), "bet", [], "any", false, false, false, 85), "html", null, true);
        yield "</td>
                        </tr>
                    </table>
                    <h2>Hand (";
        // line 88
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 88, $this->source); })()), "session", [], "any", false, false, false, 88), "get", ["game"], "method", false, false, false, 88), "players", [], "any", false, false, false, 88), 1, [], "array", false, false, false, 88), "score", [], "any", false, false, false, 88), "html", null, true);
        yield ")</h2>
                    ";
        // line 89
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 89, $this->source); })()), "session", [], "any", false, false, false, 89), "get", ["game"], "method", false, false, false, 89), "players", [], "any", false, false, false, 89), 1, [], "array", false, false, false, 89), "hand", [], "any", false, false, false, 89), "hand", [], "any", false, false, false, 89));
        foreach ($context['_seq'] as $context["_key"] => $context["card"]) {
            // line 90
            yield "                    <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("build/images/cards/" . CoreExtension::getAttribute($this->env, $this->source, $context["card"], "value", [], "any", false, false, false, 90)) . ".svg")), "html", null, true);
            yield "\" width=\"100\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 90, $this->source); })()), "session", [], "any", false, false, false, 90), "get", ["deck_values"], "method", false, false, false, 90), CoreExtension::getAttribute($this->env, $this->source, $context["card"], "value", [], "any", false, false, false, 90), [], "array", false, false, false, 90), "html", null, true);
            yield "\" title=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 90, $this->source); })()), "session", [], "any", false, false, false, 90), "get", ["deck_text_values"], "method", false, false, false, 90), CoreExtension::getAttribute($this->env, $this->source, $context["card"], "value", [], "any", false, false, false, 90), [], "array", false, false, false, 90), "html", null, true);
            yield "\">
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['card'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 92
        yield "                    ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 92, $this->source); })()), "session", [], "any", false, false, false, 92), "get", ["game"], "method", false, false, false, 92), "state", [], "any", false, false, false, 92) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 92, $this->source); })()), "session", [], "any", false, false, false, 92), "get", ["game"], "method", false, false, false, 92), "STATES", [], "any", false, false, false, 92), "bank_draws", [], "array", false, false, false, 92))) {
            // line 93
            yield "                    <div>
                        <form method=\"POST\" action=\"";
            // line 94
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("game_player_draws_process");
            yield "\">
                            <input type=\"hidden\" name=\"player\" value=\"1\">
                            <button type=\"submit\" name=\"draw\" value=\"draw\">Dra</button>
                            ";
            // line 97
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 97, $this->source); })()), "session", [], "any", false, false, false, 97), "get", ["game"], "method", false, false, false, 97), "players", [], "any", false, false, false, 97), 1, [], "array", false, false, false, 97), "hand", [], "any", false, false, false, 97), "handValues", [], "method", false, false, false, 97)) > 1)) {
                // line 98
                yield "                            <button type=\"submit\" name=\"stay\" value=\"stay\">Stanna</button>
                            ";
            }
            // line 100
            yield "                        </form>
                    </div>
                    ";
        }
        // line 103
        yield "                </div>
            </section>
            <section class=\"center\">
                <div>
                ";
        // line 107
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
        return array (  329 => 110,  316 => 108,  312 => 107,  306 => 103,  301 => 100,  297 => 98,  295 => 97,  289 => 94,  286 => 93,  283 => 92,  270 => 90,  266 => 89,  262 => 88,  256 => 85,  252 => 84,  241 => 75,  233 => 70,  230 => 69,  227 => 68,  219 => 63,  216 => 62,  214 => 59,  213 => 58,  212 => 57,  211 => 56,  210 => 55,  206 => 54,  202 => 53,  198 => 51,  190 => 46,  186 => 45,  183 => 44,  180 => 43,  175 => 40,  171 => 38,  169 => 37,  163 => 34,  160 => 33,  157 => 32,  148 => 26,  145 => 25,  142 => 24,  129 => 22,  125 => 21,  121 => 20,  115 => 17,  111 => 16,  100 => 7,  87 => 5,  64 => 3,  41 => 1,);
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
                            {% if app.session.get('game').players[0].hand.handValues() | length > 1 %}
                            <button type=\"submit\" name=\"stay\" value=\"stay\">Stanna</button>
                            {% endif %}
                        </form>
                    </div>
                    {% endif %}
                    {% if app.session.get('game').state == app.session.get('game').STATES['player_bets'] %}
                    <div>
                        <form method=\"POST\" action=\"{{ path('game_player_bets_process') }}\">
                            <input type=\"number\" name=\"bet\" min=\"1\" max=\"{{ min(app.session.get('game').players[0].balance, app.session.get('game').players[1].balance) }}\" value=\"1\">
                            <button type=\"submit\">Satsa</button>
                        </form>
                    </div>
                    {% endif %}
                </div>
                <div class=\"dojo_midsection\">
                    <h1>🃏 {{ app.session.get('game').deck.remainingCards() }}</h1>
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
                    {% if (app.session.get('game').state == app.session.get('game').STATES['game_over']) %}
                    <div>
                        <form method=\"POST\" action=\"{{ path('game_over_process') }}\">
                            <button type=\"submit\" name=\"game_over\" value=\"game_over\">SLUT</button>
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
                            {% if app.session.get('game').players[1].hand.handValues() | length > 1 %}
                            <button type=\"submit\" name=\"stay\" value=\"stay\">Stanna</button>
                            {% endif %}
                        </form>
                    </div>
                    {% endif %}
                </div>
            </section>
            <section class=\"center\">
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
