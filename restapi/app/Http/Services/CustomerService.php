<?php

namespace App\Http\Services;

use App\Models\Customer;

class CustomerService
{
    public function getAllCustomers()
    {
        return Customer::all();
    }

    public function getCustomerById($id)
    {
        return Customer::findOrFail($id);
    }

    public function createCustomer($data)
    {
        return Customer::create($data);
    }

    public function updateCustomer($id, $data)
    {
        $customer = Customer::findOrFail($id);
        if ($customer) {
            $customer->update($data);
            return $customer;
        }
        return null;
    }

    public function deleteCustomer($id)
    {
        $customer = Customer::findOrFail($id);
        if ($customer) {
            $customer->delete();
            return true;
        }
        return false;
    }
    
    public function hasActiveTask($customerId)
    {
        return Customer::whereHas('tasks', function ($query) {
            $query->where('status', 'inprogress');
        })->where('id', $customerId)->exists();
    }
}
