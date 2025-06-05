<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function index(Request $request) {
        /**
         * @route -> /logs/
         * @desc -> returns all logs
         */
        $query = Activity::query()->with('user');

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

         $logs = $query->orderBy('created_at', 'desc')->paginate(10);

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

    public function dailyLogs(Request $request) {
        // Fetch actions grouped by date
        $actions = Action::with(['activity', 'user'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function ($action) {
                return $action->created_at->format('Y-m-d');
            });

        return view('logs.daily', [
            'actionsGroupedByDate' => $actions
        ]);
    }

    public function report(Request $request) {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = \App\Models\Action::with(['activity', 'user'])
            ->orderBy('created_at', 'desc');

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $actions = $query->get();

        return view('logs.report', [
            'actions' => $actions,
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
    }

}
