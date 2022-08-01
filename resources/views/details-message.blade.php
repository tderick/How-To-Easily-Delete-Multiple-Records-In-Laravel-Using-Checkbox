<html>

<head>
    <title>Contact Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto my-5">
                <h3 class="text-center mb-5">Message details</h3>

                <h3>Name: {{ $message->name }}</h3>
                <h3>Email: {{ $message->email }}</h3>
                <h3>Message: {{ $message->message }}</h3>

            </div>
        </div>
    </div>
</body>
