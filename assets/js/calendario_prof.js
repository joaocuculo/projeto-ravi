//Executar quando o documento HTML for completamente carregado
document.addEventListener('DOMContentLoaded', function() {

    //Receber o SELETOR calendar do atributo id
    var calendarEl = document.getElementById('calendar');

    //Receber o SELETOR da janela modal
    const visualizarModal = new bootstrap.Modal(document.getElementById("visualizarModal"));

    //Receber o seletor "msgViewEvento"
    const msgViewEvento = document.getElementById("msgViewEvento");

    // Função para obter o ID do professor da sessão
    function obterValorSessao(getIdProf) {
        return sessionStorage.getItem(getIdProf);
    }

    // Obtém o ID do professor da sessão
    var professorId = obterValorSessao('id');

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
      selectable: false,
      //Indicar visualmente a area que será selecionada antes que o usuario solte o botao do mouse para confirmar a seleção
      selectMirror: true,

      //Permitir arrastar e redimensionar os eventos diretamente no calendario
      editable: false,

      //Número máximo de eventos em um determinado dia, se for true, o número de eventos será limitado à altura da célula do dia
      dayMaxEvents: true, // allow "more" link when too many events

      //Chamar o arquivo PHP para recuperar os eventos
      events: 'listar-evento.php?id=' + professorId,

      //Identificar o clique do usuário sobre o evento
      eventClick: function(info) {

        //Apresentar detalhes do visualizar
        document.getElementById("visualizarEvento").style.display = "block";
        document.getElementById("visualizarModalLabel").style.display = "block";

        //Enviar para a janela modal os dados do evento
        document.getElementById("visualizar-id").innerText = info.event.id;
        document.getElementById("visualizar-title").innerText = info.event.title;
        document.getElementById("visualizar-conteudo").innerText = info.event.extendedProps.conteudo;
        document.getElementById("visualizar-formaPag").innerText = info.event.extendedProps.formaPag;
        document.getElementById("visualizar-aluno").innerText = info.event.extendedProps.nome;
        //document.getElementById("visualizar-professor").innerText = info.event.extendedProps.professor_id;
        document.getElementById("visualizar-valorTotal").innerText = info.event.extendedProps.valorTotal;
        document.getElementById("visualizar-start").innerText = info.event.start.toLocaleString();
        document.getElementById("visualizar-end").innerText = info.event.end !== null ? info.event.end.toLocaleString() : info.event.start.toLocaleString();

        //Abrir janela modal
        visualizarModal.show();
      },

      //Abrir janela modal cadastrar quando clicar sobre o dia no calendário
      select: function(info) {

        var today = new Date();
        if (info.start < today) {
            calendar.unselect();
            alert('Você não pode adicionar eventos para datas passadas. Se o dia selecionado for o atual, você deve agendar para um horário futuro. Esse processo pode ser feito na aba "dia".');
            return false;
        }

        document.getElementById("cad_start").value = converterData(info.start);
        document.getElementById("cad_end").value = converterData(info.start);

        //Abrir janela modal cadastrar
        cadastrarModal.show();
      }
    });

    //Renderizar o calendario
    calendar.render();

    function converterData(data) {

        //Converter a string em um objeto date
        const dataObj = new Date(data);

        //Extrair o ano da data
        const ano = dataObj.getFullYear();

        //Obter o mes, mes começa de 0, padStart adiciona zeros a esquerda para garantir que o mes tenha dois digitos
        const mes = String(dataObj.getMonth() + 1).padStart(2, '0');

        //Obter o dia do mes, padStart adiciona zeros a esquerda para garantir que o dia tenha dois digitos
        const dia = String(dataObj.getDate()).padStart(2, '0');

        //Obter a hora, padStart adiciona zeros a esquerda para garantir que o hora tenha dois digitos
        const hora = String(dataObj.getHours()).padStart(2, '0');

        //Obter minuto, padStart adiciona zeros a esquerda para garantir que o minuto tenha dois digitos
        const minuto = String(dataObj.getMinutes()).padStart(2, '0');

        //Retornar a data
        return `${ano}-${mes}-${dia} ${hora}:${minuto}`;
    } 

    
});