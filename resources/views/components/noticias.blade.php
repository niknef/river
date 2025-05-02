<section id="seccion-libre" class="my-5">
    <div class="container">
        <div class="title pt-3 pb-5">
        <h2 class="position-relative d-inline-block ms-4">Últimas Novedades</h2>
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            @forelse($noticias as $noticia)
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        @if ($noticia->imagen)
                            <img src="{{ asset('images/' . $noticia->imagen) }}" class="card-img-top" alt="{{ $noticia->titulo }}">
                        @endif
                        <div class="card-body">
                            <h3 class="card-title">{{ $noticia->titulo }}</h3>
                            <p class="card-text">{{ $noticia->contenido }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No hay novedades por el momento.</p>
            @endforelse
        </div>
    </div>
</section>