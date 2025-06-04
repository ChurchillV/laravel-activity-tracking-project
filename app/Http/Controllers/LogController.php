<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index() {
        /**
         * @route -> /logs/
         * @desc -> returns all logs
         */

         $logs = Log::with('user')->orderBy('created_at', 'desc')->paginate(10);

        return view('logs.index', ["logs" => $logs]);
    }

    public function show(Log $log) {
        /**
         * @route -> /logs/{id}
         * @desc -> returns log by ID
         */

         return view('logs.show', ["log" => $log]);
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
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:300|min:10',
            'status' => 'required|string',
            'created_by' => 'required|integer'
         ]);

         $validated['created_by'] = 1;

         Log::create($validated);

         return redirect()->route('logs.index')->with('success', 'Log created successfully');
    }

    public function destroy(Log $log) {
        /**
         * @route -> /logs/{id}
         * @desc -> delete a log
         */

        $log->delete();

        return redirect()->route('logs.index')->with('success', 'Log deleted successfully');
    }
}
