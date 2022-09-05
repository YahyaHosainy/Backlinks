<div>
    <div class="container">
        <div class="row d-flex items-center justify-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="start_date">From</label>
                    <input id="start_date" wire:model="start_date" type="date" class="form-control">
                </div>
                @error('start_date')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="end_date">To</label>
                    <input id="end_date" wire:model="end_date" type="date" class="form-control">
                </div>
                @error('end_date')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="mt-2 mb-4 text-right">
            <a class="btn btn-sm text-white" wire:click.prevent="export" style="background-color:#3e9547;">
                <em class="fa fa-file-excel"></em>&nbsp;
                Export to Excel</a>
        </div>
    </div>
</div>
