<div class="form-floating mb-1">
    <input  value="{{$value}}" @if($required) required @endif maxlength={{$max}} name="{{$field}}" type="{{$type}}" class="form-control" id="input{{$name}}" placeholder="{{$placeholder}}">
    <label for="input{{$name}}">{{$name}}</label>
</div>
