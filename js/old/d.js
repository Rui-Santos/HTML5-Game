    window.d={
        r:function(name){
            // Read
            return localStorage.getItem(name)?localStorage.getItem(name):false;
        },
        w:function(name,val){
            // Write
            localStorage.setItem(name,JSON.stringify(val));
            return true;
        },
        del:function(name){
            // Delete
            window.d.w(name,'');
            localStorage.removeItem(name);
            return true;
        }
    };