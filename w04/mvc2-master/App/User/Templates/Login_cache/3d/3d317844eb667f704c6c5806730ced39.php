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

/* edit.twig */
class __TwigTemplate_145ffdd2c09372f55e346cb2f2908735 extends Template
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
        yield from         $this->loadTemplate("header.twig", "edit.twig", 1)->unwrap()->yield($context);
        // line 2
        yield "
<h3>";
        // line 3
        yield ($context["title"] ?? null);
        yield "</h3>

";
        // line 5
        if (($context["user"] ?? null)) {
            // line 6
            yield "    <div class=\"block\">
        <form action=\"/user/edit/\" method=\"post\">
            <div class=\"field\">Id:</div><div>";
            // line 8
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "Id", [], "any", false, false, false, 8);
            yield "</div><br>
            <div class=\"field\">Name:</div> <input type=\"text\" value=\"";
            // line 9
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "Name", [], "any", false, false, false, 9);
            yield "\" name=\"name\"><br>
            <div class=\"field\">Email:</div> <input type=\"text\" value=\"";
            // line 10
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "Email", [], "any", false, false, false, 10);
            yield "\" name=\"email\"><br>
            <div class=\"field\">Password:</div> <input type=\"text\" value=\"\" name=\"password\"><br>
            <div class=\"field\">Confirm Password:</div> <input type=\"text\" value=\"\" name=\"password_2\"><br>
            <div class=\"field\">PasswordHash:</div><div>";
            // line 13
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "PasswordHash", [], "any", false, false, false, 13);
            yield "</div><br>
            <div class=\"field\">CreatedAt:</div><div>";
            // line 14
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "CreatedAt", [], "any", false, false, false, 14);
            yield "</div><br>
            <input type=\"submit\" value=\"Сохранить\">
        </form>
        <form method=\"post\" action=\"/user/profile\">
            <input type=\"submit\" value=\"Вернуться в профиль\">
        </form>
        <form method=\"post\" action=\"/\">
            <input type=\"submit\" value=\"Сообщения\">
        </form>
    </div>
";
        } else {
            // line 25
            yield "    <p>Пользователь не найден</p>
";
        }
        // line 27
        yield "
";
        // line 28
        if (($context["error"] ?? null)) {
            // line 29
            yield "    <span style=\"color: red\">";
            yield ($context["error"] ?? null);
            yield "</span>
";
        }
        // line 31
        yield "
";
        // line 32
        yield from         $this->loadTemplate("footer.twig", "edit.twig", 32)->unwrap()->yield($context);
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "edit.twig";
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
        return array (  104 => 32,  101 => 31,  95 => 29,  93 => 28,  90 => 27,  86 => 25,  72 => 14,  68 => 13,  62 => 10,  58 => 9,  54 => 8,  50 => 6,  48 => 5,  43 => 3,  40 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "edit.twig", "/srv/mvc2-master/App/User/Templates/Login/edit.twig");
    }
}
