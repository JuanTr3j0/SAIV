<script>
// Plugins
//import 'bootstrap/dist/css/bootstrap.css';
import '@fullcalendar/core/vdom'
import dayGridPlugin        from '@fullcalendar/daygrid'
import interactionPlugin    from '@fullcalendar/interaction'
import listPlugin           from '@fullcalendar/list';
import timeGridPlugin       from '@fullcalendar/timegrid'

// Component
import FullCalendar         from '@fullcalendar/vue3'

export default {
  props:['events', 'title'],
  components: {
    FullCalendar // make the <FullCalendar> tag available
  },
  data() {
    return {
      show:false,
      calendarOptions: {
        plugins: [ dayGridPlugin, interactionPlugin, listPlugin, timeGridPlugin ],
        initialView: 'listMonth',
         titleFormat: { // will produce something like "Tuesday, September 18, 2018"
          month: 'numeric',
          year: 'numeric',
          day: 'numeric',
        },
        headerToolbar: {
            start:'title',
            center: '',
            right: 'today dayGridWeek dayGridMonth listDay listMonth listWeek prev,next'
        },
        slotMinTime: '08:00',
        slotMaxTime: '17:00',
        expandRows: 600,
        contentHeight: 'auto',
        height: '100%',
        locale:'es',
        buttonText: { 
            today: "Hoy"
        },
        views: {
            today:        { buttonText:'Hoy'},
            dayGridMonth: { buttonText: 'Mes'},
            dayGridWeek:  { buttonText: 'Semana'},
            listDay:      { buttonText: 'Agenda Dia' },
            listWeek:     { buttonText: 'Agenda Semana'},
            listMonth:    { buttonText: 'Agenda Mes'},
        },
        dateClick: this.handleDateClick,
        events:[],
        eventClick: this.eventClick,
      }
    }
  },
  methods: {
    renderCalendar: function(_bool){
      this.show = _bool;
    },
    handleDateClick: function(arg) {

      let fecha_ahora = new Date(Date.now());
      let fecha = arg.dateStr+'T'+fecha_ahora.getHours()+':'+fecha_ahora.getMinutes();
      
      const _json = {
        key:null, 
        titulo:null,
        modulo:null,
        fecha_inicio:fecha,
        fecha_final:fecha, 
      };

      this.$emit('handleClickAgendaItem', _json);
    },
    getDateTimeLocal: function(_fecha) {
      if(_fecha === null || typeof _fecha === 'undefined' || _fecha === "")
        return null;

      let $_fecha = new Date(_fecha);
      return $_fecha.getFullYear()+'-'+this.zfill(($_fecha.getMonth()+1),2)+'-'+this.zfill($_fecha.getDate(),2)+'T'
        +this.zfill($_fecha.getHours(),2)+':'+this.zfill($_fecha.getMinutes(),2);
    },
    eventClick: function(info) {
        var eventObj = info.event;

        if(Boolean(eventObj.extendedProps.agendaItem)){

            const _json = {
              key:eventObj.extendedProps.key, 
              titulo:eventObj.title.slice(0, -21),
              modulo:null,
              fecha_inicio:this.getDateTimeLocal(eventObj.startStr),
              fecha_final:this.getDateTimeLocal(eventObj.endStr), 
            };
          this.$emit('handleClickAgendaItem', _json);
          return;
        }

        if (!Boolean(eventObj.extendedProps.agendaItem)) {
          this.$emit('handleClickAgendaVer', eventObj.extendedProps);
          return;
        }
    },
    setEvents : function(events){
      events ??=[]
      this.calendarOptions.events = events;
    },
    nuevaActividad : function() {
      this.$emit('nuevaActividad');
    },
    zfill: function (number, width) {
      var numberOutput = Math.abs(number); /* Valor absoluto del número */
      var length = number.toString().length; /* Largo del número */ 
      var zero = "0"; /* String de cero */  
      
      if (width <= length) {
          if (number < 0) {
              return ("-" + numberOutput.toString()); 
          } else {
              return numberOutput.toString(); 
          }
      } else {
          if (number < 0) {
              return ("-" + (zero.repeat(width - length)) + numberOutput.toString()); 
          } else {
              return ((zero.repeat(width - length)) + numberOutput.toString()); 
          }
      }
    }
  },
}
</script>
<template>
  <div>
    <div class="m-5 fw-bold">
        <div class="mt-2 pb-2">
          <div class="row">
            <div class="col-md">
              <h3 class="align-text-bottom">
                <span class="text-muted fw-light text-center">
                  <i class='bx bxs-certification bx-md '></i> {{title ?? '???'}}</span> / Agenda
              </h3>                            
            </div>
            <div class="col-md-auto">
              <button type="button" class="btn btn-primary justify-items-start" @click="nuevaActividad">
                <i class="bx bx-plus bx-tada-hover bx-sm"></i> Nuevo
              </button>
            </div>
          </div>
        </div>
        <div class="container-fluid text-center" v-if="!show">
          <div class="spinner-border text-primary " role="status" style="min-width: 40px;min-height: 40px;">
              <span class="visually-hidden">Cargando...</span>
          </div>
        </div>
        <FullCalendar ref="fullCalendarRef" :options="calendarOptions" v-if="show"/>
    </div> 
  </div>
</template>
<style scoped>
</style>