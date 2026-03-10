@extends('layouts.master')

@section('title') Edit Subject @endsection

@section('contents')

    <div class="md:flex block items-center justify-between mb-6 mt-[2rem] page-header-breadcrumb">
        <div class="my-auto">
            <h5 class="page-title text-[1.3125rem] font-medium text-defaulttextcolor mb-0">Edit Subject</h5>
            <nav>
                <ol class="flex items-center whitespace-nowrap min-w-0">
                    <li class="text-[12px]">
                        <a class="flex items-center text-primary hover:text-primary" href="{{ route('dashboard') }}">
                            Dashboard
                            <i class="ti ti-chevrons-right flex-shrink-0 mx-3 overflow-visible text-textmuted rtl:rotate-180"></i>
                        </a>
                    </li>
                    <li class="text-[12px]">
                        <a class="flex items-center text-textmuted" href="{{ route('subjects.index') }}">
                            Subjects
                            <i class="ti ti-chevrons-right flex-shrink-0 mx-3 overflow-visible text-textmuted rtl:rotate-180"></i>
                        </a>
                    </li>
                    <li class="text-[12px]">
                        <a class="flex items-center text-textmuted" href="javascript:void(0);">
                            Edit Subject
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
                        Subject Information
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

                <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="box-body">
                        <div class="grid grid-cols-12 gap-4">

                            <div class="xl:col-span-4 md:col-span-6 col-span-12">
                                <label for="input-curiculum" class="form-label mb-2">Curriculum</label>
                                <input type="text" class="form-control" id="input-curiculum" name="curiculum"
                                    placeholder="e.g. BSCS, BSIT, GEN"
                                    value="{{ old('curiculum', $subject->curiculum) }}" required>
                            </div>

                            <div class="xl:col-span-4 md:col-span-6 col-span-12">
                                <label for="input-name" class="form-label mb-2">Subject Name</label>
                                <input type="text" class="form-control" id="input-name" name="name"
                                    placeholder="Enter subject name"
                                    value="{{ old('name', $subject->name) }}" required>
                            </div>

                            <div class="xl:col-span-4 md:col-span-6 col-span-12">
                                <label for="input-code" class="form-label mb-2">Subject Code</label>
                                <input type="text" class="form-control" id="input-code" name="code"
                                    placeholder="e.g. CS201"
                                    value="{{ old('code', $subject->code) }}" required>
                            </div>

                            <div class="xl:col-span-8 md:col-span-12 col-span-12">
                                <label for="input-description" class="form-label mb-2">Description</label>
                                <textarea class="form-control" id="input-description" name="description"
                                    rows="3" placeholder="Enter subject description">{{ old('description', $subject->description) }}</textarea>
                            </div>

                            <div class="xl:col-span-4 md:col-span-6 col-span-12 flex items-center">
                                <div class="flex items-center gap-3 mt-6">
                                    <input type="checkbox" id="input-is-active" name="is_active" value="1"
                                        class="ti-form-checkbox h-4 w-4"
                                        {{ old('is_active', $subject->is_active) ? 'checked' : '' }}>
                                    <label for="input-is-active" class="form-label mb-0 cursor-pointer">
                                        Active Subject
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="box-footer">
                        <div class="flex items-center justify-start gap-3">
                            <div class="flex justify-start">
                                <button type="submit" class="ti-btn ti-btn-primary ti-btn-wave">
                                    Update Subject
                                </button>
                            </div>
                            <a href="{{ route('subjects.index') }}" class="ti-btn ti-btn-secondary ti-btn-wave">
                                Cancel
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
