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

      //Permitir arrastar e redimensionar os eventos diretamente no calendario
      editable: false,

      //Número máximo de eventos em um determinado dia, se for true, o número de eventos será limitado à altura da célula do dia
      dayMaxEvents: true, // allow "more" link when too many events

      //Chamar o arquivo PHP para recuperar os eventos
      events: 'listar-evento.php',

      //Identificar o clique do usuário sobre o evento
      eventClick: function(info) {
        
        //Receber o SELETOR da janela modal
        const visualizarModal = new bootstrap.Modal(document.getElementById("visualizarModal"));

        //Enviar para a janela modal os dados do evento
        document.getElementById("visualizar-id").innerText = info.event.id;
        document.getElementById("visualizar-title").innerText = info.event.title;
        document.getElementById("visualizar-start").innerText = info.event.start.toLocaleString();
        document.getElementById("visualizar-end").innerText = info.event.end.toLocaleString();

        //Abrir janela modal
        visualizarModal.show();
      },

      //Abrir janela modal cadastrar quando clicar sobre o dia no calendário
      select: function(info) {

        //Receber o SELETOR da janela modal
        const cadastrarModal = new bootstrap.Modal(document.getElementById("cadastrarModal"));

        document.getElementById("cad-start").value = converterData(info.start);
        document.getElementById("cad-end").value = converterData(info.start);

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

    //Receber SELETOR do formulario cadastrar evento
    const formCadEvento = document.getElementById("formCadEvento");

    //Somente acessa o IF quando existir o seletor formcadevento
    if (formCadEvento) {
        
        //Aguarda o usuario clicar no botao cadastrar
        formCadEvento.addEventListener("submit", async (e) => {

            //Nao permitir a atualização da pagina
            e.preventDefault();

            //Receber os dados do formulario
            const dadosForm = new FormData(formCadEvento);

            //Chamar o arquivo PHP responsavel em salvar o evento
            const dados = await fetch("cadastrar-evento.php", {
                method: "POST",
                body: dadosForm
            });

            //Realizar a leitura dos dados retornados pelo PHP
            const resposta = await dados.json();
            console.log(resposta);
        });
    }

  });