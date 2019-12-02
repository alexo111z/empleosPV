<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
    <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.5">
        <meta name="_token" content="{{csrf_token()}}" />
        <title>PV-WORK</title>
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700|K2D:200,400,700,800&display=swap" rel="stylesheet">
        <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/carousel/">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <!-- Custom styles for this template -->
        <link href="{{asset('css/main.css')}}" rel="stylesheet">
    </head>
    <body class="mt-6">

@include('header')
<!--@yield('header')-->
@yield('header-user')

@yield('body')

@include('footer')