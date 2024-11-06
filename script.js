const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

// Alternar entre os modos de login e registro
sign_up_btn.addEventListener('click', () => {
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener('click', () => {
    container.classList.remove("sign-up-mode");
});

// Exibir alerta ao tentar fazer login ou registrar
const signInForm = document.querySelector(".sign-in-form");
const signUpForm = document.querySelector(".sign-up-form");

// Função para tratar o login
const handleLogin = (event) => {
    event.preventDefault(); // Impede o envio do formulário inicialmente

    // Simula a verificação de login no banco de dados
    const email = signInForm.querySelector("input[type='text']").value;
    const password = signInForm.querySelector("input[type='password']").value;

    if (email === "user@techcare.com" && password === "12345") {
        // Simulação de login bem-sucedido
        alert("Login bem-sucedido!");
        window.location.href = "dashboard.html"; // Redireciona para a página de dashboard
    } else {
        // Se as credenciais não forem encontradas
        alert("Cadastro não encontrado em nosso banco de dados");
    }
};

// Função para tratar o registro
const handleRegister = (event) => {
    event.preventDefault(); // Impede o envio do formulário inicialmente

    // Simula o registro do usuário
    const name = signUpForm.querySelector("input[placeholder='Nome']").value;
    const email = signUpForm.querySelector("input[placeholder='Email']").value;
    const password = signUpForm.querySelector("input[type='password']").value;

    if (name && email && password) {
        // Simulação de registro bem-sucedido
        alert("Registro bem-sucedido!");
        window.location.href = "register-success.html"; // Redireciona para a página de sucesso do registro
    } else {
        // Caso algum campo esteja vazio
        alert("Preencha todos os campos!");
    }
};

// Adiciona o evento de alerta e redirecionamento ao clicar no botão de login
signInForm.addEventListener('submit', handleLogin);

// Adiciona o evento de alerta e redirecionamento ao clicar no botão de registrar
signUpForm.addEventListener('submit', handleRegister);
