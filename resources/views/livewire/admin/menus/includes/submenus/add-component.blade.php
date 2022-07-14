<div>
    <span class="hidden sm:block ml-3">
        <button type="button" wire:click="openModal"
            class="flex items-center px-4 py-2 space-x-1 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <x-icon name="plus" class="w-5 h-5" />
            <span>{{ _('Add Menu Principal') }}</span>
        </button>
    </span>
    <form wire:submit.prevent="saveAndStay">
        <x-modal.card hide-close title="{{ $this->title }}" blur wire:model.defer="cardModal">
            @include(load_menu_builder_view('submenus.form'))
            <x-slot name="footer">
                <div class="flex justify-between gap-x-4">
                    <x-button sm flat label="Cancel" x-on:click="close" />
                    <x-button sm type="submit" primary label="{{ __('Add menu') }}" />
                </div>
            </x-slot>
        </x-modal.card>
    </form>
</div>
