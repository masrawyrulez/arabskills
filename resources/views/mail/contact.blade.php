<!DOCTYPE html>
<html>
<head>
    <title>Arabskills</title>
</head>
<body>
    <h1>Arabskills Site</h1>
    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Phone:</strong> {{ $phone ?? 'N/A' }}</p>
    <p><strong>Company:</strong> {{ $company ?? 'N/A' }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ htmlspecialchars($userMessage) }}</p>
</body>
</html>