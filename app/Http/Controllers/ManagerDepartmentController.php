<?php


namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class ManagerDepartmentController extends Controller
{
    public function index()
    {
        $data['departments'] = Department::all();
        return view('dashboard.manager.departments.index', $data);
    }

    public function create()
    {
        $data['departments'] = Department::all();
        return view('dashboard.manager.departments.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
        ]);

        Department::create($request->all());

        return redirect()->route('manager.departments.index')->with('success', 'Department created successfully');
    }

    public function edit(Department $department)
    {
        return view('dashboard.manager.departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
        ]);

        $department->update($request->all());

        return redirect()->route('manager.departments.index')->with('success', 'Department updated successfully');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('manager.departments.index')->with('success', 'Department deleted successfully');
    }
}
