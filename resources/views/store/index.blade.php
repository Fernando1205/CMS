@extends('master')

@section('title','Tienda')

@section('content')
    <div class="container">
        <div class="home_action_bar">
            <div class="panel shadow mt-5 p-2">
                <div class="row">
                    <div class="col-md-3">
                        <div>
                            <a class="btn btn-secondary d-block">
                                <i class="fa-solid fa-bars-staggered"></i> Categorias
                            </a>

                            <ul class="list-group">
                                @foreach ($categories as $cat)
                                    <li class="list-group-item" >
                                        <a>{!! html_entity_decode($cat->icono) !!} {{ $cat->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <section class="my-3">
                            <h2>Ultimos productos agregados</h2>
                            <div id="products_list" class="producsts_list d-flex flex-wrap justify-content-center"></div>
                            <div class="load mt-5">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination" id="pagination">
                                    </ul>
                                </nav>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('js/store.js') }}"></script>
@endpush
