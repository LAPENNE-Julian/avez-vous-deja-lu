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

/* anecdote/add.edit.html.twig */
class __TwigTemplate_971517c6656973607f92405ffd0e80c1bd82a06f31dfcb23cb619bb9793967e8 extends Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "anecdote/add.edit.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "anecdote/add.edit.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        // line 4
        echo "    ";
        if ((is_string($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 4, $this->source); })()), "request", [], "any", false, false, false, 4), "get", [0 => "_route"], "method", false, false, false, 4)) && is_string($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = "backoffice_anecdote_add") && ('' === $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 || 0 === strpos($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4, $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144)))) {
            // line 5
            echo "    ";
            $this->displayParentBlock("title", $context, $blocks);
            echo " New Anecdote
    ";
        } else {
            // line 7
            echo "    ";
            $this->displayParentBlock("title", $context, $blocks);
            echo " Edit Anecdote
    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 11
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "<div class=\"container\">
  ";
        // line 13
        echo twig_include($this->env, $context, "_partials/_nav.html.twig");
        echo "
  ";
        // line 14
        echo twig_include($this->env, $context, "_partials/_flash_messages.html.twig");
        echo "

  <h1> 
      ";
        // line 17
        if ((is_string($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 17, $this->source); })()), "request", [], "any", false, false, false, 17), "get", [0 => "_route"], "method", false, false, false, 17)) && is_string($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = "backoffice_anecdote_add") && ('' === $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 || 0 === strpos($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b, $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002)))) {
            // line 18
            echo "          New anecdote
      ";
        } else {
            // line 20
            echo "          Edit ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["anecdote"]) || array_key_exists("anecdote", $context) ? $context["anecdote"] : (function () { throw new RuntimeError('Variable "anecdote" does not exist.', 20, $this->source); })()), "title", [], "any", false, false, false, 20), "html", null, true);
            echo "
      ";
        }
        // line 22
        echo "  </h1>

  <div class=\"text-end\">
  <a href=\"";
        // line 25
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("backoffice_anecdote_browse");
        echo "\" class=\"btn btn-dark\">Back to list</a>
  </div>
  
  
  <!--novalidate disable the html validation-->
  ";
        // line 30
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["anecdote_form"]) || array_key_exists("anecdote_form", $context) ? $context["anecdote_form"] : (function () { throw new RuntimeError('Variable "anecdote_form" does not exist.', 30, $this->source); })()), 'form_start', ["attr" => ["novalidate" => "novalidate"]]);
        echo "

      <div class=\"form-group\">
      ";
        // line 33
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["anecdote_form"]) || array_key_exists("anecdote_form", $context) ? $context["anecdote_form"] : (function () { throw new RuntimeError('Variable "anecdote_form" does not exist.', 33, $this->source); })()), "title", [], "any", false, false, false, 33), 'label', ["label_attr" => ["class" => " col-sm-1 control-label"]]);
        echo "
        <div class=\"col-sm-10\">
          ";
        // line 35
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["anecdote_form"]) || array_key_exists("anecdote_form", $context) ? $context["anecdote_form"] : (function () { throw new RuntimeError('Variable "anecdote_form" does not exist.', 35, $this->source); })()), "title", [], "any", false, false, false, 35), 'widget', ["attr" => ["class" => "form-control"]]);
        echo "
          ";
        // line 36
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["anecdote_form"]) || array_key_exists("anecdote_form", $context) ? $context["anecdote_form"] : (function () { throw new RuntimeError('Variable "anecdote_form" does not exist.', 36, $this->source); })()), "title", [], "any", false, false, false, 36), 'errors');
        echo "
        </div>
      </div>

      <div class=\"form-group\">
      ";
        // line 41
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["anecdote_form"]) || array_key_exists("anecdote_form", $context) ? $context["anecdote_form"] : (function () { throw new RuntimeError('Variable "anecdote_form" does not exist.', 41, $this->source); })()), "description", [], "any", false, false, false, 41), 'label', ["label_attr" => ["class" => " col-sm-1 control-label"]]);
        echo "
        <div class=\"col-sm-10\">
          ";
        // line 43
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["anecdote_form"]) || array_key_exists("anecdote_form", $context) ? $context["anecdote_form"] : (function () { throw new RuntimeError('Variable "anecdote_form" does not exist.', 43, $this->source); })()), "description", [], "any", false, false, false, 43), 'widget', ["attr" => ["class" => "form-control"]]);
        echo "
          ";
        // line 44
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["anecdote_form"]) || array_key_exists("anecdote_form", $context) ? $context["anecdote_form"] : (function () { throw new RuntimeError('Variable "anecdote_form" does not exist.', 44, $this->source); })()), "description", [], "any", false, false, false, 44), 'errors');
        echo "
        </div>
      </div>
      
      <div class=\"form-group\">
      ";
        // line 49
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["anecdote_form"]) || array_key_exists("anecdote_form", $context) ? $context["anecdote_form"] : (function () { throw new RuntimeError('Variable "anecdote_form" does not exist.', 49, $this->source); })()), 'errors');
        echo "
      ";
        // line 50
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["anecdote_form"]) || array_key_exists("anecdote_form", $context) ? $context["anecdote_form"] : (function () { throw new RuntimeError('Variable "anecdote_form" does not exist.', 50, $this->source); })()), "content", [], "any", false, false, false, 50), 'label', ["label_attr" => ["class" => " col-sm-1 control-label"]]);
        echo "
        <div class=\"col-sm-10\">
          ";
        // line 52
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["anecdote_form"]) || array_key_exists("anecdote_form", $context) ? $context["anecdote_form"] : (function () { throw new RuntimeError('Variable "anecdote_form" does not exist.', 52, $this->source); })()), "content", [], "any", false, false, false, 52), 'widget', ["attr" => ["class" => "form-control"]]);
        echo "
        </div>
      ";
        // line 54
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["anecdote_form"]) || array_key_exists("anecdote_form", $context) ? $context["anecdote_form"] : (function () { throw new RuntimeError('Variable "anecdote_form" does not exist.', 54, $this->source); })()), "content", [], "any", false, false, false, 54), 'errors');
        echo "
      </div>

      <div class=\"form-group\">
      ";
        // line 58
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["anecdote_form"]) || array_key_exists("anecdote_form", $context) ? $context["anecdote_form"] : (function () { throw new RuntimeError('Variable "anecdote_form" does not exist.', 58, $this->source); })()), "source", [], "any", false, false, false, 58), 'label', ["label_attr" => ["class" => " col-sm-1 control-label"]]);
        echo "
        <div class=\"col-sm-10\">
          ";
        // line 60
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["anecdote_form"]) || array_key_exists("anecdote_form", $context) ? $context["anecdote_form"] : (function () { throw new RuntimeError('Variable "anecdote_form" does not exist.', 60, $this->source); })()), "source", [], "any", false, false, false, 60), 'widget', ["attr" => ["class" => "form-control"]]);
        echo "
          ";
        // line 61
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["anecdote_form"]) || array_key_exists("anecdote_form", $context) ? $context["anecdote_form"] : (function () { throw new RuntimeError('Variable "anecdote_form" does not exist.', 61, $this->source); })()), "source", [], "any", false, false, false, 61), 'errors');
        echo "
        </div>
      </div>

      <div class=\"form-group\">
      ";
        // line 66
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["anecdote_form"]) || array_key_exists("anecdote_form", $context) ? $context["anecdote_form"] : (function () { throw new RuntimeError('Variable "anecdote_form" does not exist.', 66, $this->source); })()), "img", [], "any", false, false, false, 66), 'label', ["label_attr" => ["class" => " col-sm-1 control-label"]]);
        echo "
        <div class=\"col-sm-10\">
          ";
        // line 68
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["anecdote_form"]) || array_key_exists("anecdote_form", $context) ? $context["anecdote_form"] : (function () { throw new RuntimeError('Variable "anecdote_form" does not exist.', 68, $this->source); })()), "img", [], "any", false, false, false, 68), 'widget', ["attr" => ["class" => "form-control"]]);
        echo "
          ";
        // line 69
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["anecdote_form"]) || array_key_exists("anecdote_form", $context) ? $context["anecdote_form"] : (function () { throw new RuntimeError('Variable "anecdote_form" does not exist.', 69, $this->source); })()), "img", [], "any", false, false, false, 69), 'errors');
        echo "
        </div>
      </div>

      <div class=\"form-group\">
      ";
        // line 74
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["anecdote_form"]) || array_key_exists("anecdote_form", $context) ? $context["anecdote_form"] : (function () { throw new RuntimeError('Variable "anecdote_form" does not exist.', 74, $this->source); })()), "category", [], "any", false, false, false, 74), 'label', ["label_attr" => ["class" => " col-sm-1 control-label"]]);
        echo "
        <div class=\"col-sm-10\">
          ";
        // line 76
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["anecdote_form"]) || array_key_exists("anecdote_form", $context) ? $context["anecdote_form"] : (function () { throw new RuntimeError('Variable "anecdote_form" does not exist.', 76, $this->source); })()), "category", [], "any", false, false, false, 76), 'widget', ["attr" => ["class" => "pr-2"]]);
        echo "
          ";
        // line 77
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["anecdote_form"]) || array_key_exists("anecdote_form", $context) ? $context["anecdote_form"] : (function () { throw new RuntimeError('Variable "anecdote_form" does not exist.', 77, $this->source); })()), "category", [], "any", false, false, false, 77), 'errors');
        echo "
        </div>
      </div>

      <button type=\"submit\" class=\"btn btn-primary mt-4\">
      ";
        // line 82
        if ((0 === twig_compare("backoffice_anecdote_add", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 82, $this->source); })()), "request", [], "any", false, false, false, 82), "get", [0 => "_route"], "method", false, false, false, 82)))) {
            // line 83
            echo "      Add
      ";
        } else {
            // line 85
            echo "      Edit
      ";
        }
        // line 87
        echo "      </button>
  ";
        // line 88
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["anecdote_form"]) || array_key_exists("anecdote_form", $context) ? $context["anecdote_form"] : (function () { throw new RuntimeError('Variable "anecdote_form" does not exist.', 88, $this->source); })()), 'form_end');
        echo " 

