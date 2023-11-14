<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multimedia;


class MultimediaController extends Controller
{
      // Index page showing a list of multimedia items
      public function index()
      {
          $multimediaItems = Multimedia::all();
       
          return view('multimedia.index', compact('multimediaItems'));
      }
      
      // Show a specific multimedia item
      public function show($id)
      {
          $multimediaItem = Multimedia::findOrFail($id);
          return view('multimedia.show', compact('multimediaItem'));
      }
  
      // Display the form to create a new multimedia item
      public function create()
      {
          // You may want to pass additional data to the view if needed
          return view('multimedia.create');
      }
  
      // Store a newly created multimedia item in the database
      public function store(Request $request)
      {
          $request->validate([
              
              'title' => 'required',
              'description' => 'required',
              'category' => 'required',
              'filepath' => 'required|mimes:mp4,mkv,avi,flv|max:1000240',
          ]);
          $user = auth()->user();
          $multimedia = new Multimedia([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'filepath' => $request->file('filepath')->store('videos', 'public'), 
            'user_id' => $user->id,
        ]);
        $user->multimedia()->save($multimedia);
        return redirect()->route('dashboard')->with('success', 'Multimedia item created successfully.');
}
  
      // Display the form to edit a multimedia item
      public function edit($id)
      {
          $multimediaItem = Multimedia::findOrFail($id);
          return view('multimedia.edit', compact('multimediaItem'));
      }
  
      // Update the specified multimedia item in the database
      public function update(Request $request, $id)
      {
          $request->validate([
              'user_id' => 'required',
              'title' => 'required',
              'description' => 'required',
              'category' => 'required',
              'filepath' => 'required',
          ]);
  
          $multimediaItem = Multimedia::findOrFail($id);
          $multimediaItem->update($request->all());
  
          return redirect()->route('multimedia.index')
              ->with('success', 'Multimedia item updated successfully.');
      }
  
      // Delete the specified multimedia item from the database
      public function destroy($id)
      {
          $multimediaItem = Multimedia::findOrFail($id);
          $multimediaItem->delete();
  
          return redirect()->route('multimedia.index')
              ->with('success', 'Multimedia item deleted successfully.');
      }
  }