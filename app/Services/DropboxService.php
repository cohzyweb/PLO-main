<?php
namespace App\Services;

use GuzzleHttp\Client as GuzzleClient;
use Spatie\Dropbox\Client as DropboxClient;

class DropboxService
{
    protected DropboxClient $client;

    public function __construct()
    {
        $this->client = new DropboxClient($this->getAccessToken());
    }

    protected function getAccessToken():string
    {
        $client = new GuzzleClient();
        $response = $client->request('POST', 'https://api.dropbox.com/oauth2/token', [
            'auth'=>[
                config('services.dropbox.key'),
                config('services.dropbox.secret'),
            ],
            'form_params' => [
                'grant_type' => 'refresh_token',
                'refresh_token' => config('services.dropbox.refresh_token'),
            ],
        ]);
        return json_decode($response->getBody(), true)['access_token'];
    }

    public function uploadFile(string $path, string $content): array
    {
        return $this->client->upload($path, $content,'overwrite');
    }

    public function deleteFile(string $path): array
    {
        return $this->client->delete($path);
    }

    public function createSharedLink(string $path): array
    {
        $guzzle = new GuzzleClient();
        $accessToken = $this->getAccessToken();
        $response = $guzzle->request('POST', 'https://api.dropboxapi.com/2/sharing/create_shared_link_with_settings', [
            'headers' => [
                'Authorization' => 'Bearer '.$accessToken,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'path' => $path,
                'settings' => [
                    'requested_visibility' => 'public',
                    //'expires' => '2025-07-11T00:00:00Z',
                ]
            ],
        ]);
        return json_decode($response->getBody(), true);
    }
}

?>