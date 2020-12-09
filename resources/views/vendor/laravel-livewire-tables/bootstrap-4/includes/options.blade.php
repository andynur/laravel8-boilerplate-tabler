@if ($paginationEnabled || $searchEnabled)
    <div class="row mb-3">
        @if ($paginationEnabled && count($perPageOptions))
            <div class="col form-inline">
                <span>@lang('laravel-livewire-tables::strings.per_page'): &nbsp;</span>

                <select wire:model="perPage" class="form-select livewire-per-page">
                    @foreach ($perPageOptions as $option)
                        <option>{{ $option }}</option>
                    @endforeach
                </select>

                <span>entry</span>
            </div><!--col-->
        @endif

        @if ($searchEnabled)
            <div class="col">
                @if ($clearSearchButton)
                    <div class="input-group">
                        @endif
                        <input
                            @if (is_numeric($searchDebounce) && $searchUpdateMethod === 'debounce') wire:model.debounce.{{ $searchDebounce }}ms="search" @endif
                            @if ($searchUpdateMethod === 'lazy') wire:model.lazy="search" @endif
                            @if ($disableSearchOnLoading) wire:loading.attr="disabled" @endif
                            class="form-control livewire-search"
                            type="text"
                            placeholder="{{ __('laravel-livewire-tables::strings.search') }}"
                        />
                        @if ($clearSearchButton)
                            <div class="input-group-append">
                                <button class="btn btn-outline-dark" type="button" wire:click="clearSearch">@lang('laravel-livewire-tables::strings.clear')</button>
                            </div>
                    </div>
                @endif
            </div>
        @endif

        @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.export')
    </div><!--row-->
@endif
