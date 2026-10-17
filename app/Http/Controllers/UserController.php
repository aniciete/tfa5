<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display the staff user accounts directory populated from a static in-memory array.
     */
    public function index(): View
    {
        $users = [
            [
                'username'  => 'admin.reyes',
                'full_name' => 'Carlos Reyes',
                'role'      => 'Store Administrator',
            ],
            [
                'username'  => 'mgr.castro',
                'full_name' => 'Beatriz Castro',
                'role'      => 'Shift Supervisor',
            ],
            [
                'username'  => 'cashier.valdez',
                'full_name' => 'Daniel Valdez',
                'role'      => 'Cashier',
            ],
            [
                'username'  => 'cashier.santos',
                'full_name' => 'Camille Santos',
                'role'      => 'Cashier',
            ],
            [
                'username'  => 'inv.navarro',
                'full_name' => 'Leo Navarro',
                'role'      => 'Inventory Clerk',
            ],
        ];

        return view('users.index', [
            'title'      => 'User Accounts | POS Foundations',
            'activePage' => 'users',
            'users'      => $users,
        ]);
    }
}
