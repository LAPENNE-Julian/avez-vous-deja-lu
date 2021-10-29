<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* anecdote/browse.html.twig */
class __TwigTemplate_d078f190805875bbf2594ce9d4f6762694449c9fca3cc745f3a3f668c7260e59 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "anecdote/browse.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "anecdote/browse.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "<div class=\"container\">
  ";
        // line 7
        echo twig_include($this->env, $context, "_partials/_nav.html.twig");
        echo " 
  
  ";
        // line 9
        echo twig_include($this->env, $context, "_partials/_flash_messages.html.twig");
        echo "

  <h1>Anecdotes list</h1>
  <div class=\"text-end\">
  <a class=\"btn btn-dark\" href=\"";
        // line 13
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("backoffice_anecdote_add");
        echo "\">Add</a>
  </div>
  <table class=\"table table-striped\">
    <thead>
      <tr>
        <th scope=\"col\">#</th>
        <th scope=\"col\">Title</th>
        <th scope=\"col\">User</th>
      </tr>
    </thead>
    <tbody>
    ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["anecdote_list"]) || array_key_exists("anecdote_list", $context) ? $context["anecdote_list"] : (function () { throw new RuntimeError('Variable "anecdote_list" does not exist.', 24, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["anecdote"]) {
            // line 25
            echo "      <tr>
        <th scope=\"row\">";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["anecdote"], "id", [], "any", false, false, false, 26), "html", null, true);
            echo "</th>
        <td>";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["anecdote"], "title", [], "any", false, false, false, 27), "html", null, true);
            echo "</td>
        ";
            // line 28
            if ((null === twig_get_attribute($this->env, $this->source, $context["anecdote"], "writer", [], "any", false, false, false, 28))) {
                // line 29
                echo "        <td>Anonyme</td>
        ";
            } else {
                // line 31
                echo "        <td>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["anecdote"], "writer", [], "any", false, false, false, 31), "pseudo", [], "any", false, false, false, 31), "html", null, true);
                echo "</td>
        ";
            }
            // line 33
            echo "        <td>
          <a class=\"btn btn-primary\" href=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("backoffice_anecdote_read", ["id" => twig_get_attribute($this->env, $this->source, $context["anecdote"], "id", [], "any", false, false, false, 34)]), "html", null, true);
            echo "\" title=\"Read\" alt=\"Read\">
            ";
            // line 36
            echo "            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-search\" viewBox=\"0 0 16 16\">
              <path d=\"M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z\"/>
            </svg>
          </a>
          <a class=\"btn btn-warning\" href=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("backoffice_anecdote_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["anecdote"], "id", [], "any", false, false, false, 40)]), "html", null, true);
            echo "\" title=\"Edit\" alt=\"Edit\">
            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-pencil\" viewBox=\"0 0 16 16\">
              <path d=\"M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z\"/>
            </svg>
          </a>
          <div class=\"btn-group\" role=\"group\">
              <button id=\"btnGroupDrop1\" type=\"button\" class=\"btn btn-danger dropdown-toggle\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\" title=\"Delete\" alt=\"Delete\">
              <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-trash\" viewBox=\"0 0 16 16\">
                <path d=\"M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z\"/>
                <path fill-rule=\"evenodd\" d=\"M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z\"/>
              </svg>
              </button>
              <ul class=\"dropdown-menu\" aria-labelledby=\"btnGroupDrop1\">
                  <li><a class=\"dropdown-item\" href=\"";
            // line 53
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("backoffice_anecdote_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["anecdote"], "id", [], "any", false, false, false, 53)]), "html", null, true);
            echo "\">Yes I am sure !</a></li>
                  <li><a class=\"dropdown-item\" href=\"";
            // line 54
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("backoffice_anecdote_browse");
            echo "\">Nope</a></li>
              </ul>
          </div>
        </td>
      </tr>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['anecdote'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "    </tbody>
  </table>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "anecdote/browse.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  173 => 60,  161 => 54,  157 => 53,  141 => 40,  135 => 36,  131 => 34,  128 => 33,  122 => 31,  118 => 29,  116 => 28,  112 => 27,  108 => 26,  105 => 25,  101 => 24,  87 => 13,  80 => 9,  75 => 7,  72 => 6,  65 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{% endblock %}

{% block body %}
<div class=\"container\">
  {{ include('_partials/_nav.html.twig') }} 
  
  {{ include('_partials/_flash_messages.html.twig') }}

  <h1>Anecdotes list</h1>
  <div class=\"text-end\">
  <a class=\"btn btn-dark\" href=\"{{ url('backoffice_anecdote_add') }}\">Add</a>
  </div>
  <table class=\"table table-striped\">
    <thead>
      <tr>
        <th scope=\"col\">#</th>
        <th scope=\"col\">Title</th>
        <th scope=\"col\">User</th>
      </tr>
    </thead>
    <tbody>
    {% for anecdote in anecdote_list %}
      <tr>
        <th scope=\"row\">{{anecdote.id}}</th>
        <td>{{anecdote.title}}</td>
        {% if anecdote.writer is null %}
        <td>Anonyme</td>
        {% else %}
        <td>{{anecdote.writer.pseudo}}</td>
        {% endif %}
        <td>
          <a class=\"btn btn-primary\" href=\"{{ url('backoffice_anecdote_read', {\"id\": anecdote.id}) }}\" title=\"Read\" alt=\"Read\">
            {# images récupérées sur bootstrap icons https://icons.getbootstrap.com/ #}
            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-search\" viewBox=\"0 0 16 16\">
              <path d=\"M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z\"/>
            </svg>
          </a>
          <a class=\"btn btn-warning\" href=\"{{url('backoffice_anecdote_edit', {\"id\": anecdote.id})}}\" title=\"Edit\" alt=\"Edit\">
            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-pencil\" viewBox=\"0 0 16 16\">
              <path d=\"M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z\"/>
            </svg>
          </a>
          <div class=\"btn-group\" role=\"group\">
              <button id=\"btnGroupDrop1\" type=\"button\" class=\"btn btn-danger dropdown-toggle\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\" title=\"Delete\" alt=\"Delete\">
              <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-trash\" viewBox=\"0 0 16 16\">
                <path d=\"M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z\"/>
                <path fill-rule=\"evenodd\" d=\"M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z\"/>
              </svg>
              </button>
              <ul class=\"dropdown-menu\" aria-labelledby=\"btnGroupDrop1\">
                  <li><a class=\"dropdown-item\" href=\"{{url('backoffice_anecdote_delete', {\"id\": anecdote.id})}}\">Yes I am sure !</a></li>
                  <li><a class=\"dropdown-item\" href=\"{{url('backoffice_anecdote_browse')}}\">Nope</a></li>
              </ul>
          </div>
        </td>
      </tr>
      {% endfor %}
    </tbody>
  </table>
</div>
{% endblock %}", "anecdote/browse.html.twig", "/var/www/html/projets/apothéose/avez-vous-deja-lu/back/projet-culture-g/avez-vous-deja-lu/templates/anecdote/browse.html.twig");
    }
}
