<li @if ($this->sortable) wire:key="task-{{ $item->getModel()->id }}" wire:sortable-group.item="{{ $item->getModel()->id }}" @endif
    class=" w-full rounded cursor-pointer space-y-1">
    <div class="flex justify-between bg-gray-200 px-2">
        @include(load_menu_builder_view('submenus.includes.button'))
        <div>
            @if (!$this->sortable)
                @if ($model = $item->getModel())
                    <div class="flex px-2 space-x-2 align-middle">
                        @if (!data_get($model, 'attribute.route'))
                            @livewire(load_menu_builder_component('submenus.items.add-component'), ['model' => $model], key(sprintf('submenus-create-%s', $model->id)))
                        @endif
                        @livewire(load_menu_builder_component('submenus.update-component'), ['model' => $model], key(sprintf('submenus-edit-%s', $model->id)))
                        @livewire(load_menu_builder_component('submenus.delete-component'), ['model' => $model], key(sprintf('submenus-delete-%s', $model->id)))
                    </div>
                @endif
            @endif
        </div>
    </div>
</li>
