"use strict";(self["webpackChunkvue"]=self["webpackChunkvue"]||[]).push([[814],{7243:function(e,r,a){a.r(r),a.d(r,{default:function(){return M}});var s=a(3396),o=a(7139),n=a(9242);const t=e=>((0,s.dD)("data-v-27c71776"),e=e(),(0,s.Cn)(),e),l={class:"container-fluid",style:{background:"rgb(36, 34, 55)"}},i={class:"authentication-wrapper authentication-basic container-p-y"},c={class:"authentication-inner"},d={class:"card"},u={class:"card-body"},p=t((()=>(0,s._)("div",{class:"container-fluid mb-3"},[(0,s._)("img",{src:"https://www.csj.gob.sv/wp-content/uploads/2021/06/cropped-logocsj-1-180x180.png",alt:"user-avatar",class:"d-block rounded-3 mx-auto",height:"150",width:"150",id:"uploadedAvatar"})],-1))),b=t((()=>(0,s._)("h3",{class:"mb-2 text-center"},[(0,s._)("strong",null,"Bienvenida/o a SAIV")],-1))),g=t((()=>(0,s._)("p",null,[(0,s._)("small",{class:"p"},"Sección de Atención Integral a Victimas de la Corte Suprema de Justicia para el registro y gestión de casos de violencia")],-1))),m=t((()=>(0,s._)("p",null,null,-1))),v={class:"text-center"},_={key:0,class:"bx bx-loader-alt bx-spin"},f={key:1},w={key:2},y={key:0},k={class:"mb-3"},x=t((()=>(0,s._)("div",{class:"d-flex justify-content-between"},[(0,s._)("label",{for:"correo",class:"fw-semibold d-block"},[(0,s._)("code",null,"*"),(0,s.Uk)("Correo")])],-1))),h={class:"input-group input-group-merge"},S=["disabled"],C={class:"mb-3 form-password-toggle"},I=t((()=>(0,s._)("div",{class:"d-flex justify-content-between"},[(0,s._)("label",{class:"fw-semibold d-block",for:"usario-contrasena"},[(0,s._)("code",null,"*"),(0,s.Uk)("Contraseña")])],-1))),D={class:"input-group input-group-merge"},U=["disabled"],j={class:"mb-3 float-end"},q=t((()=>(0,s._)("i",{class:"bx bx-arrow-back"},null,-1))),J=["disabled"],O=t((()=>(0,s._)("i",{class:"bx bx-reset"},null,-1))),Z=["disabled"];function z(e,r,a,t,z,A){const F=(0,s.up)("router-link");return(0,s.wg)(),(0,s.iD)("div",l,[(0,s._)("div",i,[(0,s._)("div",c,[(0,s._)("div",d,[(0,s._)("div",u,[p,b,g,m,(0,s._)("div",{class:(0,o.C_)(["alert",{"alert-info":null===t.alert.tipo,"alert-warning":"warning"===t.alert.tipo,"alert-success":"success"===t.alert.tipo}]),role:"alert"},[(0,s._)("div",v,[t.loading?((0,s.wg)(),(0,s.iD)("i",_)):(0,s.kq)("",!0),null===t.alert.tipo?((0,s.wg)(),(0,s.iD)("span",f," Ingresa tus credenciales por favor.")):(0,s.kq)("",!0),"success"===t.alert.tipo?((0,s.wg)(),(0,s.iD)("span",w,(0,o.zw)(t.alert.errores[0]),1)):(0,s.kq)("",!0)]),"warning"===t.alert.tipo?((0,s.wg)(),(0,s.iD)("ul",y,[((0,s.wg)(!0),(0,s.iD)(s.HY,null,(0,s.Ko)(t.alert.errores,(e=>((0,s.wg)(),(0,s.iD)("li",{key:e},(0,o.zw)(e),1)))),128))])):(0,s.kq)("",!0)],2),(0,s._)("form",{onSubmit:r[3]||(r[3]=(0,n.iM)(((...e)=>t.handledInicioSesion&&t.handledInicioSesion(...e)),["prevent"])),class:"form",autocomplete:"off"},[(0,s._)("div",k,[x,(0,s._)("div",h,[(0,s.wy)((0,s._)("input",{disabled:t.loading,"onUpdate:modelValue":r[0]||(r[0]=e=>t.formulario.correo=e),type:"email",class:"form-control",name:"correo-usuario",placeholder:"Ingrese"},null,8,S),[[n.nr,t.formulario.correo,void 0,{trim:!0}]])])]),(0,s._)("div",C,[I,(0,s._)("div",D,[(0,s.wy)((0,s._)("input",{disabled:t.loading,type:"password",id:"usario-contrasena",class:"form-control",placeholder:"············","onUpdate:modelValue":r[1]||(r[1]=e=>t.formulario.contrasena=e)},null,8,U),[[n.nr,t.formulario.contrasena,void 0,{trim:!0}]])])]),(0,s._)("div",j,[(0,s.Wm)(F,{to:"/",disabled:t.loading,type:"button",onClick:t.resetForm,class:"btn btn-secondary text-start",style:{margin:"3px"}},{default:(0,s.w5)((()=>[q,(0,s.Uk)(" Inicio ")])),_:1},8,["disabled","onClick"]),(0,s._)("button",{disabled:t.loading,type:"button",onClick:r[2]||(r[2]=(...e)=>t.resetForm&&t.resetForm(...e)),class:"btn btn-secondary text-start",style:{margin:"3px"}},[O,(0,s.Uk)(" Reset ")],8,J),(0,s._)("button",{disabled:t.loading,class:"btn btn-primary text-start block",type:"submit",style:{margin:"3px"}},[(0,s._)("i",{class:(0,o.C_)(["bx",{"bx-log-in":!t.loading,"bx-spin bx-loader":t.loading}])},null,2),(0,s.Uk)(" Acceder ")],8,Z)])],32)])])])])])}var A=a(4870),F=a(4239),H=a(4009),N=a(1120),V={setup(){const e=(0,A.iH)(!1),r=(0,A.iH)(!1),a=(0,A.iH)({tipo:null,errores:[]}),s={correo:"bitzide@bitzide.com",contrasena:"password"},o=(0,A.qj)(JSON.parse(JSON.stringify(s)));F.Z.commit("headerSesion");const n=()=>{Object.assign(o,JSON.parse(JSON.stringify(s))),a.value.errores=[],a.value.tipo=null},t=async()=>{r.value=!0;try{const e=await H.Z.post(o,"auth/iniciar/sesion");if(null!==e._response){if(201===e._response.status){a.value.tipo="success",a.value.errores=["Éxito!"],r.value=!0;const s=e._response.data;F.Z.commit("sesion",s),a.value.errores=["Iniciando Sesión"],N.Z.push({name:"perfil"})}}else if(null!==e._error){const r=e._error.response.status;console.log(e._error),401!==r&&403!==r||(a.value.tipo="warning",a.value.errores=[e._error.response.data.message]),402!==r&&422!==r||(a.value.tipo="warning",a.value.errores=[],"undefined"!==typeof e._error.response.data.errors.correo&&l(e._error.response.data.errors.correo),"undefined"!==typeof e._error.response.data.errors.contrasena&&l(e._error.response.data.errors.contrasena))}r.value=!1}catch(e){a.value.tipo="warning",a.value.errores=[e],r.value=!1}},l=e=>{if("undefined"!==typeof e){let r=a.value.errores;a.value.errores=r.length>0?r.concat(e):[].concat(e)}};return{alert:a,loading:r,formulario:o,recuerdame:e,handledInicioSesion:t,resetForm:n}}},B=a(89);const K=(0,B.Z)(V,[["render",z],["__scopeId","data-v-27c71776"]]);var M=K}}]);
//# sourceMappingURL=814.9b707493.js.map