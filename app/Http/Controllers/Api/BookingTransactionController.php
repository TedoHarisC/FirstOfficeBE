<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingTransactionRequest;
use App\Http\Resources\Api\BookingTransactionResource;
use App\Models\BookingTransaction;
use App\Models\OfficeSpace;
use Illuminate\Http\Request;

class BookingTransactionController extends Controller
{
    public function store(StoreBookingTransactionRequest $request)
    {
        $validatedData = $request->validated();

        $office_space = OfficeSpace::findOrFail($validatedData['office_space_id']);

        $validatedData['is_paid'] = false;
        $validatedData['booking_trx_id'] = BookingTransaction::generateUniqueTrxId();
        $validatedData['duration'] = $office_space->duration;

        $validatedData['ended_at'] = (new \DateTime($validatedData['started_at']))
            ->modify("+{$validatedData['duration']} days")->format('Y-m-d');

        $bookingTransaction = BookingTransaction::create($validatedData);

        $bookingTransaction->load('officeSpace');
        return new BookingTransactionResource($bookingTransaction);

        // send notification to the user melalui sms atau whatsapp dengan twilio

    }
}
