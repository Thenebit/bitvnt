@extends('layouts.events')

@section('content')

<div class="form-container">
    <form class="form" action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p class="title">Create Event</p>

        <label>
            <input class="input" type="text" id="event_name" name="event_name" placeholder="" required>
            <span>Event Name</span>
        </label>

        <label>
            <input class="input" type="date" id="event_start_date" name="event_start_date" placeholder="" required>
            <span>Start Date</span>
        </label>

        <label>
            <input class="input" type="date" id="event_end_date" name="event_end_date" placeholder="" required>
            <span>End Date</span>
        </label>

        <label>
            <input class="input" type="file" id="image_url" name="image_url" accept="image/*" required>
            <span>Event Image</span>
        </label>

        <label>
            <textarea class="input" id="event_description" name="event_description" rows="4" required></textarea>
            <span>Event Description</span>
        </label>

        <button type="submit" class="submit">Create Event</button>
    </form>
</div>

<style>
.form-container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px; /* Add padding around the form */
    margin: 0 auto; /* Center the container */
    max-width: 100%; /* Full width */
}

.form {
    display: flex;
    flex-direction: column;
    gap: 10px;
    max-width: 400px; /* Adjusted width */
    width: 100%; /* Full width for responsiveness */
    padding: 20px;
    border-radius: 20px;
    background-color: #1a1a1a;
    color: #fff;
    border: 1px solid #333;
}

.title {
    font-size: 28px;
    font-weight: 600;
    letter-spacing: -1px;
    color: #00bfff;
}

.form label {
    position: relative;
}

.form label .input {
    background-color: #333;
    color: #fff;
    width: 100%;
    padding: 20px 5px 5px 10px;
    outline: 0;
    border: 1px solid rgba(105, 105, 105, 0.397);
    border-radius: 10px;
}

.form label .input + span {
    color: rgba(255, 255, 255, 0.5);
    position: absolute;
    left: 10px;
    top: 0px;
    font-size: 0.9em;
    cursor: text;
    transition: 0.3s ease;
}

.form label .input:placeholder-shown + span {
    top: 12.5px;
    font-size: 0.9em;
}

.form label .input:focus + span,
.form label .input:valid + span {
    color: #00bfff;
    top: 0px;
    font-size: 0.7em;
    font-weight: 600;
}

.submit {
    border: none;
    outline: none;
    padding: 10px;
    border-radius: 10px;
    color: #fff;
    font-size: 16px;
    background-color: #00bfff;
}

.submit:hover {
    background-color: #00bfff96;
}
</style>

@endsection
