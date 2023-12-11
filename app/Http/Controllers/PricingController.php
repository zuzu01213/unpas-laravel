<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class PricingController extends Controller
{
    public function index()
    {
        return view('pricing', [
            'title' => 'Halaman Pricing',
            'active' => 'pricing',
        ]);
    }

    public function purchasePlan(Request $request)
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // User is authenticated
            $incrementBy = $request->input('posts_limit', 1);

            // Assuming you are updating the authenticated user's posts_limit
            auth()->user()->incrementPostsLimit($incrementBy);

            // Redirect to the desired page after the purchase
            return redirect('/pricing');
        } else {
            // User is not authenticated, redirect to login page
            return redirect('/login');
        }
    }
}
