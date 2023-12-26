@extends('layouts.manager-dashboard')
@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title-1 m-b-25">Appointment</h2>
                    @include('dashboard.manager.appointments.filter')
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive m-b-40">
                              @include('dashboard.manager.appointments.list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
