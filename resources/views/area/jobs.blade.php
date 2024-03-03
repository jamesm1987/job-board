@extends('layouts.app')

@section('content')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @forelse($jobs as $job)
            
            <p><strong>{{ $job->title }}</strong></p>
            <a href="{{ route('job', $job) }}">View Job</a>

            {{ $jobs->links() }}
            
        @empty
            <p class="text-center">No jobs.</p>
        @endforelse

    </main>
@endsection