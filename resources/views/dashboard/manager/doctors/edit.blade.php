@extends('layouts.manager-dashboard')

@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title-1 m-b-25">Edit Doctor</h2>

                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('manager.doctors.update', $doctor->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') <!-- Use PUT method for updates -->

                                <!-- Input Fields -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- First Name -->
                                        <div class="form-group">
                                            <label for="first_name" class="form-label">First Name:</label>
                                            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter first name" value="{{ $doctor->first_name }}">
                                        </div>

                                        <!-- Last Name -->
                                        <div class="form-group">
                                            <label for="last_name" class="form-label">Last Name:</label>
                                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter last name" value="{{ $doctor->last_name }}">
                                        </div>

                                        <!-- Specialization -->
                                        <div class="form-group">
                                            <label for="specialization" class="form-label">Specialization:</label>
                                            <input type="text" name="specialization" class="form-control" id="specialization" placeholder="Enter specialization" value="{{ $doctor->specialization }}">
                                        </div>

                                        <!-- Contact Number -->
                                        <div class="form-group">
                                            <label for="contact_number" class="form-label">Contact Number:</label>
                                            <input type="text" name="contact_number" class="form-control" id="contact_number" placeholder="Enter contact number" value="{{ $doctor->contact_number }}">
                                        </div>

                                        <!-- Facebook -->
                                        <div class="form-group">
                                            <label for="facebook" class="form-label">Facebook:</label>
                                            <input type="text" name="facebook" class="form-control" id="facebook" placeholder="Enter Facebook link" value="{{ $doctor->facebook }}">
                                        </div>

                                        <!-- Twitter -->
                                        <div class="form-group">
                                            <label for="twitter" class="form-label">Twitter:</label>
                                            <input type="text" name="twitter" class="form-control" id="twitter" placeholder="Enter Twitter link" value="{{ $doctor->twitter }}">
                                        </div>

                                        <!-- LinkedIn -->
                                        <div class="form-group">
                                            <label for="linkedin" class="form-label">LinkedIn:</label>
                                            <input type="text" name="linkedin" class="form-control" id="linkedin" placeholder="Enter LinkedIn link" value="{{ $doctor->linkedin }}">
                                        </div>

                                        <!-- Instagram -->
                                        <div class="form-group">
                                            <label for="instagram" class="form-label">Instagram:</label>
                                            <input type="text" name="instagram" class="form-control" id="instagram" placeholder="Enter Instagram link" value="{{ $doctor->instagram }}">
                                        </div>

                                        <!-- Status -->
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status:</label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Image -->
                                        <div class="mb-4 d-flex justify-content-center">
                                            <img id="selectedImage" src="{{ asset('storage/' . $doctor->image) }}" alt="Doctor Image" style="width: 300px;" />
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <div class="btn btn-primary btn-rounded">
                                                <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                                                <input type="file" name="image" class="form-control d-none @error('image') is-invalid @enderror" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
                                            </div>
                                            <!-- Display validation error message -->
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
