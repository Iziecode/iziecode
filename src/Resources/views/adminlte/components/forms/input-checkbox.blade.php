<div class="form-group {{$layout == 'horizontal' ? 'row' : ''}}">
    <label for="text_{{ $name }}" 
           class="{{$layout == 'horizontal' ? 'col-sm-2 col-form-label' : ''}} 
                  {{$checkboxInline && $layout != 'horizontal'  ? 'd-block' : ''}}
                "
    >
            {{ $label }}
    </label>
    @if($layout == 'horizontal') <div class="col-sm-10"> @endif
        @if($formGroupPrepend != '' || $formGroupAppend != '')
            <div class="input-group ">
        @endif
            @if($formGroupPrepend != '')
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        @if(is_icon($formGroupPrepend))
                            <x-ez-icon :name="get_icon($formGroupPrepend)" />
                        @else
                            {{$formGroupPrepend}}
                        @endif
                    </div>
                </div>
            @endif
            @foreach ($options as $key => $item)
                <div class="custom-control custom-checkbox {{ $checkboxInline ? 'custom-control-inline' : '' }}">
                    <input type="checkbox" id="text_{{ $name }}_{{$key}}" name="{{$name}}" value="{{ $item['value'] }}" {{ $isChecked(old("$name",$item['value']))}} class="custom-control-input">
                    <label class="custom-control-label" for="text_{{ $name }}_{{$key}}">{{ $item['name'] }}</label>
                </div>
            @endforeach
            @if($formGroupAppend != '')
                <div class="input-group-append">
                    <div class="input-group-text">
                        @if(is_icon($formGroupAppend))
                            <x-ez-icon :name="get_icon($formGroupAppend)" />
                        @else
                            {{$formGroupAppend}}
                        @endif
                    </div>
                </div>
            @endif
            
        @if($formGroupPrepend != '' || $formGroupAppend != '')
            </div>
        @endif
        {{-- <div class="invalid-feedback">Gas</div> --}}
        @if($validateText != '')
            <div class="{{$isValid ? 'valid-feedback' : 'invalid-feedback'}}">
                {{$validateText}}
            </div>
        @endif
        @if($helperText != '')
            <small id="{{ $name }}_help" class="form-text text-muted">{{ $helperText }}</small>
        @endif
    @if($layout == 'horizontal') </div> @endif
</div>