</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "anecdote/add.edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  250 => 88,  247 => 87,  243 => 85,  239 => 83,  237 => 82,  229 => 77,  225 => 76,  220 => 74,  212 => 69,  208 => 68,  203 => 66,  195 => 61,  191 => 60,  186 => 58,  179 => 54,  174 => 52,  169 => 50,  165 => 49,  157 => 44,  153 => 43,  148 => 41,  140 => 36,  136 => 35,  131 => 33,  125 => 30,  117 => 25,  112 => 22,  106 => 20,  102 => 18,  100 => 17,  94 => 14,  90 => 13,  87 => 12,  80 => 11,  69 => 7,  63 => 5,  60 => 4,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}
    {% if app.request.get('_route') starts with 'backoffice_anecdote_add' %}
    {{ parent() }} New Anecdote
    {% else %}
    {{ parent() }} Edit Anecdote
    {% endif %}
{% endblock %}

{% block body %}
<div class=\"container\">
  {{ include('_partials/_nav.html.twig') }}
  {{ include('_partials/_flash_messages.html.twig') }}

  <h1> 
      {% if app.request.get('_route') starts with 'backoffice_anecdote_add' %}
          New anecdote
      {% else %}
          Edit {{ anecdote.title }}
      {% endif %}
  </h1>

  <div class=\"text-end\">
  <a href=\"{{url('backoffice_anecdote_browse')}}\" class=\"btn btn-dark\">Back to list</a>
  </div>
  
  
  <!--novalidate disable the html validation-->
  {{ form_start(anecdote_form, {'attr': {'novalidate': 'novalidate'}}) }}

      <div class=\"form-group\">
      {{ form_label(anecdote_form.title, null, {'label_attr': {'class': ' col-sm-1 control-label'}}) }}
        <div class=\"col-sm-10\">
          {{ form_widget(anecdote_form.title, {'attr': {'class': 'form-control'}}) }}
          {{ form_errors(anecdote_form.title) }}
        </div>
      </div>

      <div class=\"form-group\">
      {{ form_label(anecdote_form.description, null, {'label_attr': {'class': ' col-sm-1 control-label'}}) }}
        <div class=\"col-sm-10\">
          {{ form_widget(anecdote_form.description, {'attr': {'class': 'form-control'}}) }}
          {{ form_errors(anecdote_form.description) }}
        </div>
      </div>
      
      <div class=\"form-group\">
      {{ form_errors(anecdote_form) }}
      {{ form_label(anecdote_form.content, null, {'label_attr': {'class': ' col-sm-1 control-label'}}) }}
        <div class=\"col-sm-10\">
          {{ form_widget(anecdote_form.content, {'attr': {'class': 'form-control'}}) }}
        </div>
      {{ form_errors(anecdote_form.content) }}
      </div>

      <div class=\"form-group\">
      {{ form_label(anecdote_form.source, null, {'label_attr': {'class': ' col-sm-1 control-label'}}) }}
        <div class=\"col-sm-10\">
          {{ form_widget(anecdote_form.source, {'attr': {'class': 'form-control'}}) }}
          {{ form_errors(anecdote_form.source) }}
        </div>
      </div>

      <div class=\"form-group\">
      {{ form_label(anecdote_form.img, null, {'label_attr': {'class': ' col-sm-1 control-label'}}) }}
        <div class=\"col-sm-10\">
          {{ form_widget(anecdote_form.img, {'attr': {'class': 'form-control'}}) }}
          {{ form_errors(anecdote_form.img) }}
        </div>
      </div>

      <div class=\"form-group\">
      {{ form_label(anecdote_form.category, null, {'label_attr': {'class': ' col-sm-1 control-label'}}) }}
        <div class=\"col-sm-10\">
          {{ form_widget(anecdote_form.category, {'attr': {'class': 'pr-2'}}) }}
          {{ form_errors(anecdote_form.category) }}
        </div>
      </div>

      <button type=\"submit\" class=\"btn btn-primary mt-4\">
      {% if 'backoffice_anecdote_add' == app.request.get('_route') %}
      Add
      {% else %}
      Edit
      {% endif %}
      </button>
  {{ form_end(anecdote_form) }} 

</div>
{% endblock %}", "anecdote/add.edit.html.twig", "/var/www/html/projets/apothéose/avez-vous-deja-lu/back/projet-culture-g/avez-vous-deja-lu/templates/anecdote/add.edit.html.twig");
    }
}
