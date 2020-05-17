<div class="form-group {{$layout == 'horizontal' ? 'row' : ''}}">
    <label for="id_{{ $name }}" 
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
            <select
                type="{{ $type }}" 
                class="form-control {{ $watch != false ? 'watch' : '' }}  {{$isValid ? 'is-valid' : ''}} {{ $isInvalid ? 'is-invalid' : '' }} {{ $class }}" 
                id="id_{{ $name }}" 
                name="{{ $name }}"
                data-watch-id="id_{{ $watch }}"
                data-ajax-url="{{ $ajaxUrl }}"
                aria-describedby="{{ $name }}_help" 
                placeholder="{{ $placeholder }}"
                {{$attr}}
                {{ $readonly != false ? 'readonly' : ''  }}
                {{ $required != false ? 'required' : ''  }}
            >
                @foreach ($options as $item)
                    <option {{ $isSelected(old("$name",$item['value']))}} value="{{ $item['value'] }}">{{ $item['name'] }}</option>
                @endforeach
            </select>
            
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