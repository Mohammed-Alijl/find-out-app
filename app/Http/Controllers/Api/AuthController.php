<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\LoginRequest;
use App\Http\Requests\Customer\RegisterRequest;
use App\Http\Resources\CustomerResource;
use App\Models\User;
use App\Repositories\CustomerRepository;
use App\Traits\Api_Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(private CustomerRepository $customerRepository)
    {
    }

    use Api_Response;

    public function register(RegisterRequest $request){
        $customer = $this->customerRepository->create($request);
        $token = $customer->createToken($request->userAgent());
        return $this->apiResponse(['access_token' => $token->plainTextToken, 'customer'=> new CustomerResource($customer)], 201, __('success_messages.customer.register'));
    }
    public function login(LoginRequest $request){
        try {
            $customer = User::where('email', $request->email)->first();

            if (Hash::check($request->password, $customer->password)) {
                $token = $customer->createToken($request->userAgent());
                return $this->apiResponse(['access_token' => $token->plainTextToken, 'customer'=>new CustomerResource($customer)], 200, __('success_messages.customer.login'));
            } else
                return $this->apiResponse(null, 422, __('failed_messages.auth.password.mismatch'));
        } catch (\Exception $ex) {
            return $this->apiResponse(null, 500, $ex->getMessage());
        }
    }

    public function logout(){
        $token = auth('sanctum')->user()->currentAccessToken();
        $token->delete();
        return $this->apiResponse(null,200,__('success_messages.customer.logout'));
    }

    public function show($id){
        $customer = $this->customerRepository->find($id);
        return $this->apiResponse(new CustomerResource($customer),200,__('success_messages.customer.show'));
    }

    public function getAuthCustomer(){
        $customer = auth('sanctum')->user();
        return $this->apiResponse(new CustomerResource($customer),200,__('success_messages.customer.show'));
    }
}
