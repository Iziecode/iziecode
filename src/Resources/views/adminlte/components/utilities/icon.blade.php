@if($type == 'fa')
    <i class="{{$name}} {{$class}}"></i>
@elseif($type == 'ion')
    <ion-icon name="{{$name}}" class="{{$class}}"></ion-icon>
@endif