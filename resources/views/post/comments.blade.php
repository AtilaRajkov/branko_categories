@foreach($comments as $comment)
    <ul>
        <li>{{$comment->body}} - By - {{$comment->owner->name}}</li>

        @if($comment->relationLoaded('allRepliesWithOwner'))
            @include('post.comments', ['comments' => $comment->allRepliesWithOwner])
        @endif
    </ul>
@endforeach