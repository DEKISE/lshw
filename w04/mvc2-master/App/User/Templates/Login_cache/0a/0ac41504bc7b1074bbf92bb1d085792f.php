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

/* register.twig */
class __TwigTemplate_8f3da4b4a4660aa25e6fa4375f6075de extends Template
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
        yield from         $this->loadTemplate("header.twig", "register.twig", 1)->unwrap()->yield($context);
        // line 2
        yield "
<h3>";
        // line 3
        yield ($context["title"] ?? null);
        yield "</h3>

";
        // line 5
        if ( !($context["user"] ?? null)) {
            // line 6
            yield "    <div class=\"block\">
        <h3>Зарегистрироваться</h3>
        <form action=\"/user/login/createUser/\" method=\"post\">
            <div class=\"field\">Name:</div> <input type=\"text\" value=\"\" name=\"name\"><br>
            <div class=\"field\">Email:</div> <input type=\"text\" value=\"\" name=\"email\"><br>
            <div class=\"field\">Password:</div> <input type=\"text\" value=\"\" name=\"password\"><br>
            <div class=\"field\">Confirm Password:</div> <input type=\"text\" value=\"\" name=\"password_2\"><br>
            <input type=\"submit\" value=\"Зарегистрироваться\">
        </form>
    </div>
    <div class=\"block\" style=\"margin-left: 50px;\">
        <h3>Войти</h3>
        <form action=\"/user/login/\" method=\"post\">
            <div class=\"field\">Email:</div> <input type=\"text\" value=\"\" name=\"email\"><br>
            <div class=\"field\">Password:</div> <input type=\"text\" value=\"\" name=\"password\"><br>
            <input type=\"submit\" value=\"Войти\">
        </form>

    </div>
";
        } else {
            // line 26
            yield "    <p>Вы вошли как ";
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "Name", [], "any", false, false, false, 26);
            yield "</p>
";
        }
        // line 28
        yield "
";
        // line 29
        if (($context["error"] ?? null)) {
            // line 30
            yield "    <span style=\"color: red\">";
            yield ($context["error"] ?? null);
            yield "</span>
";
        }
        // line 32
        yield "
";
        // line 33
        yield from         $this->loadTemplate("footer.twig", "register.twig", 33)->unwrap()->yield($context);
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "register.twig";
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
        return array (  92 => 33,  89 => 32,  83 => 30,  81 => 29,  78 => 28,  72 => 26,  50 => 6,  48 => 5,  43 => 3,  40 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "register.twig", "/srv/mvc2-master/App/User/Templates/Login/register.twig");
    }
}
