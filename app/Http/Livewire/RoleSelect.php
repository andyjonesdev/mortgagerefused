<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSelect extends Component
{
    public Permission $permission;
    public $roles;

    public function mount($permission, $roles)
    {
        $this->permission = $permission;
        $this->roles = $roles;
    }
 
    protected $rules = [
        'enquiry.broker_id' => '',
    ];
 
    public function save()
    {
        // $this->validate();
        // $this->enquiry->save();
    }

    public function changeEvent($value)
    {
        $this->consoleLog('change event');
        $this->consoleLog('value = '.$value);
        $this->permission->assignRole($value);
        redirect()->to('/permissions');
    }

    public function render()
    {
        return view('livewire.role-select');
    }
}
