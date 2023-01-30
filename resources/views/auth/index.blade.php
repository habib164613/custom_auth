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
    {{-- fontawesome icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- toaster --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css
    ">
    <title>Custom Auth</title>
    <style>
        #show_pass {
            cursor: pointer;
            -webkit-user-select: none;
            /* Safari */
            -moz-user-select: none;
            /* Firefox */
            -ms-user-select: none;
            /* Internet Explorer */
            user-select: none;
            /* Standard syntax */

        }

    </style>
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
                            <input class="form-control" type="text" name="name" placeholder="name">
                            <div id="name_error" class="text-danger errors d-none"></div>

                        </div>

                        <div class="mb-3">
                            <input class="form-control email" type="text" name="email" placeholder="Email"
                                autocomplete="off">
                            <div id="emailError" class="text-danger errors d-none"></div>
                        </div>

                        <div class="mb-3">
                            <input class="form-control" type="password" name="password" placeholder="Password"
                                autocomplete="off">
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
            </div>
        </div>
    </div>

    {{-- edit modal --}}
    <div class="modal fade" id="customerUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id='updateForm' autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <input id="editName" class="form-control" type="text" name="name" placeholder="Username">
                            <div id="editname_error" class="text-danger errors d-none"></div>

                        </div>

                        <div class="mb-3">
                            <input id="editEmail" class="form-control email" type="email" name="email"
                                placeholder="Email">
                            <div id="editemailError" class="text-danger errors d-none"></div>
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" id="closeBtn" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>


                </form>

            </div>
        </div>
    </div>

    {{-- show modal --}}
    <div class="modal fade" id="customerShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog mw-100">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Customer Show</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section class="" style="background-color: #9de2ff;">
                        <div class="container py-5 ">
                          <div class="row d-flex justify-content-center align-items-center">
                            <div class="col col-md-9 col-lg-7 col-xl-5">
                              <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-4">
                                  <div class="d-flex text-black">
                                    <div class="flex-shrink-0">
                                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                        alt="Generic placeholder image" class="img-fluid"
                                        style="width: 180px; border-radius: 10px;">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                      <div id="nameShow" class="mb-1 h5">Danny McLoan</div>
                                      <div id="emailShow" class="mb-2 pb-1" style="color: #2b2a2a;">Senior Journalist</div>
                                      <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                                        style="background-color: #efefef;">
                                        <div>
                                          <p class="small text-muted mb-1">Join</p>
                                          <p id="createdatShow" class="mb-0">41</p>
                                        </div>
                                        <div class="px-3">
                                          <p class="small text-muted mb-1">Last Update</p>
                                          <p id="updatedatShow" class="mb-0">976</p>
                                        </div>
            
                                      </div>
                                      <div class="d-flex pt-1">
                                        <button type="button" class="btn btn-outline-primary me-1 flex-grow-1">Chat</button>
                                        <button type="button" class="btn btn-primary flex-grow-1">Follow</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>


                </div>
                <div class="modal-footer">
                    <button type="button" id="closeBtn" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>


            </div>
        </div>
    </div>



    {{-- login --}}
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Edit Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id='loginForm' action="{{ route('loginAction') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <input id="lemail" class="form-control" type="text" name="email" placeholder="email">
                            <div id="lemail" class="text-danger errors d-none"></div>

                        </div>

                        <div class="mb-3">
                            <input id="lpassword" class="form-control w-70" type="password" name="password"
                                placeholder="Password">
                            <div class="show_pass mt-2"><input type="checkbox" id="show_pass" class="me-2"><label
                                    id="show_pass" for="show_pass">Show Password </label>
                            </div>
                            <div id="lpassword" class="text-danger errors d-none"></div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="closeBtn" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>


                </form>

            </div>
        </div>
    </div>



    <div class="container">
        <div class="row p-5 justify-content-center">
            <div class="col-md-12">
                <a data-bs-toggle="modal" data-bs-target="#loginModal" href="{{route('customers.create')}}"
                    class="btn btn-danger text-capitalize float-start">login</a>

                <a data-bs-toggle="modal" data-bs-target="#customerCreateModal" href="{{route('customers.create')}}"
                    class="btn btn-primary text-capitalize float-end">register</a>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="customer_data">
                @forelse ($customers as $key => $customer )
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->password }}</td>
                    <td>
                        <button data-bs-toggle="modal" data-bs-target="#customerShowModal" value="{{ $customer->id }}" show_url="{{ route('customers.show',$customer->id) }}" class="customerShow btn btn-info">View</button>

                        <button data-bs-toggle="modal" data-bs-target="#customerUpdateModal" value="{{ $customer->id }}"
                            editId="{{ $customer->id }}" edit_url="{{ route('customers.edit',$customer->id) }}" updateUrl="{{ route('customers.update',$customer->id) }}"
                            class="editBtn btn btn-success">Edit</button>

                        <form id="deleteCustomers" action="{{ route('customers.destroy', $customer->id) }}"
                            method="POST" class="data-delete d-inline"
                            delete-link="{{ route('customers.destroy', $customer->id) }}">
                            @csrf
                            @method('DELETE')
                            <button deleteUrl="{{ route('customers.destroy',$customer->id) }}"
                                value="{{ $customer->id }}" class="deleteBtn btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>

                @empty
                <b class="text-danger text-center mt-5">No Data Found</b>
                @endforelse
            </tbody>
        </table>
        {{ $customers->links() }}
    </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js
    " ></script>





    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function dataCelar() {
                $('#closeBtn')[0].click();
                $('#createForm,#updateForm').find(
                    "input[type='text'],input[type='email'],input[type='password']").val('');
            }

            // cancel
            $(document).on('click', '#closeBtn', function () {

                $('#createForm,#loginForm,#updateForm').find(
                    "input[type='text'],input[type='email'],input[type='password']").val('');
                $("input[type='checkbox']").prop('checked', false);
                $('#lpassword').attr('type', 'password');
                $('.errors').html('');
                $('.errors').addClass('d-none');


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
                    success: function (res) {

                        if (res.status == 400) {
                            $('.errors').html('');
                            $('.errors').removeClass('d-none');
                            $('#name_error').text(res.errors.name);
                            $('#emailError').text(res.errors.email);
                            $('#passwordError').text(res.errors.password);
                            $('#term_condtion_Error').text(res.errors
                                .term_and_condition);


                        } else {

                            $('.errors').html('');
                            $('.errors').addClass('d-none');
                            dataCelar();
                            // Swal.fire(
                            //     'Customer Added!',
                            //     'Your Customer Addes Successfully!',
                            //     'success'
                            // )
                            toastr.success('Your Customer Added Successfully!', 'Customer Added!')
                            $('.table').load(location.href + ' .table');


                        }
                    }
                });
            });

            // edit
            $(document).on('click', '.editBtn', function (e) {
                e.preventDefault();
                let edit_id = $(this).val();
                let edit_url = $(this).attr('edit_url');
                let updateUrl = $(this).attr('updateUrl');
                
                $.ajax({
                    type: "GET",
                    url: edit_url,
                    success: function (res) {

                        if (res.status == 200) {
                            $('#editName').val(res.customers.name);
                            $('#editEmail').val(res.customers.email);
                            $('#updateForm').attr('action', updateUrl);

                        } else {
                            // Swal.fire({
                            //     icon: 'error',
                            //     title: 'Oops...',
                            //     text: 'Your Customer Not Found!',
                            // })
                            toastr.error('Customer 404!. Your Customer Not Found!')

                        }

                    }
                });
            });

            // update
            $(document).on('submit', '#updateForm', function (e) {
                e.preventDefault();

                let formAction = $(this).attr('action');
                let formData = new FormData($('#updateForm')[0]);

                $.ajax({
                    type: "POST",
                    url: formAction,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (res) {
                        
                        console.log(res);
                        if (res.status == 400) {
                            $('.errors').html('');
                            $('.errors').removeClass('d-none');
                            $('#editname_error').text(res.errors.name);
                            $('#editemailError').text(res.errors.email);

                        } else {
                            console.log(res);

                            $('.errors').html('');
                            $('.errors').addClass('d-none');
                            $('#customerUpdateModal').find('#closeBtn')[0].click();
                            // Swal.fire(
                            //     'Customer updated!',
                            //     'Your Customer updated Successfully!',
                            //     'success'
                            // )
                            $('.table').load(location.href + ' .table');
                            toastr.success('Your Customer Updated Successfully!', 'Customer Updated!')

                        }
                    }
                });

            });

            // show
            $(document).on('click','.customerShow', function () {
             
             let showRoute = $(this).attr('show_url');

             $.ajax({
                type: "GET",
                url: showRoute,
                success: function (res) {
                    
                    if (res.status==404) {
                        // Swal.fire({
                        // icon: 'error',
                        // title: 'Oops...',
                        // text: 'Your Customer Not Found!',
                        // })
                        toastr.error('Customer 404!. Your Customer Not Found!')

                        
                    } else {
                        $('#nameShow').text(res.customer.name);
                        $('#emailShow').text(res.customer.email);
                        $('#createdatShow').text(res.created_at);
                        $('#updatedatShow').text(res.updated_at);
                    }
                }
             });
                
            });

            //delete
            $(document).on('click', '.deleteBtn', function (e) {
                e.preventDefault();

                let deleteUrl = $(this).attr('deleteUrl');
                let csrf = $('#deleteCustomers').find("input[name='_token']").val();
                let dataType = 'html';


                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {


                        $.ajax({
                            type: "POST",
                            url: deleteUrl,
                            data: {
                                "_token": csrf,
                                '_method': 'DELETE'
                            },
                            dataType: dataType,
                            success: function (response) {
                                // Swal.fire(
                                //     'Deleted!',
                                //     'Your file has been deleted.',
                                //     'success'
                                // )
                                $('.table').load(location.href + ' .table');
                                toastr.success('Your Customer Updated Successfully!', 'Customer Updated!')

                            }
                        });

                    }
                })
            });



            // login
            // $('#show_pass').change(function () { 

            //     if (this.checked) {
            //         $('#lpassword').attr('type','text');
            //     } else {
            //         $('#lpassword').attr('type','password');

            //     }                
            // });

            // $(document).on('submit','#loginForm', function (e) {
            //     e.preventDefault();

            //     let formData = new FormData($('#loginForm')[0]);

            //     $.ajax({
            //         type: "POST",
            //         url: "{{ route('loginAction') }}",
            //         data: formData,
            //         processData: false,
            //         contentType: false,
            //         success: function (response) {

            //         }
            //     });
            // });















        });

    </script
</body>

</html>
