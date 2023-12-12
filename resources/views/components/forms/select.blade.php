<div class="form-floating mx-{{$margin}}">
    <select class="form-select
     @if($disabled) disabled @endif" id="{{$id}}" name="{{$name}}"
     @if($disabled) disabled @endif>
        @foreach($options as $index => $option)
            <option value="{{$option['name']}}"
            @if($value != "")
                @if($value == $option['name'])
                    selected
                @endif
            @elseif($index == 0)
                selected
            @endif
            >{{$option['label']}}</option>
        @endforeach
    </select>
    <label for="{{$id}}">{{$label}}</label>
</div>
