<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEnrollmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id'           => ['required', 'exists:users,id'],
            'subject_id'        => ['required', 'exists:subjects,id'],
            'Enrollment_status' => ['required', 'in:enrolled,pending,dropped'],
            'enrolled_at'       => ['nullable', 'date'],
            'enrolled_by'       => ['nullable', 'exists:users,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required'           => 'Please select a student.',
            'user_id.exists'             => 'The selected student does not exist.',
            'subject_id.required'        => 'Please select a subject.',
            'subject_id.exists'          => 'The selected subject does not exist.',
            'Enrollment_status.required' => 'Status is required.',
            'Enrollment_status.in'       => 'Status must be enrolled, pending, or dropped.',
        ];
    }
}
