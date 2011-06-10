<?php
// carrega classe mobile
require_once "ismobile.class.php";
// instancia classe IsMobile
$ismobi = new IsMobile();
// se for mobile, mandar para versão mobile do site
if($ismobi->CheckMobile()) {
    //echo 'Your mobile device is a ' . $ismobi->GetMobileDevice() . '? ';
    header('Location: mobi/');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1" >
    <title>Calculadora da Jana</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="calculator.ico">
    <link rel="apple-touch-icon" href="calculator-128.png">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" type="text/css" media="all" />
    <style type="text/css">
        body {
            width: 760px;
            margin: 0 auto;
        }
            ul, ul * {
                margin: 0;
                padding: 0;
            }
            ul li {
                display: inline;
            }
            ul li a {
                font-size: xx-small;
            }
            #footer {
                text-align: center;
            }
    </style>
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-23860787-1']);
      _gaq.push(['_setDomainName', '.rogeriopradoj.com']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
</head>
<body class="ui-widget">
    <ul>
        <li><a href="mobi/">Mobile</a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/contato/">Contato</a></li>
        <li><a href="http://blog.rogeriopradoj.com">Blog</a></li>
        <li><a href="http://rogeriopradoj.com">Portal</a></li>
    </ul>
    <div id="header" class="ui-widget-header">
        <h1>Calculadora da Jana</h1>
        <p>Pois advogados (e jornalistas) precisam de uma ajuda nas contas!</p>
    </div>
    <div id="entry" class="ui-widget-content">
        <form>
            <fieldset>
                <legend>Calcular honorários</legend>
            <p>
            <label for="acao">Qual o valor da ação do cliente?</label>
            <input id="acao" type="text">
            </p>
            <p>
            <label for="honorario">Humor?</label>
            <select id="honorario">
                <option value=".3">Estou legal hoje: só 30%</option>
                <option value=".5">Não fui com a cara do cara: 50%</option>
                <option value=".7">Sem explicação: 70%</option>
            </select>
            </p>
            <input id="calcular" type="submit" value="Calcular o meu!">
            <p id="result"></p>
            </fieldset>
        </form>
    </div>
    <div id="footer" class="ui-state-highlight">
        <p>(c) <?php echo date('Y');?> - <a href="http://rogeriopradoj.com">rogeriopradoj.com</a></p>
    </div>
    <script src="https://www.google.com/jsapi?key=ABQIAAAAyMsBjONULfcVHXK7LMmTThQKM37SVr7td1hHSepMJtMbxMD2-hRMZ9wtYo3JKVFi2zetIv9EbVAHrA" type="text/javascript"></script>
    <script type="text/javascript">
    //<![CDATA[
    google.load("jquery", "1");
    google.load("jqueryui", "1");
    //]]>
    </script>
    <script src="js/jquery.maskMoney.js"></script>
    <script src="js/jquery.global.js"></script>
    <script src="js/jquery.glob.pt-BR.js"></script>
    <script>
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        if ( ! confirm("Esta é uma aplicação de humor!\n\nSe você aceita isso, confirme.\n\nSe não aceita, cancele.") ) {
            window.location = "/";
        }
        $.global.preferCulture("pt-BR");
        //console.log(jQuery.global.culture.name); // "pt-BR"
        $("#acao").maskMoney({symbol:'R$ ', showSymbol:true, thousands:'.', decimal:','});
        $("#calcular").click(function(event){
            event.preventDefault();
            var acao = $.global.parseFloat($("#acao").val());
            var value = $("#honorario").val() * acao;
            //console.log(typeof acao);
            //console.log(acao);
            //console.log(value);
            $("#result").text("Fico com " + jQuery.global.format(value, "c"));
        });
    });
    </script>
  </body>
</html>
