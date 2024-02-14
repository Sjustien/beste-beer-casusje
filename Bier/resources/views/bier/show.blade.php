@extends('layouts.head')
<style>
    body {
        font-family: verdana;
    }

</style>
@section('content')
    <div class="beer-details">
        <h3>{{ $bier->name }}</h3>
        <p><strong>Brewer:</strong> {{ $bier->brewer }}</p>
        <p><strong>Type:</strong> {{ $bier->type }}</p>
        <p><strong>Yeast:</strong> {{ $bier->yeast }}</p>
        <p><strong>Alcohol Percentage:</strong> {{ $bier->perc }}% </p>
        <p><strong>Purchase Price:</strong> €{{ $bier->purchase_price }}</p>
        <p><strong>Likes:</strong> {{ $bier->like_count }}</p>
    </div>

    <form action="{{ route('comments.store', $bier->id) }}" method="POST" class="comment-form">
        @csrf
        <input type="text" name="content" id="content" placeholder="Add a comment...">
        <button type="submit">Submit</button>
    </form>

    <div class="comments">
        <h3>Comments</h3>
        <table>
            @foreach ($comments as $comment)
            <tr>
                <td>
                    {{ $comment->content }}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
