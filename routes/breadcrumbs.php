<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push(config('app.title_home'), route('home'));
});

// Home > About
Breadcrumbs::for('user.index', function ($trail) {
    $trail->parent('home');
    $trail->push(config('app.title_user_index'), route('user.index'));
});

// Home > About
Breadcrumbs::for('user.show', function ($trail,$user) {
    $trail->parent('user.index');
    $trail->push($user->name, route('user.show',$user->id));
});

// Home > About
Breadcrumbs::for('post.user', function ($trail,$id) {
    $trail->parent('home');
    $trail->push( getUser($id) -> name . 'の日報', route('post.user',$id));
});

// Home > About
Breadcrumbs::for('post.index', function ($trail) {
    $trail->parent('home');
    $trail->push(config('app.title_post_index'), route('post.index'));
});

// Home > About
Breadcrumbs::for('post.show', function ($trail,$post) {
    $trail->parent('post.user',$post->user_id);
    $trail->push($post -> work_date, route('post.show',$post -> id));
});

// Home > About
Breadcrumbs::for('post.edit', function ($trail,$post) {
    $trail->parent('post.show',$post);
    $trail->push('編集', route('post.edit',$post -> id));
});

// Home > Blog
Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});