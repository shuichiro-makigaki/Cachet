@if($scheduledMaintenance->isNotEmpty())
<section>
<div class="section-scheduled">
    @include('partials.schedule')
</div>
</section>
@endif
