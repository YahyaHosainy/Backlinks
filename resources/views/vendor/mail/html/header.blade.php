<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{env('APP_URL')}}/assets/img/logo.png" style="width:100% !important;" alt="Backlinks Services Logo">
@else
{{ $slot }}
<img src="{{env('APP_URL')}}/assets/img/logo.png" style="width:100% !important;" alt="Backlinks Services Logo">
@endif
</a>
</td>
</tr>
