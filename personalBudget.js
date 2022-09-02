const input = document.getElementById("start").valueAsDate = new Date;
console.log(input);

function showhide(){
    const password = document.getElementById('password');
    const hider = document.getElementById('hider');
        if (password.type === 'password'){
            password.setAttribute('type', 'text');
            hider.classList.add('hide');
        }
        else{
            password.setAtribute('type', 'password');
            hider.classList.remove('hide');
        }
    }


