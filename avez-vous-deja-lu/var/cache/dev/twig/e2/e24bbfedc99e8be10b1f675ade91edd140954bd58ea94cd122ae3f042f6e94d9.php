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

/* user/add.edit.html.twig */
class __TwigTemplate_ed6412e0d86b1b369837d83e3eec7e6c4f4f120f07134bfaf95fd631ad839e20 extends Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/add.edit.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "user/add.edit.html.twig", 1);
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
        if ((is_string($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 4, $this->source); })()), "request", [], "any", false, false, false, 4), "get", [0 => "_route"], "method", false, false, false, 4)) && is_string($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = "backoffice_user_add") && ('' === $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 || 0 === strpos($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4, $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144)))) {
            // line 5
            echo "    ";
            $this->displayParentBlock("title", $context, $blocks);
            echo " New User
    ";
        } else {
            // line 7
            echo "    ";
            $this->displayParentBlock("title", $context, $blocks);
            echo " Edit User
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
        if ((is_string($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 17, $this->source); })()), "request", [], "any", false, false, false, 17), "get", [0 => "_route"], "method", false, false, false, 17)) && is_string($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = "backoffice_user_add") && ('' === $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 || 0 === strpos($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b, $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002)))) {
            // line 18
            echo "          New User
      ";
        } else {
            // line 20
            echo "          Edit ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 20, $this->source); })()), "pseudo", [], "any", false, false, false, 20), "html", null, true);
            echo "
      ";
        }
        // line 22
        echo "  </h1>

  <div class=\"text-end\">
  <a href=\"";
        // line 25
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("backoffice_user_browse");
        echo "\" class=\"btn btn-dark\">Back to list</a>
  </div>
  
  
  <!--novalidate disable the html validation-->
  ";
        // line 30
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["user_form"]) || array_key_exists("user_form", $context) ? $context["user_form"] : (function () { throw new RuntimeError('Variable "user_form" does not exist.', 30, $this->source); })()), 'form_start', ["attr" => ["novalidate" => "novalidate"]]);
        echo "

      <div class=\"form-group\">
      ";
        // line 33
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["user_form"]) || array_key_exists("user_form", $context) ? $context["user_form"] : (function () { throw new RuntimeError('Variable "user_form" does not exist.', 33, $this->source); })()), "pseudo", [], "any", false, false, false, 33), 'label', ["label_attr" => ["class" => " col-sm-1 control-label"]]);
        echo "
        <div class=\"col-sm-10\">
          ";
        // line 35
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["user_form"]) || array_key_exists("user_form", $context) ? $context["user_form"] : (function () { throw new RuntimeError('Variable "user_form" does not exist.', 35, $this->source); })()), "pseudo", [], "any", false, false, false, 35), 'widget', ["attr" => ["class" => "form-control"]]);
        echo "
          ";
        // line 36
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["user_form"]) || array_key_exists("user_form", $context) ? $context["user_form"] : (function () { throw new RuntimeError('Variable "user_form" does not exist.', 36, $this->source); })()), "pseudo", [], "any", false, false, false, 36), 'errors');
        echo "
        </div>
      </div>
      <div class=\"form-group\">
      ";
        // line 40
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["user_form"]) || array_key_exists("user_form", $context) ? $context["user_form"] : (function () { throw new RuntimeError('Variable "user_form" does not exist.', 40, $this->source); })()), "email", [], "any", false, false, false, 40), 'label', ["label_attr" => ["class" => " col-sm-1 control-label"]]);
        echo "
        <div class=\"col-sm-10\">
          ";
        // line 42
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["user_form"]) || array_key_exists("user_form", $context) ? $context["user_form"] : (function () { throw new RuntimeError('Variable "user_form" does not exist.', 42, $this->source); })()), "email", [], "any", false, false, false, 42), 'widget', ["attr" => ["class" => "form-control"]]);
        echo "
          ";
        // line 43
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["user_form"]) || array_key_exists("user_form", $context) ? $context["user_form"] : (function () { throw new RuntimeError('Variable "user_form" does not exist.', 43, $this->source); })()), "email", [], "any", false, false, false, 43), 'errors');
        echo "
        </div>
      </div>
      <div class=\"form-group\">
      ";
        // line 47
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["user_form"]) || array_key_exists("user_form", $context) ? $context["user_form"] : (function () { throw new RuntimeError('Variable "user_form" does not exist.', 47, $this->source); })()), "password", [], "any", false, false, false, 47), 'label', ["label_attr" => ["class" => " col-sm-1 control-label"]]);
        echo "
        <div class=\"col-sm-10\">
          ";
        // line 49
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["user_form"]) || array_key_exists("user_form", $context) ? $context["user_form"] : (function () { throw new RuntimeError('Variable "user_form" does not exist.', 49, $this->source); })()), "password", [], "any", false, false, false, 49), 'widget', ["attr" => ["class" => "form-control"]]);
        echo "
          ";
        // line 50
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["user_form"]) || array_key_exists("user_form", $context) ? $context["user_form"] : (function () { throw new RuntimeError('Variable "user_form" does not exist.', 50, $this->source); })()), "password", [], "any", false, false, false, 50), 'errors');
        echo "
        </div>
      </div>
      <div class=\"form-group\">
      ";
        // line 54
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["user_form"]) || array_key_exists("user_form", $context) ? $context["user_form"] : (function () { throw new RuntimeError('Variable "user_form" does not exist.', 54, $this->source); })()), "img", [], "any", false, false, false, 54), 'label', ["label_attr" => ["class" => " col-sm-1 control-label"]]);
        echo "
        <div class=\"col-sm-10\">
          ";
        // line 56
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["user_form"]) || array_key_exists("user_form", $context) ? $context["user_form"] : (function () { throw new RuntimeError('Variable "user_form" does not exist.', 56, $this->source); })()), "img", [], "any", false, false, false, 56), 'widget', ["attr" => ["class" => "form-control"]]);
        echo "
          ";
        // line 57
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["user_form"]) || array_key_exists("user_form", $context) ? $context["user_form"] : (function () { throw new RuntimeError('Variable "user_form" does not exist.', 57, $this->source); })()), "img", [], "any", false, false, false, 57), 'errors');
        echo "
        </div>
      </div>

      <button type=\"submit\" class=\"btn btn-primary mt-4\">
      ";
        // line 62
        if ((0 === twig_compare("backoffice_user_add", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 62, $this->source); })()), "request", [], "any", false, false, false, 62), "get", [0 => "_route"], "method", false, false, false, 62)))) {
            // line 63
            echo "      Add
      ";
        } else {
            // line 65
            echo "      Edit
      ";
        }
        // line 67
        echo "      </button>
  ";
        // line 68
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["user_form"]) || array_key_exists("user_form", $context) ? $context["user_form"] : (function () { throw new RuntimeError('Variable "user_form" does not exist.', 68, $this->source); })()), 'form_end');
        echo " 

