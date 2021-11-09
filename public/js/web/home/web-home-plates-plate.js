const web_plates_plate_weight_btn_m = document.querySelectorAll('.global-plates-plate-weight-btn-m')
const web_plates_plate_weight_btn_l = document.querySelectorAll('.global-plates-plate-weight-btn-l')
const web_plates_plate_m = document.querySelectorAll('.global-plates-plate-container-m')
const web_plates_plate_l = document.querySelectorAll('.global-plates-plate-container-l')

const web_plate_btn_more = document.querySelectorAll('.plate-btn-more')
const web_plate_btn_less = document.querySelectorAll('.plate-btn-less')
const web_plate_quantity_display = document.querySelectorAll('.plate-quantity-display')

for(let i = 0; i < web_plates_plate_weight_btn_m.length; i++){
  web_plates_plate_weight_btn_m[i].addEventListener('click', () => {
    if(i == 0 || i == 1) {
      web_plates_plate_m[0].classList.toggle('hidden');
      web_plates_plate_l[0].classList.toggle('hidden');
    }
    else if(i == 2 || i == 3) {
      web_plates_plate_m[1].classList.toggle('hidden');
      web_plates_plate_l[1].classList.toggle('hidden');
    }
    else {
      web_plates_plate_m[2].classList.toggle('hidden');
      web_plates_plate_l[2].classList.toggle('hidden');
    }
  })
}

for(let i = 0; i < web_plates_plate_weight_btn_l.length; i++){
  web_plates_plate_weight_btn_l[i].addEventListener('click', () => {
    if(i == 0 || i == 1) {
      web_plates_plate_m[0].classList.toggle('hidden');
      web_plates_plate_l[0].classList.toggle('hidden');
    }
    else if(i == 2 || i == 3) {
      web_plates_plate_m[1].classList.toggle('hidden');
      web_plates_plate_l[1].classList.toggle('hidden');
    }
    else {
      web_plates_plate_m[2].classList.toggle('hidden');
      web_plates_plate_l[2].classList.toggle('hidden');
    }
  })
}

for(let i = 0; i < web_plate_quantity_display.length; i++){
  web_plate_btn_more[i].addEventListener('click', () => {
    web_plate_quantity_display[i].value = parseInt(web_plate_quantity_display[i].value) + 1
  })

  web_plate_btn_less[i].addEventListener('click', () => {
    if(parseInt(web_plate_quantity_display[i].value) > 0){
      web_plate_quantity_display[i].value = parseInt(web_plate_quantity_display[i].value) - 1
      console.log('entra')
    }
  })
}
