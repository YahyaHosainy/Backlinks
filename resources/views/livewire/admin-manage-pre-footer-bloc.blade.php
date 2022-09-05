<div>
    <div class="row">
        @if(session()->has('banner_changes_applied'))
            <div class="col-md-12">
                <div class="alert bg-green-600 text-white text-center mt-2 mb-4">
                    {{ session('banner_changes_applied') }}
                </div>
            </div>
        @endif
        <div class="col-md-12">
            <h4 class="text-blue-800 mb-4 text-center text-lg">Home Page Banner</h4>
            <div class="form-group">
                <label for="banner">Banner HTML content</label>
                <textarea id="banner"
                          wire:model="content"
                          class="form-control"
                          placeholder="Place your html code"></textarea>
                @error('content') <spna class="text-red-600">{{ $message }}</spna> @enderror
            </div>
        </div>
    </div>
    <div class="text-right">
        <button class="btn btn-sm btn-primary"
                wire:click.prevent="saveContent">
            Change Banner
        </button>
    </div>
</div>
