@extends('user_side_layouts.index')

@section('title', 'Achtamar Restaurant')

@section('content')
        
    @include('user_side_layouts.header')
    <div id="gallery" class="container-fluid">
		<div class="row"> 
		  <div class="column">
		    <img src="https://www.w3schools.com/w3images/wedding.jpg">
		    <img src="https://www.w3schools.com/w3images/rocks.jpg">
		    <img src="https://www.w3schools.com/w3images/falls2.jpg">
		    <img src="https://www.w3schools.com/w3images/paris.jpg">
		    <img src="https://www.w3schools.com/w3images/nature.jpg">
		    <img src="https://www.w3schools.com/w3images/mist.jpg">
		    <img src="https://www.w3schools.com/w3images/paris.jpg">
		  </div>
		  <div class="column">
		    <img src="https://www.w3schools.com/w3images/underwater.jpg">
		    <img src="https://www.w3schools.com/w3images/ocean.jpg">
		    <img src="https://www.w3schools.com/w3images/wedding.jpg">
		    <img src="https://www.w3schools.com/w3images/mountainskies.jpg">
		    <img src="https://www.w3schools.com/w3images/rocks.jpg">
		    <img src="https://www.w3schools.com/w3images/underwater.jpg">
		  </div> 
		  <div class="column">
		    <img src="https://www.w3schools.com/w3images/wedding.jpg">
		    <img src="https://www.w3schools.com/w3images/rocks.jpg">
		    <img src="https://www.w3schools.com/w3images/falls2.jpg">
		    <img src="https://www.w3schools.com/w3images/paris.jpg">
		    <img src="https://www.w3schools.com/w3images/nature.jpg">
		    <img src="https://www.w3schools.com/w3images/mist.jpg">
		    <img src="https://www.w3schools.com/w3images/paris.jpg">
		  </div>
		  <div class="column">
		    <img src="https://www.w3schools.com/w3images/underwater.jpg">
		    <img src="https://www.w3schools.com/w3images/ocean.jpg">
		    <img src="https://www.w3schools.com/w3images/wedding.jpg">
		    <img src="https://www.w3schools.com/w3images/mountainskies.jpg">
		    <img src="https://www.w3schools.com/w3images/rocks.jpg"> 
		    <img src="https://www.w3schools.com/w3images/underwater.jpg">
		  </div>
		</div>
	</div>


	<div id="image-modal" class="image-modal">

	  <!-- The Close Button -->
	  <span class="close close-image-modal">&times;</span>

	  <!-- Modal Content (The Image) -->
	  <img class="modal-content" id="img01">\
	</div>

	@include('user_side_layouts.footer')

@stop