<article>
<h3 class="incident-date week-{{ day_of_week($date) }}">{{ formatted_date($date) }}</h3>
<div class="timeline">
    <div class="content-wrapper">
        @forelse($incidents as $incident)
        <article>
        <div class="moment {{ $loop->first ? 'first' : null }}">
            <div class="row event clearfix">
                <div class="col-sm-1">
                    <div class="status-icon status-{{ $incident->latest_human_status }}" data-toggle="tooltip" title="{{ $incident->latest_human_status }}" data-placement="left">
                        <i class="{{ $incident->latest_icon }}"></i>
                    </div>
                </div>
                <div class="col-xs-10 col-xs-offset-2 col-sm-11 col-sm-offset-0">
                    <div class="panel panel-message incident">
                        <div class="panel-heading">
                            @if($current_user)
                            <div class="pull-right btn-group">
                                <a href="{{ cachet_route('dashboard.incidents.edit', ['id' => $incident->id]) }}" class="btn btn-default">{{ trans('forms.edit') }}</a>
                                <a href="{{ cachet_route('dashboard.incidents.delete', ['id' => $incident->id], 'delete') }}" class="btn btn-danger confirm-action" data-method='DELETE'>{{ trans('forms.delete') }}</a>
                            </div>
                            @endif
                            @if($incident->component)
                            <span class="label label-default">{{ $incident->component->name }}</span>
                            @endif
                            <h1>{{ $incident->name }}</h1>{{ $incident->isScheduled ? trans("cachet.incidents.scheduled_at", ["timestamp" => $incident->scheduled_at_diff]) : null }}
                            <br>
                            <small class="date">
                                <a href="{{ cachet_route('incident', ['id' => $incident->id]) }}" class="links"><abbr class="timeago" data-toggle="tooltip" data-placement="right" title="{{ $incident->timestamp_formatted }}" data-timeago="{{ $incident->timestamp_iso }}"></abbr></a>
                            </small>
                        </div>
                        <div class="panel-body markdown-body">
                            {!! $incident->formatted_message !!}
                        </div>
                        @if($incident->updates->isNotEmpty())
                        <div class="list-group">
                            @foreach($incident->updates as $update)
                            <a class="list-group-item incident-update-item" href="{{ $update->permalink }}">
                                <i class="{{ $update->icon }}" title="{{ $update->human_status }}" data-toggle="tooltip"></i>
                                {!! $update->formatted_message !!}
                                <small>
                                    <abbr class="timeago links" data-toggle="tooltip"
                                        data-placement="right" title="{{ $update->timestamp_formatted }}"
                                        data-timeago="{{ $update->timestamp_iso }}">
                                    </abbr>
                                </small>
                                <span class="ion-ios-arrow-right pull-right"></span>

                            </a>
                            @endforeach
                        </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        </article>
        @empty
        <article>
        <div class="panel panel-message incident">
            <div class="panel-body">
                <p>{{ trans('cachet.incidents.none') }}</p>
            </div>
        </div>
        </article>
        @endforelse
    </div>
</div>
</article>
