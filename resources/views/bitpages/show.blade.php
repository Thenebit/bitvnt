@extends('layouts.events')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="row no-gutters">
            <div class="col-md-6">
                <div class="image-container">
                    <img src="{{ asset($event->image_url) }}" class="card-img" alt="{{ $event->event_name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->event_name }}</h5>
                    <p class="card-text">
                        <strong>Start Date:</strong> {{ \Carbon\Carbon::parse($event->event_start_date)->format('d M Y') }}<br>
                        <strong>End Date:</strong> {{ \Carbon\Carbon::parse($event->event_end_date)->format('d M Y') }}
                    </p>
                    <p class="card-text">{{ $event->event_description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
	.image-container {
	    height: 300px; /* Set a fixed height for the image container */
	    overflow: hidden; /* Hide any overflow */
	}

	.card-img {
	    width: 100%; /* Make the image take the full width */
	    height: auto; /* Maintain aspect ratio */
	    object-fit: cover; /* Cover the container while maintaining aspect ratio */
	}

</style>
@endsection
