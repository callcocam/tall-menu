<div class="col-span-1 sm:col-span-2">
    <x-select label="{{ __('Selecione uma rota') }}" placeholder="{{ __('Selecione uma rota') }}"
        wire:model="data.attribute.route">
        <x-select.option label="{{ __('Selecione') }}" value="" />
        @if ($routes = $this->routes)
            @foreach ($routes as $route)
                <x-select.option label="{{ $route }}" value="{{ $route }}" />
            @endforeach
        @endif
    </x-select>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <x-input label="{{ __('Name') }}" placeholder="{{ __('Name') }}" wire:model.defer="data.name" />
    <x-input label="{{ __('Path') }}" placeholder="{{ __('Path') }}" wire:model.defer="data.attribute.path" />
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <x-input label="{{ __('Icone') }}" placeholder="{{ __('Icone') }}" wire:model.defer="data.attribute.icon" />
    <x-input label="{{ __('Template') }}" placeholder="{{ __('Template') }}" wire:model.defer="data.attribute.template" />
</div>
