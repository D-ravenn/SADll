@extends('layouts.master')

@section('title') Subject Management @endsection

@section('contents')
    <div class="md:flex block items-center justify-between mb-6 mt-[2rem] page-header-breadcrumb">
        <div class="my-auto">
            <h5 class="page-title text-[1.3125rem] font-medium text-defaulttextcolor mb-0">Subjects</h5>
            <nav>
                <ol class="flex items-center whitespace-nowrap min-w-0">
                    <li class="text-[12px]">
                        <a class="flex items-center text-primary hover:text-primary" href="{{ route('dashboard') }}">
                            Dashboard
                            <i class="ti ti-chevrons-right flex-shrink-0 mx-3 overflow-visible text-textmuted rtl:rotate-180"></i>
                        </a>
                    </li>
                    <li class="text-[12px]">
                        <a class="flex items-center text-textmuted" href="javascript:void(0);">Subjects</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success bg-success/10 text-success border-0 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-12 gap-6">
        <div class="xl:col-span-12 col-span-12">
            <div class="box custom-box">
                <div class="box-header flex justify-between">
                    <div class="box-title">All Subjects</div>
                    <div class="prism-toggle">
                        <a href="{{ route('subjects.create') }}" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">
                            New Subject <i class="ri-add-circle-line align-middle ms-1"></i>
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table whitespace-nowrap table-bordered min-w-full">
                        <thead>
                            <tr class="border-b border-defaultborder">
                                <th scope="col" class="text-start">Curriculum</th>
                                <th scope="col" class="text-start">Name</th>
                                <th scope="col" class="text-start">Code</th>
                                <th scope="col" class="text-start">Description</th>
                                <th scope="col" class="text-start">Status</th>
                                <th scope="col" class="text-start">Date Registered</th>
                                <th scope="col" class="text-start">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subjects as $subject)
                                <tr class="border-b border-defaultborder hover:bg-gray-100 dark:hover:bg-black/20">
                                    <td>{{ $subject->curiculum }}</td>
                                    <td class="font-semibold text-defaulttextcolor">{{ $subject->name }}</td>
                                    <td>
                                        <span class="badge bg-light text-defaulttextcolor border border-defaultborder dark:border-defaultborder/10">{{ $subject->code }}</span>
                                    </td>
                                    <td class="text-textmuted text-sm max-w-xs truncate">{{ $subject->description ?? '—' }}</td>
                                    <td>
                                        @if ($subject->is_active)
                                            <span class="badge bg-success/10 text-success">Active</span>
                                        @else
                                            <span class="badge bg-danger/10 text-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $subject->created_at ? $subject->created_at->format('M d, Y H:i') : 'N/A' }}</td>
                                    <td>
                                        <div class="hstack gap-2 flex-wrap">
                                            <a href="{{ route('subjects.edit', $subject->id) }}" aria-label="anchor" class="text-info text-[.875rem] leading-none">
                                                <i class="ri-edit-line"></i>
                                            </a>
                                            <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this subject?');" class="inline-block mb-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" aria-label="anchor" class="text-danger text-[.875rem] leading-none bg-transparent border-0 p-0 cursor-pointer">
                                                    <i class="ri-delete-bin-5-line"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-textmuted py-6">No subjects found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
