
@extends('layouts.app')

@section('title', 'Departments')

@section('content')

<style>
    .department-page {
        padding: 28px;
        color: #e5e7eb;
        min-height: calc(100vh - 60px);
    }

    /* Header */
    .department-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
    }

    .department-label {
        color: #818cf8;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .department-title {
        color: #fff;
        font-size: 28px;
        font-weight: 750;
        margin: 0;
    }

    .department-subtitle {
        color: #9299b2;
        font-size: 13px;
        margin-top: 7px;
    }

    .add-department-btn {
        background: linear-gradient(135deg, #6366f1, #3b82f6);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 12px 19px;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        white-space: nowrap;
        transition: .2s;
    }

    .add-department-btn:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(99,102,241,.25);
    }

    /* Summary */
    .department-summary {
        display: flex;
        align-items: center;
        gap: 16px;
        background: #11162a;
        border: 1px solid #242b45;
        border-radius: 13px;
        padding: 20px 23px;
        margin-bottom: 24px;
    }

    .summary-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: rgba(99,102,241,.16);
        color: #818cf8;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .summary-label {
        color: #9299b2;
        font-size: 12px;
        margin-bottom: 4px;
    }

    .summary-value {
        color: #fff;
        font-size: 23px;
        font-weight: 750;
        line-height: 1.2;
    }

    /* Main Card */
    .department-card {
        background: #11162a;
        border: 1px solid #242b45;
        border-radius: 16px;
        overflow: hidden;
    }

    .department-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 23px 25px;
        border-bottom: 1px solid #252c45;
    }

    .department-card-header h4 {
        color: #fff;
        font-size: 17px;
        font-weight: 700;
        margin: 0 0 5px;
    }

    .department-card-header p {
        color: #8993b0;
        font-size: 12px;
        margin: 0;
    }

    .record-count {
        background: rgba(99,102,241,.15);
        color: #a5b4fc;
        padding: 7px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
    }

    /* Search */
    .department-search {
        display: flex;
        gap: 10px;
        padding: 17px 25px;
        border-bottom: 1px solid #252c45;
    }

    .search-input-wrap {
        position: relative;
        flex: 1;
    }

    .search-input-wrap i {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #75809e;
    }

    .department-search input {
        width: 100%;
        height: 43px;
        padding: 0 14px 0 40px;
        background: #0b1020;
        border: 1px solid #2b3350;
        border-radius: 9px;
        color: #e5e7eb;
        font-size: 13px;
        outline: none;
    }

    .department-search input::placeholder {
        color: #68718d;
    }

    .department-search input:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99,102,241,.12);
    }

    .search-btn {
        background: #292f50;
        border: 1px solid #39415e;
        color: #c7d2fe;
        padding: 0 19px;
        border-radius: 9px;
        font-size: 12px;
        font-weight: 600;
        transition: .2s;
    }

    .search-btn:hover {
        background: #373f69;
        color: white;
    }

    .clear-btn {
        width: 43px;
        height: 43px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #252b43;
        border: 1px solid #39415e;
        border-radius: 9px;
        color: #aab4cf;
        text-decoration: none;
        transition: .2s;
    }

    .clear-btn:hover {
        background: #3a2340;
        color: #fb7185;
    }

    /* Table */
    .department-table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
        color: #cbd5e1;
    }

    .department-table thead th {
        background: #171d33;
        color: #8994b4;
        font-size: 10px;
        font-weight: 750;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 17px 18px;
        border: none;
        white-space: nowrap;
    }

    .department-table tbody td {
        background: #11162a;
        color: #cbd5e1;
        font-size: 12px;
        padding: 18px;
        border-bottom: 1px solid #252c45;
        vertical-align: middle;
    }

    .department-table tbody tr {
        transition: .2s;
    }

    .department-table tbody tr:hover td {
        background: #171d33;
    }

    .department-table tbody tr:last-child td {
        border-bottom: none;
    }

    .department-id {
        color: #a5b4fc;
        font-weight: 700;
    }

    .department-name-wrap {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 180px;
    }

    .department-avatar {
        width: 39px;
        height: 39px;
        border-radius: 11px;
        background: linear-gradient(135deg, #6366f1, #0ea5e9);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        flex-shrink: 0;
    }

    .department-name {
        color: #fff;
        font-weight: 650;
        font-size: 12px;
    }

    .department-subtext {
        color: #77819d;
        font-size: 10px;
        margin-top: 4px;
    }

    .department-info {
        color: #aeb8d2;
    }

    .student-count {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 34px;
        padding: 7px 12px;
        background: rgba(99,102,241,.15);
        color: #a5b4fc;
        border: 1px solid rgba(99,102,241,.15);
        border-radius: 8px;
        text-decoration: none;
        font-weight: 700;
        font-size: 12px;
        transition: .2s;
    }

    .student-count:hover {
        background: #4338ca;
        color: white;
    }

    /* Actions */
    .department-actions {
        display: flex;
        justify-content: flex-end;
        gap: 7px;
    }

    .action-btn {
        width: 34px;
        height: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: none;
        border-radius: 8px;
        font-size: 13px;
        text-decoration: none;
        transition: .2s;
    }

    .edit-action {
        background: rgba(99,102,241,.14);
        color: #818cf8;
    }

    .edit-action:hover {
        background: #4338ca;
        color: white;
    }

    .delete-action {
        background: rgba(244,63,94,.12);
        color: #fb7185;
        cursor: pointer;
    }

    .delete-action:hover {
        background: #be123c;
        color: white;
    }

    /* Empty State */
    .department-empty {
        text-align: center;
        padding: 55px 20px !important;
    }

    .empty-icon {
        width: 58px;
        height: 58px;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        background: rgba(99,102,241,.13);
        color: #818cf8;
        font-size: 23px;
    }

    .department-empty h5 {
        color: #fff;
        font-size: 15px;
        font-weight: 700;
    }

    .department-empty p {
        color: #8993b0;
        font-size: 12px;
        margin: 5px 0 0;
    }

    /* Footer */
    .department-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
        padding: 17px 25px;
        border-top: 1px solid #252c45;
    }

    .department-footer p {
        color: #8993b0;
        font-size: 11px;
        margin: 0;
    }

    .department-pagination nav {
        margin: 0;
    }

    .department-pagination .pagination {
        margin: 0;
        gap: 5px;
    }

    .department-pagination .page-link {
        background: #171d33;
        border: 1px solid #303957;
        color: #a5b4fc;
        border-radius: 7px;
        font-size: 11px;
    }

    .department-pagination .active .page-link {
        background: #4f46e5;
        border-color: #4f46e5;
        color: white;
    }

    .department-pagination .disabled .page-link {
        background: #11162a;
        color: #59627e;
    }

    @media(max-width: 768px) {
        .department-page {
            padding: 16px;
        }

        .department-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .department-card-header,
        .department-search {
            padding: 17px;
        }

        .department-table thead th,
        .department-table tbody td {
            padding: 13px;
        }
    }

    @media(max-width: 480px) {
        .department-search {
            flex-wrap: wrap;
        }

        .search-input-wrap {
            flex-basis: 100%;
        }

        .search-btn {
            flex: 1;
            height: 42px;
        }

        .department-title {
            font-size: 24px;
        }
    }
