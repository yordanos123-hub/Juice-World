<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Juice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JuiceController extends Controller
{


    public function index()
    {
        $allBranches = Branch::all();
        $juicesByCategory = Juice::all()->groupBy('category');

        return view('welcome', compact('allBranches', 'juicesByCategory'));
    }

    /**
     * ቅርንጫፍ ገጽ - የአንድን ቅርንጫፍ ሜኑ በምድብ ያሳያል
     */
    public function show($id)
    {
        // 1. ቅርንጫፉን ከነ ጁሶቹ ፈልግ
        $branch = \App\Models\Branch::with('juices')->findOrFail($id);

        // 2. ጁሶቹን በምድብ ከፋፍላቸው
        $juicesByCategory = $branch->juices->groupBy('category');

        return view('branch-menu', compact('branch', 'juicesByCategory'));
    }
    /**
     * አዲስ ጁስ መመዝገቢያ ፎርም (Admin)
     */
    public function create()
    {
        $branches = Branch::all();
        return view('juices.create', compact('branches'));
    }

    /**
     * አዲስ ጁስ ዳታቤዝ ውስጥ መመዝገብ (ፎቶን ጨምሮ)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:juices,name',
            'price' => 'required|numeric',
            'description' => 'required',
            'category' => 'required',
            'branch_id' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('juices', 'public');
        }

        $juice = Juice::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category' => $request->category,
            'image' => $imagePath,
        ]);

        $juice->branches()->attach($request->branch_id);

        return redirect('/')->with('success', 'አዲስ ጁስ በትክክል ተመዝግቧል!');
    }

    /**
     * ጁስ ማስተካከያ ገጽ
     */
    public function edit($id)
    {
        $juice = Juice::findOrFail($id);
        return view('juices.edit', compact('juice'));
    }

    /**
     * የተስተካከለ መረጃን ዳታቤዝ ውስጥ መቀየር
     */
    public function update(Request $request, $id)
    {
        $juice = Juice::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // አሮጌውን ፎቶ ያጠፋዋል
            if ($juice->image) { Storage::disk('public')->delete($juice->image); }
            $juice->image = $request->file('image')->store('juices', 'public');
        }

        $juice->update($request->only('name', 'price', 'description'));

        return redirect('/')->with('success', 'መረጃው በትክክል ተስተካክሏል!');
    }

    /**
     * ጁስ ማጥፊያ
     */
    public function destroy($id)
    {
        $juice = Juice::findOrFail($id);
        if ($juice->image) { Storage::disk('public')->delete($juice->image); }
        $juice->delete();

        return back()->with('success', 'ጁሱ በትክክል ጠፍቷል!');
    }

    /**
     * ስለ እኛ ገጽ
     */
    public function about()
    {
        return view('about');
    }
}
