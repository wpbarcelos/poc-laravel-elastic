<?php

namespace App\Console\Commands;

use App\Models\Movie;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class importcsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {


        $dataset = storage_path() . '/dataset-imdb.csv';

        $handle = fopen($dataset, 'r');


        $keys = [
            'cover',
            'title',
            'year',
            'certificate',
            'duration_min',
            'genre',
            'rate',
            'metascore',
            'director',
            'cast',
            'votes',
            'description',
            'review_count',
            'review_title',
            'review',
        ];

        $index = -1;

        while ($data = fgetcsv($handle, 2000, ',')) {
            $index++;
            if ($index == 0) {

                continue;
            }

            if( count($keys) != count($data)) {
                Log::info('não foi possivel inserir o filme',['data'=>$data]);
                continue;
            }


            $data = array_combine($keys, $data);

            $data['year'] = (int) $data['year'];
            $data['duration_min']   = (int) $data['duration_min'];
            $data['rate']           = (float) $data['rate'];
            $data['metascore']      = (int) $data['metascore'];
            $data['review_count']   = (int) $data['review_count'];

            Movie::create($data);

            $this->info($index);

        }
    }
}
