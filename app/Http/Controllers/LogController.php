<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function index() {
        /**
         * @route -> /logs/
         * @desc -> returns all logs
         */

         $logs = Activity::with('user')->orderBy('created_at', 'desc')->paginate(10);

        return view('logs.index', ["logs" => $logs]);
    }

    public function show(Activity $activity) {
        /**
         * @route -> /logs/{id}
         * @desc -> returns log by ID
         */

         $activity->load('user', 'actions.user', 'remarks.user');

         return view('logs.show', ["log" => $activity]);
    }

    public function create() {
        /**
         * @route -> /logs/create
         * @desc -> create a new log page
         */

        //  $log = Log::findOrFail($id);

         return view('logs.create');
    }

    public function store(Request $request) {
        /**
         * @route -> /logs/store
         * @desc -> store a new log
         */

         $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string',
         ]);

         $validated['created_by'] = Auth::user()->id;

         Activity::create($validated);

         return redirect()->route('logs.index')->with('success', 'Activity created successfully');
    }

    public function destroy(Activity $log) {
        /**
         * @route -> /logs/{id}
         * @desc -> delete a log
         */

        $log->delete();

        return redirect()->route('logs.index')->with('success', 'Activity deleted successfully');
    }

    public function update(Request $request, Activity $activity) {
        /**
         * @route -> /logs/{id}
         * @desc -> update a log and record the action
         */

        // Validate request
        $validated = $request->validate([
            'status' => 'required|string',
        ]);

        // Update the activity
        $activity->update($validated);

        // Create an action record
        Action::create([
            'activity_id' => $activity->id,
            'user_id' => Auth::id(),
            'action' => "Activity status Updated",
        ]);

        return redirect()->route('logs.show', $activity->id)
                        ->with('success', 'Activity updated successfully and action logged.');
    }

    // In ActivityController.php
    public function addRemark(Request $request, Activity $activity)
    {
        $request->validate([
            'remark' => 'required|string|max:500'
        ]);

        $activity->remarks()->create([
            'remark' => $request->input('remark'),
            'created_by' => Auth::id(),
            'activity_id' => $activity->id
        ]);

        return redirect()->route('logs.show', $activity->id)
                        ->with('success', 'Remark added successfully!');
    }
}
