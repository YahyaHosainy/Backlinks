<div>
    <form wire:submit.prevent="saveFingerPrintStatus">
        @if(session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
        @endif @if(session()->has('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
        @endif
        <div class="form-group">
            <select class="form-control " id="isFingerPrintEnabled" wire:model="isFingerPrintEnabled">
                <option value="1">Enabled</option>
                <option value="0">Disabeled</option>
            </select>
        </div>
        <div class="float-right">
            <button type="submit" class="btn btn-primary">
                Save
            </button>
        </div>
    </form>


</div>