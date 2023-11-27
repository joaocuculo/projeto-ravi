//Executar quando o documento HTML for completamente carregado
document.addEventListener('DOMContentLoaded', function() {

    //Receber o SELETOR calendar do atributo id
    var calendarEl = document.getElementById('calendar');

    //Receber o SELETOR da janela modal
    const cadastrarModal = new bootstrap.Modal(document.getElementById("cadastrarModal"));

    //Receber o SELETOR da janela modal
    const visualizarModal = new bootstrap.Modal(document.getElementById("visualizarModal"));

    //Receber o seletor "msgViewEvento"
    const msgViewEvento = document.getElementById("msgViewEvento");

    function obterValorParametroUrl(nomeParametro) {
        var urlSearchParams = new URLSearchParams(window.location.search);
        return urlSearchParams.get(nomeParametro);
    }
    
    // Obtém o ID do professor da URL
    var professorId = obterValorParametroUrl('id');

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
      events: 'listar-evento.php?id=' + professorId,

      //Identificar o clique do usuário sobre o evento
      eventClick: function(info) {

        //Apresentar detalhes do visualizar
        document.getElementById("visualizarEvento").style.display = "block";
        document.getElementById("visualizarModalLabel").style.display = "block";

        //Ocultar formulario para editar
        document.getElementById("editarEvento").style.display = "none";
        document.getElementById("editarModalLabel").style.display = "none";

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

        //Enviar os dados do evento para o formulario ediar
        document.getElementById("edit_id").value = info.event.id;
        document.getElementById("edit_title").value = info.event.title;
        document.getElementById("edit_conteudo").value = info.event.extendedProps.conteudo;
        document.getElementById("edit_formaPag").value = info.event.extendedProps.formaPag;
        document.getElementById("edit_aluno_id").value = info.event.extendedProps.aluno_id;
        document.getElementById("edit_professor_id").value = info.event.extendedProps.professor_id;
        document.getElementById("edit_valorTotal").value = info.event.extendedProps.valorTotal;
        document.getElementById("edit_start").value = converterData(info.event.start);
        document.getElementById("edit_end").value = info.event.end !== null ? converterData(info.event.end) : converterData(info.event.start);
        document.getElementById("edit_color").value = info.event.backgroundColor;

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

    //Receber SELETOR do formulario cadastrar evento
    const formCadEvento = document.getElementById("formCadEvento");

    //Receber SELETOR de mensagem generica
    const msg = document.getElementById("msg");

    //Receber SELETOR da mensagem cadastrar
    const msgCadEvento = document.getElementById("msgCadEvento");

    const btnCadEvento = document.getElementById("btnCadEvento");

    //Somente acessa o IF quando existir o seletor formcadevento
    if (formCadEvento) {
        
        //Aguarda o usuario clicar no botao cadastrar
        formCadEvento.addEventListener("submit", async (e) => {

            //Nao permitir a atualização da pagina
            e.preventDefault();

            //Apresentar no botão o texto salvando
            btnCadEvento.value = "Salvando...";

            //Receber os dados do formulario
            const dadosForm = new FormData(formCadEvento);

            //Chamar o arquivo PHP responsavel em salvar o evento
            const dados = await fetch("cadastrar-evento.php", {
                method: "POST",
                body: dadosForm
            });

            //Realizar a leitura dos dados retornados pelo PHP
            const resposta = await dados.json();
            
            //Acessa o if quando não cadastrar com sucesso
            if (!resposta['status']) {

                //Enviar mensagem para o html
                msgCadEvento.innerHTML = `<div class="alert alert-danger" role="alert">${resposta['msg']}</div>`;
            } else {

                //Enviar mensagem para o html
                msg.innerHTML = `<div class="alert alert-success" role="alert">${resposta['msg']}</div>`;

                msgCadEvento.innerHTML = "";

                //Limpar o formulario
                formCadEvento.reset();

                //Criar objeto com os dados do evento
                const novoEvento = {
                    id: resposta['id'],
                    title: resposta['title'],
                    color: resposta['color'],
                    start: resposta['start'],
                    end: resposta['end'],
                    conteudo: resposta['conteudo'],
                    formaPag: resposta['formaPag'],
                    aluno_id: resposta['aluno_id'],
                    professor_id: resposta['professor_id'],
                    valorTotal: resposta['valorTotal']
                }

                //Adicionar o evento ao calendario
                calendar.addEvent(novoEvento);

                //Remover a mensaagem apos tres segundos
                removerMsg();

                //Fechar a janela modal
                cadastrarModal.hide();

            }

            btnCadEvento.value = "Cadastrar";

        });
    }

    //Função para remover mensagem apos tres segundos
    function removerMsg() {
        setTimeout(() => {
            document.getElementById('msg').innerHTML = "";
        }, 3000);
    }

    //Receber o seletor ocultar detalhes do evento e apresentar o formulario editar o evento  
    const btnViewEditEvento = document.getElementById("btnViewEditEvento");

    //Só entra se btnViewEditEvento existir
    if (btnViewEditEvento) {
        
        //Aguardar o usuario clicar no botao editar
        btnViewEditEvento.addEventListener("click", () => {

            //Ocultar detalhes do visualizar
            document.getElementById("visualizarEvento").style.display = "none";
            document.getElementById("visualizarModalLabel").style.display = "none";

            //Apresentar formulario para editar
            document.getElementById("editarEvento").style.display = "block";
            document.getElementById("editarModalLabel").style.display = "block";
        })
    }

    //Receber o seletor ocultar formulario editar o evento e apresentar os detalhes do evento
    const btnViewEvento = document.getElementById("btnViewEvento");

    //Só entra se btnViewEvento existir
    if (btnViewEvento) {
        
        //Aguardar o usuario clicar no botao editar
        btnViewEvento.addEventListener("click", () => {

            //Apresentar detalhes do visualizar
            document.getElementById("visualizarEvento").style.display = "block";
            document.getElementById("visualizarModalLabel").style.display = "block";

            //Ocultar formulario para editar
            document.getElementById("editarEvento").style.display = "none";
            document.getElementById("editarModalLabel").style.display = "none";
        })
    }

    //Receber o seletor do formulario editar evento
    const formEditEvento = document.getElementById("formEditEvento");

    //Receber o seletor do mensagem editar evento
    const msgEditEvento = document.getElementById("msgEditEvento");

    //Receber o seletor do botao editar evento
    const btnEditEvento = document.getElementById("btnEditEvento");

    if (formEditEvento) {
        
        //Aguardar o usuario clicar no botao
        formEditEvento.addEventListener("submit", async (e) => {

            //Não permitir a atualização da pagina
            e.preventDefault();

            //Apresentar no botao o texto salvando
            btnEditEvento.value = "Salvando...";

            //Receber os dados do formulario
            const dadosForm = new FormData(formEditEvento);

            //Chamar o arquivo PHP responsavel em editar o evento
            const dados = await fetch("editar-evento.php", {
                method: "POST",
                body: dadosForm
            });

            //Realizar a leitura dos dados retornados pelo PHP
            const resposta = await dados.json();

            //Acessa o if quando nao editar com sucesso
            if (!resposta['status']) {
                msgEditEvento.innerHTML = `<div class="alert alert-danger" role="alert">${resposta['msg']}</div>`;
            } else {
                msg.innerHTML = `<div class="alert alert-success" role="alert">${resposta['msg']}</div>`;

                msgEditEvento.innerHTML = "";

                //Limpar o formulario
                formEditEvento.reset();

                //Recuperar o evento no fullcalendar pelo id
                const eventoExiste = calendar.getEventById(resposta['id']);

                //Verificar se encontrou o evento no fullcalendar pelo id
                if (eventoExiste) {
                    
                    //Atualizar os atributos do evento com os novos valores do banco de dados
                    eventoExiste.setProp('title', resposta['title']);
                    eventoExiste.setProp('color', resposta['color']);
                    eventoExiste.setExtendedProp('conteudo', resposta['conteudo']);
                    eventoExiste.setExtendedProp('aluno_id', resposta['aluno_id']);
                    eventoExiste.setExtendedProp('professor_id', resposta['professor_id']);
                }

                removerMsg();

                //Fechar a janela modal
                visualizarModal.hide();
            }

            //Apresentar no botao o texto salvar
            btnEditEvento.value = "Salvar";

        })

        //Receber o seletor do botao
        const btnApagarEvento = document.getElementById("btnApagarEvento");

        if (btnApagarEvento) {
            
            btnApagarEvento.addEventListener("click", async () => {
                
                //Exibir uma caixa de dialogo de confirmação
                const confirmacao = window.confirm("Tem certeza que deseja apagar este evento");

                if (confirmacao) {
                    
                    //Receber o id do evento
                    var idEvento = document.getElementById("visualizar-id").textContent;

                    //Chamar o arquivo PHP responsavel por apagar o evento
                    const dados = await fetch("apagar-evento.php?id=" + idEvento);

                    const resposta = await dados.json();

                    if (!resposta['status']) {
                        
                        //Enviar mensagem para o HTML
                        msgViewEvento.innerHTML = `<div class="alert alert-danger" role="alert">${resposta['msg']}</div>`;

                    } else {

                        //Enviar mensagem para o HTML
                        msg.innerHTML = `<div class="alert alert-success" role="alert">${resposta['msg']}</div>`;

                        //Enviar mensagem para o HTML
                        msgViewEvento.innerHTML = "";

                        const eventoExisteRemover = calendar.getEventById(idEvento);

                        if (eventoExisteRemover) {
                            eventoExisteRemover.remove();
                        }

                        removerMsg();

                        visualizarModal.hide();
                        
                    }
                }
            });
        }
    }
  });