<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>TheReUseShop</title>
        <style>
		header {
			background-color: #4ea93b;
			height: 80px;
			display: flex;
			align-items: center;
			justify-content: center;
			cursor: pointer;
		}
		
		h1 {
			color: white;
			font-size: 30px;
			margin: 0;
		}
	</style>
    </head>
    <body>
	<header class="header" onclick="window.location.href='{{ route('articulos') }}'">
		<h1>TheReUseShop</h1>
	</header>
        <br>
        @yield('contenido')
    </body>
</html>