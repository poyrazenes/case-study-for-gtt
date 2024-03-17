<!-- HTML for static distribution bundle build -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mobile Api V1 - GTT</title>
    <link rel="stylesheet" type="text/css" href="https://petstore.swagger.io/swagger-ui.css" />

    <style>
        html
        {
            box-sizing: border-box;
            overflow: -moz-scrollbars-vertical;
            overflow-y: scroll;
        }

        *,
        *:before,
        *:after
        {
            box-sizing: inherit;
        }

        body
        {
            margin:0;
            background: #fafafa;
        }
    </style>
</head>

<body>
<div id="swagger-ui"></div>

<script src="https://petstore.swagger.io/swagger-ui-bundle.js" charset="UTF-8"> </script>
<script src="https://petstore.swagger.io/swagger-ui-standalone-preset.js" charset="UTF-8"> </script>
<script>
    window.onload = function() {
        const ui = SwaggerUIBundle({
            "dom_id": "#swagger-ui",
            deepLinking: true,
            presets: [
                SwaggerUIBundle.presets.apis,
                SwaggerUIStandalonePreset
            ],
            plugins: [
                SwaggerUIBundle.plugins.DownloadUrl
            ],
            layout: "StandaloneLayout",
            validatorUrl: "https://validator.swagger.io/validator",
            url: "/files/swagger/swagger.yaml",
        })

        window.ui = ui;
    };
</script>
</body>
</html>
