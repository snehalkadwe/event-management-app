<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EventManagementController extends Controller
{
    public function index()
    {
        return Inertia::render('EventManagement');
    }

    public function store(Request $request)
    {
        $params = $request->all();
        dd($params);
        $data = [
            'name' => $params['name'],
            'from_datetime' => $params['startDate'],
            'to_datetime' => $params['endDate'],
            'location' => $params['location'],
        ];
        Event::create($data);
        return redirect()->back();
    }
}
