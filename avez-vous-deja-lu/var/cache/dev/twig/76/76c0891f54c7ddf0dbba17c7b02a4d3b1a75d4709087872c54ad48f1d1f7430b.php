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

/* category/add.edit.html.twig */
class __TwigTemplate_48800a0ecd1981a73a9dd3d255367e4459bdf0db85c37b49e38f81ad9912d0e2 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'name' => [$this, 'block_name'],
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "category/add.edit.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "category/add.edit.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_name($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "name"));

        // line 4
        echo "    ";
        if ((is_string($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 4, $this->source); })()), "request", [], "any", false, false, false, 4), "get", [0 => "_route"], "method", false, false, false, 4)) && is_string($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = "backoffice_category_add") && ('' === $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 || 0 === strpos($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4, $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144)))) {
            // line 5
            echo "    ";
            $this->displayParentBlock("name", $context, $blocks);
            echo " New Category
    ";
        } else {
            // line 7
            echo "    ";
            $this->displayParentBlock("name", $context, $blocks);
            echo " Edit Category
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
        if ((is_string($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 17, $this->source); })()), "request", [], "any", false, false, false, 17), "get", [0 => "_route"], "method", false, false, false, 17)) && is_string($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = "backoffice_category_add") && ('' === $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 || 0 === strpos($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b, $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002)))) {
            // line 18
            echo "          New category
      ";
        } else {
            // line 20
            echo "          Edit category
      ";
        }
        // line 22
        echo "  </h1>

  <div class=\"text-end\">
  <a href=\"";
        // line 25
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("backoffice_category_browse");
        echo "\" class=\"btn btn-dark\">Back to list</a>
  </div>
  
  
  <!--novalidate disable the html validation-->
  ";
        // line 30
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["category_form"]) || array_key_exists("category_form", $context) ? $context["category_form"] : (function () { throw new RuntimeError('Variable "category_form" does not exist.', 30, $this->source); })()), 'form_start', ["attr" => ["novalidate" => "novalidate"]]);
        echo "

      <div class=\"form-group\">
      ";
        // line 33
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["category_form"]) || array_key_exists("category_form", $context) ? $context["category_form"] : (function () { throw new RuntimeError('Variable "category_form" does not exist.', 33, $this->source); })()), "name", [], "any", false, false, false, 33), 'label', ["label_attr" => ["class" => " col-sm-1 control-label"]]);
        echo "
        <div class=\"col-sm-10\">
          ";
        // line 35
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["category_form"]) || array_key_exists("category_form", $context) ? $context["category_form"] : (function () { throw new RuntimeError('Variable "category_form" does not exist.', 35, $this->source); })()), "name", [], "any", false, false, false, 35), 'widget', ["attr" => ["class" => "form-control"]]);
        echo "
          ";
        // line 36
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["category_form"]) || array_key_exists("category_form", $context) ? $context["category_form"] : (function () { throw new RuntimeError('Variable "category_form" does not exist.', 36, $this->source); })()), "name", [], "any", false, false, false, 36), 'errors');
        echo "
        </div>
      </div>

      <div class=\"form-group\">
      ";
        // line 41
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["category_form"]) || array_key_exists("category_form", $context) ? $context["category_form"] : (function () { throw new RuntimeError('Variable "category_form" does not exist.', 41, $this->source); })()), "color", [], "any", false, false, false, 41), 'label', ["label_attr" => ["class" => " col-sm-1 control-label"]]);
        echo "
        <div class=\"col-sm-10\">
          ";
        // line 43
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["category_form"]) || array_key_exists("category_form", $context) ? $context["category_form"] : (function () { throw new RuntimeError('Variable "category_form" does not exist.', 43, $this->source); })()), "color", [], "any", false, false, false, 43), 'widget', ["attr" => ["class" => "form-control"]]);
        echo "
          ";
        // line 44
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["category_form"]) || array_key_exists("category_form", $context) ? $context["category_form"] : (function () { throw new RuntimeError('Variable "category_form" does not exist.', 44, $this->source); })()), "color", [], "any", false, false, false, 44), 'errors');
        echo "
        </div>
      </div>
      
      <div class=\"form-group\">
      ";
        // line 49
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["category_form"]) || array_key_exists("category_form", $context) ? $context["category_form"] : (function () { throw new RuntimeError('Variable "category_form" does not exist.', 49, $this->source); })()), "img", [], "any", false, false, false, 49), 'label', ["label_attr" => ["class" => " col-sm-1 control-label"]]);
        echo "
        <div class=\"col-sm-10\">
          ";
        // line 51
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["category_form"]) || array_key_exists("category_form", $context) ? $context["category_form"] : (function () { throw new RuntimeError('Variable "category_form" does not exist.', 51, $this->source); })()), "img", [], "any", false, false, false, 51), 'widget', ["attr" => ["class" => "form-control"]]);
        echo "
        </div>
      ";
        // line 53
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["category_form"]) || array_key_exists("category_form", $context) ? $context["category_form"] : (function () { throw new RuntimeError('Variable "category_form" does not exist.', 53, $this->source); })()), "img", [], "any", false, false, false, 53), 'errors');
        echo "
      </div>

      <button type=\"submit\" class=\"btn btn-primary mt-4\">
      ";
        // line 57
        if ((0 === twig_compare("backoffice_category_add", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 57, $this->source); })()), "request", [], "any", false, false, false, 57), "get", [0 => "_route"], "method", false, false, false, 57)))) {
            // line 58
            echo "      Add
      ";
        } else {
            // line 60
            echo "      Edit
      ";
        }
        // line 62
        echo "      </button>
  ";
        // line 63
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["category_form"]) || array_key_exists("category_form", $context) ? $context["category_form"] : (function () { throw new RuntimeError('Variable "category_form" does not exist.', 63, $this->source); })()), 'form_end');
        echo " 

