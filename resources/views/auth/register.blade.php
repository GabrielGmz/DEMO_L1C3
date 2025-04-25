<form method="POST" action="{{ route('register.submit') }}">
    @csrf
    <input type="text" name="nombre" placeholder="Nombre">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="contraseña" placeholder="Contraseña">
    <select name="rol">
        <option value="cliente">Cliente</option>
        <option value="propietario">Propietario</option>
    </select>
    <button type="submit">Registrarse</button>
</form>
