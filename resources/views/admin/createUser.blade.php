@extends('admin.layouts.base')

@section('content')
<!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Dashboard</a> </div>
                    <!-- END: Breadcrumb -->
                    @include('admin.layouts.partials.topbarCredential')
                </div>
                <!-- END: Top Bar -->
                <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        User Creation Form
                    </h2>
                </div>
                @include('admin.layouts.partials.message')
                <div class="grid grid-cols-12 gap-6 mt-5">

                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- BEGIN: Form Validation -->
                        <div class="intro-y box">

                            <div class="p-5" id="form-validation">
                                <div class="preview">
                                    <form method="POST" action="{{ route('storeUser') }}" enctype="multipart/form-data">
                                      @csrf
                                        <div class="input-form">
                                            <label class="flex flex-col sm:flex-row">Photo</label>
                                            <input type="file" name="profilePhoto" class="input w-full border mt-2">
                                        </div>

                                        <div class="input-form mt-3">
                                            <label class="flex flex-col sm:flex-row">First Name</label>
                                            <input type="text" name="firstName" class="input w-full border mt-2">
                                        </div>

                                        <div class="input-form mt-3">
                                            <label class="flex flex-col sm:flex-row">Last Name</label>
                                            <input type="text" name="lastName" class="input w-full border mt-2">
                                        </div>

                                        <div class="input-form mt-3">
                                            <label class="flex flex-col sm:flex-row">Email</label>
                                            <input type="email" name="email" class="input w-full border mt-2">
                                        </div>

                                        <div class="input-form mt-3">
                                          <label>Role</label>
                                          <div class="mt-2">
                                            <select class="tail-select w-full" name="role">
                                              <option value="0">Select Role</option>
                                              @foreach(App\Role::get() as $role)
                                              <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                        </div>

                                        <div class="input-form mt-3">
                                            <label class="flex flex-col sm:flex-row">Password</label>
                                            <input type="password" name="password" class="input w-full border mt-2" minlength="6">
                                        </div>

                                        <div class="input-form mt-3">
                                            <label class="flex flex-col sm:flex-row">Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="input w-full border mt-2" minlength="6">
                                        </div>

                                        <button type="submit" class="button bg-theme-1 text-white mt-5">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END: Form Validation -->
                    </div>
                </div>
            </div>
            <!-- END: Content -->
@endsection
