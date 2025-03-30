(function(){
    const form = document.querySelector(".form-cadastro");
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        limparErros()
        const campos = form.querySelectorAll(".input-var");
        let formValido = true;
        campos.forEach(campo =>  {
            if(campo.classList.contains("email"))
            {
                formValido = validarEmail(campo) && formValido
            }
            if(campo.classList.contains("senha"))
            {
                formValido = validarSenha(campo) && formValido
            }

            if(campo.classList.contains("rep_senha"))
            {
                formValido =  validarRepetirSenha() && formValido

               
            }
            
        })
        if(formValido)
        {
            form.submit();
        }
    });

    
    function validarEmail(campo) {
        const regex = /^[^\s@]+@[^\s@]+\.com$/;
    
        if (regex.test(campo.value)) {
            return true;
        }
        
        criarError(campo, "Email inválido!");
        return false;
    }
    

    function validarSenha(campo)
    {
        if(campo.value.length >= 8)
        {
            return true;
        }
        criarError(campo, "O campo senha deve ter no mínimo 8 caracteres.");
        return false;
    }

    function validarRepetirSenha()
    {
        const senha = document.querySelector(".senha");
        const repSenha = document.querySelector(".rep_senha");
        if(senha.value === repSenha.value)
        {
            return true;
        }
        criarError(repSenha, "O campo repetir senha deve ser igual ao de senha.");
        return false;
    }

    function criarError(campo, msg)
    {
        const spanError = document.createElement("span");
        spanError.innerText = msg;
        spanError.classList.add("error")
        campo.insertAdjacentElement('afterend', spanError);
    }

    function limparErros()
    {
        const erros = document.querySelectorAll(".error");
        if(erros.length > 0)
        {
            erros.forEach(erro => {
                erro.remove();
            })
        }
    }
})();