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

/* doc.html.twig */
class __TwigTemplate_b3aad3b61a176a5fa0ed298f28b18ef2 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "doc.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "doc.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "doc.html.twig", 1);
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

        yield "Dokumentation";
        
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
        yield "            <section class=\"two-columns\">
                <h1>Dokumentation</h1>
                <p>Flödesschema, pesudokod och beskrivning av klasser för implementationen av kortspelet 21 ges i det nedanstående. Analysen föregår kodning och utgör ett hjälpmedel för att finna en lämplig struktur för kodbasen. Den slutliga implementationen torde därför komma att avvika från denna skiss.</p>
                <p>Den förberedande analysen kan ge vissa insikter om var problem kan uppstå och vilken kod som kan lämpa sig för återvinning i metoder och annan abstraktion.</p>
                <p></p>
            </section>
            <section class=\"center\">
                <h2>Flödeschema</h2>
                <figure>
                    <img src=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/game/flow-21.avif"), "html", null, true);
        yield "\" width=\"3000\" alt=\"Flödesschema\">
                </figure>
            </section>
            <section class=\"two-columns\">
                <h2>Pseudokod</h2>
                <p>Mockup av kod följer i stort flödesschemat och ger en mer linjär tolkning av flödet.</p>
                <pre><code>
BEGIN
  display dojo / card table
  distribute money to player and banker

  WHILE player NOT bankrupt
    CALL deal card (player)

    WHILE bet > available amount
      input bet
    END WHILE
    withdraw bets

    WHILE cards < 2 AND player not done
      CALL deal card (player)
    END WHILE

    IF player hand value > 21
      distribute bets to bank
      return
    END IF

    CALL deal card (banker)
    WHILE cards < 2 AND banker not done
      CALL deal card (banker)
    END WHILE
    
    IF banker hand value > 21 OR banker hand value < player hand value
      distribute bets to player
      return
    END IF
    
    distribute bets to bank
  END WHILE
END

SUB deal card (person)
  display probabilities for next card
  IF player stays
    return
  CALL handle deck of cards
  deal card to person
  display hand
END SUB

SUB handle deck of cards
  IF deck out of cards
    collect unused cards
    shuffle deck
  END IF
END SUB
                </code></pre>
            </section>
            <section class=\"two-columns\">
                <h2>Klasser</h2>
                <p>Avseende modellerna följs initialt principen KISS <em>(keep it simple, stupid)</em>, varvid en klass <code>Game</code> får agera huvudklass. Den består i sin tur av en komposition av klassen <code>Player</code>, som håller varje spelares <code>Hand</code>, en rad parametrar för bokföring samt en metod för att beräkna handens momentana värde.</p>
                <p><code>Game</code> håller även utvidgningen <code>Banker</code> av <code>Player</code>, som för närvarande enbart har begåvats med en boolesk flagga. Denne spelare är så speciell att den förtjänar en egen klass, och man kan misstänka att någon särskild metod kan tillkomma i ett senare skede.</p>
                <p><code>Game</code> är även en komposition av <code>Deck</code> och <code>Hand</code>, det senare på grund av att beräkningen av sannolikheter kräver värdet av en hand, om än indirekt från <code>Player</code>. Man skulle här kunna tänka sig en utvidgning av <code>Hand</code> för att åstadkomma samma sak, det finns möjligen anledning att återkomma i ämnet vad det lider.</p>
                <h3>Smart bank</h3>
                <p>Bankens normala strategi är att ta kort upp till och med handvärdet 17, men via ett tillval kan banken spela efter sannolikheter baserade på aktuell hand och kvarvarande kort i leken. Värdet 17 motsvarar för en full kortlek ungefär 70&nbsp;% sannolikhet att bli tjock, och vi sänker det här till 65&nbsp;% för mer optimalt spel med en lek som används fullt ut. Naturligtvis skulle man kunna bygga en betydligt mer avancerad bank, bland annat med hänsyn till huruvida man har en joker på hand, då man är garanterad handsumman 21.</p>
                <p>Ytterligare ett tillval visar aktuell kortlek, på det att man kan kontrollera och finjustera funktionen.</p>
            </section>
            <section class=\"center\">
                <h2>UML-diagram</h2>
                <figure>
                    <img src=\"";
        // line 86
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/game/uml-21.avif"), "html", null, true);
        yield "\" width=\"3000\" alt=\"UML-diagram\">
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
        return "doc.html.twig";
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
        return array (  185 => 86,  111 => 15,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}Dokumentation{% endblock %}

