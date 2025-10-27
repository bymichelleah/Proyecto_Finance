<h1>Bienvenido {{ Auth::user()->name }}</h1>
<p>Email: {{ Auth::user()->email }}</p>
<a href="/logout">Cerrar sesión</a>