</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "category/add.edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  193 => 63,  190 => 62,  186 => 60,  182 => 58,  180 => 57,  173 => 53,  168 => 51,  163 => 49,  155 => 44,  151 => 43,  146 => 41,  138 => 36,  134 => 35,  129 => 33,  123 => 30,  115 => 25,  110 => 22,  106 => 20,  102 => 18,  100 => 17,  94 => 14,  90 => 13,  87 => 12,  80 => 11,  69 => 7,  63 => 5,  60 => 4,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block name %}
    {% if app.request.get('_route') starts with 'backoffice_category_add' %}
    {{ parent() }} New Category
    {% else %}
    {{ parent() }} Edit Category
    {% endif %}
{% endblock %}

{% block body %}
<div class=\"container\">
  {{ include('_partials/_nav.html.twig') }}
  {{ include('_partials/_flash_messages.html.twig') }}

  <h1> 
      {% if app.request.get('_route') starts with 'backoffice_category_add' %}
          New category
      {% else %}
          Edit category
      {% endif %}
  </h1>

  <div class=\"text-end\">
  <a href=\"{{url('backoffice_category_browse')}}\" class=\"btn btn-dark\">Back to list</a>
  </div>
  
  
  <!--novalidate disable the html validation-->
  {{ form_start(category_form, {'attr': {'novalidate': 'novalidate'}}) }}

      <div class=\"form-group\">
      {{ form_label(category_form.name, null, {'label_attr': {'class': ' col-sm-1 control-label'}}) }}
        <div class=\"col-sm-10\">
          {{ form_widget(category_form.name, {'attr': {'class': 'form-control'}}) }}
          {{ form_errors(category_form.name) }}
        </div>
      </div>

      <div class=\"form-group\">
      {{ form_label(category_form.color, null, {'label_attr': {'class': ' col-sm-1 control-label'}}) }}
        <div class=\"col-sm-10\">
          {{ form_widget(category_form.color, {'attr': {'class': 'form-control'}}) }}
          {{ form_errors(category_form.color) }}
        </div>
      </div>
      
      <div class=\"form-group\">
      {{ form_label(category_form.img, null, {'label_attr': {'class': ' col-sm-1 control-label'}}) }}
        <div class=\"col-sm-10\">
          {{ form_widget(category_form.img, {'attr': {'class': 'form-control'}}) }}
        </div>
      {{ form_errors(category_form.img) }}
      </div>

      <button type=\"submit\" class=\"btn btn-primary mt-4\">
      {% if 'backoffice_category_add' == app.request.get('_route') %}
      Add
      {% else %}
      Edit
      {% endif %}
      </button>
  {{ form_end(category_form) }} 

</div>
{% endblock %}", "category/add.edit.html.twig", "/var/www/html/projets/apothéose/avez-vous-deja-lu/back/projet-culture-g/avez-vous-deja-lu/templates/category/add.edit.html.twig");
    }
}
