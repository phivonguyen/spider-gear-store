@extends('layout')
<!-- Begin Page Title -->
@section('title', "ADMIN | User Manager")
<!-- End Page Title -->

<!-- Begin Header Script -->
@section('header-script') @endsection
<!-- End Header Script -->

<!-- Begin Body -->
@section('body')
<div class="container mt-4">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Middle Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($errors->has('data'))
            <tr class="text-danger">
                $errors->first('data')
            </tr>
            @endif

            <!--  -->
            @if (count($users))
            <!--  -->
            @foreach ($users as $user)
            <!--  -->
            @if ($user->role_id != 1)
            <tr data-user-id="{{ $user->id }}">
                <th scope="row">{{ $user->id }}</th>

                <td>{{ $user->first_name ?? 'NULL' }}</td>

                <td>{{ $user->middle_name ?? 'NULL' }}</td>

                <td>{{ $user->last_name ?? 'NULL' }}</td>

                <td>{{ $user->username }}</td>

                <td>{{ $user->email ?? 'NULL' }}</td>

                <td>{{ $user->phone ?? 'NULL' }}</td>

                <td>
                    <a href="#">
                        <span
                            class="status-toggle-btn btn @if ($user->status == 'Active') btn-success @else btn-danger @endif"
                            data-user-id="{{ $user->id }}"
                            data-current-status="{{ $user->status }}"
                        >
                            {{ $user->status }}
                        </span>
                    </a>
                </td>

                <td>
                    <a
                        href="#"
                        class="delete-btn btn btn-danger"
                        data-user-id="{{ $user->id }}"
                        data-toggle="modal"
                        data-target="#confirmDeleteModal"
                        ><i class="fa-solid fa-trash"></i
                    ></a>
                </td>
            </tr>
            @endif
            <!--  -->
            @endforeach
            <!--  -->
            @endif
        </tbody>
    </table>
</div>

<div
    class="modal fade"
    id="confirmDeleteModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="confirmDeleteModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">
                    Confirm Delete
                </h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">Are you sure to delete this user</div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-dismiss="modal"
                >
                    Cancel
                </button>
                <button type="button" class="btn btn-danger confirm-delete">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Success -->
<div
    class="modal fade"
    id="successModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="successModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-success">Delete successfully</div>
        </div>
    </div>
</div>

<!-- Modal Fail -->
<div
    class="modal fade"
    id="errorModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="errorModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Fail</h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-danger">Something went wrong</div>
        </div>
    </div>
</div>
@endsection
<!-- End Body -->

<!-- Begin End Script -->
@section('footer-script')
<!-- Handle toggle status -->
<script>
    document.addEventListener("DOMContentLoaded", async function () {
        const statusToggleBtns =
            document.querySelectorAll(".status-toggle-btn");

        statusToggleBtns.forEach((btn) => {
            btn.addEventListener("click", async function (e) {
                e.preventDefault();

                const userId = this.getAttribute("data-user-id");
                const currentStatus = this.getAttribute("data-current-status");

                const newStatus =
                    currentStatus === "Active" ? "Inactive" : "Active";

                try {
                    const response = await fetch(
                        `update-status/${userId}/${newStatus}`,
                        {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify({}),
                        }
                    );

                    const data = await response.json();

                    if (data) {
                        this.setAttribute("data-current-status", newStatus);
                        this.textContent = newStatus;

                        this.classList.remove("btn-success", "btn-danger");
                        this.classList.add(
                            newStatus === "Active"
                                ? "btn-success"
                                : "btn-danger"
                        );
                    } else {
                        console.error("Failed to update user status.");
                    }
                } catch (error) {
                    console.error(error);
                }
            });
        });
    });
</script>

<!-- Handle delete -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const deleteButtons = document.querySelectorAll(".delete-btn");
        const confirmDeleteButton = document.querySelector(".confirm-delete");

        let userIdToDelete = null;

        deleteButtons.forEach((btn) => {
            btn.addEventListener("click", function (e) {
                e.preventDefault();
                userIdToDelete = this.getAttribute("data-user-id");
            });
        });

        confirmDeleteButton.addEventListener("click", async function () {
            if (userIdToDelete !== null) {
                try {
                    const response = await fetch(
                        `delete-user/${userIdToDelete}`,
                        {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify({}),
                        }
                    );

                    const data = await response.json();

                    console.log(data);

                    if (data) {
                        const rowToRemove = document.querySelector(
                            `tr[data-user-id="${userIdToDelete}"]`
                        );
                        if (rowToRemove) {
                            rowToRemove.remove();
                        }

                        $("#confirmDeleteModal").modal("hide");
                        $("#successModal").modal("show");
                    } else {
                        $("#errorModal").modal("show");
                    }
                } catch (error) {
                    console.error(error);
                }
            }
        });
    });
</script>
@endsection
<!-- End End Script -->
