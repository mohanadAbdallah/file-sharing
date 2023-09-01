<?php

namespace App\Listeners;

use App\Events\FileDownloaded;
use App\Models\DownloadActivity;

use GuzzleHttp\Client;



class SendFileDetailsNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(FileDownloaded $event): void
    {
        $apiKey = 'b3d2d4ca7da94f4b8459996203919dda';
        $client = new Client();
        $response = $client->get('https://api.ipify.org?format=json');
        $data = json_decode($response->getBody(), true);
        $publicIp = $data['ip'];

        try {
            $response = $client->get("https://api.ipgeolocation.io/ipgeo?apiKey={$apiKey}&ip={$publicIp}");
            $data = json_decode($response->getBody(), true);

        } catch (\Exception $e) {
            dd($e);
        }

        DownloadActivity::create([
            'ip_address' => request()->ip(),
            'file_id' => $event->file->id,
            'user_agent' => request()->userAgent(),
            'address' => $data['country_name'] .'-' . $data['city'] . '-'. $data['latitude'] .'-'. $data['longitude'],
            'country' => $data['country_name']
        ]);
        $event->file->increment('download_count');
    }
}
