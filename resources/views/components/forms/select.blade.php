<div class="form-floating mx-{{$margin}}">
    <select class="form-select" id="{{$id}}" name="{{$name}}">
        @foreach($options as $index => $option)
            <option value="{{$option['name']}}"
            @if($index == 0)
                selected
            @endif
            >{{$option['label']}}</option>
        @endforeach
    </select>
    <label for="{{$id}}">{{$label}}</label>
    {{$value}}
</div>
