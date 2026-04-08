@extends('layouts.master')

@section('title') Enrollment Management @endsection

@section('contents')
    <div class="md:flex block items-center justify-between mb-6 mt-[2rem] page-header-breadcrumb">
        <div class="my-auto">
            <h5 class="page-title text-[1.3125rem] font-medium text-defaulttextcolor mb-0">Enrollment Management</h5>
            <nav>
                <ol class="flex items-center whitespace-nowrap min-w-0">
                    <li class="text-[12px]">
                        <a class="flex items-center text-primary hover:text-primary" href="{{ route('dashboard') }}">
                            Dashboard
                            <i class="ti ti-chevrons-right flex-shrink-0 mx-3 overflow-visible text-textmuted rtl:rotate-180"></i>
                        </a>
                    </li>
                    <li class="text-[12px]">
                        <a class="flex items-center text-textmuted" href="javascript:void(0);">Enrollments</a>
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
                    <div class="box-title">All Enrollments</div>
                    <div class="prism-toggle">
                        <a href="{{ route('enrollments.create') }}" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">
                            New Enrollment <i class="ri-add-circle-line align-middle ms-1"></i>
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table whitespace-nowrap table-bordered min-w-full">
                        <thead>
                            <tr class="border-b border-defaultborder">
                                <th scope="col" class="text-start">#</th>
                                <th scope="col" class="text-start">Student</th>
                                <th scope="col" class="text-start">Subject</th>
                                <th scope="col" class="text-start">Status</th>
                                <th scope="col" class="text-start">Enrolled By</th>
                                <th scope="col" class="text-start">Date Enrolled</th>
                                <th scope="col" class="text-start">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($enrollments as $enrollment)
                                <tr class="border-b border-defaultborder hover:bg-gray-100 dark:hover:bg-black/20">
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="font-semibold text-defaulttextcolor">
                                        {{ $enrollment->user->name ?? '—' }}
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-defaulttextcolor border border-defaultborder dark:border-defaultborder/10">
                                            {{ $enrollment->subject->name ?? '—' }}
                                        </span>
                                    </td>
                                    <td>
                                        @php $status = strtolower($enrollment->Enrollment_status); @endphp
                                        @if ($status === 'enrolled')
                                            <span class="badge bg-success/10 text-success">Enrolled</span>
                                        @elseif ($status === 'pending')
                                            <span class="badge bg-warning/10 text-warning">Pending</span>
                                        @else
                                            <span class="badge bg-danger/10 text-danger">Dropped</span>
                                        @endif
                                    </td>
                                    <td class="text-textmuted text-sm">
                                        {{ $enrollment->enrolledBy->name ?? '—' }}
                                    </td>
                                    <td class="text-textmuted text-sm">
                                        {{ $enrollment->created_at ? $enrollment->created_at->format('M d, Y') : '—' }}
                                    </td>
                                    <td>
                                        <div class="hstack gap-2 flex-wrap">
                                            <a href="{{ route('enrollments.edit', $enrollment->id) }}" aria-label="anchor" class="text-info text-[.875rem] leading-none">
                                                <i class="ri-edit-line"></i>
                                            </a>
                                            <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this enrollment?');" class="inline-block mb-0">
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
                                    <td colspan="7" class="text-center text-textmuted py-6">No enrollments found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection