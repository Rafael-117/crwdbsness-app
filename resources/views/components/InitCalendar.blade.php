<script>
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    editable: false,
    lang: 'es',
    selectable: true,
    businessHours: true,
    dayMaxEvents: true, // allow "more" link when too many events
    events: [
      {
        title: 'i',
        start: '2023-10-10',
        icon: 'fa-money-bill-wave'
      },
    ],
    eventRender: function(info) {
      var icono = info.event.extendedProps.icon; // Obtenemos el nombre del icono del objeto de evento
      var iconoHTML = '<span class="fas ' + icono + '"></span>'; // Agregamos un espacio entre "fas" y el nombre del icono
      info.el.querySelector('.fc-title').innerHTML = iconoHTML + info.event.title;
    }
  });

  calendar.render();
});


var elementoHijo = document.querySelector('.fc-event');
elementoHijo.parentNode.parentNode.parentNode.parentNode.style.background="#ff004d";

</script>
