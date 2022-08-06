<html>

<head>
    <title>Contact Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/plugins/TableCheckAll.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#messages").TableCheckAll();

            $("#multiple-delete").on("click", function() {
                let button = $(this);
                let selected = []

                $("#messages .check:checked").each(function() {
                    selected.push($(this).val());
                });

                Swal.fire({
                    icon: "warning",
                    title: "Are you sure you want to delete this(those) selected message(s)?",
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: "Yes"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "post",
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                            },
                            url: button.data("route"),
                            data: {
                                'selected': selected
                            },
                            success: function(response, textStatus, xhr) {
                                Swal.fire({
                                    icon: "success",
                                    title: response,
                                    showDenyButton: false,
                                    showCancelButton: false,
                                    confirmButtonText: 'Yes'
                                }).then((result) => {
                                    window.location = '/admin/view-messages'
                                });
                            }
                        })
                    }
                })
            });

            $(".delete-message").on("submit", function(e) {
                e.preventDefault();
            });

        });
    </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto my-5">
                <h3 class="text-center mb-5">Contact forms messages</h3>

                <button class="btn btn-danger mb-3" id="multiple-delete"
                    data-route="{{ route('multiple-delete') }}">Delete All
                    Selected</button>
                <table class="table" id="messages">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"><input type="checkbox" class="check-all"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                            <tr>
                                <td><input type="checkbox" class="check" value={{ $message->id }} /></td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>
                                    <a href="{{ url('/admin/messages/' . $message->id) }}"
                                        class="btn btn-primary btn-sm">Details</a>

                                    <form method="post" class="delete-message"
                                        data-route="{{ url('/admin/messages/' . $message->id . '/delete') }}"
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
