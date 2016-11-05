<?php

/* layout.html */
class __TwigTemplate_196dc5bd8aff0d7f0573d9a994c05c83ad10e62e079fcaa98e57903c5764002a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<title></title>
\t</head>
\t<body>
\t\t<header>header</header>
\t\t<content>
\t\t\t";
        // line 10
        $this->displayBlock('content', $context, $blocks);
        // line 12
        echo "\t\t</content>
\t\t<footer>
\t\t\tfooter
\t\t</footer>
\t</body>
</html>
";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "\t\t\t";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function getDebugInfo()
    {
        return array (  46 => 11,  43 => 10,  33 => 12,  31 => 10,  20 => 1,);
    }

    public function getSource()
    {
        return "<!DOCTYPE html>
<html>
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<title></title>
\t</head>
\t<body>
\t\t<header>header</header>
\t\t<content>
\t\t\t{% block content %}
\t\t\t{% endblock %}
\t\t</content>
\t\t<footer>
\t\t\tfooter
\t\t</footer>
\t</body>
</html>
";
    }
}
