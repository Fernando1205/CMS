@extends('admin.master')

@section('title','Slider')

@section('breadcrum')
<li class="breadcrum-item">
    <a href="{{ route('products.index') }}">
        <i class="fa-solid fa-images"></i>
        &nbsp; / &nbsp;
        Slider
    </a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <div class="title">
                <h2> <i class="fa-solid fa-images"></i> Slider</h2>
            </div>
        </div>
</div>
@endsection

