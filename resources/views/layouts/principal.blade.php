<html>
	<head>
		<meta charset="UTF-8">
		<title>Pacientes</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/principal.css') }}">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
	</head>
	<body>
        <header>
			<div class="container">
				<h1 class="titulo">Arcari Nutrição</h1>
				<button type="button" class="btn btn-default pull-right" aria-label="Right Align" style=" margin-top:3px;">
				  <span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Estatísticas
				</button>
			</div>
        </header>
        <main class="principal">
            @yield('conteudo')
        </main>
    </body>