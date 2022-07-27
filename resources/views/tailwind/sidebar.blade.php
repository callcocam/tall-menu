@foreach ($items as $item)
    @if ($item->hasChilds())
        @include('menu::tailwind.item.dropdown', compact('item'))
    @else
        @include('menu::tailwind.item.link', compact('item'))
    @endif
@endforeach

