@extends('layouts.master')
@section('title', 'تفاصيل جائزة النشر')

@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="left-content">
      <div>
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> <i class="bi bi-trophy"></i> تفاصيل جائزة النشر </h2>
        <p class="mg-b-0"> عرض تفاصيل جائزة النشر </p>
      </div>
    </div>
    <div class="main-dashboard-header-right">
      <div>
        <label class="tx-13 font-weight-bold"> التاريخ </label>
        <div class="main-star text-primary">
          <span class="text-dark"> {{ now()->format('H:i A | d-m-Y') }} </span>
        </div>
      </div>
      <div>
        <label class="tx-13 font-weight-bold"> الصفحه الرئيسيه </label>
        <h5> <a class="text-danger" href="{{ route('dashboard') }}"> <i class="bi bi-house-fill"></i> الرئيسيه</a></h5>
      </div>
    </div>
  </div>
  <br>
  @include('include.success')
  
  <div class="card card-body">
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-bordered table-striped" dir="rtl">
            <tbody>
              <tr>
                <th class="bg-primary text-white" style="width: 30%;">
                  <i class="bi bi-person"></i> اسم الدكتور
                </th>
                <td class="fw-bold text-primary">{{ $publishingAward->doctor_name }}</td>
              </tr>
              <tr>
                <th class="bg-primary text-white">
                  <i class="bi bi-trophy"></i> اسم الجائزة
                </th>
                <td class="fw-bold text-info">{{ $publishingAward->award_name }}</td>
              </tr>
              <tr>
                <th class="bg-primary text-white">
                  <i class="bi bi-calendar"></i> تاريخ الجائزة
                </th>
                <td class="fw-bold text-danger">{{ $publishingAward->award_date }}</td>
              </tr>
              <tr>
                <th class="bg-primary text-white">
                  <i class="bi bi-file-earmark"></i> ملف المشروع
                </th>
                <td>
                  @if($publishingAward->project_file)
                    <a href="{{ Storage::url('publishing_awards/' . $publishingAward->project_file) }}" target="_blank" class="btn btn-info">
                      <i class="bi bi-file-earmark-pdf"></i> عرض الملف
                    </a>
                  @else
                    <span class="text-muted">لا يوجد ملف</span>
                  @endif
                </td>
              </tr>
              <tr>
                <th class="bg-primary text-white">
                  <i class="bi bi-calendar"></i> تاريخ الإنشاء
                </th>
                <td class="fw-bold">{{ $publishingAward->created_at->format('Y-m-d H:i:s') }}</td>
              </tr>
              <tr>
                <th class="bg-primary text-white">
                  <i class="bi bi-calendar-check"></i> آخر تحديث
                </th>
                <td class="fw-bold">{{ $publishingAward->updated_at->format('Y-m-d H:i:s') }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="mt-3">
          <a href="{{ route('publishing_awards.index') }}" class="btn btn-primary">
            <i class="bi bi-arrow-left"></i> العودة للقائمة
          </a>
          <a href="{{ route('publishing_awards.edit', $publishingAward->id) }}" class="btn btn-warning">
            <i class="bi bi-pencil"></i> تعديل
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection

