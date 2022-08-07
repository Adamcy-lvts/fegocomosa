<?php

namespace App\Http\Livewire\Campaigns;

use Livewire\Component;
use App\Models\Campaign;
use Livewire\WithPagination;


class CampaignIndex extends Component
{
    use WithPagination;

    public $pagination = 8;


    public function render()
    {
        return view('livewire.campaigns.campaign-index', [
            'campaigns' => Campaign::orderBy('created_at', 'DESC')->paginate($this->pagination)
        ])->layout('layouts.guest');
    }
}
