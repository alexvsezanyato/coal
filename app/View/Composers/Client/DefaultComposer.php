<?php

namespace App\View\Composers\Client;

use Illuminate\View\View;
use App\Services\BasketService;
use App\Models\Menu;
use App\Models\Category;

class DefaultComposer
{
    protected ?View $view;

    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $this->view = $view;

        $this->shareMenu();
        $this->shareSubmenu();
        $this->shareTotalPrice();
    }

    protected function shareMenu(): void
    {
        $this->view->with('menu', Menu::all());
    }

    protected function shareSubmenu(): void
    {
        $basketService = app()->make(BasketService::class);

        $submenu = [];

        $submenu['categories'] = Category::all();

        $submenu['catalog'] = [
            'name' => 'Каталог',
            'link' => '/catalog',
        ];

        $this->view->with('submenu', $submenu);
    }

    /**
     * @throws BindingResolutionException
     */
    protected function shareTotalPrice(): void
    {
        $basketService = app()->make(BasketService::class);
        $this->view->with('price', $basketService->getTotalPrice());
    }
}
