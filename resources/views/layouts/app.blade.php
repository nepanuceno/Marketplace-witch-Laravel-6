<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MarketPlace - Laravel 6</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="/css/app.css"> -->
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{ route('home') }}">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  @auth
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item @if(request()->is('admin/store*')) active @endif">
        <a class="nav-link" href="{{ route('admin.store.index') }}">Lojas <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item @if(request()->is('admin/products*')) active @endif">
        <a class="nav-link" href="{{ route('admin.products.index') }}">Produtos</a>
      </li>
      <li class="nav-item @if(request()->is('admin/categories*')) active @endif">
        <a class="nav-link" href="{{ route('admin.categories.index') }}">Categorias</a>
      </li>
    </ul>
    <div class="my-2 my-lg-0">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">{{ auth()->user()->name }} </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="event.preventDefault(); document.querySelector('#form_logout').submit();">Sair
            <form action="{{ route('logout') }}" id="form_logout" method="post">
              @csrf
            </form>
          </a>
        </li>
      </ul>
    </div>
  </div>
  @endauth
</nav>

	<div class="container">
		<div class="pt-2">
			@include('flash::message')
		</div>
		@yield('content')

	</div>
    <!-- <script src="/js/app.js"></script> -->
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
	<script src="https://kit.fontawesome.com/72da054647.js" crossorigin="anonymous"></script>
	<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		});

    $('div.alert').not('.alert-important').delay(3500).fadeOut(4000);

    // $(document).ready(function() {
    //   $('.select2').select2();
    // });
	</script>

    @yield('javascript')

</body>
</html>
