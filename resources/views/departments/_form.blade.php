
@php($dp = $department ?? null)

<div class="department-form-fields">

    <!-- Department Name -->
    <div class="mb-4">
        <label class="form-label">
            <i class="bi bi-building me-2"></i>
            Department Name
            <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="dept_name"
            class="form-control @error('dept_name') is-invalid @enderror"
            placeholder="Enter department name"
            value="{{ old('dept_name', $dp?->dept_name) }}"
            required
        >

        @error('dept_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Manager and Location -->
    <div class="row">

        <div class="col-md-6 mb-4">
            <label class="form-label">
                <i class="bi bi-person-badge me-2"></i>
                Manager ID
            </label>

            <input
                type="number"
                name="manager_id"
                class="form-control @error('manager_id') is-invalid @enderror"
                placeholder="Enter manager ID"
                value="{{ old('manager_id', $dp?->manager_id) }}"
            >

            @error('manager_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-4">
            <label class="form-label">
                <i class="bi bi-geo-alt me-2"></i>
                Location ID
            </label>

            <input
                type="number"
                name="location_id"
                class="form-control @error('location_id') is-invalid @enderror"
                placeholder="Enter location ID"
                value="{{ old('location_id', $dp?->location_id) }}"
            >

            @error('location_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

    </div>

</div>

<style>
.department-form-fields {
    color: #f8fafc;
}

.department-form-fields .form-label {
    display: block;
    color: #cbd5e1;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 10px;
}

.department-form-fields .form-label i {
    color: #818cf8;
}

.department-form-fields .form-control {
    width: 100%;
    min-height: 47px;
    padding: 11px 14px;
    background: #0b1020;
    border: 1px solid #303954;
    border-radius: 10px;
    color: #f8fafc;
    font-size: 14px;
    transition: all .2s ease;
}

.department-form-fields .form-control::placeholder {
    color: #64748b;
}

.department-form-fields .form-control:focus {
    background: #0b1020;
    border-color: #818cf8;
    color: #ffffff;
    box-shadow: 0 0 0 3px rgba(99,102,241,.15);
}

.department-form-fields .form-control.is-invalid {
    border-color: #ef4444;
}

.department-form-fields .invalid-feedback {
    font-size: 12px;
    margin-top: 6px;
}

.department-form-fields .text-danger {
    color: #f87171 !important;
}
</style>
