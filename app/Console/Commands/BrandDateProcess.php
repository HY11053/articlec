<?php

namespace App\Console\Commands;

use App\AdminModel\BrandData;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class BrandDateProcess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'brand:brandprocess';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $brands=explode(PHP_EOL,Storage::get('brands.txt'));
        foreach ($brands as $brand){
            $brand=str_replace('加盟','',$brand);
            if (str_contains($brand,'|')){
                $brand= substr($brand,0,stripos($brand,"|"));
            }
            $thisbrand=BrandData::where('brandname',$brand)->value('num');
            if (!empty($thisbrand)){
                BrandData::where('brandname',$brand)->update(['num'=>$thisbrand+1]);
            }else{
                BrandData::create(['brandname'=>$brand]);
            }
        }
        echo 'complet';
    }
}
