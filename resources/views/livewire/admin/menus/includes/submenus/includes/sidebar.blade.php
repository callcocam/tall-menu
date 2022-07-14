<ul class="w-full bg-white rounded-lg  text-gray-900 space-y-1  overflow-hidden"
    @if ($this->sortable) wire:sortable="updateGroupMenuOrder" wire:sortable-group="updateSubMenuOrder" @endif>
    @foreach ($items as $item)
        @if ($item->hasChilds())
            @include(load_menu_builder_view('submenus.includes.dropdown'), compact('item'))
        @else
            @include(load_menu_builder_view('submenus.includes.link'), compact('item'))
        @endif
    @endforeach
</ul>
