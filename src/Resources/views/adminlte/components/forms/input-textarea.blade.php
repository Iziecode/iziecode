<div class="form-group {{$layout == 'horizontal' ? 'row' : ''}}">
    <label for="text_{{ $name }}" 
           class="{{$layout == 'horizontal' ? 'col-sm-2 col-form-label' : ''}}">
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
            <textarea 
                type="{{ $type }}" 
                class="form-control  {{$isValid ? 'is-valid' : ''}} {{ $isInvalid ? 'is-invalid' : '' }} {{ $class }}" 
                id="text_{{ $name }}" 
                name="{{ $name }}"
                aria-describedby="{{ $name }}_help" 
                placeholder="{{ $placeholder }}"
                value="{{ old('$name',$value) }}"
                {{$attr}}
                {{ $readonly != false ? 'readonly' : ''  }}
                {{ $required != false ? 'required' : ''  }}
            >{{ old('$name',$value) }}</textarea>
            
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