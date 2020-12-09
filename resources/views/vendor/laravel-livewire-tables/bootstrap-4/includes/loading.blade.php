@if ($loadingIndicator)
    <tbody wire:loading.class.remove="d-none" class="d-none">
        <tr>
            <td colspan="{{ collect($columns)->count() }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon mr-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>

                <span>@lang('laravel-livewire-tables::strings.loading')</span>
            </td>
        </tr>
    </tbody>

    <tbody @if($collapseDataOnLoading) wire:loading.remove @endif>
@else
    <tbody>
@endif
