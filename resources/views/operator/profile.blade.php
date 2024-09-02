@extends('operator.layout.app')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Edit Profile</p>
                            <button type="submit" class="btn btn-primary btn-sm ms-auto"
                                form="edit-profile-form">Update</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="edit-profile-form" action="" method="POST">
                            @csrf <!-- Laravel CSRF token -->

                            <p class="text-uppercase text-sm">User Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first-name" class="form-control-label">Full name</label>
                                        <input id="first-name" name="first_name" class="form-control" type="text"
                                            value="Jesse">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label">Email address</label>
                                        <input id="email" name="email" class="form-control" type="email"
                                            value="jesse@example.com">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username" class="form-control-label">Username</label>
                                        <input id="username" name="username" class="form-control" type="text"
                                            value="lucky.jesse">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password" class="form-control-label">Password</label>
                                        <input id="password" name="password" class="form-control" type="text"
                                            value="lucky.jesse">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Contact Information</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address" class="form-control-label">Address</label>
                                        <input id="address" name="address" class="form-control" type="text"
                                            value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="city" class="form-control-label">City</label>
                                        <input id="city" name="city" class="form-control" type="text"
                                            value="New York">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="country" class="form-control-label">Country</label>
                                        <input id="country" name="country" class="form-control" type="text"
                                            value="United States">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="postal-code" class="form-control-label">Postal code</label>
                                        <input id="postal-code" name="postal_code" class="form-control" type="text"
                                            value="437300">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <img src="{{ asset('assetsadmin/img/bg-profile.jpg') }}" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-4 col-lg-4 order-lg-2">
                            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                <a href="javascript:;">
                                    <img src="{{ asset('assetsadmin/img/team-2.jpg') }}"
                                        class="rounded-circle img-fluid border border-2 border-white">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="text-center mt-4">
                            <h5>Mark Davis<span class="font-weight-light">, 35</span></h5>
                            <div class="h6 font-weight-300">
                                <i class="ni location_pin mr-2"></i>Bucharest, Romania
                            </div>
                            <div class="h6 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>University of Computer Science
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.layout.footer')
    </div>
@endsection
