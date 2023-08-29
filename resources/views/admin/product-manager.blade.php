@extends('layout')
<!-- Begin Page Title -->
@section('title', "ADMIN | User Manager")
<!-- End Page Title -->

<!-- Begin Header Script -->
@section('header-script')
<script
    src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"
></script>
@endsection
<!-- End Header Script -->

<!-- Begin Body -->
@section('body')
<div class="container mt-4">
    <h1 class="text-center">Add Product</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="brand">Brand:</label>
                    <select class="form-control" name="brand" id="brand">
                        <!-- Options for brands here -->
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select class="form-control" name="category" id="category">
                        <!-- Options for categories here -->
                        <option value="none" selected>--- Select ---</option>
                        <option value="laptop">Laptop</option>
                        <option value="mouse">Mouse</option>
                        <option value="headphone">headphone</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea
                class="form-control"
                name="description"
                id="description"
            ></textarea>
        </div>

        <!-- Common fields -->
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" class="form-control" />
        </div>

        <div class="form-group">
            <label for="qty_in_stock">Quantity in Stock:</label>
            <input
                type="text"
                name="qty_in_stock"
                id="qty_in_stock"
                class="form-control"
            />
        </div>

        <!-- Additional fields based on category -->
        <div id="additional-fields"></div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Add Product</button>
        </div>
    </form>
</div>
@endsection
<!-- End Body -->

<!-- Begin Footer Script -->
@section('footer-script')
<!-- ... (code from previous response) ... -->

<script>
    const categorySelect = document.getElementById("category");
    const additionalFieldsDiv = document.getElementById("additional-fields");

    categorySelect.addEventListener("change", (event) => {
        additionalFieldsDiv.innerHTML = ""; // Clear previous fields

        const selectedCategory = event.target.value;
        if (selectedCategory === "laptop") {
            showLaptopFields();
        } else if (selectedCategory === "mouse") {
            showMouseFields();
        } else if (selectedCategory === "headphone") {
            showHeadphoneFields();
        }
    });

    function showLaptopFields() {
        // Create and append laptop-specific fields
        additionalFieldsDiv.innerHTML = `
        <div class="form-group">
            <label for="cpu">CPU:</label>
            <select class="form-control" name="cpu" id="cpu">
                <!-- Options for CPUs here -->
            </select>
        </div>
        <div class="form-group">
            <label for="gpu">GPU:</label>
            <select class="form-control" name="gpu" id="gpu">
                <!-- Options for GPUs here -->
            </select>
        </div>
        <!-- ... (other laptop fields) ... -->
        `;
    }

    function showMouseFields() {
        // Create and append mouse-specific fields
        additionalFieldsDiv.innerHTML = `
        <div class="form-group">
            <label for="model">Model:</label>
            <input type="text" name="model" id="model" class="form-control">
        </div>
        <div class="form-group">
            <label for="connection_type">Connection Type:</label>
            <input type="text" name="connection_type" id="connection_type" class="form-control">
        </div>
        <!-- ... (other mouse fields) ... -->
        <div class="form-group">
            <label for="led">LED:</label>
            <input type="checkbox" name="led" id="led" class="form-check-input">
        </div>
        `;
    }

    function showHeadphoneFields() {
        // Create and append headphone-specific fields
        additionalFieldsDiv.innerHTML = `
        <div class="form-group">
            <label for="model">Model:</label>
            <input type="text" name="model" id="model" class="form-control">
        </div>
        <!-- ... (other headphone fields) ... -->
        `;
    }
</script>

<script>
    tinymce.init({
        selector: "#description",
        plugins: "image",
        toolbar:
            "undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | image",
        images_upload_url: "/upload-image", // Đường dẫn xử lý tải lên hình ảnh
        automatic_uploads: true,
    });
</script>

@endsection
<!-- End Footer Script -->
