import store from '@/store'
import router from '@/router'
import toast from './toast';
export default{
    obtener : async (url) => {
        let ok = false;
        let error = null;
        let datos = null;
        await fetch(store.state.URL_SERVER + url, {
            method: 'GET', // *GET, POST, PUT, DELETE, etc.
            mode: 'cors', // no-cors, *cors, same-origin
            cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
            credentials: 'same-origin', // include, *same-origin, omit
            headers: store.state.HEADERS,
            redirect: 'follow', // manual, *follow, error
            referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        })
        .then( response => {
            if(response.status === 401){
                toast.error({ title: 'Error', description: 'Acceso Denegado'});
                localStorage.clear();
                router.push({ name: "acceso"});
            }else if (typeof response==='undefined' || !response.ok){  
                console.log(store.getters.erroresResponse(response));
            }else if(response.ok){
                ok = response.ok;
                return response.json(); 
            }else return null;
        })
        .then( data => datos = data)
        .catch(_error => {
           error = _error
        });
        toast.toasPeticionesHttp(datos, error, ok );
        return datos; // parses JSON response into native JavaScript objects
    },
    actualizarCrear : async (json, url) => {
        let _json = null;
        let ok = false;
        let error = null;
        let exception = null;
        try{        
            await fetch(store.state.URL_SERVER + url, {
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                mode: 'cors', // no-cors, *cors, same-origin
                cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                credentials: 'same-origin', // include, *same-origin, omit
                headers: store.state.HEADERS,
                redirect: 'follow', // manual, *follow, error
                referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
                body: JSON.stringify(json) // body data type must match "Content-Type" header
            }).then(response => {
                /* Comprobando si la respuesta está bien y si lo está, se redirigirá a la página de inicio. */
                if(response.status === 401){
                    toast.error({ title: 'Error', description: 'Acceso Denegado'});
                    localStorage.clear();
                    router.push({ name: "acceso"})
                }else if (typeof response==='undefined' || !response.ok){                
                    error = store.getters.erroresResponse(response);
                }else if(response.ok){
                    ok = response.ok;                
                    return response.json();
                }
            }).then(function(response){ 
                _json = response;
            }).catch( _error => {
                error = _error
            });
        }catch(_exception){
            exception = _exception;
        }

        toast.toasPeticionesHttp( _json, error, ok );        
        return {json:_json, ok:ok, exception:exception}; // parses JSON response into native JavaScript objects
    },
    borrar : async(json, url) => {
        let _json = null;
        let ok = false;
        let error = null;
        await fetch(store.state.URL_SERVER + url, {
            method: 'DELETE', // *GET, POST, PUT, DELETE, etc.
            mode: 'cors', // no-cors, *cors, same-origin
            cache: 'default', // *default, no-cache, reload, force-cache, only-if-cached
            credentials: 'same-origin', // include, *same-origin, omit
            headers: store.state.HEADERS,
            redirect: 'follow', // manual, *follow, error
            referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
            body: JSON.stringify(json) // body data type must match "Content-Type" header
        })
        .then(response => {
            /* Comprobando si la respuesta está bien y si lo está, se redirigirá a la página de inicio. */
            if(response.status === 401){
                toast.error({ title: 'Error', description: 'Acceso Denegado'});
                localStorage.clear();
                router.push({ name: "acceso"})
            }else if (typeof response==='undefined' || !response.ok){  
                console.log(store.getters.erroresResponse(response));
            }

            ok = response.ok; 
            return response.json();
        }).then(response =>{
            _json = response;
        }).catch( _error => {
            error = _error
        });
        toast.toasPeticionesHttp(_json, error, ok );
    },
    borrarCaso : async(json, url) => {
        let _json = null;
        let ok = false;
        let error = null;
        await fetch(store.state.URL_SERVER + url, {
            method: 'DELETE', // *GET, POST, PUT, DELETE, etc.
            mode: 'cors', // no-cors, *cors, same-origin
            cache: 'default', // *default, no-cache, reload, force-cache, only-if-cached
            credentials: 'same-origin', // include, *same-origin, omit
            headers: store.state.HEADERS,
            redirect: 'follow', // manual, *follow, error
            referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
            body: JSON.stringify(json) // body data type must match "Content-Type" header
        })
        .then(response => {
            /* Comprobando si la respuesta está bien y si lo está, se redirigirá a la página de inicio. */
            if(response.status === 401){
                toast.error({ title: 'Error', description: 'Acceso Denegado'});
                localStorage.clear();
                router.push({ name: "acceso"})
            }else if (typeof response==='undefined' || !response.ok){  
                console.log(store.getters.erroresResponse(response));
            }

            ok = response.ok; 
            return response.json();
        }).then(response =>{
            _json = response;
        }).catch( _error => {
            error = _error
        });
        toast.toasPeticionesHttp(_json, error, ok );
        return {
            "_json":_json, 
            "error":error, 
            "ok":ok
        };
    },
    borrar : async(url) => {
        let _json = null;
        let ok = false;
        let error = null;
        await fetch(store.state.URL_SERVER + url, {
            method: 'DELETE', // *GET, POST, PUT, DELETE, etc.
            mode: 'cors', // no-cors, *cors, same-origin
            cache: 'default', // *default, no-cache, reload, force-cache, only-if-cached
            credentials: 'same-origin', // include, *same-origin, omit
            headers: store.state.HEADERS,
            redirect: 'follow', // manual, *follow, error
            referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        })
        .then(response => {
            /* Comprobando si la respuesta está bien y si lo está, se redirigirá a la página de inicio. */
            if(response.status === 401){
                toast.error({ title: 'Error', description: 'Acceso Denegado'});
                localStorage.clear();
                router.push({ name: "acceso"})
            }else if (typeof response==='undefined' || !response.ok){  
                console.log(store.getters.erroresResponse(response));
            }
            
            ok = response.ok; 
            return response.json();
        }).then(response =>{
            _json = response;
        }).catch( _error => {
            error = _error
        });
        //toast.toasPeticionesHttp(_json, error, ok );
        return {json:_json, ok:ok}; // parses JSON response into native JavaScript objects
    },
}