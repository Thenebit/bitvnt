@extends('layouts.events')

@section('content')
<div class="container">
        <h1 class="dashboard-title">Dashboard</h1>
        <div class="dashboard">
            <div class="card">
                <h5>Total Events</h5>
                <i class="fas fa-calendar-alt fa-3x my-3"></i>
                <p class="h2">{{ $totalEvents }}</p>
            </div>
            <div class="card">
                <h5>Active Events</h5>
                <i class="fas fa-check-circle fa-3x my-3"></i>
                <p class="h2">{{ $activeEvents }}</p>
            </div>
            <div class="card">
                <h5>Pending Events</h5>
                <i class="fas fa-hourglass-half fa-3x my-3"></i>
                <p class="h2">{{ $pendingEvents }}</p>
            </div>
            <div class="card">
                <h5>Past Events</h5>
                <i class="fas fa-calendar-check fa-3x my-3"></i>
                <p class="h2">{{ $pastEvents }}</p>
            </div>
        </div>
</div>

<style>
	 .dashboard-title {
            text-align: center; /* Center title on all screens */
            margin-bottom: 20px;
        }
        .dashboard {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px;
        }
        .card {
            flex: 1 1 22%; /* Adjusts to fit four cards in a row on large screens */
            margin: 10px;
            padding: 20px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        @media (max-width: 992px) {
            .card {
                flex: 1 1 45%; /* Two cards per row on medium screens */
            }
        }
        @media (max-width: 768px) {
            .card {
                flex: 1 1 100%; /* Stacks cards on small screens */
            }
        }
 </style>

@endsection