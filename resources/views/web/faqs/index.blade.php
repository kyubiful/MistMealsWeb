@extends('web.layout.master')
@section('content')
<div class="faqs-container">
  <h1 class="faqs-title">FAQs</h1>
  <div id="accordion" class="faqs-accordion">
    <div class="card faqs-card">
      <div class="card-header">
        <h5 class="mb-0">
          <button class="faqs-btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            1. ¿Cómo funciona la elección del plan? ¿En que se basa el algoritmo?
          </button>
        </h5>
      </div>
      <div id="collapseOne" class="collapse" aria-labelledby="handingOne" data-parent="#accordion">
        <div class="card-body faqs-card-body">
          lorem ipsum dolor sit amet 2
        </div>
      </div>
    </div>
    <div class="card faqs-card">
      <div class="card-header">
        <h5 class="mb-0">
          <button class="faqs-btn" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            2. ¿Qué respaldo nutricional tiene cada plan de dietas?
          </button>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="handingThree" data-parent="#accordion">
        <div class="card-body faqs-card-body">
          lorem ipsum dolor sit amet 2
        </div>
      </div>
    </div>
    <div class="card faqs-card">
      <div class="card-header">
        <h5 class="mb-0">
          <button class="faqs-btn" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            2. ¿Qué respaldo nutricional tiene cada plan de dietas?
          </button>
        </h5>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="handingThree" data-parent="#accordion">
        <div class="card-body faqs-card-body">
          lorem ipsum dolor sit amet 2
        </div>
      </div>
    </div>
  </div>
</div>
<div>
  <img class="faqs-img" src="/img/faqs/antioxidants.png"/>
</div>
@include('web.layout.newsletter')
@endsection
