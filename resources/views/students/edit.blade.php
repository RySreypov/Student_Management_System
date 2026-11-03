
@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')

<style>
    .student-edit {
        color: #e5e7eb;
        padding: 28px;
        min-height: calc(100vh - 60px);
    }

    /* Header */
    .edit-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 28px;
    }

    .edit-label {
        color: #818cf8;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .edit-title {
        color: #fff;
        font-size: 27px;
        font-weight: 750;
        margin: 0;
    }

    .edit-subtitle {
        color: #9299b2;
        font-size: 13px;
        margin-top: 7px;
    }

    .edit-back {
        background: #171d36;
        border: 1px solid #303957;
        color: #a5b4fc;
        padding: 10px 15px;
        border-radius: 9px;
        text-decoration: none;
        font-size: 13px;
        white-space: nowrap;
        transition: .2s;
    }

    .edit-back:hover {
        background: #252d50;
        color: #fff;
    }

    /* Main Form Card */
    .edit-card {
        background: #11162a;
        border: 1px solid #242b45;
        border-radius: 16px;
        overflow: hidden;
        max-width: 950px;
        margin: 0 auto;
    }

    .edit-card-header {
        background: linear-gradient(110deg, #312e81, #4338ca, #0369a1);
        padding: 25px 28px;
    }

    .edit-card-header h4 {
        color: #fff;
        font-size: 19px;
        font-weight: 700;
        margin: 0 0 7px;
    }

    .edit-card-header p {
        color: #dbeafe;
        font-size: 12px;
        margin: 0;
    }

    .edit-card-body {
        padding: 28px;
    }

    /* Form Sections */
    .edit-section {
        margin-bottom: 28px;
    }

    .edit-section:last-of-type {
        margin-bottom: 20px;
    }

    .edit-section-heading {
        display: flex;
        align-items: center;
        gap: 10px;
        padding-bottom: 13px;
        margin-bottom: 20px;
        border-bottom: 1px solid #28304a;
    }

    .edit-section-icon {
        width: 34px;
        height: 34px;
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(99,102,241,.15);
        color: #818cf8;
        font-size: 15px;
    }

    .edit-section-heading h5 {
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        margin: 0;
    }

    .edit-section-heading p {
        color: #77819d;
        font-size: 11px;
        margin: 3px 0 0;
    }

    /* Form Fields */
    .student-edit .form-label {
        color: #b8bfd4;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .student-edit .form-control,
    .student-edit .form-select {
        background-color: #0b1020 !important;
        border: 1px solid #2b3350 !important;
        border-radius: 9px;
        color: #e5e7eb !important;
        padding: 11px 13px;
        font-size: 13px;
        box-shadow: none !important;
    }

    .student-edit .form-control:focus,
    .student-edit .form-select:focus {
        border-color: #6366f1 !important;
        box-shadow: 0 0 0 3px rgba(99,102,241,.12) !important;
    }

    .student-edit .form-control::placeholder {
        color: #68718d;
    }

    .student-edit .form-select option {
        background: #11162a;
        color: #fff;
    }

    .student-edit textarea.form-control {
        min-height: 110px;
        resize: vertical;
    }

    .student-edit .form-text {
        color: #77819d;
        font-size: 11px;
    }

    .student-edit .text-danger {
        font-size: 11px;
    }

    /* Buttons */
    .edit-actions {
        display: flex;
        gap: 12px;
        padding-top: 22px;
        border-top: 1px solid #28304a;
    }

    .edit-save-btn {
        flex: 1;
        background: linear-gradient(135deg, #6366f1, #3b82f6);
        border: none;
        color: #fff;
        padding: 12px 18px;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 700;
        transition: .2s;
    }

    .edit-save-btn:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(99,102,241,.25);
    }

    .edit-cancel-btn {
        flex: 1;
        background: #252b43;
        border: 1px solid #39415e;
        color: #cbd5e1;
        padding: 12px 18px;
        border-radius: 9px;
        text-align: center;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: .2s;
    }

    .edit-cancel-btn:hover {
        background: #343c5b;
        color: #fff;
    }

    @media(max-width: 768px) {
        .student-edit {
            padding: 16px;
        }

        .edit-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .edit-card-body {
            padding: 20px;
        }

        .edit-card-header {
            padding: 20px;
        }
    }

    @media(max-width: 480px) {
        .edit-actions {
            flex-direction: column;
        }

        .edit-title {
            font-size: 23px;
        }
    }
</style>

<div class="student-edit">

    {{-- PAGE HEADER --}}
    <div class="edit-header">

        <div>
            <div class="edit-label">Academic Management</div>

            <h2 class="edit-title">
                Edit Student
            </h2>

            <p class="edit-subtitle">
                Update student information and academic records.
            </p>
        </div>

        <a href="{{ route('students.show', $student) }}" class="edit-back">
            <i class="bi bi-arrow-left me-2"></i>
            Back to Profile
        </a>

    </div>

    {{-- EDIT FORM CARD --}}
    <div class="edit-card">

        <div class="edit-card-header">
            <h4>
                <i class="bi bi-pencil-square me-2"></i>
                Update Student Information
            </h4>

            <p>
                Editing {{ $student->student_name }}
                &nbsp;·&nbsp;
                Student #{{ $student->student_id }}
            </p>
        </div>

        <div class="edit-card-body">

            <form method="POST"
                  action="{{ route('students.update', $student) }}">

                @csrf
                @method('PUT')

                {{-- EXISTING STUDENT FORM FIELDS --}}
                @include('students._form')

                {{-- FORM BUTTONS --}}
                <div class="edit-actions">

                    <button type="submit" class="edit-save-btn">
                        <i class="bi bi-check-circle me-2"></i>
                        Save Changes
                    </button>

                    <a href="{{ route('students.show', $student) }}"
                       class="edit-cancel-btn">
                        <i class="bi bi-x-circle me-2"></i>
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
