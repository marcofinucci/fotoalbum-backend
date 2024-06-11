<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Models\Category;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PhotoController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('photos.index', ['photos' => Photo::orderByDesc('id')->paginate(10)]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $categories = Category::all();
    return view('photos.create', compact('categories'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StorePhotoRequest $request)
  {
    //dd($request->all());

    // Valida i campi
    $val_data = $request->validated();

    // Crea lo slug
    $val_data['slug'] = Str::slug($val_data['title'], '-');

    // Crea l'immagine
    if ($request->has('image')) {
      $image_path = Storage::put('uploads', $val_data['image']);
      $val_data['image'] = $image_path;
    }

    // Setta il valore featured
    if ($request->has('featured')) {
      $val_data['featured'] = true;
    } else {
      $val_data['featured'] = false;
    }

    // Crea i campi usando il fillable del modello
    $photo = Photo::create($val_data);

    // Reinderizza la rotta alla view show
    return to_route('photos.index')->with('status', 'Foto aggiunta con successo');
  }

  /**
   * Display the specified resource.
   */
  public function show(Photo $photo)
  {
    return view('photos.show', compact('photo'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Photo $photo)
  {
    $categories = Category::all();
    return view('photos.edit', compact('photo', 'categories'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdatePhotoRequest $request, Photo $photo)
  {
    // Valida i campi
    $val_data = $request->validated();

    // Aggiorna lo slug
    $val_data['slug'] = Str::slug($val_data['title'], '-');

    // Aggiorna l'immagine
    if ($request->has('image')) {
      if ($photo->image) {
        Storage::delete($photo->image);
      }
      $image_path = Storage::put('uploads', $val_data['image']);
      $val_data['image'] = $image_path;
    }

    // Aggiorna il valore featured
    if ($request->has('featured')) {
      $val_data['featured'] = true;
    } else {
      $val_data['featured'] = false;
    }

    // Aggiorna i campi
    $photo->update($val_data);

    // Reinderizza la rotta alla view edit
    return to_route('photos.index')->with('status', 'Foto modificata con successo');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Photo $photo)
  {
    // Elimina l'immagine
    if ($photo->image) {
      Storage::delete($photo->image);
    }

    // Elimina il post
    $photo->delete();

    // Reinderizza la rotta alla view index
    return to_route('photos.index')->with('status', 'Foto eliminata con successo');
  }
}
