<?php

namespace App\Console\Commands\API\Weather;

use App\Models\Other\API\APICalls;
use App\Traits\Common\APITrait;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class TriggerJobs extends Command
{
    use APITrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:trigger-jobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void{
        $array = [
            "vrijeme24" => [
                "id" => 1,
                "data" => [
                    "twelve-hour-forecast" => env('API_WEATHER_APP') . "/api-calls/twelve-hour-forecast",
                    "five-days-forecast" => env('API_WEATHER_APP') . "/api-calls/five-days-forecast"
                ]
            ]
        ];

        $client = new Client();

        foreach ($array as $items) {
            foreach ($items['data'] as $key => $item) {
                try{
                    $response = $client->request('GET', $item);
                    if($response->getStatusCode() == 200)  {
                        $this->updateAPI(1, $key, 'success');
                    }else{
                        // Error message
                        $this->updateAPI(1, $key, 'error', json_decode($response->getBody()));
                    }

                }catch (\Exception $e){
                    $this->updateAPI(1, $key, 'error', $e->getMessage());
                }
            }
        }
    }
}