{% block body %}
            <section class=\"two-columns\">
                <h1>Dokumentation</h1>
                <p>Flödesschema, pesudokod och beskrivning av klasser för implementationen av kortspelet 21 ges i det nedanstående. Analysen föregår kodning och utgör ett hjälpmedel för att finna en lämplig struktur för kodbasen. Den slutliga implementationen torde därför komma att avvika från denna skiss.</p>
                <p>Den förberedande analysen kan ge vissa insikter om var problem kan uppstå och vilken kod som kan lämpa sig för återvinning i metoder och annan abstraktion.</p>
                <p></p>
            </section>
            <section class=\"center\">
                <h2>Flödeschema</h2>
                <figure>
                    <img src=\"{{ asset('build/images/game/flow-21.avif') }}\" width=\"3000\" alt=\"Flödesschema\">
                </figure>
            </section>
            <section class=\"two-columns\">
                <h2>Pseudokod</h2>
                <p>Mockup av kod följer i stort flödesschemat och ger en mer linjär tolkning av flödet.</p>
                <pre><code>
BEGIN
  display dojo / card table
  distribute money to player and banker

  WHILE player NOT bankrupt
    CALL deal card (player)

    WHILE bet > available amount
      input bet
    END WHILE
    withdraw bets

    WHILE cards < 2 AND player not done
      CALL deal card (player)
    END WHILE

    IF player hand value > 21
      distribute bets to bank
      return
    END IF

    CALL deal card (banker)
    WHILE cards < 2 AND banker not done
      CALL deal card (banker)
    END WHILE
    
    IF banker hand value > 21 OR banker hand value < player hand value
      distribute bets to player
      return
    END IF
    
    distribute bets to bank
  END WHILE
END

SUB deal card (person)
  display probabilities for next card
  IF player stays
    return
  CALL handle deck of cards
  deal card to person
  display hand
END SUB

SUB handle deck of cards
  IF deck out of cards
    collect unused cards
    shuffle deck
  END IF
END SUB
                </code></pre>
            </section>
            <section class=\"two-columns\">
                <h2>Klasser</h2>
                <p>Avseende modellerna följs initialt principen KISS <em>(keep it simple, stupid)</em>, varvid en klass <code>Game</code> får agera huvudklass. Den består i sin tur av en komposition av klassen <code>Player</code>, som håller varje spelares <code>Hand</code>, en rad parametrar för bokföring samt en metod för att beräkna handens momentana värde.</p>
                <p><code>Game</code> håller även utvidgningen <code>Banker</code> av <code>Player</code>, som för närvarande enbart har begåvats med en boolesk flagga. Denne spelare är så speciell att den förtjänar en egen klass, och man kan misstänka att någon särskild metod kan tillkomma i ett senare skede.</p>
                <p><code>Game</code> är även en komposition av <code>Deck</code> och <code>Hand</code>, det senare på grund av att beräkningen av sannolikheter kräver värdet av en hand, om än indirekt från <code>Player</code>. Man skulle här kunna tänka sig en utvidgning av <code>Hand</code> för att åstadkomma samma sak, det finns möjligen anledning att återkomma i ämnet vad det lider.</p>
                <h3>Smart bank</h3>
                <p>Bankens normala strategi är att ta kort upp till och med handvärdet 17, men via ett tillval kan banken spela efter sannolikheter baserade på aktuell hand och kvarvarande kort i leken. Värdet 17 motsvarar för en full kortlek ungefär 70&nbsp;% sannolikhet att bli tjock, och vi sänker det här till 65&nbsp;% för mer optimalt spel med en lek som används fullt ut. Naturligtvis skulle man kunna bygga en betydligt mer avancerad bank, bland annat med hänsyn till huruvida man har en joker på hand, då man är garanterad handsumman 21.</p>
                <p>Ytterligare ett tillval visar aktuell kortlek, på det att man kan kontrollera och finjustera funktionen.</p>
            </section>
            <section class=\"center\">
                <h2>UML-diagram</h2>
                <figure>
                    <img src=\"{{ asset('build/images/game/uml-21.avif') }}\" width=\"3000\" alt=\"UML-diagram\">
                </figure>
            </section>
{% endblock %}
", "doc.html.twig", "/Users/nik/Sites/dbwebb-kurser/mvc/me/report/templates/doc.html.twig");
    }
}
