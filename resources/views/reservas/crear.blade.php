<h2>Reservar: {{ $propiedad->titulo }}</h2>
<form method="POST" action="{{ route('reservas.store', $propiedad->id) }}">
    @csrf
    <input type="date" name="fecha_inicio">
    <input type="date" name="fecha_fin">
    <select name="estado">
        <option value="pendiente">Pendiente</option>
    </select>
    <button type="submit">Reservar</button>
</form>
