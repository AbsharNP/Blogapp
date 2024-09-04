@extends('layout.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <style>
        /* Internal CSS styles */
        .container {
            margin-top: 20px;
        }
        .post-card {
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .post-title {
            color: #333;
            font-size: 24px;
        }
        .post-image {
            max-width: 100%;
            max-height: 300px;
            border-radius: 5px;
        }
        .card-footer {
            background-color: #f9f9f9;
        }
        .like-button {
            margin-top: 10px;
        }
        .comment-list {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .comment-form {
            margin-top: 20px;
        }
        .form-control {
            border-radius: 5px;
        }
    </style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card post-card">
                <div class="card-body text-center">
                    <h2 class="card-title post-title">{{ $post->title }}</h2>
                    @if($post->image)
                        <img src="{{ asset('postimage/'.$post->image) }}" class="img-fluid post-image" alt="Post Image">
                    @endif
                    <p class="card-text mt-4 post-content">{{ $post->post_text }}</p>
                </div>
                <div class="card-footer text-muted text-center">
                    <small>Posted on {{ $post->created_at->format('M d, Y') }}</small>
                </div>
                <div class="card-footer text-muted text-center">
                    <small>Likes: {{ $post->likes }}</small> <!-- Display the likes count here -->
                </div>
            </div>
            <form action="{{ route('posts.like', ['id' => $post->id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary like-button">Like</button>
            </form>
            <h2 class="mt-4">Comments</h2>
            <ul class="list-group comment-list">
                @if($comments)
                    @foreach ($comments as $comment)
                        <li class="list-group-item comment-item">{{ $comment->content }}</li>
                    @endforeach
                @endif
            </ul>
            <!-- Add Comment Form -->
            <form action="{{ route('posts.comment', ['id' => $post->id]) }}" method="POST" class="comment-form">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name="content" rows="3" placeholder="Add a comment"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Comment</button>
            </form>
        </div>
    </div>
</div>
@endsection