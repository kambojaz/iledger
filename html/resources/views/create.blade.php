@extends('template')


@section('content')
    
    <create-form form="{{ request('type', 'client') }}"></create-form>

@stop