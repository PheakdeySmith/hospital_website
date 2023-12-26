@extends('layouts.admin-dashboard')

@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title-1 m-b-25">@yield('title', 'Create Appointment')</h2>

                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="post" action="{{ route('admin.appointments.store') }}" enctype="multipart/form-data">
                                @isset($appointment)
                                    @method('PUT')
                                @endisset
                                @csrf

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="patient" class="form-label">Patient:</label>
                                            <input type="text" name="patient_name" class="form-control" id="patient_name" value="{{ isset($appointment->patient_name) ? $appointment->patient_name : old('patient_name') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="doctor_id" class="form-label">Doctor:</label>
                                            <select name="doctor_id" class="form-control" id="doctor_id">
                                                @foreach($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}">{{ $doctor->first_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="department_id" class="form-label">Department:</label>
                                            <select name="department_id" class="form-control" id="department_id">
                                                @foreach($departments as $department)
                                                    <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="appointment_date" class="form-label">Appointment Date:</label>
                                            <input type="date" name="appointment_date" class="form-control" id="appointment_date" value="{{ isset($appointment->appointment_date) ? $appointment->appointment_date : old('appointment_date') }}">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
