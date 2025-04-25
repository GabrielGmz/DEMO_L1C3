<form method="POST" action="{{ route('login.submit') }}">
    @csrf
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="contraseña" placeholder="Contraseña">
    <button type="submit">Iniciar sesión</button>
</form>
