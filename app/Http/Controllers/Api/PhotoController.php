<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
  public function index()
  {
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
      ], 404);
    }
  }
}
