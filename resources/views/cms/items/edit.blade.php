@extends('cms.layouts.app')

@section('page_scripts')
<script src="{{ asset('stisla') }}/library/summernote/summernote-bs4.js"></script>
@endsection

@section('page_styles')
<link rel="stylesheet" href="{{ asset('stisla') }}/library/summernote/summernote-bs4.css">
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Item #{{ $item->id }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">New item</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Item Update Form</h2>
            <p class="section-lead">You can create a new Item with this form.</p>
            @include('cms.layouts.error_message')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('cms.items.update', ['id' => $item->id]) }}" method="POST">
                                @method('PUT')
                                @csrf

                                @include('cms.items.fields')

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" class="btn btn-primary">update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection