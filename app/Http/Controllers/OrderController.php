<?php

namespace App\Http\Controllers;

use App\Mail\OrderAccepted;
use Illuminate\Support\Facades\Mail;
use App\Models\Juice;
use App\Models\Order;
use App\Models\Branch;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // 1. የትዕዛዝ ፎርሙን የሚያሳይ
    public function create($juice_id, $branch_id)
    {
        $juice = Juice::findOrFail($juice_id);
        $branch = Branch::findOrFail($branch_id);

        return view('orders.create', compact('juice', 'branch'));
    }

    // 2. ትዕዛዙን ዳታቤዝ ውስጥ የሚጨምር
    public function store(Request $request)
    {
        $rules = [
            'juice_id' => 'required',
            'branch_id' => 'required',
            'order_type' => 'required'
        ];

        if ($request->order_type === 'delivery') {
            $rules['phone'] = 'required';
            $rules['address'] = 'required';
        }

        $request->validate($rules);

        Order::create([
            'user_id' => auth()->id(),
            'juice_id' => $request->juice_id,
            'branch_id' => $request->branch_id,
            'order_type' => $request->order_type,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => 'Pending'
        ]);

        return redirect('/')->with('success', '✅ ትዕዛዝዎ በትክክል ደርሶናል።');
    }

    public function userOrders()
    {
        // የገባውን ሰው ID ተጠቅመን የእሱን ትዕዛዞች ብቻ እናመጣለን
        $orders = Order::where('user_id', auth()->id())
            ->with(['juice', 'branch'])
            ->latest()
            ->get();

        return view('orders.user_orders', compact('orders'));
    }
    // 3. አድሚኑ ትዕዛዞችን የሚያይበት
    public function index()
    {
        $orders = Order::with(['user', 'juice', 'branch'])->latest()->get();
        return view('orders.index', compact('orders'));
    }

    // 4. ትዕዛዝ ለመቀበል እና ኢሜይል ለመላክ
    public function updateStatus($id)
    {
        $order = Order::with(['user', 'juice', 'branch'])->findOrFail($id);

        $order->update(['status' => 'Accepted/Preparing']);

        // ኢሜይሉን ለደንበኛው ይልካል
        Mail::to($order->user->email)->send(new OrderAccepted($order));

        return back()->with('success', 'ትዕዛዙ ተቀባይነት አግኝቷል፣ ኢሜይል ተልኳል!');
    }
}
