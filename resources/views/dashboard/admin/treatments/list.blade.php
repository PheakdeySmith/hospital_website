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
        @forelse($treatments as $treatment)
            <tr>
                <td>{{ $treatment->id }}</td>
                <td>{{ $treatment->title }}</td>
                <td>{{ $treatment->description }}</td>
                <td>{{ $treatment->status }}</td>
                <td>
                    @if($treatment->image)
                        <a href="#" data-toggle="modal" data-target="#photoModal{{ $treatment->id }}">
                            <img src="{{ asset('storage/' . $treatment->image) }}" alt="{{ $treatment->title }} Photo" class="img-thumbnail" width="50">
                        </a>
                    @else
                        No photo available
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.treatments.edit', $treatment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.treatments.destroy', $treatment->id) }}" method="POST" class="d-inline">
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
