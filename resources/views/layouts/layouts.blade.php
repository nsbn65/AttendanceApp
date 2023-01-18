<!DOCTYPE html>
<html lang="jp">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/layouts.css"/>
    <title>AttendanceApp</title>
  </head>
  <body>
    <header class = "header">
      <h1 class = "ttl">Atte</h1>
      @yield('header-list')
    </header>

    @yield('content')

    <footer class = "footer">
      <p class = "logo-footer">Atte,inc.</p>
    </footer>
  </body>
</html>
