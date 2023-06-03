<?php

namespace App\Console\Commands;

use App\Models\Page;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Spatie\Sitemap\Tags\Url;


class Sitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate
    {model : The name of the model for which you want to create a sitemap}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manage site map files of different models';

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
     */
    public function handle()
    {

        $sitemap = new \Spatie\Sitemap\Sitemap();

        $model = 'App' . '\\' . 'Models' . '\\' . $this->argument('model');


        if(!class_exists($model)) {
            return $this->error('Model not found');
        }

        if(!method_exists($model, 'getSitemapUrl')) {
            return $this->error($this->argument('model') . ' should use SitemapableTrait');
        }

        foreach ($model::all() as $m) {
            $sitemap->add(
                Url::create($m->getSitemapUrl())->setPriority(1)
            );
        }

        $siteMapFileName = ($this->argument('model') . 'Sitemap');

        $sitemap->writeToFile(public_path("{$siteMapFileName}.xml"));

        return $this->comment($this->argument('model') . ' sitemap has been created successfully');
    }
}
