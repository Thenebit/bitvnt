@extends('layouts.events')

@section('content')

<div class="container mt-4">
    <h2 class="text-center">{{ __('Events List') }}</h2>

	@if(session('success'))
		<div class="alert alert-success" role="alert">
			{{ session('success') }}
		</div>
	@endif

    <div class="table-responsive">
        <table class="table table-striped mx-auto" style="transform: translateY(20px);">
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
		@foreach($events as $event)
                <tr>
                    	<td>{{ $event->event_name }}</td>
                    	<td>{{ $event->event_start_date }}</td>
                    	<td>{{ $event->event_end_date }}</td>
                    	<td>{{ $event->event_description }}</td>

		    	@if ($event->event_start_date > now())
				<td><span class="badge badge-warning">Pending</span></td>
		    	@elseif ($event->event_end_date < now())
				<td><span class="badge badge-danger">Past</span></td>
		    	@else
				<td><span class="badge badge-success">Active</span></td>
		    	@endif
                    	<td>
    				<div class="d-flex flex-column flex-sm-row">

    				    <a href="{{ route('event.edit', $event->id) }}" class="btn btn-warning btn-sm me-1 mb-1 mb-sm-0 action-btn"><i class="fas fa-edit"></i></a>

    				    <form action="{{ route('event.destroy', $event->id) }}" method="POST" style="display: inline;">
    				        @csrf
    				        @method('DELETE')
    				        <button type="submit" class="btn btn-danger btn-sm me-1 mb-1 mb-sm-0 action-btn" onclick="return confirm('Are you sure you want to delete this event?');">
    				            <i class="fas fa-trash"></i>
    				        </button>
    				    </form>

    				    <a href="{{ route('event.show', $event->id) }}" class="btn btn-info btn-sm action-btn"><i class="fas fa-eye"></i></a>
    				</div>
			</td>
                </tr>
		@endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
	@media (min-width: 576px) {
		.action-btn {
			margin-right: 10px; /* Space between buttons */
		}
	}

</style>

@endsection
