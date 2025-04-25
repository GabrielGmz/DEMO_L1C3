<div style="text-align: center; margin-bottom: 20px; width: 100%; height:100vh; display: flex; justify-content: center; flex-direction: column; align-items: center;">
<h2 style="text-align: center;">Reservar: {{ $propiedad->titulo }}</h2>
<form method="POST" action="{{ route('reservas.store', $propiedad->id) }}" style="display: flex; flex-direction: column; align-items: center; gap: 15px; background-color: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); width: 300px;">
    @csrf
    <input type="date" name="fecha_inicio" style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; width: 100%;">
    <input type="date" name="fecha_fin" style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; width: 100%;">
    <select name="estado" style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; width: 100%;">
        <option value="pendiente">Pendiente</option>
    </select>
    <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
        Reservar
    </button>
</form>
</div>
