"use strict";(self["webpackChunkvue"]=self["webpackChunkvue"]||[]).push([[215],{2366:function(e,o,a){a.d(o,{Z:function(){return g}});var t=a(3396),i=a(7139);const l={key:0,class:"input-group-text fw-bold text-primary"},s={key:0},n=["for"],r={key:0},c=["id","readonly","disabled","type","value","min","max"],d={key:3,class:"form-control fw-bold text-primary"};function u(e,o,a,u,p,m){return(0,t.wg)(),(0,t.iD)("div",{class:(0,i.C_)(e.clases??[])},[(e.clases??[]).includes("input-group")?((0,t.wg)(),(0,t.iD)("span",l,[e.obligatorio?((0,t.wg)(),(0,t.iD)("code",s,"*")):(0,t.kq)("",!0),(0,t.Uk)((0,i.zw)(e.titulo),1)])):((0,t.wg)(),(0,t.iD)("label",{key:1,class:"fw-semibold d-block",for:e.id},[e.obligatorio?((0,t.wg)(),(0,t.iD)("code",r,"*")):(0,t.kq)("",!0),(0,t.Uk)((0,i.zw)(e.titulo),1)],8,n)),!0!==(e.showVer??!1)?((0,t.wg)(),(0,t.iD)(t.HY,{key:2},[!0!==(e.showVer??!1)?((0,t.wg)(),(0,t.iD)("input",{key:0,id:e.id??"",readonly:e.showVer??!1,disabled:(e.loading??!1)||(e.disabled??!1),type:e.type??"text",value:e.value,onInput:o[0]||(o[0]=(...o)=>e.updateValue&&e.updateValue(...o)),class:"form-control",placeholder:"Ingrese",min:e.min??0,max:e.max??200},null,40,c)):(0,t.kq)("",!0)],64)):((0,t.wg)(),(0,t.iD)("label",d,(0,i.zw)(e.getValueFormat(e.value)),1))],2)}var p=(0,t.aZ)({props:["id","type","value","loading","disabled","showVer","clases","titulo","obligatorio","min","max"],methods:{getValueFormat(e){return null===e?"No Ingresado":"undefined"===typeof e?"Valor Indefinido":"string"===typeof e&&""===e.trim()?"No Ingresado":"datetime-local"===this.type?new Date(e).toLocaleString(void 0,{day:"2-digit",month:"2-digit",year:"numeric",hour:"2-digit",minute:"2-digit"}):"date"===this.type?new Date(e).toLocaleDateString(void 0,{day:"2-digit",month:"2-digit",year:"numeric"}):"time"===this.type?new Date("1994-11-22T"+e).toLocaleTimeString(void 0,{hour:"2-digit",minute:"2-digit"}):e}},setup(e,{emit:o}){const a=e=>{o("update:value",e.target.value)};return{updateValue:a}}}),m=a(89);const b=(0,m.Z)(p,[["render",u]]);var g=b},1787:function(e,o,a){a.d(o,{Z:function(){return v}});var t=a(3396),i=a(7139);const l={key:0,class:"input-group-text fw-bold text-primary"},s={key:0},n=["for"],r={key:0},c=["value","id","disabled"],d=(0,t._)("option",{value:null,selected:""},"Seleccione",-1),u=["value","selected"],p={key:3,class:"form-control text-primary fw-bold"};function m(e,o,a,m,b,g){return(0,t.wg)(),(0,t.iD)("div",{class:(0,i.C_)(e.clases??[])},[(e.clases??[]).includes("input-group")?((0,t.wg)(),(0,t.iD)("span",l,[e.obligatorio?((0,t.wg)(),(0,t.iD)("code",s,"*")):(0,t.kq)("",!0),(0,t.Uk)((0,i.zw)(e.nombre),1)])):((0,t.wg)(),(0,t.iD)("label",{key:1,class:"fw-semibold d-block",for:e.id},[e.obligatorio?((0,t.wg)(),(0,t.iD)("code",r,"*")):(0,t.kq)("",!0),(0,t.Uk)((0,i.zw)(e.nombre),1)],8,n)),!0!==(e.showVer??!1)?((0,t.wg)(),(0,t.iD)("select",{key:2,class:"form-select",value:e.opcion??"Seleccione",id:e.id,"aria-label":"Default select",onInput:o[0]||(o[0]=(...o)=>e.updatedOpcion&&e.updatedOpcion(...o)),disabled:(e.showVer??!1)||e.loading||e.opciones.length<1||e.disabled},[d,((0,t.wg)(!0),(0,t.iD)(t.HY,null,(0,t.Ko)(e.opciones,(o=>((0,t.wg)(),(0,t.iD)("option",{key:o,value:"object"===typeof o?o.key:o,selected:"object"===typeof o?o.key===e.opcion:o===e.opcion},(0,i.zw)("object"===typeof o?o.opcion:o),9,u)))),128))],40,c)):((0,t.wg)(),(0,t.iD)("label",p,(0,i.zw)(e.getItem(e.opciones,e.opcion)),1))],2)}var b=(0,t.aZ)({props:["tipo","clases","opciones","nombre","id","opcion","showVer","loading","obligatorio","disabled"],setup(e,{emit:o}){const a=e=>{let a="Seleccione"===e.target.value?null:e.target.value;o("update:opcion",a)},t=(e,o)=>{if("undefined"===typeof o||null===o)return"No Ingresado";if(0===(e??[]).length)return"Error Opciones no Cargadas...";let a=e[0];return"string"===typeof a?o:"object"===typeof a?e.find((e=>e.key===o)).opcion:void 0};return{updatedOpcion:a,getItem:t}}}),g=a(89);const f=(0,g.Z)(b,[["render",m]]);var v=f},3215:function(e,o,a){a.r(o),a.d(o,{default:function(){return E}});var t=a(3396),i=a(9242);const l={class:"container-xxl flex-grow-1 container-p-y"},s=(0,t._)("h4",{class:"fw-bold py-3 mb-4"},[(0,t._)("span",{class:"text-muted fw-light"},"Usuario /"),(0,t.Uk)(" Perfil ")],-1),n={class:"row"},r={class:"col-md-12"},c={class:"card mb-4"},d=(0,t._)("h5",{class:"card-header"},"Detalles del perfil",-1),u={class:"card-body"},p={class:"d-flex align-items-start align-items-sm-center gap-4"},m=(0,t._)("img",{src:"https://www.csj.gob.sv/wp-content/uploads/2021/06/cropped-logocsj-1-180x180.png",alt:"user-avatar",class:"d-block rounded",height:"100",width:"100",id:"uploadedAvatar"},null,-1),b={class:"button-wrapper"},g=(0,t.uE)('<label for="upload" class="btn btn-primary me-2 mb-4 disabled" tabindex="0"><span class="d-none d-sm-block">Subir nueva foto</span><i class="bx bx-upload d-block d-sm-none"></i><input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" disabled></label><button type="button" class="btn btn-outline-secondary account-image-reset mb-4" disabled><i class="bx bx-reset d-block d-sm-none"></i><span class="d-none d-sm-block"> Cancelar</span></button>',2),f={key:0,class:"spinner-border text-primary mx-4",role:"status"},v=(0,t._)("span",{class:"visually-hidden"},"Cargando...",-1),y=[v],w=(0,t._)("p",{class:"text-muted mb-0"},"Permitido JPG o PNG. Tamaño máximo de 800K",-1),h=(0,t._)("hr",{class:"my-0"},null,-1),k={class:"card-body"},_={autocomplete:"off"},x={class:"row"},D={class:"mb-3 col-md-6"},U=(0,t._)("label",{class:"fw-semibold d-block",for:"caso-fecha-hecho"},"Usuario",-1),V={class:"mb-3 col-md-6"},I=(0,t._)("label",{for:"lastName",class:"form-label"},"Correo",-1),S={class:"row"},Z=(0,t.uE)('<div class="mt-2"><button type="button" class="btn btn-primary me-2"><i class="bx bx-save"></i> Guardar</button><button type="button" class="btn btn-outline-secondary"><i class="bx bx-reset"></i> Cancelar</button></div>',1),C=(0,t._)("div",{class:"card"},[(0,t._)("h5",{class:"card-header"},"Desactivar Cuenta"),(0,t._)("div",{class:"card-body"},[(0,t._)("div",{class:"mb-3 col-12 mb-0"},[(0,t._)("div",{class:"alert alert-warning"},[(0,t._)("h6",{class:"alert-heading fw-bold mb-1"},"¿Estás segura/o de que quieres desactivar tu cuenta?"),(0,t._)("p",{class:"mb-0"},"Una vez que desactivar tu cuenta, no hay vuelta atrás. Por favor, esté seguro.")])]),(0,t._)("form",{id:"formAccountDeactivation",onsubmit:"return false"},[(0,t._)("div",{class:"form-check mb-3"},[(0,t._)("input",{class:"form-check-input",type:"checkbox",name:"accountActivation",id:"accountActivation"}),(0,t._)("label",{class:"form-check-label",for:"accountActivation"},"Confirmo la desactivación de mi cuenta")]),(0,t._)("button",{disabled:"",type:"submit",class:"btn btn-danger deactivate-account"},[(0,t._)("i",{class:"bx bx-x-circle bx-sm"}),(0,t.Uk)(" Desactivar cuenta")])])])],-1);function O(e,o,a,v,O,A){const q=(0,t.up)("FormSelectOpcionVue"),z=(0,t.up)("FormInputVue");return(0,t.wg)(),(0,t.iD)("div",l,[s,(0,t._)("div",n,[(0,t._)("div",r,[(0,t._)("div",c,[d,(0,t._)("div",u,[(0,t._)("div",p,[m,(0,t._)("div",b,[g,e.loading?((0,t.wg)(),(0,t.iD)("div",f,y)):(0,t.kq)("",!0),w])])]),h,(0,t._)("div",k,[(0,t._)("form",_,[(0,t._)("div",x,[(0,t._)("div",D,[U,(0,t.wy)((0,t._)("input",{class:"form-control",type:"text","onUpdate:modelValue":o[0]||(o[0]=o=>e.store.state.USUARIO.usuario=o),autofocus:""},null,512),[[i.nr,e.store.state.USUARIO.usuario]])]),(0,t._)("div",V,[I,(0,t.wy)((0,t._)("input",{class:"form-control",type:"text","onUpdate:modelValue":o[1]||(o[1]=o=>e.store.state.USUARIO.correo=o),readonly:""},null,512),[[i.nr,e.store.state.USUARIO.correo]])]),(0,t.Wm)(q,{id:"usuario-tipo-usuario",obligatorio:!0,nombre:"Tipo Usuario",clases:["col-md-6","mb-2"],opciones:["Usuaria/o","Administrador"],loading:e.loading,opcion:e.formulario.tipo_usuario,"onUpdate:opcion":o[2]||(o[2]=o=>e.formulario.tipo_usuario=o)},null,8,["loading","opcion"])]),(0,t._)("div",S,[(0,t.Wm)(z,{id:"usuario-contrasena",obligatorio:!0,loading:e.loading,clases:"col-md-6  mb-2",showVer:!1,type:"password",disabled:e.loading,titulo:"Contraseña",value:e.formulario.contraseña,"onUpdate:value":o[3]||(o[3]=o=>e.formulario.contraseña=o)},null,8,["loading","disabled","value"]),(0,t.Wm)(z,{id:"usuario-repetir-contrasena",obligatorio:!0,clases:"col-md-6  mb-2",loading:e.loading,type:"password",disabled:e.loading,titulo:"Repetir Contraseña",value:e.formulario.repetir_contraseña,"onUpdate:value":o[4]||(o[4]=o=>e.formulario.repetir_contraseña=o)},null,8,["loading","disabled","value"])]),Z])])]),C])])])}var A=a(4239),q=a(1120),z=a(1787),j=a(2366),F=a(4870),N=(0,t.aZ)({components:{FormSelectOpcionVue:z.Z,FormInputVue:j.Z},mounted(){null===localStorage.getItem("access_token")?(A.Z.commit("headerSesion"),q.Z.push({name:"acceso"})):A.Z.commit("headerSesionOk"),this.loading=!1},setup(){const e=(0,F.iH)(!0),o=(0,F.iH)({usuario:null,correo:null,foto:null,"contraseña":null,"repetir_contraseña":null,oficina:null});return{store:A.Z,loading:e,formulario:o}}}),P=a(89);const R=(0,P.Z)(N,[["render",O]]);var E=R}}]);
//# sourceMappingURL=215.cd4d21fa.js.map