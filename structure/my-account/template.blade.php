<?php /* Template Name: Mijn Account */?>

@extends('layouts.app')

@section('content')
  @include('partials.page-header')

<?php
if(is_user_logged_in()){
    ?>
    <div id="my-account">
    </div>
    <?php
} else{
    echo 'Je moet ingelogd zijn om deze pagina te bekijken.';
}
?>

@endsection
