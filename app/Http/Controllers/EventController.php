<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{

	public function index()
	{
		$events = Event::all();

		return view('bitpages.index', compact('events'));
	}

	public function dashboard()
	{
		// get all events
		$events = Event::all();

		// get total events
		$totalEvents = $events->count();

		// get active events only
		$activeEvents = $events->filter(function ($event)
		{
			return Carbon::parse($event->event_start_date)->isToday
			() ||
				(Carbon::parse($event->event_start_date)->isPast
				() &&
				Carbon::parse($event->event_end_date)->isFuture
				());
		})->count();

		// get pending events only
		$pendingEvents = $events->filter(function ($event)
		{
			return Carbon::parse($event->event_start_date)->isFuture
			();
		})->count();

		// get past events only
		$pastEvents = $events->filter(function ($event) {
			return Carbon::parse($event->event_end_date)->isPast();
		})->count();

	
		return view('bitpages.home', compact(
			'events',
			'totalEvents',
			'activeEvents',
			'pendingEvents',
			'pastEvents'
		));
	
	}

	public function create()
	{
		return view('bitpages.create');
	}

	public function store(Request $request)
	{
		// validate all inputs
		$validator = Validator::make($request->all(), [
			'event_name' => 'required|string|max:255',
			'event_start_date' => 'required|date|after_or_equal:today',
			'event_end_date' => 'required|date|after:event_start_date',
			'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
			'event_description' => 'required|string',
		]);

		// check for any failure
		if ($validator->fails())
		{
			return redirect()->back()->withErrors($validator)
			->withInput();
		}

		// create event
		$event = Event::create([
			'event_name' => $request->event_name,
			'event_start_date' => $request->event_start_date,
			'event_end_date' => $request->event_end_date,
			'image_url' => $request->image_url ? 'storage/' . $request->file('image_url')->store('images', 'public') : null,
			'event_description' => $request->event_description,
		]);

		return redirect()->route('event.index')->with('success',
		'Event created successfully!');
	}

	public function show($id)
	{
		$event = Event::find($id);
		if (!$event)
		{
			return redirect()->route('event.index')->with('error',
		    'Event not found!');
		}

		return view('bitpages.show', compact('event'));
	}

	public function edit($id)
	{
		$event = Event::findOrFail($id);
		if (!$event)
		{
			return redirect()->route('event.index')->with('error', 'Event not found!');
		}

		return view('bitpages.edit', compact('event'));
	}

	public function update(Request $request, $id)
	{
		// validate all inputs
		$validator = Validator::make($request->all(), [
			'event_name' => 'required|string|max:255',
			'event_start_date' => 'required|date|after_or_equal:today',
			'event_end_date' => 'required|date|after:event_start_date',
			'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
			'event_description' => 'required|string',
		]);

		// check for any failure
		if ($validator->fails())
		{
			return redirect()->back()->withErrors($validator)
			->withInput();
		}

		$event = Event::findOrFail($id);

		// create event
		$event->update([
			'event_name' => $request->event_name,
			'event_start_date' => $request->event_start_date,
			'event_end_date' => $request->event_end_date,
			'image_url' => $request->image_url ? 'storage/' . $request->file('image_url')->store('images', 'public') : null,
			'event_description' => $request->event_description,
		]);

		return redirect()->route('event.index')->with('success',
		'Event updated successfully!');
	}

	public function destroy($id)
	{
		$event = Event::findOrFail($id);
		$event->delete();

		return redirect()->route('event.index')->with(['success' => 'Event deleted successfully!']);
	}

}
