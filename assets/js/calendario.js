//Executar quando o documento HTML for completamente carregado
document.addEventListener('DOMContentLoaded', function() {

    //Receber o SELETOR calendar do atributo id
    var calendarEl = document.getElementById('calendar');

    //Instanciar FullCalendar.Calenedar e atribuir a variavel calendar
    var calendar = new FullCalendar.Calendar(calendarEl, {

      //criar o cabeçalho do calendario  
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      
      //Definir o idioma usado no calendario
      locale: 'pt-br',
      //initialDate: '2023-01-12',
      //Permitir clicar nos nomes dos dias da semana
      navLinks: true,
      //Permitir clicar e arrastar o mouse sobre um ou varios dias no calendario
      selectable: true,
      //Indicar visualmente a area que será selecionada antes que o usuario solte o botao do mouse para confirmar a seleção
      selectMirror: true,
      select: function(arg) {
        var title = prompt('Event Title:');
        if (title) {
          calendar.addEvent({
            title: title,
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
          })
        }
        calendar.unselect()
      },
      eventClick: function(arg) {
        if (confirm('Are you sure you want to delete this event?')) {
          arg.event.remove()
        }
      },

      //Permitir arrastar e redimensionar os eventos diretamente no calendario
      editable: false,

      //Número máximo de eventos em um determinado dia, se for true, o número de eventos será limitado à altura da célula do dia
      dayMaxEvents: true, // allow "more" link when too many events
      events: 'listar-evento.php'
    });

    calendar.render();
  });