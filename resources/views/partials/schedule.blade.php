<div class="timeline schedule">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{ trans('cachet.incidents.scheduled') }}</h2>
        </div>
        <div class="list-group">
            @foreach($scheduledMaintenance as $schedule)
            <article>
            <div class="list-group-item" id="scheduled-{{ $schedule->id }}">
                <h3>{{ $schedule->name }}</h3> <small class="date"><abbr class="timeago" data-toggle="tooltip" data-placement="right" title="{{ $schedule->scheduled_at_formatted }}" data-timeago="{{ $schedule->scheduled_at_iso }}"></abbr></small>
                <div class="pull-right"><a href="#scheduled-{{ $schedule->id }}"><i class="ion ion-link"></i></a></div>
                <div class="markdown-body">
                    {!! $schedule->formatted_message !!}
                </div>
                @if($schedule->components->count() > 0)
                <hr>
                @foreach($schedule->components as $affectedComponent)
                <span class="label label-primary">{{ $affectedComponent->component->name }}</span>
                @endforeach
                @endif
            </div>
            </article>
            @endforeach
        </div>
    </div>
</div>
