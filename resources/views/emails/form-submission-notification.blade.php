<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .content {
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }
        .field {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #495057;
        }
        .value {
            color: #212529;
            margin-top: 5px;
        }
        .footer {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
            font-size: 0.9em;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>New Form Submission Received</h1>
        <p>A new form submission has been received for <strong>{{ $formResponse->service_requested }}</strong></p>
    </div>

    <div class="content">
        <div class="field">
            <div class="label">Name:</div>
            <div class="value">{{ $formResponse->name }}</div>
        </div>

        <div class="field">
            <div class="label">Email:</div>
            <div class="value">{{ $formResponse->email }}</div>
        </div>

        <div class="field">
            <div class="label">Service Requested:</div>
            <div class="value">{{ $formResponse->service_requested }}</div>
        </div>

        @if($formResponse->message)
            <div class="field">
                <div class="label">Message:</div>
                <div class="value">{{ $formResponse->message }}</div>
            </div>
        @endif

        <div class="field">
            <div class="label">Submitted At:</div>
            <div class="value">{{ $formResponse->created_at->format('F j, Y \a\t g:i A') }}</div>
        </div>
    </div>

    <div class="footer">
        <p>This notification was sent from {{ config('app.name') }}.</p>
    </div>
</body>
</html>
