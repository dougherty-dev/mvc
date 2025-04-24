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

/* deal.html.twig */
class __TwigTemplate_480ff67cddd8b69844bd213e90985c44 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "deal.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "deal.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "deal.html.twig", 1);
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

        yield "Ny giv";
        
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
        yield from $this->loadTemplate("card_template.html.twig", "deal.html.twig", 6)->unwrap()->yield($context);
        // line 7
        yield "    <section class=\"columns center\">
        <h2>Ny giv</h2>
        <form method=\"post\" action=\"";
        // line 9
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("card_deck_deal_process");
        yield "\">
            <table>
                <tr>
                    <th class=\"left\">Spelare</th>
                    <td><input type=\"number\" min=\"1\" name=\"players\" value=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["players"]) || array_key_exists("players", $context) ? $context["players"] : (function () { throw new RuntimeError('Variable "players" does not exist.', 13, $this->source); })()), "html", null, true);
        yield "\"></td>
                </tr>
                <tr>
                    <th class=\"left\">Kort</th>
                    <td><input type=\"number\" min=\"1\" name=\"cards\" value=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["cards"]) || array_key_exists("cards", $context) ? $context["cards"] : (function () { throw new RuntimeError('Variable "cards" does not exist.', 17, $this->source); })()), "html", null, true);
        yield "\"></td>
                </tr>
            </table>
            <button type=\"submit\">Dela</button>
        </form>
        ";
        // line 22
        if ((isset($context["players"]) || array_key_exists("players", $context) ? $context["players"] : (function () { throw new RuntimeError('Variable "players" does not exist.', 22, $this->source); })())) {
            // line 23
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["hands"]) || array_key_exists("hands", $context) ? $context["hands"] : (function () { throw new RuntimeError('Variable "hands" does not exist.', 23, $this->source); })()));
            foreach ($context['_seq'] as $context["player"] => $context["hand"]) {
                // line 24
                yield "        <figure>
            <figcaption>Spelare ";
                // line 25
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["player"], "html", null, true);
                yield "</figcaption>
            ";
                // line 26
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["hand"], "hand", [], "any", false, false, false, 26));
                foreach ($context['_seq'] as $context["_key"] => $context["card"]) {
                    // line 27
                    yield "            <span><img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("build/images/cards/" . CoreExtension::getAttribute($this->env, $this->source, $context["card"], "value", [], "any", false, false, false, 27)) . ".svg")), "html", null, true);
                    yield "\" width=\"100\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 27, $this->source); })()), "session", [], "any", false, false, false, 27), "get", ["deck_values"], "method", false, false, false, 27), CoreExtension::getAttribute($this->env, $this->source, $context["card"], "value", [], "any", false, false, false, 27), [], "array", false, false, false, 27), "html", null, true);
                    yield "\" title=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 27, $this->source); })()), "session", [], "any", false, false, false, 27), "get", ["deck_text_values"], "method", false, false, false, 27), CoreExtension::getAttribute($this->env, $this->source, $context["card"], "value", [], "any", false, false, false, 27), [], "array", false, false, false, 27), "html", null, true);
                    yield "\"></span>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['card'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 29
                yield "        </figure>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['player'], $context['hand'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            yield "        <br>
        <p>Kort kvar i lek: ";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["remaining"]) || array_key_exists("remaining", $context) ? $context["remaining"] : (function () { throw new RuntimeError('Variable "remaining" does not exist.', 32, $this->source); })()), "html", null, true);
            yield "</p>
        ";
        }
        // line 34
        yield "    </section>
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
        return "deal.html.twig";
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
        return array (  174 => 34,  169 => 32,  166 => 31,  159 => 29,  146 => 27,  142 => 26,  138 => 25,  135 => 24,  130 => 23,  128 => 22,  120 => 17,  113 => 13,  106 => 9,  102 => 7,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}Ny giv{% endblock %}

{% block body %}
{% include 'card_template.html.twig' %}
    <section class=\"columns center\">
        <h2>Ny giv</h2>
        <form method=\"post\" action=\"{{ path('card_deck_deal_process') }}\">
            <table>
                <tr>
                    <th class=\"left\">Spelare</th>
                    <td><input type=\"number\" min=\"1\" name=\"players\" value=\"{{ players }}\"></td>
                </tr>
                <tr>
                    <th class=\"left\">Kort</th>
                    <td><input type=\"number\" min=\"1\" name=\"cards\" value=\"{{ cards }}\"></td>
                </tr>
            </table>
            <button type=\"submit\">Dela</button>
        </form>
        {% if players %}
        {% for player, hand in hands %}
        <figure>
            <figcaption>Spelare {{ player }}</figcaption>
            {% for card in hand.hand %}
            <span><img src=\"{{ asset('build/images/cards/'~card.value~'.svg') }}\" width=\"100\" alt=\"{{ app.session.get('deck_values')[card.value] }}\" title=\"{{ app.session.get('deck_text_values')[card.value] }}\"></span>
            {% endfor %}
        </figure>
        {% endfor %}
        <br>
        <p>Kort kvar i lek: {{ remaining }}</p>
        {% endif %}
    </section>
{% endblock %}
", "deal.html.twig", "/Users/nik/Sites/dbwebb-kurser/mvc/me/report/templates/deal.html.twig");
    }
}
