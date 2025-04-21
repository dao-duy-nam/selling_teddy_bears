@extends('layouts.AdminLayout')

@section('title', 'Trang Home Admin')

@section('page-title', 'Trang Home Admin')


@section('content')
<div class="row">
    <!-- Tổng sinh viên -->
    <div class="col-md-3 mb-3">
        <div class="card text-bg-primary">
            <div class="card-body">
                <h5 class="card-title">Sinh viên</h5>
                <p class="card-text fs-4">{{ $studentsCount }}</p>
            </div>
        </div>
    </div>

    <!-- Tổng giảng viên -->
    <div class="col-md-3 mb-3">
        <div class="card text-bg-success">
            <div class="card-body">
                <h5 class="card-title">Giảng viên</h5>
                <p class="card-text fs-4">{{ $teachersCount }}</p>
            </div>
        </div>
    </div>

    <!-- Tổng môn học -->
    <div class="col-md-3 mb-3">
        <div class="card text-bg-warning">
            <div class="card-body">
                <h5 class="card-title">Môn học</h5>
                <p class="card-text fs-4">{{ $subjectsCount }}</p>
            </div>
        </div>
    </div>

    <!-- Tổng lớp học -->
    <div class="col-md-3 mb-3">
        <div class="card text-bg-danger">
            <div class="card-body">
                <h5 class="card-title">Lớp học</h5>
                <p class="card-text fs-4">{{ $classesCount }}</p>
            </div>
        </div>
    </div>

    <!-- Tổng lượt đăng ký -->
    <div class="col-md-3 mb-3">
        <div class="card text-bg-info">
            <div class="card-body">
                <h5 class="card-title">Đăng ký học</h5>
                <p class="card-text fs-4">{{ $enrollmentsCount }}</p>
            </div>
        </div>
    </div>

    <!-- Tổng kết quả thi -->
    <div class="col-md-3 mb-3">
        <div class="card text-bg-secondary">
            <div class="card-body">
                <h5 class="card-title">Kết quả thi</h5>
                <p class="card-text fs-4">{{ $examResultsCount }}</p>
            </div>
        </div>
    </div>

    <!-- Tổng lịch học -->
    <div class="col-md-3 mb-3">
        <div class="card text-bg-light border border-dark">
            <div class="card-body">
                <h5 class="card-title">Lịch học</h5>
                <p class="card-text fs-4">{{ $schedulesCount }}</p>
            </div>
        </div>
    </div>

    <!-- Tổng thông báo -->
    <div class="col-md-3 mb-3">
        <div class="card text-bg-dark">
            <div class="card-body">
                <h5 class="card-title text-white">Thông báo</h5>
                <p class="card-text fs-4 text-white">{{ $notificationsCount }}</p>
            </div>
        </div>
    </div>

    <!-- Tổng khóa học - GV -->
    <div class="col-md-3 mb-3">
        <div class="card text-bg-success-subtle border border-success">
            <div class="card-body">
                <h5 class="card-title">Khóa học - Giảng viên</h5>
                <p class="card-text fs-4">{{ $courseTeachersCount }}</p>
            </div>
        </div>
    </div>

    <!-- Tổng điểm danh -->
    <div class="col-md-3 mb-3">
        <div class="card text-bg-warning-subtle border border-warning">
            <div class="card-body">
                <h5 class="card-title">Điểm danh</h5>
                <p class="card-text fs-4">{{ $attendancesCount }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
