<?php

namespace App\Http\Controllers;

use App\Models\phonepe;
use App\Models\Appointment;
use App\Models\User;
use App\Models\invoice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class PhonepeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function managepayment()
    {
        $paymentdetails = phonepe::first();
        //dd($paymentdetails);
        return view('admin.managepayment', ['page_name' => 'Manage Payment Details', 'navstatus' => "phonepepayment", 'paymentdetails' => $paymentdetails]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->except('_token');
        //dd($data);
        $phonepedata = phonepe::select('id')->first();
        //dd($phonepedata);
        if ($phonepedata != null) {

            $phonepe['paymentamount'] = $data['paymentamount'] * 100;
            $phonepe['marchecntkey'] = $data['marchecntkey'];
            $phonepe['apikey'] = $data['apikey'];
            $phonepe['apiindex'] = $data['apiindex'];

            $update = phonepe::where('id', $phonepedata->id)
                ->update($phonepe);

            if ($update) {
                session(['status' => "1", 'msg' => 'Payment details Updated successfully']);
            } else {
                session(['status' => "0", 'msg' => 'Payment details is not Updated']);
            }
        } else {
            $newphonepe = new phonepe;
            $newphonepe->paymentamount = $data['paymentamount'] * 100;
            $newphonepe->marchecntkey = $data['marchecntkey'];
            $newphonepe->apikey = $data['apikey'];
            $newphonepe->apiindex = $data['apiindex'];

            //set session
            if ($newphonepe->save()) {
                session(['status' => "1", 'msg' => 'Payment details Updated successfully']);
            } else {
                session(['status' => "0", 'msg' => 'Payment details is not Updated']);
            }
        }
        return redirect()->back();
    }

    /**
     * phonepe page create.
     */
    public function phonePe($id)
    {
        $id = base64_decode($id);
        $phonepedata = phonepe::first();

        $users = User::leftJoin('appointments', 'users.id', '=', 'appointments.userId')->select('appointments.whatsappNumber', 'users.name', 'users.id')->where('appointments.id', $id)->first();

        $username = preg_replace('/\s+/', '', $users->name);
        $merchantTransactionId = substr(strtoupper($username), 0, 4) . time();

        $data = array(
            'merchantId' => $phonepedata->marchecntkey,
            'merchantTransactionId' => 'AADD' . $merchantTransactionId,
            'merchantUserId' => 'AADD' . $users->id,
            'amount' => $phonepedata->paymentamount,
            'redirectUrl' => route('response'),
            'redirectMode' => 'POST',
            'callbackUrl' => route('response'),
            'mobileNumber' => $users->whatsappNumber,
            'paymentInstrument' =>
                array(
                    'type' => 'PAY_PAGE',
                ),
        );

        $encode = base64_encode(json_encode($data));

        $saltKey = $phonepedata->apikey;
        $saltIndex = $phonepedata->apiindex;

        $string = $encode . '/pg/v1/pay' . $saltKey;
        $sha256 = hash('sha256', $string);

        $finalXHeader = $sha256 . '###' . $saltIndex;

        $url = "https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay";

        $response = Curl::to($url)
            ->withHeader('Content-Type:application/json')
            ->withHeader('X-VERIFY:' . $finalXHeader)
            ->withData(json_encode(['request' => $encode]))
            ->post();

        $rData = json_decode($response);
        if ($rData->success == true) {
            //dd($rData);
            $updatedata['merchantTransactionId'] = $rData->data->merchantTransactionId;
            $updateappointment = Appointment::where('id', '=', $id)->update($updatedata);
            return redirect()->to($rData->data->instrumentResponse->redirectInfo->url);
        } else {
            session(['status' => "0", 'msg' => 'Payment failed, Please try again']);
            return redirect()->back();
        }
    }
    /**
     * Display the specified resource.
     */
    public function response(Request $request)
    {
        $input = $request->all();

        $phonepedata = phonepe::first();
        $saltKey = $phonepedata->apikey;
        $saltIndex = $phonepedata->apiindex;

        $merchantId = $input['merchantId'];
        $providerReferenceId = $input['providerReferenceId'];

        $finalXHeader = hash('sha256', '/pg/v1/status/' . $input['merchantId'] . '/' . $input['transactionId'] . $saltKey) . '###' . $saltIndex;

        $response = Curl::to('https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/status/' . $input['merchantId'] . '/' . $input['transactionId'])
            ->withHeader('Content-Type:application/json')
            ->withHeader('accept:application/json')
            ->withHeader('X-VERIFY:' . $finalXHeader)
            ->withHeader('X-MERCHANT-ID:' . $input['transactionId'])
            ->get();

        $response = json_decode($response);

        if ($response) {

            if ($response->success == true) {
                $newInvoice = new invoice;
                $responcedata = $response->data;

                $appointmentid = Appointment::where('merchantTransactionId', '=', $responcedata->merchantTransactionId)->select('id')->first();
                //dd($appointmentid);

                $newInvoice->appointmentid = $appointmentid->id;
                $newInvoice->merchantTransactionId = $responcedata->merchantTransactionId;

                $transactionId = $responcedata->transactionId;
                $newInvoice->transactionId = $transactionId;

                $newInvoice->providerReferenceId = $providerReferenceId;

                $newInvoice->amount = $responcedata->amount;
                $newInvoice->status = $responcedata->state;
                $newInvoice->responseCode = $responcedata->responseCode;

                $carddata = $responcedata->paymentInstrument;
                //dd($carddata);
                $newInvoice->cardType = $carddata->type;
                $newInvoice->type = $carddata->type;
                $newInvoice->pgTransactionId = $carddata->pgTransactionId;
                if ($carddata->bankTransactionId == null) {
                    $bankTransactionId = "";
                } else {
                    $bankTransactionId = $carddata->bankTransactionId;
                }
                $newInvoice->bankTransactionId = $bankTransactionId;
                $newInvoice->pgAuthorizationCode = "";
                if ($carddata->bankId == null) {
                    $bankId = "";
                } else {
                    $bankId = $carddata->bankId;
                }
                $newInvoice->bankId = $bankId;
                $newInvoice->brn = "";

                if ($newInvoice->save()) {
                    session(['status' => "1", 'msg' => 'Payment is successfull']);
                } else {
                    session(['status' => "0", 'msg' => $response->message]);
                }
            } else {
                session(['status' => "0", 'msg' => $response->message]);
            }
        } else {
            session(['status' => "0", 'msg' => 'Payment failed']);
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(phonepe $phonepe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, phonepe $phonepe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(phonepe $phonepe)
    {
        //
    }
}