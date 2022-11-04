@extends('layouts.layout')
@push('style')
<link rel="stylesheet" href="{{asset('css/gallery/gallery.css')}}">
@endpush

@section('gallery')
<div class="testimonial">
    <h1 class="h1-gallery">Galeria</h1>
    <div class="wrapper">
        <!-- filter Items -->
        <nav>
            <div class="items">
                <span class="item active" data-name="all">Todos</span>
                <span class="item" data-name="bag">Categoria1</span>
                <span class="item" data-name="shoe">Categoria2</span>
                <span class="item" data-name="watch">Categoria3</span>
                <span class="item" data-name="camera">Categoria4</span>
                <span class="item" data-name="headphone">Categoria5</span>
            </div>
        </nav>
        <!-- filter Images -->
        <div class="gallery">
            <div class="image" data-name="bag"><span><img src="https://picsum.photos/350/250/?image=431" alt=""></span></div>
            <div class="image" data-name="headphone"><span><img src="https://picsum.photos/350/250/?image=232" alt=""></span></div>
            <div class="image" data-name="camera"><span><img src="https://picsum.photos/350/250?image=474" alt=""></span></div>
            <div class="image" data-name="shoe"><span><img src="https://picsum.photos/350/250?image=494" alt=""></span></div>
            <div class="image" data-name="headphone"><span><img src="https://picsum.photos/350/250?image=444" alt=""></span></div>
            <div class="image" data-name="watch"><span><img src="https://picsum.photos/350/250/?image=232" alt=""></span></div>
            <div class="image" data-name="shoe"><span><img src="https://picsum.photos/350/250?image=474" alt=""></span></div>
            <div class="image" data-name="camera"><span><img src="https://picsum.photos/350/250?image=444" alt=""></span></div>
        </div>
    </div>
    <!-- fullscreen img preview box -->
    <div class="preview-box">
        <div class="details">
            <span class="title">Categoria: <p></p></span>
            <span class="icon fas fa-times">FECHAR</span>
        </div>
        <div class="image-box"><img src="" alt=""></div>
    </div>
    <div class="shadow"></div>

</div>



<!-- =============================================================== -->
<!-- <div class="gallery-image">
    <div class="testimonial">
        <h1 class="h1-gallery">Galeria</h1>
        <div class="img-caixa">
            <img src="https://picsum.photos/350/250?image=444" alt="" />
            <div class="transparent-caixa">
                <div class="caption">
                    <p>Library</p>
                    <p class="opacity-low">Architect Design</p>
                </div>
            </div>
        </div>
        <div class="img-caixa">
            <img src="https://picsum.photos/350/250/?image=232" alt="" />
            <div class="transparent-caixa">
                <div class="caption">
                    <p>Night Sky</p>
                    <p class="opacity-low">Cinematic</p>
                </div>
            </div>
        </div>
        <div class="img-caixa">
            <img src="https://picsum.photos/350/250/?image=431" alt="" />
            <div class="transparent-caixa">
                <div class="caption">
                    <p>Tea Talk</p>
                    <p class="opacity-low">Composite</p>
                </div>
            </div>
        </div>
        <div class="img-caixa">
            <img src="https://picsum.photos/350/250?image=474" alt="" />
            <div class="transparent-caixa">
                <div class="caption">
                    <p>Road</p>
                    <p class="opacity-low">Landscape</p>
                </div>
            </div>
        </div>
        <div class="img-caixa">
            <img src="https://picsum.photos/350/250?image=344" alt="" />
            <div class="transparent-caixa">
                <div class="caption">
                    <p>Sea</p>
                    <p class="opacity-low">Cityscape</p>
                </div>
            </div>
        </div>
        <div class="img-caixa">
            <img src="https://picsum.photos/350/250?image=494" alt="" />
            <div class="transparent-caixa">
                <div class="caption">
                    <p>Vintage</p>
                    <p class="opacity-low">Cinematic</p>
                </div>
            </div>
        </div>
    </div>
</div> -->
@push('scripts')
<script src="{{asset('js/gallery.js')}}"></script>
@endpush
@endsection
