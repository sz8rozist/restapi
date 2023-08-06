<?php

namespace App\Http\Services;

use App\Models\Task;
use App\Models\Customer;
use App\Models\Worker;
class TaskService
{
    public function createTask(array $data)
    {
        $customer = Customer::findOrFail($data['customer_id']);

        $task = new Task([
            'description' => $data['description'],
            'type' => $data['type'],
            'status' => $data['status'],
        ]);

        if (isset($data['gps_location'])) {
            $task['gps_location'] = $data['gps_location'];
        }else{
            $task['gps_location'] = $customer->gps_coordinate;
        }

        $customer->tasks()->save($task);

        if (isset($data['workers'])) {
            $workers = Worker::whereIn('id', $data['workers'])->get();
            $task->workers()->attach($workers);
        }

        return $task;
    }

    public function updateTask($id, array $data)
    {
        $task = Task::findOrFail($id);

        $task->update([
            'description' => $data['description'],
            'type' => $data['type'],
            'status' => $data['status'],
            'gps_location' => $data['gps_location'],
        ]);
        
        if (isset($data['workers'])) {
            $workers = Worker::whereIn('id', $data['workers'])->get();
            $task->workers()->sync($workers);
        }

        return $task;
    }

    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        if ($task) {
            $task->delete();
            return true;
        }
        return false;
    }

    public function getTask($id)
    {
        return Task::with('customer', 'workers')->find($id);
    }

    public function getAllTasks()
    {
        return Task::with('customer', 'workers')->get();
    }
}
