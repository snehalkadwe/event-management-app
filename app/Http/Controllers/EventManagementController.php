<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EventManagementController extends Controller
{
    /**
     * Show the all the event details
     */
    public function index()
    {
        return Inertia::render('EventManagement/Index', [
            'events' => Event::get()
        ]);
    }

    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        return Inertia::render('EventManagement/Create');
    }

    /**
     * Used to store event
     */
    public function store(EventRequest $request)
    {
        $params = $request->all();
        $data = [
            'name' => $params['name'],
            'from_datetime' => $params['startDate'],
            'to_datetime' => $params['endDate'],
            'location' => $params['location'],
        ];
        Event::create($data);
        return redirect()->route('event.index');
    }

    /**
     * Show the event details
     */
    public function show(Event $event)
    {
        return Inertia::render(
            'EventManagement/View',
            [
                'event' => $event
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return Inertia::render(
            'EventManagement/Edit',
            [
                'event' => $event
            ]
        );
    }

    /**
     * Update the event
     */
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
        return redirect()->route('event.index');
    }

    /**
     * Delete event
     */
    public function delete(Event $event)
    {
        $event->delete();
        return redirect()->back();
    }
}
