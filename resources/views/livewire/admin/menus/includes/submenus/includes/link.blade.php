<li 
@if ($this->sortable) 
wire:key="task-{{ $item->getModel()->id }}" wire:sortable-group.item="{{ $item->getModel()->id }}"
@endif
 class=" w-full rounded cursor-pointer space-y-1">
    <div class="flex justify-between bg-gray-200 px-2">        
        @include(load_menu_builder_view('submenus.includes.button'))
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
</li>
