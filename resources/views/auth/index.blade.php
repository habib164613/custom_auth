<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>


    <!-- Modal -->
    <div class="modal fade" id="customerCreateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id='createForm' autocomplete="off">

                        <div class="mb-3">
                            <input class="form-control" type="text" name="name" placeholder="Username">
                            <div id="name_error" class="text-danger errors d-none"></div>

                        </div>

                        <div class="mb-3">
                            <input class="form-control email" type="email" name="email" placeholder="Email">
                            <div id="emailError" class="text-danger errors d-none"></div>
                        </div>

                        <div class="mb-3">
                            <input class="form-control" type="password" name="password" placeholder="Password">
                            <div id="passwordError" class="text-danger errors d-none"></div>
                        </div>

                        <div class="mb-3">
                            <input class="form-control" type="password" name="password_confirmation"
                                placeholder="Confirm Password">
                            <div id="passwordRetypeError" class="text-danger errors d-none"></div>
                        </div>


                        <div class="mb-3 form-check">
                            <input type="checkbox" name="term_and_condition" class="form-check-input"
                                id="term_and_condition">
                            <label class="form-check-label" for="term_and_condition">Agree with Terms &
                                Conditions</label>
                            <div id="term_condtion_Error" class="text-danger errors d-none"></div>

                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="closeBtn" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>


                </form>
                <p>Don't have an Account? <a href="#"> Login Now!</a></p>

            </div>
        </div>
    </div>

    {{-- edit modal --}}
    <div class="modal fade" id="customerUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id='createForm' autocomplete="off">

                        <div class="mb-3">
                            <input id="editName" class="form-control" type="text" name="name" placeholder="Username">
                            <div id="name_error" class="text-danger errors d-none"></div>

                        </div>

                        <div class="mb-3">
                            <input id="editEmail" class="form-control email" type="email" name="email" placeholder="Email">
                            <div id="emailError" class="text-danger errors d-none"></div>
                        </div>

                        <div class="mb-3">
                            <input id="editPassword" class="form-control" type="password" name="password" placeholder="Password">
                            <div id="passwordError" class="text-danger errors d-none"></div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" name="term_and_condition" class="form-check-input"
                                id="term_and_condition">
                            <label class="form-check-label" for="term_and_condition">Agree with Terms &
                                Conditions</label>
                            <div id="term_condtion_Error" class="text-danger errors d-none"></div>

                        </div>




                </div>
                <div class="modal-footer">
                    <button type="button" id="closeBtn" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>


                </form>
                <p>Don't have an Account? <a href="#"> Login Now!</a></p>

            </div>
        </div>
    </div>



    <div class="container">
        <div class="row p-5 justify-content-center">
            <div class="col-md-12">
                <a data-bs-toggle="modal" data-bs-target="#customerCreateModal" href="{{route('customers.create')}}"
                    class="btn btn-primary float-end">register</a>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="customer_data">
                @forelse ($customers as $key => $customer )
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>
                        <button value="{{ $customer->id }}" class="btn btn-info">View</button>
                        <button value="{{ $customer->id }}" edit_url="{{ route('customers.edit',$customer->id) }}" class="editBtn btn btn-success">Edit</button>
                        <button value="{{ $customer->id }}" class="btn btn-danger">Delete</button>
                    </td>
                </tr>

                @empty
                <b class="text-danger text-center mt-5">No Data Found</b>
                @endforelse
            </tbody>
        </table>
    </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // create
            $(document).on('submit', '#createForm', function (e) {
                e.preventDefault();
                let formData = new FormData($('#createForm')[0]);
                $.ajax({
                    type: "post",
                    url: "{{route('customers.store')}}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {

                        if (response.status == 400) {
                            $('.errors').html('');
                            $('.errors').removeClass('d-none');
                            $('#name_error').text(response.errors.name);
                            $('#emailError').text(response.errors.email);
                            $('#passwordError').text(response.errors.password);
                            $('#term_condtion_Error').text(response.errors
                                .term_and_condition);


                        } else {

                            $('.errors').html('');
                            $('.errors').addClass('d-none');
                            $('#closeBtn')[0].click();
                            $('#createForm').find("input[type='text']").val('');
                            $('#createForm').find("input[type='email']").val('');
                            $('#createForm').find("input[type='password']").val('');

                            $('.createForm').load(location.href + ' .createForm');

                        }
                    }
                });
            });

            // edit
            $(document).on('click','.editBtn', function (e) {
              e.preventDefault();
              let edit_id = $(this).val();
              let edit_url = $(this).attr('edit_url');
              alert(edit_url);
              $.ajax({
                type: "GET",
                url: "url",
                data: "data",
                success: function (response) {
                  
                }
              });
            });
        });

    </script>
</body>

</html>
