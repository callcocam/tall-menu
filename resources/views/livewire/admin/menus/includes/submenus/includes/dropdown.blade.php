<li @if ($this->sortable) wire:key="group-{{ $item->getModel()->id }}" wire:sortable.item="{{ $item->getModel()->id }}" @endif
    class=" w-full rounded cursor-pointer space-y-1">
    <div class="flex justify-between bg-gray-200 px-2">
        <div class="flex space-x-2 items-center">
            @if ($this->sortable)
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-move" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                </svg>
            @endif
            <span class="font-bold">
                {{ __($item->title) }}
                @if ($model = $item->getModel())
                    / {{ __('ID') }} : <span class="font-normal">{{ data_get($model, 'id') }}</span>
                @endif
            </span>
        </div>
        <div>
            @if ($model = $item->getModel())
                <div class="flex px-2 space-x-2 align-middle">
                    @if (!data_get($model, 'attribute.route'))
                        @livewire(load_menu_builder_component('submenus.items.add-component'), ['model' => $model], key(sprintf('submenu-create-%s', $model->id)))
                    @endif
                    @livewire(load_menu_builder_component('submenus.update-component'), ['model' => $model], key(sprintf('submenu-edit-%s', $model->id)))
                    @livewire(load_menu_builder_component('submenus.delete-component'), ['model' => $model], key(sprintf('submenu-delete-%s', $model->id)))
                </div>
            @endif
        </div>
    </div>
    <ul class="bg-white px-4 space-y-1">
        @foreach ($item->childs as $child)
            @if ($child->hasChilds())
                @include(load_menu_builder_view('submenus.includes.dropdown'), [
                    'item' => $child,
                ])
            @else
                @include(load_menu_builder_view('submenus.includes.link'), [
                    'item' => $child,
                ])
            @endif
        @endforeach
    </ul>
</li>
