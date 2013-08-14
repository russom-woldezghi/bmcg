<?php

/* gallery_edit_image.html.twig */
class __TwigTemplate_5354c32cbef43f06d0516ab8ebcac196 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 7
        echo "
";
        // line 8
        if ((isset($context["deleted"]) ? $context["deleted"] : null)) {
            // line 9
            echo "<script type=\"text/javascript\">
//<![CDATA[
(function(\$){
    mainWin = window.dialogArguments || opener || parent || top;
    mainWin.tb_remove();
})(jQuery);
//]]>
</script>
";
        } else {
            // line 18
            echo "
";
            // line 19
            if (((isset($context["did_save"]) ? $context["did_save"] : null) && ((isset($context["has_error"]) ? $context["has_error"] : null) == false))) {
                // line 20
                echo "<div id=\"message\" class=\"updated\"><p>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Image was updated"), "html", null, true);
                echo "</p></div>
";
            }
            // line 22
            echo "
<form method=\"post\" action=\"\" class=\"media-upload-form type-form validate\" style=\"margin:1em;\">
    ";
            // line 24
            echo (isset($context["nonce"]) ? $context["nonce"] : null);
            echo "
    <div id=\"media-items\">
        <div class=\"media-item preloaded\">
        ";
            // line 27
            echo (isset($context["media_item"]) ? $context["media_item"] : null);
            echo "
        </div>
    </div>
    <p class=\"savebutton ml-submit\">
        ";
            // line 31
            echo (isset($context["submit"]) ? $context["submit"] : null);
            echo "
    </p>
</form>
";
        }
    }

    public function getTemplateName()
    {
        return "gallery_edit_image.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 31,  56 => 27,  50 => 24,  46 => 22,  40 => 20,  38 => 19,  35 => 18,  24 => 9,  22 => 8,  19 => 7,);
    }
}
