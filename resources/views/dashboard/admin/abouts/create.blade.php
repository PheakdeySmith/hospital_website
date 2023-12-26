@extends('layouts.admin-dashboard')

@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title-1 m-b-25">About</h2>

                    <div class="card">
                        <div class="card-body">
                            <!-- Use the Blade directive for form method and action -->
                            <form method="post" action="{{ route('admin.abouts.store') }}" enctype="multipart/form-data">
                                @csrf <!-- Add the CSRF token -->

                                <div class="row">
                                    <!-- Left Column - Input Fields -->
                                    <div class="col-md-8">
                                        <!-- Title -->
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title:</label>
                                            <!-- Use old() helper to repopulate the input on validation error -->
                                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title" value="{{ old('title') }}">
                                            <!-- Display validation error message -->
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Description -->
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description:</label>
                                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" placeholder="Enter description">{{ old('description') }}</textarea>
                                            <!-- Display validation error message -->
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Status -->
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status:</label>
                                            <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                            <!-- Display validation error message -->
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                    <!-- Right Column - Avatar Section -->
                                    <div class="col-md-4">
                                        <!-- Image -->
                                        <div>
                                            <div class="mb-4 d-flex justify-content-center">
                                                <img id="selectedImage" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" alt="example placeholder" style="width: 300px;" />
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
