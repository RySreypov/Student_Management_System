@extends('layouts.app')

@section('title', $student->student_name)

@section('content')

    <style>
        .student-show {
            color: #e5e7eb;
            padding: 28px;
            min-height: calc(100vh - 60px);
        }

        .show-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 15px;
        }

        .show-heading {
            color: #fff;
            font-size: 27px;
            font-weight: 750;
            margin: 0;
        }

        .show-subtitle {
            color: #9299b2;
            font-size: 13px;
            margin-top: 7px;
        }

        .show-back {
            color: #a5b4fc;
            background: #171d36;
            border: 1px solid #303957;
            padding: 10px 15px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 13px;
            transition: .2s;
            white-space: nowrap;
        }

        .show-back:hover {
            background: #252d50;
            color: #fff;
        }

        /* Profile Card */
        .profile-card {
            background: #11162a;
            border: 1px solid #242b45;
            border-radius: 16px;
            overflow: hidden;
            margin-bottom: 22px;
        }

        .profile-banner {
            height: 125px;
            background: linear-gradient(120deg, #312e81, #4338ca, #0369a1);
            position: relative;
            z-index: 1;
        }

        .profile-content {
            position: relative;
            z-index: 2;
            margin-top: -42px;
            padding: 0 28px 25px;
            min-height: 115px;

            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .profile-left {
            position: relative;
            z-index: 3;
            display: flex;
            align-items: flex-end;
            gap: 18px;
            margin-top: 0;
        }

        .profile-avatar {
            width: 90px;
            height: 90px;
            border-radius: 20px;
            border: 5px solid #11162a;

            background: linear-gradient(135deg, #818cf8, #0ea5e9);

            display: flex;
            justify-content: center;
            align-items: center;

            color: white;
            font-size: 30px;
            font-weight: 750;
            flex-shrink: 0;
        }

        .profile-name {
            color: #fff;
            font-size: 23px;
            font-weight: 750;
            margin-bottom: 6px;
        }

        .profile-email {
            color: #9299b2;
            font-size: 13px;
        }

        .profile-id {
            color: #a5b4fc;
            background: rgba(99, 102, 241, .14);
            border: 1px solid rgba(99, 102, 241, .2);
            padding: 8px 13px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .show-edit-btn {
            background: linear-gradient(135deg, #6366f1, #3b82f6);
            color: white;
            border: none;
            border-radius: 9px;
            padding: 10px 17px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .show-edit-btn:hover {
            color: white;
            transform: translateY(-2px);
        }

        /* Information Layout */
        .show-grid {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 20px;
        }

        .info-card {
            background: #11162a;
            border: 1px solid #242b45;
            border-radius: 14px;
            overflow: hidden;
        }

        .info-card-header {
            padding: 19px 22px;
            border-bottom: 1px solid #242b45;
        }

        .info-card-title {
            color: #fff;
            font-size: 15px;
            font-weight: 700;
            margin: 0;
        }

        .info-card-subtitle {
            color: #77819d;
            font-size: 11px;
            margin-top: 5px;
        }

        .info-card-body {
            padding: 8px 22px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #222941;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #9299b2;
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .info-label i {
            color: #818cf8;
            font-size: 15px;
            width: 17px;
        }

        .info-value {
            color: #e5e7eb;
            font-size: 13px;
            font-weight: 600;
            text-align: right;
            word-break: break-word;
        }

        .department-tag {
            background: rgba(99, 102, 241, .14);
            color: #a5b4fc;
            padding: 6px 10px;
            border-radius: 7px;
            font-size: 11px;
        }

        /* Description */
        .description-box {
            background: #0b1020;
            border: 1px solid #252d48;
            border-radius: 10px;
            padding: 16px;
            color: #b8bfd4;
            font-size: 13px;
            line-height: 1.7;
            min-height: 90px;
            word-break: break-word;
        }

        /* System Information */
        .system-info {
            margin-top: 20px;
        }

        .system-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            padding: 20px 22px;
        }

        .system-item {
            background: #0b1020;
            border: 1px solid #252d48;
            padding: 14px;
            border-radius: 10px;
        }

        .system-label {
            color: #77819d;
            font-size: 11px;
            margin-bottom: 7px;
        }

        .system-value {
            color: #cbd5e1;
            font-size: 12px;
            font-weight: 600;
        }

        @media(max-width: 768px) {
            .student-show {
                padding: 16px;
            }

            .show-grid {
                grid-template-columns: 1fr;
            }

            .show-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .profile-content {
                padding: 0 18px 20px;
            }

            .profile-left {
                gap: 12px;
            }

            .profile-avatar {
                width: 70px;
                height: 70px;
                font-size: 23px;
            }

            .profile-name {
                font-size: 18px;
            }

            .system-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="student-show">

        {{-- PAGE HEADER --}}
        <div class="show-header">
            <div>
                <h2 class="show-heading">Student Profile</h2>
                <p class="show-subtitle">
                    View and manage detailed student information.
                </p>
            </div>

            <a href="{{ route('students.index') }}" class="show-back">
                <i class="bi bi-arrow-left me-2"></i>
                Back to Students
            </a>
        </div>

        {{-- STUDENT PROFILE --}}
        <div class="profile-card">

            <div class="profile-banner"></div>

            <div class="profile-content">

                <div class="profile-left">

                    <div class="profile-avatar">
                        {{ strtoupper(substr($student->student_name, 0, 1)) }}
                    </div>

                    <div>
                        <div class="profile-name">
                            {{ $student->student_name }}
                        </div>

                        <div class="profile-email">
                            <i class="bi bi-envelope me-1"></i>
                            {{ $student->email }}
                        </div>
                    </div>

                </div>

                <div class="profile-id">
                    <i class="bi bi-person-badge me-1"></i>
                    Student #{{ $student->student_id }}
                </div>

            </div>

        </div>

        {{-- STUDENT INFORMATION --}}
        <div class="show-grid">

            {{-- PERSONAL INFORMATION --}}
            <div class="info-card">

                <div class="info-card-header">
                    <h5 class="info-card-title">
                        <i class="bi bi-person-lines-fill me-2" style="color:#818cf8"></i>
                        Personal Information
                    </h5>
                    <div class="info-card-subtitle">
                        Student's personal details
                    </div>
                </div>

                <div class="info-card-body">

                    <div class="info-row">
                        <div class="info-label">
                            <i class="bi bi-person"></i>
                            Full Name
                        </div>
                        <div class="info-value">
                            {{ $student->student_name }}
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="info-label">
                            <i class="bi bi-envelope"></i>
                            Email Address
                        </div>
                        <div class="info-value">
                            {{ $student->email }}
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="info-label">
                            <i class="bi bi-gender-ambiguous"></i>
                            Gender
                        </div>
                        <div class="info-value">
                            {{ $student->gender }}
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="info-label">
                            <i class="bi bi-calendar-event"></i>
                            Date of Birth
                        </div>
                        <div class="info-value">
                            {{ $student->dob?->format('M d, Y') ?? 'N/A' }}
                        </div>
                    </div>

                </div>

            </div>

            {{-- ACADEMIC INFORMATION --}}
            <div class="info-card">

                <div class="info-card-header">
                    <h5 class="info-card-title">
                        <i class="bi bi-mortarboard me-2" style="color:#818cf8"></i>
                        Academic Information
                    </h5>
                    <div class="info-card-subtitle">
                        Student's academic details
                    </div>
                </div>

                <div class="info-card-body">

                    <div class="info-row">
                        <div class="info-label">
                            <i class="bi bi-building"></i>
                            Department
                        </div>
                        <div class="info-value">
                            <span class="department-tag">
                                {{ $student->department->dept_name ?? 'N/A' }}
                            </span>
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="info-label">
                            <i class="bi bi-calendar-check"></i>
                            Enrollment Date
                        </div>
                        <div class="info-value">
                            {{ $student->enrollment_date?->format('M d, Y') ?? 'N/A' }}
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="info-label">
                            <i class="bi bi-clock-history"></i>
                            Years Enrolled
                        </div>
                        <div class="info-value">
                            {{ $student->enrollment }}
                        </div>
                    </div>

                </div>

            </div>

        </div>

        {{-- DESCRIPTION --}}
        <div class="info-card system-info">

            <div class="info-card-header">
                <h5 class="info-card-title">
                    <i class="bi bi-card-text me-2" style="color:#818cf8"></i>
                    Student Description
                </h5>
                <div class="info-card-subtitle">
                    Additional information about this student
                </div>
            </div>

            <div style="padding: 20px 22px;">
                <div class="description-box">
                    {{ $student->description ?: 'No description available for this student.' }}
                </div>
            </div>

        </div>

        {{-- SYSTEM INFORMATION --}}
        <div class="info-card system-info">

            <div class="info-card-header">
                <h5 class="info-card-title">
                    <i class="bi bi-clock-history me-2" style="color:#818cf8"></i>
                    Record History
                </h5>
                <div class="info-card-subtitle">
                    Student record creation and modification details
                </div>
            </div>

            <div class="system-grid">

                <div class="system-item">
                    <div class="system-label">
                        <i class="bi bi-calendar-plus me-1"></i>
                        Created At
                    </div>
                    <div class="system-value">
                        {{ $student->created_at?->format('M d, Y H:i') ?? 'N/A' }}
                    </div>
                </div>

                <div class="system-item">
                    <div class="system-label">
                        <i class="bi bi-calendar-check me-1"></i>
                        Last Updated
                    </div>
                    <div class="system-value">
                        {{ $student->updated_at?->format('M d, Y H:i') ?? 'N/A' }}
                    </div>
                </div>

            </div>

        </div>

        {{-- ACTION BUTTONS --}}
        <div class="d-flex justify-content-end gap-2 mt-4">

            <a href="{{ route('students.index') }}" class="show-back">
                <i class="bi bi-arrow-left me-1"></i>
                Back to List
            </a>

            <a href="{{ route('students.edit', $student) }}" class="show-edit-btn">
                <i class="bi bi-pencil-square me-2"></i>
                Edit Student
            </a>

        </div>

    </div>

@endsection