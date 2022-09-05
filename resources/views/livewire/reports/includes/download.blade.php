@if($report->download_url == null)
    <b>No available yet</b>
@else
    <button
        class="btn btn-sm btn-primary"
        wire:click.prevent="downloadReport({{ $report->id }})"
        href="#">
        <i class="fa fa-download"></i>
    </button>
@endif
