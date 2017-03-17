<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home',route('home'));
});

Breadcrumbs::register('search', function($breadcrumbs,$search)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('busqueda'); 
    $breadcrumbs->push($search); 
});

Breadcrumbs::register('tag', function($breadcrumbs,$tag)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($tag,route('tags',$tag));
});

Breadcrumbs::register('category', function($breadcrumbs,$padre)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($padre);
});

Breadcrumbs::register('subcategory', function($breadcrumbs,$padre,$category)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($padre);
    $breadcrumbs->push($category,url('categories/'.$padre.'/'.$category));
});

Breadcrumbs::register('post', function($breadcrumbs,$padre,$category,$title)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($padre);
    $breadcrumbs->push($category,url('categories/'.$padre.'/'.$category));
    $breadcrumbs->push($title,route('articles',$title));
});

/*
// Home > Blog > [Category]
Breadcrumbs::register('category', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Page]
Breadcrumbs::register('page', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('category', $page->category);
    $breadcrumbs->push($page->title, route('page', $page->id));
});
*/