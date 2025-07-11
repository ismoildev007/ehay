<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        // Validatsiya
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string',
        ]);

        // Ma'lumotni bazaga saqlash
        $order = new Order();
        $order->full_name = $validated['full_name'];
        $order->phone = $validated['phone'];
        $order->message = $validated['message'] ?? null;
        $order->product_id = $request->input('product_id') ?? null;

        $order->save();

        // Qaytish (masalan, thank you sahifasiga yoki orqaga)
        return redirect()->back()->with('success', 'Order successfully submitted!');
    }
}
