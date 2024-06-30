<x-mail::message>
# Hai ricevuto un nuovo messaggio

Nome: {{ $lead->name }}

Email: {{ $lead->email }}

Messaggio: {{ $lead->message }}

---
Messsaggio inviato da {{ config('app.name') }}
</x-mail::message>
