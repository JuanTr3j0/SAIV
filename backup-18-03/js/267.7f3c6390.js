"use strict";(self["webpackChunkvue"]=self["webpackChunkvue"]||[]).push([[267],{6373:function(e,r,a){a.r(r),a.d(r,{default:function(){return M}});var o=a(3396),s=a(7139),n=a(9242);const l=e=>((0,o.dD)("data-v-ccb55920"),e=e(),(0,o.Cn)(),e),t={class:"container-fluid",style:{background:"rgb(36, 34, 55)"}},i={class:"authentication-wrapper authentication-basic container-p-y"},c={class:"authentication-inner"},d={class:"card"},u={class:"card-body"},p=l((()=>(0,o._)("div",{class:"container-fluid mb-3"},[(0,o._)("img",{src:"https://www.csj.gob.sv/wp-content/uploads/2021/06/cropped-logocsj-1-180x180.png",alt:"user-avatar",class:"d-block rounded-3 mx-auto",height:"150",width:"150",id:"uploadedAvatar"})],-1))),b=l((()=>(0,o._)("h3",{class:"mb-2 text-center"},[(0,o._)("strong",null,"Bienvenida/o a SAIV")],-1))),g=l((()=>(0,o._)("p",null,[(0,o._)("small",{class:"p"},"Sección de Atención Integral a Victimas de la Corte Suprema de Justicia para el registro y gestión de casos de violencia")],-1))),m=l((()=>(0,o._)("p",null,null,-1))),v={class:"text-center"},_={key:0,class:"bx bx-loader-alt bx-spin"},f={key:1},w={key:2},y={key:0},k={class:"mb-3"},x=l((()=>(0,o._)("div",{class:"d-flex justify-content-between"},[(0,o._)("label",{for:"correo",class:"fw-semibold d-block"},[(0,o._)("code",null,"*"),(0,o.Uk)("Correo")])],-1))),h={class:"input-group input-group-merge"},S=["disabled"],C={class:"mb-3 form-password-toggle"},I=l((()=>(0,o._)("div",{class:"d-flex justify-content-between"},[(0,o._)("label",{class:"fw-semibold d-block",for:"usario-contrasena"},[(0,o._)("code",null,"*"),(0,o.Uk)("Contraseña")])],-1))),D={class:"input-group input-group-merge"},U=["disabled"],j={class:"mb-3 float-end"},q=l((()=>(0,o._)("i",{class:"bx bx-arrow-back"},null,-1))),J=["disabled"],O=l((()=>(0,o._)("i",{class:"bx bx-reset"},null,-1))),Z=["disabled"];function A(e,r,a,l,A,F){const H=(0,o.up)("router-link");return(0,o.wg)(),(0,o.iD)("div",t,[(0,o._)("div",i,[(0,o._)("div",c,[(0,o._)("div",d,[(0,o._)("div",u,[p,b,g,m,(0,o._)("div",{class:(0,s.C_)(["alert",{"alert-info":null===l.alert.tipo,"alert-warning":"warning"===l.alert.tipo,"alert-success":"success"===l.alert.tipo}]),role:"alert"},[(0,o._)("div",v,[l.loading?((0,o.wg)(),(0,o.iD)("i",_)):(0,o.kq)("",!0),null===l.alert.tipo?((0,o.wg)(),(0,o.iD)("span",f," Ingresa tus credenciales por favor.")):(0,o.kq)("",!0),"success"===l.alert.tipo?((0,o.wg)(),(0,o.iD)("span",w,(0,s.zw)(l.alert.errores[0]),1)):(0,o.kq)("",!0)]),"warning"===l.alert.tipo?((0,o.wg)(),(0,o.iD)("ul",y,[((0,o.wg)(!0),(0,o.iD)(o.HY,null,(0,o.Ko)(l.alert.errores,(e=>((0,o.wg)(),(0,o.iD)("li",{key:e},(0,s.zw)(e),1)))),128))])):(0,o.kq)("",!0)],2),(0,o._)("form",{onSubmit:r[3]||(r[3]=(0,n.iM)(((...e)=>l.handledInicioSesion&&l.handledInicioSesion(...e)),["prevent"])),class:"form",autocomplete:"off"},[(0,o._)("div",k,[x,(0,o._)("div",h,[(0,o.wy)((0,o._)("input",{disabled:l.loading,"onUpdate:modelValue":r[0]||(r[0]=e=>l.formulario.correo=e),type:"email",class:"form-control",name:"correo-usuario",placeholder:"Ingrese"},null,8,S),[[n.nr,l.formulario.correo,void 0,{trim:!0}]])])]),(0,o._)("div",C,[I,(0,o._)("div",D,[(0,o.wy)((0,o._)("input",{disabled:l.loading,type:"password",id:"usario-contrasena",class:"form-control",placeholder:"············","onUpdate:modelValue":r[1]||(r[1]=e=>l.formulario.contrasena=e)},null,8,U),[[n.nr,l.formulario.contrasena,void 0,{trim:!0}]])])]),(0,o._)("div",j,[(0,o.Wm)(H,{to:"/",disabled:l.loading,type:"button",onClick:l.resetForm,class:"btn btn-secondary text-start",style:{margin:"3px"}},{default:(0,o.w5)((()=>[q,(0,o.Uk)(" Inicio ")])),_:1},8,["disabled","onClick"]),(0,o._)("button",{disabled:l.loading,type:"button",onClick:r[2]||(r[2]=(...e)=>l.resetForm&&l.resetForm(...e)),class:"btn btn-secondary text-start",style:{margin:"3px"}},[O,(0,o.Uk)(" Reset ")],8,J),(0,o._)("button",{disabled:l.loading,class:"btn btn-primary text-start block",type:"submit",style:{margin:"3px"}},[(0,o._)("i",{class:(0,s.C_)(["bx",{"bx-log-in":!l.loading,"bx-spin bx-loader":l.loading}])},null,2),(0,o.Uk)(" Acceder ")],8,Z)])],32)])])])])])}var F=a(4870),H=a(4239),N=a(4009),V=a(1120),z={setup(){const e=(0,F.iH)(!1),r=(0,F.iH)(!1),a=(0,F.iH)({tipo:null,errores:[]}),o={correo:null,contrasena:null},s=(0,F.qj)(JSON.parse(JSON.stringify(o)));H.Z.commit("headerSesion");const n=()=>{Object.assign(s,JSON.parse(JSON.stringify(o))),a.value.errores=[],a.value.tipo=null},l=async()=>{r.value=!0;try{const e=await N.Z.post(s,"auth/login");if(null!==e._response){if(201===e._response.status){a.value.tipo="success",a.value.errores=["Éxito!"],r.value=!0;const o=e._response.data;H.Z.commit("sesion",o),a.value.errores=["Iniciando Sesión"],V.Z.push({name:"perfil"})}}else if(null!==e._error){const r=e._error.response.status;console.log(e._error),401!==r&&403!==r||(a.value.tipo="warning",a.value.errores=[e._error.response.data.message]),402!==r&&422!==r||(a.value.tipo="warning",a.value.errores=[],"undefined"!==typeof e._error.response.data.errors.correo&&t(e._error.response.data.errors.correo),"undefined"!==typeof e._error.response.data.errors.contrasena&&t(e._error.response.data.errors.contrasena))}r.value=!1}catch(e){a.value.tipo="warning",a.value.errores=[e],r.value=!1}},t=e=>{if("undefined"!==typeof e){let r=a.value.errores;a.value.errores=r.length>0?r.concat(e):[].concat(e)}};return{alert:a,loading:r,formulario:s,recuerdame:e,handledInicioSesion:l,resetForm:n}}},B=a(89);const K=(0,B.Z)(z,[["render",A],["__scopeId","data-v-ccb55920"]]);var M=K}}]);
//# sourceMappingURL=267.7f3c6390.js.map