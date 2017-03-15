<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home',route('home'));
});

Breadcrumbs::register('search', function($breadcrumbs,$search)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($search); 
});


Breadcrumbs::register('post', function($breadcrumbs,$title)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($title,route('articles',$title));
});


Breadcrumbs::register('filtro_name', function($breadcrumbs,$name)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($name,route('articles',$name));
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