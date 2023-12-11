@if($redirect == 'true')
    <a href="{{$href}}" class="btn btn-{{$btnType}} rounded-0 px-5 small" type="{{$type}}" style="min-width: 10rem;">{{$label}}</a>

@else
    <button class="btn btn-{{$btnType}} rounded-0 px-5 small" type="{{$type}}" style="min-width: 10rem;">{{$label}}</button>
@endif
