<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multimedia;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use App\Models\Category;
class MultimediaController extends Controller
{
      // Index page showing a list of multimedia items
      public function index()
      {
          $multimediaItems = Multimedia::with('user')->get();
       
  
          return view('multimedia.index', compact('multimediaItems'));
      }


      public function search(Request $request)
      {
          $query = $request->input('query');
          $categoryId = $request->input('category');
          
          $results = Multimedia::query();
      
          if ($query) {
              $results->where(function ($queryBuilder) use ($query) {
                  $queryBuilder->where('title', 'like', "%$query%")
                               ->orWhere('description', 'like', "%$query%");
              });
          }
      
          if ($categoryId) {
              $results->whereHas('category', function ($queryBuilder) use ($categoryId) {
                  $queryBuilder->where('id', $categoryId);
              });
          }
      
          $results = $results->get();
          $categoryName = $categoryId ? Category::find($categoryId)->name : null;
          return view('multimedia.search', compact('results', 'query', 'categoryName'));
      }
      public function thumbnail($id)
{
    $multimediaItem = Multimedia::findOrFail($id);

    // Define the paths
    $videoPath = storage_path("app/public/videos/TteJsDvF6SOJvwLrWkdcyfGt7oFOpevy2M3eOp4v.mp4");
    $thumbnailPath = storage_path("app/public/thumbnails/{$multimediaItem->id}.png");

    // Use FFMpeg to generate a thumbnail

    $output = FFMpeg::open('app/public/videos/TteJsDvF6SOJvwLrWkdcyfGt7oFOpevy2M3eOp4v.mp4')
        ->getFrameFromSeconds(1)
        ->export()
        ->toDisk('public')
        ->save('app/public/thumbnails/image.jpg');
    

    // Return the response with the correct public path
    return response()->file('app/public/thumbnails/image.jpg');
}



      public function stream($filename)
      {
        $file = storage_path('app\public\videos' . DIRECTORY_SEPARATOR . $filename);
      
          $size = filesize($file);
          $length = $size;
          $start = 0;
          $end = $size - 1;
      
          header('Accept-Ranges: bytes');
      
          if (isset($_SERVER['HTTP_RANGE'])) {
              list(, $range) = explode('=', $_SERVER['HTTP_RANGE'], 2);
      
              if (strpos($range, ',') !== false) {
                  header('HTTP/1.1 416 Requested Range Not Satisfiable');
                  header(sprintf('Content-Range: bytes %d-%d/%d', $start, $end, $size));
                  exit;
              }
      
              if ($range == '-') {
                  $c_start = $size - substr($range, 1);
              } else {
                  $range = explode('-', $range);
                  $c_start = $range[0];
                  $c_end = (isset($range[1]) && is_numeric($range[1])) ? $range[1] : $size;
              }
      
              $c_end = ($c_end > $end) ? $end : $c_end;
      
              if ($c_start > $c_end || $c_start > $size - 1 || $c_end >= $size) {
                  header('HTTP/1.1 416 Requested Range Not Satisfiable');
                  header(sprintf('Content-Range: bytes %d-%d/%d', $start, $end, $size));
                  exit;
              }
      
              header('HTTP/1.1 206 Partial Content');
      
              $start = $c_start;
              $end = $c_end;
              $length = $end - $start + 1;
      
              header("Content-Range: bytes $start-$end/$size");
              header(sprintf('Content-Length: %d', $length));
      
              $fh = fopen($file, 'rb');
              fseek($fh, $start);
      
              while (true) {
                  if (ftell($fh) >= $end) {
                      break;
                  }
      
                  set_time_limit(0);
      
                  echo fread($fh, 1024 * 8);
      
                  flush();
              }
      
              fclose($fh);
              exit;
          } else {
              // Regular request
              header(sprintf('Content-Length: %d', $length));
              readfile($file);
          }
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
          $file = $request->file('filepath');
          $fileName = time().'_'.$file->getClientOriginalName();
          $file->storeAs('videos', $fileName, 'public');
          $multimedia = new Multimedia([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'filepath' => $fileName,
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
              'filepath' => 'sometimes|mimes:mp4,mkv,avi,flv|max:1000240',
          ]);
      
          $multimediaItem = Multimedia::findOrFail($id);
      
          // Eliminar el archivo actual si se selecciona la casilla de verificación
          if ($request->has('remove_filepath') && $request->input('remove_filepath') == 1) {
              // Puedes almacenar el archivo actual en una variable si necesitas hacer algo con él
              $currentFilepath = $multimediaItem->filepath;
      
              // Eliminar el archivo actual
              Storage::delete($multimediaItem->filepath);
      
              // Actualizar el modelo para reflejar la eliminación del archivo
              $multimediaItem->filepath = null;
          }
      
          // Actualizar el modelo con los nuevos valores
          $multimediaItem->update($request->all());
          dd('Se ejecutó el método update');
          return redirect()->route('dashboard')
              ->with('success', 'Multimedia item updated successfully.');
      }
  
      // Delete the specified multimedia item from the database
      public function destroy($id)
      {
          $multimediaItem = Multimedia::findOrFail($id);
          $multimediaItem->delete();
  
          return redirect()->route('multimedia.uservideo')
              ->with('success', 'Multimedia item deleted successfully.');
      }
      public function uservideo(){
        $multimediaItems = Multimedia::with('user') 
        ->where('user_id', auth()->id())
        ->get();

    return view('multimedia.uservideo', compact('multimediaItems'));
}
  }