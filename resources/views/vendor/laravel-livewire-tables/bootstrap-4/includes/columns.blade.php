<tr>
    <th>#</th>
    @foreach($columns as $column)
        @if ($column->isVisible())
            @if($column->isSortable())
                <th
                    class="{{ $this->setTableHeadClass($column->getAttribute()) }}"
                    id="{{ $this->setTableHeadId($column->getAttribute()) }}"
                    @foreach ($this->setTableHeadAttributes($column->getAttribute()) as $key => $value)
                    {{ $key }}="{{ $value }}"
                    @endforeach
                    wire:click="sort('{{ $column->getAttribute() }}')"
                    style="cursor:pointer;"
                >
                    {{ $column->getText() }}

                    @if ($sortField !== $column->getAttribute())
                        {{-- {{ new \Illuminate\Support\HtmlString($sortDefaultIcon) }} --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon livewire-sorting-icons" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 9l4 -4l4 4m-4 -4v14" /><path d="M21 15l-4 4l-4 -4m4 4v-14" /></svg>
                    @elseif ($sortDirection === 'asc')
                        {{-- {{ new \Illuminate\Support\HtmlString($ascSortIcon) }} --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon livewire-sorting-icons" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="16" y1="9" x2="12" y2="5" /><line x1="8" y1="9" x2="12" y2="5" /></svg>
                    @else
                        {{-- {{ new \Illuminate\Support\HtmlString($descSortIcon) }} --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon livewire-sorting-icons" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="16" y1="15" x2="12" y2="19" /><line x1="8" y1="15" x2="12" y2="19" /></svg>
                    @endif
                </th>
            @else
                <th
                    class="{{ $this->setTableHeadClass($column->getAttribute()) }}"
                    id="{{ $this->setTableHeadId($column->getAttribute()) }}"
                    @foreach ($this->setTableHeadAttributes($column->getAttribute()) as $key => $value)
                        {{ $key }}="{{ $value }}"
                    @endforeach
                >
                    {{ $column->getText() }}
                </th>
            @endif
        @endif
    @endforeach
</tr>
