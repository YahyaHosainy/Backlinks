<div>
    <div class="row">
        @if(session()->has('seo_changes_applied'))
            <div class="col-md-12">
                <div class="alert bg-green-600 text-white text-center mt-2 mb-4">
                    {{ session('seo_changes_applied') }}
                </div>
            </div>
        @endif
        <div class="col-md-12">
            <h4 class="text-blue-800 mb-4 text-center text-lg">SEO Meta Control</h4>
            <div class="form-group">
                <label for="title">Home page Title</label>
                <input type="text" id="title" class="form-control" wire:model.lazy="title"/>
                @error('title') <spna class="text-red-600">{{ $message }}</spna> @enderror
            </div>
            <div class="form-group">
                <label for="description">Home page Description</label>
                <textarea id="description" rows="4" cols="12" class="form-control" wire:model.lazy="description"></textarea>
                @error('description') <spna class="text-red-600">{{ $message }}</spna> @enderror
            </div>
            <!-- <div class="form-group">
                <label for="keywords">Home page Keywords (Separate them with commas)</label>
                <input type="text" id="keywords" class="form-control" wire:model.lazy="keywords"/>
                @error('keywords') <spna class="text-red-600">{{ $message }}</spna> @enderror
            </div>
            <div class="form-group">
                <label for="canonical">Canonical Url</label>
                <input type="text" id="canonical" class="form-control" wire:model.lazy="canonical"/>
                @error('canonical') <spna class="text-red-600">{{ $message }}</spna> @enderror
            </div> -->
        </div>


        
        <!-- <div class="col-md-6">
            <h4 class="text-blue-800 mb-4 text-center text-lg">OpenGraph Control</h4>
            <div class="form-group">
                <label for="open_graph_title">Home page OpenGraph Title</label>
                <input type="text" id="open_graph_title" class="form-control" wire:model.lazy="openGraphTitle"/>
                @error('openGraphTitle') <spna class="text-red-600">{{ $message }}</spna> @enderror
            </div>
            <div class="form-group">
                <label for="open_graph_description">Home page OpenGraph Description</label>
                <textarea id="open_graph_description" rows="4" cols="12" class="form-control" wire:model.lazy="openGraphDescription"></textarea>
                @error('openGraphDescription') <spna class="text-red-600">{{ $message }}</spna> @enderror
            </div>
            <div class="form-group">
                <label for="open_graph_url">Home page OpenGraph Url</label>
                <input type="text" id="open_graph_url" class="form-control" wire:model.lazy="openGraphUrl"/>
                @error('openGraphUrl') <spna class="text-red-600">{{ $message }}</spna> @enderror
            </div>
        </div> -->
    </div>
    <div class="text-right">
        <button class="btn btn-sm btn-primary" wire:click.prevent="saveSeoMetaChanges">Save Seo changes</button>
    </div>
</div>
