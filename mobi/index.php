<?php
  // Copyright 2009 Google Inc. All Rights Reserved.
  $GA_ACCOUNT = "MO-23860787-2";
  //$GA_PIXEL = "/ga.php";
  $GA_PIXEL = "ga.php";

  function googleAnalyticsGetImageUrl() {
    global $GA_ACCOUNT, $GA_PIXEL;
    $url = "";
    $url .= $GA_PIXEL . "?";
    $url .= "utmac=" . $GA_ACCOUNT;
    $url .= "&utmn=" . rand(0, 0x7fffffff);
    $referer = $_SERVER["HTTP_REFERER"];
    $query = $_SERVER["QUERY_STRING"];
    $path = $_SERVER["REQUEST_URI"];
    if (empty($referer)) {
      $referer = "-";
    }
    $url .= "&utmr=" . urlencode($referer);
    if (!empty($path)) {
      $url .= "&utmp=" . urlencode($path);
    }
    $url .= "&guid=ON";
    return str_replace("&", "&amp;", $url);
  }
?>
<!DOCTYPE html>
<!--<html>-->
<html manifest="cache.appcache.php">
  <head>
    <script>
    if (window.applicationCache) {
    	applicationCache.addEventListener('updateready', function() {
	        if (confirm('Uma nova versão está disponível. Mostrar agora?')) {
            	window.location.reload();
        	}
    	});
	}
    </script>
    <meta charset="utf-8">
    <title>Calculadora da Jana</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="shortcut icon" href="../calculator.ico">
    <link rel="apple-touch-icon" href="../calculator-128.png">
    <link rel="stylesheet" href="jquery.mobile/jquery.mobile.min.css" />
    <style type="text/css">
    </style>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script src="jquery.mobile/jquery.mobile.min.js"></script>
    <script src="../js/jquery.maskMoney.js"></script>
    <script src="../js/jquery.global.js"></script>
    <script src="../js/jquery.glob.pt-BR.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#acao').focus();
            $("form").bind("submit", function(event) {
                event.preventDefault();
            });
            $.global.preferCulture("pt-BR");
            $("#acao").maskMoney({symbol:'R$ ', showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
            //console.log('teste');
            $("#calcular").click(function(event){
                var acao      = $.global.parseFloat($("#acao").val());
                var honorario = parseFloat($("#honorario").val());
                var advogados = parseInt($("#advogados").val())
                var resultado = honorario * acao;
                //console.log(acao);
                //console.log(typeof acao);
                //console.log(honorario);
                //console.log(typeof honorario);
                //console.log(resultado);
                //console.log(typeof resultado);
                //console.log(advogados);
                //console.log(typeof advogados);
                $("#result").html(
                    '<table>'
                    + '<tr>'
                        + '<th>' + 'Quant. Advogados' + '</th>'
                        + '<td>' + jQuery.global.format(advogados, 'n0') + '</td>'
                    + '</tr>'
                    + '<tr>'
                        + '<th>' + 'Cada um fica com' + '</th>'
                        + '<td>' + jQuery.global.format(resultado / advogados, "c") + '</td>'
                    + '</tr>'
                    + '<tr>'
                        + '<th>' + 'Ação total' + '</th>'
                        + '<td>' + jQuery.global.format(acao, "c") + '</td>'
                    + '</tr>'
                    + '<tr>'
                        + '<th>' + 'Honorários' + '</th>'
                        + '<td>' + jQuery.global.format(honorario, "p0") + '</td>'
                    + '</tr>'
                    + '<tr>'
                        + '<th>' + 'Sobra pro cliente' + '</th>'
                        + '<td>' + jQuery.global.format((acao - resultado), 'c') + '</td>'
                    + '</tr>'
                    + '</table>'
                );
            });
        });
    </script>
  </head>
  <body>
     <div data-role="page" id="input">
        <div data-role="header">
          <h1>Calculadora da Jana</h1>
        </div>
        <form data-role="content">
            <fieldset>
                <legend>Calcular honorários</legend>
                <label for="acao">Qual o valor da ação do cliente?</label><br />
                    <input id="acao" type="number" placeholder="Em reais (R$)"><br />
                <label for="honorario">Humor?</label><br />
                    <select id="honorario">
                        <option value=".3">Estou legal, 30%</option>
                        <option value=".5">Não fui com a cara, 50%</option>
                        <option value=".7">Sem explicação, 70%</option>
                    </select><br />
                <label for="advogados">Advogados</label><br />
                    <select id="advogados">
                        <option value="1">Um apenas, só eu né!!</option>
                        <option value="2">Dois, tive que dividir</option>
                        <option value="3">Três, é demais!!</option>
                    </select><br />
                <a href="#output" id="calcular" data-role="button" data-theme="b">Calcular o meu!</a><br />
            </fieldset>
        </form>
        <div data-role="footer">
            <p>(c) <?php echo date('Y');?> - <a href="http://pradoj.com">pradoj.com</a> - <a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/contato/">Contato</a></p>
        </div>
        <script type="text/javascript">
	bb_bid = "1639816";
	bb_lang = "pt-BR";
	bb_keywords = "advogado, direito, calculadora";
	bb_name = "custom";
	bb_limit = "4";
	bb_format = "bbe";
</script>
<script type="text/javascript" src="http://static.boo-box.com/javascripts/embed.js"></script>
<script type="text/javascript"><!--
google_ad_client = "ca-pub-7518068256340054";
/* jana */
google_ad_slot = "2048934118";
google_ad_width = 125;
google_ad_height = 125;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
    </div>


    <div data-role="page" id="output">
        <div data-role="header">
          <a href="#input" data-rel="back">Voltar</a>
          <h1>Calculadora da Jana</h1>
        </div>
        <div data-role="content">
            <p id="result"></p>
        </div>
        <div data-role="footer">
            <p>(c) <?php echo date('Y');?> - <a href="http://pradoj.com">pradoj.com</a> - <a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/contato/">Contato</a></p>
        </div>
    </div>
    <?php
    $googleAnalyticsImageUrl = googleAnalyticsGetImageUrl();
    echo '<img alt ="" src="' . $googleAnalyticsImageUrl . '" />';?>
  </body>
</html>
