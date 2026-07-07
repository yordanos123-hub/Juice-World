<?php

namespace App\Http\Controllers;

use App\Models\Juice;
use App\Models\Order;
use App\Models\Branch;
use App\Mail\OrderAccepted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * ትዕዛዝ ሲላክ መረጃዎችን ዳታቤዝ ውስጥ የሚመዘግብ (Customer Side)
     */
    public function store(Request $request)
    {
        // 1. መሠረታዊ Validation
        $rules = [
            'juice_id' => 'required|exists:juices,id',
            'branch_id' => 'required|exists:branches,id',
            'order_type' => 'required',
            'payment_method' => 'required'
        ];

        // ለዴሊቨሪ ከሆነ ስልክና አድራሻ የግድ ነው
        if ($request->order_type === 'delivery') {
            $rules['phone'] = 'required';
            $rules['address'] = 'required';
        }

        $request->validate($rules);

        // 2. ትዕዛዙን መፍጠር
        Order::create([
            'user_id' => auth()->id() ?? null,
            'juice_id' => $request->juice_id,
            'branch_id' => $request->branch_id,
            'order_type' => $request->order_type,
            'payment_method' => $request->payment_method,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => 'Pending',
            'payment_status' => 'unpaid' // መጀመሪያ ሳይከፈል ይመዘገባል
        ]);

        return redirect('/')->with('success', '✅ ትዕዛዝዎ በትክክል ደርሶናል። ስለመረጡን እናመሰግናለን!');
    }

    /**
     * መነሻ ገጽ ላይ (+) ሲጫን ቅርንጫፍ የሚያስመርጥ ገጽ
     */
    public function selectBranch($juice_id)
    {
        $juice = Juice::findOrFail($juice_id);
        $branches = Branch::all();
        return view('orders.select-branch', compact('juice', 'branches'));
    }

    /**
     * ቅርንጫፍ ከተመረጠ በኋላ ትዕዛዝ መሙያ ፎርም የሚያሳይ
     */
    public function create($juice_id, $branch_id)
    {
        $juice = Juice::findOrFail($juice_id);
        $branch = Branch::findOrFail($branch_id);
        return view('orders.create', compact('juice', 'branch'));
    }

    /**
     * አንድ ተራ ደንበኛ የራሱን ትዕዛዞች ብቻ የሚያይበት (Customer Side)
     */
    public function userOrders()
    {
        $orders = Order::where('user_id', auth()->id())
            ->with(['juice', 'branch'])
            ->latest()
            ->get();

        return view('orders.user_orders', compact('orders'));
    }

    /**
     * ሁሉንም ትዕዛዞች ለአድሚን የሚያሳይ (Admin Dashboard)
     */
    public function index()
    {
        $orders = Order::with(['user', 'juice', 'branch'])->latest()->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * አድሚኑ ክፍያ መፈጸሙን ሲያረጋግጥ (Payment Status)
     */
    public function markAsPaid($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['payment_status' => 'paid']);
        return back()->with('success', '✅ ክፍያው በትክክል ተረጋግጧል!');
    }

    /**
     * አድሚኑ ትዕዛዝ ተቀብሎ ሁኔታውን የሚቀይርበት እና ኢሜይል የሚልክበት
     */
    public function updateStatus($id)
    {
        $order = Order::findOrFail($id);

        // 🔴 መከላከያ፦ ክፍያ ሳይፈጸም Accept ለማድረግ ቢሞከር ይከለክላል
        if ($order->payment_status !== 'paid') {
            return back()->with('error', 'ትዕዛዙን ለመቀበል መጀመሪያ ክፍያ መፈጸሙን ማረጋገጥ አለብዎት!');
        }

        $order->update(['status' => 'Accepted/Preparing']);

        if ($order->user) {
            Mail::to($order->user->email)->send(new OrderAccepted($order));
        }

        return back()->with('success', 'ትዕዛዙ ተቀባይነት አግኝቷል!');
    }
}
