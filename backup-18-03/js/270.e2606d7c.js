"use strict";(self["webpackChunkvue"]=self["webpackChunkvue"]||[]).push([[270],{6996:function(o,e,l){l.r(e),l.d(e,{default:function(){return Ao}});var a=l(3396),i=l(7139),s=l(9242);const n={class:"container flex-grow-1 container-p-y"},r={class:"fw-bold py-3 mb-4"},d={class:"text-muted fw-light text-center"},c={class:"card"},t={class:"card-body"},u={class:"col-md-4"},m={class:"input-group border-primary flex justify-content-end"},p=(0,a._)("span",{class:"input-group-text border-primary bg-primary text-white text-center border-white",for:"tipo-caso"},[(0,a.Uk)("Tipo Caso"),(0,a._)("i",{class:"bx bxs-label"})],-1),b=["value"],f=["disabled"],g=(0,a._)("i",{class:"bx bx-plus",style:{"font-size":"20px"}},null,-1),v={class:"row pb-2 pt-2 border border-2 border-primary rounded"},h={class:"col-md-6"},w=(0,a._)("label",{class:"fw-semibold d-block",for:"caso-tipo-hecho"}," Codigo de caso",-1),_={class:"col-md"},V=["disabled"],y=(0,a._)("i",{class:"bx bx-transfer-alt bx-sm"},null,-1);function x(o,e,l,x,C,N){const A=(0,a.up)("TableVue"),k=(0,a.up)("Form"),F=(0,a.up)("vSelectPaginationVue"),U=(0,a.up)("FormCasoVue"),H=(0,a.up)("ModalVue");return(0,a.wg)(),(0,a.iD)("div",n,[(0,a._)("h4",r,[(0,a._)("span",d,"SAIV"+(0,i.zw)(o.store.state.USUARIO.oficina)+" /",1),(0,a.Uk)(" Ludoteca ")]),(0,a._)("div",c,[(0,a._)("div",t,[(0,a.Wm)(A,{ref:"tablaCasosRef",columnas:o.columnas,url:o.urlTabla,onHandleChangedLoading:o.handleChangedLoading,onHandleChangedData:o.handleChangedData},{row2:(0,a.w5)((()=>[(0,a._)("div",u,[(0,a._)("div",m,[p,(0,a.wy)((0,a._)("select",{class:"form-select bg-primary text-white",id:"tipo-caso","onUpdate:modelValue":e[0]||(e[0]=e=>o.tipoCaso=e),onChange:e[1]||(e[1]=e=>o.tablaCasosRef.handleChangeFiltro(o.tipoCaso))},[((0,a.wg)(),(0,a.iD)(a.HY,null,(0,a.Ko)(["Todos","Denuncia","Sin Denuncia"],(o=>(0,a._)("option",{key:o,class:"bg-primary text-white",value:o},(0,i.zw)(o),9,b))),64))],544),[[s.bM,o.tipoCaso]])])])])),button:(0,a.w5)((()=>[(0,a._)("button",{class:"btn btn-primary m-1 justify-items-start",onClick:e[2]||(e[2]=(...e)=>o.handleClickNuevo&&o.handleClickNuevo(...e)),disabled:o.loading||!0},[g,(0,a.Uk)(" Nuevo ")],8,f)])),_:1},8,["columnas","url","onHandleChangedLoading","onHandleChangedData"])])]),(0,a.Wm)(H,{ref:"modalLudotecaRef",onHandleActualizarDatosTabla:o.handleActualizarDatos},{cardBody:(0,a.w5)((()=>[(0,a.wy)((0,a.Wm)(k,{ref:"formLudotecaRef",loading:o.loading,showVer:o.showVer??!1},null,8,["loading","showVer"]),[[s.F8,o.intercambiarForm]]),(0,a.Wm)(s.uT,{name:"fade"},{default:(0,a.w5)((()=>[(0,a.wy)((0,a.Wm)(U,{showVer:!0,ref:"formCasoRef"},{"codigo-caso":(0,a.w5)((()=>[(0,a._)("div",v,[(0,a._)("div",h,[w,(0,a._)("div",_,[(0,a.Wm)(F,{url:"saiv/casos/indexSelect",modelValue:o.codigoCaso,"onUpdate:modelValue":e[3]||(e[3]=e=>o.codigoCaso=e)},null,8,["modelValue"])])])])])),"nuevo-button":(0,a.w5)((()=>[!o.showVer??1?((0,a.wg)(),(0,a.iD)("button",{key:0,onClick:e[4]||(e[4]=(...e)=>o.handleChangedIntercambiarForm&&o.handleChangedIntercambiarForm(...e)),type:"button",class:"btn btn-secondary m-1",disabled:o.loading},[y,(0,a.Uk)(" Volver al Seguimiento Jurídico ")],8,V)):(0,a.kq)("",!0)])),_:1},512),[[s.F8,!o.intercambiarForm]])])),_:1})])),_:1},8,["onHandleActualizarDatosTabla"])])}var C=l(4870),N=l(4239),A=(l(8419),l(4876)),k=l(2589),F=l(1339);const U={class:"card clearfix"},H={class:"card-body"},T={action:""},D={class:"row py-1 gy-2 mt-1 border border-2 border-primary rounded-3"},W=(0,a._)("div",{class:"col-md-12 mt-2"},[(0,a._)("h3",{class:"align-text-bottom"},[(0,a._)("i",{class:"bx bxs-certification bx-md"}),(0,a.Uk)("Ludoteca")])],-1),M={class:"col-md-3"},S=(0,a._)("label",{class:"fw-semibold d-block",for:"seguimiento-juridico-n-de-caso"},"Codigo de caso ",-1),R={class:"col-md-12"},Z=(0,a._)("label",{class:"fw-semibold d-block"},[(0,a._)("i",{class:"bx bx-caret-right"}),(0,a.Uk)(" Nombre del Niña, Niño o Adolescente")],-1),L={class:"col-md-6"},I=(0,a._)("label",{class:"fw-semibold d-block",for:"fecha-nacimiento"},"Fecha de Nacimiento",-1),j={class:"row"},z={class:"col-md-6"},O={class:"input-group"},E=(0,a._)("span",{class:"input-group-text fw-bold text-primary",for:"fecha-nacimiento"},"Fecha:",-1),B=["readonly","disabled"],J={class:"col-md-6"},q={class:"input-group"},K=(0,a._)("span",{class:"input-group-text fw-bold text-primary",for:"edad"},"Edad:",-1),P={class:"col-md-6"},Y=(0,a._)("label",{class:"fw-semibold d-block",for:"nombre-responsable"},"Nombre de la Madre o Responsable",-1),G=["disabled"],Q={class:"col-md-3"},X=(0,a._)("label",{class:"fw-semibold d-block",for:"dui-responsable"},"Dui del Responsable",-1),$=["disabled"],oo={class:"col-md-2"},eo=(0,a._)("label",{class:"fw-semibold d-block",for:"telefono-movil"}," Tel. Móvil",-1),lo={class:"input-group input-group-merge"},ao=["id"],io=(0,a._)("i",{class:"bx bx-phone"},null,-1),so=[io],no=["readonly","disabled","id","value"],ro={class:"col-md-2"},co=(0,a._)("label",{class:"fw-semibold d-block",for:"'tel-casa'"},"Tel. Casa",-1),to={class:"input-group input-group-merge"},uo=(0,a._)("span",{id:"",class:"input-group-text"},[(0,a._)("i",{class:"bx bx-phone"})],-1),mo=["readonly","value"],po=(0,a.uE)('<div class="col-md-6"><label class="fw-semibold d-block" for="violencia">Violencia</label></div><div class="col-md-12"><label class="fw-semibold d-block" for="atencion-menores">Tipo de Atención a Menores</label><div class="row"><div class="col-md-6"><div class="input-group"><span class="input-group-text fw-bold text-primary" for="atencion-menores">Atención:</span><select name="" id="atencion-menores" class="form-select"><option value="">Seleccione</option></select></div></div><div class="col-md-6"><div class="input-group"><span class="input-group-text fw-bold text-primary" for="fecha-hora-atencion">Fecha y Hora:</span><input type="datetime-local" class="form-select" id="fecha-hora-atencion"></div></div></div></div><div class="col-md-12"><label class="fw-semibold d-block" for="atencion-menores">Tipo de Atención a Menores</label><div class="row"><div class="col-md-6"><div class="input-group"><label class="input-group-text fw-bold text-primary" for="atencion-menores">Atención:</label></div></div><div class="col-md-6"></div></div></div>',3);function bo(o,e,l,n,r,d){const c=(0,a.up)("v-select"),t=(0,a.up)("FormSelectOpcionVue"),u=(0,a.up)("FormNombreApellidoVue"),m=(0,a.up)("Label"),p=(0,a.up)("ButtonsFormVue");return(0,a.wg)(),(0,a.iD)("div",U,[(0,a._)("div",H,[(0,a._)("form",T,[(0,a._)("div",D,[W,(0,a._)("div",M,[S,(0,a._)("div",R,[(0,a.Wm)(c,{multiple:"",placeholder:"Seleccione",style:(0,i.j5)(o.vue_style_select),id:"seguimiento-juridico-n-de-caso",disabled:o.showVer??!1,modelValue:o.formulario.codigoCaso,"onUpdate:modelValue":e[0]||(e[0]=e=>o.formulario.codigoCaso=e),options:[]},null,8,["style","disabled","modelValue"])])]),(0,a.Wm)(t,{id:"-tipo-violencia",nombre:"Tipo de violencia",opciones:["Vacío"],clases:["col-md-3","col-md-auto"],loading:o.loading,showVer:o.showVer??!1,opcion:o.formulario.tipoViolencia,"onUpdate:opcion":e[1]||(e[1]=e=>o.formulario.tipoViolencia=e)},null,8,["loading","showVer","opcion"]),Z,(0,a.Wm)(u,{showVer:o.showVer??!1,persona:"niño/a o adolencente",primerNombre:o.formulario.primerNombreNiñoAdolecente,"onUpdate:primerNombre":e[2]||(e[2]=e=>o.formulario.primerNombreNiñoAdolecente=e),segundoNombre:o.formulario.segundoNombreNiñoAdolecente,"onUpdate:segundoNombre":e[3]||(e[3]=e=>o.formulario.segundoNombreNiñoAdolecente=e),primerApellido:o.formulario.primerApellidoNiñoAdolecente,"onUpdate:primerApellido":e[4]||(e[4]=e=>o.formulario.primerApellidoNiñoAdolecente=e),segundoApellido:o.formulario.segundoApellidoNiñoAdolecente,"onUpdate:segundoApellido":e[5]||(e[5]=e=>o.formulario.segundoApellidoNiñoAdolecente=e)},null,8,["showVer","primerNombre","segundoNombre","primerApellido","segundoApellido"]),(0,a._)("div",L,[I,(0,a._)("div",j,[(0,a._)("div",z,[(0,a._)("div",O,[E,(0,a.wy)((0,a._)("input",{readonly:o.showVer??!1,disabled:o.loading,"onUpdate:modelValue":e[6]||(e[6]=e=>o.formulario.fechaNacimiento=e),type:"date",class:"form-control",id:"fecha-nacimiento",placeholder:"Ingrese"},null,8,B),[[s.nr,o.formulario.fechaNacimiento]])])]),(0,a._)("div",J,[(0,a._)("div",q,[K,(0,a.Wm)(m,{class:"form-control text-primary",id:"edad"})])])])]),(0,a.Wm)(t,{id:"escolaridad",nombre:"Escolaridad",opciones:["Vacío"],clases:["col-md-6","col-md-auto"],loading:o.loading,showVer:o.showVer??!1,opcion:o.formulario.escolaridad,"onUpdate:opcion":e[7]||(e[7]=e=>o.formulario.escolaridad=e)},null,8,["loading","showVer","opcion"]),(0,a._)("div",P,[Y,(0,a.wy)((0,a._)("input",{id:"nombre-responsable",type:"text",class:"form-control","onUpdate:modelValue":e[8]||(e[8]=e=>o.formulario.responsable=e),disabled:o.loading||(o.showVer??!1),placeholder:"Ingrese"},null,8,G),[[s.nr,o.formulario.responsable]])]),(0,a._)("div",Q,[X,(0,a.wy)((0,a._)("input",{id:"dui-responsable",type:"text",class:"form-control","onUpdate:modelValue":e[9]||(e[9]=e=>o.formulario.duiResponsable=e),disabled:o.loading||(o.showVer??!1),placeholder:"Ingrese"},null,8,$),[[s.nr,o.formulario.duiResponsable]])]),(0,a.Wm)(t,{id:"area",nombre:"Area",opciones:["Vacío"],clases:["col-md-3","col-md-auto"],loading:o.loading,showVer:o.showVer??!1,opcion:o.formulario.area,"onUpdate:opcion":e[10]||(e[10]=e=>o.formulario.area=e)},null,8,["loading","showVer","opcion"]),(0,a._)("div",oo,[eo,(0,a._)("div",lo,[(0,a._)("span",{id:o.id+"-telefono-movil-span",class:"input-group-text"},so,8,ao),(0,a._)("input",{readonly:o.showVer??!1,disabled:o.loading,type:"text",id:o.id+"-telefono-movil",class:"form-control phone-mask",value:o.formulario.telefonoMovil,onInput:e[11]||(e[11]=e=>o.updateCampo(e,"telefonoMovil"))},null,40,no)])]),(0,a.Wm)(t,{id:"'tel-empresa-movil'",nombre:"Empresa Tel. Móvil",opciones:[],clases:["col-md-2"],loading:o.loading,showVer:o.showVer??!1,opcion:o.formulario.empresa},null,8,["nombre","loading","showVer","opcion"]),(0,a._)("div",ro,[co,(0,a._)("div",to,[uo,(0,a._)("input",{readonly:o.showVer??!1,type:"text",id:"'tel-casa'",class:"form-control phone-mask",value:o.formulario.telefonoCasa,onInput:e[12]||(e[12]=e=>o.updateCampo(e,"telefonoCasa"))},null,40,mo)])]),po]),(0,a.Wm)(p,{showAnt:!1,showSig:!1})])])])}var fo=l(7661),go=l(6411),vo=l(7472),ho=(0,a.aZ)({props:["showVer"],components:{ButtonsFormVue:vo.Z,FormSelectOpcionVue:fo.Z,FormNombreApellidoVue:go.Z},setup(){const o=(0,C.iH)(!1),e=(0,C.iH)(!1),l={key:null,codigoCaso:null,tipoViolencia:null,"primerNombreNiñoAdolecente":null,"segundoNombreNiñoAdolecente":null,"primerApellidoNiñoAdolecente":null,"segundoApellidoNiñoAdolecente":null,fechaNacimiento:null,escolaridad:null,responsable:null,duiResponsable:null,area:null,telefonoMovil:null,empresaMovil:null,telefonoCasa:null,violencia:[]},a=(0,C.qj)(JSON.parse(JSON.stringify(l)));return{loading:o,showVer:e,formulario:a,vue_style_select:"--vs-font-size: 0.9375rem;"}}}),wo=l(89);const _o=(0,wo.Z)(ho,[["render",bo]]);var Vo=_o;const yo=[{nombre:"Codigo",class:"text-center bg-primary text-white fw-bold",key:"codigo",style:""}],xo="saiv/seguimiento/juridico/index";var Co=(0,a.aZ)({watch:{codigoCaso:async function(o){"object"===typeof o&&null!==o?await this.cargarCaso(o):this.resetFormCaso()}},setup(o){const e=(0,C.iH)(!1),l=(0,C.iH)(!1),a=(0,C.iH)([]),i=(0,C.iH)("Todos"),s=(0,C.iH)(null),n=(0,C.iH)(!0),r=(0,C.iH)(null),d=o=>{e.value=o},c=o=>{a.value=o},t=()=>{l.value=null,s.value.showModal()};return{modalLudotecaRef:s,intercambiarForm:n,codigoCaso:r,urlTabla:xo,columnas:yo,tipoCaso:i,showVer:l,loading:e,store:N.Z,handleChangedLoading:d,handleChangedData:c,handleClickNuevo:t}},components:{FormCasoVue:A.Z,ModalVue:k.Z,TableVue:F.Z,Form:Vo}});const No=(0,wo.Z)(Co,[["render",x]]);var Ao=No}}]);
//# sourceMappingURL=270.e2606d7c.js.map