<div class="form-floating mb-1">
    <input @if($disabled) disabled @endif  value="{{$value}}" @if($required) required
           @endif maxlength={{$max}} name="{{$field}}" type="{{$type}}"
           class="form-control  @if($disabled) disabled @endif" id="input{{$name}}"
           placeholder="{{$placeholder}}">
    <label for="input{{$name}}">{{$name}}</label>
</div>
