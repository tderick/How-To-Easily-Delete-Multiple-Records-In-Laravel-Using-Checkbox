<html>

<head>
    <title>Contact Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto my-5">
                <h3 class="text-center mb-5">Contact forms messages</h3>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                            <tr>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>
                                    <a href="{{ url('/admin/messages/' . $message->id) }}"
                                        class="btn btn-primary btn-sm">Details</a>

                                    <form method="post"
                                        action="{{ url('/admin/messages/' . $message->id . '/delete') }}"
                                        style="display:inline">

                                        {{ method_field('DELETE') }}

                                        @csrf

                                        <button type='submit' class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <form method="post" action="{{ url('/logout') }}" style="display:inline">
                    @csrf
                    <button type='submit' class="btn btn-secondary ">Logout</button>
                </form>
            </div>
        </div>
    </div>
</body>
