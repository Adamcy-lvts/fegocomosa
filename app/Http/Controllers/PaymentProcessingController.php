<?php

namespace App\Http\Controllers;

use Paystack;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Donor;
use App\Http\Requests;
use App\Models\Donation;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\MembershipFee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class PaymentProcessingController extends Controller
{
       /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */

    public function redirectToGateway()
    {
        // dd(request()->all());
        // dd( Paystack::createCustomer());

        
        //    Paystack::createCustomer();  
           $response = Http::withToken('sk_test_f9a5b6ece8c6f04fb27bb9a0d368f5fc5569ccfc')->post('https://api.paystack.co/customer', [
                "email" => request()->email,
                "first_name" => request()->fname,
                "last_name" => request()->lname,
                "phone" => request()->phone,
                "metadata" => ['address' => request()->address, 'state' => request()->state_id, 'city' => request()->city_id, 'comment' => request()->comment ]
            ]);

            // dd($response);

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

        

        $payDetails = Arr::get($paymentDetails, 'data');

        // dd($payDetails);

        $first_name = $payDetails['customer']['first_name'];
        $last_name = $payDetails['customer']['last_name'];

        if ($payDetails['status'] == 'success' && $payDetails['metadata']['payment_for'] == 'membership') {

            $user  = User::find($payDetails['metadata']['member_id']);
            // dd(Carbon::now()->y);

            MembershipFee::create([
                'user_id' => $user->id,
                'amount' => $payDetails['amount']/100,
                'year'   => Carbon::parse($payDetails['paid_at'])->format('Y'),
            ]); 

             return back()->withInput();
        }

        if ($payDetails['status'] == 'success' && $payDetails['metadata']['payment_for'] == 'donation') {

            $user  = User::find($payDetails['metadata']['member_id']);
           


             $donor = Donor::create([
                'full_name'=> $payDetails['customer']['first_name'].' '.$payDetails['customer']['last_name'],
                'email'    => $payDetails['customer']['email'],
                'phone'    => $payDetails['customer']['phone'],
                'address'  => $payDetails['customer']['metadata']['address'],
                'city'     => $payDetails['customer']['metadata']['city'],
                'state'    => $payDetails['customer']['metadata']['state'],
                ]);

                $donation = Donation::create([
                    'campaign_id'  => $payDetails['metadata']['campaign_id'],
                    'user_id'      => Auth::user() ? Auth::user()->id : null,
                    'donor_id'     => $donor->id,
                    'amount'       => $payDetails['amount']/100,
                    'comment'      => $payDetails['customer']['metadata']['comment'],
                ]);

         

             return back()->withInput();
        }
    }
}
