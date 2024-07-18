"use strict";(self["webpackChunkvue"]=self["webpackChunkvue"]||[]).push([[64],{4118:function(e,a,o){o.d(a,{Z:function(){return g}});var s=o(3396),t=o(7139),r=o(9242);const l={key:0,class:"my-1"},i={key:1},n={class:"float-end"},d=(0,s._)("i",{class:"bx bx-sm bx-x"},null,-1),c=[d];function u(e,a,o,d,u,m){const b=(0,s.Q2)("auto-animate");return null!==e.alert&&null!==e.mensajesAlert?((0,s.wg)(),(0,s.iD)("div",{key:0,class:(0,t.C_)(["container rounded-3 my-2 border border-2 alert-dismissible",["alert-"+e.alert??"alert-info","border-"+e.alert??"border-warning"]]),role:"alert"},[(0,s._)("div",null,[Array.isArray(e.mensajesAlert)?(0,s.wy)(((0,s.wg)(),(0,s.iD)("ul",l,[((0,s.wg)(!0),(0,s.iD)(s.HY,null,(0,s.Ko)(e.mensajesAlert,(e=>((0,s.wg)(),(0,s.iD)("li",{key:e},[(0,s._)("strong",null,(0,t.zw)(e),1)])))),128))])),[[b]]):((0,s.wg)(),(0,s.iD)("span",i,(0,t.zw)(e.mensajesAlert),1))]),(0,s.wy)((0,s._)("div",n,[(0,s._)("button",{type:"button",class:(0,t.C_)(["btn btn-sm",["btn-outline-"+e.alert??"btn-outline-info"]])},c,2)],512),[[r.F8,!1]])],2)):(0,s.kq)("",!0)}var m=(0,s.aZ)({props:["mensajesAlert","alert"]}),b=o(89);const p=(0,b.Z)(m,[["render",u]]);var g=p},2366:function(e,a,o){o.d(a,{Z:function(){return g}});var s=o(3396),t=o(7139);const r={key:0,class:"input-group-text fw-bold text-primary"},l={key:0},i=["for"],n={key:0},d=["id","readonly","disabled","type","value","min","max"],c={key:3,class:"form-control fw-bold text-primary"};function u(e,a,o,u,m,b){return(0,s.wg)(),(0,s.iD)("div",{class:(0,t.C_)(e.clases??[])},[(e.clases??[]).includes("input-group")?((0,s.wg)(),(0,s.iD)("span",r,[e.obligatorio?((0,s.wg)(),(0,s.iD)("code",l,"*")):(0,s.kq)("",!0),(0,s.Uk)((0,t.zw)(e.titulo),1)])):((0,s.wg)(),(0,s.iD)("label",{key:1,class:"fw-semibold d-block",for:e.id},[e.obligatorio?((0,s.wg)(),(0,s.iD)("code",n,"*")):(0,s.kq)("",!0),(0,s.Uk)((0,t.zw)(e.titulo),1)],8,i)),!0!==(e.showVer??!1)?((0,s.wg)(),(0,s.iD)(s.HY,{key:2},[!0!==(e.showVer??!1)?((0,s.wg)(),(0,s.iD)("input",{key:0,id:e.id??"",readonly:e.showVer??!1,disabled:(e.loading??!1)||(e.disabled??!1),type:e.type??"text",value:e.value,onInput:a[0]||(a[0]=(...a)=>e.updateValue&&e.updateValue(...a)),class:"form-control",placeholder:"Ingrese",min:e.min??0,max:e.max??200},null,40,d)):(0,s.kq)("",!0)],64)):((0,s.wg)(),(0,s.iD)("label",c,(0,t.zw)(e.getValueFormat(e.value)),1))],2)}var m=(0,s.aZ)({props:["id","type","value","loading","disabled","showVer","clases","titulo","obligatorio","min","max"],methods:{getValueFormat(e){return null===e?"No Ingresado":"undefined"===typeof e?"Valor Indefinido":"string"===typeof e&&""===e.trim()?"No Ingresado":"datetime-local"===this.type?new Date(e).toLocaleString(void 0,{day:"2-digit",month:"2-digit",year:"numeric",hour:"2-digit",minute:"2-digit"}):"date"===this.type?new Date(e).toLocaleDateString(void 0,{day:"2-digit",month:"2-digit",year:"numeric"}):"time"===this.type?new Date("1994-11-22T"+e).toLocaleTimeString(void 0,{hour:"2-digit",minute:"2-digit"}):e}},setup(e,{emit:a}){const o=e=>{a("update:value",e.target.value)};return{updateValue:o}}}),b=o(89);const p=(0,b.Z)(m,[["render",u]]);var g=p},3786:function(e,a,o){o.d(a,{Z:function(){return p}});var s=o(3396),t=o(7139);const r={class:"modal fade show",ref:"ModalRef",id:"modalCenter",tabindex:"-1","aria-hidden":"true","data-bs-backdrop":"static"},l={class:"modal-content"},i={class:"modal-header"},n={class:"container-fluid mb-2"};function d(e,a,o,d,c,u){return(0,s.wg)(),(0,s.iD)("div",r,[(0,s._)("div",{class:(0,t.C_)(["modal-dialog",e.clases??"modal-xl"])},[(0,s._)("div",l,[(0,s._)("div",i,[(0,s._)("button",{type:"button",class:"btn-close","data-bs-dismiss":"modal","aria-label":"Close",onClick:a[0]||(a[0]=a=>{e.$emit("handleActualizarDatosTabla")})})]),(0,s._)("div",n,[(0,s.WI)(e.$slots,"cardBody")])])],2)],512)}var c=o(2166),u=(0,s.aZ)({props:["size","clases"],methods:{data(){return{modal:null}},showModal(){this.modal??=new c.u_(this.$refs.ModalRef),this.modal.show()},hideModal(){null!==this.modal&&"undefined"!==typeof this.modal&&this.modal.hide()}}}),m=o(89);const b=(0,m.Z)(u,[["render",d]]);var p=b},7783:function(e,a,o){o.d(a,{Z:function(){return y}});var s=o(3396),t=o(7139);const r=e=>((0,s.dD)("data-v-9978b988"),e=e(),(0,s.Cn)(),e),l={style:{margin:"0%"}},i=["disabled"],n={key:0,class:"bx bx-dots-horizontal-rounded"},d={key:1,class:"spinner-grow spinner-grow-sm",role:"status"},c=r((()=>(0,s._)("span",{class:"visually-hidden"},"Cargando...",-1))),u=[c],m=["onClick"];function b(e,a,o,r,c,b){const p=(0,s.up)("Popper");return(0,s.wg)(),(0,s.iD)("div",l,[(0,s.Wm)(p,{class:"popper-theme text-start",arrow:""},{content:(0,s.w5)((({close:a})=>[((0,s.wg)(!0),(0,s.iD)(s.HY,null,(0,s.Ko)(e.getBotones(),((o,r)=>((0,s.wg)(),(0,s.iD)(s.HY,{key:r},[o.show?((0,s.wg)(),(0,s.iD)("button",{class:"dropdown-item text-start-center",key:o.nombre,onClick:s=>{e.handleClick(o.metodo),a()}},[(0,s._)("i",{class:(0,t.C_)(["bx me-1",o.icon]),style:(0,t.j5)(o.style)},null,6),(0,s.Uk)(" "+(0,t.zw)(o.nombre),1)],8,m)):(0,s.kq)("",!0)],64)))),128))])),default:(0,s.w5)((()=>[(0,s._)("button",{type:"button",class:"btn p-0 dropdown-toggle hide-arrow border px-3 btn-primary",disabled:e.loading},[e.loading?((0,s.wg)(),(0,s.iD)("div",d,u)):((0,s.wg)(),(0,s.iD)("i",n))],8,i)])),_:1})])}var p=o(4870),g=o(3758),h=(0,s.aZ)({props:["loading","estado","json","showVer","showArchivos","showEditar","showBorrar","showEstado"],data(){return{style:"font-size:20px; ",botones:[]}},methods:{getBotones:function(){return this.botones=[{nombre:"Ver",icon:"bx-show ",show:this.showVer??!1,metodo:"handleClickVer",style:this.style},{nombre:"Archivos",icon:"bx-file-find",show:this.showArchivos??!1,metodo:"handleClickArchivos",style:this.style},{nombre:"Editar",icon:"bx-edit-alt",show:this.showEditar??!1,metodo:"handleClickEditar",style:this.style},{nombre:"Activo"===this.estado?"Desactivar":"Activar",icon:"Activo"!==this.estado?"bx-check":"bx-x",show:this.showEstado??!1,metodo:"handleClickEstado",style:this.style},{nombre:"Borrar",icon:"bx-trash",show:this.showBorrar??!1,metodo:"handleClickBorrar",style:this.style}]}},setup(e,{emit:a}){const o=(0,p.iH)(e.json),s=e=>{a(e,o)};return{handleClick:s}},components:{Popper:g.Z}}),w=o(89);const f=(0,w.Z)(h,[["render",b],["__scopeId","data-v-9978b988"]]);var y=f},9684:function(e,a,o){o.d(a,{Z:function(){return w}});var s=o(3396),t=o(7139);const r={style:{"min-height":"70px"},class:"border border-3 border-warning alert alert-danger text-white text-center text-warning text-wrap"},l=(0,s._)("i",{class:"bx bx-pull-left bx-lg bxs-error bx-flashing text-warning"},null,-1),i={class:"text-warning fw-bold fa-2xl"},n={class:"float-end"},d=["disabled"],c=(0,s._)("i",{class:"bx bx-sm bx-exit bx-flashing-hover"},null,-1),u=["disabled"];function m(e,a,o,m,b,p){return(0,s.wg)(),(0,s.iD)("div",null,[(0,s._)("div",r,[l,(0,s._)("h5",i,(0,t.zw)(e.mensaje),1)]),(0,s._)("div",n,[(0,s._)("button",{type:"button",class:"btn btn-secondary m-1",disabled:e.loading??!1,"data-bs-dismiss":"modal"},[c,(0,s.Uk)(" Salir")],8,d),(0,s._)("button",{type:"button",class:"btn btn-danger m-1","data-bs-dismiss":"modal",onClick:a[0]||(a[0]=()=>{e.$emit("continuar",e.json.key)}),disabled:e.loading??!1},[(0,s._)("i",{class:(0,t.C_)(["bx bx-sm bx-flashing-hover",{"bx-check ":!e.loading,"bx-spin bx-loader":e.loading}])},null,2),(0,s.Uk)(" Continuar ")],8,u)])])}var b=o(4870),p=(0,s.aZ)({props:["mensaje","loading"],setup:(e,{emit:a})=>{const o=(0,b.iH)(null),s=e=>{o.value=e};return{json:o,setJson:s}}}),g=o(89);const h=(0,g.Z)(p,[["render",m]]);var w=h},5109:function(e,a,o){o.r(a),o.d(a,{default:function(){return re}});var s=o(3396),t=o(7139),r=o(9242);const l={class:"container-fluid flex-grow-1 container-p-y"},i=(0,s._)("h4",{class:"fw-bold py-1 mb-2"},[(0,s._)("span",{class:"text-muted fw-light"},"Administración /"),(0,s.Uk)(" Usuarias/os ")],-1),n={class:"card"},d={class:"card-body"},c=["disabled"],u=(0,s._)("i",{class:"bx bx-plus",style:{"font-size":"20px"}},null,-1),m={class:"text-start-center text-nowrap fw-bold"},b={class:"text-start-center"},p={class:"badge bg-label-primary me-1"},g={class:"text-start-center"},h={class:"badge bg-label-secondary me-1"},w={class:"text-center"},f={class:""},y={class:"text-center"},v={style:{padding:"0%"},class:"text-center"};function x(e,a,o,x,k,_){const C=(0,s.up)("AccionesTable"),A=(0,s.up)("TableVue"),V=(0,s.up)("FormUsuario"),D=(0,s.up)("Modal"),U=(0,s.up)("AdvertenciaVue");return(0,s.wg)(),(0,s.iD)("div",l,[i,(0,s._)("div",n,[(0,s._)("div",d,[(0,s.Wm)(A,{ref:"tablaUsuarios",columnas:e.columnas,url:e.urlTabla,onHandleChangedLoading:e.handleChangedLoading,onHandleChangedData:e.handleChangedData},{button:(0,s.w5)((()=>[(0,s._)("button",{class:"btn btn-primary m-1 justify-items-start",disabled:e.loading,onClick:a[0]||(a[0]=a=>{e.$refs.modalUsuarioRef.showModal(),e.$refs.formUsuarioRef.resetForm()})},[u,(0,s.Uk)(" Nuevo ")],8,c)])),tbody:(0,s.w5)((()=>[((0,s.wg)(!0),(0,s.iD)(s.HY,null,(0,s.Ko)(e.data,((a,o)=>((0,s.wg)(),(0,s.iD)("tr",{key:o},[(0,s._)("td",m,(0,t.zw)(a.name),1),(0,s._)("td",b,[(0,s._)("span",p,(0,t.zw)(a.email),1)]),(0,s._)("td",g,[(0,s._)("span",h,(0,t.zw)(a.oficina??"No ingresado"),1)]),(0,s._)("td",w,[(0,s._)("span",{class:(0,t.C_)(["badge me-1",a.tipoUsuario?"Super Administrador"===a.tipoUsuario?"bg-label-success":"bg-label-secondary":"bg-label-danger"])},(0,t.zw)(a.tipoUsuario??"Desconocido"),3)]),(0,s._)("td",f,[((0,s.wg)(!0),(0,s.iD)(s.HY,null,(0,s.Ko)(e.todosPermisos(a.permisos),(e=>((0,s.wg)(),(0,s.iD)("span",{class:"badge bg-label-primary me-1",key:e},(0,t.zw)("Super Administrador"===a.tipoUsuario||"Administrador"===a.tipoUsuario?"Todos los permisos":e),1)))),128))]),(0,s._)("td",y,[(0,s._)("span",{class:(0,t.C_)(["badge me-1","Activo"===a.estado?"bg-success":"bg-danger"])},(0,t.zw)(a.estado),3)]),(0,s._)("td",v,[(0,s.wy)((0,s.Wm)(C,{loading:e.loading,showVer:!0,showEditar:!0,showEstado:!0,estado:a.estado,onHandleClickVer:o=>e.handleClickVer(a),onHandleClickEditar:o=>e.handleClickEditar(a),onHandleClickEstado:o=>e.handleClickEstado(a)},null,8,["loading","estado","onHandleClickVer","onHandleClickEditar","onHandleClickEstado"]),[[r.F8,"Super Administrador"!==a.tipoUsuario]])])])))),128))])),_:1},8,["columnas","url","onHandleChangedLoading","onHandleChangedData"])])]),(0,s.Wm)(D,{ref:"modalUsuarioRef",onHandleActualizarDatosTabla:e.handleActualizarDatos},{cardBody:(0,s.w5)((()=>[(0,s.Wm)(V,{ref:"formUsuarioRef",showVer:e.showVer},null,8,["showVer"])])),_:1},8,["onHandleActualizarDatosTabla"]),(0,s.Wm)(D,{ref:"modalAdvertenciaRef",clases:"modal-centered"},{cardBody:(0,s.w5)((()=>[(0,s.Wm)(U,{ref:"advertenciaRef",mensaje:e.mensajeAdvertencia,onContinuar:e.handleClickEstadoCambiar},null,8,["mensaje","onContinuar"])])),_:1},512)])}var k=o(4870),_=o(3786),C=o(5938);const A={class:"border border-2 border-light mx-0 p-1 rounded"},V={class:"card-body p-2 clearfix"},D={class:"container-fluid border border-2 border-primary rounded-3"},U=(0,s._)("div",{class:"col-md mt-2"},[(0,s._)("h3",{class:"my-2"},[(0,s._)("i",{class:"bx bx-user bx-md"}),(0,s.Uk)(" Usuaria/o")])],-1),S={class:"row"},J={class:"row m-2 border border-secondary border-2 rounded-2"},O=(0,s._)("h5",{class:"mt-3"},[(0,s._)("i",{class:"bx bx-caret-right"}),(0,s.Uk)(" Permisos de Usuaria/o")],-1),H={class:"mb-2 clearfix"},N={class:"table-responsive table table-bordered border border-secondary table-striped mx-0 table-sm mb-3"},Z=(0,s._)("thead",null,[(0,s._)("tr",null,[(0,s._)("th",{class:"text-center bg-label-primary text-white fw-bold",style:{"text-transform":"none"}},"Modulos"),(0,s._)("th",{class:"text-center bg-label-primary text-white fw-bold",style:{"text-transform":"none"}},"Permisos")])],-1),j={class:"text-start-center fw-bold"},z=["onUpdate:modelValue","id","disabled"],E=["for"],F={class:"px-2"},T={class:"mt-3 float-end"},W=["disabled"],R=(0,s._)("i",{class:"bx bx-exit"},null,-1),P=["disabled"],B=(0,s._)("i",{class:"bx bx-reset"},null,-1),I=["disabled"];function L(e,a,o,l,i,n){const d=(0,s.up)("FormInput"),c=(0,s.up)("FormSelectOpcion"),u=(0,s.up)("AlertVue");return(0,s.wg)(),(0,s.iD)("div",A,[(0,s._)("form",null,[(0,s._)("div",V,[(0,s._)("div",D,[U,(0,s._)("div",S,[(0,s.Wm)(d,{id:"usuario",obligatorio:!0,loading:l.loading,clases:"col-md-6  mb-2",showVer:o.showVer,disabled:l.loading,titulo:"Usuario",value:l.formulario.usuario,"onUpdate:value":a[0]||(a[0]=e=>l.formulario.usuario=e)},null,8,["loading","showVer","disabled","value"]),(0,s.Wm)(d,{id:"usuario-email",obligatorio:!0,loading:l.loading,clases:"col-md-6  mb-2",showVer:o.showVer,type:"email2",disabled:l.loading,titulo:"Correo",value:l.formulario.correo,"onUpdate:value":a[1]||(a[1]=e=>l.formulario.correo=e)},null,8,["loading","showVer","disabled","value"]),(0,s.Wm)(c,{id:"usuario-oficina",obligatorio:!0,nombre:"Oficina",clases:["col-md-6","mb-2"],opciones:null===l.opciones?[]:l.opciones.oficinas,showVer:o.showVer,loading:l.loading,opcion:l.formulario.oficina,"onUpdate:opcion":a[2]||(a[2]=e=>l.formulario.oficina=e)},null,8,["opciones","showVer","loading","opcion"]),(0,s.Wm)(c,{id:"usuario-tipo-usuario",obligatorio:!0,nombre:"Tipo Usuario",clases:["col-md-6","mb-2"],opciones:["Usuaria/o","Administrador"],showVer:o.showVer,loading:l.loading,opcion:l.formulario.tipo_usuario,"onUpdate:opcion":a[3]||(a[3]=e=>l.formulario.tipo_usuario=e),onChange:a[4]||(a[4]=e=>{"Usuaria/o"!==l.formulario.tipo_usuario&&l.resetPermisos()})},null,8,["showVer","loading","opcion"]),(0,s.wy)((0,s.Wm)(d,{id:"usuario-contrasena",obligatorio:!0,loading:l.loading,clases:"col-md-6  mb-2",showVer:o.showVer,type:"password",disabled:l.loading,titulo:"Contraseña",value:l.formulario.contraseña,"onUpdate:value":a[5]||(a[5]=e=>l.formulario.contraseña=e)},null,8,["loading","showVer","disabled","value"]),[[r.F8,!o.showVer]]),(0,s.wy)((0,s.Wm)(d,{id:"usuario-repetir-contrasena",obligatorio:!0,clases:"col-md-6  mb-2",loading:l.loading,showVer:o.showVer,type:"password",disabled:l.loading,titulo:"Repetir Contraseña",value:l.formulario.repetir_contraseña,"onUpdate:value":a[6]||(a[6]=e=>l.formulario.repetir_contraseña=e)},null,8,["loading","showVer","disabled","value"]),[[r.F8,!o.showVer]])]),(0,s._)("div",J,[O,(0,s._)("div",H,[(0,s._)("table",N,[Z,(0,s._)("tbody",null,[((0,s.wg)(!0),(0,s.iD)(s.HY,null,(0,s.Ko)(l.formulario.permisos,(e=>((0,s.wg)(),(0,s.iD)("tr",{key:e,class:(0,t.C_)({"table-primary":-1!=e.permisos.findIndex((e=>e.bool))})},[(0,s._)("td",{class:(0,t.C_)(["text-center fw-bold",{"text-primary":-1!=e.permisos.findIndex((e=>e.bool))}])},(0,t.zw)(e.modulo),3),(0,s._)("td",j,[((0,s.wg)(!0),(0,s.iD)(s.HY,null,(0,s.Ko)(e.permisos,(a=>((0,s.wg)(),(0,s.iD)("div",{class:"form-check form-check-inline mt-3",key:a.name},[(0,s.wy)((0,s._)("input",{"onUpdate:modelValue":e=>a.bool=e,class:"form-check-input",type:"checkbox",id:"defaultCheck"+a.name+e.modulo,disabled:"Administrador"===l.formulario.tipo_usuario||o.showVer},null,8,z),[[r.e8,a.bool]]),(0,s._)("label",{class:(0,t.C_)(["form-check-label",{"text-primary":a.bool}]),for:"defaultCheck"+a.name+e.modulo},(0,t.zw)(a.name),11,E)])))),128))])],2)))),128))])])])]),(0,s._)("div",F,[(0,s.Wm)(u,{mensajesAlert:l.mensajesAlert,alert:l.tipoAlert},null,8,["mensajesAlert","alert"])])]),(0,s._)("div",T,[(0,s._)("button",{disabled:l.loading,type:"button",class:"btn btn-secondary m-1","data-bs-dismiss":"modal"},[R,(0,s.Uk)(" Salir ")],8,W),(0,s._)("button",{disabled:l.loading,type:"button",class:"btn btn-secondary m-1"},[B,(0,s.Uk)(" Reset ")],8,P),(0,s._)("button",{disabled:l.loading,type:"button",class:"btn btn-primary m-1",onClick:a[7]||(a[7]=(...e)=>l.handledClickGuardar&&l.handledClickGuardar(...e))},[(0,s._)("i",{class:(0,t.C_)(["bx",{"bx-save":!l.loading,"bx-spin bx-loader":l.loading}])},null,2),(0,s.Uk)(" Guardar ")],8,I)])])])])}var M=o(8419),G=o(2366),Y=o(1787),q=o(4118),K={name:"FormUsuarioComponent",props:["showVer"],components:{FormSelectOpcion:Y.Z,FormInput:G.Z,AlertVue:q.Z},setup(){const e=(0,k.iH)(!1),a=(0,k.iH)(null),o=[{name:"Crear",bool:!1},{name:"Ver",bool:!1},{name:"Editar",bool:!1},{name:"Borrar",bool:!1}],t={key:null,usuario:null,correo:null,tipo_usuario:"Usuaria/o",oficina:null,"contraseña":null,"repetir_contraseña":null,estado:null,permisos:[{modulo:"Casos",permisos:JSON.parse(JSON.stringify([...o])).concat([{name:"Subir Archivos",bool:!1},{name:"Bajar Archivos",bool:!1}])},{modulo:"Ludoteca",permisos:JSON.parse(JSON.stringify([...o])).concat([{name:"Agenda",bool:!1}])},{modulo:"Seguimiento Juridico",permisos:JSON.parse(JSON.stringify([...o])).concat([{name:"Agenda",bool:!1}])},{modulo:"Camara Gessell",permisos:JSON.parse(JSON.stringify([...o])).concat([{name:"Agenda",bool:!1}])}]},r=(0,k.qj)(JSON.parse(JSON.stringify(t))),l=(0,k.iH)(null),i=(0,k.iH)(null);function n(){l.value=null,i.value=null,e.value=!1,Object.assign(r,JSON.parse(JSON.stringify(t)))}function d(e){Object.assign(r,JSON.parse(JSON.stringify(e)))}const c=()=>{r.permisos=[{modulo:"Casos",permisos:JSON.parse(JSON.stringify([...o])).concat([{name:"Subir Archivos",bool:!1},{name:"Bajar Archivos",bool:!1}])},{modulo:"Ludoteca",permisos:JSON.parse(JSON.stringify([...o])).concat([{name:"Agenda",bool:!1}])},{modulo:"Seguimiento Juridico",permisos:JSON.parse(JSON.stringify([...o])).concat([{name:"Agenda",bool:!1}])},{modulo:"Camara Gessell",permisos:JSON.parse(JSON.stringify([...o])).concat([{name:"Agenda",bool:!1}])}]},u=async()=>{e.value=!0;try{const a=await M.Z.actualizarCrear(r,"auth/registro");a.ok&&(a.json.error?(l.value="warning",i.value=a.json.error):(r.key=a.json.key,l.value=i.value=null)),e.value=!1}catch(a){console.log("¡Ups ocurrio un error!, no se pudo guardar el registro seguimiento"),e.value=!1}};return(0,s.bv)((async()=>{a.value=await M.Z.obtener("auth/opciones")})),{opciones:a,loading:e,formulario:r,tipoAlert:l,mensajesAlert:i,editForm:d,resetForm:n,handledClickGuardar:u,resetPermisos:c}}},$=o(89);const Q=(0,$.Z)(K,[["render",L]]);var X=Q,ee=o(7783),ae=o(9684);const oe=[{nombre:"Usuario",class:"text-center bg-primary text-white fw-bold",style:"",key:"usuario"},{nombre:"Correo",class:"text-center bg-label-primary text-white fw-bold text-center",style:"",key:"correo"},{nombre:"Oficina",class:"text-center bg-label-primary text-white fw-bold text-center",style:"",key:"oficina"},{nombre:"Tipo Usuario",class:"text-center bg-label-primary text-white fw-bold text-center",style:"",key:"estado"},{nombre:"Permisos",class:"text-center bg-label-primary text-white fw-bold text-center",style:"",key:"estado"},{nombre:"Estado",class:"text-center bg-label-primary text-white fw-bold text-center",style:"",key:"estado"},{nombre:"Acciones",class:"text-center bg-label-primary text-white fw-bold text-center",style:"",key:"acciones"}];var se=(0,s.aZ)({components:{Modal:_.Z,TableVue:C.Z,FormUsuario:X,AccionesTable:ee.Z,AdvertenciaVue:ae.Z},setup(){const e=(0,k.iH)([]),a=(0,k.iH)(!0),o=(0,k.iH)(!1),s=(0,k.iH)(null),t=(0,k.iH)(null),r=(0,k.iH)(null),l=(0,k.iH)(null),i=(0,k.iH)(null),n=(0,k.iH)(null),d=a=>{e.value=a},c=e=>{a.value=e},u=(e,a)=>a.filter((a=>-1!==a.search(e))).length,m=(e,a,o)=>u(e,o)===a?[e+" Todos los Permisos"]:o.filter((a=>-1!==a.search(e))),b=e=>{var a=[];const o=" Todos los Permisos";return a=m("Casos",6,JSON.parse(JSON.stringify(e))).concat(m("Ludoteca",5,JSON.parse(JSON.stringify(e)))).concat(m("Seguimiento Juridico",5,JSON.parse(JSON.stringify(e)))).concat(m("Camara Gessell",5,JSON.parse(JSON.stringify(e)))),0===a.length?["Sin Permisos"]:a.includes("Casos"+o)&&a.includes("Ludoteca"+o)&&a.includes("Seguimiento Juridico"+o)&&a.includes("Camara Gessell"+o)?["Todos los Permisos"]:a},p=()=>{a.value=!0,n.value.handleActualizarDatos(),a.value=!1},g=e=>a.value=e,h=e=>{o.value=!0,v(e)},w=e=>{o.value=!1,v(e)},f=e=>{r.value.setJson(e),s.value=("Activo"===e.estado?"Desactivar":"Activar")+' el Usuario "'+e.email+'", ¿Continuar?',t.value.showModal()},y=async e=>{if("undefined"!==typeof e){g(!0);await M.Z.borrar("auth/estado/"+e);n.value.handleActualizarDatos(),g(!1)}},v=async e=>{try{if("undefined"===typeof e.key)return;g(!0),l.value.resetForm();const a=await M.Z.obtener("auth/obtener/"+e.key);if(g(!1),"undefined"===typeof a)return;l.value.editForm(a),i.value.showModal()}catch(a){console.log("Error -> "+a)}};return{data:e,loading:a,showVer:o,columnas:oe,mensajeAdvertencia:s,urlTabla:"auth/index",tablaUsuarios:n,formUsuarioRef:l,advertenciaRef:r,modalUsuarioRef:i,modalAdvertenciaRef:t,fetch:fetch,todosPermisos:b,handleChangedData:d,handleChangedLoading:c,handleActualizarDatos:p,handleClickEstadoCambiar:y,handleClickEstado:f,handleClickEditar:w,handleClickVer:h}}});const te=(0,$.Z)(se,[["render",x]]);var re=te}}]);
//# sourceMappingURL=64.ccc8708e.js.map