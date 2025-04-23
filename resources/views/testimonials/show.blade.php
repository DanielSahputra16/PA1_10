@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $testimonial->subject }}</h1>
    <p>{{ $testimonial->message }}</p>
    <p>Name: {{ $testimonial->name }}</p>
    <p>Email: {{ $testimonial->email }}</p>
    <a href="{{ route('testimonials.index') }}">Back to testimonials</a>
</div>
@endsection
