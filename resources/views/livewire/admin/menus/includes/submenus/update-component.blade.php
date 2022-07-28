<div>
    <span class="hidden sm:block ml-3">
        <x-button xs positive squared type="button" wire:click="openModal" label="{{ __('Edit') }}" icon="pencil" />
    </span>
    <form wire:submit.prevent="saveAndStay">
        <x-modal.card hide-close title="{{ $this->title }}" blur wire:model.defer="cardModal" x-on:close="$wire.closeModal()" >
           @include(load_menu_builder_view('submenus.form'))
            <x-slot name="footer">
                <div class="flex justify-between gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button type="submit" primary label="{{ __('Save Change') }}" />
                </div>
            </x-slot>
        </x-modal.card>
    </form>
</div>
