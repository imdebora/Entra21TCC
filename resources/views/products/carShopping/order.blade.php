@extends('layouts.layout')
@push('scripts')
    <script src="{{asset('js/profile.js')}}"></script>
@endpush
<section>
<div style="border:solid 1px;" class="container p-5 my-5 bg-white w-75">
    <div class="row">
        <div class="d-flex justify-content-center align-items-center">
            <div class="col-md-10 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <h4 class="text-right">Compra Concluida</h4>
                    </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <a href="{{route('data')}}">
                                    <button style="margin-left: auto; margin-right: auto" class="w-75 form-control bg-success">Conferir Compras</button>
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

