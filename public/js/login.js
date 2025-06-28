document.addEventListener("DOMContentLoaded", () => {
    console.log("Login Load");
    const form = document.getElementById("loginForm");

    if (!form) return;

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const payload = {
            email: document.getElementById("email").value,
            password: document.getElementById("password").value,
            remember: document.getElementById("remember").checked,
        };

        console.log(payload.remember);

        const message = document.getElementById("message");
        token = document.querySelector('meta[name="csrf-token"]').content;

        try {
            const response = await fetch("/login-user", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                    "X-CSRF-TOKEN": token,
                },
                body: JSON.stringify(payload),
            });
            const result = await response.json();

            if (!response.ok) {
                message.style.color = "red";
                message.innerText = result.message;
                return;
            }
            message.style.color = "green";
            message.innerText = result.message;
            window.location.replace("/dashboard");
        } catch (error) {
            console.error("Error" + error);
            message.innerText = error;
        }
    });
});
