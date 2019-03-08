#!/bin/bash
outputHtmlFile=$1
if [ -z "$outputHtmlFile" ]
then
    echo "Missing output html file"
    exit 2
fi
echo '<!DOCTYPE html>
<html>
<head>
    <title>NOBORDER API DOCUMENTATION | Vestiaire Collective</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            margin: 0;
            padding-top: 40px;
        }
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 100;
            font-family: Roboto, sans-serif;
            font-weight: 400;
            font-size: 13px;
        }
        api-logo {
          padding: 15px 20px;
        }
        #links_container {
            margin: 0;
            padding: 0;
            background-color: #000;
        }
        #links_container li {
            display: inline-block;
            padding: 10px;
            line-height: 20px;
            color: white;
            cursor: pointer;
        }
        .openapi-button {
          color: #fff !important;
          border-color: #de8962 !important;
          background-color: #de8962 !important;
        }
    </style>
    <link rel="shortcut icon" href="https://www.vestiairecollective.com/favicon_vc.ico?v=2"/>
</head>
<body>
<!-- Top navigation placeholder -->
<nav>
    <ul id="links_container">
    </ul>
</nav>
<redoc scroll-y-offset="body > nav"></redoc>
<script src="https://cdn.jsdelivr.net/npm/redoc/bundles/redoc.standalone.js"> </script>
<script>
    // list of APIS
    function loadJSON(file, callback) {
        var xobj = new XMLHttpRequest();
        xobj.overrideMimeType("application/json");
        xobj.open("GET", file, true); // Replace "my_data" with the path to your file
        xobj.onreadystatechange = function () {
            if (xobj.readyState == 4 && xobj.status == "200") {
                // Required use of an anonymous callback as .open will NOT return a value but simply returns undefined in asynchronous mode
                callback(xobj.responseText);
            }
        };
        xobj.send(null);
    }
    function load(callback) {
        loadJSON("version.json", function(response) {
            callback(JSON.parse(response));
        });
    }
    load(function (apis) {
        // initially render first API
        var latest = apis.length -1 ;
        Redoc.init(apis[latest].url);
        function onClick() {
            var url = this.getAttribute("data-link");
            Redoc.init(url);
        }
        // dynamically building navigation items
        var $list = document.getElementById("links_container");
        apis.forEach(function(api) {
            var $listitem = document.createElement("li");
            $listitem.setAttribute("data-link", api.url);
            $listitem.innerText = api.name;
            $listitem.addEventListener("click", onClick);
            $list.appendChild($listitem);
        });
    });
</script>
</body>
</html>' > $outputHtmlFile

