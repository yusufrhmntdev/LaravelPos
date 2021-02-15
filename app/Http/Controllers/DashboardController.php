<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index ()
    {
        $section_header = "Dashboard";
        $supplier = Supplier::count();
        $item =     Item::count();
        $customer = Customer::count();

        return view('index',compact(['supplier','section_header','item','customer']));
    }
}
