<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
// use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Endroid\QrCode\Encoding\Encoding;
use Illuminate\Support\Facades\Http;

class QRCodeController extends Controller
{
    public function generate($memberId)
    {
      $url = "http://plo-group.jp/admin/member/qrresult?qr={$memberId}";
      $qrCode = new QrCode(
        data: $url,
        encoding: new Encoding('UTF-8'),
        size: 300,
        margin: 10,
      );

      $writer = new PngWriter();
      $result = $writer->write($qrCode);
      Log::info($result->getString());
      Log::info($result->getMimeType());
      return new Response(
          $result->getString(),
          200,
          ['Content-Type' => $result->getMimeType()]
      );
    }
    // public function showTwitter(Request $request)
    // {
    //     $url = $request->query('url');
    //     Log::info($url);
    //     $response = Http::withHeader('User-Agent', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.0 Mobile/15E148 Safari/604.1')
    //         ->get($url);
    //     Log::info($response->body());
    //     // iframeで表示するためにヘッダーを設定
    //     $headers = [
    //         'Content-Type' => $response->header('Content-Type'),
    //         'X-Frame-Options' => 'SAMEORIGIN',
    //         'Content-Security-Policy' => "frame-ancestors 'self' *"
    //     ];

    //     return response($response->body(), $response->status(), $headers);
    // }

}
?>
