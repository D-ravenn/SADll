@extends('layouts.master')

@section('title')
    Edit User
@endsection

@section('contents')

    <div class="md:flex block items-center justify-between mb-6 mt-[2rem] page-header-breadcrumb">
        <div class="my-auto">
            <h5 class="page-title text-[1.3125rem] font-medium text-defaulttextcolor mb-0">Edit User</h5>
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
                            Edit User
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

                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    
                    <div class="box-body">
                        <div class="grid grid-cols-12 gap-4">
                            
                            <div class="xl:col-span-4 md:col-span-6 col-span-12">
    <label for="input-name" class="form-label mb-2">Full Name</label>
    <input type="text" class="form-control" id="input-name" name="name" value="{{ $user->name }}" required>
</div>
                            
                            <div class="xl:col-span-4 md:col-span-6 col-span-12">
    <label for="input-email" class="form-label mb-2">Email Address</label>
    <input type="email" class="form-control" id="input-email" name="email" value="{{ $user->email }}" required>
</div>
                            
                            <div class="xl:col-span-4 md:col-span-6 col-span-12">
    <label for="input-password" class="form-label mb-2">Password</label>
    <input type="password" class="form-control" id="input-password" name="password" placeholder="Leave blank to keep current password">
</div>

                           <div class="xl:col-span-4 md:col-span-6 col-span-12">
    <label class="form-label mb-2">Profile Photo</label>

    @if ($user->photo)
        <div class="mb-3">
            <span class="text-[0.75rem] text-textmuted block mb-1">Current Photo:</span>
            <img src="{{ asset('storage/' . $user->photo) }}" alt="Current Profile Photo" class="w-16 h-16 rounded object-cover border border-defaultborder">
        </div>
    @endif

    <div class="flex items-center gap-0 border border-gray-200 dark:border-white/10 rounded-sm overflow-hidden text-sm">
        <label for="file-input" class="cursor-pointer shrink-0 bg-gray-200 dark:bg-black/20 dark:text-white/50 px-4 py-3 select-none">
            Choose File
        </label>
        <span id="file-name-display" class="px-3 text-textmuted truncate">
            {{ $user->photo ? basename($user->photo) : 'No file chosen' }}
        </span>
    </div>
    <input type="file" name="photo" id="file-input" class="hidden"> 
    <p class="text-[0.75rem] text-textmuted mt-1">Max upload: 2MB. Leave it to keep the current photo.</p>
</div>

<div class="xl:col-span-4 md:col-span-6 col-span-12">
    <label for="input-birthdate" class="form-label mb-2">Birthdate</label>
    <input type="date" class="form-control" id="input-birthdate" name="birthdate" value="{{ $user->birthdate }}">
</div>

                        </div> 
                    </div>

                    <div class="box-footer">
                        <div class="flex items-center justify-start gap-3">

                        <div class="flex justify-start"> <button type="submit" class="ti-btn ti-btn-primary ti-btn-wave">
                                Update User
                            </button>
                        </div>

                        <a href="{{ route('users.index') }}" class="ti-btn ti-btn-secondary ti-btn-wave">
                            Cancel
                        </a>

                    </div>
                </form>
                </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.getElementById('file-input').addEventListener('change', function () {
        const display = document.getElementById('file-name-display');
        display.textContent = this.files.length ? this.files[0].name : display.textContent;
    });
</script>
@endpush
