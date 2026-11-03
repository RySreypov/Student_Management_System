
@php($st = $student ?? null)

<style>
    .student-form-fields {
        color: #e5e7eb;
    }

    .student-form-fields .form-section {
        margin-bottom: 28px;
    }

    .student-form-fields .form-section:last-child {
        margin-bottom: 20px;
    }

    .student-form-fields .section-heading {
        display: flex;
        align-items: center;
        gap: 12px;
        padding-bottom: 14px;
        margin-bottom: 20px;
        border-bottom: 1px solid #28304a;
    }

    .student-form-fields .section-icon {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: rgba(99,102,241,.15);
        color: #818cf8;
        font-size: 16px;
        flex-shrink: 0;
    }

    .student-form-fields .section-heading h6 {
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        margin: 0;
    }

    .student-form-fields .section-heading p {
        color: #77819d;
        font-size: 11px;
        margin: 4px 0 0;
    }

    .student-form-fields .form-label {
        color: #b8bfd4;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .student-form-fields .required-mark {
        color: #fb7185;
        margin-left: 3px;
    }

    .student-form-fields .form-control,
    .student-form-fields .form-select {
        background-color: #0b1020 !important;
        border: 1px solid #2b3350 !important;
        border-radius: 9px;
        color: #e5e7eb !important;
        padding: 11px 13px;
        font-size: 13px;
        box-shadow: none !important;
    }

    .student-form-fields .form-control:focus,
    .student-form-fields .form-select:focus {
        border-color: #6366f1 !important;
        box-shadow: 0 0 0 3px rgba(99,102,241,.12) !important;
    }

    .student-form-fields .form-control::placeholder {
        color: #68718d;
    }

    .student-form-fields .form-select option {
        background: #11162a;
        color: #fff;
    }

    .student-form-fields input[type="date"] {
        color-scheme: dark;
    }

    .student-form-fields textarea {
        min-height: 120px;
        resize: vertical;
    }

    .student-form-fields .form-text {
        color: #77819d;
        font-size: 11px;
        margin-top: 7px;
    }

    .student-form-fields .invalid-feedback {
        font-size: 11px;
    }

    .student-form-fields .form-control.is-invalid,
    .student-form-fields .form-select.is-invalid {
        border-color: #fb7185 !important;
    }
</style>

<div class="student-form-fields">

    {{-- PERSONAL INFORMATION --}}
    <div class="form-section">

        <div class="section-heading">
            <div class="section-icon">
                <i class="bi bi-person-circle"></i>
            </div>

            <div>
                <h6>Personal Information</h6>
                <p>Enter the student's basic personal details.</p>
            </div>
        </div>

        <div class="row">

            {{-- STUDENT NAME --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Student Name <span class="required-mark">*</span>
                </label>

                <input
                    type="text"
                    name="student_name"
                    class="form-control @error('student_name') is-invalid @enderror"
                    value="{{ old('student_name', $st?->student_name) }}"
                    placeholder="Enter student name"
                    required
                >

                @error('student_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            {{-- EMAIL --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Email Address <span class="required-mark">*</span>
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $st?->email) }}"
                    placeholder="example@gmail.com"
                    required
                >

                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            {{-- GENDER --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Gender <span class="required-mark">*</span>
                </label>

                <select
                    name="gender"
                    class="form-select @error('gender') is-invalid @enderror"
                    required
                >
                    <option value="">Select gender</option>

                    @foreach (['Male', 'Female', 'Other'] as $g)
                        <option
                            value="{{ $g }}"
                            @selected(old('gender', $st?->gender) === $g)
                        >
                            {{ $g }}
                        </option>
                    @endforeach

                </select>

                @error('gender')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            {{-- DATE OF BIRTH --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Date of Birth
                </label>

                <input
                    type="date"
                    name="dob"
                    class="form-control @error('dob') is-invalid @enderror"
                    value="{{ old('dob', $st?->dob?->format('Y-m-d')) }}"
                >

                @error('dob')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

        </div>

    </div>


    {{-- ACADEMIC INFORMATION --}}
    <div class="form-section">

        <div class="section-heading">
            <div class="section-icon">
                <i class="bi bi-mortarboard-fill"></i>
            </div>

            <div>
                <h6>Academic Information</h6>
                <p>Provide enrollment and department information.</p>
            </div>
        </div>

        <div class="row">

            {{-- ENROLLMENT DATE --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Enrollment Date <span class="required-mark">*</span>
                </label>

                <input
                    type="date"
                    name="enrollment_date"
                    class="form-control @error('enrollment_date') is-invalid @enderror"
                    value="{{ old('enrollment_date', $st?->enrollment_date?->format('Y-m-d')) }}"
                    required
                >

                @error('enrollment_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            {{-- YEARS ENROLLED --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Years Enrolled
                </label>

                <input
                    type="number"
                    min="0"
                    max="20"
                    name="enrollment"
                    class="form-control @error('enrollment') is-invalid @enderror"
                    value="{{ old('enrollment', $st?->enrollment) }}"
                    placeholder="Enter years enrolled"
                >

                @error('enrollment')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            {{-- DEPARTMENT --}}
            <div class="col-12 mb-3">

                <label class="form-label">
                    Department <span class="required-mark">*</span>
                </label>

                <select
                    name="dept_id"
                    class="form-select @error('dept_id') is-invalid @enderror"
                    required
                >

                    <option value="">Select department</option>

                    @foreach ($departments as $d)
                        <option
                            value="{{ $d->dept_id }}"
                            @selected(old('dept_id', $st?->dept_id) == $d->dept_id)
                        >
                            {{ $d->dept_name }}
                        </option>
                    @endforeach

                </select>

                @error('dept_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

        </div>

    </div>


    {{-- ADDITIONAL INFORMATION --}}
    <div class="form-section">

        <div class="section-heading">
            <div class="section-icon">
                <i class="bi bi-file-earmark-text"></i>
            </div>

            <div>
                <h6>Additional Information</h6>
                <p>Add any extra details about the student.</p>
            </div>
        </div>

        <div class="mb-3">

            <label class="form-label">
                Student Description
            </label>

            <textarea
                name="description"
                rows="4"
                class="form-control @error('description') is-invalid @enderror"
                placeholder="Write additional information about this student..."
            >{{ old('description', $st?->description) }}</textarea>

            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <div class="form-text">
                <i class="bi bi-info-circle me-1"></i>
                This field is optional.
            </div>

        </div>

    </div>

</div>
