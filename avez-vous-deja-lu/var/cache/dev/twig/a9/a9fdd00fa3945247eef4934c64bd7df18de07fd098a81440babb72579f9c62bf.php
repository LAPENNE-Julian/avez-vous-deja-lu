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

/* anecdote/read.html.twig */
class __TwigTemplate_d6b5bdc9bb48289d594e413bcf9879a83a8fcf953acbbb8bd829cb7c2ebb2c38 extends Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "anecdote/read.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "anecdote/read.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo " ";
        $this->displayParentBlock("title", $context, $blocks);
        echo " Anecdote - Read";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "
<div class=\"container\">
";
        // line 8
        echo twig_include($this->env, $context, "_partials/_nav.html.twig");
        echo "
";
        // line 9
        echo twig_include($this->env, $context, "_partials/_flash_messages.html.twig");
        echo "

  <h1>";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["anecdote"]) || array_key_exists("anecdote", $context) ? $context["anecdote"] : (function () { throw new RuntimeError('Variable "anecdote" does not exist.', 11, $this->source); })()), "title", [], "any", false, false, false, 11), "html", null, true);
        echo "</h1>
  <div class=\"text-end\">
      <a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("backoffice_anecdote_edit", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["anecdote"]) || array_key_exists("anecdote", $context) ? $context["anecdote"] : (function () { throw new RuntimeError('Variable "anecdote" does not exist.', 13, $this->source); })()), "id", [], "any", false, false, false, 13)]), "html", null, true);
        echo "\" class=\"btn btn-warning\">
            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-pencil\" viewBox=\"0 0 16 16\">
              <path d=\"M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z\"/>
            </svg>
      </a>
      <a href=\"";
        // line 18
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("backoffice_anecdote_browse");
        echo "\" class=\"btn btn-dark\">Back to list</a>
  </div>
  
  <article>
    <h4>Description</h4>
      <p> ";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["anecdote"]) || array_key_exists("anecdote", $context) ? $context["anecdote"] : (function () { throw new RuntimeError('Variable "anecdote" does not exist.', 23, $this->source); })()), "description", [], "any", false, false, false, 23), "html", null, true);
        echo "</p>
    <h4>Content</h4>
      <p>";
        // line 25
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["anecdote"]) || array_key_exists("anecdote", $context) ? $context["anecdote"] : (function () { throw new RuntimeError('Variable "anecdote" does not exist.', 25, $this->source); })()), "content", [], "any", false, false, false, 25), "html", null, true);
        echo "</p>
    <h4>Picture</h4>
      <img src=\"";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["anecdote"]) || array_key_exists("anecdote", $context) ? $context["anecdote"] : (function () { throw new RuntimeError('Variable "anecdote" does not exist.', 27, $this->source); })()), "img", [], "any", false, false, false, 27), "html", null, true);
        echo "\">
    <h4>Source</h4>
      <a href=\"";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["anecdote"]) || array_key_exists("anecdote", $context) ? $context["anecdote"] : (function () { throw new RuntimeError('Variable "anecdote" does not exist.', 29, $this->source); })()), "source", [], "any", false, false, false, 29), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["anecdote"]) || array_key_exists("anecdote", $context) ? $context["anecdote"] : (function () { throw new RuntimeError('Variable "anecdote" does not exist.', 29, $this->source); })()), "source", [], "any", false, false, false, 29), "html", null, true);
        echo "</a>
  </article>
  
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "anecdote/read.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 29,  119 => 27,  114 => 25,  109 => 23,  101 => 18,  93 => 13,  88 => 11,  83 => 9,  79 => 8,  75 => 6,  68 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %} {{ parent() }} Anecdote - Read{% endblock %}

{% block body %}

<div class=\"container\">
{{ include('_partials/_nav.html.twig') }}
{{ include('_partials/_flash_messages.html.twig') }}

  <h1>{{ anecdote.title }}</h1>
  <div class=\"text-end\">
      <a href=\"{{url('backoffice_anecdote_edit', {\"id\": anecdote.id})}}\" class=\"btn btn-warning\">
            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-pencil\" viewBox=\"0 0 16 16\">
              <path d=\"M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z\"/>
            </svg>
      </a>
      <a href=\"{{url('backoffice_anecdote_browse')}}\" class=\"btn btn-dark\">Back to list</a>
  </div>
  
  <article>
    <h4>Description</h4>
      <p> {{anecdote.description}}</p>
    <h4>Content</h4>
      <p>{{anecdote.content}}</p>
    <h4>Picture</h4>
      <img src=\"{{anecdote.img}}\">
    <h4>Source</h4>
      <a href=\"{{anecdote.source}}\">{{anecdote.source}}</a>
  </article>
  
</div>
{% endblock %}", "anecdote/read.html.twig", "/var/www/html/projets/apothéose/avez-vous-deja-lu/back/projet-culture-g/avez-vous-deja-lu/templates/anecdote/read.html.twig");
    }
}
