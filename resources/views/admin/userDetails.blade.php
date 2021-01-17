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
                <h2 class="intro-y text-lg font-medium mt-10">
                    Users Details
                </h2>
                <div class="grid grid-cols-12 gap-6 mt-5">

                    <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">
                        <div class="box">
                            <div class="flex items-start px-5 pt-5">
                                <div class="w-full flex flex-col lg:flex-row items-center">
                                  @if($userDetails->link)
                                    <div class="w-16 h-16 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="{{ asset('images/userPhoto/' . $userDetails->link) }}">
                                    </div>
                                    @endif
                                    <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                                        <a href="" class="font-medium">{{ $userDetails->first_name }} {{ $userDetails->last_name }}</a>
                                        <div class="text-gray-600 text-xs mt-0.5">{{ $userDetails->role->role_name }}</div>
                                    </div>
                                </div>
                                <div class="absolute right-0 top-0 mr-5 mt-3 dropdown">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i> </a>
                                    <div class="dropdown-box w-40">
                                        <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                                            <a href="{{ route('editUseer', $userDetails->id) }}" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i class="w-4 h-4 mr-2"></i> Edit </a>
                                            <a href="{{ route('userView') }}" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i  class="w-4 h-4 mr-2"></i> Back </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center lg:text-left p-5">
                                <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>

                                <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-5"> <i data-feather="mail" class="w-3 h-3 mr-2"></i> {{ $userDetails->email }} </div>

                                <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-1"> <i class="w-3 h-3 mr-2"></i> Active </div>

                            </div>
                        </div>
                    </div>
                    <!-- END: Users Layout -->
                </div>
            </div>
            <!-- END: Content -->
@endsection
