@if($component_groups->isNotEmpty() || $ungrouped_components->isNotEmpty())
<section>
<div class="section-components">
    @include('partials.components')
</div>
</section>
@endif
