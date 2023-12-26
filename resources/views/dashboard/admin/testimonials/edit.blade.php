@extends('layouts.admin-dashboard')

@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title-1 m-b-25">Edit Testimonial</h2>

                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.testimonials.update', $testimonial->id) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <!-- Input Fields -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Name -->
                                        <div class="form-group">
                                            <label for="name" class="form-label">Name:</label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{ $testimonial->name }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Description -->
                                        <div class="form-group">
                                            <label for="description" class="form-label">Description:</label>
                                            <input type="text" name="description" class="form-control" id="description" placeholder="Enter description" value="{{ $testimonial->description }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label for="status" class="form-label">Status:</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="active" {{ $testimonial->status == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $testimonial->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
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
