@extends('web.layout.master')

@section('content')
    <section class="error_page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="error_page_content">
                        <div class="error_page_content_iner text-center">
                            <h2>Ups!</h2>
                            <h3>Algo no ha ido según lo esperado</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="error_shape_1 wow fadeInLeft" data-wow-delay=".3s">
            <img src="/img/7.png" alt="#" class="img-fluid">
        </div>
        <div class="error_shape_2 wow fadeInUp" data-wow-delay=".3s">
            <img src="/img/6.png" alt="#" class="img-fluid">
        </div>
    </section>
@endsection
