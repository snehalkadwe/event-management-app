<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EventManagementController extends Controller
{
    public function index()
    {
        return Inertia::render('EventManagement', [
            'events' => Event::get()
        ]);
    }

    public function store(Request $request)
    {
        $params = $request->all();
        $data = [
            'name' => $params['name'],
            'from_datetime' => $params['startDate'],
            'to_datetime' => $params['endDate'],
            'location' => $params['location'],
        ];
        Event::create($data);
        return redirect()->back();
    }

    public function show(Request $request, Event $event)
    {
        $event = Event::where('id', $event->id);

        return Inertia::render('EventManagement', [
            'event' => $event
        ]);
    }
    public function update(Request $request, Event $event)
    {
        $params = $request->all();
        $data = [
            'name' => $params['name'],
            'from_datetime' => $params['startDate'],
            'to_datetime' => $params['endDate'],
            'location' => $params['location'],
        ];
        $event->update($data);
        return redirect()->back();
    }
    public function destroy(Request $request, Event $event)
    {
        $event->delete();
        return redirect()->back();
    }
}
