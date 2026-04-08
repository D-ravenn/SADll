@extends('layouts.master')

@section('title') New Enrollment @endsection

@section('contents')
    <div class="md:flex block items-center justify-between mb-6 mt-[2rem] page-header-breadcrumb">
        <div class="my-auto">
            <h5 class="page-title text-[1.3125rem] font-medium text-defaulttextcolor mb-0">New Enrollment</h5>
            <nav>
                <ol class="flex items-center whitespace-nowrap min-w-0">
                    <li class="text-[12px]">
                        <a class="flex items-center text-primary hover:text-primary" href="{{ route('dashboard') }}">
                            Dashboard
                            <i class="ti ti-chevrons-right flex-shrink-0 mx-3 overflow-visible text-textmuted rtl:rotate-180"></i>
                        </a>
                    </li>
                    <li class="text-[12px]">
                        <a class="flex items-center text-primary hover:text-primary" href="{{ route('enrollments.index') }}">
                            Enrollments
                            <i class="ti ti-chevrons-right flex-shrink-0 mx-3 overflow-visible text-textmuted rtl:rotate-180"></i>
                        </a>
                    </li>
                    <li class="text-[12px]">
                        <a class="flex items-center text-textmuted" href="javascript:void(0);">New Enrollment</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6">
        <div class="xl:col-span-8 col-span-12 xl:col-start-3">
            <div class="box custom-box">
                <div class="box-header">
                    <div class="box-title">Enrollment Details</div>
                </div>
                <div class="box-body">
                    <form action="{{ route('enrollments.store') }}" method="POST">
                        @csrf

                        {{-- Student --}}
                        <div class="mb-4">
                            <label for="user_id" class="form-label">Student <span class="text-danger">*</span></label>
                            <select id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                <option value="">— Select Student —</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Subject --}}
                        <div class="mb-4">
                            <label for="subject_id" class="form-label">Subject <span class="text-danger">*</span></label>
                            <select id="subject_id" name="subject_id" class="form-control @error('subject_id') is-invalid @enderror">
                                <option value="">— Select Subject —</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->name }} ({{ $subject->code }})
                                    </option>
                                @endforeach
                            </select>
                            @error('subject_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Status --}}
                        <div class="mb-4">
                            <label for="Enrollment_status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select id="Enrollment_status" name="Enrollment_status" class="form-control @error('Enrollment_status') is-invalid @enderror">
                                <option value="">— Select Status —</option>
                                <option value="enrolled" {{ old('Enrollment_status') === 'enrolled' ? 'selected' : '' }}>Enrolled</option>
                                <option value="pending" {{ old('Enrollment_status') === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="dropped" {{ old('Enrollment_status') === 'dropped' ? 'selected' : '' }}>Dropped</option>
                            </select>
                            @error('Enrollment_status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="flex gap-2 justify-end">
                            <a href="{{ route('enrollments.index') }}" class="ti-btn ti-btn-secondary !py-1 !px-4 !font-medium">
                                Cancel
                            </a>
                            <button type="submit" class="ti-btn ti-btn-primary !py-1 !px-4 !font-medium">
                                Save Enrollment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
