"use strict";(self["webpackChunkvue"]=self["webpackChunkvue"]||[]).push([[554],{3988:function(e,a,o){o.d(a,{Z:function(){return H}});var l=o(3396),r=o(9242);const n={class:"border border-2 border-light mx-0 p-1 rounded"},i={class:"card-body p-2 clearfix"},s={class:"container-fluid border border-2 border-primary rounded-3"},t=(0,l._)("div",{class:"row"},[(0,l._)("div",{class:"col-md mt-2"},[(0,l._)("h3",{class:"my-2"},[(0,l._)("i",{class:"bx bx-calendar bx-md bx-tada-hover"}),(0,l.Uk)(" Agenda / Actividad")])])],-1),d={class:"row"},u={class:"col-md mb-2"},c=(0,l._)("label",{class:"fw-bold"},[(0,l._)("code",null,"*"),(0,l.Uk)("Titulo")],-1),m=["disabled"],g={class:"row"},b={class:"px-2"},v=(0,l._)("i",{class:"bx bxs-trash-alt bx-tada-hover"},null,-1);function h(e,a,o,h,p,f){const w=(0,l.up)("FormInput"),y=(0,l.up)("AlertVue"),V=(0,l.up)("ButtonsFormVue"),C=(0,l.up)("ModalVue"),k=(0,l.up)("AdvertenciaVue");return(0,l.wg)(),(0,l.iD)("div",null,[(0,l.Wm)(C,{ref:"modalAgendaRef",clases:"modal-centered"},{cardBody:(0,l.w5)((()=>[(0,l._)("div",n,[(0,l._)("form",null,[(0,l._)("div",i,[(0,l._)("div",s,[t,(0,l._)("div",d,[(0,l._)("div",u,[c,(0,l.wy)((0,l._)("textarea",{id:"agenda-titulo",class:"form-control",disabled:e.loading||(e.showVer??!1),"onUpdate:modelValue":a[0]||(a[0]=a=>e.formulario.titulo=a),cols:"20",rows:"2",placeholder:"Ingrese"},null,8,m),[[r.nr,e.formulario.titulo]])])]),(0,l._)("div",g,[(0,l.Wm)(w,{id:"agenda-fecha-inicio",obligatorio:!0,loading:e.loading,type:"datetime-local",clases:"col-md-12  mb-2",showVer:e.showVer,disabled:e.loading,titulo:"Fecha Inicio",value:e.formulario.fecha_inicio,"onUpdate:value":a[1]||(a[1]=a=>e.formulario.fecha_inicio=a)},null,8,["loading","showVer","disabled","value"]),(0,l.Wm)(w,{id:"agenda-fecha-final",loading:e.loading,clases:"col-md-12  mb-2",type:"datetime-local",showVer:e.showVer,disabled:e.loading,titulo:"Fecha Final (Opcional)",value:e.formulario.fecha_final,"onUpdate:value":a[2]||(a[2]=a=>e.formulario.fecha_final=a)},null,8,["loading","showVer","disabled","titulo","value"])])]),(0,l._)("div",b,[(0,l.Wm)(y,{mensajesAlert:e.mensajesAlert,alert:e.tipoAlert},null,8,["mensajesAlert","alert"])]),(0,l.Wm)(V,{showVer:e.showVer??!1,loading:e.loading,showSig:!1,showAnt:!1,showReset:!1,onGuardar:e.handledClickGuardar},{"nuevo-button":(0,l.w5)((()=>[(0,l.WI)(e.$slots,"nuevo-button"),null!==e.formulario.key?((0,l.wg)(),(0,l.iD)("button",{key:0,class:"btn btn-danger",type:"button",onClick:a[3]||(a[3]=a=>e.handleClickBorrar(e.formulario))},[v,(0,l.Uk)(" Eliminar ")])):(0,l.kq)("",!0)])),_:3},8,["showVer","loading","onGuardar"])])])])])),_:3},512),(0,l.Wm)(C,{ref:"modalBorrarRef",clases:"modal-centered"},{cardBody:(0,l.w5)((()=>[(0,l.Wm)(k,{ref:"advertenciaRef",mensaje:"El siguiente registro de Agenda se borrara de la base de datos, ¿Continuar?",onContinuar:e.borrarActividadAgenda},null,8,["onContinuar"])])),_:1},512)])}var p=o(8419),f=o(4059),w=o(2366),y=o(4118),V=o(5035),C=o(9684),k=o(4870),x=(0,l.aZ)({props:["modulo"],components:{ModalVue:f.Z,FormInput:w.Z,AlertVue:y.Z,ButtonsFormVue:V.Z,AdvertenciaVue:C.Z},setup(e,{emit:a}){const o={key:null,titulo:null,modulo:e.modulo??null,fecha_inicio:null,fecha_final:null},l=(0,k.qj)(JSON.parse(JSON.stringify(o))),r=(0,k.iH)(!1),n=(0,k.iH)(!1),i=(0,k.iH)(null),s=(0,k.iH)(null),t=(0,k.iH)(null),d=(0,k.iH)(null),u=(0,k.iH)(null);function c(){i.value=null,s.value=null,r.value=!1,Object.assign(l,JSON.parse(JSON.stringify(o)))}function m(a){Object.assign(l,JSON.parse(JSON.stringify(a))),l.modulo=e.modulo}const g=()=>t.value.showModal(),b=()=>t.value.hideModal(),v=async()=>{r.value=!0;try{const e=await p.Z.actualizarCrear(l,"saiv/agenda/guardar");e.ok&&(e.json.error?(i.value="warning",s.value=e.json.error):(l.key=e.json.key,i.value=s.value=null)),r.value=!1}catch(e){console.log(e),console.log("¡Ups ocurrio un error!, no se guardo el registro."),r.value=!1}},h=e=>{t.value.hideModal(),d.value.setJson(e),u.value.showModal()},f=async e=>{if("undefined"!==typeof e){r.value=!0;const a=await p.Z.borrarCaso({key:e},"saiv/agenda/borrar");"undefined"!==typeof a&&"undefined"!==typeof a._json&&a.ok&&a._json.borrado&&c(),r.value=!1}t.value.showModal()};return{mensajesAlert:s,formulario:l,tipoAlert:i,loading:r,showVer:n,modalAgendaRef:t,advertenciaRef:d,modalBorrarRef:u,editForm:m,showModal:g,hideModal:b,resetForm:c,handleClickBorrar:h,handledClickGuardar:v,borrarActividadAgenda:f}}}),A=o(89);const _=(0,A.Z)(x,[["render",h]]);var H=_},7536:function(e,a,o){o.r(a),o.d(a,{default:function(){return ta}});var l=o(3396),r=o(7139);const n={class:"container-fluid flex-grow-1 container-p-y"},i={class:"fw-bold py-3 mb-2"},s={class:"text-muted fw-light text-center"},t={class:"row"},d={class:"col-md-12"},u={class:"nav nav-pills flex-column flex-md-row mb-3"},c={class:"nav-item mx-2"},m=(0,l._)("i",{class:"bx bxs-book-bookmark me-1 bx-sm bx-flashing bx-tada-hover"},null,-1),g={class:"nav-item mx-2"},b=(0,l._)("i",{class:"bx bx-user-pin me-1 bx-sm bx-flashing bx-tada-hover"},null,-1);function v(e,a,o,v,h,p){const f=(0,l.up)("ProgramaciónView"),w=(0,l.up)("AtencionMenoresView");return(0,l.wg)(),(0,l.iD)("div",n,[(0,l._)("h4",i,[(0,l._)("span",s," SAIV"+(0,r.zw)(v.store.state.USUARIO.oficina)+" / ",1),(0,l.Uk)(" "+(0,r.zw)(v.itemBoolean?"Cámara Gesell / Programación":"Cámara Gesell / Atención a Menores"),1)]),(0,l._)("div",t,[(0,l._)("div",d,[(0,l._)("ul",u,[(0,l._)("li",c,[(0,l._)("button",{type:"button",class:(0,r.C_)(["nav-link border border-primary",{active:v.itemBoolean}]),onClick:a[0]||(a[0]=e=>v.itemBoolean=!0)},[m,(0,l.Uk)(" Programación ")],2)]),(0,l._)("li",g,[(0,l._)("button",{type:"button",class:(0,r.C_)(["nav-link border border-primary",{active:!v.itemBoolean}]),onClick:a[1]||(a[1]=e=>v.itemBoolean=!1)},[b,(0,l.Uk)(" Atención a Menores ")],2)])])])]),v.itemBoolean?((0,l.wg)(),(0,l.j4)(f,{key:0})):(0,l.kq)("",!0),v.itemBoolean?(0,l.kq)("",!0):((0,l.wg)(),(0,l.j4)(w,{key:1}))])}var h=o(4239);const p={class:"card"},f={class:"card-body"},w=["disabled"],y=(0,l._)("i",{class:"bx bx-plus",style:{"font-size":"20px"}},null,-1),V=["disabled"],C=(0,l._)("i",{class:"bx bx-calendar",style:{"font-size":"20px"}},null,-1),k={class:"text-nowrap fw-bold text-center"},x={class:"text-nowrap fw-bold text-center"},A={class:"text-nowrap fw-bold text-center"},_={class:"text-nowrap fw-bold text-start-center"},H={class:"text-nowrap fw-bold text-center"},S={class:"text-nowrap fw-bold text-center"},R={class:"text-nowrap fw-bold text-center"},I={class:"text-nowrap fw-bold text-center"},M={id:"acciones",style:{padding:"0%"},class:"text-center"},U={class:"border border-primary border-3 rounded-2"},Z=["disabled"],F=(0,l._)("i",{class:"bx bx-calendar",style:{"font-size":"20px"}},null,-1);function N(e,a,o,n,i,s){const t=(0,l.up)("AccionesTable"),d=(0,l.up)("TableVue"),u=(0,l.up)("Form"),c=(0,l.up)("ModalVue"),m=(0,l.up)("AdvertenciaVue"),g=(0,l.up)("FullCalendarVue"),b=(0,l.up)("ActividadCalendarVue");return(0,l.wg)(),(0,l.iD)("div",p,[(0,l._)("div",f,[(0,l.Wm)(d,{ref:"tablaCamaraGessellProgramacionRef",columnas:e.columnas,url:e.urlTabla,onHandleChangedLoading:e.handleChangedLoading,onHandleChangedData:e.handleChangedData},{button:(0,l.w5)((()=>[(0,l._)("button",{class:"btn btn-primary m-1 justify-items-start",onClick:a[0]||(a[0]=(...a)=>e.handleClickNuevo&&e.handleClickNuevo(...a)),disabled:e.loading},[y,(0,l.Uk)(" Nuevo ")],8,w)])),buttons:(0,l.w5)((()=>[(0,l._)("button",{class:"btn btn-dark m-1 justify-items-start",onClick:a[1]||(a[1]=(...a)=>e.cargarAgenda&&e.cargarAgenda(...a)),disabled:e.loading},[C,(0,l.Uk)(" Agenda ")],8,V)])),tbody:(0,l.w5)((()=>[((0,l.wg)(!0),(0,l.iD)(l.HY,null,(0,l.Ko)(e.data,((a,o)=>((0,l.wg)(),(0,l.iD)("tr",{key:o},[(0,l._)("td",k,[(0,l._)("span",null,(0,r.zw)(a.correlativo??"No Ingresado"),1)]),(0,l._)("td",x,[(0,l._)("span",null,(0,r.zw)(a.fecha??"No Ingresado"),1)]),(0,l._)("td",A,[(0,l._)("span",null,(0,r.zw)(a.hora??"No Ingresado"),1)]),(0,l._)("td",_,[(0,l._)("span",null,(0,r.zw)(null===a.solicitadoPor||""===a.solicitadoPor?"No Ingresado":a.solicitadoPor),1)]),(0,l._)("td",H,[(0,l._)("span",null,(0,r.zw)(null===a.nombres||""===a.nombres?"No Ingresado":a.nombres),1)]),(0,l._)("td",S,[(0,l._)("span",null,(0,r.zw)(null===a.apellidos||""===a.apellidos?"No Ingresado":a.apellidos),1)]),(0,l._)("td",R,[(0,l._)("span",null,(0,r.zw)(a.casoSaiv?"Si":"No"),1)]),(0,l._)("td",I,[(0,l._)("span",null,(0,r.zw)(a.realizada?"Si":"No"),1)]),(0,l._)("td",M,[(0,l.Wm)(t,{json:a,loading:e.loading,showEditar:!0,showBorrar:!0,showVer:!0,onHandleClickVer:o=>e.handleClickVer(a),onHandleClickEditar:o=>e.handleClickEditar(a),onHandleClickBorrar:o=>e.handleClickBorrar(a)},null,8,["json","loading","onHandleClickVer","onHandleClickEditar","onHandleClickBorrar"])])])))),128))])),_:1},8,["columnas","url","onHandleChangedLoading","onHandleChangedData"])]),(0,l.Wm)(c,{ref:"modalCamaraGessellProgramacionRef",onHandleActualizarDatosTabla:e.handleActualizarDatos},{cardBody:(0,l.w5)((()=>[(0,l.Wm)(u,{ref:"formCamaraGessellProgramacionRef",showVer:e.showVer},(0,l.Nv)({_:2},[void 0]),1032,["showVer"])])),_:1},8,["onHandleActualizarDatosTabla"]),(0,l.Wm)(c,{ref:"modalBorrarRef",clases:"modal-centered"},{cardBody:(0,l.w5)((()=>[(0,l.Wm)(m,{ref:"advertenciaRef",mensaje:"El siguiente registro se borrara de la base de datos, ¿Continuar?",onContinuar:e.borrarRegistro},null,8,["onContinuar"])])),_:1},512),(0,l.Wm)(c,{ref:"modalAgendaRef"},{cardBody:(0,l.w5)((()=>[(0,l._)("div",U,[(0,l.Wm)(g,{onNuevaActividad:e.nuevaActividad,onHandleClickAgendaVer:e.handleClickAgendaVer,onHandleClickAgendaItem:e.handleClickAgendaItem,ref:"fullcalendarRef",title:"Cámara Gesell / Programación"},null,8,["onNuevaActividad","onHandleClickAgendaVer","onHandleClickAgendaItem"])])])),_:1},512),(0,l.Wm)(b,{ref:"ActividadCalendarRef",modulo:"Camara Gessell Programacion"},{"nuevo-button":(0,l.w5)((()=>[(0,l._)("button",{class:"btn btn-dark m-1 justify-items-start",onClick:a[3]||(a[3]=(...a)=>e.cargarAgenda&&e.cargarAgenda(...a)),disabled:e.loading},[F,(0,l.Uk)(" Agenda ")],8,Z)])),_:1},512)])}var j=o(8419),W=o(4059),z=o(8251),B=o(9242);const D={class:"card clearfix"},O={class:"card-body"},G={action:""},P={class:"row py-1 gy-2 mt-1 border border-2 border-primary rounded-3"},E=(0,l._)("div",{class:"col-md-12 mt-2"},[(0,l._)("h3",{class:"align-text-bottom"},[(0,l._)("i",{class:"bx bxs-certification bx-md"}),(0,l.Uk)("Cámara Gesell / Programación")])],-1),J={class:"col-md-4"},T={class:"fw-semibold d-block"},L={key:0,class:"bx bx-search bx-sm"},q={key:1,class:"fw-semibold d-block text-primary form-control"},Y=(0,l._)("br",null,null,-1),K={class:"px-2"};function $(e,a,o,n,i,s){const t=(0,l.up)("FormInputVue"),d=(0,l.up)("FormSelectOpcionVue"),u=(0,l.up)("V1_SelectPaginationVue"),c=(0,l.up)("AlertVue"),m=(0,l.up)("ButtonsFormVue");return(0,l.wg)(),(0,l.iD)("div",D,[(0,l._)("div",O,[(0,l._)("form",G,[(0,l._)("div",P,[E,(0,l.Wm)(t,{id:e.id+"correlativo",titulo:"Correlativo",type:"number",loading:e.loading,showVer:e.showVer,clases:["col-md-3"],value:e.formulario.correlativo,"onUpdate:value":a[0]||(a[0]=a=>e.formulario.correlativo=a)},null,8,["id","loading","showVer","value"]),(0,l.Wm)(t,{id:e.id+"fecha",titulo:"Fecha",type:"date",loading:e.loading,showVer:e.showVer,clases:["col-md-3"],value:e.formulario.fecha,"onUpdate:value":a[1]||(a[1]=a=>e.formulario.fecha=a)},null,8,["id","loading","showVer","value"]),(0,l.Wm)(t,{id:e.id+"hora",titulo:"Hora",type:"time",loading:e.loading,showVer:e.showVer,clases:["col-md-3"],value:e.formulario.hora,"onUpdate:value":a[2]||(a[2]=a=>e.formulario.hora=a)},null,8,["id","loading","showVer","value"]),(0,l.Wm)(t,{id:e.id+"hora",titulo:"Solicitado Por",loading:e.loading,showVer:e.showVer,clases:["col-md-12"],value:e.formulario.solicitadoPor,"onUpdate:value":a[3]||(a[3]=a=>e.formulario.solicitadoPor=a)},null,8,["id","loading","showVer","value"]),(0,l.Wm)(t,{id:e.id+"nombres",titulo:"Nombres Usuaria/o",loading:e.loading,showVer:e.showVer,clases:["col-md-6"],value:e.formulario.nombres,"onUpdate:value":a[4]||(a[4]=a=>e.formulario.nombres=a)},null,8,["id","loading","showVer","value"]),(0,l.Wm)(t,{id:e.id+"apellidos",titulo:"Apellidos Usuaria/o",loading:e.loading,showVer:e.showVer,clases:["col-md-6"],value:e.formulario.apellidos,"onUpdate:value":a[5]||(a[5]=a=>e.formulario.apellidos=a)},null,8,["id","loading","showVer","value"]),(0,l.Wm)(d,{id:e.id+"realizada",nombre:"Realizada",opciones:[{key:1,opcion:"Si"},{key:0,opcion:"No"}],clases:["col-md-2"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.realizada,"onUpdate:opcion":a[6]||(a[6]=a=>e.formulario.realizada=a)},null,8,["id","loading","showVer","opcion"]),(0,l.Wm)(d,{id:e.id+"caso-saiv",nombre:"Caso SAIV"+e.store.state.USUARIO.oficina,opciones:[{key:1,opcion:"Si"},{key:0,opcion:"No"}],clases:["col-md-2"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.casoSaiv,"onUpdate:opcion":a[7]||(a[7]=a=>e.formulario.casoSaiv=a),onChange:a[8]||(a[8]=a=>{"true"!==e.formulario.casoSaiv&&(e.formulario.codigoCaso=null)})},null,8,["id","nombre","loading","showVer","opcion"]),(0,l.wy)((0,l._)("div",J,[(0,l._)("label",T,[(0,l.Uk)((0,r.zw)(e.showVer?"Código del Caso":"Busqueda y Selección del Caso")+" ",1),e.showVer?(0,l.kq)("",!0):((0,l.wg)(),(0,l.iD)("i",L))]),e.showVer?((0,l.wg)(),(0,l.iD)("label",q,(0,r.zw)(null===e.formulario.codigoCaso?"No Ingresado":e.formulario.codigoCaso.label),1)):((0,l.wg)(),(0,l.j4)(u,{key:0,url:"saiv/casos/indexSelect",disabled:e.showVer??!1,modelValue:e.formulario.codigoCaso,"onUpdate:modelValue":a[9]||(a[9]=a=>e.formulario.codigoCaso=a)},null,8,["disabled","modelValue"]))],512),[[B.F8,e.formulario.casoSaiv]]),Y,(0,l._)("div",K,[(0,l.Wm)(c,{mensajesAlert:e.mensajesAlert,alert:e.tipoAlert},null,8,["mensajesAlert","alert"])])]),(0,l.Wm)(m,{showVer:e.showVer??!1,loading:e.loading,showSig:!1,showAnt:!1,onGuardar:e.guardar},{"nuevo-button":(0,l.w5)((()=>[(0,l.WI)(e.$slots,"nuevo-button")])),_:3},8,["showVer","loading","onGuardar"])])])])}const Q={class:"pagination"},X=["onClick"],ee=["onClick"];function ae(e,a,o,n,i,s){const t=(0,l.up)("v-select");return(0,l.wg)(),(0,l.j4)(t,{value:e.value,options:e.data,loading:e.loading,filterable:!1,disabled:e.disabled??!1,onSearch:e.onSearch,onInput:a[0]||(a[0]=a=>e.inputValue(a)),placeholder:"Seleccione"},{"list-footer":(0,l.w5)((()=>[(0,l._)("li",Q,[((0,l.wg)(!0),(0,l.iD)(l.HY,null,(0,l.Ko)(e.links,((a,o)=>((0,l.wg)(),(0,l.iD)(l.HY,{key:o},["Siguiente"===e.linkLabel(a)||"Anterior"===e.linkLabel(a)?((0,l.wg)(),(0,l.iD)("button",{key:0,onClick:o=>e.HandleClick(a),type:"button",class:(0,r.C_)([[a.active&&!e.loading?"active":null,a.url&&!e.loading?"":"disabled"],"btn btn-primary mx-2"])},[(0,l._)("strong",null,[(0,l._)("i",{class:(0,r.C_)(["tf-icon bx",{"bx-chevrons-right":"Siguiente"===e.linkLabel(a)," bx-chevrons-left":"Anterior"===e.linkLabel(a)}])},null,2)])],10,X)):(0,l.kq)("",!0),"1"===e.linkLabel(a)?((0,l.wg)(),(0,l.iD)("button",{key:1,onClick:o=>e.HandleClick(a),type:"button",class:(0,r.C_)([["disabled"],"btn btn-outline-primary mx-2"])},[(0,l._)("strong",null,(0,r.zw)(e.registros),1)],8,ee)):(0,l.kq)("",!0)],64)))),128))])])),_:1},8,["value","options","loading","disabled","onSearch"])}var oe=o(4870),le=o(8910),re=o(4009),ne=(0,l.aZ)({props:["url","filtro","value","disabled"],components:{pagination:le.Z},setup(e,{emit:a}){const o=(0,oe.iH)(e.pageSize??10),r=(0,oe.iH)(!0),n=(0,oe.iH)([]),i=(0,oe.iH)(h.Z.state.URL_SERVER+e.url),s=(0,oe.iH)([]),t=(0,oe.iH)(null),d=(0,oe.iH)(null),u=(0,oe.iH)(e.filtro??null),c=async()=>{r.value=!0;const e=await re.Z.datosTabla({filtro:u.value,busqueda:t.value,porPagina:parseInt(o.value)},i.value);n.value=e.data,s.value=e.links,r.value=e.cargando,d.value=e.current_page+"/"+e.last_page},m=e=>e.label.includes("ext")?"Siguiente":e.label.includes("revious")?"Anterior":e.label,g=async e=>{e.url&&(i.value=e.url,await c())},b=e=>{let o="Seleccione"===e.target.value?null:e.target.value;a("input:value",o)};(0,l.bv)((()=>{c()}));const v=async a=>{t.value=a,r.value=!0,i.value=h.Z.state.URL_SERVER+e.url,await c(),r.value=!1};return{HandleClick:g,inputValue:b,linkLabel:m,onSearch:v,data:n,links:s,loading:r,registros:d}}}),ie=o(89);const se=(0,ie.Z)(ne,[["render",ae],["__scopeId","data-v-c53a8374"]]);var te=se,de=o(1787),ue=o(5035),ce=o(2366),me=o(4118),ge=(0,l.aZ)({props:["showVer"],components:{V1_SelectPaginationVue:te,FormSelectOpcionVue:de.Z,ButtonsFormVue:ue.Z,FormInputVue:ce.Z,AlertVue:me.Z},setup(e){const a=(0,oe.iH)("camara-gessell-programacion-"),o=(0,oe.iH)(!1),l=(0,oe.iH)(null),r=(0,oe.iH)(null),n={key:null,correlativo:null,fecha:null,hora:null,solicitadoPor:null,nombres:null,apellidos:null,casoSaiv:null,realizada:null,codigoCaso:null},i=(0,oe.qj)(JSON.parse(JSON.stringify(n)));function s(e){Object.assign(i,JSON.parse(JSON.stringify(e)))}function t(){l.value=null,r.value=null,o.value=!1,Object.assign(i,JSON.parse(JSON.stringify(n)))}const d=e=>o.value=e,u=async()=>{try{o.value=!0;const e=await j.Z.actualizarCrear(i,"saiv/camara/gessell/programacion/guardar");if(e.ok){if(e.json.error)return l.value="warning",void(r.value=e.json.error);i.key=e.json.key,i.correlativo=e.json.correlativo,l.value=r.value=null}o.value=!1}catch(e){console.log("¡Ups ocurrio un error!, no se pudo guardar el registro seguimiento"),o.value=!1}};return{store:h.Z,formulario:i,mensajesAlert:r,tipoAlert:l,loading:o,id:a,handleChangeLoading:d,resetForm:t,editForm:s,guardar:u}}});const be=(0,ie.Z)(ge,[["render",$]]);var ve=be,he=o(7783),pe=o(9684),fe=o(9078),we=o(3988);const ye=[{nombre:"Correlativo",class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-sort-down"},{nombre:"Fecha",class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-minus"},{nombre:"Hora",class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-minus"},{nombre:"Solicitado Por",class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-minus"},{nombre:"Nombres Usuaria/o",class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-minus"},{nombre:"Apellidos Usuaria/o",class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-minus"},{nombre:"Caso SAIV"+h.Z.state.USUARIO.oficina,class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-minus"},{nombre:"Realizada",class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-minus"},{nombre:"Acciones",class:"bg-primary text-white fw-bold text-center",key:"acciones",style:""}],Ve="saiv/camara/gessell/programacion/index";var Ce=(0,l.aZ)({components:{Form:ve,ModalVue:W.Z,TableVue:z.Z,AccionesTable:he.Z,AdvertenciaVue:pe.Z,FullCalendarVue:fe["default"],ActividadCalendarVue:we.Z},setup(e){const a=(0,oe.iH)(!0),o=(0,oe.iH)(null),l=(0,oe.iH)(null),r=(0,oe.iH)("Todos"),n=(0,oe.iH)(!1),i=(0,oe.iH)(!1),s=(0,oe.iH)([]),t=(0,oe.iH)(null),d=(0,oe.iH)(null),u=(0,oe.iH)(null),c=(0,oe.iH)(null),m=(0,oe.iH)(null),g=(0,oe.iH)(null),b=(0,oe.iH)(null),v=(0,oe.iH)(null),p=(0,oe.iH)(null),f=e=>{},w=async e=>{s.value=e},y=()=>{n.value=!0,t.value.handleActualizarDatos(),u.value.resetForm(),n.value=!1},V=()=>{i.value=null,u.value.resetForm(),d.value.showModal()},C=async()=>{try{d.value.hideModal(),p.value.hideModal(),H(!0),b.value.renderCalendar(!1),v.value.showModal();const e=await j.Z.obtener("saiv/camara/gessell/programacion/fullcalendar/evenst");b.value.setEvents(e),b.value.renderCalendar(!0),H(!1)}catch(e){H(!1),console.log(e)}},k=()=>{v.value.hideModal()},x=()=>{v.value.hideModal(),p.value.resetForm(),p.value.showModal()},A=e=>{v.value.hideModal(),S(e)},_=e=>{v.value.hideModal(),p.value.resetForm(),p.value.editForm(e),p.value.showModal()},H=e=>n.value=e,S=e=>{i.value=!0,M(e)},R=e=>{i.value=!1,M(e)},I=e=>{m.value.setJson(e),o.value='Borrar el Registro "'+e.codigo+'" ¿Continuar?',c.value.showModal()},M=async e=>{try{if("undefined"===typeof e.key)return;H(!0),u.value.resetForm();const a=await j.Z.obtener("saiv/camara/gessell/programacion/obtener/"+e.key);if(H(!1),"undefined"===typeof a)return;l.value=a.codigoCaso,u.value.editForm(a),d.value.showModal()}catch(a){console.log("Error -> "+a)}},U=async e=>{"undefined"!==typeof e&&(H(!0),await j.Z.borrarCaso({key:e},"saiv/camara/gessell/programacion/borrar"),t.value.handleActualizarDatos(),H(!1))};return{mensajeBorrar:o,urlTabla:Ve,columnas:ye,store:h.Z,intercambiarForm:a,codigoCaso:l,tipoCaso:r,loading:n,showVer:i,data:s,tablaCamaraGessellProgramacionRef:t,modalCamaraGessellProgramacionRef:d,formCamaraGessellProgramacionRef:u,ActividadCalendarRef:p,fullcalendarRef:b,modalBorrarRef:c,advertenciaRef:m,modalAgendaRef:v,formCasoRef:g,handleActualizarDatos:y,handleChangedLoading:f,handleClickAgendaVer:A,handleChangedData:w,handleClickNuevo:V,borrarRegistro:U,handleClickBorrar:I,handleClickEditar:R,handleClickVer:S,cargarAgenda:C,ocultarAgenda:k,nuevaActividad:x,handleClickAgendaItem:_}}});const ke=(0,ie.Z)(Ce,[["render",N]]);var xe=ke;const Ae={class:"card"},_e={class:"card-body"},He=["disabled"],Se=(0,l._)("i",{class:"bx bx-plus",style:{"font-size":"20px"}},null,-1),Re=["disabled"],Ie=(0,l._)("i",{class:"bx bx-calendar",style:{"font-size":"20px"}},null,-1),Me={class:"text-nowrap fw-bold text-center"},Ue={class:"text-nowrap fw-bold text-center"},Ze={class:"text-nowrap fw-bold text-center"},Fe={class:"text-nowrap fw-bold text-center"},Ne={id:"acciones",style:{padding:"0%"},class:"text-center"},je={class:"border border-primary border-3 rounded-2"},We=["disabled"],ze=(0,l._)("i",{class:"bx bx-calendar",style:{"font-size":"20px"}},null,-1);function Be(e,a,o,n,i,s){const t=(0,l.up)("AccionesTable"),d=(0,l.up)("TableVue"),u=(0,l.up)("Form"),c=(0,l.up)("ModalVue"),m=(0,l.up)("AdvertenciaVue"),g=(0,l.up)("FullCalendarVue"),b=(0,l.up)("ActividadCalendarVue");return(0,l.wg)(),(0,l.iD)("div",Ae,[(0,l._)("div",_e,[(0,l.Wm)(d,{ref:"tablaCamaraGessellAtencionMenoresRef",columnas:e.columnas,url:e.urlTabla,onHandleChangedLoading:e.handleChangedLoading,onHandleChangedData:e.handleChangedData},{button:(0,l.w5)((()=>[(0,l._)("button",{class:"btn btn-primary m-1 justify-items-start",onClick:a[0]||(a[0]=(...a)=>e.handleClickNuevo&&e.handleClickNuevo(...a)),disabled:e.loading},[Se,(0,l.Uk)(" Nuevo ")],8,He)])),buttons:(0,l.w5)((()=>[(0,l._)("button",{class:"btn btn-dark m-1 justify-items-start",onClick:a[1]||(a[1]=(...a)=>e.cargarAgenda&&e.cargarAgenda(...a)),disabled:e.loading},[Ie,(0,l.Uk)(" Agenda ")],8,Re)])),tbody:(0,l.w5)((()=>[((0,l.wg)(!0),(0,l.iD)(l.HY,null,(0,l.Ko)(e.data,((a,o)=>((0,l.wg)(),(0,l.iD)("tr",{key:o},[(0,l._)("td",Me,[(0,l._)("span",null,(0,r.zw)(a.correlativo??"No Ingresado"),1)]),(0,l._)("td",Ue,[(0,l._)("span",null,(0,r.zw)(a.fecha??"No Ingresado"),1)]),(0,l._)("td",Ze,[(0,l._)("span",null,(0,r.zw)(a.horaIngreso??"No Ingresado"),1)]),(0,l._)("td",Fe,[(0,l._)("span",null,(0,r.zw)(a.horaSalida??"No Ingresado"),1)]),(0,l._)("td",Ne,[(0,l.Wm)(t,{json:a,loading:e.loading,showEditar:!0,showBorrar:!0,showVer:!0,onHandleClickVer:o=>e.handleClickVer(a),onHandleClickEditar:o=>e.handleClickEditar(a),onHandleClickBorrar:o=>e.handleClickBorrar(a)},null,8,["json","loading","onHandleClickVer","onHandleClickEditar","onHandleClickBorrar"])])])))),128))])),_:1},8,["columnas","url","onHandleChangedLoading","onHandleChangedData"])]),(0,l.Wm)(c,{ref:"modalCamaraGessellAtencionMenoresRef",onHandleActualizarDatosTabla:e.handleActualizarDatos},{cardBody:(0,l.w5)((()=>[(0,l.Wm)(u,{showVer:e.showVer,ref:"formCamaraGessellAtencionMenoresRef"},(0,l.Nv)({_:2},[void 0]),1032,["showVer"])])),_:1},8,["onHandleActualizarDatosTabla"]),(0,l.Wm)(c,{ref:"modalBorrarRef",clases:"modal-centered"},{cardBody:(0,l.w5)((()=>[(0,l.Wm)(m,{ref:"advertenciaRef",mensaje:"El siguiente registro se borrara de la base de datos, ¿continuar?",onContinuar:e.borrarRegistro},null,8,["onContinuar"])])),_:1},512),(0,l.Wm)(c,{ref:"modalAgendaRef"},{cardBody:(0,l.w5)((()=>[(0,l._)("div",je,[(0,l.Wm)(g,{onNuevaActividad:e.nuevaActividad,onHandleClickAgendaVer:e.handleClickAgendaVer,onHandleClickAgendaItem:e.handleClickAgendaItem,ref:"fullcalendarRef",title:"Cámara Gesell / Atención a Menores"},null,8,["onNuevaActividad","onHandleClickAgendaVer","onHandleClickAgendaItem"])])])),_:1},512),(0,l.Wm)(b,{ref:"ActividadCalendarRef",modulo:"Cámara Gesell Atencion de Menores"},{"nuevo-button":(0,l.w5)((()=>[(0,l._)("button",{class:"btn btn-dark m-1 justify-items-start",onClick:a[3]||(a[3]=(...a)=>e.cargarAgenda&&e.cargarAgenda(...a)),disabled:e.loading},[ze,(0,l.Uk)(" Agenda ")],8,We)])),_:1},512)])}const De={class:"card clearfix"},Oe={class:"card-body"},Ge={action:""},Pe={class:"row py-1 gy-2 mt-1 border border-2 border-primary rounded-3"},Ee=(0,l._)("div",{class:"col-md-12 mt-2"},[(0,l._)("h3",{class:"align-text-bottom"},[(0,l._)("i",{class:"bx bxs-certification bx-md"}),(0,l.Uk)(" Camara Gessell / Atención de Menores de Edad ")])],-1),Je={class:"col-md-4"},Te={class:"fw-semibold d-block"},Le={key:0,class:"bx bx-search bx-sm"},qe={key:1,class:"fw-semibold d-block text-primary form-control"},Ye=(0,l._)("br",null,null,-1),Ke={class:"px-2"};function $e(e,a,o,n,i,s){const t=(0,l.up)("FormInputVue"),d=(0,l.up)("FormSelectOpcionVue"),u=(0,l.up)("V1_SelectPaginationVue"),c=(0,l.up)("AlertVue"),m=(0,l.up)("ButtonsFormVue");return(0,l.wg)(),(0,l.iD)("div",De,[(0,l._)("div",Oe,[(0,l._)("form",Ge,[(0,l._)("div",Pe,[Ee,(0,l.Wm)(t,{id:e.id+"correlativo",titulo:"Correlativo (Opcional)",type:"number",loading:e.loading,showVer:e.showVer,clases:["col-md-3"],value:e.formulario.correlativo,"onUpdate:value":a[0]||(a[0]=a=>e.formulario.correlativo=a)},null,8,["id","titulo","loading","showVer","value"]),(0,l.Wm)(t,{id:e.id+"fecha",titulo:"Fecha",type:"date",loading:e.loading,showVer:e.showVer,clases:["col-md-3"],value:e.formulario.fecha,"onUpdate:value":a[1]||(a[1]=a=>e.formulario.fecha=a)},null,8,["id","loading","showVer","value"]),(0,l.Wm)(t,{id:e.id+"hora-ingreso",titulo:"Hora Ingreso",type:"time",loading:e.loading,showVer:e.showVer,clases:["col-md-3"],value:e.formulario.horaIngreso,"onUpdate:value":a[2]||(a[2]=a=>e.formulario.horaIngreso=a)},null,8,["id","loading","showVer","value"]),(0,l.Wm)(t,{id:e.id+"hora-salida",titulo:"Hora Salida",type:"time",loading:e.loading,showVer:e.showVer,clases:["col-md-3"],value:e.formulario.horaSalida,"onUpdate:value":a[3]||(a[3]=a=>e.formulario.horaSalida=a)},null,8,["id","loading","showVer","value"]),(0,l.Wm)(t,{id:e.id+"nombres-menor",titulo:"Nombres Menor",loading:e.loading,showVer:e.showVer,clases:["col-md-6"],value:e.formulario.nombresMenor,"onUpdate:value":a[4]||(a[4]=a=>e.formulario.nombresMenor=a)},null,8,["id","loading","showVer","value"]),(0,l.Wm)(t,{id:e.id+"apellidos-menor",titulo:"Apellidos Menor",loading:e.loading,showVer:e.showVer,clases:["col-md-6"],value:e.formulario.apellidosMenor,"onUpdate:value":a[5]||(a[5]=a=>e.formulario.apellidosMenor=a)},null,8,["id","loading","showVer","value"]),(0,l.Wm)(t,{id:e.id+"edad-menor",titulo:"Edad Menor",type:"number",min:0,max:130,loading:e.loading,showVer:e.showVer,clases:["col-md-6"],value:e.formulario.edad,"onUpdate:value":a[6]||(a[6]=a=>e.formulario.edad=a)},null,8,["id","loading","showVer","value"]),(0,l.Wm)(d,{id:e.id+"enfermo-menor",nombre:"Enferma/o",opciones:[{key:1,opcion:"Si"},{key:0,opcion:"No"}],clases:["col-md-2"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.enfermo,"onUpdate:opcion":a[7]||(a[7]=a=>e.formulario.enfermo=a)},null,8,["id","loading","showVer","opcion"]),(0,l.Wm)(t,{id:e.id+"nombres-responsable",titulo:"Nombres Responsable",loading:e.loading,showVer:e.showVer,clases:["col-md-6"],value:e.formulario.nombresResponsable,"onUpdate:value":a[8]||(a[8]=a=>e.formulario.nombresResponsable=a)},null,8,["id","loading","showVer","value"]),(0,l.Wm)(t,{id:e.id+"apellidos-responsable",titulo:"Apellidos Responsable",loading:e.loading,showVer:e.showVer,clases:["col-md-6"],value:e.formulario.apellidosResponsable,"onUpdate:value":a[9]||(a[9]=a=>e.formulario.apellidosResponsable=a)},null,8,["id","loading","showVer","value"]),(0,l.Wm)(t,{id:e.id+"dui-responsable",titulo:"Dui Responsable",loading:e.loading,showVer:e.showVer,clases:["col-md-6"],value:e.formulario.duiResponsable,"onUpdate:value":a[10]||(a[10]=a=>e.formulario.duiResponsable=a)},null,8,["id","loading","showVer","value"]),(0,l.Wm)(d,{id:e.id+"caso-saiv",nombre:"Caso SAIV"+e.store.state.USUARIO.oficina,opciones:[{key:1,opcion:"Si"},{key:0,opcion:"No"}],clases:["col-md-2"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.casoSaiv,"onUpdate:opcion":a[11]||(a[11]=a=>e.formulario.casoSaiv=a),onChange:a[12]||(a[12]=a=>{"true"!==e.formulario.casoSaiv&&(e.formulario.codigoCaso=null)})},null,8,["id","nombre","loading","showVer","opcion"]),(0,l.wy)((0,l._)("div",Je,[(0,l._)("label",Te,[(0,l.Uk)((0,r.zw)(e.showVer?"Código del Caso":"Busqueda y Selección del Caso")+" ",1),e.showVer?(0,l.kq)("",!0):((0,l.wg)(),(0,l.iD)("i",Le))]),e.showVer?((0,l.wg)(),(0,l.iD)("label",qe,(0,r.zw)(null===e.formulario.codigoCaso?"No Ingresado":e.formulario.codigoCaso.label),1)):((0,l.wg)(),(0,l.j4)(u,{key:0,url:"saiv/casos/indexSelect",disabled:e.showVer??!1,modelValue:e.formulario.codigoCaso,"onUpdate:modelValue":a[13]||(a[13]=a=>e.formulario.codigoCaso=a)},null,8,["disabled","modelValue"]))],512),[[B.F8,1==e.formulario.casoSaiv]]),Ye,(0,l._)("div",Ke,[(0,l.Wm)(c,{mensajesAlert:e.mensajesAlert,alert:e.tipoAlert},null,8,["mensajesAlert","alert"])])]),(0,l.Wm)(m,{showVer:e.showVer??!1,loading:e.loading,showSig:!1,showAnt:!1,onGuardar:e.guardar},{"nuevo-button":(0,l.w5)((()=>[(0,l.WI)(e.$slots,"nuevo-button")])),_:3},8,["showVer","loading","onGuardar"])])])])}var Qe=(0,l.aZ)({props:["showVer"],components:{V1_SelectPaginationVue:te,FormSelectOpcionVue:de.Z,ButtonsFormVue:ue.Z,FormInputVue:ce.Z,AlertVue:me.Z},setup(e){const a=(0,oe.iH)("camara-gessell-atencion-menores-edad-"),o=(0,oe.iH)(!1),l=(0,oe.iH)(null),r=(0,oe.iH)(null),n=(0,oe.iH)(null),i={key:null,correlativo:null,fecha:null,ubicacionAdultoResponsable:null,ubicacionAdultoResponsableOtro:null,nombresMenor:null,apellidosMenor:null,edad:null,enfermo:null,nombresResponsable:null,apellidosResponsable:null,duiResponsable:null,horaIngreso:null,horaSalida:null,casoSaiv:null,codigoCaso:null},s=(0,oe.qj)(JSON.parse(JSON.stringify(i)));function t(){l.value=null,n.value=null,o.value=!1,Object.assign(s,JSON.parse(JSON.stringify(i)))}function d(e){Object.assign(s,JSON.parse(JSON.stringify(e)))}const u=e=>o.value=e,c=async()=>{try{o.value=!0;const e=await j.Z.actualizarCrear(s,"saiv/camara/gessell/atencion/menores/guardar");if(e.ok){if(e.json.error)return l.value="warning",void(n.value=e.json.error);s.key=e.json.key,l.value=n.value=null}o.value=!1}catch(e){console.log("¡Ups ocurrio un error!, no se pudo guardar el registro seguimiento"),o.value=!1}};return{store:h.Z,mensajesAlert:n,formulario:s,tipoAlert:l,opciones:r,loading:o,id:a,handleChangeLoading:u,resetForm:t,editForm:d,guardar:c}}});const Xe=(0,ie.Z)(Qe,[["render",$e]]);var ea=Xe;const aa=[{nombre:"Correlativo",class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-sort-down"},{nombre:"Fecha",class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-minus"},{nombre:"Hora Ingreso",class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-minus"},{nombre:"Hora Salida",class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-minus"},{nombre:"Acciones",class:"bg-primary text-white fw-bold text-center",key:"acciones",style:""}],oa="saiv/camara/gessell/atencion/menores/index";var la=(0,l.aZ)({components:{Form:ea,ModalVue:W.Z,TableVue:z.Z,AccionesTable:he.Z,AdvertenciaVue:pe.Z,FullCalendarVue:fe["default"],ActividadCalendarVue:we.Z},setup(){const e=(0,oe.iH)([]),a=(0,oe.iH)(!1),o=(0,oe.iH)(!1),l=(0,oe.iH)("Todos"),r=(0,oe.iH)(null),n=(0,oe.iH)(null),i=(0,oe.iH)(!0),s=(0,oe.iH)(null),t=(0,oe.iH)(null),d=(0,oe.iH)(null),u=(0,oe.iH)(null),c=(0,oe.iH)(null),m=(0,oe.iH)(null),g=(0,oe.iH)(null),b=(0,oe.iH)(null),v=(0,oe.iH)(null),p=e=>{o.value=e},f=async a=>{e.value=a},w=()=>{o.value=!0,d.value.resetForm(),s.value.handleActualizarDatos(),o.value=!1},y=()=>{a.value=!1,d.value.resetForm(),t.value.showModal()},V=e=>o.value=e,C=e=>{a.value=!0,A(e)},k=e=>{a.value=!1,A(e)},x=e=>{g.value.setJson(e),n.value='Borrar el Registro "'+e.codigo+'" ¿Continuar?',b.value.showModal()},A=async e=>{try{if("undefined"===typeof e.key)return;V(!0),d.value.resetForm();const a=await j.Z.obtener("saiv/camara/gessell/atencion/menores/obtener/"+e.key);if(V(!1),"undefined"===typeof a)return;r.value=a.codigoCaso,d.value.editForm(a),t.value.showModal()}catch(a){console.log("Error -> "+a)}},_=async e=>{"undefined"!==typeof e&&(V(!0),await j.Z.borrarCaso({key:e},"saiv/camara/gessell/atencion/menores/borrar"),s.value.handleActualizarDatos(),V(!1))},H=async()=>{try{t.value.hideModal(),u.value.hideModal(),V(!0),c.value.renderCalendar(!1),m.value.showModal();const e=await j.Z.obtener("saiv/camara/gessell/atencion/menores/fullcalendar/evenst");c.value.setEvents(e),c.value.renderCalendar(!0),V(!1)}catch(e){V(!1),console.log(e)}},S=()=>{m.value.hideModal()},R=()=>{m.value.hideModal(),u.value.resetForm(),u.value.showModal()},I=e=>{m.value.hideModal(),C(e)},M=e=>{m.value.hideModal(),u.value.resetForm(),u.value.editForm(e),u.value.showModal()};return{urlTabla:oa,columnas:aa,store:h.Z,intercambiarForm:i,mensajeBorrar:n,codigoCaso:r,tipoCaso:l,loading:o,showVer:a,data:e,tablaCamaraGessellAtencionMenoresRef:s,modalCamaraGessellAtencionMenoresRef:t,formCamaraGessellAtencionMenoresRef:d,ActividadCalendarRef:u,fullcalendarRef:c,advertenciaRef:g,modalAgendaRef:m,modalBorrarRef:b,formCasoRef:v,handleActualizarDatos:w,handleChangedLoading:p,handleChangedData:f,handleClickNuevo:y,handleClickBorrar:x,borrarRegistro:_,handleClickVer:C,handleClickEditar:k,handleClickBorrar:x,cargarAgenda:H,handleClickAgendaVer:I,ocultarAgenda:S,nuevaActividad:R,handleClickAgendaItem:M}}});const ra=(0,ie.Z)(la,[["render",Be]]);var na=ra,ia={components:{"ProgramaciónView":xe,AtencionMenoresView:na},setup(){const e=(0,oe.iH)(!0);return{itemBoolean:e,store:h.Z}}};const sa=(0,ie.Z)(ia,[["render",v]]);var ta=sa}}]);
//# sourceMappingURL=554.73937164.js.map