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

/* index.twig */
class __TwigTemplate_da059a7ae7ec916c31117935b6e2dd33 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        yield from         $this->loadTemplate("header.twig", "index.twig", 1)->unwrap()->yield($context);
        // line 2
        yield "
<h1>Шаблон twig</h1>

aaa<br>
";
        // line 6
        yield ($context["var"] ?? null);
        yield "<br>
";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["var"] ?? null));
        yield "<br>
";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["var"] ?? null));
        yield "<br>

Перебираю массив: <br>
";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["users"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 12
            yield "    * ";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["user"], "name", [], "any", false, false, false, 12);
            yield "<br>
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 14
            yield "    No users have been found.
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        yield "
<br>
Обращаюсь к объекту: ";
        // line 18
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["view"] ?? null), "var", [], "any", false, false, false, 18);
        yield "

";
        // line 20
        yield from         $this->loadTemplate("footer.twig", "index.twig", 20)->unwrap()->yield($context);
        // line 21
        yield "123";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "index.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  91 => 21,  89 => 20,  84 => 18,  80 => 16,  73 => 14,  65 => 12,  60 => 11,  54 => 8,  50 => 7,  46 => 6,  40 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index.twig", "/srv/mvc2-master/App/Ext/Templates/One/index.twig");
    }
}
