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
    $trail->push($user -> name, route('user.show',$user->id));
});

// Home > About
Breadcrumbs::for('user.create', function ($trail) {
    $trail->parent('user.index');
    $trail->push(config('app.title_user_create'), route('user.create'));
});

// Home > About
Breadcrumbs::for('user.edit', function ($trail, $user) {
    $trail->parent('user.show', $user);
    $trail->push(config('app.title_user_edit'), route('user.edit', $user -> id));
});

// Home > post.index
Breadcrumbs::for('post.index', function ($trail, $user) {
    $trail->parent('home');
    $trail->push($user -> name .'の日報', route('post.index',$user -> id));
});

// Home > post.index > post.show
Breadcrumbs::for('post.show', function ($trail, $user, $post) {
    $trail->parent('post.index', $user);
    $trail->push($post -> work_date, route('post.show',$post->id));
});

// Home > post.index > post.show > post.edit
Breadcrumbs::for('post.edit', function ($trail,$user, $post) {
    $trail->parent('post.show', $user,$post);
    $trail->push('編集', route('post.edit',$post -> id));
});

// Home > About
Breadcrumbs::for('post.create', function ($trail,$user) {
    $trail->parent('post.index', $user);
    $trail->push(config('app.title_post_create'), route('post.create'));
});


// Home > About
Breadcrumbs::for('project.index', function ($trail) {
    $trail->parent('home');
    $trail->push(config('app.title_project_index'), route('project.index'));
});

// Home > About
Breadcrumbs::for('division.index', function ($trail) {
    $trail->parent('home');
    $trail->push(config('app.title_division_index'), route('division.index'));
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