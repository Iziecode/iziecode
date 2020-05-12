@if($type == 'fa')
    <i class="{{$name}}"></i>
@elseif($type == 'ionic')
    <ion-icon name="{{$name}}"></ion-icon>
@endif