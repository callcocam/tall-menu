<div>
    <x-button xs squared type="button" wire:click="openModal" label="{{ __('Add') }}" icon="plus" />
    <form wire:submit.prevent="saveAndStay">
        <x-modal.card hide-close title="{{ $this->title }}" blur wire:model.defer="cardModal">
            @include(load_menu_builder_view('submenus.form'))
            <x-slot name="footer">
                <div class="flex justify-between gap-x-4">
                    <x-button  flat label="Cancel" x-on:click="close" />
                    <x-button type="submit" primary label="{{ __('Add menu') }}" />
                </div>
            </x-slot>
        </x-modal.card>
    </form>
</div>
