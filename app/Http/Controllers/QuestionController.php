<?php

namespace App\Http\Controllers;

use Validator;
use Auth;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function showQuestions(Request $request)
    {
        // Fetch all questions from the database
        $questions = Question::all();
        return view('questions.show', compact('questions'));
    }

    public function store(Request $request)
    {
       

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'birth' => 'required|date',
            'subject' => 'required|string|max:255',
            'marketing_agree' => 'boolean',
            'welse_agree' => 'boolean',
            'location' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $questions = Question::create([
            'name' => $request->name,
            'birth' => $request->birth,
            'subject' => $request->subject,
            'marketing_agree' => $request->has('marketing_agree') ? true : false, // Set based on checkbox selection
            'welse_agree' => $request->has('welse_agree') ? true : false, // Set based on checkbox selection
            'location' => $request->location,
        ]);
       
        // Redirect back or wherever you want after saving
    
        return redirect()->route('login.page')->with('success', 'Record updated successfully');
    }

    public function update(Request $request, $id)
    {
        // Find the record by ID
        $questions = Question::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'birth' => 'required|date',
            'subject' => 'required|string',
            'marketing_agree' => 'required|boolean',
            'welse_agree' => 'required|boolean',
            'location' => 'nullable|string',
        ]);

        // Update the record
        $record->update($validatedData);

        // Redirect or return response as needed
        return redirect()->route('login.page')->with('success', 'Record updated successfully');
    }
}