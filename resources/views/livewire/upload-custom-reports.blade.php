<div>
    @if(session()->has('uploaded'))
        <div class="alert alert-success">
            {{ session()->get('uploaded') }}
        </div>
    @endif
    <form wire:submit.prevent="save">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="order">Order ID</label>
                    <select id="order" wire:model="orderId" class="form-control">
                        <option value=''>Choose an order ID</option>
                        @foreach($orders as $order)
                                <option value="{{ $order->id }}">{{ $order->id }}</option>
                        @endforeach
                    </select>
                    @error('orderId') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="report">Report</label>
                    <input id="report" type="file" wire:model="report" class="form-control" />
                </div>
                @error('report') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="float-right">
                <button type="submit" class="btn btn-xs btn-primary pull-right">Upload report</button>
            </div>
        </div>
    </form>
</div>
