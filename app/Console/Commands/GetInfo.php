<?php

namespace App\Console\Commands;

use App\RosReestraInfo;
use Illuminate\Console\Command;

class GetInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:info {cadastralnumber}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets info using cadastral number';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = $this->argument('cadastralnumber');

        $array = explode(',', $data);
        /*$this->info($array[0]);*/

        $headers = ['CN', 'address', 'cost', 'area'];

        $info = $data = RosReestraInfo::select('c_n', 'address', 'cost', 'area')->wherein('c_n', $array)->get()->toArray();
        $this->table($headers, $info);
    }
}
