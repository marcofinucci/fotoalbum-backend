<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
  public function index(Request $request)
  {
    // Se la richiesta è di tipo search
    if ($request->has('search')) {
      $title = $request->get('title');
      $category = $request->get('category');
      $featured = $request->get('featured');

      // Se si sta filtrando per titolo, categoria e per featured
      if ($category != 'all' && $featured == 'true') {
        $photos = Photo::with(['category'])->where('title', 'LIKE', "%$title%")->where('category_id', $category)->where('featured', 1)->orderByDesc('id')->paginate(10);
        // Altrimenti se si sta filtrando per titolo e categoria
      } else if ($category != 'all') {
        $photos = Photo::with(['category'])->where('title', 'LIKE', "%$title%")->where('category_id', $category)->orderByDesc('id')->paginate(10);
        // Altrimenti se si sta filtrando per titolo e featured
      } else if ($featured == 'true') {
        $photos = Photo::with(['category'])->where('title', 'LIKE', "%$title%")->where('featured', 1)->orderByDesc('id')->paginate(10);
        // Altrimenti se si sta filtrando per titolo
      } else {
        $photos = Photo::with(['category'])->where('title', 'LIKE', "%$title%")->orderByDesc('id')->paginate(10);
      }

      return response()->json([
        'success' => true,
        'results' => $photos
      ]);
    }

    // Altrimenti ritorna tutte le immagini
    return response()->json([
      'success' => true,
      'results' => Photo::with(['category'])->orderByDesc('id')->paginate(10),
    ]);
  }

  public function show($id)
  {
    $photo = Photo::with(['category'])->find($id);

    if ($photo) {
      return response()->json([
        'success' => true,
        'results' => $photo
      ]);
    } else {
      return response()->json([
        'success' => false,
        'results' => 'Photo not found'
      ]);
    }
  }
}
