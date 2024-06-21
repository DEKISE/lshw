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

/* profile.twig */
class __TwigTemplate_c205a9fff5c039172eb0be49ed7666ca extends Template
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
        yield from         $this->loadTemplate("header.twig", "profile.twig", 1)->unwrap()->yield($context);
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
        <div class=\"field\">Id: </div><div>";
            // line 7
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "Id", [], "any", false, false, false, 7);
            yield "</div><br>
        <div class=\"field\">Name: </div><div>";
            // line 8
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "Name", [], "any", false, false, false, 8);
            yield "</div><br>
        <div class=\"field\">Email: </div><div>";
            // line 9
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "Email", [], "any", false, false, false, 9);
            yield "</div><br>
        <div class=\"field\">PasswordHash: </div><div>";
            // line 10
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "PasswordHash", [], "any", false, false, false, 10);
            yield "</div><br>
        <div class=\"field\">CreatedAt: </div><div>";
            // line 11
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "CreatedAt", [], "any", false, false, false, 11);
            yield "</div><br>

        <form method=\"post\" action=\"/user/edit\">
            <input type=\"submit\" value=\"Редактировать профиль\">
        </form>
        <form method=\"post\" action=\"/user/logout\">
            <input type=\"submit\" value=\"Выйти\">
        </form>
        <form method=\"post\" action=\"/\">
            <input type=\"submit\" value=\"Сообщения\">
        </form>
    </div>
";
        } else {
            // line 24
            yield "    <p>Пользователь не найден</p>
";
        }
        // line 26
        yield "
";
        // line 27
        yield from         $this->loadTemplate("footer.twig", "profile.twig", 27)->unwrap()->yield($context);
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "profile.twig";
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
        return array (  92 => 27,  89 => 26,  85 => 24,  69 => 11,  65 => 10,  61 => 9,  57 => 8,  53 => 7,  50 => 6,  48 => 5,  43 => 3,  40 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "profile.twig", "/srv/mvc2-master/App/User/Templates/Login/profile.twig");
    }
}
