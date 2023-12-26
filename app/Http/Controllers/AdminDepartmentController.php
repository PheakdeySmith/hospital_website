<?php


namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class AdminDepartmentController extends Controller
{
    public function index()
    {
        $data['departments'] = Department::all();
        return view('dashboard.admin.departments.index', $data);
    }

    public function create()
    {
        $data['departments'] = Department::all();
        return view('dashboard.admin.departments.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
        ]);

        Department::create($request->all());

        return redirect()->route('admin.departments.index')->with('success', 'Department created successfully');
    }

    public function edit(Department $department)
    {
        return view('dashboard.admin.departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
        ]);

        $department->update($request->all());

        return redirect()->route('admin.departments.index')->with('success', 'Department updated successfully');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('admin.departments.index')->with('success', 'Department deleted successfully');
    }
}
