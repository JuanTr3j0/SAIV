"use strict";(self["webpackChunkvue"]=self["webpackChunkvue"]||[]).push([[18],{1419:function(e,a,o){o.r(a),o.d(a,{default:function(){return me}});var r=o(3396),s=o(7139),l=o(9242);const i={class:"container-fluid flex-grow-1 container-p-y"},t=(0,r._)("h4",{class:"fw-bold py-1 mb-2"},[(0,r._)("span",{class:"text-muted fw-light"},"Administración /"),(0,r.Uk)(" Usuarias/os ")],-1),n={class:"card"},d={class:"card-body"},c=["disabled"],u=(0,r._)("i",{class:"bx bx-plus",style:{"font-size":"20px"}},null,-1),m=(0,r.Uk)(" Nuevo "),b=[u,m],p={class:"text-start-center text-nowrap fw-bold"},g={class:"text-start-center"},f={class:"badge bg-label-primary me-1"},h={class:"text-start-center"},y={class:"badge bg-label-secondary me-1"},w={class:"text-center"},v={class:""},x={class:"text-center"},_={style:{padding:"0%"},class:"text-center"};function C(e,a,o,u,m,C){const k=(0,r.up)("AccionesTable"),U=(0,r.up)("TableVue"),A=(0,r.up)("FormUsuario"),S=(0,r.up)("Modal"),V=(0,r.up)("AdvertenciaVue");return(0,r.wg)(),(0,r.iD)("div",i,[t,(0,r._)("div",n,[(0,r._)("div",d,[(0,r.Wm)(U,{ref:"tablaUsuarios",columnas:e.columnas,url:e.urlTabla,onHandleChangedLoading:e.handleChangedLoading,onHandleChangedData:e.handleChangedData},{button:(0,r.w5)((()=>[(0,r._)("button",{class:"btn btn-primary m-1 justify-items-start",disabled:e.loading,onClick:a[0]||(a[0]=a=>{e.$refs.modalUsuarioRef.showModal(),e.$refs.formUsuarioRef.resetForm()})},b,8,c)])),tbody:(0,r.w5)((()=>[((0,r.wg)(!0),(0,r.iD)(r.HY,null,(0,r.Ko)(e.data,((a,o)=>((0,r.wg)(),(0,r.iD)("tr",{key:o},[(0,r._)("td",p,(0,s.zw)(a.name),1),(0,r._)("td",g,[(0,r._)("span",f,(0,s.zw)(a.email),1)]),(0,r._)("td",h,[(0,r._)("span",y,(0,s.zw)(a.oficina??"No ingresado"),1)]),(0,r._)("td",w,[(0,r._)("span",{class:(0,s.C_)(["badge me-1",a.tipoUsuario?"Super Administrador"===a.tipoUsuario?"bg-label-success":"bg-label-secondary":"bg-label-danger"])},(0,s.zw)(a.tipoUsuario??"Desconocido"),3)]),(0,r._)("td",v,[((0,r.wg)(!0),(0,r.iD)(r.HY,null,(0,r.Ko)(e.todosPermisos(a.permisos),(e=>((0,r.wg)(),(0,r.iD)("span",{class:"badge bg-label-primary me-1",key:e},(0,s.zw)("Super Administrador"===a.tipoUsuario||"Administrador"===a.tipoUsuario?"Todos los permisos":e),1)))),128))]),(0,r._)("td",x,[(0,r._)("span",{class:(0,s.C_)(["badge me-1","Activo"===a.estado?"bg-success":"bg-danger"])},(0,s.zw)(a.estado),3)]),(0,r._)("td",_,[(0,r.wy)((0,r.Wm)(k,{loading:e.loading,showVer:!0,showEditar:!0,showEstado:!0,estado:a.estado,onHandleClickVer:o=>e.handleClickVer(a),onHandleClickEditar:o=>e.handleClickEditar(a),onHandleClickEstado:o=>e.handleClickEstado(a)},null,8,["loading","estado","onHandleClickVer","onHandleClickEditar","onHandleClickEstado"]),[[l.F8,"Super Administrador"!==a.tipoUsuario]])])])))),128))])),_:1},8,["columnas","url","onHandleChangedLoading","onHandleChangedData"])])]),(0,r.Wm)(S,{ref:"modalUsuarioRef",onHandleActualizarDatosTabla:e.handleActualizarDatos},{cardBody:(0,r.w5)((()=>[(0,r.Wm)(A,{ref:"formUsuarioRef",showVer:e.showVer},null,8,["showVer"])])),_:1},8,["onHandleActualizarDatosTabla"]),(0,r.Wm)(S,{ref:"modalAdvertenciaRef",clases:"modal-centered"},{cardBody:(0,r.w5)((()=>[(0,r.Wm)(V,{ref:"advertenciaRef",mensaje:e.mensajeAdvertencia,onContinuar:e.handleClickEstadoCambiar},null,8,["mensaje","onContinuar"])])),_:1},512)])}var k=o(4870),U=o(4059),A=o(3989);const S={class:"border border-2 border-light mx-0 p-1 rounded"},V={class:"card-body p-2 clearfix"},O={class:"container-fluid border border-2 border-primary rounded-3"},J=(0,r._)("div",{class:"col-md mt-2"},[(0,r._)("h3",{class:"my-2"},[(0,r._)("i",{class:"bx bx-user bx-md"}),(0,r.Uk)(" Usuaria/o")])],-1),N={class:"row"},H={class:"row m-2 border border-secondary border-2 rounded-2"},D=(0,r._)("h5",{class:"mt-3"},[(0,r._)("i",{class:"bx bx-caret-right"}),(0,r.Uk)(" Permisos de Usuaria/o")],-1),j={class:"mb-2 clearfix"},z={class:"table-responsive table table-bordered border border-secondary table-striped mx-0 table-sm mb-3"},E=(0,r._)("thead",null,[(0,r._)("tr",null,[(0,r._)("th",{class:"text-center bg-label-primary text-white fw-bold",style:{"text-transform":"none"}},"Modulos"),(0,r._)("th",{class:"text-center bg-label-primary text-white fw-bold",style:{"text-transform":"none"}},"Permisos")])],-1),F={class:"text-start-center fw-bold"},T=["onUpdate:modelValue","id","disabled"],Z=["for"],W={class:"px-2"},R={class:"mt-3 float-end"},P=["disabled"],G=(0,r._)("i",{class:"bx bx-exit"},null,-1),L=(0,r.Uk)(" Salir "),M=[G,L],B=["disabled"],I=(0,r._)("i",{class:"bx bx-reset"},null,-1),K=(0,r.Uk)(" Reset "),Y=[I,K],$=["disabled"],q=(0,r.Uk)(" Guardar ");function Q(e,a,o,i,t,n){const d=(0,r.up)("FormInput"),c=(0,r.up)("FormSelectOpcion"),u=(0,r.up)("AlertVue");return(0,r.wg)(),(0,r.iD)("div",S,[(0,r._)("form",null,[(0,r._)("div",V,[(0,r._)("div",O,[J,(0,r._)("div",N,[(0,r.Wm)(d,{id:"usuario",obligatorio:!0,loading:i.loading,clases:"col-md-6  mb-2",showVer:o.showVer,disabled:i.loading,titulo:"Usuario",value:i.formulario.usuario,"onUpdate:value":a[0]||(a[0]=e=>i.formulario.usuario=e)},null,8,["loading","showVer","disabled","value"]),(0,r.Wm)(d,{id:"usuario-email",obligatorio:!0,loading:i.loading,clases:"col-md-6  mb-2",showVer:o.showVer,type:"email2",disabled:i.loading,titulo:"Correo",value:i.formulario.correo,"onUpdate:value":a[1]||(a[1]=e=>i.formulario.correo=e)},null,8,["loading","showVer","disabled","value"]),(0,r.Wm)(c,{id:"usuario-oficina",obligatorio:!0,nombre:"Oficina",clases:["col-md-6","mb-2"],opciones:null===i.opciones?[]:i.opciones.oficinas,showVer:o.showVer,loading:i.loading,opcion:i.formulario.oficina,"onUpdate:opcion":a[2]||(a[2]=e=>i.formulario.oficina=e)},null,8,["opciones","showVer","loading","opcion"]),(0,r.Wm)(c,{id:"usuario-tipo-usuario",obligatorio:!0,nombre:"Tipo Usuario",clases:["col-md-6","mb-2"],opciones:["Usuaria/o","Administrador"],showVer:o.showVer,loading:i.loading,opcion:i.formulario.tipo_usuario,"onUpdate:opcion":a[3]||(a[3]=e=>i.formulario.tipo_usuario=e),onChange:a[4]||(a[4]=e=>{"Usuaria/o"!==i.formulario.tipo_usuario&&i.resetPermisos()})},null,8,["showVer","loading","opcion"]),(0,r.wy)((0,r.Wm)(d,{id:"usuario-contrasena",obligatorio:!0,loading:i.loading,clases:"col-md-6  mb-2",showVer:o.showVer,type:"password",disabled:i.loading,titulo:"Contraseña",value:i.formulario.contraseña,"onUpdate:value":a[5]||(a[5]=e=>i.formulario.contraseña=e)},null,8,["loading","showVer","disabled","value"]),[[l.F8,!o.showVer]]),(0,r.wy)((0,r.Wm)(d,{id:"usuario-repetir-contrasena",obligatorio:!0,clases:"col-md-6  mb-2",loading:i.loading,showVer:o.showVer,type:"password",disabled:i.loading,titulo:"Repetir Contraseña",value:i.formulario.repetir_contraseña,"onUpdate:value":a[6]||(a[6]=e=>i.formulario.repetir_contraseña=e)},null,8,["loading","showVer","disabled","value"]),[[l.F8,!o.showVer]])]),(0,r._)("div",H,[D,(0,r._)("div",j,[(0,r._)("table",z,[E,(0,r._)("tbody",null,[((0,r.wg)(!0),(0,r.iD)(r.HY,null,(0,r.Ko)(i.formulario.permisos,(e=>((0,r.wg)(),(0,r.iD)("tr",{key:e,class:(0,s.C_)({"table-primary":-1!=e.permisos.findIndex((e=>e.bool))})},[(0,r._)("td",{class:(0,s.C_)(["text-center fw-bold",{"text-primary":-1!=e.permisos.findIndex((e=>e.bool))}])},(0,s.zw)(e.modulo),3),(0,r._)("td",F,[((0,r.wg)(!0),(0,r.iD)(r.HY,null,(0,r.Ko)(e.permisos,(a=>((0,r.wg)(),(0,r.iD)("div",{class:"form-check form-check-inline mt-3",key:a.name},[(0,r.wy)((0,r._)("input",{"onUpdate:modelValue":e=>a.bool=e,class:"form-check-input",type:"checkbox",id:"defaultCheck"+a.name+e.modulo,disabled:"Administrador"===i.formulario.tipo_usuario||o.showVer},null,8,T),[[l.e8,a.bool]]),(0,r._)("label",{class:(0,s.C_)(["form-check-label",{"text-primary":a.bool}]),for:"defaultCheck"+a.name+e.modulo},(0,s.zw)(a.name),11,Z)])))),128))])],2)))),128))])])])]),(0,r._)("div",W,[(0,r.Wm)(u,{mensajesAlert:i.mensajesAlert,alert:i.tipoAlert},null,8,["mensajesAlert","alert"])])]),(0,r._)("div",R,[(0,r._)("button",{disabled:i.loading,type:"button",class:"btn btn-secondary m-1","data-bs-dismiss":"modal"},M,8,P),(0,r._)("button",{disabled:i.loading,type:"button",class:"btn btn-secondary m-1"},Y,8,B),(0,r._)("button",{disabled:i.loading,type:"button",class:"btn btn-primary m-1",onClick:a[7]||(a[7]=(...e)=>i.handledClickGuardar&&i.handledClickGuardar(...e))},[(0,r._)("i",{class:(0,s.C_)(["bx",{"bx-save":!i.loading,"bx-spin bx-loader":i.loading}])},null,2),q],8,$)])])])])}var X=o(8419),ee=o(2366),ae=o(1787),oe=o(4118),re={name:"FormUsuarioComponent",props:["showVer"],components:{FormSelectOpcion:ae.Z,FormInput:ee.Z,AlertVue:oe.Z},setup(){const e=(0,k.iH)(!1),a=(0,k.iH)(null),o=[{name:"Crear",bool:!1},{name:"Ver",bool:!1},{name:"Editar",bool:!1},{name:"Borrar",bool:!1}],s={key:null,usuario:null,correo:null,tipo_usuario:"Usuaria/o",oficina:null,"contraseña":null,"repetir_contraseña":null,estado:null,permisos:[{modulo:"Casos",permisos:JSON.parse(JSON.stringify([...o])).concat([{name:"Subir Archivos",bool:!1},{name:"Bajar Archivos",bool:!1}])},{modulo:"Ludoteca",permisos:JSON.parse(JSON.stringify([...o])).concat([{name:"Agenda",bool:!1}])},{modulo:"Seguimiento Juridico",permisos:JSON.parse(JSON.stringify([...o])).concat([{name:"Agenda",bool:!1}])},{modulo:"Camara Gessell",permisos:JSON.parse(JSON.stringify([...o])).concat([{name:"Agenda",bool:!1}])}]},l=(0,k.qj)(JSON.parse(JSON.stringify(s))),i=(0,k.iH)(null),t=(0,k.iH)(null);function n(){i.value=null,t.value=null,e.value=!1,Object.assign(l,JSON.parse(JSON.stringify(s)))}function d(e){Object.assign(l,JSON.parse(JSON.stringify(e)))}const c=()=>{l.permisos=[{modulo:"Casos",permisos:JSON.parse(JSON.stringify([...o])).concat([{name:"Subir Archivos",bool:!1},{name:"Bajar Archivos",bool:!1}])},{modulo:"Ludoteca",permisos:JSON.parse(JSON.stringify([...o])).concat([{name:"Agenda",bool:!1}])},{modulo:"Seguimiento Juridico",permisos:JSON.parse(JSON.stringify([...o])).concat([{name:"Agenda",bool:!1}])},{modulo:"Camara Gessell",permisos:JSON.parse(JSON.stringify([...o])).concat([{name:"Agenda",bool:!1}])}]},u=async()=>{console.log("Contraseña antes de enviar:",l.contraseña),e.value=!0;try{const a=await X.Z.actualizarCrear(l,"auth/registro");a.ok&&(a.json.error?(i.value="warning",t.value=a.json.error):(l.key=a.json.key,i.value=t.value=null)),e.value=!1}catch(a){console.log("¡Ups ocurrio un error!, no se pudo guardar el registro seguimiento"),e.value=!1}};return(0,r.bv)((async()=>{a.value=await X.Z.obtener("auth/opciones")})),{opciones:a,loading:e,formulario:l,tipoAlert:i,mensajesAlert:t,editForm:d,resetForm:n,handledClickGuardar:u,resetPermisos:c}}},se=o(89);const le=(0,se.Z)(re,[["render",Q]]);var ie=le,te=o(7783),ne=o(9684);const de=[{nombre:"Usuario",class:"text-center bg-primary text-white fw-bold",style:"",key:"usuario"},{nombre:"Correo",class:"text-center bg-label-primary text-white fw-bold text-center",style:"",key:"correo"},{nombre:"Oficina",class:"text-center bg-label-primary text-white fw-bold text-center",style:"",key:"oficina"},{nombre:"Tipo Usuario",class:"text-center bg-label-primary text-white fw-bold text-center",style:"",key:"estado"},{nombre:"Permisos",class:"text-center bg-label-primary text-white fw-bold text-center",style:"",key:"estado"},{nombre:"Estado",class:"text-center bg-label-primary text-white fw-bold text-center",style:"",key:"estado"},{nombre:"Acciones",class:"text-center bg-label-primary text-white fw-bold text-center",style:"",key:"acciones"}];var ce=(0,r.aZ)({components:{Modal:U.Z,TableVue:A.Z,FormUsuario:ie,AccionesTable:te.Z,AdvertenciaVue:ne.Z},setup(){const e=(0,k.iH)([]),a=(0,k.iH)(!0),o=(0,k.iH)(!1),r=(0,k.iH)(null),s=(0,k.iH)(null),l=(0,k.iH)(null),i=(0,k.iH)(null),t=(0,k.iH)(null),n=(0,k.iH)(null),d=a=>{e.value=a},c=e=>{a.value=e},u=(e,a)=>a.filter((a=>-1!==a.search(e))).length,m=(e,a,o)=>u(e,o)===a?[e+" Todos los Permisos"]:o.filter((a=>-1!==a.search(e))),b=e=>{var a=[];const o=" Todos los Permisos";return a=m("Casos",6,JSON.parse(JSON.stringify(e))).concat(m("Ludoteca",5,JSON.parse(JSON.stringify(e)))).concat(m("Seguimiento Juridico",5,JSON.parse(JSON.stringify(e)))).concat(m("Camara Gessell",5,JSON.parse(JSON.stringify(e)))),0===a.length?["Sin Permisos"]:a.includes("Casos"+o)&&a.includes("Ludoteca"+o)&&a.includes("Seguimiento Juridico"+o)&&a.includes("Camara Gessell"+o)?["Todos los Permisos"]:a},p=()=>{a.value=!0,n.value.handleActualizarDatos(),a.value=!1},g=e=>a.value=e,f=e=>{o.value=!0,v(e)},h=e=>{o.value=!1,v(e)},y=e=>{l.value.setJson(e),r.value=("Activo"===e.estado?"Desactivar":"Activar")+' el Usuario "'+e.email+'", ¿Continuar?',s.value.showModal()},w=async e=>{if("undefined"!==typeof e){g(!0);await X.Z.borrar("auth/estado/"+e);n.value.handleActualizarDatos(),g(!1)}},v=async e=>{try{if("undefined"===typeof e.key)return;g(!0),i.value.resetForm();const a=await X.Z.obtener("auth/obtener/"+e.key);if(g(!1),"undefined"===typeof a)return;i.value.editForm(a),t.value.showModal()}catch(a){console.log("Error -> "+a)}};return{data:e,loading:a,showVer:o,columnas:de,mensajeAdvertencia:r,urlTabla:"auth/index",tablaUsuarios:n,formUsuarioRef:i,advertenciaRef:l,modalUsuarioRef:t,modalAdvertenciaRef:s,fetch:fetch,todosPermisos:b,handleChangedData:d,handleChangedLoading:c,handleActualizarDatos:p,handleClickEstadoCambiar:w,handleClickEstado:y,handleClickEditar:h,handleClickVer:f}}});const ue=(0,se.Z)(ce,[["render",C]]);var me=ue}}]);
//# sourceMappingURL=18.5ae252a0.js.map