<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cruises</title>
</head>

<body class="antialiased">
<noscript>You need to enable JavaScript to run this app.</noscript>

<div id="root"></div>

@viteReactRefresh
@vite('resources/js/index.jsx')
</body>
</html>
