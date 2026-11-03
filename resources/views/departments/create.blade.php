
@extends('layouts.app')

@section('title', 'Add Department')

@section('content')

<div class="department-create">

    <!-- Page Header -->
    <div class="page-header mb-4">
        <div>
            <div class="page-label">
                <i class="bi bi-grid-fill"></i> DEPARTMENT MANAGEMENT
            </div>
            <h2 class="fw-bold mb-2">Add New Department</h2>
            <p class="text-secondary mb-0">
                Create a new department and organize your academic structure.
            </p>
        </div>

        <a href="{{ route('departments.index') }}" class="btn btn-outline-light back-btn">
            <i class="bi bi-arrow-left me-2"></i> Back to Departments
        </a>
    </div>

    <!-- Create Form Card -->
    <div class="create-card">

        <div class="card-header-custom">
            <div class="header-icon">
                <i class="bi bi-building-add"></i>
            </div>

            <div>
                <h5 class="fw-bold mb-1">Department Information</h5>
                <p class="mb-0">Enter the details for your new department.</p>
            </div>
        </div>

        <form method="POST" action="{{ route('departments.store') }}">
            @csrf

            <div class="form-content">
                @include('departments._form')

                <div class="form-actions">
                    <button type="submit" class="btn btn-save">
                        <i class="bi bi-check-circle me-2"></i>
                        Save Department
                    </button>

                    <a href="{{ route('departments.index') }}" class="btn btn-cancel">
                        <i class="bi bi-x-circle me-2"></i>
                        Cancel
                    </a>
                </div>
            </div>
        </form>

    </div>

</div>

<style>
.department-create {
    color: #f8fafc;
    padding: 10px 5px 35px;
}

/* Page Header */
.department-create .page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.department-create .page-label {
    color: #818cf8;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2px;
    margin-bottom: 10px;
}

.department-create .page-header h2 {
    color: #ffffff;
    font-size: 27px;
}

.department-create .page-header p {
    font-size: 14px;
}

.department-create .back-btn {
    border-color: #343b55;
    color: #cbd5e1;
    border-radius: 10px;
    padding: 10px 16px;
    font-size: 13px;
    transition: .2s;
}

.department-create .back-btn:hover {
    background: #252d48;
    border-color: #6366f1;
    color: white;
}

/* Main Card */
.department-create .create-card {
    max-width: 850px;
    margin: 0 auto;
    background: #11162a;
    border: 1px solid #252c46;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 15px 40px rgba(0,0,0,.2);
}

/* Card Header */
.department-create .card-header-custom {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 25px 30px;
    background: linear-gradient(120deg, #252b65, #4338a8, #2563a6);
    border-bottom: 1px solid rgba(255,255,255,.1);
}

.department-create .header-icon {
    width: 52px;
    height: 52px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 14px;
    background: rgba(255,255,255,.15);
    color: white;
    font-size: 25px;
}

.department-create .card-header-custom h5 {
    color: white;
    font-size: 17px;
}

.department-create .card-header-custom p {
    color: #dbeafe;
    font-size: 13px;
}

/* Form Content */
.department-create .form-content {
    padding: 30px;
}

/* Form Buttons */
.department-create .form-actions {
    display: flex;
    gap: 12px;
    margin-top: 28px;
    padding-top: 22px;
    border-top: 1px solid #252c46;
}

.department-create .btn-save {
    flex: 1;
    padding: 12px 20px;
    border: none;
    border-radius: 10px;
    color: white;
    font-size: 14px;
    font-weight: 700;
    background: linear-gradient(120deg, #6366f1, #3b82f6);
    transition: .2s;
}

.department-create .btn-save:hover {
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 7px 20px rgba(99,102,241,.3);
}

.department-create .btn-cancel {
    flex: 1;
    padding: 12px 20px;
    border: 1px solid #343b55;
    border-radius: 10px;
    color: #cbd5e1;
    font-size: 14px;
    font-weight: 600;
    background: #1a2036;
    transition: .2s;
}

.department-create .btn-cancel:hover {
    background: #252d48;
    color: white;
}

/* Responsive */
@media (max-width: 576px) {
    .department-create .form-content {
        padding: 20px;
    }

    .department-create .card-header-custom {
        padding: 20px;
    }

    .department-create .form-actions {
        flex-direction: column;
    }

    .department-create .page-header h2 {
        font-size: 23px;
    }
}
</style>

@endsection
