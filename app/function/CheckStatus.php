public function chanegeStatus(Request $request)
{
//przyjazd na magazyn
$loading_status = $request->input('loading_Status');
//odjazd
$loading_status_finish = $request->input('loading_Status_finish');

//[rzyjazd na rozladunek
$unloading_status = $request->input('unloading_Status');
//odjazd
$unloading_status_finish = $request->input('unloading_Status_finish');


$order_id = $request->input('order_id');


if ($loading_status) {
//zaznaczanie przybycia na magazyn
$currentOrder = order_user::where('order_id', $order_id)
->with('order', 'user')
->firstOrFail();


$currentOrder->przyjazd_zaladunek =  now()->format('Y-m-d H:i');
$currentOrder->update();
return redirect()->back()->with('success', 'Zaznaczono przyjazd na magazyn w zamowieniu o id '. $currentOrder->id);

} elseif ($loading_status_finish) {
$loading_status_active = order_user::where('order_id', $order_id)
->with('order', 'user')
->firstOrFail();
//nie dotarl na magazyn


if ($loading_status_active->whereNull('przyjazd_zaladunek')->exists()) {
session()->flash('error', 'Kierowca dotarł na magazyn');
return redirect()->back();
} //dojechal i zaznacza przyjazd
else {
$currentOrder = order_user::where('order_id', $order_id)
->with('order', 'user')
->firstOrFail();

dd($currentOrder);

}
} elseif ($unloading_status) {


$loading_status_active = order_user::where('order_id', $order_id)
->with('order', 'user')
->firstOrFail();

if ($loading_status_active->whereNull('odjazd_dostawa')->exists()) {
session()->flash('error', 'Kierowca nie zaznaczyl zaladunku');
return redirect()->back();
}

dd('rozladunek ' . $unloading_status . " o id rozladunku " . $order_id);
} elseif ($unloading_status_finish) {


$loading_status_active = order_user::where('order_id', $order_id)
->with('order', 'user')
->firstOrFail();
//nie zaznaczono odjazdu z magazynu


if ($loading_status_active->whereNull('odjazd_zaladunek')->exists()) {
session()->flash('error', 'Kierowca nieskonczyl zaladunku w  magazynie');
return redirect()->back();
}
if ($loading_status_active->whereNull('przyjazd_dostawa')->exists()) {
session()->flash('error', 'Kierowca nie zaznaczyl startu dostawy');
return redirect()->back();
}


dd('rozladunek ' . $unloading_status . " o id rozladunku " . $order_id);
}
}
