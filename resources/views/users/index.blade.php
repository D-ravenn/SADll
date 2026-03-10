@extends('layouts.master')

@section('title') User Management @endsection

@section('contents')
    <div class="md:flex block items-center justify-between mb-6 mt-[2rem] page-header-breadcrumb">
        <div class="my-auto">
            <h5 class="page-title text-[1.3125rem] font-medium text-defaulttextcolor mb-0">Users</h5>
            <nav>
                <ol class="flex items-center whitespace-nowrap min-w-0">
                    <li class="text-[12px]"> 
                        <a class="flex items-center text-primary hover:text-primary" href="{{ route('dashboard') }}"> 
                            Dashboard 
                            <i class="ti ti-chevrons-right flex-shrink-0 mx-3 overflow-visible text-textmuted rtl:rotate-180"></i>
                        </a> 
                    </li>
                    <li class="text-[12px]"> 
                        <a class="flex items-center text-textmuted" href="javascript:void(0);">
                            Users 
                        </a> 
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6"> 
        <div class="xl:col-span-12 col-span-12"> 
            <div class="box custom-box">
                <div class="box-header flex justify-between">
                    <div class="box-title">
                        All Users
                    </div>
                    <div class="prism-toggle">
                        <a href="{{ route('users.create') }}" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">
                            New User <i class="ri-add-circle-line align-middle ms-1"></i>
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table whitespace-nowrap table-bordered min-w-full">
    <thead>
        <tr class="border-b border-defaultborder">
            <th scope="col" class="text-start">User</th>
            <th scope="col" class="text-start">Email</th>
            <th scope="col" class="text-start">Status</th>
            <th scope="col" class="text-start">Date Registered</th>
            <th scope="col" class="text-start">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $users)
            <tr class="border-b border-defaultborder hover:bg-gray-100 dark:hover:bg-black/20">
                <th scope="row">
                    <div class="flex items-center">
                        <span class="avatar avatar-xs me-2 online avatar-rounded">
                            <img src="{{ $users->photo ? asset('storage/' . $users->photo) : asset('backend/assets/images/faces/9.jpg') }}" alt="img">
                        </span>
                        <span class="font-semibold text-defaulttextcolor">{{ $users->name }}</span>
                    </div>
                </th>
                
                <td>{{ $users->email }}</td>
                
                <td>
                    @if ($users->status == 1)
                        <span class="badge bg-success/10 text-success">Active</span>
                    @else  
                        <span class="badge bg-danger/10 text-danger">Inactive</span>
                    @endif
                </td>

                <td>
                    {{ $users->created_at ? $users->created_at->format('M d, Y H:i') : 'N/A' }}
                </td>

                <td>
                    <div class="hstack gap-2 flex-wrap">
                        <a href="{{ route('users.edit', $users->id) }}" aria-label="anchor" class="text-info text-[.875rem] leading-none">
                            <i class="ri-edit-line"></i>
                        </a>
                        <form action="{{ route('users.destroy', $users->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');" class="inline-block mb-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" aria-label="anchor" class="text-danger text-[.875rem] leading-none bg-transparent border-0 p-0 cursor-pointer">
                                <i class="ri-delete-bin-5-line"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection