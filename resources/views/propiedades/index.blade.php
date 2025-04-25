<h2>Propiedades disponibles</h2>
@foreach($propiedades as $p)
    <div>
        <h3>{{ $p->titulo }}</h3>
        <p>{{ $p->descripción }}</p>
        <p>Precio por noche: ${{ $p->precio_por_noche }}</p>
        @if(session('user') && session('user')->rol == 'cliente')
            <a href="{{ route('reservas.create', $p->id) }}">Reservar</a>
        @endif
    </div>
@endforeach
