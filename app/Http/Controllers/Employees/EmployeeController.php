<?php

namespace App\Http\Controllers\Employees;

use App\Models\Employee;
use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Employee::with(['achievements', 'department'])->latest()->paginate(3));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $create_employee_info = $request->validated();
        $created_employee =  Employee::create($create_employee_info);
        if (sizeof($request->achievements['name']) != 0) {
            if (sizeof($request->achievements['name']) < 2) {
                $achievement = Achievement::create(['name' => $request->achievements['name'][0]]);
                return $created_employee->achievements()->attach([
                    $achievement->id => ['achievement_date' => $request->achievements['date'][0]],
                ]);
            } else {
                for ($i = 0; $i < count($request->achievements['name']); $i++) {
                    $achievement = Achievement::create(['name' => $request->achievements['name'][$i]]);
                    $created_employee->achievements()->attach([
                        $achievement->id => ['achievement_date' => $request->achievements['date'][$i]],
                    ]);
                }
            }
        }
        return response()->json(['message' => 'Product created successfully', 'user' => $created_employee], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        return $employee->delete();
    }
}
