<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Response;

class QRCodeController extends Controller
{
    public function generate($memberId)
    {
        $qrCodeResult = Builder::create()
            ->writer(new PngWriter())
            ->data("member:$memberId") // 任意のフォーマット
            ->size(300)
            ->margin(10)
            ->build();

        return response($qrCodeResult->getString())
            ->header('Content-Type', $qrCodeResult->getMimeType());
    }
}
?>