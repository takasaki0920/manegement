<td>
    @if(!empty($item->image))
    <img src="{{ asset($item->image) }}" style="width: 100px; height:100px;">
    @else
    <img src="{{ asset('img/baby.png') }}" style="width: 100px; height:100px;">
    @endif
    
    <img src="{{ Storage::disk('s3')->url('dir/'.$review->imgpath)}}">
</td>