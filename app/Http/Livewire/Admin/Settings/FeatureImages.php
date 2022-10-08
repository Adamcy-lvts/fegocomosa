<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\FeatureImage;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FeatureImages extends Component
{

    use WithFileUploads;
    use WithPagination;
    use Actions;

    public $featureImageId;
    public $pagination = 5;
    public $showFeaturedForm = false;
    public $checkedSliderContent = [];
    public $checkAllItems = false;
    public $checkPageItems = false;

    public $title;
    public $image;
    public $caption;
    public $link;
    public $featuredImage;

    public function featuredModal()
    {
        $this->reset();
        $this->showFeaturedForm = true;
    }

    public function createImage()
    {
        $this->validate([
            'title' => 'required', 
        ]);

       
        $image_name = $this->image->getClientOriginalName();
        $this->image->storeAs('images', $image_name, 'site_images');
        $featureImage = FeatureImage::create([
            'title' => $this->title,
            'feature_image' =>  $image_name,
            'caption'  => $this->caption,
            'link' => $this->link,
            ]);
    
        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Feature Image Created Successfully'
        );
    }

     public function EditImage($id)
    {
        $this->reset();
        $this->showFeaturedForm = true;
        $this->featureImageId = $id;
        $featureImage = FeatureImage::find($this->featureImageId);


        $this->loadImage();
    }

    public function loadImage()
    {
        $featureImage        = FeatureImage::findOrFail($this->featureImageId);
        $this->title         = $featureImage->title;
        $this->caption         = $featureImage->caption;
        $this->featuredImage = $featureImage->feature_image;
        $this->link          = $featureImage->link;

    }

     public function updateImage()
    {
        $this->validate([
            'title' => 'required',

        ]);

        if ($this->image) {
            File::delete(public_path('images/'. $this->featuredImage));
            $this->featuredImage = $this->image->getClientOriginalName();
            $this->image->storeAs('images', $this->featuredImage, 'site_images');
           
        }

        FeatureImage::find($this->featureImageId)->update([
            'title' => $this->title,
            'caption' => $this->caption,
            'feature_image' => $this->featuredImage,
            'link' =>  $this->link,
           
        ]);

        $this->notification()->success(
            $title = 'Success',
            $description = 'Featured Image Updated Successfully'
        );
        
        $this->reset();
       

    }

        public function DeleteConfirmaton($id)
    {
        $this->featureImageId = $id;
        $this->notification()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'You Want Delete the Feature Image?',
            'acceptLabel' => 'Yes, Delete it',
            'method'      => 'deleteFeaturedImage',
            'params'      => 'Deleted',
        ]);
    }

    public function deleteFeaturedImage()
    {
        $featureImage = FeatureImage::find($this->featureImageId);
        File::delete(public_path('images/'.$featureImage->feature_image) );
        $featureImage->delete();

        $this->notification()->success(
            $title = 'Delete Featured Image',
            $description = 'Featured Image Deleted Successfully'
        );
       

    }


    public function render()
    {
        return view('livewire.admin.settings.feature-images', [
            'featureImages' => FeatureImage::paginate($this->pagination)
        ]);
    }
}
