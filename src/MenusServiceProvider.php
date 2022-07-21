<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Menus;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class MenusServiceProvider extends ServiceProvider
{
  
    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->registerNamespaces();
        $this->registerMenusFile();
        $this->publishMigrations();
        $this->loadMigrations();
        $this->publishAssets();
        Livewire::component( 'tall-menus::admin.menus.list-component', \Tall\Menus\Http\Livewire\Admin\Menus\ListComponent::class);
        Livewire::component( 'tall-menus::admin.menus.create-component', \Tall\Menus\Http\Livewire\Admin\Menus\CreateComponent::class);
        Livewire::component( 'tall-menus::admin.menus.edit-component', \Tall\Menus\Http\Livewire\Admin\Menus\EditComponent::class);
       
        Livewire::component( 'tall-menus::admin.menus.builder-component', \Tall\Menus\Http\Livewire\Admin\Menus\BuilderComponent::class);
        Livewire::component( 'tall-menus::admin.menus.includes.submenus.add-component', \Tall\Menus\Http\Livewire\Admin\Menus\Includes\Submenus\AddComponent::class);
        Livewire::component( 'tall-menus::admin.menus.includes.submenus.update-component', \Tall\Menus\Http\Livewire\Admin\Menus\Includes\Submenus\UpdateComponent::class);
        Livewire::component( 'tall-menus::admin.menus.includes.submenus.delete-component', \Tall\Menus\Http\Livewire\Admin\Menus\Includes\Submenus\DeleteComponent::class);
       
        Livewire::component( 'tall-menus::admin.menus.includes.submenus.items.add-component', \Tall\Menus\Http\Livewire\Admin\Menus\Includes\Submenus\Items\AddComponent::class);
        Livewire::component( 'tall-menus::admin.menus.includes.submenus.items.update-component', \Tall\Menus\Http\Livewire\Admin\Menus\Includes\Submenus\Items\UpdateComponent::class);
        Livewire::component( 'tall-menus::admin.menus.includes.submenus.items.delete-component', \Tall\Menus\Http\Livewire\Admin\Menus\Includes\Submenus\Items\DeleteComponent::class);
        
        // Livewire::component( 'tall-menus::admin.menus.includes.submenus.items.sub.add-component', \Tall\Menus\Http\Livewire\Admin\Menus\Includes\Submenus\Items\Sub\AddComponent::class);
        // Livewire::component( 'tall-menus::admin.menus.includes.submenus.items.sub.update-component', \Tall\Menus\Http\Livewire\Admin\Menus\Includes\Submenus\Items\Sub\UpdateComponent::class);
        // Livewire::component( 'tall-menus::admin.menus.includes.submenus.items.sub.delete-component', \Tall\Menus\Http\Livewire\Admin\Menus\Includes\Submenus\Items\Sub\DeleteComponent::class);
        
        $this->app->register(RouteServiceProvider::class);

 
    }

      /**
     * Publish the config file.
     *
     * @return void
     */
    protected function publishAssets()
    {
    
        $this->publishes([
            __DIR__.'/../public/js/menu.js' => public_path('js/menu.js'),
            __DIR__.'/../public/css/menu.css' => public_path('css/menu.css')
        ], 'tall-assets');
    }

    /**
     * Require the menus file if that file is exists.
     */
    public function registerMenusFile()
    {
        if (file_exists($file = __DIR__.'/Support/menus.php')) {
            require $file;
        }
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->registerHtmlPackage();

        $this->app->singleton('menus', function ($app) {
            return new Menu($app['view'], $app['config']);
        });
    }

    /**
     * Register "iluminate/html" package.
     */
    private function registerHtmlPackage()
    {
        // $this->app->register('Collective\Html\HtmlServiceProvider');

        // $aliases = [
        //     'HTML' => 'Collective\Html\HtmlFacade',
        //     'Form' => 'Collective\Html\FormFacade',
        // ];

        // AliasLoader::getInstance($aliases)->register();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['menus'];
    }

    /**
     * Register package's namespaces.
     */
    protected function registerNamespaces()
    {
        $configPath = __DIR__ . '/../config/menus.php';
        $viewsPath = __DIR__ . '/../resources/views';
        $this->mergeConfigFrom($configPath, 'menus');
        $this->loadViewsFrom($viewsPath, 'tall-menus');
      
        $this->publishes([
            $configPath => config_path('menus.php'),
        ], 'tall-menus-config');

        $this->publishes([
            $viewsPath => base_path('resources/views/vendor/tall/menus'),
        ], 'tall-menus-views');
    }

    
    /**
     * Publish the migration files.
     *
     * @return void
     */
    protected function publishMigrations()
    {
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations'),
        ], 'tall-menus-migrations');
        
        $this->publishes([
            __DIR__.'/../database/factories/' => database_path('factories'),
        ], 'tall-menus-factories');
        
    }

    /**
     * Load our migration files.
     *
     * @return void
     */
    protected function loadMigrations()
    {
        if (config('menus.migrate', true)) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }
    }
}
