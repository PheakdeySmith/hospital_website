<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($abouts as $about)
            <tr>
                <td>{{ $about->id }}</td>
                <td>{{ $about->title }}</td>
                <td>{{ $about->description }}</td>
                <td>{{ $about->status }}</td>
                <td>
                    @if($about->image)
                        <a href="#" data-toggle="modal" data-target="#photoModal{{ $about->id }}">
                            <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }} Photo" class="img-thumbnail" width="50">
                        </a>
                    @else
                        No photo available
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.abouts.edit', $about->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.abouts.destroy', $about->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No records found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
