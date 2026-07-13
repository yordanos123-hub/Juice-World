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
     * ትዕዛዝ ሲላክ መረጃዎችን ዳታቤዝ ውስጥ የሚመዘግብ
     */
    public function store(Request $request)
    {
        $rules = [
            'juice_id' => 'required|exists:juices,id',
            'branch_id' => 'required|exists:branches,id',
            'order_type' => 'required',
            'payment_method' => 'required'
        ];

        if ($request->order_type === 'delivery') {
            $rules['phone'] = 'required';
            $rules['address'] = 'required';
        }

        $request->validate($rules);

        // 1. ትዕዛዙን መፍጠር
        $order = Order::create([
            'user_id' => auth()->id() ?? null,
            'juice_id' => $request->juice_id,
            'branch_id' => $request->branch_id,
            'order_type' => $request->order_type,
            'payment_method' => $request->payment_method,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => 'Pending',
            'payment_status' => 'unpaid'
        ]);

        // 2. ሎጂክ፦ ክፍያው ዲጂታል (Telebirr/Chapa) ከሆነ ወደ ክፍያ ገጽ ይውሰደው
        if ($request->payment_method === 'telebirr' || $request->payment_method === 'chapa') {
            return view('orders.payment_process', compact('order'));
        }

        // 3. ክፍያው "Cash" ከሆነ ወደ መነሻ ገጽ ይመለሳል
        return redirect('/')->with('success', '✅ ትዕዛዝዎ ተመዝግቧል። ሲረከቡ ክፍያ ይፈጽማሉ!');
    }

    /**
     * ክፍያውን በራስ-ሰር የሚያረጋግጥ (Simulation)
     */
    public function verifyPayment($id)
    {
        $order = Order::findOrFail($id);

        // ሁኔታውን ወደ ተከፈለ (Paid) መቀየር
        $order->update(['payment_status' => 'paid']);

        return redirect('/')->with('success', '🎉 ክፍያዎ በባንክ ተረጋግጧል! ስለመረጡን እናመሰግናለን።');
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
     * ትዕዛዝ መሙያ ፎርም
     */
    public function create($juice_id, $branch_id)
    {
        $juice = Juice::findOrFail($juice_id);
        $branch = Branch::findOrFail($branch_id);
        return view('orders.create', compact('juice', 'branch'));
    }

    /**
     * የአድሚን ትዕዛዞች ዝርዝር
     */
    public function index()
    {
        $orders = Order::with(['user', 'juice', 'branch'])->latest()->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * አድሚኑ ክፍያውን በእጁ ማረጋገጥ ሲፈልግ (Manual Verification)
     */
    public function markAsPaid($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['payment_status' => 'paid']);
        return back()->with('success', '✅ ክፍያው በትክክል ተረጋግጧል!');
    }

    /**
     * አድሚኑ ትዕዛዝ ተቀብሎ ለደንበኛው ኢሜይል የሚልክበት
     */
    public function updateStatus($id)
    {
        $order = Order::findOrFail($id);

        if ($order->payment_status !== 'paid') {
            return back()->with('error', 'ትዕዛዙን ለመቀበል መጀመሪያ ክፍያ መፈጸሙን ማረጋገጥ አለብዎት!');
        }

        $order->update(['status' => 'Accepted/Preparing']);

        if ($order->user) {
            Mail::to($order->user->email)->send(new OrderAccepted($order));
        }

        return back()->with('success', 'ትዕዛዙ ተቀባይነት አግኝቷል!');
    }

    /**
     * ደንበኛው የራሱን ታሪክ የሚያይበት
     */
    public function userOrders()
    {
        $orders = Order::where('user_id', auth()->id())
            ->with(['juice', 'branch'])
            ->latest()
            ->get();

        return view('orders.user_orders', compact('orders'));
    }
}
