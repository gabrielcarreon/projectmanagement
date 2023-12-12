<div class="d-flex justify-content-center my-3">
    <div class="avatar-upload">
        <div class="avatar-edit">
            <input name="{{$id}}" type='file' id="{{$id}}" accept="image/*"/>
            <label for="{{$id}}"></label>
        </div>
        <div class="avatar-preview  d-flex justify-content-center">
            <div id="imagePreview-{{$id}}"
                 @if($src == '')
                 style="background-image: url('{{asset('assets/unset.webp')}}');">
                 @else
                 style="background-image: url('{{asset($src)}}');">
                 @endif
            </div>
        </div>
    </div>
</div>
<style>
    .avatar-upload {
        position: relative;
        max-width: 300px;

        .avatar-edit {
            position: absolute;
            right: 0px;
            z-index: 1;
            top: 0px;

            input {
                display: none;

                + label {
                    display: inline-block;
                    width: 34px;
                    height: 34px;
                    margin-bottom: 0;
                    background: #FFFFFF;
                    border: 1px solid transparent;
                    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                    cursor: pointer;
                    font-weight: normal;
                    transition: all .2s ease-in-out;

                    &:hover {
                        background: #f1f1f1;
                        border-color: #d6d6d6;
                    }

                    &:after {
                        content: "\f040";
                        color: #757575;
                        position: absolute;
                        top: 10px;
                        left: 0;
                        right: 0;
                        text-align: center;
                        margin: auto;
                    }
                }
            }
        }

        .avatar-preview {
            width: 300px;
            height: 192px;
            position: relative;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);

            > div {
                width: 150%;
                height: 100%;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }
        }
    }
</style>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview-{{$id}}').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview-{{$id}}').hide();
                $('#imagePreview-{{$id}}').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#{{$id}}").change(function () {
        readURL(this);
    });

</script>
