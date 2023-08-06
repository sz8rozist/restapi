<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\TaskService;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = $this->taskService->getAllTasks();
        return response()->json(["tasks" => $tasks]);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'customer_id' => 'required|exists:customers,id',
                'description' => 'required',
                'type' => 'required|in:fault,investment,other',
                'status' => 'required|in:inprogress,done,failed',
                'gps_location' => 'nullable',
                'workers' => 'required|array',
                'workers.*' => 'exists:workers,id',
            ]);

            $task = $this->taskService->createTask($data);

            return response()->json(['message' => 'Task created successfully', 'task' => $task]);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function show($id)
    {
        $task = $this->taskService->getTask($id);
        return response()->json(["task" => $task]);
    }

    public function update(Request $request, $id)
    {
        try {
           $data = $request->validate([
                'description' => 'required',
                'type' => 'required',
                'status' => 'required',
                'gps_location' => 'nullable',
                'workers' => 'required|array',
                'workers.*' => 'exists:workers,id',
            ]);

            $task = $this->taskService->updateTask($id, $data);

            return response()->json(['message' => 'Task updated successfully', 'task' => $task]);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function destroy($id)
    {
        $this->taskService->deleteTask($id);
        return response()->json(['message' => 'Task deleted successfully (soft delete)']);
    }
}
