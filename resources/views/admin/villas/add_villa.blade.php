@extends('admin_layout.master')
@section('content')
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Form Validations </h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet
                            vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Form Validations</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->

            <div class="row">
                <!-- ============================================================== -->
                <!-- validation form -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Add villa</h5>
                        <div class="card-body">
                            <form class="needs-validation" action="{{ url('/store-villa') }}" enctype="multipart/form-data" method="POST" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01">villa name</label>
                                        <input type="text" class="form-control" id="validationCustom01"
                                            placeholder="villa name" name="villa_name">
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <br>
                                        <label for="validationCustom02"> description </label>
                                        <textarea name="description" class="form-control"></textarea>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <br>
                                        <label for="validationCustomUsername">Price</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="validationCustomUsername"
                                                placeholder="Price" aria-describedby="inputGroupPrepend" name="price">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <h4>villa image</h4>
                                <div class="form-row">
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <label for="validationCustom05">image</label>
                                        <input type="file" class="form-control" id="validationCustom05"
                                             name="image">
                                    </div>
                                </div>
                                <br>
                                <h4>villa details</h4>
                                <div class="form-row">
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <label for="validationCustom03">bedrooms</label>
                                        <input type="text" class="form-control" id="validationCustom03"
                                            placeholder="bedrooms" name="bedrooms" required>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <label for="validationCustom04">Bathrooms</label>
                                        <input type="text" class="form-control" id="validationCustom04"
                                            placeholder="Bathrooms" name="Bathrooms" required>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <label for="validationCustom05">Guest Capacity</label>
                                        <input type="text" class="form-control" id="validationCustom05"
                                            placeholder="Guest Capacity" name="Guest_Capacity">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                    <label class="col-sm-4 col-form-label text-sm-left"><b>services</b> </label>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <label class="custom-control custom-checkbox">
                                            <input id="ck1" name="service[]" type="checkbox"
                                                data-parsley-multiple="groups" value="swimming_pool"
                                                data-parsley-mincheck="2" data-parsley-errors-container="#error-container1"
                                                class="custom-control-input"><span class="custom-control-label">swimming
                                                pool</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input id="ck2" name="service[]" type="checkbox"
                                                data-parsley-multiple="groups" value="wifi" data-parsley-mincheck="2"
                                                data-parsley-errors-container="#error-container1"
                                                class="custom-control-input"><span class="custom-control-label">Wi-Fi
                                            </span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input id="ck2" name="service[]" type="checkbox"
                                                data-parsley-multiple="groups" value="Park" data-parsley-mincheck="2"
                                                data-parsley-errors-container="#error-container1"
                                                class="custom-control-input"><span class="custom-control-label">Park
                                            </span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input id="ck2" name="service[]" type="checkbox"
                                                data-parsley-multiple="groups" value="air_condition" data-parsley-mincheck="2"
                                                data-parsley-errors-container="#error-container1"
                                                class="custom-control-input"><span class="custom-control-label">air condition
                                            </span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input id="ck2" name="service[]" type="checkbox"
                                                data-parsley-multiple="groups" value="TV" data-parsley-mincheck="2"
                                                data-parsley-errors-container="#error-container1"
                                                class="custom-control-input"><span class="custom-control-label">TV
                                            </span>
                                        </label>
                                        <div id="error-container1"></div>
                                    </div>
                                </div>
                                <h4>villa address</h4>
                                <div class="form-row">
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <label for="validationCustom03">City</label>
                                        <input type="text" class="form-control" name="city" id="validationCustom03"
                                            placeholder="City">
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <label for="validationCustom04">State</label>
                                        <input type="text" class="form-control" name="state"
                                            id="validationCustom04" placeholder="State">
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <label for="validationCustom05">country</label>
                                        <input type="text" class="form-control" name="country"
                                            id="validationCustom05" placeholder="country">
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <label for="validationCustom05">latitude</label>
                                        <input type="text" class="form-control" name="latitude"
                                            id="validationCustom05" placeholder="latitude">
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <label for="validationCustom05">longitude</label>
                                        <input type="text" class="form-control" name="longitude"
                                            id="validationCustom05" placeholder="longitude">
                                    </div>
                                </div>
                                {{-- <!-- ============================================================== -->
                                <!-- horizontal form -->
                                <!-- ============================================================== -->
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <h5 class="card-header">Horizontal Form</h5>
                                        <div class="card-body">
                                            <form id="form" data-parsley-validate="" novalidate="">
                                                <div class="form-group row">
                                                    <label for="inputEmail2"
                                                        class="col-3 col-lg-2 col-form-label text-right">Email</label>
                                                    <div class="col-9 col-lg-10">
                                                        <input id="inputEmail2" type="email" required=""
                                                            data-parsley-type="email" placeholder="Email"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword2"
                                                        class="col-3 col-lg-2 col-form-label text-right">image</label>
                                                    <div class="col-9 col-lg-10">
                                                        <input  type="file" name="image" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row pt-2 pt-sm-5 mt-1">
                                                    <div class="col-sm-6 pl-0">
                                                        <p class="text-right">
                                                            <button type="submit"
                                                                class="btn btn-space btn-primary">Submit</button>
                                                        </p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <button class="btn btn-primary" type="submit">ADD</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end validation form -->
                <!-- ============================================================== -->
            </div>

        </div>
    </div>
    <script>
        function addAmenity() {
            amenityCount++;
            const container = document.getElementById('new-amenities');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = `amenities[new_${amenityCount}]`;
            container.appendChild(input);

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.textContent = 'Remove';
            removeButton.onclick = function() {
                container.removeChild(input);
                amenityCount--;
            };

            container.appendChild(removeButton);
        }
    </script>
@endsection
