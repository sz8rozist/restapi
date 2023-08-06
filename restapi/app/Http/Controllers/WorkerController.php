<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\WorkerService;
use Illuminate\Validation\ValidationException;

class WorkerController extends Controller
{
    protected $workerService;

    public function __construct(WorkerService $workerService)
    {
        $this->workerService = $workerService;
    }

    public function index()
    {
        $workers = $this->workerService->getAllWorkers();
        return response()->json(['workers' => $workers]);
    }

    public function show($id)
    {
        $worker = $this->workerService->getWorkerById($id);
        return response()->json(['worker' => $worker]);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:workers',
                'gps_coordinate' => 'required',
            ]);
            $worker = $this->workerService->createWorker($data);
            return response()->json(['message' => "Worker created successfully",'worker' => $worker], 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $data = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:workers,email,' . $id,
                'gps_coordinate' => 'required',
            ]);
            $worker = $this->workerService->updateWorker($id, $data);
            return response()->json(['message' => "Worker updated successfully",'worker' => $worker]);
        }catch(ValidationException $e){
            return response()->json(['errors' => $e->errors()], 422);

        }

    }

    public function destroy($id)
    {
        if ($this->workerService->hasActiveTask($id)) {
            return response()->json(['message' => 'Cannot delete worker with active task'], 409);
        }
        $this->workerService->deleteWorker($id);
        return response()->json(['message' => 'Worker deleted (soft delete)'], 200);
    }
}
