<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript">(function(d, t, e, m){
    
    // Async Rating-Widget initialization.
    window.RW_Async_Init = function(){
                
        RW.init({
            huid: "325801",
            uid: "f3560b5831b1f068cfd778cb7ee4751c",
            source: "website",
            options: {
                "advanced": {
                    "font": {
                        "hover": {
                            "color": "#008EAA"
                        },
                        "bold": true,
                        "color": "#008EAA",
                        "type": "\"Droid Sans\", Helvetica, sans-serif"
                    },
                    "text": {
                        "rateAwful": "Poor",
                        "ratePoor": "OK"
                    }
                },
                "size": "medium",
                "label": {
                    "background": "#AAD1EB"
                },
                "style": "payment_coin",
                "isDummy": false
            } 
        });
        RW.render();
    };
        // Append Rating-Widget JavaScript library.
    var rw, s = d.getElementsByTagName(e)[0], id = "rw-js",
        l = d.location, ck = "Y" + t.getFullYear() + 
        "M" + t.getMonth() + "D" + t.getDate(), p = l.protocol,
        f = ((l.search.indexOf("DBG=") > -1) ? "" : ".min"),
        a = ("https:" === p ? "secure." + m + "js/" : "js." + m);
    if (d.getElementById(id)) return;              
    rw = d.createElement(e);
    rw.id = id; rw.async = true; rw.type = "text/javascript";
    rw.src = p + "//" + a + "external" + f + ".js?ck=" + ck;
    s.parentNode.insertBefore(rw, s);
    }(document, new Date(), "script", "rating-widget.com/"));</script>
        <title></title>
    </head>
    <body>
        <div class="rw-ui-container"></div>
        <?php
        // put your code here
        ?>
    </body>
</html>
