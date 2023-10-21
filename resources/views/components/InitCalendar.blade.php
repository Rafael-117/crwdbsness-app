<script>
document.addEventListener('DOMContentLoaded', function() {
 
var calendarEl = document.getElementById('calendar');

var calendar = new FullCalendar.Calendar(calendarEl, {
  headerToolbar: {
    left: 'prev,today,next',
    center: 'title',
    right: 'dayGridWeek,dayGridMonth'
  },
  fixedWeekCount: false,
  weekNumbersWithinDays: 35,
  height: 626,
  // initialDate: '2023-01-12',
  locale: "es",
  buttonIcons: true,
  navLinks: true, // can click day/week names to navigate views
  editable: true,
  dayMaxEvents: true, // allow "more" link when too many events
  events: [
    {
      title: 'Deposito',  //titulo del evento
      start: '2023-10-18', //Fecha de Inicio
      end: '2023-10-18', //Fecha de Fin
      icon: 'fas fa-hand-holding-usd'
    },
  ],
  eventContent: function(arg) {
    const icon = `<i class="${arg.event.extendedProps.icon}"></i> ${arg.event.title}`;
    return { html: `${icon} ${arg.timeText}` };
  }
});

calendar.render();

});
</script>
