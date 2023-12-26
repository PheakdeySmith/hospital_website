<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Specialization</th>
            <th>Contact Number</th>
            <th>Facebook</th>
            <th>Twitter</th>
            <th>LinkedIn</th>
            <th>Instagram</th>
            <th>Status</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($doctors as $doctor)
            <tr>
                <td>{{ $doctor->id }}</td>
                <td>{{ $doctor->first_name }}</td>
                <td>{{ $doctor->last_name }}</td>
                <td>{{ $doctor->specialization }}</td>
                <td>{{ $doctor->contact_number }}</td>
                <td>{{ $doctor->facebook }}</td>
                <td>{{ $doctor->twitter }}</td>
                <td>{{ $doctor->linkedin }}</td>
                <td>{{ $doctor->instagram }}</td>
                <td>{{ $doctor->status }}</td>
                <td>
                    @if ($doctor->image)
                        <img src="{{ asset('storage/' . $doctor->image) }}" alt="Doctor Image" style="width: 50px; height: 50px;">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="12">No doctors found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
