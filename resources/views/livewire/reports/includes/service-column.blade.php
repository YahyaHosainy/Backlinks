<span class="badge badge-primary text-white"
      data-toggle="tooltip"
      data-placement="top"
      title="{{ 'Serivce : ' . $report->order->service->description }}">
    {{ $report->order->service->code }}
</span>
<br>
@foreach($report->order->getExtraServices() as $extra)

    @if($report->order->extras != "" && $loop->first)
        <span class="text-yellow-300">↳</span>
    @endif

    @if($extra != null)
        <span class="badge bg-warning text-white"
              data-toggle="tooltip"
              data-placement="top"
              title="{{ 'Extra : ' . $extra->description }}">
            {{ $extra->code }}
        </span>
    @endif
@endforeach
