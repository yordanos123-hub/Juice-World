<!DOCTYPE html>
<html>
<body>
<div style="font-family: sans-serif; border: 1px solid #eee; padding: 20px; border-radius: 10px;">
    <h1 style="color: #f97316;">Just Juice 🥤</h1>
    <h2>ሰላም {{ $order->user->name }},</h2>
    <p>ትዕዛዝዎ በ <strong>{{ $order->branch->name }}</strong> ተቀባይነት አግኝቷል።</p>
    <p>የታዘዘው ጁስ፡ <strong>{{ $order->juice->name }}</strong></p>
    <p>በቅርቡ ይደርሰዎታል። እናመሰግናለን!</p>
</div>
</body>
</html>
