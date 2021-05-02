@if (count($bulkActions) && (($selectPage && $rows->total() > $rows->count()) || count($selected)))
    <x-livewire-tables::bs5.table.row wire:key="row-message">
        <x-livewire-tables::bs5.table.cell colspan="{{ count($bulkActions) ? count($columns) + 1 : count($columns) }}">
            @if (count($selected) && !$selectAll && !$selectPage)
                <div>
                    <span>
                        @lang('You have selected')
                        <strong>{{ count($selected) }}</strong>
                        @lang(':rows', ['rows' => count($selected) === 1 ? 'row' : 'rows']).
                    </span>

                    <button
                        wire:click="resetBulk"
                        type="button"
                        class="btn btn-primary btn-sm"
                    >
                        @lang('Unselect All')
                    </button>
                </div>
            @elseif ($selectAll)
                <div>
                    <span>
                        @lang('You are currently selecting all')
                        <strong>{{ number_format($rows->total()) }}</strong>
                        @lang('rows').
                    </span>

                    <button
                        wire:click="resetBulk"
                        type="button"
                        class="btn btn-primary btn-sm"
                    >
                        @lang('Unselect All')
                    </button>
                </div>
            @else
                @if ($rows->total() === count($selected))
                    <div>
                        <span>
                            @lang('You have selected')
                            <strong>{{ count($selected) }}</strong>
                            @lang(':rows', ['rows' => count($selected) === 1 ? 'row' : 'rows']).
                        </span>

                        <button
                            wire:click="resetBulk"
                            type="button"
                            class="btn btn-primary btn-sm"
                        >
                            @lang('Unselect All')
                        </button>
                    </div>
                @else
                    <div>
                        <span>
                            @lang('You have selected')
                            <strong>{{ $rows->count() }}</strong>
                            @lang('rows, do you want to select all')
                            <strong>{{ number_format($rows->total()) }}</strong>?
                        </span>

                        <button
                            wire:click="selectAll"
                            type="button"
                            class="btn btn-primary btn-sm"
                        >
                            @lang('Select All')
                        </button>

                        <button
                            wire:click="resetBulk"
                            type="button"
                            class="btn btn-primary btn-sm"
                        >
                            @lang('Unselect All')
                        </button>
                    </div>
                @endif
            @endif
        </x-livewire-tables::bs5.table.cell>
    </x-livewire-tables::bs5.table.row>
@endif
