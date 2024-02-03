@extends("layouts.main")

@push("css")
@endpush

@push("js")
<script src="/js/products.js"></script>
<script src="/js/form-handler.js"></script>
@endpush

@section("content")
<h2>{{ $product->name }}</h2>
@endsection("content")
