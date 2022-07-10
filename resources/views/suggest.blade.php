@if(isset($suggest))
@if($suggest['bucket count']==0)
<h4>
    Can't place balls!
</h4>
@else
    <h4>
        Need Buckets Count : {{ $suggest['bucket count'] }}
    </h4>
    @foreach($suggest['buckets'] as $bucket)
    <div class="row">
    <div class="d-flex p-3 bg-secondary text-white">
        <p class="p-2">Bucket {{ $bucket['name'] }} : </p>
        <p class="p-2">
            Place 
            @foreach($bucket['balls'] as $key => $ball)
                @if($key)
                    and
                @endif
                {{ $ball[1] }} {{ $ball[0] }} balls
            @endforeach
        </p>
    </div>
    </div>
    @endforeach
@endif
@endif