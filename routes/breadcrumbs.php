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
Breadcrumbs::for('post.index', function ($trail) {
    $trail->parent('home');
    $trail->push(config('app.title_post_index'), route('post.index'));
});
// Home > About
Breadcrumbs::for('post.show', function ($trail,$post) {
    $trail->parent('post.index');
    $trail->push($post -> work_date, route('post.show',$post -> id));
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