<!DOCTYPE html>
<html>
  <head>
      <title></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @routes
  </head>
  <body class="bg-gray-200 min-h-screen font-base">
    @inertia
  </body>
</html>
