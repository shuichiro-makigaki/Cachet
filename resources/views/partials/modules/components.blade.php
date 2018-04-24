@if($componentGroups->isNotEmpty() || $ungroupedComponents->isNotEmpty())
<section>
<div class="section-components">
    @include('partials.components')
</div>
</section>
@endif
