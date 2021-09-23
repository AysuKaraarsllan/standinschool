<?php

/* design/translation_form.twig */
class __TwigTemplate_a3d669c909f1d9733da0c78cc56636b8818c379cfca3cdd4bf4af21a6eeaab1a extends Twig_Template
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
        // line 1
        echo (isset($context["header"]) ? $context["header"] : null);
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"pull-right\">
        <button type=\"submit\" form=\"form-translation\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo (isset($context["button_save"]) ? $context["button_save"] : null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
        <a href=\"";
        // line 7
        echo (isset($context["cancel"]) ? $context["cancel"] : null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_cancel"]) ? $context["button_cancel"] : null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a></div>
      <h1>";
        // line 8
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1>
      <ul class=\"breadcrumb\">
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 11
            echo "        <li><a href=\"";
            echo $this->getAttribute($context["breadcrumb"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array());
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\">
    ";
        // line 17
        if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
            // line 18
            echo "    <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 22
        echo "    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 24
        echo (isset($context["text_form"]) ? $context["text_form"] : null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 27
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-translation\" class=\"form-horizontal\">
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-store\">";
        // line 29
        echo (isset($context["entry_store"]) ? $context["entry_store"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"store_id\" id=\"input-store\" class=\"form-control\">
                <option value=\"0\">";
        // line 32
        echo (isset($context["text_default"]) ? $context["text_default"] : null);
        echo "</option>
                ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["stores"]) ? $context["stores"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 34
            echo "                ";
            if (($this->getAttribute($context["store"], "store_id", array()) == (isset($context["store_id"]) ? $context["store_id"] : null))) {
                // line 35
                echo "                <option value=\"";
                echo $this->getAttribute($context["store"], "store_id", array());
                echo "\" selected=\"selected\">";
                echo $this->getAttribute($context["store"], "name", array());
                echo "</option>
                ";
            } else {
                // line 37
                echo "                <option value=\"";
                echo $this->getAttribute($context["store"], "store_id", array());
                echo "\">";
                echo $this->getAttribute($context["store"], "name", array());
                echo "</option>
                ";
            }
            // line 39
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "              </select>
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-language\">";
        // line 44
        echo (isset($context["entry_language"]) ? $context["entry_language"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"language_id\" id=\"input-language\" class=\"form-control\">
                ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 48
            echo "                ";
            if (($this->getAttribute($context["language"], "language_id", array()) == (isset($context["language_id"]) ? $context["language_id"] : null))) {
                // line 49
                echo "                <option value=\"";
                echo $this->getAttribute($context["language"], "language_id", array());
                echo "\" selected=\"selected\">";
                echo $this->getAttribute($context["language"], "name", array());
                echo "</option>
                ";
            } else {
                // line 51
                echo "                <option value=\"";
                echo $this->getAttribute($context["language"], "language_id", array());
                echo "\">";
                echo $this->getAttribute($context["language"], "name", array());
                echo "</option>
                ";
            }
            // line 53
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "              </select>
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-route\">";
        // line 58
        echo (isset($context["entry_route"]) ? $context["entry_route"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"route\" id=\"input-route\" class=\"form-control\">
                ";
        // line 61
        if ((isset($context["route"]) ? $context["route"] : null)) {
            // line 62
            echo "                <option value=\"";
            echo (isset($context["route"]) ? $context["route"] : null);
            echo "\" selected=\"selected\">";
            echo (isset($context["route"]) ? $context["route"] : null);
            echo "</option>
                ";
        }
        // line 64
        echo "              </select>
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-key\">";
        // line 68
        echo (isset($context["entry_key"]) ? $context["entry_key"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"key\" id=\"input-key\" class=\"form-control\">
                ";
        // line 71
        if ((isset($context["key"]) ? $context["key"] : null)) {
            // line 72
            echo "                <option value=\"";
            echo (isset($context["key"]) ? $context["key"] : null);
            echo "\" selected=\"selected\">";
            echo (isset($context["key"]) ? $context["key"] : null);
            echo "</option>
                ";
        }
        // line 74
        echo "              </select>
              <input type=\"text\" name=\"key\" value=\"";
        // line 75
        echo (isset($context["key"]) ? $context["key"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_key"]) ? $context["entry_key"] : null);
        echo "\" class=\"form-control\" />
              ";
        // line 76
        if ((isset($context["error_key"]) ? $context["error_key"] : null)) {
            // line 77
            echo "              <div class=\"text-danger\">";
            echo (isset($context["error_key"]) ? $context["error_key"] : null);
            echo "</div>
              ";
        }
        // line 79
        echo "            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-default\">";
        // line 82
        echo (isset($context["entry_default"]) ? $context["entry_default"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <textarea name=\"default\" placeholder=\"";
        // line 84
        echo (isset($context["entry_default"]) ? $context["entry_default"] : null);
        echo "\" rows=\"5\" id=\"input-default\" class=\"form-control\" disabled=\"disabled\">";
        if ((isset($context["default"]) ? $context["default"] : null)) {
            echo (isset($context["default"]) ? $context["default"] : null);
        }
        echo "</textarea>
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-value\">";
        // line 88
        echo (isset($context["entry_value"]) ? $context["entry_value"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <textarea name=\"value\" rows=\"5\" placeholder=\"";
        // line 90
        echo (isset($context["entry_value"]) ? $context["entry_value"] : null);
        echo "\" id=\"input-value\" class=\"form-control\">";
        echo (isset($context["value"]) ? $context["value"] : null);
        echo "</textarea>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script type=\"text/javascript\"><!--
    ";
        // line 98
        if ((isset($context["key"]) ? $context["key"] : null)) {
            // line 99
            echo "    \$('select[name=\"store_id\"]').prop('disabled', true);
    \$('select[name=\"language_id\"]').prop('disabled', true);
    \$('select[name=\"route\"]').prop('disabled', true);
    \$('select[name=\"key\"]').prop('disabled', true);
    \$('input[name=\"key\"]').prop('disabled', true);
    ";
        } else {
            // line 105
            echo "    \$('select[name=\"language_id\"]').on('change', function() {
      \$.ajax({
        url: 'index.php?route=design/translation/path&user_token=";
            // line 107
            echo (isset($context["user_token"]) ? $context["user_token"] : null);
            echo "&language_id=' + \$('select[name=\"language_id\"]').val(),
        dataType: 'json',
        beforeSend: function() {
          \$('select[name=\"route\"]').html('');
          \$('select[name=\"key\"]').html('');
          \$('input[name=\"key\"]').val('');
          \$('textarea[name=\"default\"]').val('');
          \$('select[name=\"store_id\"]').prop('disabled', true);
          \$('select[name=\"language_id\"]').prop('disabled', true);
          \$('select[name=\"route\"]').prop('disabled', true);
          \$('select[name=\"key\"]').prop('disabled', true);
          \$('input[name=\"key\"]').prop('disabled', true);
          \$('textarea[name=\"value\"]').prop('disabled', true);
        },
        complete: function() {
          \$('select[name=\"store_id\"]').prop('disabled', false);
          \$('select[name=\"language_id\"]').prop('disabled', false);
          \$('select[name=\"route\"]').prop('disabled', false);
        },
        success: function(json) {
          html = '<option value=\"\"></option>';

          if (json) {
            for (i = 0; i < json.length; i++) {
              if (i == 0) {
                html += '<option value=\"' + json[i] + '\" selected=\"selected\">' + json[i] + '</option>';
              } else {
                html += '<option value=\"' + json[i] + '\">' + json[i] + '</option>';
              }
            }
          }

          \$('select[name=\"route\"]').html(html);

          \$('select[name=\"route\"]').trigger('change');
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
      });
    });

    var translation = [];

    \$('select[name=\"route\"]').on('change', function() {
      \$.ajax({
        url: 'index.php?route=design/translation/translation&user_token=";
            // line 153
            echo (isset($context["user_token"]) ? $context["user_token"] : null);
            echo "&language_id=' + \$('select[name=\"language_id\"]').val() + '&path=' + \$('select[name=\"route\"]').val(),
        dataType: 'json',
        ";
            // line 155
            if ( !(isset($context["key"]) ? $context["key"] : null)) {
                // line 156
                echo "        beforeSend: function() {
          \$('select[name=\"key\"]').html('');
          \$('input[name=\"key\"]').val('');
          \$('textarea[name=\"default\"]').val('');
          \$('textarea[name=\"value\"]').val('');
          \$('select[name=\"store_id\"]').prop('disabled', true);
          \$('select[name=\"language_id\"]').prop('disabled', true);
          \$('select[name=\"route\"]').prop('disabled', true);
          \$('select[name=\"key\"]').prop('disabled', true);
          \$('textarea[name=\"value\"]').prop('disabled', true);
        },
        complete: function() {
          \$('select[name=\"store_id\"]').prop('disabled', false);
          \$('select[name=\"language_id\"]').prop('disabled', false);
          \$('select[name=\"route\"]').prop('disabled', false);
          \$('select[name=\"key\"]').prop('disabled', false);
          \$('textarea[name=\"value\"]').prop('disabled', false);
        },
        ";
            }
            // line 175
            echo "        success: function(json) {
          translation = [];

          html = '<option value=\"\"></option>';

          if (json) {
            for (i = 0; i < json.length; i++) {
              translation[json[i]['key']] = json[i]['value'];

              if (i == 0) {
                html += '<option value=\"' + json[i]['key'] + '\" selected=\"selected\">' + json[i]['key'] + '</option>';
              } else {
                html += '<option value=\"' + json[i]['key'] + '\">' + json[i]['key'] + '</option>';
              }
            }
          }

          \$('select[name=\"key\"]').html(html);

          \$('select[name=\"key\"]').trigger('change');
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
      });
    });

    \$('select[name=\"language_id\"]').trigger('change');

    \$('select[name=\"key\"]').on('change', function() {
      if (\$(this).val()) {
        \$('textarea[name=\"default\"]').val(translation[\$('select[name=\"key\"]').val()]);
        \$('input[name=\"key\"]').val(\$('select[name=\"key\"]').val());

        \$('input[name=\"key\"]').prop('disabled', true);
      } else {
        \$('textarea[name=\"default\"]').val('');

        \$('input[name=\"key\"]').prop('disabled', false);
      }
    });
    ";
        }
        // line 217
        echo "  //--></script> 
</div>
";
        // line 219
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo " 
";
    }

    public function getTemplateName()
    {
        return "design/translation_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  408 => 219,  404 => 217,  360 => 175,  339 => 156,  337 => 155,  332 => 153,  283 => 107,  279 => 105,  271 => 99,  269 => 98,  256 => 90,  251 => 88,  240 => 84,  235 => 82,  230 => 79,  224 => 77,  222 => 76,  216 => 75,  213 => 74,  205 => 72,  203 => 71,  197 => 68,  191 => 64,  183 => 62,  181 => 61,  175 => 58,  169 => 54,  163 => 53,  155 => 51,  147 => 49,  144 => 48,  140 => 47,  134 => 44,  128 => 40,  122 => 39,  114 => 37,  106 => 35,  103 => 34,  99 => 33,  95 => 32,  89 => 29,  84 => 27,  78 => 24,  74 => 22,  66 => 18,  64 => 17,  58 => 13,  47 => 11,  43 => 10,  38 => 8,  32 => 7,  28 => 6,  19 => 1,);
    }
}
/* {{ header }}{{ column_left }}*/
/* <div id="content">*/
/*   <div class="page-header">*/
/*     <div class="container-fluid">*/
/*       <div class="pull-right">*/
/*         <button type="submit" form="form-translation" data-toggle="tooltip" title="{{ button_save }}" class="btn btn-primary"><i class="fa fa-save"></i></button>*/
/*         <a href="{{ cancel }}" data-toggle="tooltip" title="{{ button_cancel }}" class="btn btn-default"><i class="fa fa-reply"></i></a></div>*/
/*       <h1>{{ heading_title }}</h1>*/
/*       <ul class="breadcrumb">*/
/*         {% for breadcrumb in breadcrumbs %}*/
/*         <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*         {% endfor %}*/
/*       </ul>*/
/*     </div>*/
/*   </div>*/
/*   <div class="container-fluid">*/
/*     {% if error_warning %}*/
/*     <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}*/
/*       <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*     </div>*/
/*     {% endif %}*/
/*     <div class="panel panel-default">*/
/*       <div class="panel-heading">*/
/*         <h3 class="panel-title"><i class="fa fa-pencil"></i> {{ text_form }}</h3>*/
/*       </div>*/
/*       <div class="panel-body">*/
/*         <form action="{{ action }}" method="post" enctype="multipart/form-data" id="form-translation" class="form-horizontal">*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2 control-label" for="input-store">{{ entry_store }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select name="store_id" id="input-store" class="form-control">*/
/*                 <option value="0">{{ text_default }}</option>*/
/*                 {% for store in stores %}*/
/*                 {% if store.store_id == store_id %}*/
/*                 <option value="{{ store.store_id }}" selected="selected">{{ store.name }}</option>*/
/*                 {% else %}*/
/*                 <option value="{{ store.store_id }}">{{ store.name }}</option>*/
/*                 {% endif %}*/
/*                 {% endfor %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2 control-label" for="input-language">{{ entry_language }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select name="language_id" id="input-language" class="form-control">*/
/*                 {% for language in languages %}*/
/*                 {% if language.language_id == language_id %}*/
/*                 <option value="{{ language.language_id }}" selected="selected">{{ language.name }}</option>*/
/*                 {% else %}*/
/*                 <option value="{{ language.language_id }}">{{ language.name }}</option>*/
/*                 {% endif %}*/
/*                 {% endfor %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2 control-label" for="input-route">{{ entry_route }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select name="route" id="input-route" class="form-control">*/
/*                 {% if route %}*/
/*                 <option value="{{ route }}" selected="selected">{{ route }}</option>*/
/*                 {% endif %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2 control-label" for="input-key">{{ entry_key }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select name="key" id="input-key" class="form-control">*/
/*                 {% if key %}*/
/*                 <option value="{{ key }}" selected="selected">{{ key }}</option>*/
/*                 {% endif %}*/
/*               </select>*/
/*               <input type="text" name="key" value="{{ key }}" placeholder="{{ entry_key }}" class="form-control" />*/
/*               {% if error_key %}*/
/*               <div class="text-danger">{{ error_key }}</div>*/
/*               {% endif %}*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2 control-label" for="input-default">{{ entry_default }}</label>*/
/*             <div class="col-sm-10">*/
/*               <textarea name="default" placeholder="{{ entry_default }}" rows="5" id="input-default" class="form-control" disabled="disabled">{% if default %}{{ default }}{% endif %}</textarea>*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2 control-label" for="input-value">{{ entry_value }}</label>*/
/*             <div class="col-sm-10">*/
/*               <textarea name="value" rows="5" placeholder="{{ entry_value }}" id="input-value" class="form-control">{{ value }}</textarea>*/
/*             </div>*/
/*           </div>*/
/*         </form>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/*   <script type="text/javascript"><!--*/
/*     {% if key %}*/
/*     $('select[name="store_id"]').prop('disabled', true);*/
/*     $('select[name="language_id"]').prop('disabled', true);*/
/*     $('select[name="route"]').prop('disabled', true);*/
/*     $('select[name="key"]').prop('disabled', true);*/
/*     $('input[name="key"]').prop('disabled', true);*/
/*     {% else %}*/
/*     $('select[name="language_id"]').on('change', function() {*/
/*       $.ajax({*/
/*         url: 'index.php?route=design/translation/path&user_token={{ user_token }}&language_id=' + $('select[name="language_id"]').val(),*/
/*         dataType: 'json',*/
/*         beforeSend: function() {*/
/*           $('select[name="route"]').html('');*/
/*           $('select[name="key"]').html('');*/
/*           $('input[name="key"]').val('');*/
/*           $('textarea[name="default"]').val('');*/
/*           $('select[name="store_id"]').prop('disabled', true);*/
/*           $('select[name="language_id"]').prop('disabled', true);*/
/*           $('select[name="route"]').prop('disabled', true);*/
/*           $('select[name="key"]').prop('disabled', true);*/
/*           $('input[name="key"]').prop('disabled', true);*/
/*           $('textarea[name="value"]').prop('disabled', true);*/
/*         },*/
/*         complete: function() {*/
/*           $('select[name="store_id"]').prop('disabled', false);*/
/*           $('select[name="language_id"]').prop('disabled', false);*/
/*           $('select[name="route"]').prop('disabled', false);*/
/*         },*/
/*         success: function(json) {*/
/*           html = '<option value=""></option>';*/
/* */
/*           if (json) {*/
/*             for (i = 0; i < json.length; i++) {*/
/*               if (i == 0) {*/
/*                 html += '<option value="' + json[i] + '" selected="selected">' + json[i] + '</option>';*/
/*               } else {*/
/*                 html += '<option value="' + json[i] + '">' + json[i] + '</option>';*/
/*               }*/
/*             }*/
/*           }*/
/* */
/*           $('select[name="route"]').html(html);*/
/* */
/*           $('select[name="route"]').trigger('change');*/
/*         },*/
/*         error: function(xhr, ajaxOptions, thrownError) {*/
/*           alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/*         }*/
/*       });*/
/*     });*/
/* */
/*     var translation = [];*/
/* */
/*     $('select[name="route"]').on('change', function() {*/
/*       $.ajax({*/
/*         url: 'index.php?route=design/translation/translation&user_token={{ user_token }}&language_id=' + $('select[name="language_id"]').val() + '&path=' + $('select[name="route"]').val(),*/
/*         dataType: 'json',*/
/*         {% if not key %}*/
/*         beforeSend: function() {*/
/*           $('select[name="key"]').html('');*/
/*           $('input[name="key"]').val('');*/
/*           $('textarea[name="default"]').val('');*/
/*           $('textarea[name="value"]').val('');*/
/*           $('select[name="store_id"]').prop('disabled', true);*/
/*           $('select[name="language_id"]').prop('disabled', true);*/
/*           $('select[name="route"]').prop('disabled', true);*/
/*           $('select[name="key"]').prop('disabled', true);*/
/*           $('textarea[name="value"]').prop('disabled', true);*/
/*         },*/
/*         complete: function() {*/
/*           $('select[name="store_id"]').prop('disabled', false);*/
/*           $('select[name="language_id"]').prop('disabled', false);*/
/*           $('select[name="route"]').prop('disabled', false);*/
/*           $('select[name="key"]').prop('disabled', false);*/
/*           $('textarea[name="value"]').prop('disabled', false);*/
/*         },*/
/*         {% endif %}*/
/*         success: function(json) {*/
/*           translation = [];*/
/* */
/*           html = '<option value=""></option>';*/
/* */
/*           if (json) {*/
/*             for (i = 0; i < json.length; i++) {*/
/*               translation[json[i]['key']] = json[i]['value'];*/
/* */
/*               if (i == 0) {*/
/*                 html += '<option value="' + json[i]['key'] + '" selected="selected">' + json[i]['key'] + '</option>';*/
/*               } else {*/
/*                 html += '<option value="' + json[i]['key'] + '">' + json[i]['key'] + '</option>';*/
/*               }*/
/*             }*/
/*           }*/
/* */
/*           $('select[name="key"]').html(html);*/
/* */
/*           $('select[name="key"]').trigger('change');*/
/*         },*/
/*         error: function(xhr, ajaxOptions, thrownError) {*/
/*           alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/*         }*/
/*       });*/
/*     });*/
/* */
/*     $('select[name="language_id"]').trigger('change');*/
/* */
/*     $('select[name="key"]').on('change', function() {*/
/*       if ($(this).val()) {*/
/*         $('textarea[name="default"]').val(translation[$('select[name="key"]').val()]);*/
/*         $('input[name="key"]').val($('select[name="key"]').val());*/
/* */
/*         $('input[name="key"]').prop('disabled', true);*/
/*       } else {*/
/*         $('textarea[name="default"]').val('');*/
/* */
/*         $('input[name="key"]').prop('disabled', false);*/
/*       }*/
/*     });*/
/*     {% endif %}*/
/*   //--></script> */
/* </div>*/
/* {{ footer }} */
/* */
