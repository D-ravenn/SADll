@extends('layouts.master')

@section('title')
    Create User
@endsection

@section('contents')

    <div class="md:flex block items-center justify-between mb-6 mt-[2rem] page-header-breadcrumb">
        <div class="my-auto">
            <h5 class="page-title text-[1.3125rem] font-medium text-defaulttextcolor mb-0">Create User</h5>
            <nav>
                <ol class="flex items-center whitespace-nowrap min-w-0">
                    <li class="text-[12px]"> 
                        <a class="flex items-center text-primary hover:text-primary" href="{{ route('dashboard') }}"> 
                            Dashboard 
                            <i class="ti ti-chevrons-right flex-shrink-0 mx-3 overflow-visible text-textmuted rtl:rotate-180"></i>
                        </a> 
                    </li>
                    <li class="text-[12px]"> 
                        <a class="flex items-center text-textmuted" href="{{ route('users.index') }}">
                            Users 
                            <i class="ti ti-chevrons-right flex-shrink-0 mx-3 overflow-visible text-textmuted rtl:rotate-180"></i>
                        </a> 
                    </li>
                    <li class="text-[12px]"> 
                        <a class="flex items-center text-textmuted" href="javascript:void(0);">
                            Create
                        </a> 
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6">
        <div class="xl:col-span-12 col-span-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        User Information
                    </div>
                </div>
                
@if ($errors->any())
    <div class="alert alert-danger bg-danger/10 text-danger border-0 mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data"autocomplete="off">
                @csrf
                    
                    <div class="box-body">
                        <div class="grid grid-cols-12 gap-4">
                            
                            <div class="xl:col-span-4 md:col-span-6 col-span-12">
                                <label for="input-name" class="form-label mb-2">Full Name</label>
                                <input type="text" class="form-control" id="input-name" name="name" placeholder="Enter full name" required>
                            </div>
                            
                            <div class="xl:col-span-4 md:col-span-6 col-span-12">
    <label for="input-email" class="form-label mb-2">Email Address</label>
    <input type="email" class="form-control" id="input-email" name="email" placeholder="Enter email address" value="{{ old('email') }}" autocomplete="off" required>
</div>
                            
                            <div class="xl:col-span-4 md:col-span-6 col-span-12">
    <label for="input-password" class="form-label mb-2">Password</label>
    <input type="password" class="form-control" id="input-password" name="password" placeholder="Enter password" autocomplete="new-password" required>
</div>

                            <div class="xl:col-span-4 md:col-span-6 col-span-12">
                                <label for="input-birthdate" class="form-label mb-2">Birthdate</label>
                                <input type="date" class="form-control" id="input-birthdate" name="birthdate">
                            </div>

                            <div class="xl:col-span-4 md:col-span-6 col-span-12">
    <label for="file-input" class="form-label mb-2">Profile Photo</label>
    <input type="file" name="photo" id="file-input" class="block w-full border border-gray-200 focus:shadow-sm dark:focus:shadow-white/10 rounded-sm text-sm focus:z-10 focus:outline-0 focus:border-gray-200 dark:focus:border-white/10 dark:border-white/10 file:border-0 file:bg-gray-200 file:me-4 file:py-3 file:px-4 dark:file:bg-black/20 dark:file:text-white/50">              
    
    <p class="text-[0.75rem] text-textmuted mt-1">Maximum size: 2MB</p>
</div>

                        </div> 
                    </div>

                    <div class="box-footer">
    <div class="flex justify-end gap-2"> 

    <button type="submit" class="ti-btn ti-btn-primary ti-btn-wave">
            Save User
        </button>
        
        <a href="{{ route('users.index') }}" class="ti-btn ti-btn-secondary ti-btn-wave">
            Cancel
        </a>

        
    </div>
</div>
                </form>
                </div>
        </div>
    </div>
@endsection