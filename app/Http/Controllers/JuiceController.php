<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Juice;
use Illuminate\Http\Request;

class JuiceController extends Controller
{
    // ሁሉንም ቅርንጫፎች ለማሳየት
    public function index()
    {
        $allBranches = \App\Models\Branch::all();

        // ጁሶቹን በምድብ ከፋፍለን ለገጹ እንሰጣለን
        $juicesByCategory = \App\Models\Juice::all()->groupBy('category');

        return view('welcome', compact('allBranches', 'juicesByCategory'));
    }

    // የአንድን ቅርንጫፍ ሜኑ ለማሳየት
    public function show($id)
    {
        // ቅርንጫፉን ከነ ጁሶቹ ፈልግ
        $branch = \App\Models\Branch::with('juices')->findOrFail($id);

        return view('branch-menu', [
            'branch' => $branch,
            'juices' => $branch->juices // አሁን የሚመጡት የዚህ ቅርንጫፍ ጁሶች ብቻ ናቸው
        ]);
    }
    // ፎርሙን የሚያሳይ ክፍል
    public function create()
    {
        $branches = \App\Models\Branch::all(); // ጁሱን ከቅርንጫፍ ጋር ለማያያዝ ቅርንጫፎቹን እናምጣ
        return view('juices.create', compact('branches'));
    }

// ዳታውን ዳታቤዝ ውስጥ የሚጨምር ክፍል
    public function store(Request $request)
    {
        // 1. ዳታው መሞላቱን አረጋግጥ (Validation)
        $request->validate([
            'name' => 'required|unique:juices,name',
            'price' => 'required|numeric',
            'description' => 'required',
            'branch_id' => 'required'
        ]);

        // 2. ጁሱን ፍጠር
        $juice = \App\Models\Juice::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        // 3. ጁሱን ከተመረጠው ቅርንጫፍ ጋር አያይዝ (Attach to Branch)
        $juice->branches()->attach($request->branch_id);

        // 4. ወደ መነሻ ገጽ ተመለስ
        return redirect('/')->with('success', 'አዲስ ጁስ በትክክል ተመዝግቧል!');
    }

    public function destroy($id)
    {
        $juice = \App\Models\Juice::findOrFail($id);
        $juice->delete(); // ከዳታቤዝ ያጠፋዋል

        return back()->with('success', 'ጁሱ በትክክል ጠፍቷል!');
    }

    // 1. የማስተካከያ ገጹን ዳታ ይዞ የሚከፍት
    public function edit($id)
    {
        $juice = \App\Models\Juice::findOrFail($id);
        return view('juices.edit', compact('juice'));
    }

// 2. የተስተካከለውን ዳታ ዳታቤዝ ውስጥ የሚቀይር
    public function update(Request $request, $id)
    {
        $juice = \App\Models\Juice::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required'
        ]);

        $juice->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect('/')->with('success', 'መረጃው በትክክል ተስተካክሏል!');
    }


    public function menu()
    {
        // ሁሉንም ጁሶች አምጣ
        $juices = \App\Models\Juice::all();

        // በምድብ ከፋፍላቸው (ካሪጎሪ ከሌለህ 'Classic' በሚል ግሩፕ ያደርጋቸዋል)
        $juicesByCategory = $juices->groupBy(function ($item) {
            return $item->category ?? 'Our Special Juices';
        });

        return view('menu', compact('juicesByCategory'));
    }
}
