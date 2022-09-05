<tr class="data-item data-head">
    @foreach($columns as $column)
        @if ($column->isVisible())
            @if($column->isSortable())
                <th
                    class="data-col dt-tnxno sorting_disabled"
                    id="{{ $this->setTableHeadId($column->getAttribute()) }}"
                    @foreach ($this->setTableHeadAttributes($column->getAttribute()) as $key => $value)
                    {{ $key }}="{{ $value }}"
                    @endforeach
                    wire:click="sort('{{ $column->getAttribute() }}')"
                    style="cursor:pointer;"
                >
                    {{ $column->getText() }}

                    @if ($sortField !== $column->getAttribute())
                        {{ new \Illuminate\Support\HtmlString($sortDefaultIcon) }}
                    @elseif ($sortDirection === 'asc')
                        {{ new \Illuminate\Support\HtmlString($ascSortIcon) }}
                    @else
                        {{ new \Illuminate\Support\HtmlString($descSortIcon) }}
                    @endif
                </th>
            @else
                <th
                    class="data-col dt-tnxno sorting_disabled"
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
