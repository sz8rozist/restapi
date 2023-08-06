<?php

namespace App\Http\Services;

use App\Models\Worker;

class WorkerService
{
    public function getAllWorkers()
    {
        return Worker::all();
    }

    public function getWorkerById($id)
    {
        return Worker::findOrFail($id);
    }

    public function createWorker($data)
    {
        return Worker::create($data);
    }

    public function updateWorker($id, $data)
    {
        $worker = Worker::findOrFail($id);
        if ($worker) {
            $worker->update($data);
            return $worker;
        }
        return null;
    }

    public function deleteWorker($id)
    {
        $worker = Worker::findOrFail($id);
        if ($worker) {
            $worker->delete();
            return true;
        }
        return false;
    }

    public function hasActiveTask($workerId)
    {
        return Worker::whereHas('tasks', function ($query) {
            $query->where('status', 'inprogress');
        })->where('id', $workerId)->exists();
    }
}
