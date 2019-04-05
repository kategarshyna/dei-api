<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>

    <title>API Documentation</title>
    <link rel="stylesheet" type="text/css" href="//unpkg.com/swagger-ui-dist@3/swagger-ui.css">
</head>

<body>
<script src="//unpkg.com/swagger-ui-dist@3/swagger-ui-bundle.js"></script>
<div class="swagger-ui">
    <div class="information-container wrapper">
        <code><b>Header</b>[authorization:Bearer $auth_token]</code>
    </div>
    <form class="wrapper" id="api-auth">
        <input placeholder="Email" type="text" name="email">
        <input placeholder="Password" class="form-control" type="password" name="password">
        <button style="padding: 9px 23px;" class="opblock opblock-post btn" type="button" id="get-token">Get token</button>
    </form>
    <div id="auth-token-block" class="wrapper hidden">
        <p style="word-break: break-all" id="auth-token"></p>
    </div>
</div>
<div id="docs"></div>
<script>
    insertHtml();
    var btn = document.getElementById('get-token');
    btn.addEventListener('click', function () {
        var form = document.getElementById('api-auth');
        var data = new FormData(form);

        fetch('{{ route('api.customers.login') }}', {
            method: 'POST',
            body: data
        }).then(function(response) {
            if (response.ok) {
                response.json().then(function (value) {
                    setToken(value.token);
                    insertHtml();
                    form.reset();
                });

                return;
            }

            throw new Error('Network response was not ok.')
        }).catch(function(error) {
            alert(error.message);
        });
    });

    function getToken() {
        return localStorage.getItem('dei_sw_api_token');
    }

    function setToken(token) {
        localStorage.setItem('dei_sw_api_token', token);
    }

    function insertHtml() {
        if (getToken() !== null) {
            document.getElementById('auth-token').innerHTML = "<b>Authorized by token:</b><br/><br/>" + getToken();
        }
    }
    const ui = SwaggerUIBundle({
        url: "{{ route('docs.json') }}",
        dom_id: "#docs",
        presets: [
            SwaggerUIBundle.presets.apis,
            SwaggerUIBundle.SwaggerUIStandalonePreset
        ],
        requestInterceptor: function (request) {
            var token = getToken();

            if (token) {
                request.headers.Authorization = 'Bearer ' + token;
            }

            return request;
        }
    });
</script>
</body>
</html>
