<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap 5 Simple Datatable Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- bootstrap5 dataTables css cdn -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" />
</head>

<body>

    @include('custom-nav')

    <div class="container mt-4">

        <a href="{{ route('dashboard') }}" class="btn btn-primary mb-3"> Add Customer</a>
        <table id="datatable" class="table">
            <thead>
                <tr>
                    <th>Sr.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Add</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $key => $data)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $data->name }}
                        </td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->address }}</td>
                        <td>
                            <a href="{{ route('customer.edit', $data->id) }}" class="btn btn-primary mb-3">Edit</a>
                            <button class="btn btn-danger mb-3 delete-button"
                                data-id="{{ $data->id }}">Delete</button>

                            {{-- <input type="checkbox" class="switch-btn checkbox status-checkbox" id="{{ $datas->id }}"
                                                        {{ $datas->status == 1 ? 'checked' : '' }} data-size="small" data-color="#0099ff"
                                                        data-product-id="{{ $datas->id }}"> --}}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <!-- bootstrap5 dataTables js cdn -->
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.delete-button').on('click', function() {
                const deleteButton = $(this); // Store the reference to the clicked button
                const productId = deleteButton.data('id');
                $.ajax({
                    type: "get",
                    url: "{{ route('customer.delete') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": productId
                    },
                    dataType: 'json',
                    success: function(data) {
                        deleteButton.closest('tr').remove(); // Remove the closest row
                        console.log("deleted");
                    }
                });
            });
        });

        //     $(document).ready(function() {
        //     $('.status-checkbox').change(function() {
        //         var productId = $(this).data('product-id');
        //         var status = $(this).is(':checked') ? 1 : 0;

        //         $.ajax({
        //             url: "",
        //             method: "POST",
        //             data: {
        //                 product_id: productId,
        //                 status: status,
        //                 _token: "{{ csrf_token() }}"
        //             },
        //             success: function(response) {
        //                 if (response.success) {
        //                     toastr.success(response.success);
        //                 }
        //             },
        //         });
        //     });
        // });
    </script>


</body>

</html>
