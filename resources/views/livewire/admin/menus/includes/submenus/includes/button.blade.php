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
            @if ($route = data_get($model, 'attribute.route'))
                / {{ __('Route') }} : <span class="font-normal">{{ $route }}</span>
            @endif
            @if ($path = data_get($model, 'attribute.path'))
                / {{ __('Path') }} : <span class="font-normal">{{ $path }}</span>
            @endif
            @if ($route = data_get($model, 'sub_menu_id'))
                / {{ __('SUB MENU') }} : <span class="font-normal">{{ data_get($model, 'sub_menu_id') }}</span>
            @else
                / {{ __('ID') }} : <span class="font-normal">{{ data_get($model, 'id') }}</span>
            @endif
        @endif
    </span>
</div>
