
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title> Relais Tec - @yield('title') </title>

    <!-- Bootstrap core CSS -->
    {{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/design.css') }}" rel="stylesheet">
    
    <!-- Bootstrap table css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- <link href="{{ asset('css/table.min.css') }}" rel="stylesheet"> -->

  </head>

  <body style="background-color: rgb(229, 235, 250)">
    <header class="navbar navbar-expand-md navbar-light bg-light">
        <a href="#" class="navbar-brand">
          <img src="https://www.ess-bretagne.org/images/medias/le_relais_15_le_relais.png" alt="logo">
        </a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar-content">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-content">
          <nav class=" ml-auto">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="/" class="nav-link active">
                  Accueil
                </a>
              </li>
              <li class="nav-item active">
                <a href="{{ route('chauffeurs.list') }}" class="nav-link">
                  Chauffeurs
                </a>
              </li>
                <li class="nav-item active">
                <a href="{{ route('voitures.list') }}" class="nav-link">
                  Voitures
                </a>
              </li>
                <li class="nav-item active">
                <a href="{{ route('visites.list') }}" class="nav-link">
                  Visites
                </a>
              </li>
                <li class="nav-item">
                <a href="{{ route('infos.create') }}" class="nav-link disabled">
                  Formulaire
                </a>
              </li>
            </ul>
          </nav>
        </div>
    </header>

    <div class="container">

        @yield('content')

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
    <!-- table_script -->
    <script>
          $(document).ready(function() {
              $('#example').DataTable({
                "order":[0,'desc']
              });
          } );
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <!-- <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script> -->
  </body>
</html>
