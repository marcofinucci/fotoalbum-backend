<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Mail\NewLeadMarkdown;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('leads.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreLeadRequest $request)
  {
    // Valida i campi
    $val_data = $request->validated();

    // Crea la Lead
    $lead = Lead::create($val_data);

    // Invia la mail
    Mail::to('admin@example.com')->send(new NewLeadMarkdown($lead));

    // Reinderizza la view
    return back()->with('status', 'Messaggio inviato correttamente');
  }

  /**
   * Display the specified resource.
   */
  public function show(Lead $lead)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Lead $lead)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateLeadRequest $request, Lead $lead)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Lead $lead)
  {
    //
  }
}
