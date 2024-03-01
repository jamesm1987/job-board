@extends('layouts.app')

@section('content')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    
        @if ($job)
            <p><strong>{{ $job->title }}</strong></p>
        @else
            <p class="text-center">No job found.</p>
        @endif

    </main>
@endsection