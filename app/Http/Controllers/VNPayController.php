<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VNPayController extends Controller
{
    public const VNP_TMNCODE = "4HW7UQH0"; //Mã website tại VNPAY 
    public const VNP_HASHSECRET = "JLRKNRCTCCAVQKSHNSCGQNTWHHXLEYHY"; //Chuỗi bí mật
    public const VNP_URL = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    public const VNP_RETURN_URL = "http://localhost:8000/vnpay/return";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function vnpayIpn(Request $request)
    {
        $inputData = $request->all();
        $returnData = array();
        Log::info('VNPAY IPN', $inputData);
        return response()->json([
			"RspCode"=> "00",
			"Message"=> "Confirm Success"
		]);
    }

    public function vnpayReturn(Request $request)
    {
        dd($request->all());
    }

    public function vnpayCreate(Request $request)
    {
        $vnp_TxnRef = date('Ymdhis'); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Noi dung thanh toan';
        $vnp_OrderType = '250006';
        $vnp_Amount = 120000 * 100;
        $vnp_Locale = 'vn';
        // $vnp_BankCode = $_POST['bank_code'];
        $vnp_IpAddr = request()->ip();
        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => self::VNP_TMNCODE,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => self::VNP_RETURN_URL,
            "vnp_TxnRef" => $vnp_TxnRef,
        );
        ksort($inputData);
        $hashdata = urldecode(http_build_query($inputData));
        $inputData['vnp_SecureHashType'] = 'SHA256';
        $inputData['vnp_SecureHash'] = hash('sha256', self::VNP_HASHSECRET . $hashdata);
        $vnp_Url = self::VNP_URL . '?' . http_build_query($inputData);
        return response()->json([
			"code"=> "00",
            "message"=> "Success",
            "data" => $vnp_Url,
            "APP_NAME" => env('APP_NAME'),
		]);
    }
}
