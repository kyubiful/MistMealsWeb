@extends('web.layout.master')
@section('content')
<div class="faqs-container">
  <h1 class="faqs-title">FAQs</h1>
  <div id="accordion" class="faqs-accordion">
    <div class="card faqs-card">
      <div class="card-header">
        <h5 class="mb-0">
          <button class="faqs-btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            ¿Cómo funciona la elección del plan?
          </button>
        </h5>
      </div>
      <div id="collapseOne" class="collapse" aria-labelledby="handingOne" data-parent="#accordion">
        <div class="card-body faqs-card-body">
          Existen varias fórmulas para calcular la tasa metabólica. Nosotros hemos utilizado la de Miffin - St Jeor. Para elaborar el menú personalizado hay que recoger algunos datos personales como el sexo, la edad, la altura y el peso.

También tenemos que tener en cuenta cuál es tu objetivo: si quieres perder grasa de forma saludable; ganar masa muscular; o simplemente comer rico y saludable. En función de tu objetivo, aplicamos un multiplicador al resultado anterior.
        </div>
      </div>
    </div>
    <div class="card faqs-card">
      <div class="card-header">
        <h5 class="mb-0">
          <button class="faqs-btn" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            ¿Qué respaldo nutricional tiene cada plan de dietas?
          </button>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="handingThree" data-parent="#accordion">
        <div class="card-body faqs-card-body">
          Todos los tipos de planes que se generan son evaluados por nuestros nutricionistas para incluir las recomendaciones más oportunas para completar tu dieta diaria.
        </div>
      </div>
    </div>
    <div class="card faqs-card">
      <div class="card-header">
        <h5 class="mb-0">
          <button class="faqs-btn" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            ¿Debería acogerme a este plan si tengo algún tipo de intolerancia alimentaria?
          </button>
        </h5>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="handingThree" data-parent="#accordion">
        <div class="card-body faqs-card-body">
          Aunque incluimos los alérgenos de cada plato, no podemos garantizar que no haya algún tipo de contaminación cruzada. En caso de intolerancias alimentarias consulta siempre con un profesional de la nutrición.
        </div>
      </div>
    </div>
    <div class="card faqs-card">
      <div class="card-header">
        <h5 class="mb-0">
          <button class="faqs-btn" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
            ¿Son recomendables los planes en caso de patologías alimentarias o de cualquier tipo?
          </button>
        </h5>
      </div>
      <div id="collapseFour" class="collapse" aria-labelledby="handingFour" data-parent="#accordion">
        <div class="card-body faqs-card-body">
          Esta web no está diseñada para tratar ninguna afección médica y no se debe utilizar con estos fines. En caso de cualquier patología debes ponerte en manos de un profesional de la medicina y/o nutrición.
        </div>
      </div>
    </div>
    <div class="card faqs-card">
      <div class="card-header">
        <h5 class="mb-0">
          <button class="faqs-btn" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
            ¿Puedo prescindir de mi endocrino o nutricionista al usar estos planes?
          </button>
        </h5>
      </div>
      <div id="collapseFive" class="collapse" aria-labelledby="handingFive" data-parent="#accordion">
        <div class="card-body faqs-card-body">
          Esta web tiene como objetivo proporcionarte información personalizada para ayudarte a gestionar tu alimentación. No debe usarse para otros fines. Si tienes cualquier afección médica consulta a un profesional. Si tienes cualquier duda sobre alimentación consulta a un endocrino o nutricionista.
        </div>
      </div>
    </div>
    <div class="card faqs-card">
      <div class="card-header">
        <h5 class="mb-0">
          <button class="faqs-btn" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
            ¿Cuándo recibiré mi pedido?
          </button>
        </h5>
      </div>
      <div id="collapseSix" class="collapse" aria-labelledby="handingSix" data-parent="#accordion">
        <div class="card-body faqs-card-body">
          Por ahora tenemos un único día de entrega. El pedido lo recibirás el jueves de la semana siguiente a la que has realizado el pedido.
        </div>
      </div>
    </div>
    <div class="card faqs-card">
      <div class="card-header">
        <h5 class="mb-0">
          <button class="faqs-btn" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
            ¿Qué hacéis con la comida que sobra?
          </button>
        </h5>
      </div>
      <div id="collapseSeven" class="collapse" aria-labelledby="handingSeven" data-parent="#accordion">
        <div class="card-body faqs-card-body">
          En MistMeals no sobra comida, se prepara bajo pedido únicamente lo que se va a consumir para que el desperdicio sea 0.
        </div>
      </div>
    </div>
    <div class="card faqs-card">
      <div class="card-header">
        <h5 class="mb-0">
          <button class="faqs-btn" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
            ¿Cuánto tiempo duran los platos?
          </button>
        </h5>
      </div>
      <div id="collapseEight" class="collapse" aria-labelledby="handingEight" data-parent="#accordion">
        <div class="card-body faqs-card-body">
          La caducidad está indicada en cada plato. Están diseñados para que tengas, al menos, 8 días para consumirlo desde la entrega, algunos duran más. También tienes la opción de congelarlos si ves que no vas a poder consumirlos antes de la fecha del envase.
        </div>
      </div>
    </div>
    <div class="card faqs-card">
      <div class="card-header">
        <h5 class="mb-0">
          <button class="faqs-btn" data-toggle="collapse" data-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
            ¿Los platos se pueden congelar?
          </button>
        </h5>
      </div>
      <div id="collapseNine" class="collapse" aria-labelledby="handingNine" data-parent="#accordion">
        <div class="card-body faqs-card-body">
          Sí, se pueden congelar sin ningún problema, en el congelador de casa a unos -18ºC. Luego para descongelarlos, recomendamos dejarlo en la nevera el día anterior al de consumo para que se produzca una descongelación suave y paulatina.
        </div>
      </div>
    </div>
    <div class="card faqs-card">
      <div class="card-header">
        <h5 class="mb-0">
          <button class="faqs-btn" data-toggle="collapse" data-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
            ¿Tenéis platos vegetarianos y/o veganos?
          </button>
        </h5>
      </div>
      <div id="collapseTen" class="collapse" aria-labelledby="handingTen" data-parent="#accordion">
        <div class="card-body faqs-card-body">
          Tenemos varios platos que son vegetarianos, la mayoría de ellos veganos. Puedes encontrarlos en la sección de platos con la etiqueta “Vegano”. Estamos trabajando para incluir más platos veganos en nuestra carta para en un futuro poder ofrecer nuestros menús completamente veganos.
        </div>
      </div>
    </div>
    <div class="card faqs-card">
      <div class="card-header">
        <h5 class="mb-0">
          <button class="faqs-btn" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
            ¿Cuál es el papel de la Fundación Juan XXII Roncalli en vuestro proyecto?
          </button>
        </h5>
      </div>
      <div id="collapseEleven" class="collapse" aria-labelledby="handingEleven" data-parent="#accordion">
        <div class="card-body faqs-card-body">
          Desde el principio en Mistmeals quisimos que nuestro proyecto fuese inclusivo, trabajando con todo el mundo y ayudando también a los colectivos que tienen situaciones más complicadas. Por eso decidimos trabajar con la Fundación Juan XXIII Roncalli, donde personas con capacidades diferentes preparan nuestros platos bajo nuestras directrices.
        </div>
      </div>
    </div>
  </div>
</div>
<div>
  <img class="faqs-img mp-mobile-hidden" src="/img/faqs/antioxidants.png"/>
  <img class="faqs-img mp-desktop-hidden" src="/img/faqs/antioxidantsmobile.png" style="margin-top: -165px; transform: rotate(0deg); right: 0px;"/>
</div>
@include('web.layout.newsletter')
@endsection
