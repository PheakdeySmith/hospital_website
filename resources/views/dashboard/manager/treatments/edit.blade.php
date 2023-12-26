@extends('layouts.manager-dashboard')

@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title-1 m-b-25">Edit Treatment</h2>

                    <div class="card">
                        <div class="card-body">
                            <!-- Add the form tag and specify the action and method -->
                            <form method="post" action="{{ route('manager.treatments.update', $treatment->id) }}" enctype="multipart/form-data">
                                @csrf <!-- Add the CSRF token -->
                                @method('PUT') <!-- Use the PUT method for update -->

                                <div class="row">
                                    <!-- Left Column - Input Fields -->
                                    <div class="col-md-8">
                                        <!-- Title -->
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title:</label>
                                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ $treatment->title }}">
                                        </div>

                                        <!-- Description -->
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description:</label>
                                            <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter description">{{ $treatment->description }}</textarea>
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

                                    <!-- Right Column - Avatar Section -->
                                    <div class="col-md-4">
                                        <!-- Image -->
                                        <div>
                                            <div class="mb-4 d-flex justify-content-center">
                                                <img id="selectedImage" src="{{ asset('storage/' . $treatment->image) }}" alt="selected image" style="width: 300px;" />
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="btn btn-primary btn-rounded">
                                                    <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                                                    <input type="file" name="image" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
                                                </div>
                                            </div>
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
