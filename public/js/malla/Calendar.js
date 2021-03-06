(function () {

    var cal, calendarDate, d, m, y;
    this.setDraggableEvents = function () {
        return $("#events .external-event").each(function () {
            var eventObject;
            eventObject = {
                title: $.trim($(this).text())
            };
            $(this).data("eventObject", eventObject);
            return $(this).draggable({
                zIndex: 999,
                revert: true,
                revertDuration: 0
            });
        });
    };

    setDraggableEvents();

    calendarDate = new Date();

    d = calendarDate.getDate();

    m = calendarDate.getMonth();

    y = calendarDate.getFullYear();


    cal = $(".full-calendar").fullCalendar({
        //inizializando opciones
        header: {
            center: "title",
            left: "month,agendaWeek,agendaDay,listWeek",
            right: "prev,today,next"
        },
        buttonIcons: {
            prev: "fa-chevron-left",
            next: "fa-chevron-right"
        },
        buttonText: {
            today: "Hoy",
            agendaDay: "Día",
            agendaWeek: "Semana",
            month: "Mes",
            listWeek: "Lista"
        },
        firstDay: Monday = 1,
        droppable: true,
        editable: false,
        selectable: true,
        defaultView: 'agendaWeek',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
        slotEventOverlap: false,
        locale: 'es',
        allDaySlot: false,
        slotLabelFormat: 'H:mm',
        timeFormat: 'H:mm',

        //paramentros enviados desde la vista malla/show
        contentHeight: parseInt(document.getElementById("contentHeight").value),
        minTime: document.getElementById("minTime").value,
        maxTime: document.getElementById("maxTime").value,
        slotDuration: document.getElementById("slotDuration").value,
        slotLabelInterval: parseInt(document.getElementById("slotLabelInterval").value),

        //llama a evento poblar
        eventSources: [
            {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/malla/poblar',
                data: {id: $('#id').val()},
                success: function (events) {
                    console.log("id fullcalendar id " + $('#id').val());
                    console.log(events);
                }
            }
        ],

        //Handlers Se dispara cuando se realiza una selección de fecha/hora disponible en el calendario. https://fullcalendar.io/docs/select-callback
        select: function (start, end) {

            var fechaInicio = moment(start).format('YYYY-MM-DD');
            var fechaActual = moment(calendarDate).format('YYYY-MM-DD');
            var horaActual = moment(calendarDate).format('HH:mm');
            var horaInicio = moment(start).format('HH:mm');
            moment.locale('es');

            //validar no agendar en hora/dia en el pasado

            if (fechaInicio < fechaActual) {
                alert("No se puede agendar hora en un día pasado");
                return;
            }

            if (fechaInicio == fechaActual) {
                if (horaInicio <= horaActual) {
                    alert("No se puede agendar hora en un día pasado");
                    return;
                }
            }


            document.getElementById("hora").value = horaInicio;
            document.getElementById("fecha").value = fechaInicio;

            //llamar a la vista createAgendarHora
            var dialog = bootbox.dialog({
                title: '¿Qué desea realizar?',
                message: "Por favor seleccione el tipo de actividad que desea agendar",
                size: 'large',
                buttons: {
                    sesion: {
                        label: "Agendar sesión con beneficiario",
                        className: 'btn-info',
                        callback: function () {
                            guardarHora(fechaInicio, horaInicio);
                        }
                    },
                    otraActividad: {
                        label: "Agendar otras actividades",
                        className: 'btn-primary',
                        callback: function () {
                            Actividad(fechaInicio, horaInicio);
                        }
                    },
                    cancelar: {
                        label: "Cancelar",
                        className: 'btn-danger',
                        callback: function () {

                        }
                    },

                }
            });


            //document.getElementById("id_funcionario").value=document.getElementById("id").value;
            return; /*bootbox.prompt({
                title: 'Ingrese rut de beneficiario',
                placeholder: 'El RUT debe tener el formato 12345678-9 xxxxxx',
                buttons: {
                    confirm: {
                        label: 'Ingresar'
                    },
                    cancel: {
                        label: 'Cancelar'
                    }
                },
                callback: function (value) {
                    var valido = true;
                    //verificar si sirve
                    if (value == null) {
                        return;
                    }
                    //validar campo en blando
                    if (value == "") {
                        bootbox.alert("Your message here…")
                        valido = false;
                    }
                    //validar rut
                    var expreg = new RegExp("\d{3,8}-[\d|kK]{1}");

                    if (expreg.test(value) == false) {
                        alert("El formato del rut es incorrecto");
                        return;
                    }
                    /*
                    var formato = /.[.]./g;

                    /*if (formato.test(value)) {
                        alert("El formato del rut es incorrecto");
                        return;
                    }

                    var Fn = {
                        // Valida el rut con su cadena completa "XXXXXXXX-X"
                        validaRut: function (rutCompleto) {
                            if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test(rutCompleto))
                                return false;
                            var tmp = rutCompleto.split('-');
                            var digv = tmp[1];
                            var rut = tmp[0];
                            if (digv == 'K') digv = 'k';
                            return (Fn.dv(rut) == digv);
                        },
                        dv: function (T) {
                            var M = 0, S = 1;
                            for (; T; T = Math.floor(T / 10))
                                S = (S + T % 10 * (9 - M++ % 6)) % 11;
                            return S ? S - 1 : 'k';
                        }
                    }

                    if (Fn.validaRut(value) == false) {
                        alert('Debe ingresar un rut válido');
                        return;
                    }


                    //obtener nombre
                    //var nombre = encontrarNombre(value, start);
                    var nombre = "nombre prueba";
                    if (nombre == null) {
                        alert('El beneficiario no se encuentra en la base de datos');
                        return;
                    }
                    //render calendario
                    cal.fullCalendar("renderEvent", {
                        title: nombre,
                        start: start,
                        end: end
                    }, true);
                    location.reload();
                    return cal.fullCalendar('unselect');

                }


            })*/
        },
        //Handlers Se dispara cuando se realiza una selección de un evento agendado https://fullcalendar.io/docs/eventClick

        eventClick: function (calEvent, jsEvent, view) {

            var idHoraAgendada = calEvent.id;

            var existeFicha = "";

            actualizarHora(idHoraAgendada);
            /**
             $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/registro_prestacion/checkfichaactiva",
                type: "POST",
                data: {
                    idHora: idHoraAgendada
                },
                async: false,
                success: function (data, textStatus, jqXHR) {
                    existeFicha = data;
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    return;
                }
            });


             // if (puedeAsignarHora() == "false") {
           //     if (existeFicha == "false") {
                    if (confirm("El beneficiario no tiene ficha inicial activa. Presione Cancelar para marcar la inasistencia.")) {
                        return;
                    } else {
                        calEvent.url = '/registro_prestacion/inasistencia/' + calEvent.id;
                        window.open(calEvent.url, '_self');
                    }


           //     }
           // }


             if (calEvent.realizado) {
                alert("Ya se han asignado prestaciones a esa hora agendada");
                return;
            } else {

                //if (puedeAsignarHora() == "true") {
                    if (confirm('¿Desea eliminar la hora?')) {
                        eliminarHora(calEvent.id);
                    } else {
                        if (puedeAtenderHora() == "true") {
                            if (confirm("¿El beneficiario registra asistencia? o presione Cancelar para marcar la inasistencia.")) {
                                calEvent.url = '/registro_prestacion/' + calEvent.id;
                                window.open(calEvent.url, '_self');
                            } else {
                                calEvent.url = '/registro_prestacion/inasistencia/' + calEvent.id;
                                window.open(calEvent.url, '_self');
                            }
                        }
                    }
                    return;
                //}

                if (confirm("¿El beneficiario registra asistencia?")) {
                    calEvent.url = '/registro_prestacion/' + calEvent.id;
                    window.open(calEvent.url, '_self');
                } else {
                    calEvent.url = '/registro_prestacion/inasistencia/' + calEvent.id;
                    window.open(calEvent.url, '_self');
                }

            }
             return false;
             **/
            return
        },


        //Handlers
        drop: function (date, allDay) {
            var copiedEventObject, eventClass, originalEventObject;
            originalEventObject = $(this).data("eventObject");
            originalEventObject.id = Math.floor(Math.random() * 99999);
            eventClass = $(this).attr('data-event-class');
            console.log(originalEventObject);
            copiedEventObject = $.extend({}, originalEventObject);
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            if (eventClass) {
                copiedEventObject["className"] = [eventClass];
            }
            $(".full-calendar-demo").fullCalendar("renderEvent", copiedEventObject, true);
            if ($("#calendar-remove-after-drop").is(":checked")) {
                return $(this).remove();
            }
        }
    });


    function guardarHora(fechaInicio, horaInicio) {

        $url = '/malla/create/';
        $url = $url + $('#id').val() + '/' + fechaInicio + '/' + horaInicio;
        location.replace($url);
    }

    function Actividad(fechaInicio, horaInicio) {

        bootbox.prompt("Ingresar título de la actividad", function (result) {
            almacenarActividad(result,fechaInicio,horaInicio);
        });
    }

    function almacenarActividad(result,fechaInicio,horaInicio) {
        console.log("result: "+result);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            async: true,
            url: "/malla/store",
            type: "POST",
            data: {
                fecha: fechaInicio,
                hora: horaInicio,
                descripcion: result,
                id_funcionario:$('#id').val(),
            },
            success: function (data, textStatus, jqXHR) {
                alert("Datos registrados correctamente.");
                window.location.replace("/malla/show2/" + $('#id').val());
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("No se ha registrado actividad.");
            }
        });
    }
    function actualizarHora(id) {

        $url = '/malla/edit/';
        $url = $url + id;
        location.replace($url);
    }


    function encontrarNombre(rut, start) {
        var nombre_encontrado;

        /*
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            async: false,
            url: "/malla/getnombre",
            type: "GET",
            data: {
                rutBuscado: rut
            },
            success: function (data, textStatus, jqXHR) {
                var beneficiario_encontrado = $.parseJSON(data);
                nombre_encontrado = beneficiario_encontrado.nombre;
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
        */

        //Agendar hora
        var fecha = moment(start).format('YYYY-MM-DD');
        var hora = moment(start).format('HH:mm');
        /*
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            async: true,
            url: "/malla/store",
            type: "POST",
            data: {
                fecha: fecha,
                hora: hora,
                rut: rut,
                id: $('#id').val()
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
        */
        return nombre_encontrado;
    }

    /*
    function puedeAsignarHora() {

        var respuesta = "";
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            async: false,
            url: "/malla/validarusuario",
            type: "POST",

            success: function (data, textStatus, jqXHR) {
                respuesta = data;
            },

            error: function (jqXHR, textStatus, errorThrown) {
            }
        });
        return respuesta;
    }
    */
    /*
    function puedeAtenderHora() {
        var respuesta = "";
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            async: false,
            url: "/malla/puedeatender",
            type: "POST",

            success: function (data, textStatus, jqXHR) {
                respuesta = data;
            },

            error: function (jqXHR, textStatus, errorThrown) {
            }
        });
        return respuesta;
    }
    */
    /*
    function eliminarHora(id) {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            async: false,
            url: "/malla/eliminarhora",
            type: "POST",
            data: {
                idHora: id
            },
            success: function (data, textStatus, jqXHR) {
                alert('La hora se ha eliminado correctamente.');
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Hubo un error al eliminar la hora. Reintente.');
            }
        });

    }
    */
})();
