New Form Submission Received

A new form submission has been received for {{ $formResponse->service_requested }}.

Submission Details:
-------------------
Name: {{ $formResponse->name }}
Email: {{ $formResponse->email }}
Service Requested: {{ $formResponse->service_requested }}
@if($formResponse->message)
Message: {{ $formResponse->message }}
@endif
Submitted At: {{ $formResponse->created_at->format('F j, Y \a\t g:i A') }}

---
This notification was sent from {{ config('app.name') }}.
