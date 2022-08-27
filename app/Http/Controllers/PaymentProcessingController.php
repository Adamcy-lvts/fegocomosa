<?php

namespace App\Http\Controllers;

use Paystack;

use Carbon\Carbon;
use App\Models\User;
use App\Http\Requests;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\MembershipFee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class PaymentProcessingController extends Controller
{
       /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */

    public function redirectToGateway()
    {
        // dd( Paystack::createCustomer());

        
             

        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }   

        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        // dd($paymentDetails);

        $payDetails = Arr::get($paymentDetails, 'data');

        // dd($payDetails);

        $first_name = $payDetails['customer']['first_name'];
        $last_name = $payDetails['customer']['last_name'];

        if ($payDetails['status'] == 'success' && $payDetails['metadata']['payment_for'] == 'membership') {

            $user  = User::find($payDetails['metadata']['member_id']);
            // dd(Carbon::now()->y);

            MembershipFee::create([
                'user_id' => $user->id,
                'amount' => $payDetails['amount'],
                'year'   => Carbon::parse($payDetails['paid_at'])->format('Y'),
            ]); 

        // return redirect()->route('user.dashboard');
        return back()->withInput();
        }
    }
}