</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "user/add.edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  209 => 68,  206 => 67,  202 => 65,  198 => 63,  196 => 62,  188 => 57,  184 => 56,  179 => 54,  172 => 50,  168 => 49,  163 => 47,  156 => 43,  152 => 42,  147 => 40,  140 => 36,  136 => 35,  131 => 33,  125 => 30,  117 => 25,  112 => 22,  106 => 20,  102 => 18,  100 => 17,  94 => 14,  90 => 13,  87 => 12,  80 => 11,  69 => 7,  63 => 5,  60 => 4,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}
    {% if app.request.get('_route') starts with 'backoffice_user_add' %}
    {{ parent() }} New User
    {% else %}
    {{ parent() }} Edit User
    {% endif %}
{% endblock %}

{% block body %}
<div class=\"container\">
  {{ include('_partials/_nav.html.twig') }}
  {{ include('_partials/_flash_messages.html.twig') }}

  <h1> 
      {% if app.request.get('_route') starts with 'backoffice_user_add' %}
          New User
      {% else %}
          Edit {{ user.pseudo }}
      {% endif %}
  </h1>

  <div class=\"text-end\">
  <a href=\"{{url('backoffice_user_browse')}}\" class=\"btn btn-dark\">Back to list</a>
  </div>
  
  
  <!--novalidate disable the html validation-->
  {{ form_start(user_form, {'attr': {'novalidate': 'novalidate'}}) }}

      <div class=\"form-group\">
      {{ form_label(user_form.pseudo, null, {'label_attr': {'class': ' col-sm-1 control-label'}}) }}
        <div class=\"col-sm-10\">
          {{ form_widget(user_form.pseudo, {'attr': {'class': 'form-control'}}) }}
          {{ form_errors(user_form.pseudo) }}
        </div>
      </div>
      <div class=\"form-group\">
      {{ form_label(user_form.email, null, {'label_attr': {'class': ' col-sm-1 control-label'}}) }}
        <div class=\"col-sm-10\">
          {{ form_widget(user_form.email, {'attr': {'class': 'form-control'}}) }}
          {{ form_errors(user_form.email) }}
        </div>
      </div>
      <div class=\"form-group\">
      {{ form_label(user_form.password, null, {'label_attr': {'class': ' col-sm-1 control-label'}}) }}
        <div class=\"col-sm-10\">
          {{ form_widget(user_form.password, {'attr': {'class': 'form-control'}}) }}
          {{ form_errors(user_form.password) }}
        </div>
      </div>
      <div class=\"form-group\">
      {{ form_label(user_form.img, null, {'label_attr': {'class': ' col-sm-1 control-label'}}) }}
        <div class=\"col-sm-10\">
          {{ form_widget(user_form.img, {'attr': {'class': 'form-control'}}) }}
          {{ form_errors(user_form.img) }}
        </div>
      </div>

      <button type=\"submit\" class=\"btn btn-primary mt-4\">
      {% if 'backoffice_user_add' == app.request.get('_route') %}
      Add
      {% else %}
      Edit
      {% endif %}
      </button>
  {{ form_end(user_form) }} 

</div>
{% endblock %}", "user/add.edit.html.twig", "/var/www/html/projets/apothéose/avez-vous-deja-lu/back/projet-culture-g/avez-vous-deja-lu/templates/user/add.edit.html.twig");
    }
}
