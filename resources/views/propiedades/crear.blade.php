<form method="POST" action="{{ route('propiedades.store') }}">
    @csrf
    <input name="titulo" placeholder="Título">
    <textarea name="descripción" placeholder="Descripción"></textarea>
    <input name="precio_por_noche" placeholder="Precio por noche">
    <input name="capacidad" placeholder="Capacidad">
    <select name="estado">
        <option value="disponible">Disponible</option>
        <option value="no disponible">No Disponible</option>
    </select>
    <button type="submit">Guardar propiedad</button>
</form>
