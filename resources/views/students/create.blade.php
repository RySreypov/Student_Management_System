
@extends('layouts.app')

@section('title', 'Student Registration')

@section('content')

<style>
    .student-create {
        color: #e5e7eb;
        padding: 28px;
        min-height: calc(100vh - 60px);
    }

    /* Header */
    .create-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 28px;
    }

    .create-label {
        color: #818cf8;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .create-title {
        color: #fff;
        font-size: 27px;
        font-weight: 750;
        margin: 0;
    }

    .create-subtitle {
        color: #9299b2;
        font-size: 13px;
        margin-top: 7px;
    }

    .create-back {
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

    .create-back:hover {
        background: #252d50;
        color: #fff;
    }

    /* Registration Card */
    .create-card {
        background: #11162a;
        border: 1px solid #242b45;
        border-radius: 16px;
        overflow: hidden;
        max-width: 950px;
        margin: 0 auto;
    }

    .create-card-header {
        background: linear-gradient(110deg, #312e81, #4338ca, #0369a1);
        padding: 27px 28px;
    }

    .create-header-icon {
        width: 43px;
        height: 43px;
        background: rgba(255,255,255,.15);
        border: 1px solid rgba(255,255,255,.2);
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 20px;
        margin-bottom: 13px;
    }

    .create-card-header h4 {
        color: #fff;
        font-size: 19px;
        font-weight: 700;
        margin: 0 0 7px;
    }

    .create-card-header p {
        color: #dbeafe;
        font-size: 12px;
        margin: 0;
    }

    .create-card-body {
        padding: 28px;
    }

    /* Form Sections */
    .create-section {
        margin-bottom: 28px;
    }

    .create-section-heading {
        display: flex;
        align-items: center;
        gap: 10px;
        padding-bottom: 13px;
        margin-bottom: 20px;
        border-bottom: 1px solid #28304a;
    }

    .create-section-icon {
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

    .create-section-heading h5 {
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        margin: 0;
    }

    .create-section-heading p {
        color: #77819d;
        font-size: 11px;
        margin: 3px 0 0;
    }

    /* Form Fields */
    .student-create .form-label {
        color: #b8bfd4;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .student-create .form-control,
    .student-create .form-select {
        background-color: #0b1020 !important;
        border: 1px solid #2b3350 !important;
        border-radius: 9px;
        color: #e5e7eb !important;
        padding: 11px 13px;
        font-size: 13px;
        box-shadow: none !important;
    }

    .student-create .form-control:focus,
    .student-create .form-select:focus {
        border-color: #6366f1 !important;
        box-shadow: 0 0 0 3px rgba(99,102,241,.12) !important;
    }

    .student-create .form-control::placeholder {
        color: #68718d;
    }

    .student-create .form-select option {
        background: #11162a;
        color: #fff;
    }

    .student-create textarea.form-control {
        min-height: 110px;
        resize: vertical;
    }

    .student-create .form-text {
        color: #77819d;
        font-size: 11px;
    }

    .student-create .text-danger {
        font-size: 11px;
    }

    /* Buttons */
    .create-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        padding-top: 22px;
        border-top: 1px solid #28304a;
    }

    .create-submit-btn,
    .create-reset-btn,
    .create-list-btn {
        flex: 1;
        min-width: 150px;
        padding: 12px 15px;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 700;
        text-align: center;
        transition: .2s;
    }

    .create-submit-btn {
        background: linear-gradient(135deg, #6366f1, #3b82f6);
        border: none;
        color: #fff;
    }

    .create-submit-btn:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(99,102,241,.25);
    }

    .create-reset-btn {
        background: #252b43;
        border: 1px solid #39415e;
        color: #cbd5e1;
    }

    .create-reset-btn:hover {
        background: #343c5b;
        color: #fff;
    }

    .create-list-btn {
        background: rgba(14,165,233,.12);
        border: 1px solid rgba(14,165,233,.3);
        color: #38bdf8;
        text-decoration: none;
    }

    .create-list-btn:hover {
        background: rgba(14,165,233,.2);
        color: #7dd3fc;
    }

    @media(max-width: 768px) {
        .student-create {
            padding: 16px;
        }

        .create-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .create-card-body {
            padding: 20px;
        }

        .create-card-header {
            padding: 22px;
        }
    }

    @media(max-width: 480px) {
        .create-actions {
            flex-direction: column;
        }

        .create-title {
            font-size: 23px;
        }
    }
</style>

<div class="student-create">

    {{-- PAGE HEADER --}}
    <div class="create-header">

        <div>
            <div class="create-label">Academic Management</div>

            <h2 class="create-title">
                Student Registration
            </h2>

            <p class="create-subtitle">
                Add a new student to your academic management system.
            </p>
        </div>

        <a href="{{ route('students.index') }}" class="create-back">
            <i class="bi bi-arrow-left me-2"></i>
            Back to Students
        </a>

    </div>

    {{-- REGISTRATION CARD --}}
    <div class="create-card">

        <div class="create-card-header">

            <div class="create-header-icon">
                <i class="bi bi-mortarboard-fill"></i>
            </div>

            <h4>New Student Information</h4>

            <p>
                Please complete the information below to register a new student.
            </p>

        </div>

        <div class="create-card-body">

            <form method="POST" action="{{ route('students.store') }}">

                @csrf

                {{-- EXISTING FORM FIELDS --}}
                @include('students._form')

                {{-- ACTION BUTTONS --}}
                <div class="create-actions">

                    <button type="submit" class="create-submit-btn">
                        <i class="bi bi-person-plus-fill me-2"></i>
                        Submit Registration
                    </button>

                    <button type="reset" class="create-reset-btn">
                        <i class="bi bi-arrow-counterclockwise me-2"></i>
                        Reset Form
                    </button>

                    <a href="{{ route('students.index') }}" class="create-list-btn">
                        <i class="bi bi-list-ul me-2"></i>
                        Student List
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
