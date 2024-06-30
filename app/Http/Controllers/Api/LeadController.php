<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewLeadMarkdown;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
  public function store(Request $request)
  {
    // Valida i campi
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|email',
      'message' => 'required|max:2000'
    ]);

    // Se i campi non sono validi, restituisce un messaggio di errore
    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'error' => $validator->errors()
      ], 401);
    }

    // Crea la Lead
    $lead = Lead::create($request->all());

    // Invia la mail
    Mail::to('admin@example.com')->send(new NewLeadMarkdown($lead));

    // Restuisce un messaggio di successo
    return response()->json([
      'success' => true
    ], 200);
  }
}
