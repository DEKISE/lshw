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
class __TwigTemplate_9c7b88fae053924937992d641d6acdea extends Template
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
<h3>";
        // line 3
        yield ($context["title"] ?? null);
        yield "</h3>

";
        // line 5
        if (($context["posts"] ?? null)) {
            // line 6
            yield "
    ";
            // line 7
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["posts"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 8
                yield "       ";
                $context["autor"] = (($__internal_compile_0 = ($context["users"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[CoreExtension::getAttribute($this->env, $this->source, $context["post"], "UserId", [], "any", false, false, false, 8)] ?? null) : null);
                // line 9
                yield "        ";
                if (($context["autor"] ?? null)) {
                    // line 10
                    yield "            <div class=\"post\">
                <span class=\"user\">Сообщение от <b>";
                    // line 11
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["autor"] ?? null), "Name", [], "any", false, false, false, 11);
                    yield "</b> отправлено ";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["post"], "CreatedAt", [], "any", false, false, false, 11);
                    yield "</span>
                <div class=\"message\">";
                    // line 12
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["post"], "Text", [], "any", false, false, false, 12);
                    yield "
                    ";
                    // line 13
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["post"], "Image", [], "any", false, false, false, 13)) {
                        // line 14
                        yield "                        <div><img src=\"/images/";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["post"], "Image", [], "any", false, false, false, 14);
                        yield "\" style=\"width: 150px;\"></div>
                    ";
                    }
                    // line 16
                    yield "                    ";
                    if (CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "Admin", [], "any", false, false, false, 16)) {
                        // line 17
                        yield "                        <div class=\"admin\">
                            <a href=\"/admin/deleteMessage/?id=";
                        // line 18
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["post"], "Id", [], "any", false, false, false, 18);
                        yield "\">delete</a>
                        </div>
                    ";
                    }
                    // line 21
                    yield "                </div>
            </div>
        ";
                }
                // line 24
                yield "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            yield "
";
        } else {
            // line 27
            yield "    <p>Сообщений пока нет</p>
";
        }
        // line 29
        yield "
<br>
<br>

    <form enctype=\"multipart/form-data\" action=\"/main/index/sendPost/\" method=\"post\">
        Message:<br>
        <textarea name=\"text\" style=\"width: 250px; height: 100px;\"></textarea><br>
        Изображение:<br>
        <input type=\"file\" name=\"image\"><br>
        <input type=\"submit\" value=\"Send\">
    </form>

    <form method=\"post\" action=\"/user/profile\">
        <input type=\"submit\" value=\"Профиль\">
    </form>

    <form method=\"post\" action=\"/user/logout\">
        <input type=\"submit\" value=\"Выйти\">
    </form>

";
        // line 49
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "Admin", [], "any", false, false, false, 49)) {
            // line 50
            yield "    <h3>Сообщения удаленных пользователей</h3>
    ";
            // line 51
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["posts"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 52
                yield "        ";
                $context["autor"] = (($__internal_compile_1 = ($context["users"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[CoreExtension::getAttribute($this->env, $this->source, $context["post"], "UserId", [], "any", false, false, false, 52)] ?? null) : null);
                // line 53
                yield "        ";
                if ( !($context["autor"] ?? null)) {
                    // line 54
                    yield "            <div class=\"post\">
                <span class=\"user\">Сообщение от <b>Удаленного пользователя</b> отправлено ";
                    // line 55
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["post"], "CreatedAt", [], "any", false, false, false, 55);
                    yield "</span>
                <div class=\"message\">";
                    // line 56
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["post"], "Text", [], "any", false, false, false, 56);
                    yield "
                    ";
                    // line 57
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["post"], "Image", [], "any", false, false, false, 57)) {
                        // line 58
                        yield "                        <div><img src=\"/images/";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["post"], "Image", [], "any", false, false, false, 58);
                        yield "\" style=\"width: 150px;\"></div>
                    ";
                    }
                    // line 60
                    yield "                    <div class=\"admin\">
                        <a href=\"/admin/deleteMessage/?id=";
                    // line 61
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["post"], "Id", [], "any", false, false, false, 61);
                    yield "\">delete</a>
                    </div>
                </div>
            </div>
        ";
                }
                // line 66
                yield "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 68
        yield "
";
        // line 69
        yield from         $this->loadTemplate("footer.twig", "index.twig", 69)->unwrap()->yield($context);
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
        return array (  192 => 69,  189 => 68,  182 => 66,  174 => 61,  171 => 60,  165 => 58,  163 => 57,  159 => 56,  155 => 55,  152 => 54,  149 => 53,  146 => 52,  142 => 51,  139 => 50,  137 => 49,  115 => 29,  111 => 27,  107 => 25,  101 => 24,  96 => 21,  90 => 18,  87 => 17,  84 => 16,  78 => 14,  76 => 13,  72 => 12,  66 => 11,  63 => 10,  60 => 9,  57 => 8,  53 => 7,  50 => 6,  48 => 5,  43 => 3,  40 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index.twig", "/srv/mvc2-master-php8.1/App/Main/Templates/Index/index.twig");
    }
}
