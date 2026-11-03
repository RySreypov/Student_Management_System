@extends('layouts.app')

@section('content')

<style>
    .student-directory {
        color: #e5e7eb;
        padding: 28px;
    }

    .student-directory * {
        box-sizing: border-box;
    }

    /* Header */
    .sd-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
    }

    .sd-label {
        color: #818cf8;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .sd-title {
        font-size: 30px;
        font-weight: 750;
        color: #fff;
        margin: 0;
    }

    .sd-subtitle {
        color: #9299b2;
        font-size: 14px;
        margin-top: 7px;
    }

    .sd-add-btn {
        background: linear-gradient(135deg, #6366f1, #3b82f6);
        color: white;
        text-decoration: none;
        padding: 12px 19px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        transition: .2s;
        white-space: nowrap;
        box-shadow: 0 5px 20px rgba(99,102,241,.2);
    }

    .sd-add-btn:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(99,102,241,.35);
    }

    /* Statistics */
    .sd-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        margin-bottom: 28px;
    }

    .sd-stat-card {
        background: #11162a;
        border: 1px solid #242b45;
        border-radius: 14px;
        padding: 21px;
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .sd-stat-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        font-size: 21px;
        flex-shrink: 0;
    }

    .sd-purple {
        background: rgba(99,102,241,.15);
        color: #818cf8;
    }

    .sd-blue {
        background: rgba(59,130,246,.15);
        color: #60a5fa;
    }

    .sd-cyan {
        background: rgba(14,165,233,.15);
        color: #38bdf8;
    }

    .sd-stat-label {
        color: #9299b2;
        font-size: 13px;
        margin-bottom: 5px;
    }

    .sd-stat-value {
        color: #fff;
        font-size: 25px;
        font-weight: 750;
        line-height: 1.2;
    }

    /* Records panel */
    .sd-records {
        background: #11162a;
        border: 1px solid #242b45;
        border-radius: 16px;
        overflow: hidden;
    }

    .sd-records-header {
        padding: 23px 25px;
        border-bottom: 1px solid #242b45;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .sd-records-title {
        color: #fff;
        font-size: 18px;
        font-weight: 700;
        margin: 0;
    }

    .sd-records-count {
        color: #9299b2;
        font-size: 12px;
        margin-top: 5px;
    }

    .sd-toolbar {
        padding: 18px 25px;
        display: flex;
        flex-wrap: wrap;
        gap: 11px;
        border-bottom: 1px solid #242b45;
    }

    .sd-search {
        flex: 1;
        min-width: 190px;
        position: relative;
    }

    .sd-search input {
        width: 100%;
        background: #0b1020;
        border: 1px solid #2b3350;
        border-radius: 9px;
        padding: 11px 14px 11px 38px;
        color: #fff;
        font-size: 13px;
        outline: none;
    }

    .sd-search input:focus,
    .sd-filter:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99,102,241,.12);
    }

    .sd-search input::placeholder {
        color: #68718d;
    }

    .sd-search i {
        position: absolute;
        left: 13px;
        top: 50%;
        transform: translateY(-50%);
        color: #68718d;
    }

    .sd-filter {
        background: #0b1020;
        border: 1px solid #2b3350;
        border-radius: 9px;
        padding: 10px 12px;
        color: #b8bfd4;
        font-size: 13px;
        outline: none;
        min-width: 130px;
    }

    .sd-filter option {
        background: #11162a;
        color: #fff;
    }

    .sd-search-btn {
        background: #292f52;
        border: 1px solid #3b426b;
        color: #c7d2fe;
        border-radius: 9px;
        padding: 10px 16px;
        font-size: 13px;
        font-weight: 600;
    }

    .sd-search-btn:hover {
        background: #373e70;
    }

    /* Table */
    .sd-table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .sd-table {
        width: 100%;
        min-width: 900px;
        border-collapse: collapse;
    }

    .sd-table thead th {
        background: #151b32;
        color: #858eaa;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 15px 20px;
        text-align: left;
        white-space: nowrap;
    }

    .sd-table tbody td {
        padding: 16px 20px;
        border-bottom: 1px solid #222941;
        color: #cbd1e1;
        font-size: 13px;
        vertical-align: middle;
    }

    .sd-table tbody tr {
        transition: .2s;
    }

    .sd-table tbody tr:hover {
        background: rgba(99,102,241,.045);
    }

    .sd-table tbody tr:last-child td {
        border-bottom: none;
    }

    .sd-student-info {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 190px;
    }

    .sd-avatar {
        width: 38px;
        height: 38px;
        border-radius: 11px;
        background: linear-gradient(135deg, #6366f1, #0ea5e9);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 13px;
        flex-shrink: 0;
    }

    .sd-student-name {
        color: #f1f5f9;
        font-weight: 600;
        font-size: 13px;
        margin-bottom: 4px;
    }

    .sd-student-email {
        color: #77819d;
        font-size: 11px;
    }

    .sd-id {
        color: #a5b4fc;
        font-weight: 600;
    }

    .sd-department {
        background: rgba(99,102,241,.12);
        color: #a5b4fc;
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 11px;
        white-space: nowrap;
    }

    .sd-gender {
        color: #b8bfd4;
    }

    .sd-date {
        color: #9299b2;
        white-space: nowrap;
    }

    .sd-actions {
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .sd-action {
        width: 31px;
        height: 31px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        text-decoration: none;
        border: 1px solid transparent;
        font-size: 13px;
        background: transparent;
    }

    .sd-view {
        color: #60a5fa;
        background: rgba(59,130,246,.10);
    }

    .sd-edit {
        color: #a78bfa;
        background: rgba(139,92,246,.10);
    }

    .sd-delete {
        color: #fb7185;
        background: rgba(244,63,94,.10);
        cursor: pointer;
    }

    .sd-action:hover {
        filter: brightness(1.3);
    }

    /* Empty state */
    .sd-empty {
        text-align: center;
        padding: 65px 20px !important;
    }

    .sd-empty i {
        font-size: 38px;
        color: #6366f1;
        display: block;
        margin-bottom: 13px;
    }

    .sd-empty h5 {
        color: #fff;
        font-size: 16px;
        margin-bottom: 7px;
    }

    .sd-empty p {
        color: #9299b2;
        font-size: 13px;
        margin: 0;
    }

    /* Footer */
    .sd-footer {
        padding: 18px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        border-top: 1px solid #242b45;
    }

    .sd-footer-text {
        color: #9299b2;
        font-size: 12px;
    }

    .sd-footer .pagination {
        margin: 0;
    }

    .sd-footer .page-link {
        background: #0b1020;
        border-color: #2b3350;
        color: #a5b4fc;
        font-size: 12px;
    }

    .sd-footer .page-item.active .page-link {
        background: #6366f1;
        border-color: #6366f1;
        color: #fff;
    }

    .sd-footer .page-item.disabled .page-link {
        background: #11162a;
        color: #555e78;
    }

    @media (max-width: 768px) {
        .student-directory {
            padding: 16px;
        }

        .sd-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .sd-title {
            font-size: 25px;
        }

        .sd-stats {
            grid-template-columns: 1fr;
        }

        .sd-records-header {
            padding: 18px;
        }

        .sd-toolbar {
            padding: 15px 18px;
        }

        .sd-filter {
            flex: 1;
        }

        .sd-footer {
            padding: 16px 18px;
        }
    }
</style>

<div class="student-directory">

    {{-- PAGE HEADER --}}
    <div class="sd-header">
        <div>
            <div class="sd-label">Academic Management</div>
            <h1 class="sd-title">Students</h1>
            <p class="sd-subtitle">
                Manage student information and academic records.
            </p>
        </div>

        <a href="{{ route('students.create') }}" class="sd-add-btn">
            <i class="bi bi-plus-lg me-2"></i>
            Add Student
        </a>
    </div>

    {{-- STATISTICS --}}
    <div class="sd-stats">

        <div class="sd-stat-card">
            <div class="sd-stat-icon sd-purple">
                <i class="bi bi-people-fill"></i>
            </div>
            <div>
                <div class="sd-stat-label">Total Students</div>
                <div class="sd-stat-value">{{ $stats['total'] }}</div>
            </div>
        </div>

        <div class="sd-stat-card">
            <div class="sd-stat-icon sd-blue">
                <i class="bi bi-building"></i>
            </div>
            <div>
                <div class="sd-stat-label">Departments</div>
                <div class="sd-stat-value">{{ $stats['departments'] }}</div>
            </div>
        </div>

        <div class="sd-stat-card">
            <div class="sd-stat-icon sd-cyan">
                <i class="bi bi-graph-up-arrow"></i>
            </div>
            <div>
                <div class="sd-stat-label">Average Enrollment</div>
                <div class="sd-stat-value">{{ $stats['avg'] }}</div>
            </div>
        </div>

    </div>

    {{-- STUDENT RECORDS --}}
    <div class="sd-records">

        <div class="sd-records-header">
            <div>
                <h4 class="sd-records-title">Student Records</h4>
                <div class="sd-records-count">
                    {{ $students->total() }} student records found
                </div>
            </div>
        </div>

        {{-- SEARCH AND FILTERS --}}
        <form action="{{ route('students.index') }}" method="GET" class="sd-toolbar">

            <div class="sd-search">
                <i class="bi bi-search"></i>
                <input
                    type="text"
                    name="search"
                    placeholder="Search students..."
                    value="{{ $search ?? request('search') }}"
                >
            </div>

            <select name="department" class="sd-filter" onchange="this.form.submit()">
                <option value="">All Departments</option>
                @foreach($departments as $dept)
                    <option value="{{ $dept->dept_id }}"
                        {{ request('department') == $dept->dept_id ? 'selected' : '' }}>
                        {{ $dept->dept_name }}
                    </option>
                @endforeach
            </select>

            <select name="gender" class="sd-filter" onchange="this.form.submit()">
                <option value="">All Genders</option>
                <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ request('gender') == 'Other' ? 'selected' : '' }}>Other</option>
            </select>

            <select name="sort" class="sd-filter" onchange="this.form.submit()">
                <option value="">Newest First</option>
                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name A-Z</option>
            </select>

            <button type="submit" class="sd-search-btn">
                <i class="bi bi-search me-1"></i> Search
            </button>

        </form>

        {{-- STUDENT TABLE --}}
        <div class="sd-table-wrapper">
            <table class="sd-table">

                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Student ID</th>
                        <th>Department</th>
                        <th>Gender</th>
                        <th>Enrollment Date</th>
                        <th>Enrollment</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($students as $s)

                        <tr>

                            <td>
                                <div class="sd-student-info">

                                    <div class="sd-avatar">
                                        {{ strtoupper(substr($s->student_name, 0, 1)) }}
                                    </div>

                                    <div>
                                        <div class="sd-student-name">
                                            {{ $s->student_name }}
                                        </div>

                                        <div class="sd-student-email">
                                            {{ $s->email }}
                                        </div>
                                    </div>

                                </div>
                            </td>

                            <td>
                                <span class="sd-id">
                                    #{{ $s->student_id }}
                                </span>
                            </td>

                            <td>
                                <span class="sd-department">
                                    {{ $s->department->dept_name ?? 'N/A' }}
                                </span>
                            </td>

                            <td>
                                <span class="sd-gender">
                                    {{ $s->gender }}
                                </span>
                            </td>

                            <td>
                                <span class="sd-date">
                                    {{ $s->enrollment_date ? $s->enrollment_date->format('M d, Y') : 'N/A' }}
                                </span>
                            </td>

                            <td>
                                {{ $s->enrollment }}
                            </td>

                            <td>
                                <div class="sd-actions">

                                    <a href="{{ route('students.show', $s->student_id) }}"
                                       class="sd-action sd-view"
                                       title="View Student">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{ route('students.edit', $s->student_id) }}"
                                       class="sd-action sd-edit"
                                       title="Edit Student">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('students.destroy', $s->student_id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this student?');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="sd-action sd-delete"
                                                title="Delete Student">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="sd-empty">
                                <i class="bi bi-folder2-open"></i>
                                <h5>No Students Found</h5>
                                <p>There are no student records matching your search.</p>
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

        {{-- PAGINATION --}}
        <div class="sd-footer">

            <div class="sd-footer-text">
                @if($students->total() > 0)
                    Showing {{ $students->firstItem() }}
                    to {{ $students->lastItem() }}
                    of {{ $students->total() }} students
                @else
                    Showing 0 students
                @endif
            </div>

            <div>
                {{ $students->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>

        </div>

    </div>

</div>

@endsection
