"use strict";(self["webpackChunkvue"]=self["webpackChunkvue"]||[]).push([[959],{4821:function(e,o,i){i.d(o,{Z:function(){return p}});var a=i(3396),l=i(7139);const n={class:"pagination"},r=["onClick"],d=["onClick"];function c(e,o,i,c,s,t){const u=(0,a.up)("v-select");return(0,a.wg)(),(0,a.j4)(u,{value:e.value,options:e.data,loading:e.loading,disabled:e.disabled??!1,filterable:!1,onSearch:e.onSearch,onInput:o[0]||(o[0]=o=>e.inputValue(o))},{"list-footer":(0,a.w5)((()=>[(0,a._)("li",n,[((0,a.wg)(!0),(0,a.iD)(a.HY,null,(0,a.Ko)(e.links,((o,i)=>((0,a.wg)(),(0,a.iD)(a.HY,{key:i},["Siguiente"===e.linkLabel(o)||"Anterior"===e.linkLabel(o)?((0,a.wg)(),(0,a.iD)("button",{key:0,onClick:i=>e.HandleClick(o),type:"button",class:(0,l.C_)([[o.active&&!e.loading?"active":null,o.url&&!e.loading?"":"disabled"],"btn btn-primary mx-2"])},[(0,a._)("strong",null,[(0,a._)("i",{class:(0,l.C_)(["tf-icon bx",{"bx-chevrons-right":"Siguiente"===e.linkLabel(o),"bx-chevrons-left":"Anterior"===e.linkLabel(o)}])},null,2)])],10,r)):(0,a.kq)("",!0),"1"===e.linkLabel(o)?((0,a.wg)(),(0,a.iD)("button",{key:1,onClick:i=>e.HandleClick(o),type:"button",class:(0,l.C_)([["disabled"],"btn btn-outline-primary mx-2"])},[(0,a._)("strong",null,(0,l.zw)(e.registros),1)],8,d)):(0,a.kq)("",!0)],64)))),128))])])),_:1},8,["value","options","loading","disabled","onSearch"])}var s=i(4870),t=(0,a.aZ)({props:["url","filtro","value","registros","links","data","loading","disabled"],setup(e,{emit:o}){(0,s.iH)(e.url);const i=e=>e.label.includes("ext")?"Siguiente":e.label.includes("revious")?"Anterior":e.label,a=async e=>{e.url&&o("setUrlSelect",e.url)},l=e=>{let i="Seleccione"===e.target.value?null:e.target.value;o("input:value",i)},n=async e=>{o("changeVariablesBusqueda",e),o("resetUrlSelect")};return{HandleClick:a,inputValue:l,linkLabel:i,onSearch:n}}}),u=i(89);const m=(0,u.Z)(t,[["render",c],["__scopeId","data-v-6b0da6b8"]]);var p=m},9220:function(e,o,i){i.d(o,{Z:function(){return v}});var a=i(3396),l=i(7139);const n={class:"p-2 rounded-2 border border-primary border-2"},r={class:""},d={class:"mt-3 float-end"},c=["disabled"],s=(0,a._)("i",{class:"bx bx-exit"},null,-1),t=["disabled"];function u(e,o,i,u,m,p){return(0,a.wg)(),(0,a.iD)("div",n,[(0,a._)("h4",r,(0,l.zw)(e.mensaje),1),(0,a._)("div",d,[(0,a._)("button",{type:"button",class:"btn btn-secondary m-1",disabled:e.loading??!1,"data-bs-dismiss":"modal"},[s,(0,a.Uk)(" Salir")],8,c),(0,a._)("button",{type:"button",class:"btn btn-primary m-1","data-bs-dismiss":"modal",onClick:o[0]||(o[0]=()=>{e.$emit("continuar",e.json.key)}),disabled:e.loading??!1},[(0,a._)("i",{class:(0,l.C_)(["bx",{"bx-check":!e.loading,"bx-spin bx-loader":e.loading}])},null,2),(0,a.Uk)(" Continuar ")],8,t)])])}var m=i(4870),p=(0,a.aZ)({props:["mensaje","loading"],setup:(e,{emit:o})=>{const i=(0,m.iH)(null),a=e=>{console.log(e.key),i.value=e};return{json:i,setJson:a}}}),b=i(89);const g=(0,b.Z)(p,[["render",u]]);var v=g},6824:function(e,o,i){i.r(o),i.d(o,{default:function(){return Eo}});var a=i(3396),l=i(7139),n=i(9242);const r=e=>((0,a.dD)("data-v-08454831"),e=e(),(0,a.Cn)(),e),d={class:"container flex-grow-1 container-p-y"},c={class:"fw-bold py-3 mb-4"},s={class:"text-muted fw-light text-center"},t={class:"card"},u={class:"card-body"},m={class:"col-sm-12 col-md-12 m-1 col-lg-3"},p={class:"input-group border-primary flex justify-content-end"},b=r((()=>(0,a._)("span",{class:"input-group-text border-primary bg-primary text-white text-center border-white",for:"tipo-caso"},[(0,a.Uk)("Tipo Caso"),(0,a._)("i",{class:"bx bxs-label"})],-1))),g=["value"],v=["disabled"],h=r((()=>(0,a._)("i",{class:"bx bx-plus",style:{"font-size":"20px"}},null,-1))),f={class:"text-nowrap fw-bold"},w={class:"text-nowrap text-center"},V={class:"badge fw-bold bg-label-secondary me-1"},y={class:"text-nowrap"},C={class:"text-nowrap"},S={class:"text-nowrap"},_={id:"acciones",style:{padding:"0%"},class:"text-center"},x={class:"col-md-6"},k={class:"fw-semibold d-block",for:"caso-tipo-hecho"},D={key:0,class:"bx bx-search bx-sm"},A={class:"col-md"},F={key:1,class:"form-control text-primary fw-bold"},U=["disabled"],H=r((()=>(0,a._)("i",{class:"bx bx-transfer-alt bx-sm"},null,-1))),R={class:"row pb-2 pt-2 border border-2 border-primary rounded"},j={class:"col-md-6"},B={class:"fw-semibold d-block",for:"caso-tipo-hecho"},P={key:0,class:"bx bx-search bx-sm"},M={class:"col-md"},z={key:1,class:"form-control text-primary fw-bold"},O=["disabled"],W=r((()=>(0,a._)("i",{class:"bx bx-transfer-alt bx-sm"},null,-1)));function J(e,o,i,r,J,I){const Z=(0,a.up)("AccionesTable"),N=(0,a.up)("TableVue"),T=(0,a.up)("vSelectPaginationVue"),E=(0,a.up)("Form"),L=(0,a.up)("FormCasoVue"),q=(0,a.up)("ModalVue"),K=(0,a.up)("AdvertenciaVue");return(0,a.wg)(),(0,a.iD)("div",d,[(0,a._)("h4",c,[(0,a._)("span",s,"SAIV"+(0,l.zw)(e.store.state.USUARIO.oficina)+" /",1),(0,a.Uk)(" Seguimiento Jurídico ")]),(0,a._)("div",t,[(0,a._)("div",u,[(0,a.Wm)(N,{ref:"tablaSeguimientoJuridicoRef",columnas:e.columnas,url:e.urlTabla,onHandleChangedLoading:e.handleChangedLoading,onHandleChangedData:e.handleChangedData},{col:(0,a.w5)((()=>[(0,a._)("div",m,[(0,a._)("div",p,[b,(0,a.wy)((0,a._)("select",{class:"form-select bg-primary text-white",id:"tipo-caso","onUpdate:modelValue":o[0]||(o[0]=o=>e.tipoCaso=o),onChange:o[1]||(o[1]=o=>e.tablaSeguimientoJuridicoRef.handleChangeFiltro(e.tipoCaso))},[((0,a.wg)(),(0,a.iD)(a.HY,null,(0,a.Ko)(["Todos","Denuncia","Sin Denuncia"],(e=>(0,a._)("option",{class:"bg-primary text-white",value:e},(0,l.zw)(e),9,g))),64))],544),[[n.bM,e.tipoCaso]])])])])),button:(0,a.w5)((()=>[(0,a._)("button",{class:"btn btn-primary m-1 justify-items-start",onClick:o[2]||(o[2]=(...o)=>e.handleClickNuevo&&e.handleClickNuevo(...o)),disabled:e.loading},[h,(0,a.Uk)(" Nuevo ")],8,v)])),tbody:(0,a.w5)((()=>[((0,a.wg)(!0),(0,a.iD)(a.HY,null,(0,a.Ko)(e.data,((o,i)=>((0,a.wg)(),(0,a.iD)("tr",{key:i},[(0,a._)("td",f,[(0,a._)("span",null,(0,l.zw)(o.codigo),1)]),(0,a._)("td",w,[(0,a._)("span",V,(0,l.zw)(o.tipoServicio??"No seleccionado"),1)]),(0,a._)("td",y,(0,l.zw)(o.tipoServicioFechaHora??"No seleccionado"),1),(0,a._)("td",C,(0,l.zw)(o.cierreExpedienteHoraFecha??"No seleccionado"),1),(0,a._)("td",S,(0,l.zw)(o.cierreExpediente??"No seleccionado"),1),(0,a._)("td",_,[(0,a.Wm)(Z,{json:o,loading:e.loading,showEditar:!0,showBorrar:!0,showVer:!0,onHandleClickVer:i=>e.handleClickVer(o),onHandleClickEditar:i=>e.handleClickEditar(o),onHandleClickBorrar:i=>e.handleClickBorrar(o)},null,8,["json","loading","onHandleClickVer","onHandleClickEditar","onHandleClickBorrar"])])])))),128))])),_:1},8,["columnas","url","onHandleChangedLoading","onHandleChangedData"])])]),(0,a.Wm)(q,{ref:"modalSeguimientoJuridicoRef",onHandleActualizarDatosTabla:e.handleActualizarDatos},{cardBody:(0,a.w5)((()=>[(0,a.Wm)(n.uT,{name:"fade"},{default:(0,a.w5)((()=>[(0,a.wy)((0,a.Wm)(E,{ref:"formSeguimientoJuridicoRef",loading:e.loading,showVer:e.showVer??!1},{"codigo-caso":(0,a.w5)((()=>[(0,a._)("div",x,[(0,a._)("label",k,[(0,a.Uk)((0,l.zw)(e.showVer||e.existKey()?"Código del Caso":"Busqueda y Selección del Caso")+" ",1),e.showVer||e.existKey()?(0,a.kq)("",!0):((0,a.wg)(),(0,a.iD)("i",D))]),(0,a._)("div",A,[e.showVer||e.existKey()?((0,a.wg)(),(0,a.iD)("label",F,(0,l.zw)(null===e.codigoCaso||"undefined"===typeof e.codigoCaso?"No ingresado":e.codigoCaso.label),1)):((0,a.wg)(),(0,a.j4)(T,{key:0,loading:e.loadingSelect,data:e.dataSelect,url:"saiv/casos/indexSelect",links:e.linksSelect,registros:e.registrosSelect,disabled:e.existKey(),modelValue:e.codigoCaso,"onUpdate:modelValue":o[3]||(o[3]=o=>e.codigoCaso=o),onSetUrlSelect:e.setUrlSelect,onChangeVariablesBusqueda:e.changeVariablesBusqueda,onResetUrlSelect:e.resetUrlSelect},null,8,["loading","data","links","registros","disabled","modelValue","onSetUrlSelect","onChangeVariablesBusqueda","onResetUrlSelect"]))])])])),"nuevo-button":(0,a.w5)((()=>[(0,a._)("button",{onClick:o[4]||(o[4]=(...o)=>e.handleChangedIntercambiarForm&&e.handleChangedIntercambiarForm(...o)),type:"button",class:"btn btn-secondary m-1",disabled:e.loading},[H,(0,a.Uk)(" Ver Detalles del Caso ")],8,U)])),_:1},8,["loading","showVer"]),[[n.F8,e.intercambiarForm]])])),_:1}),(0,a.Wm)(n.uT,{name:"fade"},{default:(0,a.w5)((()=>[(0,a.wy)((0,a.Wm)(L,{showVer:!0,ref:"formCasoRef"},{"codigo-caso":(0,a.w5)((()=>[(0,a._)("div",R,[(0,a._)("div",j,[(0,a._)("label",B,[(0,a.Uk)((0,l.zw)(e.showVer||e.existKey()?"Código del Caso":"Busqueda y Selección del Caso")+" ",1),e.showVer||e.existKey()?(0,a.kq)("",!0):((0,a.wg)(),(0,a.iD)("i",P))]),(0,a._)("div",M,[e.showVer||e.existKey()?((0,a.wg)(),(0,a.iD)("label",z,(0,l.zw)(null===e.codigoCaso||"undefined"===typeof e.codigoCaso?"No ingresado":e.codigoCaso.label),1)):((0,a.wg)(),(0,a.j4)(T,{key:0,loading:e.loadingSelect,data:e.dataSelect,url:"saiv/casos/indexSelect",links:e.linksSelect,registros:e.registrosSelect,disabled:e.existKey(),modelValue:e.codigoCaso,"onUpdate:modelValue":o[5]||(o[5]=o=>e.codigoCaso=o),onChangeVariablesBusqueda:e.changeVariablesBusqueda,onResetUrlSelect:e.resetUrlSelect,onSetUrlSelect:e.setUrlSelect},null,8,["loading","data","links","registros","disabled","modelValue","onChangeVariablesBusqueda","onResetUrlSelect","onSetUrlSelect"]))])])])])),"nuevo-button":(0,a.w5)((()=>[(0,a._)("button",{onClick:o[6]||(o[6]=(...o)=>e.handleChangedIntercambiarForm&&e.handleChangedIntercambiarForm(...o)),type:"button",class:"btn btn-secondary m-1",disabled:e.loading},[W,(0,a.Uk)(" Volver al Seguimiento Jurídico ")],8,O)])),_:1},512),[[n.F8,!e.intercambiarForm]])])),_:1})])),_:1},8,["onHandleActualizarDatosTabla"]),(0,a.Wm)(q,{ref:"modalCasoBorrarRef"},{cardBody:(0,a.w5)((()=>[(0,a.Wm)(K,{ref:"advertenciaRef",mensaje:"El siguiente registro de Seguimiento Jurídico se borrara de la base de datos, ¿Continuar?",onContinuar:e.borrarSeguimientoJuridico},null,8,["onContinuar"])])),_:1},512)])}var I=i(4870),Z=i(4239),N=i(8419),T=i(4009),E=i(1426),L=i(2589),q=i(9570);const K=e=>((0,a.dD)("data-v-1ed2bb84"),e=e(),(0,a.Cn)(),e),G={class:"card clearfix"},Y={class:"card-body"},Q={action:""},$={class:"row py-1 gy-2 mt-1 border border-2 border-primary rounded-3"},X=K((()=>(0,a._)("div",{class:"col-md-12 mt-2"},[(0,a._)("h3",{class:"align-text-bottom"},[(0,a._)("i",{class:"bx bxs-certification bx-md"}),(0,a.Uk)("Seguimiento Jurídico")])],-1))),ee={class:"col-md-12"},oe=["for"],ie={class:"row"},ae={class:"col-md-6"},le={class:"col-md-6"},ne={class:"col-md-1"},re=["disabled"],de=K((()=>(0,a._)("i",{class:"bx bx-save bx-sm"},null,-1))),ce=[de],se={class:"col-md-1"},te=["disabled"],ue=K((()=>(0,a._)("i",{class:"bx bx-save bx-sm"},null,-1))),me=[ue],pe=K((()=>(0,a._)("h4",null,[(0,a._)("i",{class:"bx bxs-right-arrow"}),(0,a.Uk)(" Procesos")],-1))),be={class:"row gy-2 border-primary border-2 rounded-3 pb-2 border"},ge={class:"col-md-12"},ve=["for"],he={class:"row"},fe={class:"col-md-4"},we={class:"col-md-4"},Ve={class:"col-md-4"},ye={class:"input-group"},Ce=K((()=>(0,a._)("span",{class:"input-group-text fw-bold text-primary"},"Duración:",-1))),Se={class:"input-group-text fw-bold text-primary"},_e={class:"col-md-12"},xe=["for"],ke={class:"row"},De={class:"col-md-4"},Ae={class:"col-md-8"},Fe={class:"col-md-12"},Ue=["for"],He={class:"row"},Re={class:"col-md-4"},je={class:"col-md-8"},Be={class:"row gy-2 border-primary border-2 rounded-3 pb-2 border"},Pe={class:"col-md-12"},Me=["for"],ze={class:"row"},Oe={class:"col-md-4 my-md-auto"},We={class:"col-md-8"},Je={class:"input-group"},Ie={key:0,class:"form-control fw-bold text-primary"},Ze=K((()=>(0,a._)("span",{class:"input-group-text fw-bold text-primary"},"Acuerdo Obtenido:",-1))),Ne={class:"col-md-12"},Te=["for"],Ee={class:"row"},Le={class:"col-md-4 my-md-auto"},qe={class:"col-md-8"},Ke={class:"input-group"},Ge={key:0,class:"form-control fw-bold text-primary"},Ye=K((()=>(0,a._)("span",{class:"input-group-text fw-bold text-primary"},"Resolución obtenida:",-1))),Qe={class:"col-md-12"},$e=["for"],Xe={class:"row"},eo={class:"col-md-4 my-md-auto"},oo={class:"col-md-8"},io={class:"input-group"},ao={key:0,class:"form-control fw-bold text-primary"},lo=K((()=>(0,a._)("span",{class:"input-group-text fw-bold text-primary"},"Resolución obtenida:",-1))),no={class:"row gy-2 border-primary border-2 rounded-3 pb-2 border"},ro={class:"col-md-8"},co=K((()=>(0,a._)("label",{class:"fw-semibold d-block",for:""},"Delitos LEIV ",-1))),so={class:"col-md-1"},to=["disabled"],uo=K((()=>(0,a._)("i",{class:"bx bx-save bx-sm"},null,-1))),mo=[uo],po={class:"col-md-1"},bo=["disabled"],go=K((()=>(0,a._)("i",{class:"bx bx-save bx-sm"},null,-1))),vo=[go],ho={class:"row gy-2 border-primary border-2 rounded-3 pb-2 border"},fo={class:"row gy-2 border-primary border-2 rounded-3 pb-2 border"},wo={class:"col-md-12"},Vo=["for"],yo={class:"row"},Co={class:"col-md"},So={class:"col-md"},_o=K((()=>(0,a._)("h4",null,[(0,a._)("i",{class:"bx bxs-right-arrow"}),(0,a.Uk)(" Cierre de Expediente")],-1))),xo={class:"row"},ko={class:"px-2"};function Do(e,o,i,r,d,c){const s=(0,a.up)("FormSelectOpcionVue"),t=(0,a.up)("FormInputVue"),u=(0,a.up)("labelShowVer"),m=(0,a.up)("v-select"),p=(0,a.up)("TabsVue"),b=(0,a.up)("AlertVue"),g=(0,a.up)("ButtonsFormVue");return(0,a.wg)(),(0,a.iD)("div",G,[(0,a._)("div",Y,[(0,a._)("form",Q,[(0,a._)("div",$,[X,(0,a.WI)(e.$slots,"codigo-caso",{},void 0,!0),(0,a.Wm)(s,{id:e.id+"-tipo-servicio",nombre:"Servicio que Remite",opciones:null===e.opciones?[]:e.opciones.servicioQueRemite,clases:["col-md-2"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.servicioQueRemite,"onUpdate:opcion":o[0]||(o[0]=o=>e.formulario.servicioQueRemite=o)},null,8,["id","opciones","loading","showVer","opcion"]),(0,a.Wm)(s,{id:e.id+"-atencion-brindada",nombre:"Atención Brindada",opciones:null===e.opciones?[]:e.opciones.atencionBrindada,clases:["col-md-4"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.atencionBrindada,"onUpdate:opcion":o[1]||(o[1]=o=>e.formulario.atencionBrindada=o),onChange:o[2]||(o[2]=o=>{e.existInArrayAtencionBrindada(e.formulario.atencionBrindadaSubMenu)||(e.formulario.atencionBrindadaSubMenu=null)})},null,8,["id","opciones","loading","showVer","opcion"]),(0,a.wy)((0,a.Wm)(s,{id:e.id+"-atencion-brindada-sub-menu",nombre:"Atención Brindada (Sub Menú)",opciones:e.atencionBrindadaSubMenu,clases:["col-md-4"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.atencionBrindadaSubMenu,"onUpdate:opcion":o[3]||(o[3]=o=>e.formulario.atencionBrindadaSubMenu=o),onChange:o[4]||(o[4]=o=>{e.handleShowAtencionBrindadaOtro(),null===e.formulario.atencionBrindadaSubMenu&&(e.formulario.atencionBrindadaOtro=null)})},null,8,["id","nombre","opciones","loading","showVer","opcion"]),[[n.F8,e.atencionBrindadaSubMenu.length>0]]),(0,a.wy)((0,a.Wm)(t,{id:e.id+"-familia-demanda-otro",titulo:"Atención Brindada Otro (Especifique)",loading:e.loading,showVer:e.showVer,clases:["col-md"],value:e.formulario.atencionBrindadaOtro,"onUpdate:value":o[5]||(o[5]=o=>e.formulario.atencionBrindadaOtro=o)},null,8,["id","titulo","loading","showVer","value"]),[[n.F8,e.showAtencionBrindadaOtro]]),(0,a._)("div",ee,[(0,a._)("label",{class:"fw-semibold d-block",for:e.id+"-servicio"},"Tipo de Servicio",8,oe),(0,a._)("div",ie,[(0,a._)("div",ae,[(0,a.Wm)(s,{id:e.id+"-tipo-servicio",nombre:"Servicio:",opciones:null===e.opciones?[]:e.opciones.tipoServicio,clases:["input-group"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.tipoServicio,"onUpdate:opcion":o[6]||(o[6]=o=>e.formulario.tipoServicio=o)},null,8,["id","opciones","loading","showVer","opcion"])]),(0,a._)("div",le,[(0,a.Wm)(t,{id:e.id+"-tipo-servicio-fecha-hora",titulo:"Fecha:",loading:e.loading,showVer:e.showVer,type:"datetime-local",clases:["input-group"],value:e.formulario.tipoServicioFechaHora,"onUpdate:value":o[7]||(o[7]=o=>e.formulario.tipoServicioFechaHora=o)},null,8,["id","loading","showVer","value"])])])]),(0,a.Wm)(s,{id:"-tipo-violencia",nombre:"Tipo de Violencia",opciones:null===e.opciones?[]:e.opciones.tipoViolencia,clases:["col-md-5"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.tipoViolencia,"onUpdate:opcion":o[8]||(o[8]=o=>e.formulario.tipoViolencia=o)},null,8,["opciones","loading","showVer","opcion"]),(0,a._)("div",ne,[(0,a.Uk)("     "),e.showVer?(0,a.kq)("",!0):((0,a.wg)(),(0,a.iD)("button",{key:0,type:"button",class:"btn btn-primary btn-block",disabled:null===e.formulario.codigoCaso||e.loading,onClick:o[9]||(o[9]=o=>e.actualizarOpcion("tipoViolencia",e.formulario.tipoViolencia))},ce,8,re))]),(0,a.Wm)(s,{id:e.id+"-modalidad-violencia",nombre:"Modalidad de Violencia",opciones:null===e.opciones?[]:e.opciones.modalidadViolencia,clases:["col-md-4","mb-3"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.modalidadViolencia,"onUpdate:opcion":o[10]||(o[10]=o=>e.formulario.modalidadViolencia=o)},null,8,["id","opciones","loading","showVer","opcion"]),(0,a._)("div",se,[(0,a.Uk)("     "),e.showVer?(0,a.kq)("",!0):((0,a.wg)(),(0,a.iD)("button",{key:0,type:"button",class:"btn btn-primary btn-block",disabled:null===e.formulario.codigoCaso||e.loading,onClick:o[11]||(o[11]=o=>e.actualizarOpcion("modalidadViolencia",e.formulario.modalidadViolencia))},me,8,te))]),pe,(0,a.Wm)(p,{tabs:e.tabs0,onSelectedTab:e.selectedTab0},{"violencia-intrafamiliar":(0,a.w5)((()=>[(0,a._)("div",be,[(0,a._)("div",ge,[(0,a._)("label",{class:"fw-semibold d-block",for:e.id+"-fechaNacimiento"},"Medidas de Protección",8,ve),(0,a._)("div",he,[(0,a._)("div",fe,[(0,a.Wm)(t,{id:e.id+"-medidas-proteccion-desde",titulo:"Desde:",loading:e.loading,showVer:e.showVer,type:"date",clases:["input-group"],value:e.formulario.medidasProteccionInicio,"onUpdate:value":o[12]||(o[12]=o=>e.formulario.medidasProteccionInicio=o)},null,8,["id","loading","showVer","value"])]),(0,a._)("div",we,[(0,a.Wm)(t,{id:e.id+"-medidas-proteccion-desde",titulo:"Desde:",loading:e.loading,showVer:e.showVer,type:"date",clases:["input-group"],value:e.formulario.medidasProteccionFinal,"onUpdate:value":o[13]||(o[13]=o=>e.formulario.medidasProteccionFinal=o)},null,8,["id","loading","showVer","value"])]),(0,a._)("div",Ve,[(0,a._)("div",ye,[Ce,(0,a._)("span",Se,(0,l.zw)(e.calcularDiasFechas(e.formulario.medidasProteccionInicio,e.formulario.medidasProteccionFinal))+" Dias ",1)])])])]),(0,a._)("div",_e,[(0,a._)("label",{class:"fw-semibold d-block",for:e.id+"-audiencia-preliminar-fecha"},"Audiencia Preliminar Juzgado",8,xe),(0,a._)("div",ke,[(0,a._)("div",De,[(0,a.Wm)(t,{id:e.id+"-audiencia-preliminar-fecha",titulo:"Fecha:",loading:e.loading,showVer:e.showVer,type:"datetime-local",clases:["input-group"],value:e.formulario.audienciaPreliminar,"onUpdate:value":o[14]||(o[14]=o=>e.formulario.audienciaPreliminar=o)},null,8,["id","loading","showVer","value"])]),(0,a._)("div",Ae,[(0,a.Wm)(s,{id:"-audiencia-preliminar-resolucion",nombre:"Resolución Obtenida:",opciones:null===e.opciones?[]:e.opciones.audienciaPreliminarResolucion,clases:["input-group"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.audienciaPreliminarResolucion,"onUpdate:opcion":o[15]||(o[15]=o=>e.formulario.audienciaPreliminarResolucion=o)},null,8,["opciones","loading","showVer","opcion"])])])]),(0,a._)("div",Fe,[(0,a._)("label",{class:"fw-semibold d-block",for:e.id+"-audiencia-publica-fecha"},"Audiencia Pública",8,Ue),(0,a._)("div",He,[(0,a._)("div",Re,[(0,a.Wm)(t,{id:e.id+"-audiencia-publica-fecha",titulo:"Fecha:",loading:e.loading,showVer:e.showVer,type:"datetime-local",clases:["input-group"],value:e.formulario.audienciaPublica,"onUpdate:value":o[16]||(o[16]=o=>e.formulario.audienciaPublica=o)},null,8,["id","loading","showVer","value"])]),(0,a._)("div",je,[(0,a.Wm)(s,{id:"-audiencia-publica-resolucion",nombre:"Resolución Obtenida:",opciones:null===e.opciones?[]:e.opciones.audienciaPublicaResolucion,clases:["input-group"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.audienciaPublicaResolucion,"onUpdate:opcion":o[17]||(o[17]=o=>e.formulario.audienciaPublicaResolucion=o)},null,8,["opciones","loading","showVer","opcion"])])])])])])),familia:(0,a.w5)((()=>[(0,a._)("div",Be,[(0,a.Wm)(s,{id:e.id+"-familia-demanda",nombre:"Demanda",opciones:null===e.opciones?[]:e.opciones.familiaDemanda,clases:["col-md-4"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.familiaDemanda,"onUpdate:opcion":o[18]||(o[18]=o=>e.formulario.familiaDemanda=o),onChange:o[19]||(o[19]=o=>e.resetVariablesForm("familiaDemanda","familiaDemandaOtro","Otro"))},null,8,["id","opciones","loading","showVer","opcion"]),(0,a.wy)((0,a.Wm)(t,{id:e.id+"-familia-demanda-otro",titulo:"Otro Tipo Demanda (Especifique)",loading:e.loading,showVer:e.showVer,clases:["col-md-4"],value:e.formulario.familiaDemandaOtro,"onUpdate:value":o[20]||(o[20]=o=>e.formulario.familiaDemandaOtro=o)},null,8,["id","titulo","loading","showVer","value"]),[[n.F8,"Otro"===e.formulario.familiaDemanda]]),(0,a._)("div",Pe,[(0,a._)("label",{class:"fw-semibold d-block",for:e.id+"-procuraduria-fecha-hora"},"Procuraduría General de la República",8,Me),(0,a._)("div",ze,[(0,a._)("div",Oe,[(0,a.Wm)(t,{id:e.id+"-procuraduria-fecha-hora",titulo:"Fecha:",loading:e.loading,showVer:e.showVer,type:"datetime-local",clases:["input-group"],value:e.formulario.familiaProcuraduriaGeneralHoraFecha,"onUpdate:value":o[21]||(o[21]=o=>e.formulario.familiaProcuraduriaGeneralHoraFecha=o)},null,8,["id","loading","showVer","value"])]),(0,a._)("div",We,[(0,a._)("div",Je,[e.showVer?((0,a.wg)(),(0,a.iD)("label",Ie,(0,l.zw)(null===e.formulario.familiaProcuraduriaGeneralAcuerdo||""===e.formulario.familiaProcuraduriaGeneralAcuerdo.trim()?"No Ingresado":e.formulario.familiaProcuraduriaGeneralAcuerdo),1)):((0,a.wg)(),(0,a.iD)(a.HY,{key:1},[Ze,(0,a.wy)((0,a._)("textarea",{"onUpdate:modelValue":o[22]||(o[22]=o=>e.formulario.familiaProcuraduriaGeneralAcuerdo=o),class:"form-control",cols:"20",rows:"2",placeholder:"Ingrese Acuerdo"},null,512),[[n.nr,e.formulario.familiaProcuraduriaGeneralAcuerdo]])],64))])])])]),(0,a._)("div",Ne,[(0,a._)("label",{class:"fw-semibold d-block",for:e.id+"-juzgado-fecha-hora"},"Juzgado de Familia Audiencia Preliminar",8,Te),(0,a._)("div",Ee,[(0,a._)("div",Le,[(0,a.Wm)(t,{id:e.id+"-juzgado-fecha-hora",titulo:"Fecha:",loading:e.loading,showVer:e.showVer,type:"datetime-local",clases:["input-group"],value:e.formulario.familiaAudienciaPreliminarHoraFecha,"onUpdate:value":o[23]||(o[23]=o=>e.formulario.familiaAudienciaPreliminarHoraFecha=o)},null,8,["id","loading","showVer","value"])]),(0,a._)("div",qe,[(0,a._)("div",Ke,[e.showVer?((0,a.wg)(),(0,a.iD)("label",Ge,(0,l.zw)(null===e.formulario.familiaAudienciaPreliminarResolucion||""===e.formulario.familiaAudienciaPreliminarResolucion.trim()?"No Ingresado":e.formulario.familiaAudienciaPreliminarResolucion),1)):((0,a.wg)(),(0,a.iD)(a.HY,{key:1},[Ye,(0,a.wy)((0,a._)("textarea",{"onUpdate:modelValue":o[24]||(o[24]=o=>e.formulario.familiaAudienciaPreliminarResolucion=o),class:"form-control",cols:"20",rows:"2",placeholder:"Ingrese descripción"},null,512),[[n.nr,e.formulario.familiaAudienciaPreliminarResolucion]])],64))])])])]),(0,a._)("div",Qe,[(0,a._)("label",{class:"fw-semibold d-block",for:e.id+"-audiencia-sentencia-fecha-hora"},"Juzgado de Familia Audiencia de Sentencia",8,$e),(0,a._)("div",Xe,[(0,a._)("div",eo,[(0,a.Wm)(t,{id:e.id+"-audiencia-sentencia-fecha-hora",titulo:"Fecha:",loading:e.loading,showVer:e.showVer,type:"datetime-local",clases:["input-group"],value:e.formulario.familiaAudienciaSentenciaHoraFecha,"onUpdate:value":o[25]||(o[25]=o=>e.formulario.familiaAudienciaSentenciaHoraFecha=o)},null,8,["id","loading","showVer","value"])]),(0,a._)("div",oo,[(0,a._)("div",io,[e.showVer?((0,a.wg)(),(0,a.iD)("label",ao,(0,l.zw)(null===e.formulario.familiaAudienciaSentenciaResolucion||""===e.formulario.familiaAudienciaSentenciaResolucion.trim()?"No Ingresado":e.formulario.familiaAudienciaSentenciaResolucion),1)):((0,a.wg)(),(0,a.iD)(a.HY,{key:1},[lo,(0,a.wy)((0,a._)("textarea",{"onUpdate:modelValue":o[26]||(o[26]=o=>e.formulario.familiaAudienciaSentenciaResolucion=o),class:"form-control",cols:"20",rows:"2",placeholder:"Ingrese descripción"},"\r\n                                                    ",512),[[n.nr,e.formulario.familiaAudienciaSentenciaResolucion]])],64))])])])])])])),"violencia-contra-mujer":(0,a.w5)((()=>[(0,a._)("div",no,[(0,a._)("div",ro,[co,e.showVer?((0,a.wg)(),(0,a.j4)(u,{key:0,value:e.formulario.violenciaMujerDelitosLeiv},null,8,["value"])):((0,a.wg)(),(0,a.j4)(m,{key:1,multiple:"",placeholder:"Seleccione",options:null===e.opciones?[]:e.opciones.delitosLeivs,style:(0,l.j5)(e.vue_style_select),loading:e.loading,modelValue:e.formulario.violenciaMujerDelitosLeiv,"onUpdate:modelValue":o[27]||(o[27]=o=>e.formulario.violenciaMujerDelitosLeiv=o)},null,8,["options","style","loading","modelValue"]))]),(0,a._)("div",so,[(0,a.Uk)("     "),e.showVer?(0,a.kq)("",!0):((0,a.wg)(),(0,a.iD)("button",{key:0,type:"button",class:"btn btn-primary btn-block mb-2",disabled:null===e.formulario.codigoCaso||e.loading,onClick:o[28]||(o[28]=o=>e.actualizarOpcion("delitosLeivs",e.formulario.violenciaMujerDelitosLeiv))},mo,8,to))]),(0,a.Wm)(s,{id:e.id+"-delito-codigo-penal",nombre:"Delitos del Código Penal:",opciones:null===e.opciones?[]:e.opciones.delitoCodigoPenal,clases:["col-md-8"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.violenciaMujerCodigoPenal,"onUpdate:opcion":o[29]||(o[29]=o=>e.formulario.violenciaMujerCodigoPenal=o)},null,8,["id","opciones","loading","showVer","opcion"]),(0,a._)("div",po,[(0,a.Uk)("       "),e.showVer?(0,a.kq)("",!0):((0,a.wg)(),(0,a.iD)("button",{key:0,type:"button",class:"btn btn-primary btn-block",disabled:null===e.formulario.codigoCaso||e.loading,onClick:o[30]||(o[30]=o=>e.actualizarOpcion("codigoPenal",e.formulario.violenciaMujerCodigoPenal))},vo,8,bo))]),(0,a.Wm)(s,{id:e.id+"-violencia-diligencia",nombre:"Diligencia",opciones:null===e.opciones?[]:e.opciones.violenciaMujerDiligencia,clases:["col-md-8"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.violenciaMujerDiligencia,"onUpdate:opcion":o[31]||(o[31]=o=>e.formulario.violenciaMujerDiligencia=o)},null,8,["id","opciones","loading","showVer","opcion"]),(0,a.Wm)(s,{id:e.id+"-violencia-sede-diligencia",nombre:"Sede Judicial en que se Realizara la Diligencia",opciones:null===e.opciones?[]:e.opciones.violenciaMujerSedeJudicialDiligencia,clases:["col-md-8"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.violenciaMujerSedeJudicialDiligencia,"onUpdate:opcion":o[32]||(o[32]=o=>e.formulario.violenciaMujerSedeJudicialDiligencia=o)},null,8,["id","opciones","loading","showVer","opcion"]),(0,a.Wm)(s,{id:e.id+"-violencia-resolucion",nombre:"Resolución obtenida",opciones:null===e.opciones?[]:e.opciones.violenciaMujerResolucion,clases:["col-md-8"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.violenciaMujerResolucion,"onUpdate:opcion":o[33]||(o[33]=o=>e.formulario.violenciaMujerResolucion=o)},null,8,["id","opciones","loading","showVer","opcion"])])])),"derecho-niñes-adolescencia":(0,a.w5)((()=>[(0,a._)("div",ho,[(0,a.Wm)(s,{id:e.id+"-derechos-ninos-adolecentes",nombre:"Derechos de la Niñez y Adolescencia",opciones:null===e.opciones?[]:e.opciones.derechoNinesAdolecencia,clases:["col-md-6"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.derechoNinesAdolecencia,"onUpdate:opcion":o[34]||(o[34]=o=>e.formulario.derechoNinesAdolecencia=o),onChange:o[35]||(o[35]=o=>e.resetVariablesForm("derechoNinesAdolecencia","derechoNinesAdolecenciaVulneracion","Vulneración a Derechos"))},null,8,["id","opciones","loading","showVer","opcion"]),(0,a.wy)((0,a.Wm)(t,{id:e.id+"-derecho-nines-adolescencia-vulneracion",titulo:"Vulneración a Derechos (Especifique)",loading:e.loading,showVer:e.showVer,clases:["col-md"],value:e.formulario.derechoNinesAdolecenciaVulneracion,"onUpdate:value":o[36]||(o[36]=o=>e.formulario.derechoNinesAdolecenciaVulneracion=o)},null,8,["id","titulo","loading","showVer","value"]),[[n.F8,"Vulneración a Derechos"===e.formulario.derechoNinesAdolecencia]])])])),"referencia-servicios-saiv":(0,a.w5)((()=>[(0,a._)("div",fo,[(0,a._)("div",wo,[(0,a._)("label",{class:"fw-semibold d-block",for:e.id+"-referencia-servicios-saiv"}," Referencia a Servicios en la SAIV"+(0,l.zw)(e.store.state.USUARIO.oficina),9,Vo),(0,a._)("div",yo,[(0,a._)("div",Co,[(0,a.Wm)(s,{id:e.id+"-referencia-servicios-saiv",nombre:"Referencia:",opciones:null===e.opciones?[]:e.opciones.referenciaServicios,clases:["input-group"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.referenciaServicios,"onUpdate:opcion":o[37]||(o[37]=o=>e.formulario.referenciaServicios=o)},null,8,["id","opciones","loading","showVer","opcion"])]),(0,a._)("div",So,[(0,a.Wm)(t,{id:e.id+"-referencia-servicios-saiv-fecha-hora",titulo:"Fecha:",loading:e.loading,showVer:e.showVer,type:"datetime-local",clases:["input-group"],value:e.formulario.referenciaServiciosHoraFecha,"onUpdate:value":o[38]||(o[38]=o=>e.formulario.referenciaServiciosHoraFecha=o)},null,8,["id","loading","showVer","value"])])])])])])),_:1},8,["tabs","onSelectedTab"]),_o,(0,a._)("div",xo,[(0,a.Wm)(t,{id:e.id+"-cierre-expediente-fecha-hora",titulo:"Fecha:",loading:e.loading,showVer:e.showVer,type:"datetime-local",clases:["col-md-6"],value:e.formulario.cierreExpedienteHoraFecha,"onUpdate:value":o[39]||(o[39]=o=>e.formulario.cierreExpedienteHoraFecha=o)},null,8,["id","loading","showVer","value"]),(0,a.Wm)(s,{id:e.id+"-razon-cierre-expediente",nombre:"Razón del Cierre",opciones:null===e.opciones?[]:e.opciones.cierreExpediente,clases:["col-md-6","mb-3"],loading:e.loading,showVer:e.showVer??!1,opcion:e.formulario.cierreExpediente,"onUpdate:opcion":o[40]||(o[40]=o=>e.formulario.cierreExpediente=o)},null,8,["id","opciones","loading","showVer","opcion"])]),(0,a._)("div",ko,[(0,a.Wm)(b,{mensajesAlert:e.mensajesAlert,alert:e.tipoAlert},null,8,["mensajesAlert","alert"])])]),(0,a.Wm)(g,{showVer:e.showVer??!1,loading:e.loading,showSig:!1,showAnt:!1,onGuardar:e.guardar},{"nuevo-button":(0,a.w5)((()=>[(0,a.WI)(e.$slots,"nuevo-button",{},void 0,!0)])),_:3},8,["showVer","loading","onGuardar"])])])])}var Ao=i(1787),Fo=i(3590),Uo=i(7472),Ho=i(2366),Ro=i(4118),jo=i(1956),Bo=(0,a.aZ)({props:["showVer"],watch:{"formulario.atencionBrindada":async function(e){this.atencionBrindadaSubMenu=await N.Z.obtener("saiv/opciones/seguimiento/juridico/atencionBrindada/"+e),this.handleShowAtencionBrindadaOtro()}},setup(){const e={key:null,codigoCaso:null,atencionBrindada:null,atencionBrindadaSubMenu:null,atencionBrindadaOtro:null,codigoCaso:null,tipoServicioFechaHora:null,tipoServicio:null,tipoViolencia:null,modalidadViolencia:null,servicioQueRemite:null,medidasProteccionInicio:null,medidasProteccionFinal:null,audienciaPreliminar:null,audienciaPreliminarResolucion:null,audienciaPublica:null,audienciaPublicaResolucion:null,familiaProcuraduriaGeneralHoraFecha:null,familiaProcuraduriaGeneralAcuerdo:null,familiaAudienciaPreliminarHoraFecha:null,familiaAudienciaPreliminarResolucion:null,familiaAudienciaSentenciaHoraFecha:null,familiaAudienciaSentenciaResolucion:null,familiaDemanda:null,familiaDemandaOtro:null,violenciaMujerDiligencia:null,violenciaMujerCodigoPenal:null,violenciaMujerDelitosLeiv:[],violenciaMujerSedeJudicialDiligencia:null,violenciaMujerSedeJuzgadoDepartamento:null,violenciaMujerSedeJuzgadoMunicipio:null,violenciaMujerResolucion:null,derechoNinesAdolecencia:null,derechoNinesAdolecenciaVulneracion:null,referenciaServicios:null,referenciaServiciosHoraFecha:null,cierreExpediente:null,cierreExpedienteHoraFecha:null},o=(0,I.iH)(null),i=(0,I.iH)(null),l=(0,I.iH)(null),n=(0,I.iH)(!1),r=(0,I.iH)([]),d=(0,I.iH)(!1),c=(0,I.qj)(JSON.parse(JSON.stringify(e))),s=(0,I.iH)([{nombre:"Seguimiento Jurídico",icon:"bx bxs-building-house bx-sm",tag:"seguimiento-juridico",selected:!0,visible:!0}]),t=(0,I.iH)([{nombre:"Violencia Intrafamiliar",icon:"bx bx-cube-alt",tag:"violencia-intrafamiliar",selected:!0,visible:!0},{nombre:"Familia",icon:"bx bx-cube-alt",tag:"familia",selected:!1,visible:!0},{nombre:"Violencia contra de la Mujer",icon:"bx bx-cube-alt",tag:"violencia-contra-mujer",selected:!1,visible:!0},{nombre:"Derechos de la Niñez y Adolescencia",icon:"bx bx-cube-alt",tag:"derecho-niñes-adolescencia",selected:!1,visible:!0},{nombre:"Referencia a Servicios en la SAIV"+Z.Z.state.USUARIO.oficina,icon:"bx bx-cube-alt",tag:"referencia-servicios-saiv",selected:!1,visible:!0}]),u=()=>null!==c.key,m=e=>{s.value=s.value.map((o=>(o.selected=o.tag===e,o)))},p=e=>{t.value=t.value.map((o=>(o.selected=o.tag===e,o)))},b=(e,o)=>{if(null===e||null===o)return"?";let i=new Date(e).getTime(),a=new Date(o).getTime(),l=a-i,n=l/864e5;return isNaN(n)||parseInt(n)<0?"?":n},g=e=>c.tipoViolencia=e,v=e=>c.modalidadViolencia=e,h=e=>c.violenciaMujerDelitosLeiv=e,f=e=>c.violenciaMujerCodigoPenal=e,w=()=>{if(null===c.atencionBrindada||0===r.value.length)return void(d.value=!1);let e=r.value.find((e=>e.key===c.atencionBrindadaSubMenu));null!==e&&"undefined"!==typeof e?"Otro"!==e.opcion?(c.atencionBrindadaOtro=null,d.value=!1):d.value=!0:d.value=!1},V=e=>{c.codigoCaso=e},y=e=>{let o=r.value.find((o=>o.key===e));return"object"!==typeof o};function C(e){Object.assign(c,JSON.parse(JSON.stringify(e)))}(0,a.bv)((async()=>{n.value=!0;let e=await N.Z.obtener("saiv/opciones/seguimiento/juridico/index");o.value=e,o.value??=null,n.value=!1}));const S=(e,o,i)=>{c[e]!==i&&(c[o]=null)};function _(){i.value=null,l.value=null,n.value=!1,r.value=[],d.value=!1,m("violencia-intrafamiliar"),Object.assign(c,JSON.parse(JSON.stringify(e)))}const x=async(e,o)=>{if(null===typeof c.codigoCaso||null===e||null===o||"undefined"===typeof c.codigoCaso||"undefined"===typeof e||"undefined"===typeof o)return;n.value=!0;const a=await N.Z.actualizarCrear({casoKey:c.codigoCaso.key,tipo:e,opcion:o},"saiv/seguimiento/juridico/OpcionesCasos");a.ok&&(a.json.error?(i.value="warning",l.value=a.json.error):i.value=l.value=null),n.value=!1},k=async()=>{n.value=!0;try{const e=await N.Z.actualizarCrear(c,"saiv/seguimiento/juridico/guardar");e.ok&&(e.json.error?(i.value="warning",l.value=e.json.error):(c.key=e.json.key,i.value=l.value=null)),n.value=!1}catch(e){console.log("¡Ups ocurrio un error!, no se pudo guardar el registro seguimiento"),n.value=!1}},D=e=>n.value=e,A=e=>c.atencionBrindadaSubMenu=e,F=e=>c.atencionBrindadaOtro=e;return{id:"seguimiento-juridico",tabs:s,tabs0:t,store:Z.Z,loading:n,opciones:o,tipoAlert:i,formulario:c,mensajesAlert:l,vue_style_select:"--vs-font-size: 0.9375rem;",atencionBrindadaSubMenu:r,showAtencionBrindadaOtro:d,guardar:k,existKey:u,editForm:C,resetForm:_,selectedTab:m,selectedTab0:p,actualizarOpcion:x,calcularDiasFechas:b,resetVariablesForm:S,handleChangeLoading:D,handleChangeCodigoCaso:V,existInArrayAtencionBrindada:y,handleShowAtencionBrindadaOtro:w,setSubAtencionBrindada:A,setAtencionBrindadaOtro:F,handleChangeTipoViolencia:g,handleChangeModalidadViolencia:v,handleChangeDelitosLeiv:h,handleChangeDelitosCodPenal:f}},components:{TabsVue:jo.Z,AlertVue:Ro.Z,labelShowVer:Fo.Z,FormInputVue:Ho.Z,ButtonsFormVue:Uo.Z,FormSelectOpcionVue:Ao.Z}}),Po=i(89);const Mo=(0,Po.Z)(Bo,[["render",Do],["__scopeId","data-v-1ed2bb84"]]);var zo=Mo,Oo=i(4821),Wo=i(4073),Jo=i(9220);const Io=[{nombre:"Codigo",class:"text-center bg-primary text-white fw-bold",key:"codigo",style:""},{nombre:"Servicio",class:"text-center bg-label-primary text-white fw-bold",key:"tipoServicio",style:""},{nombre:"Fecha Servicio",class:"text-center bg-label-primary text-white fw-bold",key:"tipoServicioFechaHora",style:""},{nombre:"Cierr Exp. Fecha",class:"text-center bg-label-primary text-white fw-bold",key:"cierreExpedienteHoraFecha",style:""},{nombre:"Cierre Exp.",class:"text-center bg-label-primary text-white fw-bold",key:"cierreExpediente",style:""},{nombre:"Acciones",class:"bg-primary text-white fw-bold text-center",key:"acciones",style:""}],Zo="saiv/seguimiento/juridico/index";var No=(0,a.aZ)({watch:{codigoCaso:async function(e){this.handleChangeCodigoCaso(e),this.formSeguimientoJuridicoRef.handleChangeLoading(!0),this.formCasoRef.resetForm(),null!==e?await this.cargarCaso(e):(this.formSeguimientoJuridicoRef.handleChangeDelitosLeiv(null),this.formSeguimientoJuridicoRef.handleChangeTipoViolencia(null),this.formSeguimientoJuridicoRef.handleChangeDelitosCodPenal(null),this.formSeguimientoJuridicoRef.handleChangeModalidadViolencia(null)),this.formSeguimientoJuridicoRef.handleChangeLoading(!1)}},setup(e){const o=(0,I.iH)(!1),i=(0,I.iH)(!1),l=(0,I.iH)([]),n=(0,I.iH)(!1),r=(0,I.iH)("Todos"),d=(0,I.iH)(!0),c=(0,I.iH)(null),s=(0,I.iH)(null),t=(0,I.iH)(null),u=(0,I.iH)(null),m=(0,I.iH)(null),p=(0,I.iH)(null),b=(0,I.iH)(null),g=()=>null!==t.value&&t.value.existKey(),v=e=>{o.value=e},h=async e=>{l.value=e},f=()=>{o.value=!0,u.value.handleActualizarDatos(),t.value.resetForm(),o.value=!1},w=e=>{d.value=!d.value},V=()=>{c.value=null,n.value=!1,m.value.resetForm(),t.value.resetForm(),s.value.showModal()},y=e=>{t.value.handleChangeCodigoCaso(e)};(0,a.bv)((()=>{m.value.handledocultarCodigo(!1),R()}));const C=async e=>{if("undefined"!==typeof e.key){m.value.resetForm(),x(!0);let o=await N.Z.obtener("saiv/casos/obtener/"+e.key);x(!1);for(let e=0;e<o.agresores.length;e++){const i=o.agresores[e];o.agresores[e].edadDesconocida=1===parseInt(i.edadDesconocida),o.agresores[e].nombreDesconocido=1===parseInt(i.nombreDesconocido)}const i=o;m.value.editForm(i),m.value.visibleTab("agresores",i.agresores.length>0),m.value.visibleTab("responsables",null!==i.responsable.key),t.value.handleChangeTipoViolencia(i.tiposViolencia),t.value.handleChangeModalidadViolencia(i.modalidadViolencia),t.value.handleChangeDelitosLeiv(i.delitoLeivs),t.value.handleChangeDelitosCodPenal(i.delitoCodigoPenal)}},S=()=>{m.value.resetForm()},_=e=>{o.value=e},x=e=>{i.value=e},k=(0,I.iH)(!1),D=(0,I.iH)([]),A=(0,I.iH)(Z.Z.state.URL_SERVER+"saiv/casos/indexSelect"),F=(0,I.iH)([]),U=(0,I.iH)(null),H=(0,I.iH)(null),R=async()=>{k.value=!0;const e=await T.Z.datosTabla({busqueda:U.value,porPagina:10},A.value);D.value=e.data,F.value=e.links,H.value=e.current_page+"/"+e.last_page,k.value=e.cargando},j=e=>{U.value=e??U.value,R()},B=()=>{A.value=Z.Z.state.URL_SERVER+"saiv/casos/indexSelect"},P=e=>{A.value=e,R()},M=e=>{d.value=!0,n.value=!0,O(e)},z=e=>{d.value=!0,n.value=!1,O(e)},O=async e=>{try{if("undefined"===typeof e.key)return;_(!0),t.value.resetForm();const o=await N.Z.obtener("saiv/seguimiento/juridico/obtener/"+e.key);if(_(!1),"undefined"===typeof o)return;c.value=o.codigoCaso,t.value.editForm(o),t.value.setSubAtencionBrindada(o.atencionBrindadaSubMenu),t.value.setAtencionBrindadaOtro(o.atencionBrindadaOtro),s.value.showModal()}catch(o){console.log("Error -> "+o)}},W=e=>{p.value.setJson(e),b.value.showModal()},J=async e=>{"undefined"!==typeof e&&(_(!0),await N.Z.borrarCaso({key:e},"saiv/seguimiento/juridico/borrar"),u.value.handleActualizarDatos(),_(!1))};return{intercambiarForm:d,formLoading:i,codigoCaso:c,urlTabla:Zo,columnas:Io,tipoCaso:r,loading:o,showVer:n,store:Z.Z,data:l,registrosSelect:H,busquedaSelect:U,loadingSelect:k,linksSelect:F,dataSelect:D,urlSelect:A,modalSeguimientoJuridicoRef:s,tablaSeguimientoJuridicoRef:u,formSeguimientoJuridicoRef:t,modalCasoBorrarRef:b,advertenciaRef:p,formCasoRef:m,handleChangedIntercambiarForm:w,borrarSeguimientoJuridico:J,changeVariablesBusqueda:j,handleChangeCodigoCaso:y,handleActualizarDatos:f,handleChangedLoading:v,handleChangedData:h,handleClickNuevo:V,resetUrlSelect:B,resetFormCaso:S,setUrlSelect:P,cargandoForm:x,cargarCaso:C,existKey:g,handleClickBorrar:W,handleClickEditar:z,handleClickVer:M}},components:{vSelectPaginationVue:Oo.Z,AdvertenciaVue:Jo.Z,AccionesTable:Wo.Z,FormCasoVue:E.Z,ModalVue:L.Z,TableVue:q.Z,Form:zo}});const To=(0,Po.Z)(No,[["render",J],["__scopeId","data-v-08454831"]]);var Eo=To}}]);
//# sourceMappingURL=959.6846efe5.js.map