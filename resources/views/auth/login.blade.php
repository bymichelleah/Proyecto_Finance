<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - FINANCE</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  @vite(['resources/css/login.css']) 
</head>
<body>
  <div class="container">
    <div class="card">

      <!-- Panel izquierdo -->
      <div class="panel-left">
        <div class="logo-large">
          <div class="logo-mark">
            <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" fill="none">
              <rect x="8" y="26" width="8" height="22" rx="2" fill="white" opacity="0.95"/>
              <rect x="24" y="18" width="8" height="30" rx="2" fill="white" opacity="0.95"/>
              <rect x="40" y="10" width="8" height="38" rx="2" fill="white" opacity="0.95"/>
              <path d="M38 8 L50 8 L50 20" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <div>
            <div class="brand-text">FINANCE</div>
            <div style="color:#5f64a8;font-weight:600;margin-top:6px;font-size:13px;">Analytics & Insights</div>
          </div>
        </div>
      </div>

      <!-- Panel derecho -->
      <div class="panel-right">
        <h1 class="title">¡Bienvenido(a)!</h1>
        <p class="subtitle">¡Qué bueno tenerte de vuelta! Inicia sesión para acceder a tu cuenta.</p>

        <div class="social-row">
          <a class="btn-social" href="{{ url('auth/google') }}">
            <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google" style="width:18px;height:18px;">
            Entrar con Google
          </a>
          <a class="btn-social" href="{{ url('auth/github') }}">
            <img src="https://www.svgrepo.com/show/341847/github.svg" alt="GitHub" style="width:18px;height:18px;">
            Entrar con GitHub
          </a>
        </div>

        <div class="divider">o continuar con</div>

        <form action="/login" method="POST">
          @csrf
          <div class="field">
            <label for="email">Correo Electrónico</label>
            <input id="email" type="email" placeholder="Ingresa tu correo electrónico" >
          </div>

          <div class="field">
            <label for="password">Contraseña</label>
            <input id="password" type="password" placeholder="********" >
          </div>

          <button type="submit" class="btn-primary">Ingresar</button>
        </form>
      </div>

    </div>
  </div>
</body>
</html>
