<?php

namespace App\Http\Controllers\Admin;

use App\BankMaster;
use App\Category;
use App\Http\Controllers\Controller;
use App\RekeningMaster;
use App\StatusMaster;
use App\PaymentMethod;
use App\RoomType;
use App\Airline;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

class MasterDataController extends Controller
{

    public function index()
    {
        $method = PaymentMethod::all();
        $room = RoomType::all();
        $airlines = Airline::all();
        $categories = Category::all();
        $banks = BankMaster::all();
        $rekening = RekeningMaster::all();
        return view('admin.masterData.index',
            [
                'methods' => $method,
                'rooms' => $room,
                'airlines' => $airlines,
                'categories' => $categories,
                'rekenings' => $rekening,
                'banks' => $banks
            ]);
    }

    public function createRoomType()
    {
        $statusMaster = $this->statusMaster();
        return view('admin.masterData.room.createRoomType', [
            'status' => $statusMaster
        ]);
    }

    public function storeRoomType(Request $request)
    {
        $data = $request->all();
        $roomType = RoomType::create($data);
        $this->messageStatusCreate($roomType,$request);

        return redirect()->route('masterData');
    }

    public function editRoomType($id)
    {
        $room = RoomType::find($id);
        $statusMaster = $this->statusMaster();
        return view('admin.masterData.room.editRoomTYpe', ['room' => $room, 'status' => $statusMaster]);
    }

    public function updateRoomType($id, Request $request)
    {
        $room = RoomType::where('id', $id)->update([
            'room_name' => $request->room_name,
            'room_capacity' => $request->room_capacity,
            'room_price' => $request->room_price,
            'status_id' => $request->status_id
        ]);

        $this->messageStatusUpdate($room,$request);

        return redirect()->route('masterData');
    }

    public function createAirlines()
    {
        $statusMaster = $this->statusMaster();
        return view('admin.masterData.airlines.createAirlines', ['status' => $statusMaster]);
    }

    public function storeAirlines(Request $request)
    {
        $data = $request->all();
        $airlines = Airline::create($data);

        $this->messageStatusCreate($airlines,$request);

        return redirect()->route('masterData');
    }

    public function editAirlines($id)
    {
        $airlines = Airline::find($id);
        $statusMaster = $this->statusMaster();
        return view('admin.masterData.airlines.editAirlines', [
            'airlines' => $airlines,
            'status' => $statusMaster
        ]);
    }

    public function updateAirlines($id, Request $request)
    {
        $airlines = Airline::find($id)->update([
            'airlines' => $request->airlines_name,
            'status_id' => $request->status_id
        ]);
        $this->messageStatusUpdate($airlines,$request);
        return redirect()->route('masterData');
    }

    public function createCategory()
    {
        $statusMaster =$this->statusMaster();
        return view('admin.masterData.category.createCategory', ['status' => $statusMaster]);
    }

    public function storeCategory(Request $request)
    {
        $data = $request->all();
        $category = Category::create($data);

        $this->messageStatusCreate($category,$request);

        return redirect()->route('masterData');
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        $statusMaster = $this->statusMaster();
        return view('admin.masterData.category.editCategory', [
            'status' => $statusMaster,
            'category' => $category
        ]);
    }

    public function updateCategory($id, Request $request)
    {
        $category = Category::find($id)->update([
            'category_name' => $request->category_name,
            'status_id' => $request->status_id
        ]);
        $this->messageStatusUpdate($category,$request);
        return redirect()->route('masterData');
    }

    public function createMethod()
    {
        $statusMaster = $this->statusMaster();
        return view('admin.masterData.method.createMethod', ['status' => $statusMaster]);
    }

    public function storeMethod(Request $request)
    {
        $data = $request->all();
        $status = PaymentMethod::create($data);

        $this->messageStatusCreate($status,$request);
        return redirect()->route('masterData');
    }

    public function editMethod($id)
    {
        $method = PaymentMethod::find($id);
        $statusMaster = $this->statusMaster();
        return view('admin.masterData.method.editMethod',
            [
                'status' => $statusMaster,
                'method' => $method
            ]);
    }

    public function updateMethod($id, Request $request)
    {
        $method = PaymentMethod::find($id)->update([
            'payment_name' => $request->payment_name,
            'status_id' => $request->status_id,
        ]);

        $this->messageStatusUpdate($method, $request);

        return redirect()->route('masterData');
    }

    public function createBank()
    {
        $statusMaster = $this->statusMaster();
        $paymentMehots = PaymentMethod::where('status_id', 2)->get();
        return view('admin.masterData.createBank',
            [
                'status' => $statusMaster,
                'methods' => $paymentMehots
            ]);
    }

    public function storeBank(Request $request)
    {
        $data = BankMaster::create($request->all());

        $this->messageStatusCreate($data,$request);

        return redirect()->route('masterData');
    }

    public function addRekening()
    {
        $statusMaster = $this->statusMaster();
        $banks = BankMaster::where('status_id', 2)->get();

        return view('admin.masterData.createRekening', [
            'status' => $statusMaster,
            'banks' => $banks
        ]);
    }

    public function storeRekening(Request $request)
    {
        $data = $request->all();
        $rekening = RekeningMaster::create($data);

        $this->messageStatusCreate($rekening,$request);

        return redirect()->route('masterData');

    }

    public function editRekening($id)
    {
        $rekening = RekeningMaster::find($id);
        $statusMaster = $this->statusMaster();
        $banks = BankMaster::where('status_id', 2)->get();

        return view('admin.masterData.editRekening', [
            'rekening' => $rekening,
            'banks' => $banks,
            'status' => $statusMaster
        ]);

    }

    public function updateRekening($id, Request $request)
    {
        $rekening = RekeningMaster::find($id)->update([
            'bank_id' => $request->bank_id,
            'norekening' => $request->norekening,
            'rekening_name' => $request->rekening_name,
            'status_id' => $request->status_id
        ]);

        $this->messageStatusUpdate($rekening, $request);

        return redirect()->route('masterData');
    }

    public function messageStatusUpdate($st, Request $request)
    {
        if (!$st) {
            $request->session()->flash('status', false);
            $request->session()->flash('message', 'Error Updates Data');
            return redirect()->route('masterData');
        }
        $request->session()->flash('status', true);
        $request->session()->flash('message', 'Successfully Updates Data');

        return $request;
    }
    public function messageStatusCreate($st, Request $request)
    {
        if ($st == null) {
            $request->session()->flash('status', false);
            $request->session()->flash('message', 'error save data');
            return redirect()->route('masterData');
        }
        $request->session()->flash('status', true);
        $request->session()->flash('message', 'Successfully Created Data');

            return $request;
    }
    public function statusMaster(){
        return StatusMaster::where('status_code', 'sa')->get();
    }
}
