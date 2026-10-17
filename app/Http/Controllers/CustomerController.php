<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display the customer accounts directory populated from a static in-memory array.
     */
    public function index(): View
    {
        $customers = [
            [
                'full_name' => 'Elena Rostova',
                'email'     => 'elena.rostova@example.com',
                'phone'     => '+1 (555) 234-5678',
            ],
            [
                'full_name' => 'Marcus Vance',
                'email'     => 'marcus.vance@example.com',
                'phone'     => '+1 (555) 345-6789',
            ],
            [
                'full_name' => 'Aria Thorne',
                'email'     => 'aria.thorne@example.com',
                'phone'     => '+1 (555) 456-7890',
            ],
            [
                'full_name' => 'Julian Mercer',
                'email'     => 'julian.mercer@example.com',
                'phone'     => '+1 (555) 567-8901',
            ],
            [
                'full_name' => 'Sophia Lin',
                'email'     => 'sophia.lin@example.com',
                'phone'     => '+1 (555) 678-9012',
            ],
        ];

        return view('customers.index', [
            'title'      => 'Customer Accounts | POS Foundations',
            'activePage' => 'customers',
            'customers'  => $customers,
        ]);
    }
}