</style>


<div class="department-page">

    {{-- PAGE HEADER --}}
    <div class="department-header">

        <div>
            <div class="department-label">Academic Management</div>

            <h2 class="department-title">
                Departments
            </h2>

            <p class="department-subtitle">
                Organize and manage academic departments and student groups.
            </p>
        </div>

        <a href="{{ route('departments.create') }}"
           class="add-department-btn">
            <i class="bi bi-plus-lg me-2"></i>
            Add Department
        </a>

    </div>


    {{-- DEPARTMENT SUMMARY --}}
    <div class="department-summary">

        <div class="summary-icon">
            <i class="bi bi-building"></i>
        </div>

        <div>
            <div class="summary-label">Total Departments</div>
            <div class="summary-value">{{ $departments->total() }}</div>
        </div>

    </div>


    {{-- DEPARTMENT RECORDS --}}
    <div class="department-card">

        <div class="department-card-header">

            <div>
                <h4>Department Records</h4>
                <p>View and manage all registered departments.</p>
            </div>

            <span class="record-count">
                {{ $departments->total() }} Records
            </span>

        </div>


        {{-- SEARCH --}}
        <form method="GET"
              action="{{ route('departments.index') }}"
              class="department-search">

            <div class="search-input-wrap">
                <i class="bi bi-search"></i>

                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Search department by name..."
                >
            </div>

            <button type="submit" class="search-btn">
                <i class="bi bi-search me-1"></i>
                Search
            </button>

            <a href="{{ route('departments.index') }}"
               class="clear-btn"
               title="Clear Search">
                <i class="bi bi-x-lg"></i>
            </a>

        </form>


        {{-- TABLE --}}
        <div class="table-responsive">

            <table class="department-table">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Department</th>
                        <th>Manager ID</th>
                        <th>Location ID</th>
                        <th>Students</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($departments as $d)

                        <tr>

                            <td>
                                <span class="department-id">
                                    #{{ $d->dept_id }}
                                </span>
                            </td>

                            <td>
                                <div class="department-name-wrap">

                                    <div class="department-avatar">
                                        <i class="bi bi-building"></i>
                                    </div>

                                    <div>
                                        <div class="department-name">
                                            {{ $d->dept_name }}
                                        </div>

                                        <div class="department-subtext">
                                            Academic Department
                                        </div>
                                    </div>

                                </div>
                            </td>

                            <td>
                                <span class="department-info">
                                    {{ $d->manager_id ?? 'N/A' }}
                                </span>
                            </td>

                            <td>
                                <span class="department-info">
                                    {{ $d->location_id ?? 'N/A' }}
                                </span>
                            </td>

                            <td>
                                <a href="{{ route('students.index', ['dept_id' => $d->dept_id]) }}"
                                   class="student-count"
                                   title="View students in this department">
                                    {{ $d->students_count }}
                                </a>
                            </td>

                            <td>
                                <div class="department-actions">

                                    <a href="{{ route('departments.edit', $d) }}"
                                       class="action-btn edit-action"
                                       title="Edit Department">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form
                                        action="{{ route('departments.destroy', $d) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Delete this department?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-btn delete-action"
                                            title="Delete Department"
                                        >
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </form>

                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="department-empty">

                                <div class="empty-icon">
                                    <i class="bi bi-building"></i>
                                </div>

                                <h5>No Departments Found</h5>

                                <p>
                                    No departments match your search.
                                    Add a new department to get started.
                                </p>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- FOOTER --}}
        <div class="department-footer">

            <p>
                Showing
                {{ $departments->firstItem() ?? 0 }}
                to
                {{ $departments->lastItem() ?? 0 }}
                of
                {{ $departments->total() }}
                departments
            </p>

            <div class="department-pagination">
                {{ $departments->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>

        </div>

    </div>

</div>

@endsection
