<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>PV-WORK</title>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700|K2D:200,400,700,800&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/carousel/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <!-- Custom styles for this template -->
    <link href="{{asset('css/admin/main.css')}}" rel="stylesheet">
</head>
<body class="mt-6">

@include('admins.header')

@yield('header-admin')

@yield('body')

@include('admins.footer')
