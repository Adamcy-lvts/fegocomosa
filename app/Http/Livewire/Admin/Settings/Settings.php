<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\FeatureImage;
use App\Models\NavigationMenu;
use App\Models\GuestNavbarMenu;

class Settings extends Component
{
    use Actions;

    public $menu;
    public $showEdit = false;
    public $link;
    public $menuId;
    public $navbarMenu;
    public $navbarId;
    public $editNavbar = false;
    public $navItem;
    public $navLink;
    public $navVisible;

    // public function mount()
    // {
    //     # code...
    // }

    public function editMenu($id)
    {
        $this->showEdit = true;

        $this->menuId = $id;
        $menu = NavigationMenu::find($id);
        $this->menu = $menu->name;
        $this->link = $menu->link;
        

    }

    public function updateMenu()
    {
        $menu = NavigationMenu::find($this->menuId);
        $menu->update([
            'name' => $this->menu,
            'link' => $this->link
        ]);

        $this->showEdit = false;

         $this->notification()->success(
            $title = 'Success',
            $description = 'Menu Updated Successfully'
        );
    }

    public function editNavbar($id)
    {
         $this->editNavbar = true;

        $this->navbarId = $id;
        $navbar = GuestNavbarMenu::find($id);
        $this->navItem = $navbar->name;
        $this->navLink = $navbar->link;
        // $this->navVisible = $navbar->visibility;
    }

    public function toggle($id)
    {
        $this->navbarId = $id;
        $navbar = GuestNavbarMenu::find($id);
        $navbar->update([
            'visibility' => $this->navVisible
        ]);
    }

    public function updateNavbar()
    {
        $navbar = GuestNavbarMenu::find($this->navbarId);
        $navbar->update([
            'name' => $this->navItem,
            'link' => $this->navLink,
            // 'visibility' => $this->navVisible
        ]);

        $this->editNavbar = false;

         $this->notification()->success(
            $title = 'Success',
            $description = 'Menu Updated Successfully'
        );
    }
    public function render()
    {
        return view('livewire.admin.settings.settings', [
            'navMenus' => NavigationMenu::all(),
            'navbarMenus' => GuestNavbarMenu::all(),
            // 'featureImages' => FeatureImage::paginate($this->pagination)
        ])->layout('components.dashboard');
    }
}
