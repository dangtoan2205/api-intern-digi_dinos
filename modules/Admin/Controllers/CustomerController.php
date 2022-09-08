<?php

namespace Modules\Admin\Controllers;

use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Models\Customer;
use Modules\Admin\Requests\CustomerRequest;
use Modules\Admin\Requests\SearchRequest;
use Modules\Admin\Resources\CustomerResource;
use Modules\Admin\Services\CustomerService;

class CustomerController extends Controller
{
    /**
     *
     * @var \Modules\Admin\Services\CustomerService $customerService CustomerService.
     */
    protected $customerService;

    /**
     * Customer controller construct.
     *
     * @param CustomerService $customerService CustomerService.
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param SearchRequest $request SearchRequest.
     * @return mixed
     */
    public function index(SearchRequest $request)
    {
        try {
            $search = $request->all();
            $customer = $this->customerService->list($search);
            $result = CustomerResource::collection($customer);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CustomerRequest $request CustomerRequest.
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        try {
            $customer = $this->customerService->createCustomer($request);

            $result = new CustomerResource($customer);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customer Customer.
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        try {
            $customer = $this->customerService->findCustomer($customer->id);
            $result = new CustomerResource($customer);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CustomerRequest $request  CustomerRequest.
     * @param Customer        $customer Customer.
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        try {
            $customer = $this->customerService->updateCustomer($customer->id, $request);
            $result = new CustomerResource($customer);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Customer $customer Customer.
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        try {
            $customer = $this->customerService->deleteCustomer($customer->id);

            return response()->success($customer);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }
}
