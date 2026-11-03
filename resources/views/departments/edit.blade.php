
@extends('layouts.app')

@section('title', 'Edit Department')

@section('content')

<style>
    .department-edit {
        padding: 28px;
        color: #e5e7eb;
        min-height: calc(100vh - 60px);
    }

    /* Page Header */
    .dept-edit-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 28px;
    }

    .dept-edit-label {
        color: #818cf8;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .dept-edit-title {
        color: #fff;
        font-size: 27px;
        font-weight: 750;
        margin: 0;
    }

    .dept-edit-subtitle {
        color: #9299b2;
        font-size: 13px;
        margin-top: 7px;
    }

    .dept-back-btn {
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

    .dept-back-btn:hover {
        background: #252d50;
        color: #fff;
    }

    /* Form Card */
    .dept-edit-card {
        max-width: 850px;
        margin: 0 auto;
        background: #11162a;
        border: 1px solid #242b45;
        border-radius: 16px;
        overflow: hidden;
    }

    .dept-edit-card-header {
        background: linear-gradient(110deg, #312e81, #4338ca, #0369a1);
        padding: 27px 28px;
    }

    .dept-edit-icon {
        width: 43px;
        height: 43px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 11px;
        background: rgba(255,255,255,.15);
        border: 1px solid rgba(255,255,255,.2);
        color: #fff;
        font-size: 20px;
        margin-bottom: 13px;
    }

    .dept-edit-card-header h4 {
        color: #fff;
        font-size: 19px;
        font-weight: 700;
        margin: 0 0 7px;
    }

    .dept-edit-card-header p {
        color: #dbeafe;
        font-size: 12px;
        margin: 0;
    }

    .dept-edit-card-body {
        padding: 28px;
    }

    /* Form Fields */
    .department-edit .form-label {
        color: #b8bfd4;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .department-edit .form-control,
    .department-edit .form-select {
        background-color: #0b1020 !important;
        border: 1px solid #2b3350 !important;
        border-radius: 9px;
        color: #e5e7eb !important;
        padding: 11px 13px;
        font-size: 13px;
        box-shadow: none !important;
    }

    .department-edit .form-control:focus,
    .department-edit .form-select:focus {
        border-color: #6366f1 !important;
        box-shadow: 0 0 0 3px rgba(99,102,241,.12) !important;
    }

    .department-edit .form-control::placeholder {
        color: #68718d;
    }

    .department-edit .form-select option {
        background: #11162a;
        color: #fff;
    }

    .department-edit .form-text {
        color: #77819d;
        font-size: 11px;
    }

    .department-edit .invalid-feedback {
        font-size: 11px;
    }

    /* Buttons */
    .dept-edit-actions {
        display: flex;
        gap: 12px;
        padding-top: 22px;
        margin-top: 25px;
        border-top: 1px solid #28304a;
    }

    .dept-save-btn,
    .dept-cancel-btn {
        flex: 1;
        padding: 12px 18px;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 700;
        text-align: center;
        transition: .2s;
    }

    .dept-save-btn {
        background: linear-gradient(135deg, #6366f1, #3b82f6);
        border: none;
        color: #fff;
    }

    .dept-save-btn:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(99,102,241,.25);
    }

    .dept-cancel-btn {
        background: #252b43;
        border: 1px solid #39415e;
        color: #cbd5e1;
        text-decoration: none;
    }

    .dept-cancel-btn:hover {
        background: #343c5b;
        color: #fff;
    }

    @media(max-width: 768px) {
        .department-edit {
            padding: 16px;
        }

        .dept-edit-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .dept-edit-card-body {
            padding: 20px;
        }

        .dept-edit-card-header {
            padding: 22px;
        }
    }

    @media(max-width: 480px) {
        .dept-edit-actions {
            flex-direction: column;
        }

        .dept-edit-title {
            font-size: 23px;
        }
    }
</style>


<div class="department-edit">

    {{-- PAGE HEADER --}}
    <div class="dept-edit-header">

        <div>
            <div class="dept-edit-label">Academic Management</div>

            <h2 class="dept-edit-title">
                Edit Department
            </h2>

            <p class="dept-edit-subtitle">
                Update department details and information.
            </p>
        </div>

        <a href="{{ route('departments.index') }}" class="dept-back-btn">
            <i class="bi bi-arrow-left me-2"></i>
            Back to Departments
        </a>

    </div>


    {{-- EDIT CARD --}}
    <div class="dept-edit-card">

        <div class="dept-edit-card-header">

            <div class="dept-edit-icon">
                <i class="bi bi-building"></i>
            </div>

            <h4>Department Information</h4>

            <p>
                Editing Department #{{ $department->dept_id }}
                &nbsp;·&nbsp;
                {{ $department->dept_name }}
            </p>

        </div>


        <div class="dept-edit-card-body">

            <form method="POST"
                  action="{{ route('departments.update', $department) }}">

                @csrf
                @method('PUT')

                {{-- EXISTING DEPARTMENT FORM FIELDS --}}
                @include('departments._form')

                {{-- ACTION BUTTONS --}}
                <div class="dept-edit-actions">

                    <button type="submit" class="dept-save-btn">
                        <i class="bi bi-check-circle me-2"></i>
                        Save Changes
                    </button>

                    <a href="{{ route('departments.index') }}"
                       class="dept-cancel-btn">
                        <i class="bi bi-x-circle me-2"></i>
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
