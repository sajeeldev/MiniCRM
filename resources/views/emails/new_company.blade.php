<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our System!</title>
</head>
<body>
    <h2>Hello {{ $company->name }},</h2>
    <p>Thank you for registering your company with us!</p>
    <p>Here are your details:</p>
    <ul>
        <li><strong>Name:</strong> {{ $company->name }}</li>
        <li><strong>Email:</strong> {{ $company->email }}</li>
        <li><strong>Website:</strong> <a href="{{ $company->website }}">{{ $company->website }}</a></li>
    </ul>
    <p>We look forward to working with you!</p>
    <p>Best regards,<br>Company CRM Team</p>
</body>
</html>
