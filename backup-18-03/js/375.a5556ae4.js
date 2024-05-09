"use strict";(self["webpackChunkvue"]=self["webpackChunkvue"]||[]).push([[375],{3988:function(e,o,a){a.d(o,{Z:function(){return H}});var l=a(3396),n=a(9242);const i={class:"border border-2 border-light mx-0 p-1 rounded"},r={class:"card-body p-2 clearfix"},s={class:"container-fluid border border-2 border-primary rounded-3"},t=(0,l._)("div",{class:"row"},[(0,l._)("div",{class:"col-md mt-2"},[(0,l._)("h3",{class:"my-2"},[(0,l._)("i",{class:"bx bx-calendar bx-md bx-tada-hover"}),(0,l.Uk)(" Agenda / Actividad")])])],-1),d={class:"row"},u={class:"col-md mb-2"},c=(0,l._)("label",{class:"fw-bold"},[(0,l._)("code",null,"*"),(0,l.Uk)("Titulo")],-1),m=["disabled"],b={class:"row"},p={class:"px-2"},g=(0,l._)("i",{class:"bx bxs-trash-alt bx-tada-hover"},null,-1),h=(0,l.Uk)(" Eliminar "),v=[g,h];function f(e,o,a,g,h,f){const w=(0,l.up)("FormInput"),y=(0,l.up)("AlertVue"),C=(0,l.up)("ButtonsFormVue"),V=(0,l.up)("ModalVue"),x=(0,l.up)("AdvertenciaVue");return(0,l.wg)(),(0,l.iD)("div",null,[(0,l.Wm)(V,{ref:"modalAgendaRef",clases:"modal-centered"},{cardBody:(0,l.w5)((()=>[(0,l._)("div",i,[(0,l._)("form",null,[(0,l._)("div",r,[(0,l._)("div",s,[t,(0,l._)("div",d,[(0,l._)("div",u,[c,(0,l.wy)((0,l._)("textarea",{id:"agenda-titulo",class:"form-control",disabled:e.loading||(e.showVer??!1),"onUpdate:modelValue":o[0]||(o[0]=o=>e.formulario.titulo=o),cols:"20",rows:"2",placeholder:"Ingrese"},null,8,m),[[n.nr,e.formulario.titulo]])])]),(0,l._)("div",b,[(0,l.Wm)(w,{id:"agenda-fecha-inicio",obligatorio:!0,loading:e.loading,type:"datetime-local",clases:"col-md-12  mb-2",showVer:e.showVer,disabled:e.loading,titulo:"Fecha Inicio",value:e.formulario.fecha_inicio,"onUpdate:value":o[1]||(o[1]=o=>e.formulario.fecha_inicio=o)},null,8,["loading","showVer","disabled","value"]),(0,l.Wm)(w,{id:"agenda-fecha-final",loading:e.loading,clases:"col-md-12  mb-2",type:"datetime-local",showVer:e.showVer,disabled:e.loading,titulo:"Fecha Final (Opcional)",value:e.formulario.fecha_final,"onUpdate:value":o[2]||(o[2]=o=>e.formulario.fecha_final=o)},null,8,["loading","showVer","disabled","titulo","value"])])]),(0,l._)("div",p,[(0,l.Wm)(y,{mensajesAlert:e.mensajesAlert,alert:e.tipoAlert},null,8,["mensajesAlert","alert"])]),(0,l.Wm)(C,{showVer:e.showVer??!1,loading:e.loading,showSig:!1,showAnt:!1,showReset:!1,onGuardar:e.handledClickGuardar},{"nuevo-button":(0,l.w5)((()=>[(0,l.WI)(e.$slots,"nuevo-button"),null!==e.formulario.key?((0,l.wg)(),(0,l.iD)("button",{key:0,class:"btn btn-danger",type:"button",onClick:o[3]||(o[3]=o=>e.handleClickBorrar(e.formulario))},v)):(0,l.kq)("",!0)])),_:3},8,["showVer","loading","onGuardar"])])])])])),_:3},512),(0,l.Wm)(V,{ref:"modalBorrarRef",clases:"modal-centered"},{cardBody:(0,l.w5)((()=>[(0,l.Wm)(x,{ref:"advertenciaRef",mensaje:"El siguiente registro de Agenda se borrara de la base de datos, ¿Continuar?",onContinuar:e.borrarActividadAgenda},null,8,["onContinuar"])])),_:1},512)])}var w=a(8419),y=a(4059),C=a(2366),V=a(4118),x=a(5628),_=a(9684),k=a(4870),A=(0,l.aZ)({props:["modulo"],components:{ModalVue:y.Z,FormInput:C.Z,AlertVue:V.Z,ButtonsFormVue:x.Z,AdvertenciaVue:_.Z},setup(e,{emit:o}){const a={key:null,titulo:null,modulo:e.modulo??null,fecha_inicio:null,fecha_final:null},l=(0,k.qj)(JSON.parse(JSON.stringify(a))),n=(0,k.iH)(!1),i=(0,k.iH)(!1),r=(0,k.iH)(null),s=(0,k.iH)(null),t=(0,k.iH)(null),d=(0,k.iH)(null),u=(0,k.iH)(null);function c(){r.value=null,s.value=null,n.value=!1,Object.assign(l,JSON.parse(JSON.stringify(a)))}function m(o){Object.assign(l,JSON.parse(JSON.stringify(o))),l.modulo=e.modulo}const b=()=>t.value.showModal(),p=()=>t.value.hideModal(),g=async()=>{n.value=!0;try{const e=await w.Z.actualizarCrear(l,"saiv/agenda/guardar");e.ok&&(e.json.error?(r.value="warning",s.value=e.json.error):(l.key=e.json.key,r.value=s.value=null)),n.value=!1}catch(e){console.log(e),console.log("¡Ups ocurrio un error!, no se guardo el registro."),n.value=!1}},h=e=>{t.value.hideModal(),d.value.setJson(e),u.value.showModal()},v=async e=>{if("undefined"!==typeof e){n.value=!0;const o=await w.Z.borrarCaso({key:e},"saiv/agenda/borrar");"undefined"!==typeof o&&"undefined"!==typeof o._json&&o.ok&&o._json.borrado&&c(),n.value=!1}t.value.showModal()};return{mensajesAlert:s,formulario:l,tipoAlert:r,loading:n,showVer:i,modalAgendaRef:t,advertenciaRef:d,modalBorrarRef:u,editForm:m,showModal:b,hideModal:p,resetForm:c,handleClickBorrar:h,handledClickGuardar:g,borrarActividadAgenda:v}}}),S=a(89);const R=(0,S.Z)(A,[["render",f]]);var H=R},9558:function(e,o,a){a.d(o,{Z:function(){return b}});var l=a(3396),n=a(7139);const i={class:"pagination"},r=["onClick"],s=["onClick"];function t(e,o,a,t,d,u){const c=(0,l.up)("v-select");return(0,l.wg)(),(0,l.j4)(c,{value:e.value,options:e.data,loading:e.loading,disabled:e.disabled??!1,filterable:!1,onSearch:e.onSearch,onInput:o[0]||(o[0]=o=>e.inputValue(o)),placeholder:"Seleccione"},{"list-footer":(0,l.w5)((()=>[(0,l._)("li",i,[((0,l.wg)(!0),(0,l.iD)(l.HY,null,(0,l.Ko)(e.links,((o,a)=>((0,l.wg)(),(0,l.iD)(l.HY,{key:a},["Siguiente"===e.linkLabel(o)||"Anterior"===e.linkLabel(o)?((0,l.wg)(),(0,l.iD)("button",{key:0,onClick:a=>e.HandleClick(o),type:"button",class:(0,n.C_)([[o.active&&!e.loading?"active":null,o.url&&!e.loading?"":"disabled"],"btn btn-primary mx-2"])},[(0,l._)("strong",null,[(0,l._)("i",{class:(0,n.C_)(["tf-icon bx",{"bx-chevrons-right":"Siguiente"===e.linkLabel(o),"bx-chevrons-left":"Anterior"===e.linkLabel(o)}])},null,2)])],10,r)):(0,l.kq)("",!0),"1"===e.linkLabel(o)?((0,l.wg)(),(0,l.iD)("button",{key:1,onClick:a=>e.HandleClick(o),type:"button",class:(0,n.C_)([["disabled"],"btn btn-outline-primary mx-2"])},[(0,l._)("strong",null,(0,n.zw)(e.registros),1)],8,s)):(0,l.kq)("",!0)],64)))),128))])])),_:1},8,["value","options","loading","disabled","onSearch"])}var d=a(4870),u=(0,l.aZ)({props:["url","filtro","value","registros","links","data","loading","disabled"],setup(e,{emit:o}){(0,d.iH)(e.url);const a=e=>e.label.includes("ext")?"Siguiente":e.label.includes("revious")?"Anterior":e.label,l=async e=>{e.url&&o("setUrlSelect",e.url)},n=e=>{let a="Seleccione"===e.target.value?null:e.target.value;o("input:value",a)},i=async e=>{o("changeVariablesBusqueda",e),o("resetUrlSelect")};return{HandleClick:l,inputValue:n,linkLabel:a,onSearch:i}}}),c=a(89);const m=(0,c.Z)(u,[["render",t],["__scopeId","data-v-4b7001fe"]]);var b=m},8946:function(e,o,a){a.r(o),a.d(o,{default:function(){return So}});var l=a(3396),n=a(7139),i=a(9242);const r=e=>((0,l.dD)("data-v-3feaba71"),e=e(),(0,l.Cn)(),e),s={class:"container-fluid flex-grow-1 container-p-y"},t={class:"fw-bold py-3 mb-4"},d={class:"text-muted fw-light text-center"},u=(0,l.Uk)(" Ludoteca "),c={class:"card"},m={class:"card-body"},b=["disabled"],p=r((()=>(0,l._)("i",{class:"bx bx-plus",style:{"font-size":"20px"}},null,-1))),g=(0,l.Uk)(" Nuevo "),h=[p,g],v=["disabled"],f=r((()=>(0,l._)("i",{class:"bx bx-calendar",style:{"font-size":"20px"}},null,-1))),w=(0,l.Uk)(" Agenda "),y=[f,w],C={class:"text-nowrap"},V={class:"text-nowrap"},x={class:"text-nowrap fw-bold text-center"},_={class:"text-nowrap fw-bold"},k={class:"text-nowrap"},A={class:"text-nowrap text-center"},S={id:"acciones",style:{padding:"0%"},class:"text-center"},R={class:"col-md-6"},H={class:"fw-semibold d-block"},U={key:0,class:"bx bx-search bx-sm"},F={class:"col-md"},N=r((()=>(0,l._)("i",{class:"ml-auto bx bxs-pointer"},null,-1))),D=["disabled"],W=r((()=>(0,l._)("i",{class:"bx bx-history bx-sm"},null,-1))),I=(0,l.Uk)(" Ver Histórico Ludoteca "),Z=[W,I],j=["disabled"],L=r((()=>(0,l._)("i",{class:"bx bx-transfer-alt bx-sm"},null,-1))),M=(0,l.Uk)(" Ver Detalles del Caso "),z=[L,M],B={class:"row pb-2 pt-2 border border-2 border-primary rounded"},T={class:"col-md-6"},O={class:"fw-semibold d-block"},E={key:0,class:"bx bx-search bx-sm"},q={class:"col-md"},J=r((()=>(0,l._)("i",{class:"ml-auto bx bxs-pointer"},null,-1))),K=["disabled"],P=r((()=>(0,l._)("i",{class:"bx bx-transfer-alt bx-sm"},null,-1))),G=(0,l.Uk)(" Volver al Seguimiento Jurídico "),Y=[P,G],$=["disabled"],Q=r((()=>(0,l._)("i",{class:"bx bx-transfer-alt bx-sm"},null,-1))),X=(0,l.Uk)(" Volver al Seguimiento Jurídico "),ee=[Q,X],oe={class:"border border-primary border-3 rounded-2"},ae=["disabled"],le=r((()=>(0,l._)("i",{class:"bx bx-calendar",style:{"font-size":"20px"}},null,-1))),ne=(0,l.Uk)(" Agenda "),ie=[le,ne];function re(e,o,a,r,p,g){const f=(0,l.up)("AccionesTable"),w=(0,l.up)("TableVue"),W=(0,l.up)("vSelectPaginationVue"),I=(0,l.up)("Form"),L=(0,l.up)("FormCasoVue"),M=(0,l.up)("historicoLudotecaVue"),P=(0,l.up)("ModalVue"),G=(0,l.up)("AdvertenciaVue"),Q=(0,l.up)("FullCalendarVue"),X=(0,l.up)("ActividadCalendarVue");return(0,l.wg)(),(0,l.iD)("div",s,[(0,l._)("h4",t,[(0,l._)("span",d,"SAIV"+(0,n.zw)(e.store.state.USUARIO.oficina)+" /",1),u]),(0,l._)("div",c,[(0,l._)("div",m,[(0,l.Wm)(w,{ref:"tablaLudotecaRef",columnas:e.columnas,url:e.urlTabla,titleFiltro:"Tipo de Denuncia",arrayFiltro:["Todos","Denuncia","Sin Denuncia"],onHandleChangedLoading:e.handleChangedLoading,onHandleChangedData:e.handleChangedData},{button:(0,l.w5)((()=>[(0,l._)("button",{class:"btn btn-primary m-1 justify-items-start",onClick:o[0]||(o[0]=(...o)=>e.handleClickNuevo&&e.handleClickNuevo(...o)),disabled:e.loading},h,8,b)])),buttons:(0,l.w5)((()=>[(0,l._)("button",{class:"btn btn-dark m-1 justify-items-start",onClick:o[1]||(o[1]=(...o)=>e.cargarAgenda&&e.cargarAgenda(...o)),disabled:e.loading},y,8,v)])),tbody:(0,l.w5)((()=>[((0,l.wg)(!0),(0,l.iD)(l.HY,null,(0,l.Ko)(e.data,((o,a)=>((0,l.wg)(),(0,l.iD)("tr",{key:a},[(0,l._)("td",C,[(0,l._)("span",null,(0,n.zw)(o.adolecenteNino??""),1)]),(0,l._)("td",V,[(0,l._)("span",null,(0,n.zw)(o.responsable??""),1)]),(0,l._)("td",x,[(0,l._)("span",null,(0,n.zw)(o.tipoAtencionFechaHora??""),1)]),(0,l._)("td",_,[(0,l._)("span",null,(0,n.zw)(o.codigo??""),1)]),(0,l._)("td",k,[(0,l._)("span",null,(0,n.zw)(o.tipoAtencion??""),1)]),(0,l._)("td",A,[(0,l._)("span",null,(0,n.zw)(o.proximaCita??""),1)]),(0,l._)("td",S,[(0,l.Wm)(f,{json:o,loading:e.loading,showEditar:!0,showBorrar:!0,showVer:!0,onHandleClickVer:a=>e.handleClickVer(o),onHandleClickEditar:a=>e.handleClickEditar(o),onHandleClickBorrar:a=>e.handleClickBorrar(o)},null,8,["json","loading","onHandleClickVer","onHandleClickEditar","onHandleClickBorrar"])])])))),128))])),_:1},8,["columnas","url","onHandleChangedLoading","onHandleChangedData"])])]),(0,l.Wm)(P,{ref:"modalLudotecaRef",onHandleActualizarDatosTabla:e.handleActualizarDatos},{cardBody:(0,l.w5)((()=>[(0,l.Wm)(i.uT,{name:"fade"},{default:(0,l.w5)((()=>[(0,l.wy)((0,l.Wm)(I,{ref:"formLudotecaRef",loading:e.loading,showVer:e.showVer},{"codigo-caso":(0,l.w5)((()=>[(0,l._)("div",R,[(0,l._)("label",H,[(0,l.Uk)((0,n.zw)(e.showVer&&e.existKey()?"Código del Caso":"Busqueda y Selección del Caso")+" ",1),e.showVer?(0,l.kq)("",!0):((0,l.wg)(),(0,l.iD)("i",U))]),(0,l._)("div",F,[e.showVer||e.existKey()?((0,l.wg)(),(0,l.iD)("label",{key:1,class:"form-control fw-bold btn-block text-primary bx-flashing-hover",onClick:o[3]||(o[3]=o=>e.handleChangedIntercambiarForm(1))},[(0,l.Uk)((0,n.zw)(null===e.codigoCaso||"undefined"===typeof e.codigoCaso?"No ingresado":e.codigoCaso.label)+" ",1),N])):((0,l.wg)(),(0,l.j4)(W,{key:0,loading:e.loadingSelect,data:e.dataSelect,url:"saiv/casos/indexSelect",links:e.linksSelect,registros:e.registrosSelect,disabled:e.existKey(),modelValue:e.codigoCaso,"onUpdate:modelValue":o[2]||(o[2]=o=>e.codigoCaso=o),onSetUrlSelect:e.setUrlSelect,onChangeVariablesBusqueda:e.changeVariablesBusqueda,onResetUrlSelect:e.resetUrlSelect},null,8,["loading","data","links","registros","disabled","modelValue","onSetUrlSelect","onChangeVariablesBusqueda","onResetUrlSelect"]))])])])),"nuevo-button":(0,l.w5)((()=>[(0,l.Wm)(i.uT,{name:"fade"},{default:(0,l.w5)((()=>[null!==e.codigoCaso?((0,l.wg)(),(0,l.iD)("button",{key:0,onClick:o[4]||(o[4]=o=>{e.handleChangedIntercambiarForm(2),e.$refs.formHistoricoRef.handleActualizarFiltro(e.codigoCaso)}),type:"button",class:"btn btn-warning m-1",disabled:e.loading},Z,8,D)):(0,l.kq)("",!0)])),_:1}),(0,l.Wm)(i.uT,{name:"fade"},{default:(0,l.w5)((()=>[!e.showVer??1?((0,l.wg)(),(0,l.iD)("button",{key:0,onClick:o[5]||(o[5]=o=>e.handleChangedIntercambiarForm(1)),type:"button",class:"btn btn-warning m-1",disabled:e.loading},z,8,j)):(0,l.kq)("",!0)])),_:1})])),_:1},8,["loading","showVer"]),[[i.F8,0===e.intercambiarForm]])])),_:1}),(0,l.Wm)(i.uT,{name:"fade"},{default:(0,l.w5)((()=>[(0,l.wy)((0,l.Wm)(L,{showVer:!0,ref:"formCasoRef"},{"codigo-caso":(0,l.w5)((()=>[(0,l._)("div",B,[(0,l._)("div",T,[(0,l._)("label",O,[(0,l.Uk)((0,n.zw)(e.showVer?"Código del Caso":"Busqueda y Selección del Caso")+" ",1),e.showVer?(0,l.kq)("",!0):((0,l.wg)(),(0,l.iD)("i",E))]),(0,l._)("div",q,[e.showVer||e.existKey()?((0,l.wg)(),(0,l.iD)("label",{key:1,class:"form-control fw-bold btn-block text-primary bx-flashing-hover",onClick:o[7]||(o[7]=o=>e.handleChangedIntercambiarForm(0))},[(0,l.Uk)((0,n.zw)(null===e.codigoCaso||"undefined"===typeof e.codigoCaso?"No ingresado":e.codigoCaso.label)+" ",1),J])):((0,l.wg)(),(0,l.j4)(W,{key:0,loading:e.loadingSelect,data:e.dataSelect,url:"saiv/casos/indexSelect",links:e.linksSelect,registros:e.registrosSelect,disabled:e.existKey(),modelValue:e.codigoCaso,"onUpdate:modelValue":o[6]||(o[6]=o=>e.codigoCaso=o),onSetUrlSelect:e.setUrlSelect,onChangeVariablesBusqueda:e.changeVariablesBusqueda,onResetUrlSelect:e.resetUrlSelect},null,8,["loading","data","links","registros","disabled","modelValue","onSetUrlSelect","onChangeVariablesBusqueda","onResetUrlSelect"]))])])])])),"nuevo-button":(0,l.w5)((()=>[!e.showVer??1?((0,l.wg)(),(0,l.iD)("button",{key:0,onClick:o[8]||(o[8]=o=>e.handleChangedIntercambiarForm(0)),type:"button",class:"btn btn-primary m-1",disabled:e.loading},Y,8,K)):(0,l.kq)("",!0)])),_:1},512),[[i.F8,1===e.intercambiarForm]])])),_:1}),(0,l.Wm)(i.uT,{name:"fade"},{default:(0,l.w5)((()=>[(0,l.wy)((0,l.Wm)(M,{showVer:!0,ref:"formHistoricoRef",codigoCaso:e.codigoCaso},{"nuevo-button":(0,l.w5)((()=>[!e.showVer??1?((0,l.wg)(),(0,l.iD)("button",{key:0,onClick:o[9]||(o[9]=o=>e.handleChangedIntercambiarForm(0)),type:"button",class:"btn btn-primary m-1",disabled:e.loading},ee,8,$)):(0,l.kq)("",!0)])),_:1},8,["codigoCaso"]),[[i.F8,2===e.intercambiarForm]])])),_:1})])),_:1},8,["onHandleActualizarDatosTabla"]),(0,l.Wm)(P,{ref:"modalBorrarRef",clases:"modal-centered"},{cardBody:(0,l.w5)((()=>[(0,l.Wm)(G,{ref:"advertenciaRef",mensaje:e.mensajeBorrar,onContinuar:e.borrarLudoteca},null,8,["mensaje","onContinuar"])])),_:1},512),(0,l.Wm)(P,{ref:"modalAgendaRef"},{cardBody:(0,l.w5)((()=>[(0,l._)("div",oe,[(0,l.Wm)(Q,{onNuevaActividad:e.nuevaActividad,onHandleClickAgendaVer:e.handleClickAgendaVer,onHandleClickAgendaItem:e.handleClickAgendaItem,ref:"fullcalendarRef",title:"Ludoteca"},null,8,["onNuevaActividad","onHandleClickAgendaVer","onHandleClickAgendaItem"])])])),_:1},512),(0,l.Wm)(X,{ref:"ActividadCalendarRef",modulo:"Ludoteca"},{"nuevo-button":(0,l.w5)((()=>[(0,l._)("button",{class:"btn btn-dark m-1 justify-items-start",onClick:o[10]||(o[10]=(...o)=>e.cargarAgenda&&e.cargarAgenda(...o)),disabled:e.loading},ie,8,ae)])),_:1},512)])}var se=a(4870),te=a(4239),de=a(8419),ue=a(4009),ce=a(791),me=a(4059),be=a(5358);const pe={class:"card clearfix"},ge={class:"card-body"},he={action:""},ve={class:"row py-1 gy-2 mt-1 border border-2 border-primary rounded-3"},fe=(0,l._)("div",{class:"col-md-12 mt-2"},[(0,l._)("h3",{class:"align-text-bottom"},[(0,l._)("i",{class:"bx bxs-certification bx-md"}),(0,l.Uk)("Ludoteca")])],-1),we={class:"col-md"},ye=(0,l._)("label",{class:"fw-semibold d-block"},"Tipo de violencia",-1),Ce=(0,l._)("label",{class:"fw-semibold d-block"},[(0,l._)("i",{class:"bx bx-caret-right"}),(0,l.Uk)(" Nombre del Niña, Niño o Adolescente ")],-1),Ve={class:"col-md-6"},xe=(0,l._)("label",{class:"fw-semibold d-block",for:"fecha-nacimiento"},"Fecha de Nacimiento",-1),_e={class:"row"},ke={class:"col-md-6 my-1"},Ae={class:"col-md-6 my-1"},Se={class:"input-group"},Re=(0,l._)("span",{class:"input-group-text fw-bold text-primary"},"Edad:",-1),He={class:"form-control text-primary fw-bold"},Ue=(0,l._)("label",{class:"fw-semibold d-block"},[(0,l._)("i",{class:"bx bx-caret-right"}),(0,l.Uk)(" Nombre de la Madre o Responsable ")],-1),Fe={class:"row mt-2"},Ne=(0,l._)("label",{class:"fw-semibold d-block"},[(0,l._)("i",{class:"bx bx-caret-right"}),(0,l.Uk)(" Tipos de Atención a Menores ")],-1),De={class:"row"},We={class:"col-md"},Ie={class:"col-md"},Ze=(0,l._)("label",{class:"fw-semibold d-block"},[(0,l._)("i",{class:"bx bx-caret-right"}),(0,l.Uk)(" Orientación a Madres o Responsables ")],-1),je={class:"row"},Le={class:"col-md"},Me={class:"col-md"},ze={class:"px-2"};function Be(e,o,a,r,s,t){const d=(0,l.up)("labelShowVer"),u=(0,l.up)("v-select"),c=(0,l.up)("FormNombreApellidoVue"),m=(0,l.up)("FormInputVue"),b=(0,l.up)("FormSelectOpcionVue"),p=(0,l.up)("AlertVue"),g=(0,l.up)("ButtonsFormVue");return(0,l.wg)(),(0,l.iD)("div",pe,[(0,l._)("div",ge,[(0,l._)("form",he,[(0,l._)("div",ve,[fe,(0,l.WI)(e.$slots,"codigo-caso"),(0,l._)("div",we,[ye,e.showVer?((0,l.wg)(),(0,l.j4)(d,{key:0,value:e.formulario.tipoViolencia.length>0?e.formulario.tipoViolencia:"No Ingresado"},null,8,["value"])):((0,l.wg)(),(0,l.j4)(u,{key:1,multiple:"",placeholder:"Seleccione",options:null===e.opciones?[]:e.opciones.tiposViolencia,style:(0,n.j5)(e.vue_style_select),loading:e.loading,disabled:e.loading,modelValue:e.formulario.tipoViolencia,"onUpdate:modelValue":o[0]||(o[0]=o=>e.formulario.tipoViolencia=o)},null,8,["options","style","loading","disabled","modelValue"]))]),Ce,(0,l.Wm)(c,{showVer:e.showVer??!1,loading:e.loading,primerNombre:e.formulario.ninoAdolecente.primerNombre,segundoNombre:e.formulario.ninoAdolecente.segundoNombre,primerApellido:e.formulario.ninoAdolecente.primerApellido,segundoApellido:e.formulario.ninoAdolecente.segundoApellido,"onUpdate:primerNombre":o[1]||(o[1]=o=>e.updateCampoValue(o,"ninoAdolecente","primerNombre")),"onUpdate:segundoNombre":o[2]||(o[2]=o=>e.updateCampoValue(o,"ninoAdolecente","segundoNombre")),"onUpdate:primerApellido":o[3]||(o[3]=o=>e.updateCampoValue(o,"ninoAdolecente","primerApellido")),"onUpdate:segundoApellido":o[4]||(o[4]=o=>e.updateCampoValue(o,"ninoAdolecente","segundoApellido"))},null,8,["showVer","loading","primerNombre","segundoNombre","primerApellido","segundoApellido"]),(0,l._)("div",Ve,[xe,(0,l._)("div",_e,[(0,l._)("div",ke,[(0,l.Wm)(m,{id:e.id+"-fecha-nacimiento",titulo:"Fecha:",loading:e.loading,showVer:e.showVer,type:"date",clases:["input-group"],value:e.formulario.ninoAdolecente.fechaNacimiento,"onUpdate:value":o[5]||(o[5]=o=>e.formulario.ninoAdolecente.fechaNacimiento=o)},null,8,["id","loading","showVer","value"])]),(0,l._)("div",Ae,[(0,l._)("div",Se,[Re,(0,l._)("label",He,(0,n.zw)(e.getEdadString(e.formulario.ninoAdolecente.fechaNacimiento)),1)])])])]),(0,l.Wm)(b,{id:"escolaridad",nombre:"Escolaridad",opciones:null===e.opciones?[]:e.opciones.escolaridad,clases:["col-md-6","col-md-auto"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.responsable.nivelEducacion,"onUpdate:opcion":o[6]||(o[6]=o=>e.formulario.responsable.nivelEducacion=o)},null,8,["opciones","loading","showVer","opcion"]),Ue,(0,l.Wm)(c,{showVer:e.showVer??!1,loading:e.loading,primerNombre:e.formulario.responsable.primerNombre,segundoNombre:e.formulario.responsable.segundoNombre,primerApellido:e.formulario.responsable.primerApellido,segundoApellido:e.formulario.responsable.segundoApellido,"onUpdate:primerNombre":o[7]||(o[7]=o=>e.updateCampoValue(o,"responsable","primerNombre")),"onUpdate:segundoNombre":o[8]||(o[8]=o=>e.updateCampoValue(o,"responsable","segundoNombre")),"onUpdate:primerApellido":o[9]||(o[9]=o=>e.updateCampoValue(o,"responsable","primerApellido")),"onUpdate:segundoApellido":o[10]||(o[10]=o=>e.updateCampoValue(o,"responsable","segundoApellido"))},null,8,["showVer","loading","primerNombre","segundoNombre","primerApellido","segundoApellido"]),(0,l.Wm)(b,{id:e.id+"parentesco-responsable",nombre:"Parentesco Responsable",opciones:null===e.opciones?[]:e.opciones.parentescoResponsable,clases:["col-md-3"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.parentescoResponsable,"onUpdate:opcion":o[11]||(o[11]=o=>e.formulario.parentescoResponsable=o),onChange:o[12]||(o[12]=o=>{"Otro"!==e.formulario.parentescoResponsable&&(e.formulario.parentescoResponsableOtro=null)})},null,8,["id","opciones","loading","showVer","opcion"]),(0,l.Wm)(i.uT,{name:"fade"},{default:(0,l.w5)((()=>[(0,l.wy)((0,l.Wm)(m,{id:e.id+"-dui-responsable",titulo:"Parentesco Responsable Otro (Especifique):",loading:e.loading,showVer:e.showVer,clases:["col-md-3"],value:e.formulario.parentescoResponsableOtro,"onUpdate:value":o[13]||(o[13]=o=>e.formulario.parentescoResponsableOtro=o)},null,8,["id","titulo","loading","showVer","value"]),[[i.F8,"Otro"===e.formulario.parentescoResponsable]])])),_:1}),(0,l.Wm)(m,{id:e.id+"-dui-responsable",titulo:"Dui de Responsable",loading:e.loading,showVer:e.showVer,clases:["col-md-3"],value:e.formulario.responsable.dui,"onUpdate:value":o[14]||(o[14]=o=>e.formulario.responsable.dui=o)},null,8,["id","loading","showVer","value"]),(0,l._)("div",Fe,[(0,l.Wm)(b,{id:e.id+"-area-residencial",nombre:"Area Residencial",opciones:null===e.opciones?[]:e.opciones.zonaResidencial,clases:["col-md-3"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.responsable.areaResidencial,"onUpdate:opcion":o[15]||(o[15]=o=>e.formulario.responsable.areaResidencial=o)},null,8,["id","opciones","loading","showVer","opcion"]),(0,l.Wm)(m,{id:e.id+"-telefono-movil-responsable",titulo:"Tel. Móvil",loading:e.loading,showVer:e.showVer,clases:["col-md-3"],value:e.formulario.responsable.telefonoMovil,"onUpdate:value":o[16]||(o[16]=o=>e.formulario.responsable.telefonoMovil=o)},null,8,["id","titulo","loading","showVer","value"]),(0,l.Wm)(b,{id:"'tel-empresa-movil'",nombre:"Empresa Tel. Móvil",opciones:null===e.opciones?[]:e.opciones.empresaMovil,clases:["col-md-3"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.responsable.empresaMovil,"onUpdate:opcion":o[17]||(o[17]=o=>e.formulario.responsable.empresaMovil=o)},null,8,["nombre","opciones","loading","showVer","opcion"]),(0,l.Wm)(m,{id:e.id+"-telefono-casa-responsable",titulo:"Tel. Casa",loading:e.loading,showVer:e.showVer,clases:["col-md-3"],value:e.formulario.responsable.telefonoCasa,"onUpdate:value":o[18]||(o[18]=o=>e.formulario.responsable.telefonoCasa=o)},null,8,["id","titulo","loading","showVer","value"])]),Ne,(0,l._)("div",De,[(0,l._)("div",We,[(0,l.Wm)(b,{id:"id+'-tipo-atencion'",nombre:"Tipo Atención:",opciones:null===e.opciones?[]:e.opciones.tipoAtencion,clases:["input-group","my-2"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.tipoAtencion,"onUpdate:opcion":o[19]||(o[19]=o=>e.formulario.tipoAtencion=o)},null,8,["opciones","loading","showVer","opcion"])]),(0,l._)("div",Ie,[(0,l.Wm)(m,{id:e.id+"-telefono-casa-responsable",titulo:"Fecha y Hora:",loading:e.loading,showVer:e.showVer,type:"datetime-local",clases:["input-group","my-2"],value:e.formulario.tipoAtencion_fecha_hora,"onUpdate:value":o[20]||(o[20]=o=>e.formulario.tipoAtencion_fecha_hora=o)},null,8,["id","loading","showVer","value"])])]),Ze,(0,l._)("div",je,[(0,l._)("div",Le,[(0,l.Wm)(b,{id:"id+'-tipo-orientacion'",nombre:"Orientación:",opciones:null===e.opciones?[]:e.opciones.orientacionResponsable,clases:["input-group","my-2"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.orientacionResponsable,"onUpdate:opcion":o[21]||(o[21]=o=>e.formulario.orientacionResponsable=o)},null,8,["opciones","loading","showVer","opcion"])]),(0,l._)("div",Me,[(0,l.Wm)(m,{id:e.id+"-orientacion-responsable-fecha-hora",titulo:"Fecha y Hora:",loading:e.loading,showVer:e.showVer,type:"datetime-local",clases:["input-group","my-2"],value:e.formulario.orientacionResponsables_fecha_hora,"onUpdate:value":o[22]||(o[22]=o=>e.formulario.orientacionResponsables_fecha_hora=o)},null,8,["id","loading","showVer","value"])])]),(0,l.Wm)(m,{id:e.id+"-proxima-cita",titulo:"Próxima Cita:",loading:e.loading,showVer:e.showVer,type:"datetime-local",clases:["col-md-6","my-2"],value:e.formulario.proximaCita,"onUpdate:value":o[23]||(o[23]=o=>e.formulario.proximaCita=o)},null,8,["id","loading","showVer","value"]),(0,l._)("div",ze,[(0,l.Wm)(p,{mensajesAlert:e.mensajesAlert,alert:e.tipoAlert},null,8,["mensajesAlert","alert"])])]),(0,l.Wm)(g,{showVer:e.showVer??!1,loading:e.loading,showSig:!1,showAnt:!1,onGuardar:e.guardar},{"nuevo-button":(0,l.w5)((()=>[(0,l.WI)(e.$slots,"nuevo-button")])),_:3},8,["showVer","loading","onGuardar"])])])])}var Te=a(1787),Oe=a(8496),Ee=a(5628),qe=a(2366),Je=a(7320),Ke=a(4118),Pe=(0,l.aZ)({props:["showVer"],setup(){const e=(0,se.iH)("ludoteca-"),o=(0,se.iH)("--vs-font-size: 0.9375rem;"),a=(0,se.iH)(!1),n=(0,se.iH)(null),i=(0,se.iH)(null),r=(0,se.iH)(null),s={key:null,codigoCaso:null,tipoViolencia:[],ninoAdolecente:{key:null,dui:null,primerNombre:null,segundoNombre:null,primerApellido:null,segundoApellido:null,fechaNacimiento:null,nivelEducacion:null,areaResidencial:null,telefonoMovil:null,empresaMovil:null,telefonoCasa:null},responsable:{key:null,dui:null,primerNombre:null,segundoNombre:null,primerApellido:null,segundoApellido:null,fechaNacimiento:null,nivelEducacion:null,areaResidencial:null,telefonoMovil:null,empresaMovil:null,telefonoCasa:null},parentescoResponsable:null,parentescoResponsableOtro:null,tipoAtencion:null,tipoAtencion_fecha_hora:null,orientacionResponsables:null,orientacionResponsables_fecha_hora:null,proximaCita:null},t=(0,se.qj)(JSON.parse(JSON.stringify(s)));function d(){n.value=null,r.value=null,a.value=!1,Object.assign(t,JSON.parse(JSON.stringify(s)))}function u(e){Object.assign(t,JSON.parse(JSON.stringify(e)))}const c=()=>null!==t.key,m=e=>t.codigoCaso=e,b=e=>a.value=e,p=async()=>{try{a.value=!0;const e=await de.Z.actualizarCrear(t,"saiv/ludoteca/guardar");e.ok&&(e.json.error?(n.value="warning",r.value=e.json.error):(t.ninoAdolecente.key=e.json.ninoAdolecenteKey,t.responsable.key=e.json.responsableKey,t.key=e.json.key,n.value=null,r.value=null)),a.value=!1}catch(e){console.log("¡Ups ocurrió un error!, no se pudo guardar el registro ludoteca"),console.log(e),a.value=!1}};return(0,l.bv)((async()=>{a.value=!0;let e=await de.Z.obtener("saiv/opciones/ludoteca/index");i.value=e,i.value??=null,a.value=!1})),{vue_style_select:o,mensajesAlert:r,formulario:t,tipoAlert:n,opciones:i,loading:a,id:e,handleChangeCodigoCaso:m,handleChangeLoading:b,resetForm:d,editForm:u,existKey:c,guardar:p}},components:{AlertVue:Ke.Z,FormInputVue:qe.Z,labelShowVer:Je.Z,ButtonsFormVue:Ee.Z,FormSelectOpcionVue:Te.Z,FormNombreApellidoVue:Oe.Z},methods:{getEdadString(e){if(null===e)return"?";let o=this.calcularEdad(e);return o>0&&o<120?o+" Años ":"?"},getEdadInt(e){let o=this.calcularEdad(e);return o>0&&o<120?o:0},calcularEdad(e){if(null===e||"undefined"===typeof e)return null;let o=e.split("-"),a=new Date,l=new Date(o[0],o[1]-1,o[2]),n=a.getFullYear()-l.getFullYear(),i=a.getMonth()-l.getMonth();return(i<0||0===i&&a.getDate()<l.getDate())&&n--,n},updateCampoValue(e,o,a){this.formulario[o][a]=e}}}),Ge=a(89);const Ye=(0,Ge.Z)(Pe,[["render",Be]]);var $e=Ye,Qe=a(9558),Xe=a(7783),eo=a(9684),oo=a(9078),ao=a(3988);const lo={class:"card clearfix"},no={class:"card-body"},io={class:"row py-1 gy-2 mt-1 border border-2 border-primary rounded-3"},ro=(0,l.Uk)("\\ "),so={class:"col-md-12 mt-2"},to={class:"align-text-bottom"},uo=(0,l._)("i",{class:"bx bxs-certification bx-md"},null,-1),co={class:"text-nowrap"},mo={class:"text-nowrap"},bo={class:"text-nowrap fw-bold text-center"},po={class:"text-nowrap fw-bold"},go={class:"text-nowrap"},ho={class:"text-nowrap text-center"};function vo(e,o,a,i,r,s){const t=(0,l.up)("TableVue"),d=(0,l.up)("ButtonsFormVue");return(0,l.wg)(),(0,l.iD)("div",lo,[(0,l._)("div",no,[(0,l._)("div",io,[ro,(0,l._)("div",so,[(0,l._)("h3",to,[uo,(0,l.Uk)(" Histórico Registros Ludoteca "+(0,n.zw)("object"===typeof e.codigoCasoAux&&null!==e.codigoCasoAux?e.codigoCasoAux.label:""),1)])]),(0,l.Wm)(t,{ref:"tablaHistoricoLudotecaRef",columnas:e.columnas,url:e.urlTabla,onHandleChangedLoading:e.handleChangedLoading,onHandleChangedData:e.handleChangedData},{tbody:(0,l.w5)((()=>[((0,l.wg)(!0),(0,l.iD)(l.HY,null,(0,l.Ko)(e.data,((e,o)=>((0,l.wg)(),(0,l.iD)("tr",{key:o},[(0,l._)("td",co,[(0,l._)("span",null,(0,n.zw)(e.adolecenteNino??""),1)]),(0,l._)("td",mo,[(0,l._)("span",null,(0,n.zw)(e.responsable??""),1)]),(0,l._)("td",bo,[(0,l._)("span",null,(0,n.zw)(e.tipoAtencionFechaHora??""),1)]),(0,l._)("td",po,[(0,l._)("span",null,(0,n.zw)(e.codigo??""),1)]),(0,l._)("td",go,[(0,l._)("span",null,(0,n.zw)(e.tipoAtencion??""),1)]),(0,l._)("td",ho,[(0,l._)("span",null,(0,n.zw)(e.proximaCita??""),1)])])))),128))])),_:1},8,["columnas","url","onHandleChangedLoading","onHandleChangedData"])]),(0,l.Wm)(d,{showVer:e.showVer??!1,loading:e.loading,showSig:!1,showAnt:!1,showGuardar:!1},{"nuevo-button":(0,l.w5)((()=>[(0,l.WI)(e.$slots,"nuevo-button")])),_:3},8,["showVer","loading"])])])}const fo=[{nombre:"Niña, Niño o Adolescente",class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-minus"},{nombre:"Responsable",class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-minus"},{nombre:"Fecha y Hora Atención",class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-sort-down"},{nombre:"Caso SAIV"+te.Z.state.USUARIO.oficina,class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-minus"},{nombre:"Tipo Atención",class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-minus"},{nombre:"Próxima Cita",class:"text-center bg-label-primary text-white fw-bold",key:"acciones",style:"",sort:!0,sortIcon:"bx-minus"}],wo="saiv/ludoteca/historico/index";var yo=(0,l.aZ)({props:["codigoCaso","showVer"],setup(e){const o=(0,se.iH)([]),a=(0,se.iH)(!1),l=(0,se.iH)(e.codigoCaso??null),n=(0,se.iH)(null),i=e=>{a.value=e},r=e=>{o.value=e},s=()=>{a.value=!0,n.value.handleActualizarDatos(),a.value=!1},t=e=>{const o="object"===typeof e?e.key:"x";n.value.handleChangeFiltro(o)},d=()=>n.value.handleChangeFiltro("x");return{loading:a,codigoCasoAux:l,urlTabla:wo,columnas:fo,store:te.Z,data:o,tablaHistoricoLudotecaRef:n,handleResetFiltro:d,handleChangedData:r,handleChangedLoading:i,handleActualizarDatos:s,handleActualizarFiltro:t}},components:{TableVue:be.Z,ButtonsFormVue:Ee.Z}});const Co=(0,Ge.Z)(yo,[["render",vo]]);var Vo=Co;const xo=[{nombre:"Niña, Niño o Adolescente",class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-minus"},{nombre:"Responsable",class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-minus"},{nombre:"Fecha y Hora Atención",class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-sort-down"},{nombre:"Caso SAIV"+te.Z.state.USUARIO.oficina,class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-minus"},{nombre:"Tipo Atención",class:"text-center bg-label-primary text-white fw-bold",key:"",style:"",sort:!0,sortIcon:"bx-minus"},{nombre:"Próxima Cita",class:"text-center bg-label-primary text-white fw-bold",key:"acciones",style:"",sort:!0,sortIcon:"bx-minus"},{nombre:"Acciones",class:"bg-primary text-white fw-bold text-center",key:"acciones",style:"",sort:!1,sortIcon:"bx-minus"}],_o="saiv/ludoteca/index";var ko=(0,l.aZ)({watch:{codigoCaso:async function(e){this.handleChangeCodigoCaso(e),this.formLudotecaRef.handleChangeLoading(!0),this.formCasoRef.resetForm(),null!==e&&await this.cargarCaso(e),this.formLudotecaRef.handleChangeLoading(!1)}},setup(e){const o=(0,se.iH)(!1),a=(0,se.iH)(!1),n=(0,se.iH)([]),i=(0,se.iH)("Todos"),r=(0,se.iH)(null),s=(0,se.iH)(0),t=(0,se.iH)("Borrar el Registro, ¿Continuar?"),d=(0,se.iH)(null),u=(0,se.iH)(null),c=(0,se.iH)(null),m=(0,se.iH)(null),b=(0,se.iH)(null),p=(0,se.iH)(null),g=(0,se.iH)(null),h=(0,se.iH)(null),v=(0,se.iH)(null),f=(0,se.iH)(null),w=e=>{o.value=e},y=e=>{n.value=e},C=()=>{r.value=null,a.value=null,s.value=0,f.value.handleResetFiltro(),m.value.resetForm(),b.value.resetForm(),d.value.showModal()},V=()=>{o.value=!0,c.value.handleActualizarDatos(),o.value=!1},x=e=>{s.value=e},_=()=>null!==b.value&&b.value.existKey(),k=e=>o.value=e,A=e=>o.value=e,S=async e=>{if("undefined"!==typeof e.key){m.value.resetForm(),b.value.handleChangeLoading(!0);let o=await de.Z.obtener("saiv/casos/obtener/"+e.key);for(let e=0;e<o.agresores.length;e++){const a=o.agresores[e];o.agresores[e].edadDesconocida=1===parseInt(a.edadDesconocida),o.agresores[e].nombreDesconocido=1===parseInt(a.nombreDesconocido)}b.value.handleChangeLoading(!1);const a=o;m.value.editForm(a),m.value.visibleTab("agresores",a.agresores.length>0),m.value.visibleTab("responsables",null!==a.responsable.key)}},R=e=>{b.value.handleChangeCodigoCaso(e)},H=(0,se.iH)(null),U=(0,se.iH)(null),F=(0,se.iH)(!1),N=(0,se.iH)([]),D=(0,se.iH)(te.Z.state.URL_SERVER+"saiv/casos/indexSelect"),W=(0,se.iH)([]),I=async()=>{F.value=!0;const e=await ue.Z.datosTabla({busqueda:U.value,porPagina:10},D.value);N.value=e.data,W.value=e.links,H.value=e.current_page+"/"+e.last_page,F.value=e.cargando},Z=e=>{U.value=e??U.value,I()},j=()=>{D.value=te.Z.state.URL_SERVER+"saiv/casos/indexSelect"},L=e=>{D.value=e,I()};(0,l.bv)((()=>{m.value.handledocultarCodigo(!1),I()}));const M=e=>{a.value=!0,O(e)},z=e=>{a.value=!1,O(e)},B=e=>{p.value.setJson(e),t.value='Borrar el Registro "'+e.codigo+'" ¿Continuar?',g.value.showModal()},T=async e=>{"undefined"!==typeof e&&(A(!0),await de.Z.borrarCaso({key:e},"saiv/ludoteca/borrar"),c.value.handleActualizarDatos(),A(!1))},O=async e=>{try{if("undefined"===typeof e.key)return;s.value=0,f.value.handleResetFiltro(),A(!0),b.value.resetForm();const o=await de.Z.obtener("saiv/ludoteca/obtener/"+e.key);if(A(!1),"undefined"===typeof o)return;r.value=o.codigoCaso,b.value.editForm(o),d.value.showModal()}catch(o){console.log("Error -> "+o)}},E=async()=>{try{d.value.hideModal(),u.value.hideModal(),A(!0),h.value.renderCalendar(!1),v.value.showModal();const e=await de.Z.obtener("saiv/agenda/ludoteca/fullcalendar/evenst");h.value.setEvents(e),h.value.renderCalendar(!0),A(!1)}catch(e){A(!1),console.log(e)}},q=()=>{v.value.hideModal()},J=()=>{v.value.hideModal(),u.value.resetForm(),u.value.showModal()},K=e=>{v.value.hideModal(),M(e)},P=e=>{console.log(e),v.value.hideModal(),u.value.resetForm(),u.value.editForm(e),u.value.showModal()};return{ActividadCalendarRef:u,modalLudotecaRef:d,tablaLudotecaRef:c,formHistoricoRef:f,fullcalendarRef:h,formLudotecaRef:b,advertenciaRef:p,modalBorrarRef:g,modalAgendaRef:v,formCasoRef:m,intercambiarForm:s,mensajeBorrar:t,codigoCaso:r,urlTabla:_o,columnas:xo,tipoCaso:i,showVer:a,loading:o,store:te.Z,data:n,registrosSelect:H,busquedaSelect:U,loadingSelect:F,linksSelect:W,dataSelect:N,urlSelect:D,changeVariablesBusqueda:Z,resetUrlSelect:j,setUrlSelect:L,handleChangedIntercambiarForm:x,handleChangeCodigoCaso:R,handleActualizarDatos:V,handleChangedLoading:w,handleChangeLoading:k,handleChangedData:y,handleClickBorrar:B,handleClickEditar:z,handleClickNuevo:C,borrarLudoteca:T,handleClickVer:M,cargarAgenda:E,cargarCaso:S,existKey:_,ocultarAgenda:q,nuevaActividad:J,handleClickAgendaVer:K,handleClickAgendaItem:P}},components:{vSelectPaginationVue:Qe.Z,ActividadCalendarVue:ao.Z,historicoLudotecaVue:Vo,FullCalendarVue:oo["default"],AdvertenciaVue:eo.Z,AccionesTable:Xe.Z,FormCasoVue:ce.Z,ModalVue:me.Z,TableVue:be.Z,Form:$e}});const Ao=(0,Ge.Z)(ko,[["render",re],["__scopeId","data-v-3feaba71"]]);var So=Ao}}]);
//# sourceMappingURL=375.a5556ae4.js.map