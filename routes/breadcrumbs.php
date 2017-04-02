<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home',route('home'));
});

Breadcrumbs::register('search', function($breadcrumbs,$search)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Busqueda'); 
    $breadcrumbs->push($search); 
});

Breadcrumbs::register('tag', function($breadcrumbs,$slug)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Tags');
    $breadcrumbs->push($slug,url('tags'.$slug));
});

Breadcrumbs::register('category', function($breadcrumbs,$padre)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($padre);
});

Breadcrumbs::register('subcategory', function($breadcrumbs,$category)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($category->upcategory->name);
    $breadcrumbs->push($category->name,url('categories/'.$category->upcategory->slug.'/'.$category->title));
});

Breadcrumbs::register('post', function($breadcrumbs,$article)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($article->category->upcategory->name);
    $breadcrumbs->push($article->category->name,url('categories/'.$article->category->upcategory->slug.'/'.$article->category->slug));
    $breadcrumbs->push($article->title,route('articles',$article->category->slug));
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