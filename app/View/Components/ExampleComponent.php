<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ExampleComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $users;
    public function __construct()
    {
          $this->users = [
            (object) [
                'id' => 1,
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'phone' => '+2348012345678',
                'gender' => 'Male',
                'role' => 'Admin',
                'status' => 'Active',
                'created_at' => '2026-07-01 10:15:30',
            ],
            (object) [
                'id' => 2,
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane.smith@example.com',
                'phone' => '+2348098765432',
                'gender' => 'Female',
                'role' => 'User',
                'status' => 'Active',
                'created_at' => '2026-07-02 14:20:45',
            ],
            (object) [
                'id' => 3,
                'first_name' => 'Michael',
                'last_name' => 'Johnson',
                'email' => 'michael.johnson@example.com',
                'phone' => '+2348034567890',
                'gender' => 'Male',
                'role' => 'Moderator',
                'status' => 'Inactive',
                'created_at' => '2026-07-03 09:05:10',
            ],
            (object) [
                'id' => 4,
                'first_name' => 'Sarah',
                'last_name' => 'Williams',
                'email' => 'sarah.williams@example.com',
                'phone' => '+2348056789012',
                'gender' => 'Female',
                'role' => 'User',
                'status' => 'Suspended',
                'created_at' => '2026-07-04 16:45:00',
            ],
            (object) [
                'id' => 5,
                'first_name' => 'David',
                'last_name' => 'Brown',
                'email' => 'david.brown@example.com',
                'phone' => '+2348076543210',
                'gender' => 'Male',
                'role' => 'User',
                'status' => 'Active',
                'created_at' => '2026-07-05 11:30:25',
            ],
        ];

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $users = $this->users;
        return view('components.example-component', compact('users'));
    }
}
