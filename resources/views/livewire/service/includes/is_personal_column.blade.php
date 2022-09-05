@if($service->is_personal)
    <span class="badge bg-secondary text-white">Personal</span>
@else
    <span class="badge bg-green-500 text-white">API Service</span>
@endif
