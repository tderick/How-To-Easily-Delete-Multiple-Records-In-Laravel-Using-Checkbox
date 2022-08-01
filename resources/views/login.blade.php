<html>

<head>
    <title>Contact Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto my-5">
                <form class="form-signin" method="post" action="/authenticate">
                    @csrf

                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <h1 class="text-center mb-5">Please sign in</h1>
                    <div class="form-group">
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" name="email" id="inputEmail" class="form-control"
                            placeholder="Email address" required="" autofocus="">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" name="password" id="inputPassword" class="form-control"
                            placeholder="Password" required="">
                    </div>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</body>
