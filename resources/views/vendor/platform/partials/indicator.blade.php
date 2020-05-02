<div class="row">
    <div class="col-sm-2 @if(boolval($state)) active-indicator @else inactive-indicator @endif">&nbsp;</div>
    <div class="col-sm-10">
        {{ $labels[$state] }}
    </div>
</div>
