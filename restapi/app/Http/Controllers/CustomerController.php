<?php

namespace App\Http\Controllers;

use App\Http\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        $customers = $this->customerService->getAllCustomers();
        return response()->json(['customers' => $customers]);
    }

    public function show($id)
    {
        $customer = $this->customerService->getCustomerById($id);
        return response()->json(['customer' => $customer]);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'full_name' => 'required',
                'phone' => 'required',
                'email' => 'required|email|unique:customers',
                'gps_coordinate' => 'required',
            ]);
            $customer = $this->customerService->createCustomer($data);
            return response()->json(['message' => "Customer created successfully", 'customer' => $customer], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:customers,email,' . $id,
            'gps_location' => 'required',
        ]);
        $customer = $this->customerService->updateCustomer($id, $data);
        return response()->json(['data' => $customer]);
    }

    public function destroy($id)
    {
        if ($this->customerService->hasActiveTask($id)) {
            return response()->json(['message' => 'Cannot delete customer with active task'], 409);
        }

        $this->customerService->deleteCustomer($id);
        return response()->json(['message' => 'Customer deleted successfully (soft delete)'], 200);
    }
}
