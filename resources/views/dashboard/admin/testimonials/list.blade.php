
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($testimonials as $testimonial)
                                        <tr>
                                            <td>{{ $testimonial->id }}</td>
                                            <td>{{ $testimonial->name }}</td>
                                            <td>{{ $testimonial->description }}</td>
                                            <td>{{ $testimonial->status }}</td>
                                            <td>
                                                <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">No testimonials found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
