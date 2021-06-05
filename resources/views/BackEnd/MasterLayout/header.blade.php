@extends('BackEnd.MasterLayout.master')
@section('header')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Stexo - Responsive Admin & Dashboard Template | Themesdesign</title>
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesdesign" name="author" />
        <link rel="shortcut icon" href="{{ asset('public/BackEnd/assets/images/favicon.ico')}}">
        <link href="{{ asset('public/BackEnd/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/BackEnd/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/BackEnd/assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('public/BackEnd/assets/plugins/morris/morris.css') }}">
        <!-- DataTables -->
        <link href="{{ asset('public/BackEnd/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/BackEnd/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->

        <link href="{{ asset('public/BackEnd/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('public/BackEnd/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('public/BackEnd/assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('public/BackEnd/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('public/BackEnd/assets/css/style.css') }}" rel="stylesheet" type="text/css">
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
           <!-- Dropzone css -->
        <link href="{{ asset('public/BackEnd/assets/plugins/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('public/BackEnd/assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" />
    </head>

@endsection
