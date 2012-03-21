<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Symfony2 y su ecosistema - Listado de tareas</title>
    <meta name="description" content="Código ejemplo Codemotion España 2012">
    <meta name="author" content="Fco Javier Aceituno">

    <!-- styles -->
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/assets/css/main.css" rel="stylesheet">
  </head>

  <body>

    <!-- Header  -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="brand" href="#">Gestor de tareas</a>
          <div class="nav-collapse">
            <form method="get" class="navbar-search pull-left">
              <input name='name' type="text" class="search-query" placeholder="Buscar">
            </form>
            <p class="navbar-text pull-right">Symfony 2 y su ecosistema</p>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <!-- Content -->
    <div class="container-fluid">
      <div class="row-fluid">
        <!-- Panel de acciones -->
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Tareas</li>
              <li class="active"><a href="/app.php/task/list"><i class="icon-th-list"></i> Listado</a></li>
              <li><a href="/app.php/task/create"><i class="icon-plus"></i> Crear nueva</a></li>
            </ul>
          </div>
        </div>

        <!-- Contenido general -->
        <div class="span9">
        <h1>Tarea "<?php echo $this->task->getName() ?>"</h1>
        </div>
      </div>
    </div>

    <hr>

    <footer>
      <div class="container-fluid">
        <div class="nav-collapse">
          <p class="navbar-text pull-left">Francisco Javier Aceituno Lapido</p>
          <p class="navbar-text pull-right">
            <a target="_blank" href="http://es.linkedin.com/pub/francisco-javier-aceituno-lapido/32/313/94b"><img alt="Linkedin" src="/assets/img/icon/linkedin.png"></a>
            <a target="_blank" href="http://www.twitter.com/javiacei"><img alt="Twitter" src="/assets/img/icon/twitter.png"></a>
            <a target="_blank" href="https://github.com/javiacei"><img alt="Github" src="/assets/img/icon/github.png"></a>
          </p>
        </div>
      </div>
    </footer>

  </body>
</html>
