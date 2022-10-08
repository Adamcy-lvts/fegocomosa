<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Models\MembershipPayment;

class Payments extends Component
{

    use WithPagination;
    use Actions;

    public $paymentId;
    public $checkedPayments = [];
    public $checkAllItems = false;
    public $checkPageItems = false;
    public $forSingleRecord = false;
    public $search;

    public $amount;
    public $member;
    public $paymentDate;
    public $paymentYear;

    public $pagination = 10;

    public $showModalForm = false;
    public $showModalAlert = false;
    public $showAlert = false;

    public function paymentModal()
    {
        $this->showModalForm = true;
    }

    public function payment()
    {
        $this->validate([
            'amount' => 'required', 
            'member' => 'required', 
            'paymentDate' => 'required', 
        ]);

       

        $role = MembershipPayment::create([
            'amount' => $this->amount,
            'user_id' => $this->member,
            'year' => Carbon::parse($this->paymentYear)->format('Y'),
            'datetime' => $this->paymentDate
            ]);

        
        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Payment Successfull'
        );
    }

    public function EditPayment($id)
    {
        $this->reset();
        $this->showModalForm = true;
        $this->paymentId = $id;
        

        $this->loadPayment();
    }

    public function loadPayment()
    {
        $payment = MembershipPayment::findOrFail($this->paymentId);
        $this->amount = $payment->amount;
        $this->member = $payment->user_id;
        $this->paymentYear = $payment->year;
        $this->paymentDate = $payment->datetime;
    }

    public function updatePayment()
    {
        $this->validate([
            'amount' => 'required', 
            'member' => 'required', 
            'paymentDate' => 'required', 
        ]);


        $payment = MembershipPayment::find($this->paymentId);
        
        $payment->update([
            'amount' => $this->amount,
            'user_id' => $this->member,
            'year' => Carbon::parse($this->paymentYear)->format('Y'),
            'datetime' => $this->paymentDate
           
        ]);
        
        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Payment Update Successfull'
        );
       

    }


    public function updatedcheckPageItems($value)
    {
        if ($value) {
            $this->checkedPayments = $this->payments->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
           $this->checkedPayments = [];
           $this->checkAllItems = false;
        }
    }

    public function updatedcheckedPayments()
    {
        $this->checkPageItems = false;
        
    }

    public function checkAllItems()
    {
        $this->checkAllItems = true;
        $this->checkedPayments = $this->paymentsQuery->pluck('id')->map(fn ($item) => (string) $item)->toArray();
    }

    

    public function SingleDeleteConfirmation($id)
    {
        $this->showAlert = true;
        $this->paymentId = $id;
    }

    public function deleteRecord()
    {

       
        if ($this->checkedPayments) {
            $this->checkedPayments = [];
        }
       
        $payment = MembershipPayment::find($this->paymentId);
        $payment->delete();

        $this->reset();
        session()->flash('flash.banner', 'Record Deleted Successfully');

    }

    public function DeleteConfirmation() {
        $this->showModalAlert = true;
    }



    public function CancelConfirmation()
    {
        $this->showModalAlert = false;
        $this->showAlert = false;
        
        if ($this->checkedPayments) {
            $this->checkedPayments = [];
            $this->checkPageItems = false;
        }
       
    }

    public function  deleteRecords()
    {
        MembershipPayment::whereKey($this->checkedPayments)->delete();
        $this->checkedPayments = [];
        $this->reset();
        session()->flash('flash.banner', 'Records Deleted Successfully');        
    }
    
    public function ischeckedPayments($payment_id)
    {
        return in_array($payment_id, $this->checkedPayments);
    }

    public function getPaymentsProperty()
    {
        return $this->paymentsQuery->paginate($this->pagination);
    }

    public function getPaymentsQueryProperty()
    {
        return MembershipPayment::with(['user'])->search(trim($this->search));
    }

    public function render()
    {
        // $payments = MembershipPayment::with('user')->paginate(5);
       
        return view('livewire.admin.payments', [
            'payments' => $this->payments,
            'members'  => User::select('id','first_name','last_name')->get()
        ])->layout('components.dashboard');;
    }
}
