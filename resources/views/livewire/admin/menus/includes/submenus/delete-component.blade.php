<div>
    <x-button xs x-on:confirm="{
        title:'{{ __('ATENÇÃO!') }}',
        description:'{{ sprintf('Deseja realmente excluir o registro - %s', $model->name) }}',
        icon: 'error',
        method: 'kill',
        params: '{{ data_get($model, 'id') }}'
        }" icon="x" negative sm squared label="{{ __('Deletar') }}" teal />
</div>
